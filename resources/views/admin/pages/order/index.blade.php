
@extends('admin.layouts.app')

@section('title','all orders')
@section('content')
  <div class="main-panel">
    <div class="content-wrapper">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                @if(session()->has('message'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
        {{ session()->get('message') }}
    </div>
    @endif
                <h4 class="card-title"><a class="btn btn-primary" href="{{ route('admin_product.create') }}">create new catogry</a></h4>
                <h1 class="card-description text-center mt-3"> All orders </h1>
                <div style="padding-left: 400px;padding-bottob:50px">
                    <form action="{{ route('order.search') }}" method="get">
                        @csrf
                        <input type="text" style="color: black" name="search">
                        <input type="submit" class="btn btn-outline-primary" value="search">
                    </form>
                </div>
                <div class="table-responsive">
                  <table class="table table-striped">
                    <thead>
                      <tr>

                        <th> name </th>
                        <th> email </th>
                        <th> phone </th>
                        <th> address </th>
                        <th> product name </th>
                        <th> product image</th>
                        <th> price </th>
                        <th> quantity </th>
                        <th> payment status </th>
                        <th> delivery status </th>
                        <th > actions </th>
                        <th > print to pdf </th>
                        <th > notification </th>
                      </tr>
                    </thead>
                    <tbody>

                @foreach ($orders as $order)


                      <tr>
                        <td> {{ $order->name }}</td>
                        <td> {{ $order->email }}</td>
                        <td> {{ $order->phone }}</td>
                        <td> {{ $order->address }}</td>
                        <td> {{ $order->product_name }}</td>

                        <td class="py-1">
                            <img src="{{ asset('images').'/'.$order->product_image }}" alt="image" />
                          </td>
                        <td> {{ $order->price }}</td>
                        <td> {{ $order->quantity }}</td>
                        <td> {{ $order->payment_status }}</td>
                        <td> {{ $order->delivery_status }}</td>
                         <td>
                            @if ($order->delivery_status == "processing")
                            <a href="{{ route('admin.order_status',$order->id) }}" class="btn btn-primary">update order</a>
                            @else
                            <p style="color: red">delivered</p>

                            @endif
                                                         </td>
                       <td>
                             <a href="{{ route('admin.printpdf',$order->id) }}" class="btn btn-primary">print</a>
                    </td>
                       <td>
                             <a href="{{ route('admin.notification',$order->id) }}" class="btn btn-primary">send mail</a>
                    </td>
                     {{-- <td>
                        <form action="{{ route('admin_product.destroy',$product->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button onclick="return confirm('are you sure to delete that?') " type="submit" class="btn btn-danger">delete</button>
                        </form>
                                               </td> --}}
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                  
                </div>
              </div>
            </div>
          </div>

    </div>
  </div>

  @endsection

