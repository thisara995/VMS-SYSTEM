<?php
session_start();
include('includes/config.php');
$email = $_SESSION['email'];


// Prepare and execute an SQL DELETE statement
$stmt = $con->prepare("DELETE FROM users_img WHERE email = ?");
$stmt->bind_param('s', $email);
$stmt->execute();

// Check the affected rows
$affectedRows = $stmt->affected_rows;
if ($affectedRows > 0) {
    echo "Image deleted successfully.";
    echo '<script>window.location.href = "profile.php";</script>';
} else {
    echo "No image found for the provided email.";
}

// Close the statement and the connection
$stmt->close();
$con->close();
?>
