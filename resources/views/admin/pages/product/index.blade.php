
@extends('admin.layouts.app')

@section('title','admin page')
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
                <h1 class="card-description text-center mt-3"> All products
                </h1>
                <div class="table-responsive">
                  <table class="table table-striped">
                    <thead>
                      <tr>

                        <th> product name </th>
                        <th> product catogry </th>
                        <th> image </th>
                        <th> description </th>
                        <th> quantity </th>
                        <th> price </th>
                        <th> discount </th>
                        <th colspan="3" class="text-center"> actions </th>
                      </tr>
                    </thead>
                    <tbody>

@foreach ($products as $product)


                      <tr>
                        <td> {{ $product->name }}</td>
                        <td> {{ $product->catogry->catogry_name ?? ""}}</td>
                        <td class="py-1">
                            <img src="{{ asset('images').'/'.$product->image }}" alt="image" />
                          </td>
                        <td> {{ $product->description }}</td>
                        <td> {{ $product->quantity }}</td>
                        <td> {{ $product->price }}</td>
                        <td> {{ $product->discount }}</td>
                        <td>
                             <a href="{{ route('admin_product.edit',$product->id) }}" class="btn btn-primary">edit</a>
                            </td>
                        <td>
                             <a href="{{ route('admin_product.show',$product->id) }}" class="btn btn-primary">show</a>
                    </td>
                    <td>
                        <form action="{{ route('admin_product.destroy',$product->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button onclick="return confirm('are you sure to delete that?') " type="submit" class="btn btn-danger">delete</button>
                        </form>
                                               </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                  {{ $products->links() }}
                </div>
              </div>
            </div>
          </div>

    </div>
  </div>

  @endsection

