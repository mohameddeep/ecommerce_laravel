<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Catogry;
use App\Models\Product;
use App\Trait\UploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    use UploadTrait;

    public function index()
    {
        $products=Product::paginate(2);
        return view('admin.pages.product.index',compact('products'));
    }

    public function create()
    {
        $catogries=Catogry::get();
        return view('admin.pages.product.add_product',compact('catogries'));
    }


    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'required|max:255',
            'image' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'catogry_id' => 'required',
        ])->validate();
        $path=$this->upload($request,"products");
        Product::create([
            "name" => $request->name,
            "description" => $request->description,
            "discount" => $request->discount,
            "quantity" => $request->quantity,
            "price" => $request->price,
            "catogry_id" => $request->catogry_id,
            "image" => $path,
        ]);

        return redirect()->route('admin_product.index')->with("message","product add successfully");

    }


    public function show($id)
    {
        $product=Product::findorFail($id);
        return view('admin.pages.product.show',compact('product'));
    }


    public function edit($id)
    {
        $product=Product::findorFail($id);
        $catogries=Catogry::get();
        return view('admin.pages.product.edit',compact('product','catogries'));
    }


    public function update(Request $request, $id)
    {
        Validator::make($request->all(), [
            'name' => 'required|max:255',
            'image' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'catogry_id' => 'required',
        ])->validate();
        $path=$this->upload($request,"products");
        $product=Product::findorFail($id);
        $product->update([
            "name" => $request->name,
            "description" => $request->description,
            "discount" => $request->discount,
            "quantity" => $request->quantity,
            "price" => $request->price,
            "catogry_id" => $request->catogry_id,
            "image" => $path,
        ]);

        return redirect()->route('admin_product.index')->with("message","product updated successfully");
    }


    public function destroy($id)
    {
        $product=Product::findorFail($id);
        $product->delete();
        return redirect()->route('admin_product.index')->with("message","product deleted successfully");

    }
}
