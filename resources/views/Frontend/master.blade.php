@include('Frontend.common.head')
@include('sweetalert::alert')



<!-- Spinner Start -->
@include('Frontend.common.header')

<!-- Navbar End -->


<!-- Carousel Start -->
@yield('main-content')
<!-- Carousel End -->


<!-- Footer Start -->
@include('Frontend.common.footer')
<!-- Footer End -->


<!-- Back to Top -->

@include('Frontend.common.js')