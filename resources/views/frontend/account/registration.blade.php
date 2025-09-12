<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Food Registration</title>
  <style>
    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background: url('food-bg.jpg') no-repeat center center/cover;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .register-box {
      background: rgba(255, 255, 255, 0.9);
      padding: 30px;
      border-radius: 15px;
      width: 400px;
      box-shadow: 0 8px 20px rgba(0,0,0,0.2);
      text-align: center;
    }

    .register-box img {
      width: 80px;
    }

    .register-box h2 {
      margin: 15px 0 5px;
      color: #2d6a4f; /* Green Heading */
    }

    .register-box p {
      color: #666;
      font-size: 14px;
      margin-bottom: 20px;
    }

    .register-box label {
      display: block;
      text-align: left;
      font-weight: 600;
      margin: 10px 0 5px;
      color: #444;
    }

    .register-box input {
      width: 100%;
      padding: 10px;
      border: 1px solid #ddd;
      border-radius: 8px;
      font-size: 14px;
      outline: none;
    }

    .register-box input:focus {
      border-color: #2d6a4f;
      box-shadow: 0 0 5px rgba(45, 106, 79, 0.5);
    }

    .register-box button {
      margin-top: 15px;
      width: 100%;
      padding: 12px;
      background: #2d6a4f;
      color: #fff;
      font-size: 16px;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      transition: 0.3s;
    }

    .register-box button:hover {
      background: #1b4332;
    }

    .register-box .links {
      margin-top: 15px;
      font-size: 14px;
      color: #555;
    }

    .register-box .links a {
      color: #2d6a4f;
      font-weight: bold;
      text-decoration: none;
    }

    .register-box .links a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

  <div class="register-box">
    <img src="logo.png" alt="Food Logo">
    <h2>Create Account 🥗</h2>
    <p>Register to start ordering fresh meals</p>

    <form method="POST" action="{{ route('account.processRegistration') }}">
        @csrf
      <label for="name">Full Name</label>
      <input type="text" id="name" name="name" placeholder="John Doe" required>

      <label for="email">Email Address</label>
      <input type="email" id="email" name="email" placeholder="you@example.com" required>

      <label for="password">Password</label>
      <input type="password" id="password" name="password" placeholder="********" required>

      <label for="confirm-password">Confirm Password</label>
      <input type="password" id="confirm-password" name="password_confirmation" placeholder="********" required>

      <button type="submit">🍕 Register</button>
    </form>

    <div class="links">
      <p>Already have an account? <a href="/login">Login Here</a></p>
    </div>
  </div>

</body>
</html>
