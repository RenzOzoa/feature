<?php
include 'db.php';

// Fetch employee data
$sql = "SELECT idemployees, first_name FROM employees";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<input type='checkbox' class='employee-checkbox' data-id='" . $row["idemployees"] . "'/>" . $row["first_name"] . "<br>";
    }
} else {
    echo "0 results";
}

$conn->close();
?>
