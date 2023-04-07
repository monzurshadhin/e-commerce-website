<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class EcommerceController extends Controller
{
    //
    public function index()
    {
        return view('front-end.home.home',[
            'products'=>Product::where('status',1)
//                ->orderby('id','asc')
                ->orderby('id','desc')
            ->take(5)
            ->get()
        ]);
    }

    public function shop()
    {
        return view('front-end.shop.shop');
    }

    public function checkOut()
    {
        return view('front-end.checkout.checkout');
    }
    public function cart()
    {
        return view('front-end.cart.cart');
    }
    public function detailsProduct($id)
    {
        return view('front-end.product.details-product',[
            'product'=>Product::find($id),
        ]);
    }

}
