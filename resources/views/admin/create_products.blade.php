@extends('admin.admin_layout')

@section('page-title', 'Create Product')

@section('content')
<div class="create-product-container">
    <!-- Page Header -->
    <div class="page-header">
        <div class="header-left">
            <h2><i class="fa fa-plus-circle"></i> Create New Product</h2>
            <p>Add a new product to your inventory</p>
        </div>
        <div class="header-right">
            <a href="{{ url('/admin/all-products') }}" class="btn-back">
                <i class="fa fa-arrow-left"></i> Back to Products
            </a>
        </div>
    </div>

    <!-- Form Card -->
    <form class="product-form" id="productForm" action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-grid">
            <!-- Left Column -->
            <div class="form-left">
                <!-- Basic Information -->
                <div class="form-section">
                    <h3 class="section-title">
                        <i class="fa fa-info-circle"></i> Basic Information
                    </h3>

                    <div class="form-group">
                        <label for="productName" class="form-label required">Product Name</label>
                        <input type="text" id="productName" name="name" class="form-control" placeholder="Enter product name" required>
                        <small class="form-text">Example: iPhone 15 Pro, Samsung Galaxy S24, etc.</small>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="sku" class="form-label required">SKU (Stock Keeping Unit)</label>
                            <input type="text" id="sku" name="sku" class="form-control" placeholder="SKU" readonly>
                            <small class="form-text">Unique product identifier</small>
                        </div>

                        <div class="form-group">
                            <label for="category" class="form-label required">Category</label>
                            <select id="category" name="category_id" class="form-control" required>
                               @foreach($categories as $category)
                                    <option value="{{$category->id}}">
                                            {{$category->name}}
                                    </option>
                               @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="price" class="form-label required">Price </label>
                            <input type="number" id="price" name="price" class="form-control" placeholder="0.00" step="0.01" required>
                        </div>
                        <div class="form-group">
                            <label for="stock" class="form-label required">Stock Quantity</label>
                            <input type="number" id="stock" name="stock" class="form-control" placeholder="0" required>
                        </div>


                    </div>

                    <div class="form-row">



                    </div>
                </div>

                <!-- Product Description -->
                <div class="form-section">
                    <h3 class="section-title">
                        <i class="fa fa-file-text"></i> Product Description
                    </h3>

                    <div class="form-group">
                        <label for="shortDesc" class="form-label">Short Description</label>
                        <textarea id="shortDesc" name="short_description" class="form-control" rows="3" placeholder="Brief description of the product..."></textarea>
                    </div>

                    <div class="form-group">
                        <label for="fullDesc" class="form-label">Full Description</label>
                        <textarea id="fullDesc" name="description" class="form-control rich-editor" rows="8" placeholder="Detailed product description..."></textarea>
                    </div>
                </div>

                <!-- Product Specifications -->
                <div class="form-section">
                    <h3 class="section-title">
                        <i class="fa fa-list-ul"></i> Product Specifications
                    </h3>

                    <div id="specificationsContainer">
                        <div class="spec-row">
                            <textarea id="fullDesc" name="brandspecification" class="form-control rich-editor" rows="8" placeholder="Specification (e.g., Brand) ..."></textarea>
                            <input type="text" name="brandname" class="form-control" placeholder="Value (e.g., Apple)">

                        </div>
                    </div>

                 
                </div>
            </div>

            <!-- Right Column -->
            <div class="form-right">
                <!-- Product Image Upload -->
                <div class="form-section">
                    <h3 class="section-title">
                        <i class="fa fa-image"></i> Product Images
                    </h3>

                    <div class="image-upload-area" id="imageUploadArea">
                        <input type="file" id="productImages" name="image" multiple accept="image/*" style="display: none;">
                        <div class="upload-placeholder" onclick="document.getElementById('productImages').click()">
                            <i class="fa fa-cloud-upload"></i>
                            <p>Click or drag images here</p>
                            <small>PNG, JPG, JPEG up to 5MB</small>
                        </div>
                        <div class="image-preview-grid" id="imagePreviewGrid"></div>
                    </div>
                </div>


                <!-- SEO Information -->
                <div class="form-section">
                    <h3 class="section-title">
                        <i class="fa fa-google"></i> SEO Information
                    </h3>

                    <div class="form-group">
                        <label for="metaTitle" class="form-label">Meta Title</label>
                        <input type="text" id="metaTitle" name="metatitle" class="form-control" placeholder="SEO title (60-70 characters)">
                        <small class="form-text">Leave empty to use product name</small>
                    </div>

                    <div class="form-group">
                        <label for="metaDesc" class="form-label">Meta Description</label>
                        <textarea id="metaDesc" name="metadescription" class="form-control" rows="3" placeholder="SEO description (150-160 characters)"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="slug" class="form-label">URL Slug</label>
                        <input type="text" id="slug" name="slug" class="form-control" placeholder="product-url-slug" readonly>
                        <small class="form-text">Auto-generated from product name</small>
                    </div>
                </div>
            </div>
        </div>

        <!-- Form Actions -->
        <div class="form-actions">
            <button type="button" class="btn-cancel" onclick="window.location.href=''">
                <i class="fa fa-times"></i> Cancel
            </button>
            <button type="reset" class="btn-reset-form">
                <i class="fa fa-refresh"></i> Reset
            </button>
            <button type="submit" class="btn-submit">
                <i class="fa fa-save"></i> Create Product
            </button>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
    const productNameInput = document.getElementById('productName');
    const metaTitleInput = document.getElementById('metaTitle');
    const metaDescInput = document.getElementById('metaDesc');
    const slugInput = document.getElementById('slug');
    const skuInput = document.getElementById('sku');

    productNameInput.addEventListener('input', function () {

        //alert("name input event triggered");
        let name = this.value;

        if (!name) return;

        let slugWords=productNameInput.value
                        .toLowerCase()
                        .replace(/^-+|-+$/g, '')
                        .replace(/[^a-z0-9]+/g, '-');
        // Slugd
       // alert("name input event triggered 2"+ slugWords);
        let slug = name
            .toLowerCase()
            .replace(/[^a-z0-9]+/g, '-')
            .replace(/^-+|-+$/g, '');

        // SKU
        let sku =slugWords+ 'PRD-' + Math.floor(1000 + Math.random() * 9000);

        // Meta Title
        
            metaTitleInput.value = name + " | PrimeMart";
        

        // Meta Description
        
            metaDescInput.value = "Buy " + name + " at best price in Pakistan. Order now from PrimeMart.";
        

        // Slug
        
            slugInput.value = slug;
        

        // SKU
        
            skuInput.value = sku;
        

    });


    // Image Upload Preview
    const imageInput = document.getElementById('productImages');
    const previewGrid = document.getElementById('imagePreviewGrid');
    const uploadPlaceholder = document.querySelector('.upload-placeholder');

    imageInput.addEventListener('change', function(e) {
        const files = Array.from(e.target.files);

        files.forEach(file => {
            if (file.type.startsWith('image/')) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    const previewDiv = document.createElement('div');
                    previewDiv.className = 'image-preview-item';
                    previewDiv.innerHTML = `
                        <img src="${e.target.result}" alt="Preview">
                        <button type="button" class="remove-image" onclick="this.parentElement.remove()">
                            <i class="fa fa-times"></i>
                        </button>
                    `;
                    previewGrid.appendChild(previewDiv);
                };

                reader.readAsDataURL(file);
            }
        });

        // Hide placeholder if images exist
        if (previewGrid.children.length > 0) {
            uploadPlaceholder.style.display = 'none';
        }
    });

    


    // Form validation before submit
    document.getElementById('productForm').addEventListener('submit', function(e) {
        const productName = document.getElementById('productName').value;
        const sku = document.getElementById('sku').value;
        const category = document.getElementById('category').value;
        const price = document.getElementById('price').value;
        const stock = document.getElementById('stock').value;

        if (!productName) {
            alert('Please enter product name');
            e.preventDefault();
            return;
        }

        if (!sku) {
            alert('Please enter SKU');
            e.preventDefault();
            return;
        }

        if (!category) {
            alert('Please select category');
            e.preventDefault();
            return;
        }

        if (!price || price <= 0) {
            alert('Please enter valid price');
            e.preventDefault();
            return;
        }

        if (stock === '' || stock < 0) {
            alert('Please enter valid stock quantity');
            e.preventDefault();
            return;
        }

        if (confirm('Are you sure you want to create this product?')) {
            return true;
        } else {
            e.preventDefault();
        }
    });

    // Reset form confirmation
    document.querySelector('.btn-reset-form').addEventListener('click', function(e) {
        if (!confirm('Are you sure you want to reset all fields?')) {
            e.preventDefault();
        }
    });
</script>
@endpush