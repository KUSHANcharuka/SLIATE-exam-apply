<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Set Timetables</title>
    <link rel="stylesheet" href="style2.css">

</head>
<body>
    <div class="settimetable-container">
        <h1>Set Timetables</h1>
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
            <input type="time" id="start-time" name="start-time">
        </div>
        <div class="form-group">
            <label for="end-time">End Time:</label>
            <input type="time" id="end-time" name="end-time">
        </div>
        <div class="form-group" style="justify-content: center;">
            <button type="button" onclick="addToTimetable()">Create</button>
        </div>
        <div class="timetable" id="timetable">
         <h2>Timetable</h2>
         </div>
          <!-- Print Button -->
        <button type="button" onclick="printTimetable()">Print Timetable</button>
        
    </div>





<script src="script.js"></script>

</body>
</html>
