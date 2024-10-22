<div class="product-section mt-150 mb-150">
    <div class="container">
      <div class="row pb-1 pt-2 mb-3">
        <label class="col-md-4 col-form-label text-md-end" for="">
            <font color = black>
              <strong> Select Category : </strong>
          </font>
        <select name="cat" id="cat" onchange="redirectToPage()" for="Category">
          <option value="">Select Category</option>
          <option value="{{url('shoes')}}">Shoes</option>
          <option value="{{url('bags')}}">Bags</option>
          <option value="{{url('acc')}}">Accessories</option>
          <option value="{{url('watches')}}">Watches</option>
        </select>

      <!-- this is also true code but without onchange

      <script>
          document.getElementById('cat').addEventListener('change', function() {
          var url = this.value;
          if (url) { // Make sure the value is not empty
            window.location.href = url;
        }
    });
        </script>
      -->
      <!-- this is another way -->
      <script>
       function redirectToPage() {
           var select = document.getElementById("cat");
           var selectedValue = select.value;
           if (selectedValue) {
               window.location.href = selectedValue;
           }
       }
   </script>
        </label>
      </div>

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
                    @if(auth()->check())
                    @if(auth()->user()->usertype === 1)

                      <a href="{{ url('edit_product',$item->id) }}" class="cart-btn"><i class="fas fa-edit"></i> Edit</a>
                      <a href="{{ url('deleteProduct',$item->id) }}" class="cart-btn"><i class="fas fa-trash"></i> Delete</a>
                    @else
                      <a href="{{ url('cart', ['productId' => $item->id]) }}" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                    @endif
                </div>
            </div>
          @endif
          @endforeach
          @endif
        </div>
        <div style="text-align: center;" >
              <a>{{$product->links()}}</a>
        </div>
    </div>
</div>
