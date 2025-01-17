<?php
//Add connection
include "../DBConnection/connect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Set Timetables</title>
    <link rel="stylesheet" href="../style2.css">

</head>
<body>
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
            <button type="submit" name="create">Create</button>
        </div>
        <div class="timetable" id="timetable">
         <h2>Timetable</h2>
         </div>
          <!-- Print Button -->
        <button type="button" onclick="printTimetable()">Print Timetable</button>
        </form>
    </div>
    <!-- onclick="addToTimetable()" -->




<script src="script.js"></script>

</body>
</html>


<?php
if(isset($_POST["create"])){
    $date = $_POST["date"];
    $division = $_POST["division"];
    $subject = $_POST["subject"];
    $start_time = $_POST["start_time"];
    $end_time = $_POST["end_time"];

//checking
$sql1="SELECT * FROM timetable WHERE subject='$subject'";
$result1=$conn->query($sql1);
if($result1->num_rows > 0) {
    echo "<script>alert('This time table have been created previously!')</script>";
}else{
//inserting
$sql2 = "INSERT INTO `timetable`(`date`,`devision`,`subject`,`start_time`,`end_time`) 
        VALUES('$date','$division','$subject','$start_time','$end_time')";

$result2=$conn->query($sql2);

if($result2){
    echo "<script>alert('Time Table was created successfully')</script>";
}}
}

//closing connection
$conn->close();
?>