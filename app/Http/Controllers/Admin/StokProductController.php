<?php

namespace App\Http\Controllers\Admin;

use App\Models\StokProduct;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class StokProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title']  = 'List Product';
        $data['data']   = StokProduct::latest('id')->get();
        return view('admin.products_qty.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title']      = 'Create Product';
        return view('admin.products_qty.create', $data);
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
            'name'  => 'required',
            'brand'  => 'required',
            'qty'   => 'required',
        ]);

        $dt             = new StokProduct;
        $dt->name       = Str::ucfirst($request->name);
        $dt->brand      = Str::ucfirst($request->brand);
        $dt->qty        = $request->qty;
        $dt->created_at = now();
        $dt->save();

        Alert::success('Data Berhasil di Tambahkan!');
        return redirect()->route('admin.products_qty.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['title']  = 'Detail Product';
        $data['dt']     = StokProduct::find($id);
        return view('admin.products_qty.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['title']  = 'Update Product';
        $data['dt']     = StokProduct::find($id);
        return view('admin.products_qty.edit', $data);
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
            'name'  => 'required',
            'brand'  => 'required',
            'qty'   => 'required',
        ]);

        $dt             = StokProduct::find($id);
        $dt->name       = Str::ucfirst($request->name);
        $dt->brand      = Str::ucfirst($request->brand);
        $dt->qty        = $request->qty;
        $dt->created_at = now();
        $dt->update();

        Alert::success('Data Berhasil Terupdate!');
        return redirect()->route('admin.products_qty.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        StokProduct::find($id)->delete();
        return back();
    }
}
