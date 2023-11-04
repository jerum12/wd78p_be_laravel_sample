<?php

namespace App\Http\Controllers;

use App\Models\Products;

class MyController extends Controller
{
    //
    public function test2method(){

        $products = Products::all();
        return view('test',['arrayProducts'=> $products]);
    }

    public function insert(){
        Products::create();
    }
}
