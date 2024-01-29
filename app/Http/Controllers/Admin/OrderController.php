<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Notifications\OrderNotification;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class OrderController extends Controller
{
    public function index(){
        $orders=Order::paginate(10);
        return view('admin.pages.order.index',compact('orders'));

    }

    public function order_status($id){

        $order_id=Order::findorFail($id);
        $order_id->update([
            "payment_status" => "paid",
            "delivery_status" => "delevired",
        ]);
        return redirect()->back();
    }

    public function printpdf($id){
        $order=Order::findOrfail($id);
        $pdf = FacadePdf::loadView('admin.pages.order.orderdetails_pdf',compact("order"));
    return $pdf->download('orderdetails.pdf');

    }


    public function sendmail($id){

        $order=Order::findorFail($id);
        return view('admin.pages.order.sendmail',compact('order'));
    }
    public function storemail(Request $request,$id){

        $order=Order::findorFail($id);

        $data=[
            "greeting"=>$request->greeting,
            "firstline"=>$request->firstline,
            "body"=>$request->body,
            "button"=>$request->button,
            "url"=>$request->url,
            "lastline"=>$request->lastline,
        ];
        Notification::send($order,new OrderNotification($data));

        return redirect()->route('admin_order.index')->with("mail send successfully");
    }


    public function search(Request $request){
        $search=$request->search;


        $orders=Order::where("name","like","%$search%")->get();
        return view('admin.pages.order.index',compact('orders'));
    }
}
