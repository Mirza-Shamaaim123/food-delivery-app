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
                                @if ($product->status)
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
                                        <li><a href="">View</a></li>
                                        <li> <button type="button" class="btn btn-link p-0 m-0 text-start"
                                                onclick="openEditModal({{ $product }})">
                                                Edit
                                            </button></li>
                                        <li>
                                            <form action="" method="POST"
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
                            <label class="form-label">Price</label>
                            <input type="number" name="price" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea name="description" class="form-control"></textarea>
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
                            <select name="tag_ids[]" class="form-control " multiple required>
                                <option>Select Tags</option> {{-- 👈 Placeholder support --}}
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
    <div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editProductModalLabel" aria-hidden="true">
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
                        <!-- Form Fields -->
                        <input type="hidden" id="editProductId">

                        <div class="mb-3">
                            <label for="editName" class="form-label">Product Name</label>
                            <input type="text" class="form-control" name="name" id="editName" required>
                        </div>

                        <div class="mb-3">
                            <label for="editPrice" class="form-label">Price</label>
                            <input type="number" class="form-control" name="price" id="editPrice" required>
                        </div>

                        <div class="mb-3">
                            <label for="editDescription" class="form-label">Description</label>
                            <textarea class="form-control" name="description" id="editDescription" rows="3"></textarea>
                        </div>
                         <div class="mb-3">
                            <label for="editStatus" class="form-label">Status</label>
                            <select class="form-control" name="status" id="editStatus">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="editImage" class="form-label">Image</label>
                            <input type="file" class="form-control" name="image" id="editImage">
                        </div>

                       
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Update Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <script>
        function toggleDropdown(button) {
            // Close all other dropdowns
            document.querySelectorAll('.dropdown').forEach(drop => {
                if (drop !== button.parentElement) {
                    drop.classList.remove('show');
                }
            });

            // Toggle current dropdown
            const dropdown = button.parentElement;
            dropdown.classList.toggle('show');
        }

        // Close dropdown if clicked outside
        document.addEventListener('click', function(event) {
            if (!event.target.closest('.dropdown')) {
                document.querySelectorAll('.dropdown').forEach(drop => {
                    drop.classList.remove('show');
                });
            }
        });
    </script>
    <script>
        function openEditModal(product) {
            // Set form action dynamically
            const form = document.getElementById('editProductForm');
            form.action = `/admin/product/${product.id}`;

            // Fill values
            document.getElementById('editProductId').value = product.id;
            document.getElementById('editName').value = product.name;
            document.getElementById('editPrice').value = product.price;
            document.getElementById('editDescription').value = product.description;
            document.getElementById('editStatus').value = product.status;
            if (product.image) {
        const imagePreview = document.getElementById('currentImagePreview');
        if (imagePreview) {
            imagePreview.src = `/storage/${product.image}`;
            imagePreview.style.display = 'block';
        }
    }

            // Show the modal
            const modal = new bootstrap.Modal(document.getElementById('editProductModal'));
            modal.show();
        }
    </script>
   {{-- <script>
    $(document).ready(function() {
        $('.select2').select2({
            placeholder: "Select tags",
            allowClear: true
        });
    });
</script> --}}
@endsection
