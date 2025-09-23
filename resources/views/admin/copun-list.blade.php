@extends('admin.layout.main')

@section('content')
    <div class="container mt-4">
        <h2>Coupon List</h2>
        <a href="#" class="btn btn-dark mb-3 float-end" data-bs-toggle="modal" data-bs-target="#createCouponModal"
            style="width: 200px;">Add Coupon</a>

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Code</th>
                    <th>Description</th>
                    <th>Discount Amount</th>
                    <th>Discount Type</th>
                    <th>Expires At</th>
                    <th>Status</th>
                    <th>Usage Limit</th>
                    <th>Per User Limit</th>
                    <th>Min Cart Amount</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($coupons as $coupon)
                    <tr>
                        <td>{{ $coupon->id }}</td>
                        <td>{{ $coupon->code }}</td>
                        <td>{{ $coupon->description }}</td>
                        <td>
                            @if ($coupon->discount_type === 'percentage')
                                {{ $coupon->discount }}%
                            @else
                                ${{ number_format($coupon->discount, 2) }}
                            @endif
                        </td>
                        <td>{{ ucfirst($coupon->discount_type) }}</td>
                        <td>{{ \Carbon\Carbon::parse($coupon->expires_at)->format('d M Y') }}</td>

                        <!-- New Fields -->
                        <td>
                            @if ($coupon->status === 'active')
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-danger">Inactive</span>
                            @endif
                        </td>
                        <td>{{ $coupon->usage_limit ?? 'Unlimited' }}</td>
                        <td>{{ $coupon->per_user_limit ?? 'Unlimited' }}</td>
                        <td>
                            @if ($coupon->minimum_cart_amount)
                                ${{ number_format($coupon->minimum_cart_amount, 2) }}
                            @else
                                None
                            @endif
                        </td>

                        <!-- Actions -->
                        <td>
                            <!-- Edit Button -->
                            <button class="btn btn-sm btn-primary editCouponBtn" data-id="{{ $coupon->id }}"
                                data-code="{{ $coupon->code }}" data-discount_type="{{ $coupon->discount_type }}"
                                data-discount="{{ $coupon->discount }}"
                                data-expires_at="{{ \Carbon\Carbon::parse($coupon->expires_at)->format('Y-m-d') }}"
                                data-description="{{ $coupon->description }}" data-status="{{ $coupon->status }}"
                                data-usage_limit="{{ $coupon->usage_limit }}"
                                data-per_user_limit="{{ $coupon->per_user_limit }}"
                                data-minimum_cart_amount="{{ $coupon->minimum_cart_amount }}">
                                Edit
                            </button>

                            <!-- Delete Button -->
                            <form action="{{ route('admin.coupons.destroy', $coupon->id) }}" method="POST"
                                style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    onclick="return confirm('Are you sure you want to delete this coupon?')"
                                    class="btn btn-sm btn-danger">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="11" class="text-center">No coupons found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </div>


    <!-- Create Coupon Modal -->
    <div class="modal fade" id="createCouponModal" tabindex="-1" aria-labelledby="createCouponModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="couponForm" method="POST" action="{{ route('admin.coupons.store') }}">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Create Coupon</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Coupon Code</label>
                            <input type="text" class="form-control" name="code" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Discount Type</label>
                            <select class="form-control" name="discount_type" required>
                                <option value="percentage">Percentage</option>
                                <option value="fixed">Fixed Amount</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Discount Amount</label>
                            <input type="number" class="form-control" name="discount" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Expiration Date</label>
                            <input type="date" class="form-control" name="expires_at" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" name="description"></textarea>
                        </div>

                        <!-- New Fields -->
                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select class="form-control" name="status" required>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Usage Limit (Global)</label>
                            <input type="number" class="form-control" name="usage_limit"
                                placeholder="Leave empty for unlimited">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Per User Limit</label>
                            <input type="number" class="form-control" name="per_user_limit"
                                placeholder="Leave empty for unlimited">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Minimum Cart Amount</label>
                            <input type="number" step="0.01" class="form-control" name="minimum_cart_amount"
                                placeholder="e.g. 100.00">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Create Coupon</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Edit Coupon Modal -->
    <div class="modal fade" id="editCouponModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="editCouponForm" action="{{ route('admin.coupons.update', 'id') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Coupon</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">
                        <input type="hidden" id="editCouponId">

                        <div class="mb-3">
                            <label class="form-label">Coupon Code</label>
                            <input type="text" class="form-control" id="editCouponCode" name="code" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Discount Type</label>
                            <select class="form-control" id="editDiscountType" name="discount_type" required>
                                <option value="percentage">Percentage</option>
                                <option value="fixed">Fixed Amount</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Discount Amount</label>
                            <input type="number" class="form-control" id="editDiscountAmount" name="discount" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Expiration Date</label>
                            <input type="date" class="form-control" id="editExpiresAt" name="expires_at" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" id="editDescription" name="description"></textarea>
                        </div>

                        <!-- ✅ Missing Fields Added Below -->

                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select class="form-control" id="editStatus" name="status" required>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Usage Limit (Total)</label>
                            <input type="number" class="form-control" id="editUsageLimit" name="usage_limit"
                                min="0">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Per User Limit</label>
                            <input type="number" class="form-control" id="editPerUserLimit" name="per_user_limit"
                                min="0">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Minimum Cart Amount</label>
                            <input type="number" class="form-control" id="editMinimumCartAmount"
                                name="minimum_cart_amount" step="0.01" min="0">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update Coupon</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.editCouponBtn').on('click', function() {
                const id = $(this).data('id');
                const code = $(this).data('code');
                const discount_type = $(this).data('discount_type');
                const discount = $(this).data('discount');
                const expires_at = $(this).data('expires_at');
                const description = $(this).data('description');
                const status = $(this).data('status');
                const usage_limit = $(this).data('usage_limit');
                const per_user_limit = $(this).data('per_user_limit');
                const minimum_cart_amount = $(this).data('minimum_cart_amount');


                // Fill modal inputs
                $('#editCouponCode').val(code);
                $('#editDiscountType').val(discount_type);
                $('#editDiscountAmount').val(discount);
                $('#editExpiresAt').val(expires_at);
                $('#editDescription').val(description);
                // New Fields
                $('#editStatus').val(status);
                $('#editUsageLimit').val(usage_limit);
                $('#editPerUserLimit').val(per_user_limit);
                $('#editMinimumCartAmount').val(minimum_cart_amount);

                // Set form action
                $('#editCouponForm').attr('action', `/admin/coupons/${id}`);

                // Show modal
                var editModal = new bootstrap.Modal(document.getElementById('editCouponModal'));
                editModal.show();
            });
        });
    </script>
@endsection
