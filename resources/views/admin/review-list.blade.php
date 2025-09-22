@extends('admin.layout.main')

@section('content')
    <h2>Customer Reviews</h2>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Product</th>
                <th>Name</th>
                <th>Comment</th>
                <th>Rating</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($reviews as $review)
                <tr>
                    <td>{{ $review->product->name ?? 'N/A' }}</td>
                    <td>{{ $review->name }}</td>
                    <td>{{ $review->comment }}</td>
                    <td>
                        @for ($i = 1; $i <= $review->rating; $i++)
                            ⭐
                        @endfor
                    </td>
                    <td>{{ ucfirst($review->status) }}</td>
                    
                        <!-- 3 Dots Dropdown -->
                    <td>
                        <div class="dropdown text-center">
                            <button class="btn btn-sm btn-light border-0" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <!-- Approve -->
                                <li>
                                    <form action="{{ route('admin.review.status', $review->id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="status" value="approved">
                                        <button type="submit" class="dropdown-item text-success">
                                            <i class="fas fa-check me-2"></i> Approve
                                        </button>
                                    </form>
                                </li>

                                <!-- Reject -->
                                <li>
                                    <form action="{{ route('admin.review.status', $review->id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="status" value="rejected">
                                        <button type="submit" class="dropdown-item text-danger">
                                            <i class="fas fa-times me-2"></i> Reject
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </td>



                
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">No reviews found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>


@endsection
