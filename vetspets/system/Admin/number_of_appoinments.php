<?php
include('includes/config.php');

$sql = "SELECT COUNT(*) as count FROM appointment";
$result = $con->query($sql);

if ($result) {
    // Fetch the row count
    $row = $result->fetch_assoc();
    $rowCount = $row['count'];

    // Display the row count
    echo ":- " . $rowCount;
} else {
    echo "Error executing query: " . $con->error;
}

// Close the connection
$con->close();
?>