<!-- header -->
<!-- header -->
<base href="/public">
@include('home.header')
<!-- end header -->

<!-- single product -->
<div class="single-product mt-150 mb-150">
  <div class="container">
    <div class="row">
      @if(isset($product))
      <div class="col-md-5">
        <div class="single-product-img">
          <img src="/images/{{$product->image}}" alt="">
        </div>
      </div>
      <div class="col-md-7">
        <div class="single-product-content">
          <h3>{{$product->product_name}}</h3>
          <p class="single-product-pricing"><span></span> {{$product->price}} $</p>
          <p>{{$product->description}} </p>
          @if(auth()->check())
          @if(auth()->user()->usertype == 1)
          <a href="{{ url('edit_product',$product->id) }}" class="cart-btn"><i class="fas fa-edit"></i> Edit</a>
          <a href="{{ url('deleteProduct',$product->id) }}" class="cart-btn"><i class="fas fa-trash"></i> Delete</a>
          @else

            <a href="{{ url('cart', ['productId' => $product->id]) }}" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
            @endif
            @endif
            <p class="pt-2 pb-2"><strong>Categories: </strong>{{$product->cat}} </p>

          <h4>Share:</h4>
          <ul class="product-share">
            <li><a href=""><i class="fab fa-facebook-f"></i></a></li>
            <li><a href=""><i class="fab fa-twitter"></i></a></li>
            <li><a href=""><i class="fab fa-google-plus-g"></i></a></li>
            <li><a href=""><i class="fab fa-linkedin"></i></a></li>
          </ul>
        </div>
      </div>

    </div>

    <div class="product-section mt-150 mb-150">
      <div class="container">
        <h3 class="">Product Gallary</h3>
        <div class="row">
      @foreach ($product->galleries as $gallery)
      <div class="col-lg-4 col-md-6 offset-md-3 offset-lg-0 text-center">
        <div class="single-product-item">
            <div class="product-image">
        <a href=""><img src="{{ asset('images/gallery/' . $gallery->image_path) }}" alt="{{ $product->product_name }}" width="200px" height="200px"></a>
            </div>
          </div>
        </div>
        @endforeach

      </div>
    </div>
  </div>
</div>
</div>

@endif
<!-- end single product -->


@include('home.footer')
<!-- end hero area -->
