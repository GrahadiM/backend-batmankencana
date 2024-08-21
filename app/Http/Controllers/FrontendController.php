<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Requests\UpdatePasswordRequest;
use App\Models\Favourite;
use App\Models\Order;
use App\Models\OrderLocation;
use App\Models\OrderProduct;

class FrontendController extends Controller
{
    public function index()
    {
        // $data['categories'] = Category::where('type','sub')->get();
        // $data['categories'] = \App\Models\Category::with('children')->where('type','main')->whereNull('parent_id')->get();
        $data['categories'] = Category::all();
        $data['products']   = Product::latest('id')->get();
        return view('fe.index', $data);
    }

    public function category()
    {
        // $data['categories'] = Category::where('type','sub')->get();
        $data['categories'] = Category::all();
        $data['products']   = Product::latest('id')->get();
        // dd($data);
        return view('fe.category', $data);
    }

    public function category_detail($id)
    {
        $data['category']   = Category::find($id);
        $data['products']   = Product::with('category')->where('category_id', $id)->latest('id')->get();
        return view('fe.category_detail', $data);
    }

    public function product_detail($id)
    {
        $data['product']   = Product::with('category')->find($id);
        return view('fe.product_detail', $data);
    }

    public function contact()
    {
        return view('fe.contact');
    }

    public function wishlist()
    {
        $data['wishlist'] = Favourite::with('product', 'customer')->where('customer_id', Auth::user()->id)->latest('id')->get();
        return view('fe.wishlist', $data);
    }

    public function wishlistAdd(Request $request)
    {
        $atr = Favourite::with('product', 'customer')->where([
			['customer_id', Auth::user()->id],
			['product_id', $request->product_id],
		])->first();

		if (!$atr) {
			$atr = new Favourite();
		}

        $atr->customer_id = Auth::user()->id;
        $atr->product_id = $request->product_id;

        $atr->save();

        return redirect()->back()->with('success', 'Wishlist berhasil diupdate!');
    }

    public function wishlistIgnore(Request $request)
    {
        $atr = Favourite::with('product', 'customer')->where([
			['customer_id', Auth::user()->id],
			['product_id', $request->product_id],
		])->first();

		if (!$atr) {
			$atr = new Favourite();
		}

        $atr->customer_id = Auth::user()->id;
        $atr->product_id = $request->product_id;

        $atr->delete();

        return redirect()->back()->with('success', 'Wishlist berhasil diupdate!');
    }

    public function cart()
    {
        $data['cart'] = Cart::with('product', 'customer')->where('customer_id', Auth::user()->id)->latest('id')->get();
        $data['ongkir'] = 20000;
        return view('fe.cart', $data);
    }

    public function cartAdd(Request $request)
    {
        $atr = Cart::with('product', 'customer')->where([
			['customer_id', Auth::user()->id],
			['product_id', $request->product_id],
		])->first();

		$new = false;
		if (!$atr) {
			$atr = new Cart();
			$new = true;
		}

        $atr->customer_id = Auth::user()->id;
        $atr->product_id = $request->product_id;

		$qty = $request->qty == NULL ? 1 : $request->qty;

        if ($new) {
            $atr->qty = $qty;
        } else {
            $atr->qty = $atr->qty + $qty;
        }

        $atr->save();

        return redirect()->back()->with('success', 'Cart berhasil diupdate!');
    }

    public function cartMin(Request $request)
    {
        $atr = Cart::with('product', 'customer')->where([
			['customer_id', Auth::user()->id],
			['product_id', $request->product_id],
		])->first();

        $atr->customer_id = Auth::user()->id;
        $atr->product_id = $request->product_id;

		$qty = $request->qty == NULL ? 1 : $request->qty;
		$qt = $atr->qty-1;

        if ($qt <= 0) {
            $atr->delete();
        } else {
            $atr->qty = $atr->qty - $qty;
            $atr->save();
        }

        return redirect()->back()->with('success', 'Cart berhasil diupdate!');
    }

    public function cartIgnore(Request $request)
    {
        $atr = Cart::with('product', 'customer')->where([
			['customer_id', Auth::user()->id],
			['product_id', $request->product_id],
		])->first();

		if (!$atr) {
			$atr = new Cart();
		}

        $atr->customer_id = Auth::user()->id;
        $atr->product_id = $request->product_id;

        $atr->delete();

        return redirect()->back()->with('success', 'Cart berhasil diupdate!');
    }

    public function checkout(Request $request)
    {
        $request->validate([
            'tf' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data                   = new Order;
        $data->customer_id      = Auth::user()->id;
        $data->code_order       = 'TRX-'.mt_rand(00000, 99999).time();
        $data->snap_token       = $request->snap_token == NULL ? mt_rand(00000, 99999).time() : $request->snap_token;
        $data->address          = $request->address;
        $data->total_price      = $request->total_price;
        $data->note             = $request->note;
        $data->status           = 'UNPAID';
        $data->payment_status   = 1;
        $data->tgl_pesanan      = now();
        $data->link_pembayaran  = $request->link_pembayaran;

        if ($tf = $request->file('tf')) {
            $destinationPath = 'images/tf/';
            $transferImage = date('YmdHis') . "." . $tf->getClientOriginalExtension();
            $tf->move($destinationPath, $transferImage);
            $data->tf = $transferImage;
        }

        $data->save();


        $carts = Cart::with('product')->where('customer_id', Auth::user()->id)->get();
        foreach ($carts as $cart) {

            $op = new OrderProduct;
            $op->transaction_id = $data->id;
            $op->product_id = $cart->product->id;
            $op->qty = $cart->qty == NULL ? 1 : $cart->qty;
            $op->save();

            Cart::destroy($cart->id);
        }

        return redirect()->route('fe.history')->with('success', 'Pembayaran berhasil!');
    }

    public function history()
    {
        $data['histories']  = Order::with('product', 'customer')->where('customer_id', Auth::user()->id)->latest('id')->get();
        return view('fe.history', $data);
    }

    public function historyProduct(Request $request)
    {
        $data['order']      = Order::with('customer')->where('customer_id', Auth::user()->id)->find($request->order_id);
        $data['products']   = OrderProduct::with('product')->where('transaction_id', $request->order_id)->latest('id')->get();
        $data['ongkir']     = 20000;
        return view('fe.historyProduct', $data);
    }

    public function historyDelivery(Request $request)
    {
        $data['order']      = Order::with('customer')->where('customer_id', Auth::user()->id)->find($request->order_id);
        $data['location']   = OrderLocation::where('transaction_id', $request->order_id)->latest('id')->get();
        return view('fe.historyDelivery', $data);
    }

    public function pay(Request $request) {
        $data           = Order::with('customer')->where('customer_id', Auth::user()->id)->find($request->order_id);
        $data['status'] = $request->status;
        if($data['status'] == 'PAID') {
            $data['payment_status'] = 2;
            $data['note']           = 'Sudah terbayarkan pada tanggal dan jam ('.now().')';
        }
        $data->save();

        return back();
    }

    public function profile()
    {
        return view('fe.profile');
    }

    public function profileUpdate(UpdateProfileRequest $request)
    {
        $request->user()->update(
            $request->all()
        );

        // $data        = User::findOrFail(Auth::user()->id);
        // $data->name  = $request->name;
        // $data->email = $request->email;
        // $data->phone = $request->phone;
        // $data->dob1  = $request->dob1;
        // $data->dob2  = $request->dob2;
        // $data->dob3  = $request->dob3;
        // $data->dob3  = $request->dob3;
        // dd($data);

        return redirect()->route('fe.profile')->with('success', 'Profile berhasil diupdate!');
    }

    public function profilePassword(UpdatePasswordRequest $request)
    {
        $request->user()->update([
            'password' => Hash::make($request->get('password'))
        ]);

        return redirect()->route('fe.profile')->with('success', 'Password berhasil diupdate!');
    }
}
