@extends('frontend.layout.main')
@section('content')
<div class="container text-center py-5">
    <h2 class="text-success">🎉 Payment Successful!</h2>
    <p>Thank you for your order. We’ve received your payment.</p>
    <a href="{{ route('home') }}" class="btn btn-primary mt-3">Go to Home</a>
</div>
@endsection