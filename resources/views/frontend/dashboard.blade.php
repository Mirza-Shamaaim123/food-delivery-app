<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Dashboard</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f8f9fa;
      margin: 0;
      padding: 0;
    }

    header {
      background-color: #ff6600;
      color: white;
      padding: 15px 20px;
      text-align: center;
      font-size: 24px;
    }

    .container {
      display: flex;
    }

    nav {
      width: 220px;
      background-color: #fff;
      border-right: 1px solid #ddd;
      height: 100vh;
      padding: 20px;
    }

    nav a {
      display: block;
      text-decoration: none;
      color: #333;
      padding: 10px;
      border-radius: 8px;
      margin-bottom: 10px;
      transition: background 0.3s;
    }

    nav a:hover {
      background-color: #ffe0cc;
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
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }

    .card h3 {
      margin-top: 0;
    }

    .order-list li {
      margin-bottom: 8px;
    }

    .logout {
      color: red;
    }
  </style>
</head>
<body>

  <header>🍔 Food Delivery Dashboard</header>

  <div class="container">
    <nav>
      <a href="#">🏠 Dashboard</a>
      <a href="#">📦 My Orders</a>
      <a href="#">👤 Profile</a>
      <a href="#">💳 Payment</a>
      <a href="#" class="logout">🚪 Logout</a>
    </nav>

    <main>
      <div class="card">
        <h3>Welcome, Mirza 👋</h3>
        <p>Here’s a quick summary of your account.</p>
      </div>

      <div class="card">
        <h3>Recent Orders</h3>
        <ul class="order-list">
          <li>🍕 Pizza Margherita — <strong>Delivered</strong></li>
          <li>🍔 Beef Burger — <strong>In Progress</strong></li>
          <li>🥤 Cold Coffee — <strong>Cancelled</strong></li>
        </ul>
      </div>

      <div class="card">
        <h3>Account Info</h3>
        <p><strong>Email:</strong> mirza@example.com</p>
        <p><strong>Phone:</strong> +92-300-0000000</p>
        <p><strong>Address:</strong> Karachi, Pakistan</p>
      </div>
    </main>
  </div>

</body>
</html>
