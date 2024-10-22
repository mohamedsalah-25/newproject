@include('home.header')
<div class="container ">
  <div class="container">
    <div class="row justify-content-center pt-4 pb-4 " >
      <div class="col-md-8">
        <div class="card">
        <div class="card-header" style="background-color: #F28123; "><strong> Add Product</strong></div>
      <div class="card-body" style="background-color: #051922">
<form class="" action="/add_product" enctype="multipart/form-data" method="post" >
  @csrf
  <div class="form-group">
      <input type="text" class="form-control" name="product_name" placeholder="Enter Product Name" required>
  </div>
  <div class="form-group">
      <input type="text" class="form-control" name="description" placeholder="Enter Product Description">
  </div>
  <div class="form-group">
      <input type="text" class="form-control" name="price" placeholder="Enter Product Price" required>
  </div>
  <div class="row pb-1 pt-2 mb-3">
    <label class="col-md-4 col-form-label text-md-end" for="">
        <font color = white>
          <strong>  Product Category : </strong>
    </label>
      </font>
    <select name="cat" id="cat" for="Category" required>
      <option value="">Select Category</option>
      <option value="Shoes">Shoes</option>
      <option value="Bags">Bags</option>
      <option value="Accessories">Accessories</option>
      <option value="Watches">Watches</option>
    </select>
  </div>
  <div class="row pb-1 pt-2 mb-3">
    <label class="col-md-4 col-form-label text-md-end" >
    <font color = white>
          <strong>Choose Product Image : </strong>  </label>
      <input type="file" name="image" required >
    </font>
  </div>

  <div class="row pb-1 pt-2 mb-3">
    <label for="gallery_images" class="col-md-4 col-form-label text-md-end" >
    <font color = white>
          <strong>Choose Product Gallary : </strong>  </label>
      <input type="file" name="gallery_images[]"  id="gallery_images" multiple >
    </font>
  </div>
  <div class="form-btn">
    <div class="col-md-6 offset-lg-9 pt-3" >
      <input type="submit" class="btn btn-primary " value="Add Product" name="submit">
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
