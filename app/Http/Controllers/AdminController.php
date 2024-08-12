<?php

namespace App\Http\Controllers;

use App\Models\Misi;
use App\Models\Plan;
use App\Models\Visi;
use App\Models\About;
use App\Models\Banner;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('permission:dashboard-C', ['only' => ['index','list','show']]);
        $this->middleware('permission:dashboard-R', ['only' => ['create','store']]);
        $this->middleware('permission:dashboard-U', ['only' => ['edit','update']]);
        $this->middleware('permission:dashboard-D', ['only' => ['destroy']]);
    }

    public function index()
    {
        $data['items'] = Product::all();
        return view('adm.index', $data);
    }

    public function detail($id)
    {
        $data['item'] = Product::findOrFail($id);
        // $data['item'] = Product::where('id', $request->id)->first();
        return view('adm.detail', $data);
    }

    public function store_product(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'price' => 'required',
            'body' => 'required',
            'thumbnail' => 'required|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $input['name'] = Str::upper($request->name);
        $input['category'] = Str::ucfirst($request->category);
        $input['price'] = $request->price;
        $input['body'] = $request->body;

        if ($thumbnail = $request->file('thumbnail')) {
            $destinationPath = 'frontend/assets/images/products/';
            $profileImage = date('YmdHis') . "." . $thumbnail->getClientOriginalExtension();
            $thumbnail->move($destinationPath, $profileImage);
            $input['thumbnail'] = "$profileImage";
        }
        Product::create($input);
        return redirect('/#product');
    }

    public function edit_product($id)
    {
    	$data = Product::findOrFail($id);
        $response = [
            'success' => true,
            'data' => $data,
            'message' => 'success',
        ];
        return response()->json($response, 200);
    }

    public function update_product(Request $request, $id)
    {
        // $id = $request->id;
        // $atr = Product::findOrFail($id);
        // $atr->name = Str::upper($request->name);
        // $atr->category = Str::ucfirst($request->category);
        // $atr->body = $request->body;
        // $atr->save();
        // return back();

        Product::updateOrCreate(
            [
                'id' => $id
            ],
            [
                'name' => Str::upper($request->name),
                'category' => Str::ucfirst($request->category),
                'price' => $request->price,
                'body' => $request->body,
            ]
        );

        return response()->json(['success' => true]);
    }

    public function destroy_product($id)
    {
        Product::find($id)->delete();

        return response()->json(['success'=>'Product deleted successfully.']);
    }
}
