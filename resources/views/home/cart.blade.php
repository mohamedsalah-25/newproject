<!-- header -->
@include('home.header')
<!-- end header -->

<!-- cart -->
<div class="cart-section mt-150 mb-150">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-12">
        <div class="cart-table-wrap">
          <table class="cart-table">
            <thead class="cart-table-head">
              <tr class="table-head-row">
                <th class="product-remove"></th>
                <th class="product-image">Product Image</th>
                <th class="product-name">Name</th>
                <th class="product-price">Price</th>
                <th class="product-quantity">Quantity</th>
                <th class="product-total">Total</th>
              </tr>
            </thead>
            <tbody>
              @php
                  $grandTotal = 0; // Initialize the grand total variable
              @endphp
          @if(isset($cart))
          @foreach($cart as $item)
              <tr class="table-body-row">
                <td class="product-remove"><a href="{{url('delete',$item->id)}}"><i class="far fa-window-close"></i></a></td>
                <td class="product-image"><img src="/images/{{$item->image}}" alt=""></td>
                <td class="product-name">{{$item->product_name}}</td>
                <td class="product-price">{{$item->price}} $</td>
                <td class="product-quantity">
                  <form method="POST" action="{{ route('edit_quantity', $item->id) }}">
                    @csrf
                    @method('patch')
                      <input type="number" name="quantity" value="{{$item->quantity}}" min="1" >
                      <input type="submit"  value="edit" class="boxed-btn" href="" >
                </td>
                  </form>
                  <td class="product-total">{{$total=$item->price * $item->quantity;}} $</td>
              </tr>
              @php
                      $grandTotal += $total; // Accumulate the total value to the grand total
              @endphp
          @endforeach
          @endif
            </tbody>
          </table>
        </div>
      </div>

      <div class="col-lg-4">
        <div class="total-section">
          <table class="total-table">
            <thead class="total-table-head">
              <tr class="table-total-row">
                <th>Total</th>
                <th>Price</th>
              </tr>
            </thead>
            <tbody>
              <tr class="total-data">
                <td><strong>Subtotal: </strong></td>
                <td>{{ $grandTotal}} $</td>
              </tr>
              <tr class="total-data">
                <td><strong>Shipping: </strong></td>
                <td>{{$shipping = 45}} $</td>
              </tr>
              <tr class="total-data">
                <td><strong>Total: </strong></td>
                @if(($grandTotal > 0))
                <td>{{$grandTotal + $shipping}} $</td>
                @else
                <td>0</td>
                @endif
              </tr>
            </tbody>
          </table>
        </div>
        @if(isset($item))
        <form method="post" action="{{ url('myorder', ['id' => $item->id]) }}">
              @csrf

              <p class="pt-5"><input type="submit" value="Confirm Order"></p>
            </form>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end cart -->

<!-- hero area -->
@include('home.footer')
<!-- end hero area -->
