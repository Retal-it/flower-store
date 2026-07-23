<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bloomora - Create Account</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;600&family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
    
    <style>
        /* كود تنعيم وتوحيد الخطوط */
        body, input, label, button, h2, p, h1 {
            font-family: 'Poppins', Arial, sans-serif !important;
        }
        
        /* جعل نصوص التلميح التوضيحية (Placeholder) رمادية خفيفة جداً ونحيفة */
        input::placeholder {
            color: #b5b5b5 !important;
            font-weight: 300;
            font-size: 13px;
        }
    </style>
</head>
<body class="login-page" style="background-color: #ffffff; display: flex; justify-content: center; align-items: center; min-height: 100vh; margin: 0;">

    <div class="login-container" style="max-width: 400px; width: 100%; margin: 0 auto; padding: 35px 25px; text-align: center; background-color: #ffffff; border-radius: 16px; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.04);">
        
        <div class="logo-area" style="margin-bottom: 25px; text-align: center;">
            <img src="images/bloomore-logo.jpg" alt="Bloomora Logo" style="width: 55px; height: auto; margin-bottom: 5px;"> 
            <h1 style="font-family: 'Playfair Display', serif !important; color: #725239; font-size: 26px; font-weight: 600; letter-spacing: 0.5px; margin: 0;">Bloomora</h1>
            <p style="font-size: 11px; color: #a39081; text-transform: lowercase; margin-top: -2px; margin-bottom: 0;">Bloom your day</p>
        </div>

        <h2 style="color: #333; margin-bottom: 5px; font-weight: 500; font-size: 24px;">Welcome!</h2>
        <p style="font-size: 13px; color: #777; margin-bottom: 25px;">Please login to your account</p>

        <form id="loginForm" method="POST" action="create_user.php">

            <div class="input-box" style="margin-bottom: 15px; text-align: left;">
                <label style="font-size: 13px; color: #555; display: block; margin-bottom: 6px; font-weight: 500;">Full Name</label>
                <input type="text" name="username" placeholder="Your Name" required style="width: 100%; padding: 12px; background-color: #ffffff; border: 1px solid #e2e2e2; border-radius: 8px; box-sizing: border-box; color: #333333; outline: none; font-size: 14px;">
            </div>

            <div class="input-box" style="margin-bottom: 15px; text-align: left;">
                <label style="font-size: 13px; color: #555; display: block; margin-bottom: 6px; font-weight: 500;">Email</label>
                <input type="email" name="email" placeholder="example@email.com" required style="width: 100%; padding: 12px; background-color: #ffffff; border: 1px solid #e2e2e2; border-radius: 8px; box-sizing: border-box; color: #333333; outline: none; font-size: 14px;">
            </div>

            <div class="input-box" style="margin-bottom: 25px; text-align: left;">
                <label style="font-size: 13px; color: #555; display: block; margin-bottom: 6px; font-weight: 500;">Password</label>
                <input type="password" name="password" placeholder="Enter your password" required style="width: 100%; padding: 12px; background-color: #ffffff; border: 1px solid #e2e2e2; border-radius: 8px; box-sizing: border-box; color: #333333; outline: none; font-size: 14px;">
            </div>

            <button type="submit" name="register" style="background-color: #edc3d3; color: white; border: none; padding: 13px; width: 100%; border-radius: 8px; font-size: 15px; font-weight: 500; cursor: pointer; transition: background 0.3s;">
                Sign Up
            </button>
        </form>

        <div class="footer" style="margin-top: 25px; font-size: 13px; color: #666;">
            Already have an account? <a href="login.php" style="color: #edc3d3; text-decoration: none; font-weight: bold;">Login</a>
        </div>
    </div>

</body>
</html>