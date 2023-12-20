<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KPI Evaluation</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <!-- Employee Checkboxes -->
    <div class="employee-list">
        <?php include 'employee_list.php'; ?>
    </div>

    <!-- Add KPI Scores Form -->
    <div class="add-kpi-form">
        <h2>Add KPI Scores</h2>
        <form id="kpiForm">
            <label for="wellbeing">Wellbeing Score:</label>
            <input type="number" id="wellbeing" name="wellbeing" required>

            <label for="performance">Performance Score:</label>
            <input type="number" id="performance" name="performance" required>

            <label for="motivation">Motivation Score:</label>
            <input type="number" id="motivation" name="motivation" required>

            <label for="engagement">Engagement Level Score:</label>
            <input type="number" id="engagement" name="engagement" required>

            <input type="hidden" id="employeeId" name="employeeId" value="">
            <button type="button" onclick="addKpiScores()">Add Scores</button>
        </form>
    </div>

    <!-- Graph and Evaluation Section -->
    <div class="result-section">
        <div id="graph"></div>
        <div id="evaluation"></div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="script.js"></script>
</body>
</html>
