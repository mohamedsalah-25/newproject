<!-- header -->
@include('home.header')
<!-- end header -->
@if(auth()->user())
<h3>Welcome {{auth()->user()->name}}</h3>
@endif
<!-- hero area -->
@include('home.footer')
<!-- end hero area -->
