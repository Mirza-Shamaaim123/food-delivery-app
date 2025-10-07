@extends('userdashboard.layout.main')

@section('dashboard_content')

<div style="background:#fff; border-radius:10px; padding:30px; box-shadow:0 2px 6px rgba(0,0,0,0.1);">
  <h2 style="color:#28a745; margin-bottom:20px;">🍴 My Food Orders</h2>

  <table style="width:100%; border-collapse:collapse; text-align:left;">
    <thead>
      <tr style="background-color:#28a745; color:white;">
        <th style="padding:12px;">#</th>
        <th style="padding:12px;">Food Item</th>
        <th style="padding:12px;">Date</th>
        <th style="padding:12px;">Total</th>
        <th style="padding:12px;">Status</th>
        <th style="padding:12px;">Action</th>
      </tr>
    </thead>

    <tbody>
      <tr style="border-bottom:1px solid #ddd;">
        <td style="padding:12px;">1</td>
        <td style="padding:12px;">🍕 Pizza Margherita</td>
        <td style="padding:12px;">2025-10-05</td>
        <td style="padding:12px;">$12.99</td>
        <td style="padding:12px;">
          <span style="background:#c8f7c5; color:#155d27; padding:5px 10px; border-radius:6px;">Delivered</span>
        </td>
        <td style="padding:12px;">
          <a href="#" style="color:#28a745; text-decoration:none; font-weight:500;">View</a>
        </td>
      </tr>

      <tr style="border-bottom:1px solid #ddd;">
        <td style="padding:12px;">2</td>
        <td style="padding:12px;">🍔 Zinger Burger Combo</td>
        <td style="padding:12px;">2025-10-06</td>
        <td style="padding:12px;">$9.50</td>
        <td style="padding:12px;">
          <span style="background:#fff3cd; color:#856404; padding:5px 10px; border-radius:6px;">Processing</span>
        </td>
        <td style="padding:12px;">
          <a href="#" style="color:#28a745; text-decoration:none; font-weight:500;">View</a>
        </td>
      </tr>

      <tr>
        <td style="padding:12px;">3</td>
        <td style="padding:12px;">🥤 Cold Coffee</td>
        <td style="padding:12px;">2025-10-07</td>
        <td style="padding:12px;">$4.99</td>
        <td style="padding:12px;">
          <span style="background:#f8d7da; color:#721c24; padding:5px 10px; border-radius:6px;">Cancelled</span>
        </td>
        <td style="padding:12px;">
          <a href="#" style="color:#28a745; text-decoration:none; font-weight:500;">View</a>
        </td>
      </tr>
    </tbody>
  </table>
</div>

@endsection
