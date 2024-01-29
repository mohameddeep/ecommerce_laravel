@extends('front.layouts.master')
@section('title','cart page')



@section('content')
<section class="why_section layout_padding">
    <div class="container">

       <div class="row">
          <div class="col-lg-8 offset-lg-2">
            @if(session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{ session()->get('message') }}
            </div>
            @endif
             <div class="full">
                <div class="heading_container heading_center">
                    <h2>
                        all carts
                    </h2>
                 </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>

                          <th> product name </th>
                          <th> quantity </th>
                          <th> price </th>
                          <th> image </th>
                          <th> actions </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $totalprice=0; ?>

  @foreach ($cart as $car)


                        <tr>
                          <td> {{ $car->product_name }}</td>
                          <td> {{ $car->quantity}}</td>
                          <td> ${{ $car->price}}</td>
                          <td class="py-1">
                              <img src="{{ asset('images').'/'.$car->product_image }}" width="50px" alt="image" />
                            </td>

                      <td>
                          <form action="{{ route('cart.destroy',$car->id) }}" method="post">
                              @csrf
                              @method('delete')
                              <button onclick="return confirm('are you sure to delete that?') " type="submit" class="btn btn-danger">remove</button>
                          </form>
                                                 </td>
                        </tr>
                        <?php $totalprice=$totalprice+$car->price; ?>
                        @endforeach
                      </tbody>
                    </table>
                  </div>

                  <div class="heading_container heading_center">
                    <p class="h5">
                       total price : <span>${{ $totalprice }}</span>
                    </p>
                    <p class="h3">
                    proceed to order
                    </p>
                    <p>
                    <a href="{{ route('order.cash') }}" class="btn btn-danger">cash on delivery</a>
                    <a href="{{ route('stripe',$totalprice) }}" class="btn btn-danger">pay using card</a>
                    </p>
                 </div>
                      </div>
          </div>
       </div>
    </div>
 </section>
@endsection


