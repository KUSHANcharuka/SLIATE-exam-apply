<?php
session_start();
include "../DBConnection/connect.php";

$results = [];

// Check if the registration number is set in the session
if (isset($_SESSION['regNumber'])) {
    $regNumber = $_SESSION['regNumber'];

    // Use prepared statement for secure query execution
    $stmt = $conn->prepare("SELECT * FROM approved_results WHERE registrationNumber = ?");
    $stmt->bind_param("s", $regNumber);
    $stmt->execute();
    $result = $stmt->get_result();

    // Fetch all results into an array
    while ($row = $result->fetch_assoc()) {
        $results[] = $row;
    }
    $stmt->close();
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Previous Exam Results</title>

    
    
    <link rel="stylesheet" href="../stylenav.css">
    <style>
        body, html {
            
            background-color:#ece000;
        }
        .results-container {
         position: absolute;
         top: 80px; 
         left: 50%;
          transform: translateX(-50%);
           text-align: center;
          padding: 20px;
        }

        table {
    width: 80%;
    border-collapse: collapse;
    text-align: center;
    }

    th, td {
        padding: 10px;
        border: 1px solid #ddd;
    }

    th {
    background-color: #f4f4f4;
    font-weight: bold;
    }

 

  
    </style>

</head>
<body>
    <!-- Navigation -->
    <div class="nav-container">
        <nav>
            <img src="../Images/images.png" class="logo">
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Contact Us</a></li>
                <li><a href="#">About</a></li>
            </ul>
            <img src="../Images/profile-user.png" class="user-pic" onclick="togglemenu();">
            <div class="sub-menu-wrap" id="sub-menu-wrap">
                <div class="sub-menu">
                    <div class="user-info">
                        <img src="../Images/profile-user.png">
                        <h1>User Name</h1>
                    </div>
                    <hr>
                    <a href="#" class="sub-menu-link">
                        <img src="../Images/user-avatar.png">
                        <p>Edit Profile</p>
                    </a>
                    <a href="#" class="sub-menu-link">
                        <img src="../Images/setting.png">
                        <p>Setting</p>
                    </a>
                    <a href="#" class="sub-menu-link">
                        <img src="../Images/help-web-button.png">
                        <p>Help</p>
                    </a>
                    <a href="login.php" class="sub-menu-link">
                        <img src="../Images/logout.png">
                        <p>Log Out</p>
                    </a>
                </div>
            </div>
        </nav>
    </div>

    <!-- Results Section -->
    <div class="results-container">
    <h1>Previous Exam Results</h1><br>
    
    <?php if (!empty($results)): ?>
        <table border="1" cellspacing="0" cellpadding="10" style="margin: auto; border-collapse: collapse;">
            <thead>
                <tr>
                    <th>Result ID</th>
                    <th>Module</th>
                    <th>Registration Number</th>
                    <th>Grade</th>
                    <th>Issued Date</th>
                    <th>Issued Time</th>
                    <th>Result Status</th>
                    <th>Marks</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($results as $row): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['result_ID']) ?></td>
                        <td><?= htmlspecialchars($row['Module']) ?></td>
                        <td><?= htmlspecialchars($row['registrationNumber']) ?></td>
                        <td><?= htmlspecialchars($row['grade']) ?></td>
                        <td><?= htmlspecialchars($row['issued_Date']) ?></td>
                        <td><?= htmlspecialchars($row['issued_time']) ?></td>
                        <td><?= htmlspecialchars($row['result_status']) ?></td>
                        <td><?= htmlspecialchars($row['marks']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No results found for your registration number.</p>
    <?php endif; ?>
</div>


    <script src="../Admin/script.js"></script>
</body>
</html>
