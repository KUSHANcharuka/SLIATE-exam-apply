<?php
// Start session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Ensure the user's full name is available in the session
if (!isset($_SESSION['lecturer_id'])) {
    $_SESSION['lecturer_id'] = "0000"; 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lecturer Page</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {background-color:#ffe100;}
    </style>
</head>

<body class="bg-gradient d-flex flex-column align-items-center justify-content-center" style="height: 100vh;">


    <!-- Profile Icon and Dropdown -->
    <?php include('navbar.php'); ?>

    <!-- Lecturer Options Container -->
    <div class="card p-4 shadow-lg text-center" style="width: 100%; max-width: 600px; background-color: #f0ff7f;">
        <h1 class="fw-bold mb-4">Lecturer's Page</h1>
        <!-- Buttons to navigate to different pages -->
        <a href="eligibilityCheck.php" class="btn btn-primary btn-lg mb-3">Eligibility Check</a>
        <a href="view_exam_timetable.php" class="btn btn-primary btn-lg mb-3">View Timetable</a>
        <a href="addMarks.php" class="btn btn-primary btn-lg">Add Marks</a>
    </div>

    

</body>
</html>
