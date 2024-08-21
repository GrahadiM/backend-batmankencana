<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\OrderLocation;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class OrderDeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = $request->transaction_id;
        $request->validate([
            'transaction_id'    => 'required',
            'location_name'     => 'required'
        ]);

        $data = new OrderLocation();
        $data->transaction_id = $request->transaction_id;
        $data->location_name  = $request->location_name;
        $data->save();
        Alert::success('Data Berhasil di Tambahkan!');
        return redirect()->route('admin.order_deliveries.show', $id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['title']  = 'Order Delivery';
        $data['tr']     = Order::find($id);
        $data['data']   = OrderLocation::with('order')->where('transaction_id', $id)->get();
        return view('admin.order_delivery.index', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['title']  = 'Order Delivery';
        $data['tr']     = Order::find($id);
        return view('admin.order_delivery.create', $data);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
