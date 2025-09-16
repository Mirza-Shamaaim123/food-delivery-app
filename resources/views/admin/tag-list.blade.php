@extends('admin.layout.main')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Tags List</h2>
            <a href="#" class="btn btn-primary" style="background-color: black; border-color: black;"
                data-bs-toggle="modal" data-bs-target="#addTagModal">Add Tag</a>


        </div>

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tag Name</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tags as $tag)
                    <tr>
                        <td>{{ $tag->id }}</td>
                        <td>{{ $tag->name }}</td>
                        <td>{{ $tag->status }}</td>
                        <td>
                            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editTagModal"
                                onclick="openEditTagModal({{ $tag->id }}, '{{ $tag->name }}', '{{ $tag->status }}')">
                                Edit
                            </button>

                            <form id="delete-form-{{ $tag->id }}" action="{{ route('admin.tag.delete', $tag->id) }}"
                                method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger"
                                    style="background-color: black; border-color: black;"
                                    onclick="confirmDelete({{ $tag->id }}, '{{ addslashes($tag->name) }}')">
                                    Delete
                                </button>
                            </form>


                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- Modal  Add Tag-->
    <div class="modal fade" id="addTagModal" tabindex="-1" aria-labelledby="addTagModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="{{ route('admin.tag.store') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="addTagModalLabel">Add New Tag</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="tagName" class="form-label">Tag Name</label>
                            <input type="text" class="form-control" id="tagName" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="tagStatus" class="form-label">Status</label>
                            <select class="form-control" id="tagStatus" name="status" required>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Tag</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Tag Modal -->
    <div class="modal fade" id="editTagModal" tabindex="-1" aria-labelledby="editTagModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form id="editTagForm" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="modal-header">
                        <h5 class="modal-title" id="editTagModalLabel">Edit Tag</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <input type="hidden" name="tag_id" id="editTagId">

                        <div class="mb-3">
                            <label for="editTagName" class="form-label">Tag Name</label>
                            <input type="text" class="form-control" name="name" id="editTagName" required>
                        </div>

                        <div class="mb-3">
                            <label for="editTagStatus" class="form-label">Status</label>
                            <select class="form-control" name="status" id="editTagStatus" required>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update Tag</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- EDIT TAG MODAL javascript --}}
    <script>
        function openEditTagModal(id, name, status) {
            document.getElementById('editTagId').value = id;
            document.getElementById('editTagName').value = name;
            document.getElementById('editTagStatus').value = status;

            // Update form action dynamically
            document.getElementById('editTagForm').action = '/admin/tag/' + id;
        }
    </script>
    <script>
        function confirmDelete(id, tagName) {
            Swal.fire({
                title: 'Are you sure?',
                text: `You want to delete the tag "${tagName}"?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                }
            });

        }
    </script>
@endsection
