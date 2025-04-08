<?php
// Start session to store user data
session_start();

// Add connection
include "../DBConnection/connect.php";

// Add details
if (isset($_POST['SUBMIT'])) {
    $title = $_POST['title'];
    $fullName = $_POST['fullName'];
    $nameWithInitials = $_POST['nameWithInitials'];
    $regNumber = $_POST['regNumber'];
    $address = $_POST['address'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $department = $_POST['department'];
    $password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

    // Checking existing customer IDs
    $sql1 = "SELECT * FROM student WHERE Registration_number='$regNumber'";
    $result1 = $conn->query($sql1);
    if ($result1->num_rows > 0) {
        echo "<script>alert('You are already signed up!'); window.location.href = 'login.php';</script>";
    } else {
        // Inserting customers
        $sql2 = "INSERT INTO student (Registration_number, title, Full_Name, name_with_initials, gender, email, contact_number, address, department, confirm_Password, password_hash)
                 VALUES ('$regNumber', '$title', '$fullName', '$nameWithInitials', '$gender', '$email', '$mobile', '$address', '$department', '$confirmPassword', '$password_hash')";

        $result2 = $conn->query($sql2);

        if ($result2) {
            echo "<script>alert('You successfully signed up!'); window.location.href = 'login.php';</script>";
        }
    }
}

// Login logic
if (isset($_POST['submit'])) {
    $regNumber = $_POST['regNumber'];
    $password = $_POST['password'];

    // Query to fetch the stored hashed password based on the registration number
    $sql = "SELECT * FROM student WHERE Registration_number = '$regNumber'";  
    $result = $conn->query($sql);

    // Check if a user exists with the provided registration number
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Verify the entered password with the hashed password
        if (password_verify($password, $row['password_hash'])) {
            // Store user data in session
            $_SESSION['regNumber'] = $row['Registration_number'];

            // Checking if the registration number exists in the studentapply table
            $sqlApply = "SELECT * FROM studentapply WHERE Registration_number='$regNumber'";
            $resultApply = $conn->query($sqlApply);

            if ($resultApply->num_rows > 0) {
                // Registration number exists, forward to the next page
                $_SESSION['regNumber'] = $regNumber; // Store the registration number in session
                header("Location: already_applied.php"); // Forward to the next page
                exit();
            } else {
                // Registration number does not exist, redirect to apply.php
                header("Location: apply.php"); // Forward to the apply page
                exit();
            }
        } else {
            // Password doesn't match
            echo '<script>alert("Login failed. Invalid password!"); window.location.href = "login.php";</script>';
        }
    } else {
        // User not found
        echo '<script>alert("Login failed. Invalid registration number!"); window.location.href = "login.php";</script>';
    }
}

// Closing the database connection
$conn->close();
?>
