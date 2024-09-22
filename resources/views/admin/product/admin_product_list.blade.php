@extends('admin.admin_dashboard')


@section('admin')

<div class="page-content">


<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.product.list') }}">Product list</a></li>
        <li class="breadcrumb-item active" aria-current="page">Product List</li>
    </ol>
</nav>

<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between allign-items-center mb-4">
                <h6 class="card-title">Product List</h6>
                <a href="{{ route('admin.add.product') }}" class="btn btn-primary">Add Product</a>
            </div>

            <div class="mb-4">
              <h6 class="card-title">product Categorye</h6>
              <div class="d-flex flex-wrap gap-2">
                <!-- Product Categories -->

              

                
              </div>

            </div>

              <!-- Product Table -->
             <div class="table-responsive">
              <table id="dataTableExample" class="table table-hover text-center">
                <thead class="table-primary">
                  <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">Image</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Category</th>
                    <th class="text-center">Price</th>
                    <th class="text-center">Stock</th>
                    <th class="text-center">Action</th>
                  </tr>

                </thead>
                <tbody>
                  @foreach ($products as $product)
                  <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-center">
                      <img src="{{ asset('upload/admin_images/' . $product->photo) }}" 
                      alt="Product Image" style="width: 50px; height: 50px">

                    </td>

                    <td class="text-center">{{ $product->name }}</td>
                    <td class="text-center">{{ $product->category->category_name }}</td>
                    <td class="text-center">{{ $product->price }}</td>
                    <td class="text-center">{{ $product->stock }}</td>
                    <td class="text-center">
                    <a href="{{ route('admin.product.view',  $product->id) }}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i>View</a>
                      <a href="{{ route('admin.edit.product',  $product->id) }}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i> Edit</a>
                      <form action="{{ route('admin.delete.product',  $product->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Delete</button>

                      </form>

                    </td>

                  </tr>
                  @endforeach

                </tbody>

              </table>

             </div>

               <!-- End Product Table -->





        </div>
    </div>
</div>





</div>


@endsection

