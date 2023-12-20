<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $employeeId = $_POST['EmployeeID'];
    $wellbeingScore = $_POST['WellBeingKPI'];
    $performanceScore = $_POST['PerformanceKPI'];
    $motivationScore = $_POST['MotivationKPI'];
    $engagementScore = $_POST['EngagementLevel'];

    // Insert KPI scores into the kpi_dashboard table
    $insertSql = "INSERT INTO kpi_dashboard (EmployeeID, WellBeingKPI, PerformanceKPI, MotivationKPI, EngagementLevel)
                  VALUES ('$employeeId', '$wellbeingScore', '$performanceScore', '$motivationScore', '$engagementScore')";

    if ($conn->query($insertSql) === TRUE) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['error' => 'Error adding KPI scores: ' . $conn->error]);
    }
} else {
    echo json_encode(['error' => 'Invalid request method']);
}

$conn->close();
?>
