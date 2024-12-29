<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <link rel="stylesheet" href="../asset/styles.css">
</head>
<body>
    <div class="login-container">
        <div class="login">Login</div>
        <form action="" method="POST">
            <div class="form">
                <label for="email">Email:</label>
                <input type="text" name="email" id="email" placeholder="Enter your email">
            </div>
            <div class="form">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" placeholder="Enter your password">
            </div>
            <input type="submit" name="login" value="Login">
        </form>

        <div class="signup-link">
            Don't have an account? <a href="../view/sign_up.php">Sign Up</a>
        </div>
    </div>
</body>
</html>
