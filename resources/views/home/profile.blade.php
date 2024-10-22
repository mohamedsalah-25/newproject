<!-- header -->
@include('home.header')
<!-- end header -->

<h3>Welcome {{auth()->user()->name}}</h3>

<!-- hero area -->
@include('home.footer')
<!-- end hero area -->
