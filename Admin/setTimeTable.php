<?php
// Add connection to the database
include "../DBConnection/connect.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Set Timetables</title>


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
            <img src="../Images/images.png" class="logo">
            <!-- Navigation Menu -->
            <ul>
                <li><a href="admin.php">Home</a></li>
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
                    <a href="admin_login.php" class="sub-menu-link">
                        <img src="../Images/logout.png">
                        <p>Log Out</p>
                        <span></span>
                    </a>
                </div>
            </div>
        </nav>

    <!-- Timetable Setting Form -->
    <div class="settimetable-container">
        <h1>Set Timetables</h1>
        <form action="" method="post">
        <div class="form-group">
            <label for="date">Select Date:</label>
            <input type="date" id="date" name="date">
        </div>
        <div class="form-group">
            <label for="division">Select Division:</label>
            <select id="division" name="division">
                <option value="Division 1">Division 1</option>
                <option value="Division 2">Division 2</option>
                <option value="Division 3">Division 3</option>
            </select>
        </div>
        <div class="form-group">
            <label for="subject">Select Subjects:</label>
            <select id="subject" name="subject">
                <option value="Math">Math</option>
                <option value="Science">Science</option>
                <option value="History">History</option>
            </select>
        </div>
        <div class="form-group">
            <label for="start-time">Start Time:</label>
            <input type="time" id="start-time" name="start_time">
        </div>
        <div class="form-group">
            <label for="end-time">End Time:</label>
            <input type="time" id="end-time" name="end_time">
        </div>
        <div class="form-group" style="justify-content: center;">
            <button type="button" onclick="addToTimetable()">Create</button>
        </div>
        <!-- Timetable Display -->
        <div class="timetable" id="timetable">
         <h2>Timetable</h2>
         </div>
         <!-- Print Button -->
        <button type="button" onclick="printTimetable()">Print Timetable</button>
        </form>
    </div>
</div>

    <!-- JavaScript file -->
    <script src="script.js"></script>

</body>
</html>
