<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ShoppingCart;

class Order extends Model
{
    public function getCart()
    {
    	return ShoppingCart::where('identifier', $this->cart_identifier)->first();
    }
}
