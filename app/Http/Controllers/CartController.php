<?php

namespace App\Http\Controllers;

use App\OrderDetail;
use Illuminate\Http\Request;
use App\Product;
use Cart;
use Auth;
use Carbon\Carbon;
use App\Order;
use DB;
use App\Http\Controllers\OrderController;

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

        if ($quantity > $product->stock) {
            return back()->withInput()->with('error', 'Stock Kurang');
        } else {
            Cart::add($product, $quantity, ['option' => isset($input['option']) ? $input['option'] : null]);
            return redirect('/cart');
        }
    }

    public function cartCheckout(Request $request)
    {
        $input = $request->all();
        $cart = Cart::content();

        DB::beginTransaction();
        try {
            $order = new Order;
            $order->user_id = Auth::check() ? Auth::user()->id : null;
            $order->status = Order::WAITING_PAYMENT;
            $order->save();
            $amount = 0;
            foreach($cart as $cartItem) {
                $orderDetail = new OrderDetail;
                $orderDetail->order_id = $order->id;
                $orderDetail->product_id = $cartItem->id;

                $orderDetail->price = $cartItem->price;
                $orderDetail->option = !empty($cartItem->options) ? $cartItem->options->option : null;
                $orderDetail->quantity = $input['qty-'.$cartItem->rowId];
                $amount += $orderDetail->quantity * $orderDetail->price;

                $product = Product::where('id',$cartItem->id)->first();
                if ($product->stock >= $orderDetail->quantity) {
                    $product->stock = $product->stock - $orderDetail->quantity;
                    $product->save();
                } else {
                    Cart::destroy();
                    return redirect('/')->with('error', 'Maaf, Stok telah habis untuk product '.$product->name);
                }

                $orderDetail->save();
                echo $orderDetail;
            }
            $order->amount = $amount;
            $order->save();
            DB::commit();
            Cart::destroy();
            return redirect('/checkout/'.$order->id);
        } catch (\Exception $e) {
            DB::rollback();
            echo $e;
        }
    }

    public function deleteItem(Request $request, $rowId)
    {
        Cart::remove($rowId);
        return redirect('/cart');
    }
}