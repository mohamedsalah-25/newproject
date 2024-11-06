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
        <a>  <img src="/images/{{$product->image}}" alt="{{ $product->name }}" id="myImage-{{ $product->id }}"
             onclick="openModal({{ $product->id }})"></a>
        </div>
        <div id="imageModal-{{ $product->id }}" class="modal">
            <span class="close" onclick="closeModal({{ $product->id }})">&times;</span>
            <img class="modal-content" id="fullImage-{{ $product->id }}">
            <div class="caption">{{ $product->name }}</div>
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

<script type="text/javascript">
function openModal(id) {
    const modal = document.getElementById(`imageModal-${id}`);
    const fullImage = document.getElementById(`fullImage-${id}`);
    const thumbnailImage = document.getElementById(`myImage-${id}`);

    modal.style.display = "block";
    fullImage.src = thumbnailImage.src;
}

function closeModal(id) {
    document.getElementById(`imageModal-${id}`).style.display = "none";
}

// Close modal if user clicks outside of the image content
window.onclick = function(event) {
    const modals = document.getElementsByClassName("modal");
    for (const modal of modals) {
        if (event.target === modal) {
            modal.style.display = "none";
        }
    }
};

</script>

    <div class="product-section mt-150 mb-150">
      <div class="container">
        <h3 class="">Product Gallary</h3>
        <div class="row">
      @foreach ($product->galleries as $gallery)
      <div class="col-lg-4 col-md-6 offset-md-3 offset-lg-0 text-center">
        <div class="single-product-item">
            <div class="product-image">
        <a><img src="{{ asset('images/gallery/' . $gallery->image_path) }}" alt="{{ $product->product_name }}" id="myImage-{{ $gallery->id }}" width="200px" height="200px"  onclick="openModal({{ $gallery->id }})"></a>
        <div id="imageModal-{{ $gallery->id }}" class="modal">
          <span class="close" onclick="closeModal({{ $gallery->id }})">&times;</span>
          <img class="modal-content" id="fullImage-{{ $gallery->id }}">
          <div class="caption"></div>
        </div>
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
