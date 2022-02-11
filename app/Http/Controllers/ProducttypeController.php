<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProducttypeController extends Controller
{
    //
    public function index(){
        return view('product.type.index');
    }
}
