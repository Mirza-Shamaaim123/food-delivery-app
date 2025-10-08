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
                @foreach ($orders as $order)
                    <tr style="border-bottom:1px solid #ddd;">
                        <td style="padding:12px;">1</td>
                        <td style="padding:12px;">{{ $order->product_name ?? 'N/A' }}</td>
                        <td style="padding:12px;">{{ $order->created_at->format('Y-m-d') }}</td>
                        <td style="padding:12px;">${{ number_format($order->total_amount, 2) }}</td>
                        <td style="padding:12px;">
                            <span
                                style="background:#c8f7c5; color:#155d27; padding:5px 10px; border-radius:6px;">Delivered</span>
                        </td>
                        <td style="padding:12px;">
                            <a href="#" style="color:#28a745; text-decoration:none; font-weight:500;">View</a>
                        </td>
                    </tr>
                @endforeach



            </tbody>
        </table>
    </div>
@endsection
