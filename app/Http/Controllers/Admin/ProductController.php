<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title']  = 'List Products';
        $data['data']   = Product::with('category')->latest('id')->get();
        return view('admin.product.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title']      = 'Create Products';
        $data['categories'] = Category::all();
        return view('admin.product.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'category_id' => 'required',
            'name' => 'required',
            'body' => 'required',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $dt = new Product;
        $dt->category_id = $request->category_id;
        $dt->name = Str::ucfirst($request->name);
        $dt->price = $request->price;
        $dt->body = $request->body;
        $dt->created_at = now();
        if ($thumbnail = $request->file('thumbnail')) {
            $destinationPath = 'images/product';
            $profileImage = date('YmdHis') . "." . $thumbnail->getClientOriginalExtension();
            $thumbnail->move($destinationPath, $profileImage);
            $dt->thumbnail = $profileImage;
        }
        $dt->save();

        Alert::success('Data Berhasil di Tambahkan!');
        return redirect()->route('admin.products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['title']  = 'Detail Products';
        $data['dt']     = Product::find($id);
        return view('admin.product.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['title']  = 'Update Products';
        $data['dt']             = Product::find($id);
        $data['categories']     = Category::all();
        return view('admin.product.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'category_id' => 'required',
            'name' => 'required',
            'body' => 'required',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $dt = Product::find($id);
        $dt->category_id = $request->category_id;
        $dt->name = Str::ucfirst($request->name);
        $dt->price = $request->price;
        $dt->body = $request->body;
        $dt->updated_at = now();
        if ($thumbnail = $request->file('thumbnail')) {
            $destinationPath = 'images/product';
            $profileImage = date('YmdHis') . "." . $thumbnail->getClientOriginalExtension();
            $thumbnail->move($destinationPath, $profileImage);
            $dt->thumbnail = $profileImage;
        }
        $dt->update();

        Alert::success('Data Berhasil Terupdate!');
        return redirect()->route('admin.products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->delete();
        return back();
    }
}
