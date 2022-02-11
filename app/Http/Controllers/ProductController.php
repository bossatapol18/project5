<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    //
    public function index(Request $request){
        $product =DB::table('products')
        ->join('producttypes','products.producttype_id','producttypes.id')
        ->select('products.*','producttypes.producttype_name')->paginate(2);
        return view('product.index',compact('product'));
    }
}
