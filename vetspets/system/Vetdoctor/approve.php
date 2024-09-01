<?php
include('includes/config.php');

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $appointmentId = $_GET['id'];

    // Update the status of the appointment to "Approved" in the database
    $query = "UPDATE appointment SET status = 'Approved' WHERE appointmentid = $appointmentId";
    $result = mysqli_query($con, $query);

    if ($result) {
        // Redirect back to the pending appointments page after approval
        header('Location:view_pendingAppoinments.php');
        exit();
    } else {
        echo "Error updating appointment status: " . mysqli_error($con);
    }
} else {
    echo "Invalid appointment ID.";
}

mysqli_close($con);
?>
