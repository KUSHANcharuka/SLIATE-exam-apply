<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Set Timetables</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {background-color: #ffe100;} 
        .card {background-color: #f0ff7f;} 
    </style>
</head>
<body>

    <!-- Profile Icon and Dropdown -->
    <?php include('navbar.php'); ?> 

    <!-- Main Content -->
    <div class="container mt-5 pt-3">
        <h1 class="fw-bold text-center mb-4">Set Timetables</h1>
        <form id="timetableForm" class="card p-4 shadow-lg">
            <div class="row mb-3">
                <label for="date" class="col-sm-4 col-form-label">Select Date:</label>
                <div class="col-sm-8">
                    <input type="date" id="date" name="date" class="form-control" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="department" class="col-sm-4 col-form-label">Select Department:</label>
                <div class="col-sm-8">
                    <select id="department" name="department" class="form-select" required>
                        <option value="">Select Department</option>
                        <option value="Computer Science">Computer Science</option>
                        <option value="Information Technology">Information Technology</option>
                        <option value="Business Administration">Business Administration</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label for="subject" class="col-sm-4 col-form-label">Select Subject:</label>
                <div class="col-sm-8">
                    <select id="subject" name="subject" class="form-select" required>
                        <option value="">Select Subject</option>
                        <option value="Math">Math</option>
                        <option value="Science">Science</option>
                        <option value="History">History</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label for="batch" class="col-sm-4 col-form-label">Select Batch:</label>
                <div class="col-sm-8">
                    <input type="text" id="batch" name="batch" class="form-control" placeholder="Enter Batch" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="year" class="col-sm-4 col-form-label">Year:</label>
                <div class="col-sm-8">
                    <select id="year" name="year" class="form-select" required>
                        <option value="">Select Year</option>
                        <?php
                        for ($year = date("Y"); $year >= 2020; $year--) {
                            echo "<option value=\"$year\">$year</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label for="semester" class="col-sm-4 col-form-label">Select Semester:</label>
                <div class="col-sm-8">
                    <select id="semester" name="semester" class="form-select" required>
                        <option value="">Select Semester</option>
                        <?php
                        for ($i = 1; $i <= 8; $i++) {
                            echo "<option value=\"$i\">Semester $i</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label for="start-time" class="col-sm-4 col-form-label">Start Time:</label>
                <div class="col-sm-8">
                    <input type="time" id="start-time" name="start_time" class="form-control" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="end-time" class="col-sm-4 col-form-label">End Time:</label>
                <div class="col-sm-8">
                    <input type="time" id="end-time" name="end_time" class="form-control" required>
                </div>
            </div>
            <div class="d-flex justify-content-between">
                <button type="button" class="btn btn-primary" onclick="addToTimetable()">Add to Timetable</button>
                <button type="button" class="btn btn-secondary" onclick="window.location.href='admin.php';">Back</button>
            </div>
        </form>

        <h2 class="fw-bold mt-4 text-center">Timetable</h2>
        <div id="timetableDisplay" class="card p-3 mt-3 shadow-lg"></div>
        <button id="finalizeButton" class="btn btn-success mt-3 d-none" onclick="finalizeTimetable()">Finalize</button>
    </div>

    <!-- JavaScript -->
    <script>
        const timetable = [];

        function addToTimetable() {
            const date = document.getElementById('date').value;
            const department = document.getElementById('department').value;
            const subject = document.getElementById('subject').value;
            const batch = document.getElementById('batch').value;
            const year = document.getElementById('year').value;
            const semester = document.getElementById('semester').value;
            const startTime = document.getElementById('start-time').value;
            const endTime = document.getElementById('end-time').value;

            if (!date || !department || !subject || !batch || !year || !semester || !startTime || !endTime) {
                alert("Please fill all fields!");
                return;
            }

            const entry = { date, department, subject, batch, year, semester, startTime, endTime };
            timetable.push(entry);
            updateTimetableDisplay();
        }

        function updateTimetableDisplay() {
            const display = document.getElementById('timetableDisplay');
            display.innerHTML = "";

            timetable.forEach((entry, index) => {
                const row = document.createElement('div');
                row.className = "d-flex justify-content-between align-items-center border-bottom pb-2 mb-2";

                row.innerHTML = `
                    <span>${entry.date} - ${entry.department} - ${entry.subject} (${entry.batch}, ${entry.year}, Semester ${entry.semester}) (${entry.startTime} to ${entry.endTime})</span>
                    <button class="btn btn-danger btn-sm" onclick="removeEntry(${index})">Remove</button>
                `;
                display.appendChild(row);
            });

            document.getElementById('finalizeButton').classList.toggle('d-none', timetable.length === 0);
        }

        function removeEntry(index) {
            timetable.splice(index, 1);
            updateTimetableDisplay();
        }

        function finalizeTimetable() {
            fetch('save_timetable.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(timetable)
            }).then(response => {
                if (response.ok) {
                    alert('Timetable saved successfully!');
                    timetable.length = 0;
                    updateTimetableDisplay();
                } else {
                    alert('Failed to save timetable!');
                }
            });
        }
    </script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
