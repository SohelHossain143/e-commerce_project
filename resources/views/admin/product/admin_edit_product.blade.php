@extends('admin.admin_dashboard')


@section('admin')

<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jqury.min.js"></script>


<div class="page-content">

 <nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="">Product</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Product</li>
    </ol>
 
 </nav>
 <div class="row">
  <div class="col-12 gird-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h3 class="mb-3">Edit Product</h3>
<!--    <div class="d-flex justify-content-end">
           <button class="btn btn-primary">Primary</button>
        </div>
  -->
        <form action="" method="POST" enctype="multipart/form/data">
          @csrf
          @method('PUT')

          <div class="mb-3">
              <label for="" class="form-label">Product Photo</label>
              <input type="file" name="photo" class="form-control" id="image" autocomplete="off">
          </div>

          <div class="md-3">
            <img src=""
             alt="profile" id="showImage" class="wd-150 rounded" height="150px">

          </div>

          <div class="form-group mb-3">
            <label for="category" class="form-label">Product Category</label>
            <select class="form-control" name="category_id" id="category">
              <option value="" selected disabled>-- Select Product Category --</option>
              @foreach($categories as $category)
              <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->category_name }}</option>
              @endforeach
            </select>

          </div>
          <div class="mb-3">
            <label for="" class="form-label">Product Name</label>
            <input type="text" name="name" class="form-control" id="name" autocomplete="off" placeholder="Name" value="{{ $product->name }}">

          </div>

          <div class="mb-3">
            <label for="" class="form-label">Product Price</label>
            <input type="text" name="price" class="form-control" id="price" autocomplete="off" placeholder="price" value="{{ $product->price }}">

          </div>

          <div class="mb-3">
            <label for="" class="form-label">Product Stock</label>
            <input type="text" name="stock" class="form-control" id="stock" autocomplete="off" placeholder="stock" value="{{ $product->stock }}">

          </div>

          <div class="mb-3">
            <label for="" class="form-label">Product Description</label>
            <textarea name="description" id="description" class="form-control" rows="8" placeholder="Enter a detailed description of your product...">{{ $product->description }}</textarea>
            
          </div>

          <button type="submit" class="btn btn-primary me-2">Update Product</button>
          <button class="btn btn-secondaru">Ccancel</button>

        </form>


      </div>

    </div>

  </div>

 </div>


</div>

<script type="text/javascript">
    $(docu,ent).ready(function () {
        $('#image').change(function (e) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files[0]);
        });
    });

</script>




@endsection

