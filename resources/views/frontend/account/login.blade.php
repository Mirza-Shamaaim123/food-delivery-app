<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Food Login</title>
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

.login-box {
  background: rgba(255, 255, 255, 0.9);
  padding: 30px;
  border-radius: 15px;
  width: 350px;
  box-shadow: 0 8px 20px rgba(0,0,0,0.2);
  text-align: center;
}

.login-box img {
  width: 80px;
}

.login-box h2 {
  margin: 15px 0 5px;
  color: #2d6a4f; /* Green Heading */
}

.login-box p {
  color: #666;
  font-size: 14px;
  margin-bottom: 20px;
}

.login-box label {
  display: block;
  text-align: left;
  font-weight: 600;
  margin: 10px 0 5px;
  color: #444;
}

.login-box input {
  width: 100%;
  padding: 10px;
  border: 1px solid #ddd;
  border-radius: 8px;
  font-size: 14px;
  outline: none;
}

.login-box input:focus {
  border-color: #2d6a4f; /* Green Border Focus */
  box-shadow: 0 0 5px rgba(45, 106, 79, 0.5);
}

.login-box button {
  margin-top: 15px;
  width: 100%;
  padding: 12px;
  background: #2d6a4f; /* Main Green Button */
  color: #fff;
  font-size: 16px;
  border: none;
  border-radius: 8px;
  cursor: pointer;
  transition: 0.3s;
}

.login-box button:hover {
  background: #1b4332; /* Darker Green Hover */
}

.login-box .links {
  margin-top: 15px;
  font-size: 14px;
  color: #555;
}

.login-box .links a {
  color: #2d6a4f; /* Green Links */
  font-weight: bold;
  text-decoration: none;
}

.login-box .links a:hover {
  text-decoration: underline;
}

  </style>
</head>
<body>

  <div class="login-box">
    <img src="logo.png" alt="Food Logo">
    <h2>Welcome Back 🍕</h2>
    <p>Login to order your favorite meals</p>

    <form method="POST" action="{{ route('account.authenticate') }}">
         @csrf  
      <label for="email">Email Address</label>
      <input type="email" id="email" name="email" placeholder="you@example.com" required>

      <label for="password">Password</label>
      <input type="password" id="password" name="password" placeholder="********" required>

      <button type="submit">🍔 Login</button>
    </form>

    <div class="links">
      <p>Don't have an account? <a href="{{ route('account.register') }}">Sign Up</a></p>
      <p><a href="/forgot-password">Forgot Password?</a></p>
    </div>
  </div>

</body>
</html>
