
@extends('admin.layouts.app')

@section('title','send mail')

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
                <h4 class="card-title">send mail to {{ $order->email }}</h4>
                <form class="forms-sample" method="post" action="{{ route('admin.storemail',$order->id) }}">
                    @csrf
                    <div class="form-group">
                      <label for="exampleInputName1"> greeting</label>
                      <input type="text" name="greeting" class="form-control" id="exampleInputName1">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">email firstline</label>
                      <input type="text" name="firstline" class="form-control" id="exampleInputEmail3">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">email body</label>
                      <input type="text" name="body" class="form-control" id="exampleInputEmail3">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">email button name</label>
                      <input type="text" name="button" class="form-control" id="exampleInputEmail3">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">email url</label>
                      <input type="text" name="url" class="form-control" id="exampleInputEmail3" >
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">email lastline</label>
                      <input type="text" name="lastline" class="form-control" id="exampleInputEmail3" >
                    </div>


                    <button type="submit" class="btn btn-primary mr-2">send mail</button>
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

