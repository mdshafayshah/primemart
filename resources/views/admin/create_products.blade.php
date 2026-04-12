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
    <form class="product-form" id="productForm" action="{{ url('/admin/store-product') }}" method="POST" enctype="multipart/form-data">
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
                        <input type="text" id="productName" name="productName" class="form-control" placeholder="Enter product name" required>
                        <small class="form-text">Example: iPhone 15 Pro, Samsung Galaxy S24, etc.</small>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="sku" class="form-label required">SKU (Stock Keeping Unit)</label>
                            <input type="text" id="sku" name="sku" class="form-control" placeholder="Enter SKU" required>
                            <small class="form-text">Unique product identifier</small>
                        </div>
                        
                        <div class="form-group">
                            <label for="category" class="form-label required">Category</label>
                            <select id="category" name="category" class="form-control" required>
                                <option value="">Select Category</option>
                                <option value="electronics">Electronics</option>
                                <option value="clothing">Clothing</option>
                                <option value="accessories">Accessories</option>
                                <option value="home">Home & Living</option>
                                <option value="beauty">Beauty & Personal Care</option>
                                <option value="sports">Sports & Outdoors</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="price" class="form-label required">Price ($)</label>
                            <input type="number" id="price" name="price" class="form-control" placeholder="0.00" step="0.01" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="comparePrice" class="form-label">Compare at Price ($)</label>
                            <input type="number" id="comparePrice" name="comparePrice" class="form-control" placeholder="0.00" step="0.01">
                            <small class="form-text">Original price (for sale badge)</small>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="stock" class="form-label required">Stock Quantity</label>
                            <input type="number" id="stock" name="stock" class="form-control" placeholder="0" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="status" class="form-label">Status</label>
                            <select id="status" name="status" class="form-control">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                    </div>
                </div>
                
                <!-- Product Description -->
                <div class="form-section">
                    <h3 class="section-title">
                        <i class="fa fa-file-text"></i> Product Description
                    </h3>
                    
                    <div class="form-group">
                        <label for="shortDesc" class="form-label">Short Description</label>
                        <textarea id="shortDesc" name="shortDesc" class="form-control" rows="3" placeholder="Brief description of the product..."></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="fullDesc" class="form-label">Full Description</label>
                        <textarea id="fullDesc" name="fullDesc" class="form-control rich-editor" rows="8" placeholder="Detailed product description..."></textarea>
                    </div>
                </div>
                
                <!-- Product Specifications -->
                <div class="form-section">
                    <h3 class="section-title">
                        <i class="fa fa-list-ul"></i> Product Specifications
                    </h3>
                    
                    <div id="specificationsContainer">
                        <div class="spec-row">
                            <input type="text" name="spec_key[]" class="form-control" placeholder="Specification (e.g., Brand)">
                            <input type="text" name="spec_value[]" class="form-control" placeholder="Value (e.g., Apple)">
                            <button type="button" class="btn-remove-spec" onclick="this.closest('.spec-row').remove()">
                                <i class="fa fa-trash"></i>
                            </button>
                        </div>
                    </div>
                    
                    <button type="button" class="btn-add-spec" onclick="addSpecification()">
                        <i class="fa fa-plus"></i> Add More Specifications
                    </button>
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
                        <input type="file" id="productImages" name="productImages[]" multiple accept="image/*" style="display: none;">
                        <div class="upload-placeholder" onclick="document.getElementById('productImages').click()">
                            <i class="fa fa-cloud-upload"></i>
                            <p>Click or drag images here</p>
                            <small>PNG, JPG, JPEG up to 5MB</small>
                        </div>
                        <div class="image-preview-grid" id="imagePreviewGrid"></div>
                    </div>
                </div>
                
                <!-- Pricing & Inventory -->
                <div class="form-section">
                    <h3 class="section-title">
                        <i class="fa fa-dollar"></i> Pricing & Inventory
                    </h3>
                    
                    <div class="form-group">
                        <label class="form-label">Tax Class</label>
                        <select name="taxClass" class="form-control">
                            <option value="standard">Standard Tax (10%)</option>
                            <option value="reduced">Reduced Tax (5%)</option>
                            <option value="zero">Zero Tax (0%)</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">
                            <input type="checkbox" name="trackStock" value="1" checked>
                            Track stock quantity
                        </label>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Low Stock Threshold</label>
                        <input type="number" name="lowStockThreshold" class="form-control" placeholder="Notify when stock below" value="10">
                    </div>
                </div>
                
                <!-- SEO Information -->
                <div class="form-section">
                    <h3 class="section-title">
                        <i class="fa fa-google"></i> SEO Information
                    </h3>
                    
                    <div class="form-group">
                        <label for="metaTitle" class="form-label">Meta Title</label>
                        <input type="text" id="metaTitle" name="metaTitle" class="form-control" placeholder="SEO title (60-70 characters)">
                        <small class="form-text">Leave empty to use product name</small>
                    </div>
                    
                    <div class="form-group">
                        <label for="metaDesc" class="form-label">Meta Description</label>
                        <textarea id="metaDesc" name="metaDesc" class="form-control" rows="3" placeholder="SEO description (150-160 characters)"></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="slug" class="form-label">URL Slug</label>
                        <input type="text" id="slug" name="slug" class="form-control" placeholder="product-url-slug">
                        <small class="form-text">Auto-generated from product name</small>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Form Actions -->
        <div class="form-actions">
            <button type="button" class="btn-cancel" onclick="window.location.href='{{ url('/admin/all-products') }}'">
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
    
    // Add Specification Row
    function addSpecification() {
        const container = document.getElementById('specificationsContainer');
        const newRow = document.createElement('div');
        newRow.className = 'spec-row';
        newRow.innerHTML = `
            <input type="text" name="spec_key[]" class="form-control" placeholder="Specification (e.g., Brand)">
            <input type="text" name="spec_value[]" class="form-control" placeholder="Value (e.g., Apple)">
            <button type="button" class="btn-remove-spec" onclick="this.closest('.spec-row').remove()">
                <i class="fa fa-trash"></i>
            </button>
        `;
        container.appendChild(newRow);
    }
    
    // Auto-generate slug from product name
    const productNameInput = document.getElementById('productName');
    const slugInput = document.getElementById('slug');
    
    productNameInput.addEventListener('keyup', function() {
        if (!slugInput.value || slugInput.value === '') {
            const slug = this.value
                .toLowerCase()
                .replace(/[^a-z0-9]+/g, '-')
                .replace(/^-+|-+$/g, '');
            slugInput.value = slug;
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