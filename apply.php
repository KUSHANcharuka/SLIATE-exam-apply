<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Form</title>
    
    <!-- CSS link -->
    <link rel="stylesheet" href="style.css">

    
</head>
<body>
    <div class="heading">
        <h1 id="title">Sri Lanka Institute of Advanced Technological Education Examination - <span id="currentYear"></span></h1>
        <h2>Semester - I<br>Application Form</h2>
    </div>



       <!-- Acadamic Details Section -->
    <div class="Academic-Details">
    <h3 style="padding-left:5px; font-size:20px;">Academic Details</h3>
    <form>
    <div class="form-container">
    <label for="course_name">Name of the course :</label>
    <input type="text" id="course_name" spellcheck="false" placeholder="Enter Your course Name" required>

    <label for="academic_year">Academic year :</label>
    <select id="academic_year" name="academic_year" required>
        <option value="" disabled selected>Academic Year</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
    </select>

    <label for="reg_number">Registration Number :</label>
    <input type="text" id="reg_number" spellcheck="false" placeholder="Enter Your Registration Number" required>

    <label for="index_no">Index No :</label>
    <input type="text" id="index_no" spellcheck="false" placeholder="Enter Your Index Number" required>

    <label for="semester">Semester :</label>
    <select id="semester" name="semester" required>
        <option value="" disabled selected>Semester</option>
        <option value="I">I</option>
        <option value="II">II</option>
        <option value="III">III</option>
        <option value="IV">IV</option>
    </select>
</div>

        <div class="center-container">
        <h3 id="Required-Subjects">Required Subjects</h3><br>
        <select id="Division" name="Division" class="Division-input-field" required>
            <option value="" disabled selected>Select Your Division</option>
            <option value="Agri">Agri Culture</option>
            <option value="Management">Management</option>
        </select>
        <br>
        <select id="Subjects" name="Subjects" class="Subjects-input-field" required>
            <option value="" disabled selected>Select Your Subjects</option>
            <option value="AG1208">AG1208 - Field Crop Production</option>
            <option value="AG1209">AG1209 - Protective Crop Production & Floriculture</option>
            <option value="AG1210">AG1210 - Soil Science</option>
            <option value="MG2101">MG2101 - Business Management</option>
        </select>
        <br><br>
        <ul id="selected-subjects" class="subject-list"></ul>
    </div>
    </form>



 
    
    

   

<script src="script.js"></script>
</body>
</html>

