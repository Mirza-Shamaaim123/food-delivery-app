@extends('admin.layout.main')

@section('content')

    <style>
    

        
        .category-form {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            width: 400px;
        }

        .category-form h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .category-form label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .category-form input[type="text"],
        .category-form textarea,
        .category-form input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        .category-form textarea {
            resize: none;
            height: 80px;
        }

        .category-form button {
            width: 100%;
            padding: 12px;
            background-color: #28a745;
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .category-form button:hover {
            background-color: #218838;
        }

        /* Image preview style */
        #imagePreview {
            width: 100%;
            height: 150px;
            border: 1px dashed #ccc;
            margin-bottom: 15px;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #999;
            font-size: 14px;
            overflow: hidden;
        }

        #imagePreview img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>

<div class="d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <form class="category-form" action="{{ route('admin.category.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <h2>Add New Category</h2>

        <label for="name">Category Name</label>
        <input type="text" id="name" name="name" placeholder="Enter category name" required>

        {{-- <label for="slug">Slug (URL Friendly)</label>
        <input type="text" id="slug" name="slug" placeholder="e.g., fast-food" required> --}}

        <label for="description">Description</label>
        <textarea id="description" name="description" placeholder="Enter category description"></textarea>

         <label for="available_items">Available Items</label>
    <input type="number" id="available_items"  class="form-control" name="available_items" placeholder="Enter number of available items" min="0" value="0" required>

     <label for="">Status</label>
      <select name="status" class="form-control" required>
  <option value="active">Active</option>
  <option value="inactive">Inactive</option>
</select>

        <label for="image">Category Image</label>
        <input type="file" id="image" name="image" accept="image/*">
        <div id="imagePreview">No image selected</div>

        <button type="submit">Add Category</button>
    </form>
</div>
    <script>
        const imageInput = document.getElementById('image');
        const imagePreview = document.getElementById('imagePreview');

        imageInput.addEventListener('change', function() {
            const file = this.files[0];
            if(file) {
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


@endsection