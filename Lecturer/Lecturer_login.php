<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lecturer Login</title>

     <!-- bootstrap link -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dst/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../style2.css"> 
</head>
<body>
        <!-- admin login container -->
    <div class="admin_login_container">
        <h2>Lecturer Login</h2>
        <form method="POST" action="register.php">
            <div class="form-group">
                <!-- Input Director ID field -->
                <label for="regNumber">Registration Number</label>
                <input type="text" id="regNumber" name="regNumber" placeholder="Enter your Registration Number" required>
            </div>
            <!-- Input password field -->
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>
            <!-- buttons -->
            <div class="button-container">
                <button type="submit" name="submit">Login</button>
            </div>
            <p class="register-message">Forget Password? <a href="froget_pwd.php">Change Password</a></p>
        </form>
    </div>
</body>
</html>
