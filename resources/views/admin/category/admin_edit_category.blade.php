@extends('admin.admin_dashboard')


@section('admin')

<!-- Loading jQuery from Google CDN -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<div class="page-content">

   <nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.category.list') }}">Product Categories</a></li>
        <li class="breadcrumb-item active" aria-current="page">EditS Product Categories</li>
    </ol>
 
</nav>

<div class="row">
    <div class="col-12 stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Product Category</h4>

                <form action="{{ route('admin.update.category', $category->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label for="category" class="form-label">Product Category:</label>
                        <input type="text" name="category_name", class="form-control" 
                        value="{{ $category->category_name }}">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Category Photo</label>
                        <input type="file" name="photo" class="form-control" id="image" autocomplete="off">
                    </div>
                    <div class="mb-3">
                    <img src="{{ $category->photo ? asset('upload/admin_images/' . $category->photo) : url('upload/no_image.jpg') }}"
                    alt="profile" id="showImage" class="wd-150 rounded" height="150px">

                    </div>
                    <input type="submit" class="btn btn-primary" value="Update Category">
                   
                </form>
            </div>
        </div>
    </div>
</div>



</div>

<script type="text/javascript">
    $(document).ready(function () {
        $('#image').change(function (e) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files[0]);
        });
    });

</script>



@endsection

    