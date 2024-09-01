<?php
session_start();
include('includes/config.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $appointmentId = $con->real_escape_string($_GET['id']);
    $sessionId = $_SESSION['id'];

    // Check if the appointment belongs to the current user (for security purposes)
    $checkAppointmentQuery = "SELECT * FROM appointment WHERE id = '$appointmentId' AND userid = '$sessionId' AND status = 'Pending'";
    $result = $con->query($checkAppointmentQuery);

    if ($result && $result->num_rows > 0) {
        // Update the appointment status to "Cancelled"
        $updateQuery = "UPDATE appointment SET status = 'Cancelled' WHERE id = '$appointmentId'";
        if ($con->query($updateQuery)) {
            // Redirect back to view_appointments.php after successful cancellation
            header("Location: view_appointments.php");
            exit();
        } else {
            echo "Error cancelling appointment: " . $con->error;
        }
    } else {
        echo "Invalid appointment ID or the appointment is not pending.";
    }
} else {
    echo "Invalid request.";
}

// Close the connection
$con->close();
?>
