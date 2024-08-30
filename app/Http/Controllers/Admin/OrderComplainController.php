<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\OrderComplain;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class OrderComplainController extends Controller
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
    public function create()
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
        //
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
        $data['data']   = OrderComplain::with('order')->where('transaction_id', $id)->get();
        return view('admin.order_complain.index', $data);
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
        $data['data']   = OrderComplain::find($id);
        return view('admin.order_complain.create', $data);
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
        $id = $request->id;
        $request->validate([
            'transaction_id'    => 'required',
            'note_admin'        => 'required'
        ]);

        $data = OrderComplain::find($id);
        $data->transaction_id   = $request->transaction_id;
        $data->note             = $data->note;
        $data->note_admin       = $request->note_admin;
        $data->status           = $request->status;
        $data->save();
        Alert::success('Data Berhasil di Tambahkan!');
        return redirect()->route('admin.order_complains.show', $request->transaction_id);
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
