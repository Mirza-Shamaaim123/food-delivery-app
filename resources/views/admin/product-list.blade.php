@extends('admin.layout.main')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Category List</title>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">


        <style>
            /* body {
                                                                                                                                                                                                                  font-family: 'Inter', sans-serif;
                                                                                                                                                                                                                  background-color: #f9f9f9;
                                                                                                                                                                                                                  padding: 30px;
                                                                                                                                                                                                                } */

            h2 {
                font-size: 24px;
                margin-bottom: 20px;
            }

            .table-container {
                background: #fff;
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
            }

            .top-bar {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 20px;
            }

            .btn-add {
                background-color: #000;
                color: #fff;
                padding: 10px 16px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                font-weight: 600;
            }

            table {
                width: 100%;
                border-collapse: collapse;
            }

            th,
            td {
                padding: 12px 15px;
                text-align: center;
                border-bottom: 1px solid #e0e0e0;
            }

            th {
                background-color: #f2f2f2;
                font-weight: 600;
            }

            tr:hover {
                background-color: #f9f9f9;
            }

            .product-img {
                width: 50px;
                height: 50px;
                object-fit: cover;
                border-radius: 50%;
            }

            .badge-active {
                background-color: #28a745;
                color: #fff;
                padding: 4px 10px;
                font-size: 13px;
                border-radius: 12px;
                font-weight: 600;
            }

            .action-btn {
                background-color: #6c757d;
                color: white;
                padding: 6px 10px;
                border-radius: 4px;
                cursor: pointer;
                font-weight: bold;
                border: none;
            }

            .dropdown {
                position: relative;
                display: inline-block;
            }

            /* Dropdown menu */
            .dropdown-menu {
                display: none;
                position: absolute;
                top: 110%;
                right: 0;
                background-color: #fff;
                border: 1px solid #ddd;
                border-radius: 6px;
                min-width: 130px;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
                z-index: 1000;
                padding: 8px 0;
            }

            /* Show dropdown */
            .dropdown.show .dropdown-menu {
                display: block;
            }

            /* Dropdown list items */
            .dropdown-menu li {
                padding: 6px 16px;
                font-size: 14px;
                transition: background 0.2s ease;
            }

            /* Dropdown links & buttons */
            .dropdown-menu li a,
            .dropdown-menu li button {
                text-decoration: none;
                color: #333;
                background: none;
                border: none;
                width: 100%;
                text-align: left;
                font-family: inherit;
                font-size: 14px;
                cursor: pointer;
                padding: 4px 0;
            }

            /* Hover effect */
            .dropdown-menu li:hover {
                background-color: #f2f2f2;
            }

            .dropdown-menu li button.text-danger {
                color: #dc3545;
            }
        </style>
    </head>

    <body>

        <div class="table-container">
            <div class="top-bar">
                <h2>Product List</h2>
                <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#addProductModal">
                    Add Product
                </button>

            </div>



            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NAME</th>
                        <th>PRICE</th>
                        <th>DESCRIPTION</th>
                        <th>IMAGE</th>
                        <th>STATUS</th>
                        <th>CREATED AT</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>Rs. {{ number_format($product->price, 2) }}</td>
                            <td>{{ $product->description }}</td>
                            <td>
                                @if ($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}" width="80" height="80"
                                        alt="Category Image">
                                @else
                                    N/A
                                @endif
                            </td>
                            <td>
                                @if ($product->status == 'active')
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-danger">Inactive</span>
                                @endif
                            </td>
                            {{-- @if ($product->status == 'active')
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-danger">Inactive</span>
                            @endif --}}
                            <td>{{ $product->created_at->format('d-m-Y') }}</td>
                            <td class="position-relative">
                                <div class="dropdown">
                                    <button class="action-btn" onclick="toggleDropdown(this)">⋮</button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="#" class="dropdown-item viewProductBtn"
                                                data-id="{{ $product->id }}" data-name="{{ $product->name }}"
                                                data-price="{{ $product->price }}"
                                                data-description="{{ $product->description }}"
                                                data-status="{{ $product->status }}" {{-- @foreach ($categories as $cat)
                                                data-category="{{ $product->cat->name ?? 'N/A' }}"
                                                    
                                                @endforeach --}}
                                                data-image="{{ $product->image }}"
                                                data-created="{{ $product->created_at }}">
                                                View
                                            </a>
                                        </li>
                                        <li>
                                            <button type="button" class="btn btn-link p-0 m-0 text-start"
                                                onclick="openEditModal({{ $product }})">
                                                Edit
                                            </button>
                                        </li>
                                        <li>
                                            <form action="{{ route('admin.product.delete', $product->id) }}" method="POST"
                                                onsubmit="return confirm('Are you sure you want to delete this product?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="btn btn-link text-danger p-0 m-0">Delete</button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </td>

                        </tr>
                    @endforeach



                </tbody>
            </table>
        </div>

    </body>

    </html>

    <!-- Add Product Modal -->
    <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="addProductModalLabel">Add Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Product Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">SKU</label>
                            <input type="text" name="sku" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Regular Price</label>
                            <input type="number" name="price" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Sale Price</label>
                            <input type="number" name="sale_price" class="form-control" min="0" step="0.01">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea name="description" class="form-control"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Stock Availability</label>
                            <select name="in_stock" class="form-control" required>
                                <option value="1">In Stock</option>
                                <option value="0">Out of Stock</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="status">Category</label>

                            <select name="category_id" class="form-control" required>
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="tags">Tags</label>
                            <select name="tags[]" id="tags" class="form-control" multiple>
                                @foreach ($tags as $tag)
                                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                @endforeach
                            </select>
                        </div>








                        <div class="mb-3">
                            <label for="status">Status</label>
                            <select name="status" class="form-control" required>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>

                        </div>


                        <div class="mb-3">
                            <label class="form-label">Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-success">Save Product</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- Edit Product Modal -->
    <div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editProductModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="editProductForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="modal-header">
                        <h5 class="modal-title" id="editProductModalLabel">Edit Product</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <!-- Hidden ID -->
                        <input type="hidden" id="editProductId" name="id">

                        <!-- Product Name -->
                        <div class="mb-3">
                            <label for="editName" class="form-label">Product Name</label>
                            <input type="text" class="form-control" name="name" id="editName" required>
                        </div>

                        <!-- Price -->
                        <div class="mb-3">
                            <label for="editPrice" class="form-label">Price</label>
                            <input type="number" class="form-control" name="price" id="editPrice" required>
                        </div>

                        <!-- Description -->
                        <div class="mb-3">
                            <label for="editDescription" class="form-label">Description</label>
                            <textarea class="form-control" name="description" id="editDescription" rows="3"></textarea>
                        </div>

                        <!-- Category -->
                        <div class="mb-3">
                            <label for="editCategory" class="form-label">Category</label>
                            <select class="form-control" name="category_id" id="editCategory" required>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="tags">Tags</label>
                            <select name="tags[]" id="editTags" class="form-control" multiple>
                                @foreach ($tags as $tag)
                                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Status -->
                        <div class="mb-3">
                            <label for="editStatus" class="form-label">Status</label>
                            <select class="form-control" name="status" id="editStatus" required>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>

                        <!-- Image Upload -->
                        <div class="mb-3">
                            <label for="editImage" class="form-label">Image</label>
                            <input type="file" class="form-control" name="image" id="editImage">

                            <!-- Old Image Preview -->
                            <img id="currentImagePreview" src="" alt="Current Image"
                                style="max-width: 120px; margin-top:10px; display:none;">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Update Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- View Product Modal -->
    <div class="modal fade" id="viewProductModal" tabindex="-1" aria-labelledby="viewProductLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="viewProductLabel">Product Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="card text-center">
                        <div class="card-body">
                            <div id="view_productImagePreview" style="margin-bottom:15px;">
                                <img src="" alt="Product Image" class="img-fluid rounded"
                                    style="max-height:200px;">
                            </div>
                            <h5 class="card-title" id="view_productName"></h5>
                            <p><strong>Description:</strong></p>
                            <p class="card-text" id="view_productDescription"></p>
                            <p><strong>Price:</strong> <span id="view_productPrice"></span></p>

                            <p><strong>Status:</strong> <span id="view_productStatus"></span></p>
                            <p><strong>Created At:</strong> <span id="view_productCreated"></span></p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>




    @push('scripts')
        <!-- Select2 JS include (agar nahi kiya toh) -->
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

        <script>
            function toggleDropdown(button) {
                document.querySelectorAll('.dropdown-menu.show').forEach(menu => {
                    menu.classList.remove('show');
                });
                const menu = button.nextElementSibling;
                menu.classList.toggle('show');
            }

            document.addEventListener('click', function(event) {
                if (!event.target.closest('.dropdown')) {
                    document.querySelectorAll('.dropdown-menu.show').forEach(menu => {
                        menu.classList.remove('show');
                    });
                }
            });

            // Add Product Modal: Select2 initialize
            $('#addProductModal').on('shown.bs.modal', function() {
                // Destroy if already initialized
                if ($('#tags').hasClass("select2-hidden-accessible")) {
                    $('#tags').select2('destroy');
                }
                $('#tags').select2({
                    dropdownParent: $('#addProductModal .modal-content'),
                    placeholder: "Select Tags",
                    allowClear: true
                });
            });

            // Edit Product Modal: Select2 initialize
            $('#editProductModal').on('shown.bs.modal', function() {
                if ($('#editTags').length) {
                    if ($('#editTags').hasClass("select2-hidden-accessible")) {
                        $('#editTags').select2('destroy');
                    }
                    $('#editTags').select2({
                        dropdownParent: $('#editProductModal .modal-content'),
                        placeholder: "Select Tags",
                        allowClear: true
                    });
                }
            });

            function openEditModal(product) {
                const form = document.getElementById('editProductForm');
                form.action = `/admin/product/${product.id}`;
                document.getElementById('editProductId').value = product.id;
                document.getElementById('editName').value = product.name;
                document.getElementById('editPrice').value = product.price;
                document.getElementById('editDescription').value = product.description || '';
                document.getElementById('editStatus').value = product.status;

                if (product.tags && Array.isArray(product.tags)) {
                    // Agar relation se tags aaye hain
                    $('#editTags').val(product.tags.map(tag => tag.id)).trigger('change');
                } else if (product.tag_ids) {
                    let selectedTags = [];

                    if (typeof product.tag_ids === "string") {
                        try {
                            selectedTags = JSON.parse(product.tag_ids); // "[1,2]" -> [1,2]
                        } catch (e) {
                            console.error("Invalid JSON in tag_ids", product.tag_ids);
                        }
                    } else if (Array.isArray(product.tag_ids)) {
                        selectedTags = product.tag_ids;
                    }

                    $('#editTags').val(selectedTags).trigger('change');
                }
                const imagePreview = document.getElementById('currentImagePreview');
                if (product.image) {
                    imagePreview.src = `/storage/${product.image}`;
                    imagePreview.style.display = 'block';
                } else {
                    imagePreview.style.display = 'none';
                }
                const openDropdown = document.querySelector('.dropdown-menu.show');
                if (openDropdown) {
                    openDropdown.classList.remove('show');
                }
                const modal = new bootstrap.Modal(document.getElementById('editProductModal'));
                modal.show();
            }
        </script>
        {{--  View Product Modal Script --}}
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const viewProductModal = new bootstrap.Modal(document.getElementById('viewProductModal'));

                document.querySelectorAll('.viewProductBtn').forEach(button => {
                    button.addEventListener('click', function(e) {
                        e.preventDefault();

                        document.getElementById('view_productName').innerText = this.dataset.name;
                        document.getElementById('view_productPrice').innerText = this.dataset.price;
                        document.getElementById('view_productDescription').innerText = this.dataset
                            .description || 'No description';
                        // document.getElementById('view_productCategory').innerText = this.dataset
                        //     .category;
                        document.getElementById('view_productStatus').innerText = this.dataset.status;
                        document.getElementById('view_productCreated').innerText = this.dataset.created;

                        const createdDate = new Date(this.dataset.created); // dataset me timestamp
                        const options = {
                            year: 'numeric',
                            month: 'short',
                            day: 'numeric',
                            hour: '2-digit',
                            minute: '2-digit'
                        };
                        document.getElementById('view_productCreated').innerText = createdDate
                            .toLocaleDateString('en-US', options);

                        const imgPreview = document.getElementById('view_productImagePreview')
                            .querySelector("img");
                        if (this.dataset.image) {
                            imgPreview.src = "/storage/" + this.dataset.image;
                        } else {
                            imgPreview.src = "https://via.placeholder.com/200x150?text=No+Image";
                        }

                        viewProductModal.show();
                    });
                });
            });
        </script>
    @endpush
@endsection
