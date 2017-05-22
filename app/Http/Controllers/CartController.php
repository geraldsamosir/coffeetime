<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
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
        return Cart::content();
    }

    public function addItemToCart(Request $request, $id)
    {
        $input = $request->all();
        $product = Product::find($id);
        $quantity = $input['qty'];
        Cart::add($product, $quantity, ['option' => $input['option']]);
        return redirect('/cart');
    }

    public function deleteItem(Request $request, $rowId)
    {
        Cart::remove($rowId);
        return redirect('/cart');
    }
}