@extends('frontend.layout.main')
@section('content')
<div class="container text-center py-5">
    <h2 class="text-danger">❌ Payment Cancelled</h2>
    <p>Your payment was cancelled. Please try again.</p>
    <a href="{{ route('frontend.cart') }}" class="btn btn-warning mt-3">Go Back to Cart</a>
</div>
@endsection