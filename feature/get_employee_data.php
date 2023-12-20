<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $employeeId = $_POST['idemployees'];

    // Fetch employee data
    $sql = "SELECT * FROM employees WHERE id = $employeeId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo json_encode($row);
    } else {
        echo json_encode(['error' => 'Employee not found']);
    }
}

$conn->close();
?>
