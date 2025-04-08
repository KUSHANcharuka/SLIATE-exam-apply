<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Already Apply</title>

    <!-- bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dst/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../style2.css">
    <link rel="stylesheet" href="../stylenav.css">

</head>
<body>

    <!-- Profile Icon and Dropdown -->
    <div class="nav-container">
        <nav>
            <!-- Logo Image -->
            <img src="../Images/images.png" class="logo" alt="logo">
            <!-- Navigation Menu -->
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Contact Us</a></li>
                <li><a href="#">About</a></li>
            </ul>
            <!-- User Profile Picture -->
            <img src="../Images/profile-user.png" class="user-pic" onclick="togglemenu();">
            <!-- Dropdown Menu -->
            <div class="sub-menu-wrap" id="sub-menu-wrap">
                <div class="sub-menu">
                    <!-- User Information -->
                    <div class="user-info">
                        <img src="../Images/profile-user.png">
                        <h1>User Name</h1>
                    </div>
                    <hr>
                    <!-- Sub-menu links -->
                    <a href="#" class="sub-menu-link">
                        <img src="../Images/user-avatar.png">
                        <p>Edit Profile</p>
                        <span></span>
                    </a>
                    <a href="#" class="sub-menu-link">
                        <img src="../Images/setting.png">
                        <p>Setting</p>
                        <span></span>
                    </a>
                    <a href="#" class="sub-menu-link">
                        <img src="../Images/help-web-button.png">
                        <p>Help</p>
                        <span></span>
                    </a>
                    <a href="login.php" class="sub-menu-link">
                        <img src="../Images/logout.png">
                        <p>Log Out</p>
                        <span></span>
                    </a>
                </div>
            </div>
        </nav>

    <!-- Already Applied Message Container -->
    <div class="already_applied_container">
        <h1>You're already applied for this semester exam</h1>
        <!-- Buttons for different options -->
        <a href="#" class="button">Application Status</a>
        <a href="#" class="button">Exam Time table</a>
        <a href="showResults.php" class="button">Previous Exams Results</a>
    </div>

    <!-- JavaScript file -->
    <script src="../Admin/script.js"></script>

</body>
</html>
