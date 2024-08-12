<?php

namespace App\Helper;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SettingHelper
{
    public static function getSetting()
    {
        $settings = \App\Models\SettingWebsite::get()->first();
        return $settings;
    }

    public static function getBanner()
    {
        $data = \App\Models\Banner::get()->first();
        return $data;
    }

    public static function getAbout()
    {
        $data = \App\Models\About::get()->first();
        return $data;
    }

    public static function getMisi()
    {
        $data = \App\Models\Misi::get()->first();
        return $data;
    }

    public static function getPlan()
    {
        $data = \App\Models\Plan::get()->first();
        return $data;
    }

    public static function getVisi()
    {
        $data = \App\Models\Visi::get()->first();
        return $data;
    }

    public static function getProduct(Request $request)
    {
        $id = $request->id;
        $data = \App\Models\Product::findOrFail($id);
        return $data;
    }

    public static function getVisitor()
    {
        $count = \App\Models\VisitorCount::all()->sum('count');
        return $count;
    }

    public static function getCategories()
    {
        $data = \App\Models\Category::with('children')->where('type','main')->whereNull('parent_id')->get();
        return $data;
    }

    public static function getCartCount()
    {
        if (Auth::check()) {
            $data = \App\Models\Cart::with('customer','product')->where('customer_id', Auth::user()->id)->sum('qty');
        } else {
            $data = 0;
        }
        return $data;
    }

    public static function getWishlistCount()
    {
        if (Auth::check()) {
            $data = \App\Models\Favourite::with('customer','product')->where('customer_id', Auth::user()->id)->count();
        } else {
            $data = 0;
        }
        return $data;
    }

    public static function getTotalPrice()
    {
        $data = 0;
        if (Auth::check()) {
            $carts = \App\Models\Cart::with('customer','product')->where('customer_id', Auth::user()->id)->get();
            foreach ($carts as $cart) {
                $data += $cart->qty*$cart->product->price;
            }
        } else {
            $data = 0;
        }
        return $data;
    }
}
