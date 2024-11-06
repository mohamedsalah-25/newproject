<!-- header -->
@include('home.header')
<!-- end header -->
@if($product->count() > 0)
<div class="single-product mt-150 mb-150">
  <div class="container">
    <div class="product-section mt-150 mb-150">
      <div class="container">
        <div class="row">
@foreach($product as $item)
    <div class="col-lg-4 col-md-6 offset-md-3 offset-lg-0 text-center">
        <div class="single-product-item">
            <div class="product-image">
                <a href="{{url('single_product', ['productId' => $item->id])}}"><img src="/images/{{$item->image}}" alt="" width="200px" height="200px"></a>
            </div>
            <h3>{{$item->product_name}}</h3>
            <p class="product-price"><span></span> {{$item->price}} $</p>
                <input type="hidden" name="quantity" value="1">
                <a href="{{ url('cart', ['productId' => $item->id]) }}" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
        </div>
    </div>
@endforeach
        </div>
      </div>
    </div>
  </div>
</div>
@else
<div style="text-align:center;" class="alert alert-danger">
<h3>Product do not found</h3>
</div>

@endif

<!-- hero area -->
@include('home.footer')
<!-- end hero area -->
