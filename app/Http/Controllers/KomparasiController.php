<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KomparasiController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function compare($idProduct1, $idProduct2)
    {
        $product1 = Product::find($idProduct1)->first();
        $product2 = Product::find($idProduct2)->first();
    }
}
