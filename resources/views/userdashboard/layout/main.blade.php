@extends('frontend.layout.main')

@section('content')
<div style="display: flex; min-height: 80vh; background-color: #f4f9f4;">

  <!-- Sidebar (common for all dashboard pages) -->
  <aside style="width: 220px; background: #fff; border-right: 1px solid #e0e0e0; padding: 20px;">
    <h3 style="color: #28a745; margin-bottom: 20px;">🍴 Menu</h3>
    <a href="{{ route('home.dashboard') }}" style="display:block; padding:10px; text-decoration:none; color:#333; border-radius:8px; margin-bottom:8px;">🏠 Dashboard</a>
    <a href="{{ route('user.order') }}" style="display:block; padding:10px; text-decoration:none; color:#333; border-radius:8px; margin-bottom:8px;">📦 My Orders</a>
    <a href="#" style="display:block; padding:10px; text-decoration:none; color:#333; border-radius:8px; margin-bottom:8px;">👤 Profile</a>
    <a href="#" style="display:block; padding:10px; text-decoration:none; color:#333; border-radius:8px; margin-bottom:8px;">💳 Payment</a>
    <a href="{{ route('home') }}" style="display:block; padding:10px; text-decoration:none; color:#dc3545; border-radius:8px;">🚪 Logout</a>
  </aside>

  <!-- Dynamic page content -->
  <main style="flex: 1; padding: 40px;">
    @yield('dashboard_content')
  </main>

</div>
@endsection

