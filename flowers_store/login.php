
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="assets/css/style.css?v=3">
</head>
<body class ="login-page">

  <div class="login-box">
    <div class="logo-box">
    <img src="images/bloomore-logo.jpg" alt="Bloomore logo" class="logo-img">
  </div>

  <h2>Welcome Back</h2>
  <p class="subtitle">Please login to your account</p>

    <form id="loginForm" method="POST" action="login.php">

      <div class="input-box">
        <label>Email</label>
        <input type="email" name="email" placeholder="example@email.com" required>
      </div>

      <div class="input-box">
        <label>Password</label>
        <input type="password" name="password" placeholder="********" required>
      </div>

      <button type="submit" name="login" style="color:#000;">Login</button>

      <div class="footer">
        Don't have an account? <a href="registre.php">Create Account</a>
      </div>

    </form>
  </div>

  <script>
    // Get redirect page from URL
    const params = new URLSearchParams(window.location.search);

    // Default page = index.html
    const redirectPage = params.get("redirect") || "index.php";

    // Login submit
    document.getElementById("loginForm").addEventListener("submit", function(e){
      e.preventDefault();

      // Redirect after login
      window.location.href = redirectPage;
    });
  </script>

</body>
<div class="login-container">

    <!-- محتوى اللوقن هنا -->

</div>
</html>

