<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot password</title>
    <link rel="stylesheet" href="style3.css">
</head>

  <body>
    <div class="container">
      <form action="#">
        <h2>Forgot password</h2>
        <div class="input-text">
          <input type="email" required>
          <label for="email">Enter your email</label>
        </div>
        <div class="forget">
          <label for="remember">
            <input type="checkbox"  id="remember">
            <p>Remember me</p>
          </label>
        </div>
        <button type="submit">Send email</button>
        <div class="register">
          <p>Don't have an account?<br>
            <a href="signup.php">Register</a></p>
        </div>
      </form>
    </div>
  </body>
</html>