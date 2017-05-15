<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Facades\Voyager;
use Gloudemans\Shoppingcart\Contracts\Buyable;

class Product extends Model implements Buyable
{
    protected $fillable = ['name'];

    public function categoryId(){
	    return $this->belongsTo(Voyager::modelClass('Category'), 'category_id');
	}

	public function getBuyableIdentifier($options = null){
        return $this->id;
    }

    public function getBuyableDescription($options = null){
        return $this->name;
    }

    public function getBuyablePrice($options = null){
        return $this->discounted_price > 0 ? $this->discounted_price : $this->original_price;
    }
}