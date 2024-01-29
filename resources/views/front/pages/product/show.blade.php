@extends('front.layouts.master')
@section('title','home page')

@section('content')
<br>
<div class="card m-auto " style="width: 18rem;">
    <img src="{{ asset('images') }}/{{$product->image}}" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">product name: <span style="color: red">{{ $product -> name }}</span></h5>
      <p class="card-text">description: <span style="color: red">{{ $product -> description }}</span></p>
    </div>
    <ul class="list-group list-group-flush">
      <li class="list-group-item">price: <span style="color: red">{{ $product -> price }}</span></li>
      <li class="list-group-item">discount: <span style="color: red">{{ $product -> discount }}</span></li>
      <li class="list-group-item">quantity: <span style="color: red">{{ $product -> quantity }}</span></li>
    </ul>
    <div class="card-body">
      <a href="{{ route('cart.create',$product->id) }}" class="btn btn-primary">add to card</a>
    </div>
  </div>


<br>
@endsection


