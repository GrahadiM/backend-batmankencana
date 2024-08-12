<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title']  = 'List Order';
        $data['data']   = Order::with('customer')->latest('id')->get();
        return view('admin.orders.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.orders.create');
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
            'cost' => 'required',
            'status' => 'required',
        ]);

        $dt = new Order;
        $dt->cost = $request->cost;
        $dt->status = $request->status;
        $dt->created_at = now();
        $dt->save();

        return redirect()->route('admin.orders.index')
                        ->with('success','Transaction created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['title']  = 'Detail Order';
        $data['dt']     = Order::find($id);
        return view('admin.orders.show', $data);
    }

    public function detail($id)
    {
        $data['title']  = 'Detail Order';
        $data['dt']     = Order::find($id);
        return view('admin.orders.show', $data);
    }

    public function status($id)
    {
        $data['title']      = 'List Order';
        $data['dt']         = Order::find($id);
        $data['categories'] = Category::all();
        return view('admin.orders.status', $data);
    }

    public function status_update(Request $request, $id)
    {
        request()->validate([
            'status' => 'required',
        ]);
        $dt = Order::find($id);
        $dt->status = $request->status;
        $dt->created_at = now();
        $dt->update();

        return redirect()->route('admin.orders.index')
                        ->with('success','Transaction updated successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['title']      = 'Update Order';
        $data['dt']         = Order::find($id);
        $data['categories'] = Category::all();
        return view('admin.orders.edit', $data);
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
            'cost' => 'required',
            'status' => 'required',
        ]);
        $dt = Order::find($id);
        $dt->cost = $request->cost;
        $dt->status = $request->status;
        $dt->tgl_penerimaan = now();
        // $dt->tgl_pengambilan = $request->tgl_pengambilan;
        $dt->update();

        return redirect()->route('admin.orders.index')
                        ->with('success','Transaction updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dt = Order::find($id);
        $dt->delete();

        return redirect()->route('admin.orders.index')
                        ->with('success','Transaction deleted successfully');
    }
}
