@extends('userdashboard.layout.main')

@section('dashboard_content')

<div style="background:#fff; border-radius:10px; padding:30px; box-shadow:0 2px 6px rgba(0,0,0,0.1); max-width:700px; margin:auto;">
  <h2 style="color:#28a745; margin-bottom:20px;">👤 My Profile</h2>

  <form action="#" method="POST" style="display:grid; grid-template-columns:1fr 1fr; gap:20px;">
    @csrf
    <div style="display:flex; flex-direction:column;">
      <label style="margin-bottom:6px; color:#155d27;">Full Name</label>
      <input type="text" name="name" value="Mirza Shamaaim" 
             style="padding:10px; border:1px solid #ccc; border-radius:6px;">
    </div>

    <div style="display:flex; flex-direction:column;">
      <label style="margin-bottom:6px; color:#155d27;">Email Address</label>
      <input type="email" name="email" value="mirza@example.com" 
             style="padding:10px; border:1px solid #ccc; border-radius:6px;">
    </div>

    <div style="display:flex; flex-direction:column;">
      <label style="margin-bottom:6px; color:#155d27;">Phone Number</label>
      <input type="text" name="phone" value="+92-300-0000000" 
             style="padding:10px; border:1px solid #ccc; border-radius:6px;">
    </div>

    <div style="display:flex; flex-direction:column;">
      <label style="margin-bottom:6px; color:#155d27;">Address</label>
      <input type="text" name="address" value="Karachi, Pakistan" 
             style="padding:10px; border:1px solid #ccc; border-radius:6px;">
    </div>

    <div style="grid-column:1 / span 2; text-align:center; margin-top:20px;">
      <button type="submit" 
              style="background:#28a745; color:white; border:none; padding:10px 25px; border-radius:6px; font-size:16px; cursor:pointer;">
        💾 Save Changes
      </button>
    </div>
  </form>
</div>

@endsection
