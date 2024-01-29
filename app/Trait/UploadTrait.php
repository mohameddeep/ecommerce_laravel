<?php


namespace App\Trait;

use Illuminate\Http\Request;

trait UploadTrait{
    public function upload(Request $request ,$directfile){

        $imagename=$request->file('image')->getClientOriginalName();
        //$imageexten=$request->file('image')->getClientOriginalExtension();
        $path=$request->file('image')->store($directfile,'files');//add random name to image and take two parameters
        //$path=$request->file('image')->storeAs($directfile,$imagename,'files');//add detemined name to image and take three params

        return $path;
    }
}

