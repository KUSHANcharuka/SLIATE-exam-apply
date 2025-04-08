<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam Applied Students Summary</title>
    <link rel="stylesheet" href="../stylenav.css">
   

     <!-- bootstrap link -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dst/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
     <link rel="stylesheet" href="../style4.css">

</head>
<body>
               <!-- Profile Icon and Dropdown -->
               <div class="nav-container">
        <nav>
            <img src="../Images/images.png" class="logo" alt="logo">
            <ul>
                <li><a href="admin.php">Home</a></li>
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




    <div class="exam-summary-container">
        <h1>Exam Applied Students Summary</h1>

        <!-- Department Selection -->
        <div class="form-group">
            <label for="department">Select Department</label>
            <select id="department" name="department" onchange="updateSummary()">
                <option value="all">All Departments</option>
                <option value="cs">Computer Science</option>
                <option value="it">Information Technology</option>
                <option value="ee">Electrical Engineering</option>
                <option value="me">Mechanical Engineering</option>
            </select>
        </div>

        <!-- Summary Info -->
        <div class="summary-container">
            <h2>Summary</h2>
            <p id="summary-text">Select a department to view the student summary.</p>

            <!-- Pie Chart -->
            <div class="graphs-container">
                <canvas id="examSummaryPieChart"></canvas>
           
                <canvas id="examSummaryBarChart"></canvas>
            </div>

            <!-- Applied Students Table -->
            <div class="students-table-container">
                <h3>Applied Students List</h3>
                <table id="students-table">
                    <thead>
                        <tr>
                            <th>Student ID</th>
                            <th>Name</th>
                            <th>Department</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Print Summary Button -->
        <div class="button-container">
            <button>Print Summary</button>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>
