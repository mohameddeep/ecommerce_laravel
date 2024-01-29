
@extends('admin.layouts.app')

@section('title','admin page')

@section('content')
  <div class="main-panel">
    <div class="content-wrapper">
        <div class="col-12 grid-margin stretch-card">

            <div class="card">
              <div class="card-body">
                @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                <h4 class="card-title">edit product</h4>
                <form class="forms-sample" method="post" action="{{ route('admin_product.update',$product->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group">
                      <label for="exampleInputName1">product Name</label>
                      <input type="text" name="name" value={{ $product->name }} class="form-control" id="exampleInputName1" placeholder="Name">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">price</label>
                      <input type="text" name="price" value={{ $product->price }} class="form-control" id="exampleInputEmail3" placeholder="price">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">discount</label>
                      <input type="text" name="discount" value={{ $product->discount }} class="form-control" id="exampleInputEmail3" placeholder="discount">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">quantity</label>
                      <input type="text" name="quantity" value={{ $product->quantity }} class="form-control" id="exampleInputEmail3" placeholder="quantity">
                    </div>

                    <div class="form-group">
                      <label for="exampleSelectGender">catogry</label>
                      <select name="catogry_id" class="form-control" id="exampleSelectGender">
                        <option value={{ $product->catogry_id }} selected>{{ $product->catogry->catogry_name ?? ""}} </option>
                        @foreach ($catogries as $catogry)
                        <option value="{{ $catogry->id }}">{{ $catogry->catogry_name }}</option>
                        @endforeach

                      </select>
                    </div>
                    <div class="form-group">
                        <label>product image</label>
                        <div class="mb-3">

                            <input name="image" class="form-control" type="file" id="formFile">
                          </div>
                      </div>

                    <div class="form-group">
                      <label for="exampleTextarea1">description</label>
                      <textarea name="description" class="form-control" id="exampleTextarea1" rows="4">{{ $product->description }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">edit product</button>
                  </form>
              </div>
            </div>
          </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <footer class="footer">
      <div class="d-sm-flex justify-content-center justify-content-sm-between">
        <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin templates</a> from Bootstrapdash.com</span>
      </div>
    </footer>
    <!-- partial -->
  </div>

  @endsection

