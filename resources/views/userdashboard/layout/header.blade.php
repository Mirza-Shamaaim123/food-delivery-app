<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Dashboard</title>
  <style>
    body {
      font-family: 'Segoe UI', Arial, sans-serif;
      background-color: #f4f9f4;
      margin: 0;
      padding: 0;
      color: #333;
    }

    header {
      background-color: #28a745;
      color: white;
      padding: 15px 20px;
      text-align: center;
      font-size: 24px;
      font-weight: 600;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    }

    .container {
      display: flex;
    }

    nav {
      width: 220px;
      background-color: #ffffff;
      border-right: 1px solid #e0e0e0;
      height: 100vh;
      padding: 20px;
      box-shadow: 2px 0 6px rgba(0, 0, 0, 0.05);
    }

    nav a {
      display: block;
      text-decoration: none;
      color: #333;
      padding: 10px;
      border-radius: 8px;
      margin-bottom: 10px;
      transition: all 0.3s ease;
      font-weight: 500;
    }

    nav a:hover {
      background-color: #c8f7c5;
      color: #155d27;
    }

    nav .logout {
      color: #dc3545;
      font-weight: 600;
    }

    main {
      flex: 1;
      padding: 30px;
    }

    .card {
      background-color: #fff;
      padding: 20px;
      margin-bottom: 20px;
      border-radius: 10px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      transition: transform 0.2s;
    }

    .card:hover {
      transform: translateY(-2px);
    }

    .card h3 {
      margin-top: 0;
      color: #28a745;
    }

    .order-list li {
      margin-bottom: 8px;
      list-style: none;
    }

    .order-list strong {
      color: #28a745;
    }

    .order-list li:nth-child(3) strong {
      color: #dc3545;
    }
  </style>
</head>
<body>



  <div class="container">
    <nav>
      <a href="{{ route('home.dashboard') }}">🏠 Dashboard</a>
      <a href="{{ route('user.order') }}">📦 My Orders</a>
      <a href="#">👤 Profile</a>
      <a href="#">💳 Payment</a>
      <a href="{{ route('home') }}" class="logout">🚪 Logout</a>
    </nav>

  