<!-- header -->
@include('home.header')
<!-- end header -->
<div class=" mt-100 mb-100">
  <div class="order-details-wrap">
    <table style="margin: 0 auto;" class="order-details">
      <thead >
        <tr>
          <th colspan="3" style="text-align: center; background-color: #F28123">Your order Details</th>
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
        <form action="{{ url('myorder') }}" enctype="multipart/form-data" method="get" >
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
    </table>
  </div>
</div>
<!-- hero area -->
@include('home.footer')
<!-- end hero area -->
