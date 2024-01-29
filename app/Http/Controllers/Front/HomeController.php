<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Catogry;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use PhpParser\Node\Stmt\TryCatch;

class HomeController extends Controller
{


    public function index(){

        $products=Product::paginate(5);
        return view('front.pages.index',compact('products'));
    }

    public function redirect(){
        $role=Auth::user()->role;
       if($role == "1"){
        $products=Product::get()->count();
        $orders=Order::get()->count();
        $users=User::get()->count();
        $orders_price=Order::get();
        $orders_processing=Order::where('delivery_status','=','processing')->get()->count();
        $orders_delivered=Order::where('delivery_status','=','delevired')->get()->count();
        $totalprice=0;
        foreach($orders_price as $order){
            $totalprice+=$order->price;
        }
        return view('admin.pages.index',compact('products','orders','users','totalprice','orders_processing','orders_delivered'));
       }else{
        $products=Product::paginate(5);
        $catogries=Catogry::get();

        return view('front.pages.index',compact('products','catogries'));

       }

    }

    public function catogry($id){

        $products=Product::where('catogry_id','=',$id)->paginate(5);
        $catogries=Catogry::get();
        return view('front.pages.index',compact('products','catogries'));
    }


    public function googlepage(){

        return Socialite::driver('google')->redirect();

    }
    public function googlecallback(){



        try{
            $user=Socialite::driver('google')->user();
            $finduser=User::where("google_id",'=',$user->id)->first();
            if($finduser){
                Auth::login($finduser);
                // if($finduser->role == 1){
                //     return redirect()->route('home');
                // }
                return redirect()->route('home');

            }else{

               $newuser= User::create([
                    "name" =>$user->name,
                    "email" =>$user->email,
                    "google_id" =>$user->id,
                    "password" =>"112000ab",
                    "phone" =>"010333455",
                    "address" =>"mansoura"
               ]);

               Auth::login($newuser);

               return redirect()->route('home');

            }

        }catch(Exception $e){
            dd($e->getMessage());

        }

    //     $githubUser = Socialite::driver('github')->user();

    // $user = User::updateOrCreate([
    //     'github_id' => $githubUser->id,
    // ], [
    //     'name' => $githubUser->name,
    //     'email' => $githubUser->email,
    //     'github_token' => $githubUser->token,
    //     'github_refresh_token' => $githubUser->refreshToken,
    // ]);

    // Auth::login($user);

    // return redirect('/dashboard');

    }

}
