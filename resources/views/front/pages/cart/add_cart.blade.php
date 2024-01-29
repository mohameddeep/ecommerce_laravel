@extends('front.layouts.master')
@section('title','home page')


@section('content')
<section class="why_section layout_padding">
    <div class="container">

       <div class="row">
          <div class="col-lg-8 offset-lg-2">
             <div class="full">
                <h4 class="card-title">add your product to cart</h4>
                <form class="forms-sample" method="post" action="{{ route('cart.store',$product->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label for="exampleInputName1">user Name</label>
                      <input type="text" value="{{ $user->name }}" name="name" class="form-control" id="exampleInputName1" placeholder="Name">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">user email</label>
                      <input type="email" value="{{ $user->email }}" name="email" class="form-control" id="exampleInputName1" >
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">user phone</label>
                      <input type="text" value="{{ $user->phone }}" name="phone" class="form-control" id="exampleInputName1" >
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">user address</label>
                      <input type="text"  value="{{ $user->address }}" name="address" class="form-control" id="exampleInputName1" >
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">product name</label>
                      <input type="text"  value="{{ $product->name }}" name="product_name" class="form-control" id="exampleInputName1" >
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">product price</label>
                      <input type="text"  value="{{ $product->price }}" name="price" class="form-control" id="exampleInputName1" >
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">quantity</label>
                      <input type="number" name="quantity" class="form-control" value="1" id="exampleInputEmail3" placeholder="enter quatity you want">
                    </div>

                    <input type="submit" value="add to cart" />
                  </form>
             </div>
          </div>
       </div>
    </div>
 </section>
@endsection


