<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
    <a class="sidebar-brand brand-logo" href="{{url('index')}}"><img src="template/assets/img/oppa logo.png" alt="logo" /></a>
    <a class="sidebar-brand brand-logo-mini" href="{{url('index')}}"><img src="template/assets/img/oppa logo.png" alt="logo" /></a>
  </div>
  <ul class="nav">
    <li class="nav-item profile">
      <div class="profile-desc">
        <div class="profile-pic">
          <div class="count-indicator">
            <img class="img-xs rounded-circle " src="admin/assets/images/faces/face15.jpg" alt="">
            <span class="count bg-success"></span>
          </div>
            @if(auth()->check())
          <div class="profile-name">
            <h5 class="mb-0 font-weight-normal">{{auth()->user()->name}}</h5>
            <span>admin</span>
          </div>
          @endif
        </div>

      </div>
    </li>
    <li class="nav-item nav-category">
      <span class="nav-link">Navigation</span>
    </li>
    <li class="nav-item menu-items">
      <a class="nav-link" href="{{url('index')}}">
        <span class="menu-icon">
          <i class="mdi mdi-speedometer"></i>
        </span>
        <span class="menu-title" >Home</span>
      </a>
    </li>
    <li class="nav-item menu-items">
      <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <span class="menu-icon">
          <i class="mdi mdi-laptop"></i>
        </span>
        <span class="menu-title">Products</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{url('all')}}">All Product</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{url('watches')}}">Watches</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{url('shoes')}}">Shoes</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{url('acc')}}">ACC</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{url('bags')}}">Bags</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item menu-items">
      <a class="nav-link" href="{{url('add_product')}}">
        <span class="menu-icon">
          <i class="mdi mdi-playlist-play"></i>
        </span>
        <span class="menu-title">Add products</span>
      </a>
    </li>
  </ul>
</nav>
