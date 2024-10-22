
<div class="product-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="section-title">
                    <h3><span class="orange-text">Our</span> Products</h3>
                </div>
            </div>
        </div>
        <div class="row">
          @if(isset($product))
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
          @endif
          
        </div>
        <div style="text-align: center;" >
          <a href="{{url('all')}}" class="cart-btn"><i class="fas fa-plus"></i> View More</a>
        </div>
      </div>
</div>
