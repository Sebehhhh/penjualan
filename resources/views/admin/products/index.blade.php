@extends('admin.layouts.app')
@section('title', 'Product Management')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Product Management</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Product Management</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Basic Tables start -->
        <section class="section">
            <div class="row" id="basic-table">
                <div class="col-12 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('admin.products.create') }}" class="btn btn-success btn-sm float-end">
                                <i class="bi bi-plus"></i> Add Product
                            </a>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <!-- Table with outer spacing -->
                                <div class="table-responsive">
                                    <table id="productTable" class="table table-lg">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Name</th>
                                                <th>Image</th>
                                                <th>Price</th>
                                                <th>Stock</th>
                                                <th>Category</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($products as $index => $product)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $product->name }}</td>
                                                    <td>
                                                        @if($product->image)
                                                            <img src="{{ asset('images/products/' . $product->image) }}" alt="{{ $product->name }}" style="max-width:80px; max-height:80px;">
                                                        @else
                                                            -
                                                        @endif
                                                    </td>
                                                    <td>{{ number_format($product->price, 2) }}</td>
                                                    <td>{{ $product->stock }}</td>
                                                    <td>{{ $product->category ? $product->category->name : '-' }}</td>
                                                    <td>
                                                        <a href="{{ route('admin.products.edit', encrypt($product->id)) }}" class="btn btn-primary btn-sm">
                                                            <i class="bi bi-pencil"></i>
                                                        </a>
                                                        <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete({{ $product->id }})">
                                                            <i class="bi bi-trash"></i>
                                                        </button>
                                                        <form id="delete-form-{{ $product->id }}" action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display: none;">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- DataTables akan meng-handle paging, sorting, dan pencarian -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script>
        function confirmDelete(productId) {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + productId).submit();
                }
            });
        }
    </script>
@endsection
