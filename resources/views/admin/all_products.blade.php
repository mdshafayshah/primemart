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
            <a href="{{ url('/admin/create-product') }}" class="btn-add">
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
                <option value="electronics">Electronics</option>
                <option value="clothing">Clothing</option>
                <option value="accessories">Accessories</option>
                <option value="home">Home & Living</option>
            </select>
            <select id="statusFilter" class="filter-select">
                <option value="">All Status</option>
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
                <option value="outofstock">Out of Stock</option>
            </select>
            <button id="resetFilters" class="btn-reset">
                <i class="fa fa-refresh"></i> Reset
            </button>
        </div>
    </div>

    <!-- Products Table -->
    <div class="products-card">
        <div class="table-responsive">
            <table class="products-table" id="productsTable">
                <thead>
                    <tr>
                        <th><input type="checkbox" id="selectAll"></th>
                        <th>Product</th>
                        <th>SKU</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Product 1 -->
                    <tr>
                        <td><input type="checkbox" class="product-checkbox"></td>
                        <td class="product-info">
                            <img src="https://via.placeholder.com/50" alt="Product" class="product-img">
                            <div>
                                <strong>iPhone 15 Pro</strong>
                                <small>Smartphone</small>
                            </div>
                        </td>
                        <td>SKU-001</td>
                        <td>Electronics</td>
                        <td>$999.00</td>
                        <td>
                            <span class="stock-badge in-stock">45 in stock</span>
                        </td>
                        <td>
                            <span class="status-badge active">Active</span>
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

                    <!-- Product 2 -->
                    <tr>
                        <td><input type="checkbox" class="product-checkbox"></td>
                        <td class="product-info">
                            <img src="https://via.placeholder.com/50" alt="Product" class="product-img">
                            <div>
                                <strong>Samsung Galaxy S24</strong>
                                <small>Smartphone</small>
                            </div>
                        </td>
                        <td>SKU-002</td>
                        <td>Electronics</td>
                        <td>$899.00</td>
                        <td>
                            <span class="stock-badge low-stock">12 in stock</span>
                        </td>
                        <td>
                            <span class="status-badge active">Active</span>
                        </td>
                        <td class="actions">
                            <button class="action-icon view"><i class="fa fa-eye"></i></button>
                            <button class="action-icon edit"><i class="fa fa-edit"></i></button>
                            <button class="action-icon delete"><i class="fa fa-trash"></i></button>
                        </td>
                    </tr>

                    <!-- Product 3 -->
                    <tr>
                        <td><input type="checkbox" class="product-checkbox"></td>
                        <td class="product-info">
                            <img src="https://via.placeholder.com/50" alt="Product" class="product-img">
                            <div>
                                <strong>Sony WH-1000XM5</strong>
                                <small>Headphones</small>
                            </div>
                        </td>
                        <td>SKU-003</td>
                        <td>Accessories</td>
                        <td>$349.00</td>
                        <td>
                            <span class="stock-badge out-stock">0 in stock</span>
                        </td>
                        <td>
                            <span class="status-badge inactive">Inactive</span>
                        </td>
                        <td class="actions">
                            <button class="action-icon view"><i class="fa fa-eye"></i></button>
                            <button class="action-icon edit"><i class="fa fa-edit"></i></button>
                            <button class="action-icon delete"><i class="fa fa-trash"></i></button>
                        </td>
                    </tr>

                    <!-- Product 4 -->
                    <tr>
                        <td><input type="checkbox" class="product-checkbox"></td>
                        <td class="product-info">
                            <img src="https://via.placeholder.com/50" alt="Product" class="product-img">
                            <div>
                                <strong>Nike Air Max</strong>
                                <small>Shoes</small>
                            </div>
                        </td>
                        <td>SKU-004</td>
                        <td>Clothing</td>
                        <td>$129.00</td>
                        <td>
                            <span class="stock-badge in-stock">89 in stock</span>
                        </td>
                        <td>
                            <span class="status-badge active">Active</span>
                        </td>
                        <td class="actions">
                            <button class="action-icon view"><i class="fa fa-eye"></i></button>
                            <button class="action-icon edit"><i class="fa fa-edit"></i></button>
                            <button class="action-icon delete"><i class="fa fa-trash"></i></button>
                        </td>
                    </tr>

                    <!-- Product 5 -->
                    <tr>
                        <td><input type="checkbox" class="product-checkbox"></td>
                        <td class="product-info">
                            <img src="https://via.placeholder.com/50" alt="Product" class="product-img">
                            <div>
                                <strong>MacBook Pro M3</strong>
                                <small>Laptop</small>
                            </div>
                        </td>
                        <td>SKU-005</td>
                        <td>Electronics</td>
                        <td>$1999.00</td>
                        <td>
                            <span class="stock-badge low-stock">8 in stock</span>
                        </td>
                        <td>
                            <span class="status-badge active">Active</span>
                        </td>
                        <td class="actions">
                            <button class="action-icon view"><i class="fa fa-eye"></i></button>
                            <button class="action-icon edit"><i class="fa fa-edit"></i></button>
                            <button class="action-icon delete"><i class="fa fa-trash"></i></button>
                        </td>
                    </tr>

                    <!-- Product 6 -->
                    <tr>
                        <td><input type="checkbox" class="product-checkbox"></td>
                        <td class="product-info">
                            <img src="https://via.placeholder.com/50" alt="Product" class="product-img">
                            <div>
                                <strong>Apple Watch Series 9</strong>
                                <small>Smartwatch</small>
                            </div>
                        </td>
                        <td>SKU-006</td>
                        <td>Accessories</td>
                        <td>$399.00</td>
                        <td>
                            <span class="stock-badge in-stock">34 in stock</span>
                        </td>
                        <td>
                            <span class="status-badge active">Active</span>
                        </td>
                        <td class="actions">
                            <button class="action-icon view"><i class="fa fa-eye"></i></button>
                            <button class="action-icon edit"><i class="fa fa-edit"></i></button>
                            <button class="action-icon delete"><i class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Bulk Actions & Pagination -->
        <div class="table-footer">
            <div class="bulk-actions">
                <button class="btn-bulk" id="bulkDelete" disabled>
                    <i class="fa fa-trash"></i> Delete Selected
                </button>
                <button class="btn-bulk" id="bulkStatus" disabled>
                    <i class="fa fa-tag"></i> Change Status
                </button>
            </div>
            <div class="pagination">
                <button class="page-btn" disabled>«</button>
                <button class="page-btn active">1</button>
                <button class="page-btn">2</button>
                <button class="page-btn">3</button>
                <button class="page-btn">4</button>
                <button class="page-btn">»</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Select All Checkbox
    const selectAll = document.getElementById('selectAll');
    const checkboxes = document.querySelectorAll('.product-checkbox');
    const bulkDelete = document.getElementById('bulkDelete');
    const bulkStatus = document.getElementById('bulkStatus');

    selectAll?.addEventListener('change', function() {
        checkboxes.forEach(checkbox => {
            checkbox.checked = selectAll.checked;
        });
        updateBulkButtons();
    });

    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', updateBulkButtons);
    });

    function updateBulkButtons() {
        const checkedCount = document.querySelectorAll('.product-checkbox:checked').length;
        const hasChecked = checkedCount > 0;
        bulkDelete.disabled = !hasChecked;
        bulkStatus.disabled = !hasChecked;
    }

    // Search Functionality
    const searchInput = document.getElementById('searchInput');
    searchInput?.addEventListener('keyup', function() {
        const filter = this.value.toLowerCase();
        const rows = document.querySelectorAll('#productsTable tbody tr');
        
        rows.forEach(row => {
            const text = row.textContent.toLowerCase();
            row.style.display = text.includes(filter) ? '' : 'none';
        });
    });

    // Category Filter
    const categoryFilter = document.getElementById('categoryFilter');
    categoryFilter?.addEventListener('change', filterTable);
    
    const statusFilter = document.getElementById('statusFilter');
    statusFilter?.addEventListener('change', filterTable);

    function filterTable() {
        const category = categoryFilter.value.toLowerCase();
        const status = statusFilter.value.toLowerCase();
        const rows = document.querySelectorAll('#productsTable tbody tr');
        
        rows.forEach(row => {
            const rowCategory = row.cells[3]?.textContent.toLowerCase();
            const rowStatus = row.cells[6]?.querySelector('.status-badge')?.textContent.toLowerCase();
            
            let show = true;
            if (category && rowCategory !== category) show = false;
            if (status && rowStatus !== status) show = false;
            
            row.style.display = show ? '' : 'none';
        });
    }

    // Reset Filters
    const resetBtn = document.getElementById('resetFilters');
    resetBtn?.addEventListener('click', function() {
        searchInput.value = '';
        categoryFilter.value = '';
        statusFilter.value = '';
        const rows = document.querySelectorAll('#productsTable tbody tr');
        rows.forEach(row => row.style.display = '');
    });

    // Delete Button Action
    const deleteBtns = document.querySelectorAll('.action-icon.delete');
    deleteBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            if(confirm('Are you sure you want to delete this product?')) {
                this.closest('tr').remove();
            }
        });
    });

    // Bulk Delete
    bulkDelete?.addEventListener('click', function() {
        const checkedBoxes = document.querySelectorAll('.product-checkbox:checked');
        if(checkedBoxes.length > 0 && confirm(`Delete ${checkedBoxes.length} product(s)?`)) {
            checkedBoxes.forEach(checkbox => {
                checkbox.closest('tr').remove();
            });
            selectAll.checked = false;
            updateBulkButtons();
        }
    });
</script>
@endpush