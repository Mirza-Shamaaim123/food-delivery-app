@extends('admin.layout.main')

@section('content')
    <div style="padding: 30px;">
        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
            <h2 style="margin:0;">📬 All Contact Messages</h2>
        </div>

        <table style="width:100%; border-collapse:collapse; background:white; border-radius:8px; overflow:hidden;">
            <thead>
                <tr style="background:#155d27; color:white;">
                    <th style="padding:12px; text-align:left;">#</th>
                    <th style="padding:12px; text-align:left;">Name</th>
                    <th style="padding:12px; text-align:left;">Email</th>
                    <th style="padding:12px; text-align:left;">Message</th>
                    <th style="padding:12px; text-align:left;">Date</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($contacts as $contact)
                    <tr style="border-bottom:1px solid #eee;">
                        <td style="padding:12px;">{{ $loop->iteration }}</td>
                        <td style="padding:12px;">{{ $contact->name }}</td>
                        <td style="padding:12px;">{{ $contact->email }}</td>
                        <td style="padding:12px;">{{ $contact->message }}</td>
                        <td style="padding:12px;">{{ $contact->created_at->format('d M Y, h:i A') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" style="text-align:center; padding:20px; color:#777;">
                            No contact messages found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
