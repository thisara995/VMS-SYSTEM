<?php
session_start();
include('includes/config.php');

// Check if the ID parameter is provided
if(isset($_GET['id'])) {
    // Retrieve the ID from the URL
    $id = $_GET['id'];

    // Retrieve the session email
    $doc_email = $_SESSION['docEmail'];

    // Prepare the delete statement
    $query = "DELETE FROM visiting_hours WHERE id = ? AND doc_email = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param("is", $id, $doc_email);

    // Execute the delete statement
    if ($stmt->execute()) {
        // Visiting hours deleted successfully
        echo "<script>alert('Visiting hours deleted successfully!');</script>";
          echo '<script>window.location.href = "view_visitingHours.php";</script>';

    } else {
        // Error deleting visiting hours
        echo "<script>alert('Error deleting visiting hours: " . $stmt->error . "');</script>";
    }

    // Close the statement
    $stmt->close();
}


?>
