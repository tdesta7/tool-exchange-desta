<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LolaController extends Controller
{
    //
    public function home(){
        return view('lolapages.home');
    }

    public function shop(){
        return view('lolapages.shop');
    }

    public function cart(){
        return view('lolapages.cart');
    }

    public function checkout(){
        return view('lolapages.checkout');
    }

    public function login(){
        return view('lolapages.login');
    }

    public function signup(){
        return view('lolapages.signup');
    }

    public function orders(){
        return view('admin.orders');
    }
}
