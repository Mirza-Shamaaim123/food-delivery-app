@extends('admin.layout.main')

@section('content')
    <style>
        .dropdown-menu a:hover,
        .dropdown-menu button:hover {
            background: #f8f9fa;
        }
    </style>
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

                        <td style="padding:12px; position:relative;">
                            <div class="dropdown">
                                <button class="dropdown-toggle"
                                    style="background:none; border:none; cursor:pointer; font-size:20px;">⋮</button>

                                <div class="dropdown-menu"
                                    style="display:none; position:absolute; right:0; top:30px; background:white; border:1px solid #ddd;
                   border-radius:6px; box-shadow:0 4px 10px rgba(0,0,0,0.1); min-width:120px; z-index:999;">

                                    <!-- 👁️ View -->
                                    <a href="#"
                                        style="display:block; padding:8px 12px; text-decoration:none; color:#333;">👁️
                                        View</a>

                                    <!-- ✏️ Edit -->
                                    <a href="#" class="editBlogBtn" data-id="{{ $blog->id }}"
                                        data-title="{{ $blog->title }}" data-category="{{ $blog->category }}"
                                        data-content="{{ $blog->content }}" data-status="{{ $blog->status }}"
                                        data-image="{{ asset('storage/' . $blog->image) }}"
                                        style="display:block; padding:8px 12px; text-decoration:none; color:#007bff;">
                                        ✏️ Edit
                                    </a>

                                    <!-- 🗑️ Delete -->
                                    <form action="{{ route('admin.blogs.destroy', $blog->id) }}" method="POST"
                                        style="margin:0;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            style="width:100%; text-align:left; background:none; border:none; color:#dc3545; 
                           padding:8px 12px; cursor:pointer;">
                                            🗑️ Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
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
              width:700px; max-width:95%; box-shadow:0 5px 20px rgba(0,0,0,0.2); 
              animation:fadeIn 0.25s ease;">

            <h3 style="margin-bottom:15px; color:#155d27; font-weight:600;">➕ Add New Blog</h3>

            <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data"
                style="display:flex; flex-direction:column; gap:12px;">
                @csrf
                <input type="text" name="title" placeholder="Enter blog title"
                    style="padding:10px; border:1px solid #ccc; border-radius:6px;">

                <input type="text" name="category" placeholder="Enter category"
                    style="padding:10px; border:1px solid #ccc; border-radius:6px;">

            


                {{-- TEXT EDITIOR --}}
                <textarea id="description" name="content" rows="6" placeholder="Write blog content..."></textarea>
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
              width:700px; max-width:95%; box-shadow:0 5px 20px rgba(0,0,0,0.2);
              animation:fadeIn 0.25s ease;">

            <h3 style="margin-bottom:15px; color:#155d27; font-weight:600;">✏️ Edit Blog</h3>

            <form id="editBlogForm" action="{{ route('blogs.update', 'id') }}" method="POST" enctype="multipart/form-data"
                style="display:flex; flex-direction:column; gap:12px;">
                @csrf
                @method('PUT')

                <input type="hidden" name="id" id="editBlogId">

                <input type="text" name="title" id="editTitle" placeholder="Enter blog title"
                    style="padding:10px; border:1px solid #ccc; border-radius:6px;">

                <input type="text" name="category" id="editCategory" placeholder="Enter category"
                    style="padding:10px; border:1px solid #ccc; border-radius:6px;">

               


                {{-- TEXT EDITIOR --}}
                <textarea id="editContent" name="content" rows="5"
                    style="padding:10px; border:1px solid #ccc; border-radius:6px;">
                </textarea>
                <label style="font-weight:500;">Image</label>

                <!-- File input -->
                <div style="display:flex; align-items:center; gap:10px;">
                    <input type="file" name="image" id="editImageInput"
                        style="flex:1; padding:8px; border:1px solid #ccc; border-radius:6px; background:#f9f9f9; cursor:pointer;">
                </div>

                <!-- Preview -->
                <div style="margin-top:10px;">
                    <img id="editImagePreview" src="" alt="Current Image"
                        style="width:100px; height:100px; border-radius:8px; object-fit:cover; border:1px solid #ddd; display:none;">
                </div>

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

    {{-- Dropdown JS --}}
    <script>
        document.querySelectorAll('.dropdown-toggle').forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.stopPropagation(); // prevent window click from closing it immediately
                const menu = btn.nextElementSibling;

                // Close all other open dropdowns
                document.querySelectorAll('.dropdown-menu').forEach(m => {
                    if (m !== menu) m.style.display = 'none';
                });

                // Toggle current menu
                menu.style.display = (menu.style.display === 'block') ? 'none' : 'block';
            });
        });

        // Close dropdown when clicking outside
        window.addEventListener('click', () => {
            document.querySelectorAll('.dropdown-menu').forEach(m => m.style.display = 'none');
        });
    </script>





    {{-- ✅ Edit Blog Modal JS --}}
    <script>
        const editModal = document.getElementById('editBlogModal');
        const closeEditModalBtn = document.getElementById('closeEditModalBtn');
        const editForm = document.getElementById('editBlogForm');
        const imageInput = document.getElementById('editImageInput');
        const preview = document.getElementById('editImagePreview');

        // ✅ Open Edit Modal
        document.querySelectorAll('.editBlogBtn').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();

                // Get data
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

                // Show current image
                if (image && image.trim() !== "") {
                    preview.src = image;
                    preview.style.display = 'block';
                } else {
                    preview.style.display = 'none';
                }

                // Reset file input
                imageInput.value = '';

                // Set form action dynamically
                editForm.action = `/admin/blogs/${id}`;

                // Show modal
                editModal.style.display = 'flex';
            });
        });

        // ✅ Live image preview when user selects a new file
        imageInput.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            }
        });

        // ✅ Close Modal
        closeEditModalBtn.addEventListener('click', () => {
            editModal.style.display = 'none';
        });

        window.addEventListener('click', (e) => {
            if (e.target === editModal) editModal.style.display = 'none';
        });
    </script>

    {{-- ✅ CKEditor JS  For Add Blog --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            ClassicEditor
                .create(document.querySelector('#description'), {
                    ckfinder: {
                        uploadUrl: "{{ route('ckeditor.upload') . '?_token=' . csrf_token() }}"
                    },
                    image: {
                        toolbar: ['imageTextAlternative', 'imageStyle:full', 'imageStyle:side']
                    }
                })
                .then(editor => {
                    console.log('✅ CKEditor loaded for Add Blog');
                })
                .catch(error => {
                    console.error('CKEditor initialization failed:', error);
                });
        });
    </script>

    {{-- ✅ CKEditor JS  For Edit Blog --}}
    <script>
        let editBlogEditor; // store CKEditor instance

        // When the Edit Blog Modal opens
        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('editBlogBtn')) {
                const modal = document.getElementById('editBlogModal');
                modal.style.display = 'flex';

                // Initialize CKEditor if not already
                setTimeout(() => {
                    if (!$('#editContent').data('ckeditor-initialized')) {
                        ClassicEditor
                            .create(document.querySelector('#editContent'), {
                                ckfinder: {
                                    uploadUrl: "{{ route('ckeditor.upload') . '?_token=' . csrf_token() }}"
                                }
                            })
                            .then(editor => {
                                editBlogEditor = editor;
                                $('#editContent').data('ckeditor-initialized', true);
                                console.log("✅ CKEditor initialized in Edit Modal");
                            })
                            .catch(error => console.error("CKEditor Edit Init Error:", error));
                    }
                }, 300);
            }
        });
    </script>
   
@endsection
