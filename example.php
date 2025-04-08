<!DOCTYPE html>
<html>
<head>
    <title>Subject Selection</title>
</head>
<body>
    <h2>Select Multiple Subjects</h2>
    <form method="post" action="">
        <label for="subjects">Choose Subjects:</label>
        <select name="subjects[]" id="subjects" multiple required>
            <option value="Mathematics">Mathematics</option>
            <option value="Science">Science</option>
            <option value="History">History</option>
            <option value="English">English</option>
            <option value="Arts">Arts</option>
        </select>
        <br><br>
        <button type="submit" name="submit">Submit</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        // Database connection
        $hostname = "localhost";
        $username = "root";        
        $password = "";           
        $dbname = "lms";
        $conn = new mysqli($hostname, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Verify at least one subject is selected
        if (!empty($_POST['subjects'])) {
            $subjects = $_POST['subjects'];

            // Prepare subjects for insertion into specific columns
            $subject1 = isset($subjects[0]) ? $subjects[0] : NULL;
            $subject2 = isset($subjects[1]) ? $subjects[1] : NULL;
            $subject3 = isset($subjects[2]) ? $subjects[2] : NULL;
            $subject4 = isset($subjects[3]) ? $subjects[3] : NULL;
            $subject5 = isset($subjects[4]) ? $subjects[4] : NULL;

            // Insert into the database
            $sql = "INSERT INTO studentapply (subject1, subject2, subject3, subject4, subject5) VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssss", $subject1, $subject2, $subject3, $subject4, $subject5);

            if ($stmt->execute()) {
                echo "Subjects successfully submitted!";
            } else {
                echo "Error: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Please select at least one subject.";
        }

        $conn->close();
    }
    ?>
</body>
</html>
