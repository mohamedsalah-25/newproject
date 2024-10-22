<!-- header -->
@include('home.header')
<!-- end header -->


<div class="col-lg-5">
  <div class="order-details-wrap">
    <table class="order-details">
      <thead>
        <tr>
          <th style="background-color: #F28123;">Your order Details</th>
          @if(session($message))
              <div class="alert alert-success">
                  {{ session('message') }}
              </div>
          @endif
        </tr>
      </thead>
      <tbody class="order-details-body">
        <tr>
          <td class="col-lg-2" style="background-color: #051922; color: white;" ><strong>Product</strong></td>
          <td class="col-lg-2" style="background-color: #051922; color: white;"><strong>Quantity</strong></td>
          <td class="col-lg-7" style="background-color: #051922; color: white;"><strong>Order created at </strong></td>
        </tr>
        @php
            $grandTotal = 0; // Initialize the grand total variable
        @endphp
        <form class="" action="{{ url('myorder') }}" enctype="multipart/form-data" method="get" >
          @csrf
        @if(isset($myorder))
          @foreach($myorder as $item)
        <tr>
          <td>{{$item->product_name}} </td>
          <td>{{$item->quantity}} </td>
          <td>{{$item->created_at}} </td>
        </tr>
        @endforeach
        @endif
        <form>
      </tbody>
      <tbody>
        <tr>
          <td style="background-color: #F28123;"><strong></strong></td>


        </tr>
      </tbody>
    </table>
  </div>
</div>
</div>
</div>
</div>





<!-- hero area -->
@include('home.footer')
<!-- end hero area -->
