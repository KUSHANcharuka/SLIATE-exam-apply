<?php
session_start();
include "../DBConnection/connect.php";

$result_ID = null;

// Query to fetch the next AUTO_INCREMENT value
$query = "SELECT AUTO_INCREMENT FROM information_schema.TABLES 
          WHERE TABLE_SCHEMA = 'exam_managment_system' AND TABLE_NAME = 'results'";
$result = $conn->query($query);
if ($row = $result->fetch_assoc()) {
    $result_ID = $row['AUTO_INCREMENT'];
}

// Ensure the lecturer is logged in
if (!isset($_SESSION['lecturer_registration_number'])) {
    echo "<script>alert('Please log in first!'); window.location.href='Lecturer_login.php';</script>";
    exit;
}

// Fetch the lecturer ID from the session
$lecturer_id = $_SESSION['lecturer_registration_number'];

// Fetch the lecturer's registration number using their email
$lecturer_email = $_SESSION['lecturer_email'];
$query = "SELECT Registration_number FROM lecturer WHERE email = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('s', $lecturer_email);
$stmt->execute();
$result = $stmt->get_result();
$lecturer = $result->fetch_assoc();

if ($lecturer) {
    $lecturer_id = $lecturer['Registration_number'];
} else {
    echo "<script>alert('Lecturer not found!'); window.location.href='Lecturer_login.php';</script>";
    exit;
}
?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lecturer Page</title>

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
                    <a href="Lecturer_login.php" class="sub-menu-link">
                        <img src="../Images/logout.png">
                        <p>Log Out</p>
                        <span></span>
                    </a>
                </div>
            </div>
        </nav>

    <!-- Lecturer Options Container -->
    <div class="lecturerOption-container">
        <h1>Result Entering</h1>
        <form action="" method="POST">
        <!-- Form to input student results -->
           <div class="form-group">
         <label for="result_ID">Result ID:</label>
         <input type="text" id="result_ID" name="result_ID" class="form-control" value="<?= htmlspecialchars($result_ID) ?>" readonly>
        </div>
             <div class="form-group">
                 <label for="department">Department:</label>
                  <select id="department" name="department" class="form-control" required>
                  <option value="">Select Department</option>
                  <option value="Computer Science">Computer Science</option>
                  <option value="Information Technology">Information Technology</option>
                  <option value="Business Administration">Business Administration</option>
                 <option value="Engineering">Engineering</option>
                  <option value="Mathematics">Mathematics</option>
                 <option value="Physics">Physics</option>
                 <option value="Biology">Biology</option>
                 <option value="Chemistry">Chemistry</option>
                  <option value="Accounting">Accounting</option>
             </select>
            </div>

            <div class="form-group">
              <label for="lecturer_id">Lecturer ID:</label>
               <input type="text" id="lecturer_id" name="lecturer_id" class="form-control" value="<?= htmlspecialchars($lecturer_id) ?>" readonly>
            </div>




            <div class="form-group">
                <label for="Module">Module:</label>
                <input type="text" id="Module" name="Module" class="form-control" placeholder="Enter Module" required>
            </div>

            <div class="form-group">
                <label for="registrationNumber">Student Registration Number:</label>
                <input type="text" id="registrationNumber" name="registrationNumber" class="form-control" placeholder="Enter Registration Number" required>
            </div>
            <div class="form-group">
                  <label for="grade">Grade:</label>
                    <select id="grade" name="grade" class="form-control" required>
                 <option value="">Select Grade</option>
                 <option value="A+">A+</option>
                 <option value="A">A</option>
                 <option value="A-">A-</option>
                 <option value="B+">B+</option>
                 <option value="B">B</option>
                 <option value="B-">B-</option>
                 <option value="C+">C+</option>
                 <option value="C">C</option>
                 <option value="C-">C-</option>
                 <option value="D+">D+</option>
                 <option value="D">D</option>
                 <option value="F">F</option>
                 <option value="AB">AB</option>
                 <option value="MC">MC</option>
                    </select>
            </div>

            <div class="form-group">
              <label for="issued_Date">Issued Date:</label>
              <input type="date" id="issued_Date" name="issued_Date" class="form-control" required>
            </div>
            <div class="form-group">
               <label for="issued_time">Issued Time:</label>
               <input type="time" id="issued_time" name="issued_time" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="result_status">Result Status:</label>
              <input type="text" id="result_status" name="result_status" class="form-control" value="Pending" readonly>
            </div>

            <div class="form-group">
                <label for="marks">Marks:</label>
                <input type="text" id="marks" name="marks" class="form-control" placeholder="Enter Marks" required>
            </div>
            <div class="form-group">
            <label for="year">Year:</label>
             <select id="year" name="year" class="form-control" required>
            <option value="">Select Year</option>
               <?php
                // Generate year options dynamically, e.g., from 2000 to the current year
                for ($year = date("Y"); $year >= 2020; $year--) {
              echo "<option value=\"$year\">$year</option>";
              }
              ?>
              </select>
            </div>
            <div class="form-group">
              <label for="semester">Semester:</label>
            <select id="semester" name="semester" class="form-control" required>
            <option value="">Select Semester</option>
            <?php
        
               for ($i = 1; $i <= 8; $i++) {
                  echo "<option value=\"$i\">Semester $i</option>";
             }
             ?>
             </select>
            </div>
            <div class="form-group">
             <label for="batch">Batch:</label>
             <input type="text" id="batch" name="batch" class="form-control" placeholder="Enter Batch" required>
            </div>
            <div class="form-group mt-3 d-flex justify-content-center">
                <button type="submit" id="btn_btn-primary" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
            </form>

    <!-- JavaScript file -->
    <script src="script.js"></script>

</body>
</html>

<?php


// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Module = $_POST["Module"];
    $registrationNumber = $_POST["registrationNumber"];
    $grade = $_POST["grade"];
    $issued_Date = $_POST["issued_Date"];
    $issued_time = $_POST["issued_time"];
    $result_status = $_POST["result_status"];
    $marks = $_POST["marks"];
    $year = $_POST["year"];
    $semester = $_POST["semester"];
    $batch = $_POST["batch"];

    // Inserting results into the database
    $sql = "INSERT INTO results ( Module, registrationNumber, grade, issued_Date, issued_time, result_status, marks, year, semester, batch)
            VALUES ('$Module', '$registrationNumber', '$grade', '$issued_Date', '$issued_time', '$result_status', '$marks', '$year', '$semester', '$batch')";

    $result = $conn->query($sql);

    if ($result) {
        echo "<script>alert('Results successfully submitted!'); window.location.href = 'addMarks.php';</script>";
    } else {
        echo "<script>alert('Error: " . $conn->error . "'); window.location.href = 'addMarks.php';</script>";
    }
}


// Closing the database connection
$conn->close();
?>
