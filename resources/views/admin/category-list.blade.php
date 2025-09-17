@extends('admin.layout.main')

@section('content')
    <style>
        #imagePreview img {
            width: 50px;
            /* fix width */
            height: 50px;
            /* fix height */
            object-fit: cover;
            /* image crop ho ke fit ho jayegi */

        }
    </style>


    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Category List</h2>
            <a href="#" class="btn  mb-3" style="background-color: black; border-color: black; color: white;"
                id="openAddCategoryModal">+ Add Category</a>
        </div>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Available Items</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($category as $cat)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $cat->name }}</td>
                        <td>{{ $cat->available_items }}</td>

                        <td>
                            @if ($cat->image)
                                {{-- <img src="{{ asset('storage/images/category/' . $cat->image) }}" width="100">  --}}

                                <img src="{{ asset('storage/' . $cat->image) }}" width="80" height="80"
                                    alt="Category Image">
                            @else
                                <span class="text-muted">No Image</span>
                            @endif
                        </td>
                        <td>
                            @if ($cat->status == 'active')
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-danger">Inactive</span>
                            @endif
                        </td>
                        <td>{{ $cat->created_at->format('d M, Y') }}</td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-sm btn-secondary dropdown-toggle" type="button"
                                    data-bs-toggle="dropdown">
                                    ⋮
                                </button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="#" class="dropdown-item viewCategoryBtn"
                                            data-id="{{ $cat->id }}" data-name="{{ $cat->name }}"
                                            {{-- data-description="{{ $cat->description }}" --}} data-available="{{ $cat->available_items }}"
                                            data-status="{{ $cat->status }}" data-image="{{ $cat->image }}"
                                            data-created="{{ $cat->created_at }}">
                                            View
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="dropdown-item editCategoryBtn"
                                            data-id="{{ $cat->id }}" data-name="{{ $cat->name }}"
                                            {{-- data-description="{{ $cat->description }}" --}} data-available="{{ $cat->available_items }}"
                                            data-status="{{ $cat->status }}" data-image="{{ $cat->image }}">
                                            Edit
                                        </a>
                                    </li>
                                    <li>
                                        <form action="{{ route('admin.category.delete', $cat->id) }}" method="POST"
                                            class="deleteCategoryForm">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="dropdown-item text-danger">Delete</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Add Category Modal -->
        <div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addCategoryModalLabel">Add New Category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form id="categoryForm" action="{{ route('admin.category.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <label for="name">Category Name</label>
                            <input type="text" id="name" name="name" placeholder="Enter category name" required
                                class="form-control">

                            {{-- <label for="description">Description</label>
            <textarea id="description" name="description" placeholder="Enter category description" class="form-control"></textarea> --}}

                            <label for="available_items">Available Items</label>
                            <input type="number" id="available_items" name="available_items" min="0"
                                placeholder="Enter available items" class="form-control" required>

                            <label for="status">Status</label>
                            <select name="status" class="form-control" required>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>

                            <label for="image">Category Image</label>
                            <input type="file" id="image" name="image" accept="image/*" class="form-control">
                            <div id="imagePreview" style="margin-top:10px;">No image selected</div>

                            <button type="submit" class="btn btn-success w-100 mt-3">Add Category</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{-- UPDATE CATEGORY MODEL --}}
       <div class="modal fade" id="updateCategoryModal" tabindex="-1" aria-labelledby="updateCategoryModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateCategoryModalLabel">Update Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="updateCategoryForm" action="#" method="POST" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" id="update_category_id" name="id">

                    <label for="update_name">Category Name</label>
                    <input type="text" id="update_name" name="name" class="form-control" required>

                    <label for="update_available_items">Available Items</label>
                    <input type="number" id="update_available_items" name="available_items" min="0"
                        class="form-control" required>

                    <label for="update_status">Status</label>
                    <select id="update_status" name="status" class="form-control" required>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>

                    <div class="mb-3">
                        <label for="update_image">Category Image</label>
                        <input type="file" id="update_image" name="image" accept="image/*"
                            class="form-control">

                        <!-- Purani image preview -->
                        <img id="update_imagePreview" src="" alt="Category Image"
                            style="max-width:120px; margin-top:10px; display:none;">
                    </div>

                    <button type="submit" class="btn btn-success w-100 mt-3">Update Category</button>
                </form>
            </div>
        </div>
    </div>
</div>







        {{-- VIEW DETAILS PAGE --}}
        <!-- View Category Modal -->
        <div class="modal fade" id="viewCategoryModal" tabindex="-1" aria-labelledby="viewCategoryLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" id="viewCategoryLabel">Category Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <div class="card text-center">
                            <div class="card-body">
                                <div id="view_imagePreview" style="margin-bottom:15px;">
                                    <img src="" alt="Category Image" class="img-fluid rounded"
                                        style="max-height:150px;">
                                </div>
                                <h5 class="card-title" id="view_name"></h5>
                                <p class="card-text" id="view_description"></p>
                                <p><strong>Available Items:</strong> <span id="view_available_items"></span></p>
                                <p><strong>Created At:</strong> <span id="view_created"></span></p>
                                <p><strong>Status:</strong> <span id="view_status"></span></p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>




        <!-- Image Preview Script -->
        <script>
            const imageInput = document.getElementById('image');
            const imagePreview = document.getElementById('imagePreview');

            imageInput.addEventListener('change', function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        imagePreview.innerHTML = `<img src="${e.target.result}" alt="Category Image">`;
                    }
                    reader.readAsDataURL(file);
                } else {
                    imagePreview.innerHTML = 'No image selected';
                }
            });
        </script>

        <!-- Modal Open Script -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const addBtn = document.getElementById('openAddCategoryModal');
                addBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    const addCategoryModal = new bootstrap.Modal(document.getElementById('addCategoryModal'));
                    addCategoryModal.show();
                });
            });
        </script>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

        {{-- UPDATE MODEL JS --}}
       <script>
    document.addEventListener('DOMContentLoaded', function () {
        const updateModal = new bootstrap.Modal(document.getElementById('updateCategoryModal'));

        document.querySelectorAll('.editCategoryBtn').forEach(button => {
            button.addEventListener('click', function (e) {
                e.preventDefault();

                // Populate modal fields
                document.getElementById('update_category_id').value = this.dataset.id;
                document.getElementById('update_name').value = this.dataset.name;
                document.getElementById('update_available_items').value = this.dataset.available;
                document.getElementById('update_status').value = this.dataset.status;

                // ✅ Image preview
                const imgPreview = document.getElementById('update_imagePreview');
                if (this.dataset.image) {
                    imgPreview.src = `/storage/${this.dataset.image}`;
                    imgPreview.style.display = 'block';
                } else {
                    imgPreview.style.display = 'none';
                }

                // ✅ Set form action dynamically with correct ID
                document.getElementById('updateCategoryForm').action = '/admin/category/' + this.dataset.id + '/update';

                // Show modal
                updateModal.show();
            });
        });

        // ✅ Image preview when new file selected
        const updateImageInput = document.getElementById('update_image');
        const updateImagePreview = document.getElementById('update_imagePreview');

        updateImageInput.addEventListener('change', function () {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    updateImagePreview.src = e.target.result;
                    updateImagePreview.style.display = 'block';
                }
                reader.readAsDataURL(file);
            }
        });
    });
</script>

        {{-- DELETE CONFIRM     SWEET ALERT --}}

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const deleteForms = document.querySelectorAll('.deleteCategoryForm');

                deleteForms.forEach(form => {
                    form.addEventListener('submit', function(e) {
                        e.preventDefault(); // Form ko turant submit hone se roko

                        Swal.fire({
                            title: 'Are you sure?',
                            text: "You won’t be able to delete this!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Yes, delete it!'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                form.submit(); // Agar confirm kiya to form submit
                            }
                        });
                    });
                });
            });
        </script>


        {{-- VIEW MODEL --}}
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const viewModal = new bootstrap.Modal(document.getElementById('viewCategoryModal'));

                document.querySelectorAll('.viewCategoryBtn').forEach(button => {
                    button.addEventListener('click', function(e) {
                        e.preventDefault();

                        // Fill modal fields
                        document.getElementById('view_name').innerText = this.dataset.name;
                        // document.getElementById('view_description').innerText = this.dataset.description || 'No description';
                        document.getElementById('view_available_items').innerText = this.dataset
                            .available;
                        document.getElementById('view_created').innerText = this.dataset.created;

                        document.getElementById('view_status').innerText = this.dataset.status;

                        const imgPreview = document.getElementById('view_imagePreview').querySelector(
                            "img");
                        if (this.dataset.image) {
                            imgPreview.src = "/images/" + this.dataset.image;
                        } else {
                            imgPreview.src = "https://via.placeholder.com/150x100?text=No+Image";
                        }

                        // Show modal
                        viewModal.show();
                    });
                });
            });
        </script>




    </div>
@endsection
