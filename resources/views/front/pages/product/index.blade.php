@extends('front.layouts.master')
@section('title','home page')



@section('content')


 <!-- product section -->
 <section class="product_section layout_padding">
    <div class="container">
       <div class="heading_container heading_center">
          <h2>
             All <span>products</span>
          </h2>
       </div>
       <div style="padding-left: 200px;padding-bottom:50px">
                    <form action="{{ route('product.search') }}" method="get">
                        @csrf
                        <input type="text" name="search" placeholder="search for something....">
                        <input type="submit" class="btn btn-outline-primary" value="search" >
                    </form>
                </div>
       <div class="row">
        @foreach ($products as $product)

          <div class="col-sm-6 col-md-4 col-lg-4">
             <div class="box">
                <div class="option_container">
                   <div class="options">
                      <a href="{{ route('front_product.show',$product->id) }}" class="option1">
                     product details
                      </a>
                      <a href="{{ route('cart.create',$product->id) }}" class="option2">
                      Buy Now
                      </a>
                   </div>
                </div>
                <div class="img-box">
                   <img src="{{ asset('images') }}/{{$product->image}}" alt="">
                </div>
                <div class="detail-box">
                   <h5>
                     {{$product ->name}}
                   </h5>
                   @if ($product->discount)
                   <h6 style="color:red">
                    ${{$product ->discount}}
                 </h6>
                   <h6 style="text-decoration: line-through; color:blue">
                    ${{$product ->price}}
                 </h6>
                 @else
                 <h6>
                    ${{$product ->price}}
                 </h6>

                   @endif

                </div>
             </div>
          </div>
          @endforeach
       </div>
       {{-- {{ $products->links() }} --}}
    </div>
 </section>
 <!-- end product section -->


 <!-- client section -->
 <section class="client_section layout_padding">
    <div class="container">
       <div class="heading_container heading_center">
          <h2>
             Customer's Testimonial
          </h2>
       </div>
       <div id="carouselExample3Controls" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
             <div class="carousel-item active">
                <div class="box col-lg-10 mx-auto">
                   <div class="img_container">
                      <div class="img-box">
                         <div class="img_box-inner">
                            <img src="{{ asset('front') }}/images/client.jpg" alt="">
                         </div>
                      </div>
                   </div>
                   <div class="detail-box">
                      <h5>
                         Anna Trevor
                      </h5>
                      <h6>
                         Customer
                      </h6>
                      <p>
                         Dignissimos reprehenderit repellendus nobis error quibusdam? Atque animi sint unde quis reprehenderit, et, perspiciatis, debitis totam est deserunt eius officiis ipsum ducimus ad labore modi voluptatibus accusantium sapiente nam! Quaerat.
                      </p>
                   </div>
                </div>
             </div>
             <div class="carousel-item">
                <div class="box col-lg-10 mx-auto">
                   <div class="img_container">
                      <div class="img-box">
                         <div class="img_box-inner">
                            <img src="{{ asset('front') }}/images/client.jpg" alt="">
                         </div>
                      </div>
                   </div>
                   <div class="detail-box">
                      <h5>
                         Anna Trevor
                      </h5>
                      <h6>
                         Customer
                      </h6>
                      <p>
                         Dignissimos reprehenderit repellendus nobis error quibusdam? Atque animi sint unde quis reprehenderit, et, perspiciatis, debitis totam est deserunt eius officiis ipsum ducimus ad labore modi voluptatibus accusantium sapiente nam! Quaerat.
                      </p>
                   </div>
                </div>
             </div>
             <div class="carousel-item">
                <div class="box col-lg-10 mx-auto">
                   <div class="img_container">
                      <div class="img-box">
                         <div class="img_box-inner">
                            <img src="{{ asset('front') }}/images/client.jpg" alt="">
                         </div>
                      </div>
                   </div>
                   <div class="detail-box">
                      <h5>
                         Anna Trevor
                      </h5>
                      <h6>
                         Customer
                      </h6>
                      <p>
                         Dignissimos reprehenderit repellendus nobis error quibusdam? Atque animi sint unde quis reprehenderit, et, perspiciatis, debitis totam est deserunt eius officiis ipsum ducimus ad labore modi voluptatibus accusantium sapiente nam! Quaerat.
                      </p>
                   </div>
                </div>
             </div>
          </div>
          <div class="carousel_btn_box">
             <a class="carousel-control-prev" href="#carouselExample3Controls" role="button" data-slide="prev">
             <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
             <span class="sr-only">Previous</span>
             </a>
             <a class="carousel-control-next" href="#carouselExample3Controls" role="button" data-slide="next">
             <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
             <span class="sr-only">Next</span>
             </a>
          </div>
       </div>
    </div>
 </section>

@endsection


