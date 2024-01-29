<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
// use Session;
use Stripe;

class OrderController extends Controller
{


    public function index(){
        $userid=Auth::user()->id;

        $orders=Order::where('user_id','=',$userid)->get();

        return view('front.pages.order.index',compact('orders'));
    }
    public function cancelorder($id){

        $order=Order::findorFail($id)->delete();

        return redirect()->route('order.index')->with('message','ordered canceled successfully');
    }
    public function cash(){
        $user_id=Auth::user()->id;


        $orders=Cart::where("user_id","=",$user_id)->get();

        foreach($orders as $order){
            Order::create([
                "name" => $order->name,
                "email" => $order->email,
                "phone" => $order->phone,
                "address" => $order->address,
                "user_id" => $order->user_id,
                "product_name" => $order->product_name,
                "price" => $order->price,
                "quantity" => $order->quantity,
                "product_image" => $order->product_image,
                "product_id" => $order->product_id,
                "payment_status" => "cash on delivery",
                "delivery_status" => "processing",
            ]);

            $cart_id=$order->id;
            $cart_id=Cart::findorFail($cart_id);
            $cart_id->delete();


        }
        return redirect()->back()->with("message","we received your order,please wait untill arrive to you");
    }


    public function stripe($totalprice){
        return view('front.pages.order_payment.stripe',compact("totalprice"));
    }
//payment function using stripe
    public function stripestore(Request $request,$totalprice){

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe\Charge::create ([
                "amount" => $totalprice * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment from itsolutionstuff.com."
        ]);

        Session::flash('success', 'Payment successful!');
        $user_id=Auth::user()->id;


        $orders=Cart::where("user_id","=",$user_id)->get();

        foreach($orders as $order){
            Order::create([
                "name" => $order->name,
                "email" => $order->email,
                "phone" => $order->phone,
                "address" => $order->address,
                "user_id" => $order->user_id,
                "product_name" => $order->product_name,
                "price" => $order->price,
                "quantity" => $order->quantity,
                "product_image" => $order->product_image,
                "product_id" => $order->product_id,
                "payment_status" => "paid",
                "delivery_status" => "processing",
            ]);

            $cart_id=$order->id;
            $cart_id=Cart::findorFail($cart_id);
            $cart_id->delete();
        }

        return back();

    }
}
