@include('front.layouts.header')

         <!-- header section strats -->
         @include('front.layouts.nav')
         <!-- end header section -->
         <!-- slider section -->
         @yield('slider')
         <!-- end slider section -->

      <!-- why section -->
      @yield('content')
      <!-- footer start -->
      @include('front.layouts.footer')
