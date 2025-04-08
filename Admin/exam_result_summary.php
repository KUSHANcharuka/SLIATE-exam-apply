<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam Result Summary</title>

     <!-- bootstrap link -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dst/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
     <link rel="stylesheet" href="../EXres.css">
    
    


</head>
<body>
    <div class="container">
        <div class="summary-container">
            <h2>Exam Result Summary</h2>
            <div id="subject-summary"></div>
            <div id="student-summary"></div>
            <div id="department-summary"></div>
        </div>
        <div class="chart-container">
            <h2>Visualizations</h2>
            <canvas id="pieChart"></canvas>
            <canvas id="barChart"></canvas>
        </div>
    </div>


</body>
</html>
