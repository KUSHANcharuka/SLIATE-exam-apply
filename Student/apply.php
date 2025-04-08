<?php
// Start session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Ensure the user's full name is available in the session
if (!isset($_SESSION['regNumber'])) {
    $_SESSION['regNumber'] = "Guest";
}

if (!isset($_SESSION['department'])) {
    $_SESSION['department'] = "Guest";
}

// Add connection to the database
include "../DBConnection/connect.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #ffe100;
        }

        .card {
            background-color: #f0ff7f;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <?php include('navbar copy.php'); ?>
    <br>

    <!-- Application Form -->
    <div class="container my-5">
        <div class="text-center mb-4">
            <h1 class="fw-bold">Sri Lanka Institute of Advanced Technological Education Examination - <span id="currentYear"></span></h1>
            <h2 class="text-muted">Semester - I<br>Application Form</h2>
        </div>

        <div class="card p-4 shadow-sm">
            <h3 class="card-title mb-3">Academic Details</h3>
            <form action="" method="post">
                <div class="row g-3">
                    <!-- Course Name -->
                    <div class="col-md-6">
                        <label for="course_name" class="form-label">Name of the course:</label>
                        <select id="course_name" name="course_name" class="form-select">
                            <option value="">Select Course</option>
                            <?php
                            // Query to fetch unique course names from the course table
                            $sql = "SELECT DISTINCT course_name FROM course WHERE course_name IS NOT NULL AND course_name != ''";
                            $result = $conn->query($sql);

                            // Populate the dropdown with course names
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<option value=\"" . htmlspecialchars($row['course_name']) . "\">" . htmlspecialchars($row['course_name']) . "</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>

                    <!-- Academic Year -->
                    <div class="col-md-6">
                        <label for="academic_year" class="form-label">Academic Year:</label>
                        <select id="academic_year" name="academic_year" class="form-select">
                            <option value="">Select Year</option>
                            <?php
                            // Query to fetch unique academic year values, excluding null and empty values
                            $sql = "SELECT DISTINCT academic_year FROM course WHERE academic_year IS NOT NULL AND academic_year != ''";
                            $result = $conn->query($sql);

                            // Populate the dropdown with values
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<option value=\"" . htmlspecialchars($row['academic_year']) . "\">" . htmlspecialchars($row['academic_year']) . "</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>

                    <!-- Registration Number -->
                    <div class="col-md-6">
                        <label for="reg_number" class="form-label">Registration Number:</label>
                        <input type="text" id="reg_number" name="reg_number" class="form-control" placeholder="Enter Your Registration Number" value="<?php echo htmlspecialchars($_SESSION['regNumber']); ?>" readonly required>
                    </div>
                    <!-- Index Number -->
                    <div class="col-md-6">
                        <label for="index_no" class="form-label">Index No:</label>
                        <input type="text" id="index_no" name="index_no" class="form-control" placeholder="Enter Your Index Number" required>
                    </div>
                    <!-- Semester -->
                    <div class="col-md-6">
                        <label for="semester" class="form-label">Semester:</label>
                        <select id="semester" name="semester" class="form-select">
                            <option value="">Select Semester</option>
                            <?php
                            // Query to fetch unique semester values, excluding null and empty values
                            $sql = "SELECT DISTINCT semester FROM course WHERE semester IS NOT NULL AND semester != ''";
                            $result = $conn->query($sql);

                            // Populate the dropdown with values
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<option value=\"" . htmlspecialchars($row['semester']) . "\">Semester " . htmlspecialchars($row['semester']) . "</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>

                    <!-- Hidden Input Field for Department -->
                    <input type="hidden" name="department" value="<?php echo htmlspecialchars($_SESSION['department']); ?>">
                </div>

                <!-- Subject Selection (Checkboxes) -->
                <div class="mt-4">
                    <h4>Select Your Subjects:</h4>
                    <?php
                    // Query to fetch included subjects from the course table
                    $sql = "SELECT included_subjects FROM course WHERE included_subjects IS NOT NULL AND included_subjects != ''";
                    $result = $conn->query($sql);

                    // Check if results exist
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            // Split the included_subjects into individual subjects using a delimiter (e.g., comma)
                            $subjects = explode(',', $row['included_subjects']);
                            foreach ($subjects as $subject) {
                                $subject = trim($subject); // Remove any extra spaces
                                echo "
                    <div class='form-check'>
                        <input type='checkbox' class='form-check-input' id='$subject' name='subjects[]' value='$subject'>
                        <label for='$subject' class='form-check-label'>$subject</label>
                    </div>";
                            }
                        }
                    } else {
                        echo "<p>No subjects found in the course table.</p>";
                    }
                    ?>
                </div>


                <!-- Submit Button -->
                <div class="text-center mt-4">
                    <button type="submit" name="submit" id="apply_btn" class="btn btn-primary btn-lg">Apply</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>

<?php
if (isset($_POST["submit"])) {
    $course_name = $_POST["course_name"];
    $academic_year = $_POST["academic_year"];
    $reg_number = $_POST["reg_number"];
    $index_no = $_POST["index_no"];
    $semester = $_POST["semester"];
    $subjects = $_POST["subjects"];
    $department = $_SESSION['department'];

    // Check if the user has already applied
    $sql1 = "SELECT * FROM studentapply WHERE Registration_number='$reg_number'";
    $result1 = $conn->query($sql1);
    if ($result1->num_rows > 0) {
        echo "<script>alert('You have already applied!')</script>";
    } else {
        // Prepare subjects for dynamic insertion
        $subject1 = isset($subjects[0]) ? $subjects[0] : NULL;
        $subject2 = isset($subjects[1]) ? $subjects[1] : NULL;
        $subject3 = isset($subjects[2]) ? $subjects[2] : NULL;
        $subject4 = isset($subjects[3]) ? $subjects[3] : NULL;
        $subject5 = isset($subjects[4]) ? $subjects[4] : NULL;
        $subject6 = isset($subjects[5]) ? $subjects[5] : NULL;
        $subject7 = isset($subjects[6]) ? $subjects[6] : NULL;
        $subject8 = isset($subjects[7]) ? $subjects[7] : NULL;
        $subject9 = isset($subjects[8]) ? $subjects[8] : NULL;
        $subject10 = isset($subjects[9]) ? $subjects[9] : NULL;

        // Insert into the database
        $sql2 = "INSERT INTO studentapply (Registration_number, course_name, semester, academic_year, index_number, department, subject1, subject2, subject3, subject4, subject5, subject6, subject7, subject8, subject9, subject10) 
                 VALUES ('$reg_number', '$course_name', '$semester', '$academic_year', '$index_no', '$department', '$subject1', '$subject2', '$subject3', '$subject4', '$subject5', '$subject6', '$subject7', '$subject8', '$subject9', '$subject10')";
        if ($conn->query($sql2)) {
            echo "<script>alert('You have successfully applied');</script>";
        } else {
            echo "<script>alert('Error: " . $conn->error . "');</script>";
        }
    }

    $conn->close();
    session_unset();
    session_destroy();
}
?>