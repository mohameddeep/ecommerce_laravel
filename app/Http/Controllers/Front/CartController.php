<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function index()
    {
        //
    }

    public function create($id)

    {
        if(Auth::id()){
            $user=Auth::user();
            $product=Product::findorFail($id);
        return view('front.pages.cart.add_cart',compact('product','user'));

        }else{

            return redirect()->route('login');

        }

    }


    public function store(Request $request,$id)
    {
        $user=Auth::user();

        $product=Product::findorFail($id);
        $prodect_exist_id=Cart::where('product_id','=',"$id")->where("user_id",'=',"$user->id")->get('id')->first();
        if($prodect_exist_id){
            $cart=Cart::findOrfail($prodect_exist_id)->first();
            $quantity=$cart->quantity;
            $price=$cart->price;
            $cart->quantity=$quantity + $request->quantity;
            if($product->discount !=null){
                $cart->price=$product->discount * $cart->quantity;
            }else{
                $cart->price=$product->price * $cart->quantity;

            }
            $cart->save();

        }else{


        if($product->discount !=null){
            $price=$product->discount * $request->quantity;
        }else{
            $price=$product->price * $request->quantity;

        }
        Cart::create([
            "name" => $user->name,
            "email" => $user->email,
            "phone" => $user->phone,
            "address" => $user->address,
            "user_id" => $user->id,
            "product_name" => $product->name,
            "price" => $price,
            "product_image" => $product->image,
            "product_id" => $product->id,
            "quantity" => $request->quantity,
        ]);
    }
        return redirect()->route('cart.show');

    }


    public function show()
    {
        $user_id=Auth::user()->id;
        $cart=Cart::where("user_id","=",$user_id)->get();

        return view('front.pages.cart.show_cart',compact("cart"));
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        $cart=Cart::findorFail($id);
        $cart->delete();

        return redirect()->back()->with('message',"product remove from cart successfully");
    }
}
