<header class="header_section">
    <div class="container">
       <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="index.html"><img width="250" src="{{ asset('front') }}/images/logo.png" alt="#" /></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""> </span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
             <ul class="navbar-nav">
                <li class="nav-item active">
                   <a class="nav-link" href="{{ route("home") }}">Home <span class="sr-only">(current)</span></a>
                </li>

                @auth
                <li class="nav-item">
                    <li class="nav-item dropdown">
                   <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label">catogries <span class="caret"></span></a>
                   <ul class="dropdown-menu">

                    @isset($catogries)
                    @foreach ( $catogries as $catogry)
                    <li><a href="{{ route('catogry.index',$catogry->id) }}">{{ $catogry->catogry_name }}</a></li>

                    @endforeach
                    @endisset


                   </ul>
                </li>
                <li class="nav-item">
                   <a class="nav-link" href="{{ route('products.index') }}">Products</a>
                </li>
                <li class="nav-item">
                   <a class="nav-link" href="contact.html">Contact</a>
                </li>
                <li class="nav-item">
                   <a class="nav-link" href="{{ route('cart.show') }}">cart</a>
                </li>
                <li class="nav-item">
                   <a class="nav-link" href="{{ route('order.index') }}">orders</a>
                </li>
                    <x-app-layout>

                    </x-app-layout>
                 </li>
                @else

                <li class="nav-item">
                   <a class="nav-link" href="{{ route('login') }}">login</a>
                </li>
                <li class="nav-item">
                   <a class="nav-link" href="{{ route('register') }}">register</a>
                </li>
                @endauth

                <form class="form-inline">
                   <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                   <i class="fa fa-search" aria-hidden="true"></i>
                   </button>
                </form>
             </ul>
          </div>
       </nav>
    </div>
 </header>
