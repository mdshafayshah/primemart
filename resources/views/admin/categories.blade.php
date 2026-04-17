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
        <input type="text" id="searchInput" class="search-input" oninput="searchCategory()"  placeholder="Search categories...">
    </div>

    <!-- Category Table List -->
    <div class="table-container">
        <table class="table category-table  table-striped table-bordered" >
            <thead >
                <tr>
                    <th>Icon</th>
                    <th  onclick="sortTable()"><span class="sort-icon">Category Name &nbsp;⬍</span></th>
                    <th  onclick="sortTable()"><span class="sort-icon">Total Products &nbsp;⬍</span></th>
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
                        <button class="edit-btn"
                            data-id="{{ $cat->id }}"
                            data-name="{{ $cat->name }}"
                            onclick="openModal(this)">
                            <i class="fa fa-pencil"></i>
                        </button>
                        <a href="{{ route('admin.categories.delete', $cat->id) }}"
                            class="delete-btn"
                            onclick="return confirm('Are you sure?')">
                            <i class="fa fa-trash"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
<!-- EDIT CATEGORY MODAL -->
<!-- MODAL OVERLAY -->
<div id="editModal" class="modal modal-dialog-centered modal-overlay">

    <div class="modal-box">

        <div class="modal-header">
            <h3>Edit Category</h3>
            <span class="close-btn" onclick="closeModal()">&times;</span>
        </div>

        <form id="editForm" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label>Category Name</label>
                <input type="text" id="editName" name="name" required>
            </div>

            <div class="form-group">
                <label>Change Icon</label>
                <input type="file" name="icon">
            </div>

            <div class="modal-actions">
                <button type="submit" class="btn update-btn">Update</button>
                <button type="button" class="btn cancel-btn" onclick="closeModal()">Cancel</button>
            </div>

        </form>

    </div>
</div>

<script>
    //edit button 
    function openModal(btn) {

        let id = btn.getAttribute('data-id');
        let name = btn.getAttribute('data-name');

        document.getElementById('editModal').style.display = 'flex';
        document.getElementById('editName').value = name;

        document.getElementById('editForm').action = '/admin/categories/update/' + id;
    }
    //Close Modal
    function closeModal() {
        document.getElementById('editModal').style.display = 'none';
    }
    //Search Query
   function searchCategory() {

    let input = document.getElementById('searchInput').value.toLowerCase();
    let rows = document.querySelectorAll('.category-table tbody tr');

    // 👉 Agar input empty hai → sab show
    if (input === '') {
        rows.forEach(function(row) {
            row.style.display = '';
        });
        return;
    }

    // 👉 Normal search
    rows.forEach(function(row) {

            let name = row.cells[1].innerText.toLowerCase();

            if (name.includes(input)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }

        });
    }
    //Sort Table
    let asc = true; // toggle ke liye

    function sortTable() {

        let table = document.querySelector(".category-table tbody");
        let rows = Array.from(table.rows);

        rows.sort(function(a, b) {

            let nameA = a.cells[1].innerText.toLowerCase();
            let nameB = b.cells[1].innerText.toLowerCase();

            if (asc) {
                return nameA.localeCompare(nameB);
            } else {
                return nameB.localeCompare(nameA);
            }

        });

        // toggle direction
        asc = !asc;

        // rows dobara append karo
        rows.forEach(function(row) {
            table.appendChild(row);
        });
    }



</script>
@endsection