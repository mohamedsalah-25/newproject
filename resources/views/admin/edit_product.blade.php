<base href="/public">
@include('home.header')
<div class="container ">
  <div class="container">
    <div class="row justify-content-center pt-4 pb-4 " >
      <div class="col-md-8">
        <div class="card">
        <div class="card-header" style="background-color: #F28123; "><strong> Edit Product </strong></div>
      <div class="card-body" style="background-color: #051922">
<form class="" action="{{route('product.update',$data->id)}}" enctype="multipart/form-data" method="post" >
  @csrf
  @method('PUT')
  @if(session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif
  <div class="form-group">
      <input type="text" class="form-control" name="product_name" placeholder="Enter Product Name" value="{{$data['product_name'] }}">
  </div>
  <div class="form-group">
      <input type="text" class="form-control" name="description" placeholder="Enter Product Description" value="{{$data['description'] }}">
  </div>
  <div class="form-group">
      <input type="text" class="form-control" name="price" placeholder="Enter Product Price"value="{{$data['price'] }}">
  </div>
  <div class="row pb-1 pt-2 mb-3">
    <label class="col-md-4 col-form-label text-md-end" for="">
        <font color = white>
          <strong>  Product Category : </strong>
    </label>
      </font>
    <select name="cat" id="cat" for="Category" >
      <option><?= (isset($data['cat'])) ? $data['cat']:'Select Category' ?></option>
      <option value="Shoes">Shoes</option>
      <option value="Bags">Bags</option>
      <option value="Accessories">Accessories</option>
      <option value="Watches">Watches</option>
    </select>
  </div>
  <div class="row pb-1 pt-2 mb-3">
    <label class="col-md-4 col-form-label text-md-end" >
        <font color = white>
          <strong>Product Image : </strong>  </label>
          <div class="product-image" >
              <a href="{{url('single_product', ['productId' => $data->id])}}"><img src="/images/{{$data->image}}" alt="" width="100px" height="150px"></a>
          </div>
          <label class="col-md-4 col-form-label text-md-end" >
              <font color = white>
                <strong>Choose Another Image : </strong>  </label>
            <input type="file" name="image"   >
          </font>
  </div>
  <div class="form-btn">
    <div class="col-md-6 offset-lg-9 pt-3" >
      <input type="submit" class="btn btn-primary " value="Edit Product" name="submit">
  </div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
@include('home.footer')
