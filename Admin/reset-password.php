<?php

// Get the token from the URL
$token = $_GET["token"];

// Hash the token using SHA-256
$token_hash = hash("sha256", $token);

// Connect to the database
$conn = require __DIR__ . "/../DBConnection/connect.php";

// Prepare SQL statement to select the user with the given reset token hash
$sql = "SELECT * FROM director
        WHERE reset_token_hash = ?";

// Prepare the SQL statement
$stmt = $conn->prepare($sql);

// Bind the token hash parameter to the SQL statement
$stmt->bind_param("s", $token_hash);

// Execute the SQL statement
$stmt->execute();

// Get the result of the SQL query
$result = $stmt->get_result();

// Fetch the user data from the result
$user = $result->fetch_assoc();

// Check if the user was not found
if ($user === null) {
    die("token not found");
}

// Check if the reset token has expired
if (strtotime($user["reset_token_expires_at"]) <= time()) {
    die("Reset link is expired");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Your Password</title>

   <!-- Link to Bootstrap CSS for styling -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../style3.css">

</head>
<body>

    <div class="container">
        <div class="icon-container">
            <!-- Display a lock icon image -->
            <img src="../Images/open-padlock.png" alt="Lock Icon">
        </div>
        
        <h2>Reset Your Password</h2>
        
        <!-- Form to handle password reset -->
        <form action="process-reset-password.php" onsubmit="return validateForm()" method="POST" >
            <!-- Hidden input to store the token value -->
            <input type="hidden" name="token" value="<?php echo htmlspecialchars($token); ?>">
            
            <div class="form-group">
                <label for="password">New Password</label>
                <input type="password" id="password" name="password" placeholder="Enter New Password" required>
            </div>

            <div class="form-group">
                <label for="confirmpassword">Confirm Password</label>
                <input type="password" id="confirmPassword" name="confirmpassword" placeholder="Confirm Your Password" onkeyup="validatePasswords()" required>
                <span id="passwordError" style="color: red; font-size: 0.9rem;"></span>
            </div>

            <div class="button-container">
                <button type="button" onclick="window.location.href='admin_login.php'">Back</button>
                <button type="submit">Done</button>
            </div>
        </form>
    </div>

<script src="script.js"></script>

</body>
</html>
