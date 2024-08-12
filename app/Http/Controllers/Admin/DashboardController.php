<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        $data['title']      = 'Dashboard';
        $data['categories'] = Category::count();
        $data['products']   = Product::count();
        $data['orders']     = Order::count();
        $data['users']      = User::count();
        return view('admin.dashboard.index', $data);
    }
}
