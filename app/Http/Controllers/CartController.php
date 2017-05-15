<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coffee;
use Cart;
use Auth;
use Carbon\Carbon;
use App\Order;

class CartController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function getCartContent()
    {
        // Cart::restore(Auth::user()->id);
        // return Cart::content();
        return Order::find(1)->getCart();
    }

    public function addItemToCart()
    {
        $user = Auth::check() ? Auth::user()->id . '-' . Auth::user()->name : 'guest';
        $coffee = Coffee::find(2);
        Cart::instance($user)->add($coffee, 1, []);
        Cart::store($user. '-' . Carbon::now()->timestamp);
        return Cart::content();
    }
}
