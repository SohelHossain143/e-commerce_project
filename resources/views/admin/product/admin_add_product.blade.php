@extends('admin.admin_dashboard')


@section('admin')

<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jqury.min.js"></script>

<div class="page-content">
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="">Product</a></li>
        <li class="breadcrumb-item active" aria-current="page">Add Product</li>
    </ol>
 
</nav>

<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h3 class="mb-3">Edit Product</h3>

                <form action="" method="post" enctype="multipart/form-data">
                    @csrf 

                    <div class="mb-3">
                        <label for="" class="form-label">Product Photo</label>
                        <input type="file" name="photo" class="form-control" id="image" autocomplete="off">
                    </div>

                    <div class="mb-3">
                        <img src="" alt="profile" class="wd-150 rounded" height="150px" id="ShowImage">
                    </div>

                    <div class="form-group mb-3">
                        <label for="category" class="form-label">Product Category</label>

                        <select name="category_id" id="category" class="form-control" required>
                            <option value=""selected disabled>-- Select Product Category --</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->category_name }}></option>
                            @endforeach
                        </select>

                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Product Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="name" autocomplete="off">
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Product Price</label>
                        <input type="text" class="form-control" name="price" id="price" placeholder="price" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Product Stock</label>
                        <input type="text" class="form-control" name="stock" id="stock" placeholder="Stock" autocomplete="off">
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Product Description</label>
                        <textarea name="description" id="description" class="form-control" rows="8" placeholder="Enter a detailed description of your product..."></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary me-2">Add Product</button>
                    <button type="submit" class="btn btn-secondary">Cancel</button>
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

