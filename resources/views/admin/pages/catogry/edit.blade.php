
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
                <h4 class="card-title">edit catogry</h4>
                <form class="forms-sample" method="POST" action="{{ route('admin_catogry.update',$catogry->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                  <div class="form-group">
                    <label for="exampleInputName1">catogry Name</label>
                    <input type="text" class="form-control" value="{{ $catogry->catogry_name }}" name="catogry_name"  >
                  </div>
                  <div class="form-group">
                    <label>catogry image</label>
                    <div class="mb-3">

                        <input name="image" class="form-control" type="file" id="formFile">
                      </div>
                  </div>
                  <button type="submit" class="btn btn-primary mr-2">edit catogry</button>
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

