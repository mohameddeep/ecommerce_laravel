<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Catogry;
use App\Trait\UploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CatogryController extends Controller
{

    use UploadTrait;

    public function index()
    {
        $catogries=Catogry::paginate(2);
        return view('admin.pages.catogry.index',compact('catogries'));
    }

    public function create()
    {
        return view('admin.pages.catogry.add_catogry');
    }


    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'catogry_name' => 'required|max:255',
            'image' => 'required',
        ])->validate();
        $path=$this->upload($request,"catogries");
        Catogry::create([
            "catogry_name" => $request->catogry_name,
            "image" => $path,
        ]);

        return redirect()->route('admin_catogry.index')->with("message","catogry add successfully");

    }


    public function show($id)
    {
        $catogry=Catogry::findorFail($id);
        return view('admin.pages.catogry.show',compact('catogry'));
    }


    public function edit($id)
    {
        $catogry=Catogry::findorFail($id);
        return view('admin.pages.catogry.edit',compact('catogry'));
    }


    public function update(Request $request, $id)
    {
        Validator::make($request->all(), [
            'catogry_name' => 'required|max:255',
            'image' => 'required',
        ])->validate();
        $path=$this->upload($request,"catogries");
        $catogry=Catogry::findorFail($id);
        $catogry->update([
            "catogry_name" => $request->catogry_name,
            "image" => $path,
        ]);
        return redirect()->route('admin_catogry.index')->with("message","catogry updated successfully");
    }


    public function destroy($id)
    {
        $catogry=Catogry::findorFail($id);
        $catogry->delete();
        return redirect()->route('admin_catogry.index')->with("message","catogry deleted successfully");

    }
}
