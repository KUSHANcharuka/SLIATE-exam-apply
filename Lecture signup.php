<?php
//Add connection
include "connect.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>

<div class="container">
    <div class="form-container">
           <!-- Registration Section -->
    <div class="form-container">
        <h2>  Lectruror Register</h2>

        <form action="" method="post">
            <div class="form-group">
                <label for="fullName">I. Name In Full</label>
                <div class="input-row">
                    <select id="title" name="title" required>
                        <option value="" disabled selected>Title</option>
                        <option value="Mr">Mr</option>
                        <option value="Mrs">Mrs</option>
                        <option value="Ms">Ms</option>
                        <option value="Rev">Rev</option>
                    </select>
                    <input type="text" id="fullName" name="fullName" placeholder="Enter Your Full Name" required>
                </div>
            </div>

            <div class="form-group">
                <label for="nameWithInitials">II. Name With Initials</label>
                <div class="input-row">
                    <select id="initialsTitle" name="initialsTitle" required>
                        <option value="" disabled selected>Title</option>
                        <option value="Mr">Mr</option>
                        <option value="Mrs">Mrs</option>
                        <option value="Ms">Ms</option>
                        <option value="Rev">Rev</option>
                    </select>
                    <input type="text" id="nameWithInitials" name="nameWithInitials"placeholder="Enter Your Name With Initials" required>
                </div>
            </div>

            <div class="form-group">
                <label for="regNumber">III. Registration Number</label>
                <input type="text" id="regNumber"name="regNumber" placeholder="Enter Your Registration Number" required>
            </div>

            <div class="form-group">
                <label for="address">IV. Present Address</label>
                <input type="text" id="address" name="address" placeholder="Enter Your Address" required>
            </div>

            <div class="form-group">
            <label for="department">Department</label>
              <select id="department" name="department" required>
              <option value="" disabled selected>Select Your Division</option>
              <option value="Agri">Agri Culture</option>
              <option value="Management">Management</option>
             </select>
            </div>

            <div class="form-group">
                <label>V. Contact Details</label>
                <div class="input-row">
                    <label for="mobile">Mobile No:</label>
                    <input type="text" id="mobile" name="mobile" placeholder="Enter Your Contact Number" required>
                </div>
                <label for="email">E mail:</label>
                <input type="email" id="emailField" name="email" spellcheck="false" placeholder="Enter Your E-mail Address" onkeyup="showerror()" required >
                <span id="emailError"></span>
            </div>

            <div class="form-group">
                <label for="gender">Gender</label>
                <select id="gender" name="gender" required>
                    <option value="" disabled selected>Select your gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter Password" required>
            </div>

            <div class="form-group">
                <label for="confirmPassword">Confirm Password</label>
                <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm Your Password" required>
                <span id="passwordError" style="color: red; font-size: 0.9rem;"></span>
            </div>

            <div class="button-container">
                <button type="submit" name="SUBMIT" onclick="validatePasswords()">Sign Up</button>

            </div>

            <p class="login-message">Already registered? <a href="#">Log in</a></p>
        </form>
    </div>
    </div>
    <div class="image-container">
    <img src="Images\best-laptops-copy-1_3rct.1248.webp" alt="Description of Image">
    </div>
</div>




<script src="script.js"></script>

</body>
</html>