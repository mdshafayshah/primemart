@extends('admin.admin_layout')

@section('content')
<div class="categories-container">

    <!-- Top pe Add Category Form (sirf 2 fields + button) -->
    <div class="add-category-form">
        <form id="categoryForm" enctype="multipart/form-data" action="{{route('admin.categories.store')}}" method="POST">
            @csrf
            <div class="form-fields">
                <div class="field">
                    <label>Category Name</label>
                    <input type="text" id="catName" name="name" class="form-input" placeholder="Enter category name" required>
                    <div id="iconPreview" style="display: none; margin-top: 8px;">
                        
                    </div>
                </div>
                <div class="field">
                    <label>Category Icon</label>
                    <input type="file" id="catIcon" name="icon" class="form-input" accept="image/*" required>
                    <div id="iconPreview" style="display: none; margin-top: 8px;">
                        <img id="previewImg" width="40" height="40" style="border-radius: 8px;">
                    </div>
                </div>
                <div class="field">
                    <button type="submit" class="save-btn">Save Category</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Search Bar -->
    <div class="search-bar">
        <input type="text" id="searchInput" class="search-input" placeholder="Search categories...">
    </div>

    <!-- Category Table List -->
    <div class="table-container">
        <table class="category-table">
            <thead>
                <tr>
                    <th>Icon</th>
                    <th>Category Name</th>
                    <th>Total Products</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $cat)
                <tr>
                    <td>
                        <img src="{{ asset('images/' . $cat->icon) }}" width="40" height="40" style="border-radius: 8px;">
                    </td>

                    <td>{{ $cat->name }}</td>

                    <td>
                        {{ $cat->products->count() }}
                    </td>

                    <td>
                        <button class="edit-btn">Edit</button>
                        <button class="delete-btn">Delete</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>

<script>
    // // Categories Data
    // let categories = [
    //     { id: 1, name: 'Electronics', icon: 'https://via.placeholder.com/40/3498db/white?text=📱' },
    //     { id: 2, name: 'Clothing', icon: 'https://via.placeholder.com/40/e74c3c/white?text=👕' },
    //     { id: 3, name: 'Accessories', icon: 'https://via.placeholder.com/40/f39c12/white?text=🎧' }
    // ];

    // let nextId = 4;
    // let selectedIcon = null;

    // // Show Categories in Table
    // function showCategories() {
    //     let search = document.getElementById('searchInput').value.toLowerCase();
    //     let filtered = categories.filter(c => c.name.toLowerCase().includes(search));

    //     let html = '';
    //     for (let cat of filtered) {
    //         html += `
    //             <tr>
    //                 <td class="icon-cell"><img src="${cat.icon}" width="40" height="40" style="border-radius: 8px;"></td>
    //                 <td class="name-cell">${cat.name}</td>
    //                 <td class="actions-cell">
    //                     <button class="edit-btn" onclick="editCat(${cat.id})">✏️ Edit</button>
    //                     <button class="delete-btn" onclick="deleteCat(${cat.id})">🗑️ Delete</button>
    //                 </td>
    //             </tr>
    //         `;
    //     }

    //     if (filtered.length === 0) {
    //         html = '<tr><td colspan="3" class="empty-row">No categories found</td></tr>';
    //     }

    //     document.getElementById('categoryList').innerHTML = html;
    // }

    // // Add Category
    // function addCategory(name, iconData) {
    //     if (!name) {
    //         alert('Please enter category name');
    //         return false;
    //     }
    //     if (!iconData) {
    //         alert('Please select category icon');
    //         return false;
    //     }

    //     categories.push({
    //         id: nextId++,
    //         name: name,
    //         icon: iconData
    //     });

    //     showCategories();
    //     return true;
    // }

    // // Edit Category
    // function editCat(id) {
    //     let cat = categories.find(c => c.id === id);
    //     let newName = prompt('Edit category name:', cat.name);
    //     if (newName && newName.trim()) {
    //         cat.name = newName.trim();
    //         showCategories();
    //     }
    // }

    // // Delete Category
    // function deleteCat(id) {
    //     if (confirm('Delete this category?')) {
    //         categories = categories.filter(c => c.id !== id);
    //         showCategories();
    //     }
    // }

    // // Image Upload Preview
    // const iconInput = document.getElementById('catIcon');
    // const iconPreview = document.getElementById('iconPreview');
    // const previewImg = document.getElementById('previewImg');

    // iconInput.addEventListener('change', function(e) {
    //     let file = e.target.files[0];
    //     if (file) {
    //         let reader = new FileReader();
    //         reader.onload = function(e) {
    //             selectedIcon = e.target.result;
    //             previewImg.src = selectedIcon;
    //             iconPreview.style.display = 'block';
    //         };
    //         reader.readAsDataURL(file);
    //     }
    // });

    // // Form Submit
    // document.getElementById('categoryForm').addEventListener('submit', function(e) {
    //    // e.preventDefault();

    //     let name = document.getElementById('catName').value.trim();

    //     if (!name) {
    //         alert('Please enter category name');
    //         return;
    //     }

    //     if (!selectedIcon) {
    //         alert('Please select category icon');
    //         return;
    //     }

    //     addCategory(name, selectedIcon);

    //     // Reset form
    //     document.getElementById('catName').value = '';
    //     iconInput.value = '';
    //     selectedIcon = null;
    //     iconPreview.style.display = 'none';
    //     previewImg.src = '';
    // });

    // // Search
    // document.getElementById('searchInput').addEventListener('keyup', function() {
    //     showCategories();
    // });

    // // Initial Load
    // showCategories();
</script>
@endsection