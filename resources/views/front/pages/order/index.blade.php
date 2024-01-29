@extends('front.layouts.master')
@section('title','order page')


@section('content')
<section class="why_section layout_padding">
    <div class="container">

       <div class="row">
          <div class="col-lg-8 offset-lg-2">
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{ session()->get('message') }}
            </div>
             <div class="full">
                <div class="heading_container heading_center">
                    <h2>
                        my orders
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
                          <th> payment status </th>
                          <th> delivery status </th>
                          <th> cancel order </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $totalprice=0; ?>

  @foreach ($orders as $order)


                        <tr>
                          <td> {{ $order->product_name }}</td>
                          <td> {{ $order->quantity}}</td>
                          <td> ${{ $order->price}}</td>
                          <td class="py-1">
                              <img src="{{ asset('images').'/'.$order->product_image }}" width="50px" alt="image" />
                            </td>
                            <td> {{ $order->payment_status}}</td>
                            <td> {{ $order->delivery_status}}</td>
                            @if($order->delivery_status == "processing")
                      <td>
                          <form action="{{ route('order.destroy',$order->id) }}" method="post">
                              @csrf
                              @method('delete')
                              <button onclick="return confirm('are you sure to delete that?') " style="color:black" type="submit" class="btn btn-danger">cancel order</button>
                          </form>
                    </td>
                    @else
                    <td>delivered</td>
                    @endif
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>


                      </div>
          </div>
       </div>
    </div>
 </section>
@endsection


