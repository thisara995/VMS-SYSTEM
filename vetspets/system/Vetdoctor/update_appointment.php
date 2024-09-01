<?php
// Assuming you have established a database connection



include('view_pendingAppoinments.php');
$appointmentId = $_GET['appointmentid'];
$status = $_GET['status'];

if ($status === 'approved' || $status === 'pending') {
    $result = updateAppointmentStatus($con, $appointmentId, $status); // Use the correct variable name $appointmentId
    
    if ($result) {
        $message = "Appointment $status.";
        $alertClass = "alert-success";
    } else {
        $message = "Error updating appointment: " . mysqli_error($con); // Use $con instead of $connection
        $alertClass = "alert-danger";
    }
} else {
    $message = "Invalid status.";
    $alertClass = "alert-danger";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Appointment</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <div class="alert <?php echo $alertClass; ?>">
            <?php echo $message; ?>
        </div>
    </div>
</body>
</html>
<?php
include('includes/footer.php');
include('includes/script.php');
?>

