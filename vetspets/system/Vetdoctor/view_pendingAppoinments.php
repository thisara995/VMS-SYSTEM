<?php
session_start();

include('includes/config.php');
include('includes/header.php');
include('includes/sidebar.php');

$doctorId = $_SESSION['id'];
$doc_email = $_SESSION['docEmail'];
$doctorId = $con->real_escape_string($doctorId);

function pendingAppointmentsByDoctor($connection, $doctorId) {
    $query = "SELECT A.appointmentid, A.reason, U.name, A.animalname, S.service_name, A.appointmentDate, A.status, D.doctorName
              FROM appointment A
              INNER JOIN users U ON A.userid = U.id
              INNER JOIN tblservices S ON A.service_name = S.service_id
              INNER JOIN doctors D ON A.doctorId = D.id
              WHERE A.status = 'pending' AND A.doctorId = $doctorId
              ORDER BY A.appointmentDate";

    $result = mysqli_query($connection, $query) or die(mysqli_error($connection));

    $appointments = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $appointments[] = $row;
    }
    return $appointments;
}

$pendingAppointments = pendingAppointmentsByDoctor($con, $doctorId);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Appointment System</title>
    <!-- Add Bootstrap CSS link here -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Pending Appointments</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Appt.ID</th>
                    <th>Pet Owner Name</th>
                    <th>Animal Name</th>
                    <th>Service</th>
                    <th>Reason</th>
                    <th>Appt. date</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($pendingAppointments as $appointment) {
                    echo "<tr>";
                    echo "<td>{$appointment['appointmentid']}</td>";
                    echo "<td>{$appointment['name']}</td>";
                    echo "<td>{$appointment['animalname']}</td>";
                    echo "<td>{$appointment['service_name']}</td>";
                    echo "<td>{$appointment['reason']}</td>";
                    echo "<td>{$appointment['appointmentDate']}</td>";
                    echo "<td>{$appointment['status']}</td>";
                    echo "<td><a href='approve.php?id={$appointment['appointmentid']}' class='btn btn-success'>Approve</a> <a href='decline.php?id={$appointment['appointmentid']}' class='btn btn-danger'>Decline</a></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php
include('includes/footer.php');
include('includes/script.php');
mysqli_close($con);
?>
