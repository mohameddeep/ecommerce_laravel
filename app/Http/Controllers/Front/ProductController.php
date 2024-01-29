<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){

        $products=Product::paginate(5);
        return view('front.pages.product.index',compact('products'));
    }


    public function show($id){
        $product=Product::findorFail($id);
        return view('front.pages.product.show',compact('product'));

    }


    public function search(Request $request){
        $search=$request->search;

        $products=Product::where("name","like","%$search%")->paginate(5);
        return view('front.pages.product.index',compact("products"));
    }
}
