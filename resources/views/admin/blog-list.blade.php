@extends('admin.layout.main')

@section('content')
    <div style="padding: 30px;">
        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
            <h2 style="margin:0;">📝 All Blogs</h2>
            <a href="#" id="openModalBtn"
                style="background:#28a745; color:white; padding:8px 15px; border-radius:6px; text-decoration:none; font-weight:500;">
                ➕ Add New Blog
            </a>
        </div>

        <table style="width:100%; border-collapse:collapse; margin-top:10px;">
            <thead>
                <tr style="background:#f8f9fa; border-bottom:2px solid #dee2e6;">
                    <th style="padding:12px; text-align:left;">#</th>
                    <th style="padding:12px; text-align:left;">Title</th>
                    <th style="padding:12px; text-align:left;">Category</th>
                    <th style="padding:12px; text-align:left;">Author</th>
                    <th style="padding:12px; text-align:left;">Status</th>
                    <th style="padding:12px; text-align:left;">Created At</th>
                    <th style="padding:12px; text-align:left;">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($blogs as $index => $blog)
                    <tr style="border-bottom:1px solid #ddd;">
                        <td style="padding:12px;">{{ $index + 1 }}</td>
                        <td style="padding:12px;">{{ $blog->title }}</td>
                        <td style="padding:12px;">{{ $blog->category ?? 'Uncategorized' }}</td>
                        <td style="padding:12px;">{{ $blog->author ?? 'Admin' }}</td>
                        <td style="padding:12px;">
                            @if ($blog->status == 'Published')
                                <span
                                    style="background:#c8f7c5; color:#155d27; padding:5px 10px; border-radius:6px;">Published</span>
                            @else
                                <span
                                    style="background:#f7c5c5; color:#5d1515; padding:5px 10px; border-radius:6px;">Draft</span>
                            @endif
                        </td>
                        <td style="padding:12px;">{{ $blog->created_at->format('d M Y') }}</td>
                        <td style="padding:12px;">
                            <a href="#" class="editBlogBtn" data-id="{{ $blog->id }}"
                                data-title="{{ $blog->title }}" data-category="{{ $blog->category }}"
                                data-content="{{ $blog->content }}" data-status="{{ $blog->status }}"
                                data-image="{{ asset('uploads/blogs/' . $blog->image) }}"
                                style="color:#007bff; text-decoration:none; margin-right:10px;">
                                ✏️ Edit
                            </a>

                            <form action="#" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    style="color:#dc3545; background:none; border:none; cursor:pointer;">🗑️ Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>


    <!-- ✅ Modal -->
    <div id="blogModal"
        style="display:none; position:fixed; inset:0; background:rgba(0,0,0,0.5); 
           backdrop-filter:blur(3px); z-index:9999; 
           justify-content:center; align-items:center;">

        <div
            style="background:white; padding:25px; border-radius:10px; 
              width:500px; max-width:90%; box-shadow:0 5px 20px rgba(0,0,0,0.2); 
              animation:fadeIn 0.25s ease;">

            <h3 style="margin-bottom:15px; color:#155d27; font-weight:600;">➕ Add New Blog</h3>

            <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data"
                style="display:flex; flex-direction:column; gap:12px;">
                @csrf
                <input type="text" name="title" placeholder="Enter blog title"
                    style="padding:10px; border:1px solid #ccc; border-radius:6px;">

                <input type="text" name="category" placeholder="Enter category"
                    style="padding:10px; border:1px solid #ccc; border-radius:6px;">

                <textarea name="content" rows="4" placeholder="Write blog content..."
                    style="padding:10px; border:1px solid #ccc; border-radius:6px;"></textarea>

                <label style="font-weight:500;">Upload Image:</label>
                <input type="file" name="image"
                    style="padding:8px; border:1px solid #ccc; border-radius:6px; background:#f9f9f9; cursor:pointer;">

                <select name="status" style="padding:10px; border:1px solid #ccc; border-radius:6px;">
                    <option value="1">Published</option>
                    <option value="0">Draft</option>
                </select>

                <div style="display:flex; justify-content:end; gap:10px; margin-top:10px;">
                    <button type="button" id="closeModalBtn"
                        style="background:#dc3545; color:white; border:none; padding:8px 15px; border-radius:6px; cursor:pointer;">Cancel</button>
                    <button type="submit"
                        style="background:#28a745; color:white; border:none; padding:8px 15px; border-radius:6px; cursor:pointer;">Save</button>
                </div>
            </form>
        </div>
    </div>


    <!-- ✅ Edit Blog Modal -->
    <div id="editBlogModal"
        style="display:none; position:fixed; inset:0; background:rgba(0,0,0,0.5);
           backdrop-filter:blur(3px); z-index:9999;
           justify-content:center; align-items:center;">

        <div
            style="background:white; padding:25px; border-radius:10px;
              width:500px; max-width:90%; box-shadow:0 5px 20px rgba(0,0,0,0.2);
              animation:fadeIn 0.25s ease;">

            <h3 style="margin-bottom:15px; color:#155d27; font-weight:600;">✏️ Edit Blog</h3>

            <form id="editBlogForm" method="POST" enctype="multipart/form-data"
                style="display:flex; flex-direction:column; gap:12px;">
                @csrf
                @method('PUT')

                <input type="hidden" name="id" id="editBlogId">

                <input type="text" name="title" id="editTitle" placeholder="Enter blog title"
                    style="padding:10px; border:1px solid #ccc; border-radius:6px;">

                <input type="text" name="category" id="editCategory" placeholder="Enter category"
                    style="padding:10px; border:1px solid #ccc; border-radius:6px;">

                <textarea name="content" id="editContent" rows="4" placeholder="Write blog content..."
                    style="padding:10px; border:1px solid #ccc; border-radius:6px;"></textarea>

                <label style="font-weight:500;">Upload New Image (optional):</label>
                <input type="file" name="image"
                    style="padding:8px; border:1px solid #ccc; border-radius:6px; background:#f9f9f9; cursor:pointer;">

                <select name="status" id="editStatus" style="padding:10px; border:1px solid #ccc; border-radius:6px;">
                    <option value="1">Published</option>
                    <option value="0">Draft</option>
                </select>

                <div style="display:flex; justify-content:end; gap:10px; margin-top:10px;">
                    <button type="button" id="closeEditModalBtn"
                        style="background:#dc3545; color:white; border:none; padding:8px 15px; border-radius:6px; cursor:pointer;">
                        Cancel
                    </button>
                    <button type="submit"
                        style="background:#28a745; color:white; border:none; padding:8px 15px; border-radius:6px; cursor:pointer;">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>


    <!-- ✅ Modal Animation -->
    <style>
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>

    <!-- ✅ JS -->
    <script>
        const modal = document.getElementById('blogModal');
        const openBtn = document.getElementById('openModalBtn');
        const closeBtn = document.getElementById('closeModalBtn');

        openBtn.addEventListener('click', (e) => {
            e.preventDefault();
            modal.style.display = 'flex';
        });

        closeBtn.addEventListener('click', () => {
            modal.style.display = 'none';
        });

        window.addEventListener('click', (e) => {
            if (e.target === modal) modal.style.display = 'none';
        });
    </script>
    {{-- ✅ Edit Blog Modal JS --}}
    <script>
        const editModal = document.getElementById('editBlogModal');
        const closeEditModalBtn = document.getElementById('closeEditModalBtn');
        const editForm = document.getElementById('editBlogForm');

        // ✅ Open Edit Modal
        document.querySelectorAll('.editBlogBtn').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();

                // Get data from button attributes
                const id = this.dataset.id;
                const title = this.dataset.title;
                const category = this.dataset.category;
                const content = this.dataset.content;
                const status = this.dataset.status;
                const image = this.dataset.image;

                // Fill modal fields
                document.getElementById('editBlogId').value = id;
                document.getElementById('editTitle').value = title;
                document.getElementById('editCategory').value = category;
                document.getElementById('editContent').value = content;
                document.getElementById('editStatus').value = status;

                // ✅ Handle image preview
                const preview = document.getElementById('editImagePreview');
                if (image) {
                    preview.src = image; // show current image URL
                    preview.style.display = 'block'; // make image visible
                } else {
                    preview.style.display = 'none'; // hide if no image
                }

                // Set form action dynamically
                editForm.action = `/admin/blogs/${id}`;

                // Show modal
                editModal.style.display = 'flex';
            });
        });

        // ✅ Close Modal
        closeEditModalBtn.addEventListener('click', () => {
            editModal.style.display = 'none';
        });

        window.addEventListener('click', (e) => {
            if (e.target === editModal) editModal.style.display = 'none';
        });
    </script>
@endsection
