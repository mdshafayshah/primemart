@extends('admin.admin_layout')

@section('page-title', 'All Products')

@section('content')
<div class="products-container">
    <!-- Page Header -->
    <div class="page-header">
        <div class="header-left">
            <h2><i class="fa fa-box"></i> All Products</h2>
            <p>Manage your product inventory</p>
        </div>
        <div class="header-right">
            <a href="{{url('/admin/createproducts') }}" class="btn-add">
                <i class="fa fa-plus"></i> Add New Product
            </a>
        </div>
    </div>

    <!-- Filters & Search -->
    <div class="filters-card">
        <div class="search-box">
            <i class="fa fa-search"></i>
            <input type="text" id="searchInput" placeholder="Search by product name, SKU or category...">
        </div>
        <div class="filter-group">
            <select id="categoryFilter" class="filter-select">
                <option value="">All Categories</option>
                
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>

            <button id="resetFilters" class="btn btn-success">
                <i class="fa fa-refresh"></i> Search
            </button>
        </div>
    </div>

    <!-- Products Table -->
    <div class="products-card">
        <div class="table-responsive">
            <table class="products-table" id="productsTable">
                <thead>
                    <tr>
                        
                        <th>Image</th>
                        <th>Product Name</th>
                        <th>SKU</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @foreach ($products as $product)
                        <td class="product-info">
                            <img src="{{asset('images/'.$product->image)}}" alt="Product" class="product-img">
             
                        </td>
                        <td>
                            {{$product->name}}                
                        </td>
                        <td>
                            {{$product->sku}}                
                        </td>
                        <td>
                            {{$product->category->name ?? 'N/A'}}                
                        </td>
                        <td>
                            {{$product->price}}                
                        </td>
                        <td>
                            {{$product->stock}}                
                        </td>

                        <td class="actions">
                            <button class="action-icon view" title="View">
                                <i class="fa fa-eye"></i>
                            </button>
                            <button class="action-icon edit" title="Edit">
                                <i class="fa fa-edit"></i>
                            </button>
                            <button class="action-icon delete" title="Delete">
                                <i class="fa fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                        @endforeach
                </tbody>
            </table>
        </div>

        <!-- Bulk Actions & Pagination -->
        
    </div>
</div>
@endsection

@push('scripts')
<script>
   
</script>
@endpush