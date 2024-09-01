<?php
session_start();
include('includes/config.php');

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    // Redirect to the login page or any other appropriate action
    header("Location: login.php");
    exit;
}

$email = $_SESSION['email'];
// Retrieve form data
$name = $_POST['name'];
$pnumber = $_POST['pnumber'];
$address = $_POST['address'];
$city = $_POST['city'];




// Update the user details
$updateQuery = "UPDATE users SET name = ?, phonenumber = ?, address = ?, city = ? WHERE email = ?";
$updateStmt = $con->prepare($updateQuery);
$updateStmt->bind_param('sssss', $name, $pnumber, $address, $city, $email);
$updateResult = $updateStmt->execute();

if ($updateResult) {
    echo "<script>alert('Profile updated successfully.'); window.location='profile.php';</script>";
} else {
    echo "<script>alert('Failed to update profile. Please try again.'); window.location='edit-profile.php';</script>";
}

// Close the connection
$updateStmt->close();
$con->close();
?>

?>