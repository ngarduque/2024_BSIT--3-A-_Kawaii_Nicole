<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="css/login.css">

</head>
<body>
    
    <div class="login-container" id="loginContainer">
        <h2>Login</h2>
        <form action="process_login.php" method="POST">
            <div class="input-group">
                <input name="f_username" type="text" class="form-control" placeholder="Username" required>
            </div>
            <div class="input-group">
                <input name="f_password" type="password" class="form-control" placeholder="Password" required>
            </div>
            <div class="input-group">
                <input type="submit" value="Login" class="btn">
            </div>
            <a href="registration.php" class="btn btn-outline-success">Create Account</a>
        </form>
    </div>

    <script>
        document.getElementById('loginButton').addEventListener('click', function() {
            var loginContainer = document.getElementById('loginContainer');
            if (loginContainer.style.display === 'none' || loginContainer.style.display === '') {
                loginContainer.style.display = 'block';
            } else {
                loginContainer.style.display = 'none';
            }
        });
    </script>

</body>
</html>
