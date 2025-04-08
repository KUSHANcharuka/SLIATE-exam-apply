
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>

    <!-- Bootstrap 5 CDN for CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {background-color:#ffe100;}
       form,.card {background-color: #f0ff7f;}
    </style>

</head>
<body>

    <!-- Login Form Container -->
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card p-4" style="width: 100%; max-width: 400px;">
            <h2 class="text-center mb-4">Login</h2>

            <!-- Form for user login -->
            <form method="POST" action="register.php">
                <div class="mb-3">
                    <label for="regNumber" class="form-label">Registration Number</label>
                    <input type="text" id="regNumber" name="regNumber" class="form-control" placeholder="Enter Registration Number" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Enter Password" required>
                </div>

                <div class="d-grid">
                    <button type="submit" name="submit" class="btn btn-primary">Login</button>
                </div>

                <p class="mt-3 text-center">
                    Don't have an account? <a href="StudentSignup.php">Register here</a>
                </p>
                <p class="text-center">
                    Forgot Password? <a href="froget_pwd.php">Change Password</a>
                </p>
            </form>
        </div>
    </div>

    <!-- Bootstrap 5 JS and Popper.js CDN links -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

    <!-- Link to external JavaScript file -->
    <script src="script.js"></script>

</body>
</html>


