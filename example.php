<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Previous Exam Results</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../style2.css">
    <link rel="stylesheet" href="../stylenav.css">
    <style>
        body, html {
            height: 100%;
        }
        .results-container {
            padding: 20px;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
        }
        .table-responsive {
            margin: 0 auto;
            margin-top: 20px;
        }
        .table {
            margin: 0 auto;
            width: 80%;
        }
    </style>
</head>
<body>

    <!-- Profile Icon and Dropdown -->
    <div class="nav-container">
        <nav>
            <!-- Logo Image -->
            <img src="../Images/images.png" class="logo">
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
    </div>

    <!-- Results Container -->
    <div class="results-container">
        <h1>Previous Exam Results</h1>
        <?php
        if ($result->num_rows > 0) {
            echo '<div class="table-responsive">';
            echo '<table class="table table-bordered table-striped">';
            echo '<thead class="table-dark"><tr><th>Result ID</th><th>Module</th><th>Registration Number</th><th>Grade</th><th>Issued Date</th><th>Issued Time</th><th>Result Status</th><th>Marks</th></tr></thead>';
            echo '<tbody>';
            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row['result_ID'] . '</td>';
                echo '<td>' . $row['Module'] . '</td>';
                echo '<td>' . $row['registrationNumber'] . '</td>';
                echo '<td>' . $row['grade'] . '</td>';
                echo '<td>' . $row['issued_Date'] . '</td>';
                echo '<td>' . $row['issued_time'] . '</td>';
                echo '<td>' . $row['result_status'] . '</td>';
                echo '<td>' . $row['marks'] . '</td>';
                echo '</tr>';
            }
            echo '</tbody></table></div>';
        } else {
            echo '<p>No results found for your registration number.</p>';
        }
        ?>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
    <script src="../Admin/script.js"></script>

</body>
</html>
<?php
// Closing the database connection
$conn->close();
?>
