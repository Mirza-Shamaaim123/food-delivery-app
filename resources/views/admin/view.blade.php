@extends('admin.layout.main')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="card shadow-lg" style="width: 400px;">
        <div class="card-header text-center bg-primary text-white">
            <h4>{{ $category->name }}</h4>
        </div>
        <div class="card-body text-center">
            @if($category->image)
                <img src="/images/{{ $category->image }}" 
                     alt="Category Image" 
                     class="img-fluid rounded mb-3"
                     style="width: 200px; height: 200px; object-fit: cover;">
            @else
                <p>No Image</p>
            @endif

            {{-- <p><strong>Description:</strong> {{ $category->description ?? 'N/A' }}</p> --}}
            <p><strong>Available Items:</strong> {{ $category->available_items }}</p>
            <p>
                <strong>Status:</strong> 
                @if($category->status == 1)
                    <span class="badge bg-success">Active</span>
                @else
                    <span class="badge bg-danger">Inactive</span>
                @endif
            </p>
            <p><strong>Created At:</strong> {{ $category->created_at->format('d M, Y') }}</p>
            <p><strong>Updated At:</strong> {{ $category->updated_at->format('d M, Y') }}</p>
        </div>
        <div class="card-footer text-center">
            <a href="{{ route('admin.categorylist') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
</div>
@endsection
