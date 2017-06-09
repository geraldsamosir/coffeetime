<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Voyager;

class Order extends Model
{

    const WAITING_PAYMENT = 'waiting_payment';
    const PAYMENT_CONFIRMED = 'payment_confirmed';
    const PAYMENT_ACCEPTED = 'payment_accepted';
    const ORDER_SHIPPED = 'order_shipped';
    const ORDER_ACCEPTED = 'order_accepted';
    const ORDER_REJECTED = 'order_rejected';

    const status =
        [
            'waiting_payment' => 'Menunggu Pembayaran',
            'payment_confirmed' => 'Pembayaran Sedang Diproses',
            'payment_accepted' => 'Pembayaran Diterima',
            'order_shipped' => 'Pesanan Dalam Pengiriman',
            'order_accepted' => 'Pesanan Telah Diterima',
            'order_rejected' => 'Pesanan ditolak',
        ];

    public function getCart()
    {
    	return ShoppingCart::where('identifier', $this->cart_identifier)->first();
    }

    public function orderDetails(){
        return $this->hasMany('App\OrderDetail');
    }

    public function userId(){
        return $this->belongsTo(Voyager::modelClass('User'), 'user_id');
    }
}
