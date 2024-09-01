<?php
session_start();

include('includes/config.php');
include('includes/header.php');
include('includes/sidebar.php');

$doctorId = $_SESSION['id'];
$doc_email = $_SESSION['docEmail'];
$doctorId = $con->real_escape_string($doctorId);

function getApprovedAppointmentsByDoctor($connection, $doctorId) {
    $query = "SELECT A.appointmentid, A.reason, U.name, A.animalname, S.service_name, A.appointmentDate, A.status,D.doctorName
              FROM appointment A
              INNER JOIN users U ON A.userid = U.id
              INNER JOIN tblservices S ON A.service_name = S.service_id
              INNER JOIN doctors D ON A.doctorId = D.id
              WHERE A.status = 'approved' AND A.doctorId = $doctorId
              ORDER BY A.appointmentDate";

    $result = mysqli_query($connection, $query) or die(mysqli_error($connection));

    $appointments = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $appointments[] = $row;
    }
    return $appointments;
}

$approvedAppointments = getApprovedAppointmentsByDoctor($con, $doctorId);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Doctor's Approved Appointments</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h2>Approved Appointments</h2>
        <?php
        $previousAppointmentDate = null;
        foreach ($approvedAppointments as $appointment):
            if ($appointment['appointmentDate'] !== $previousAppointmentDate):
                echo $previousAppointmentDate !== null ? '</tbody></table>' : '';
                echo '<h3>Appointments for ' . $appointment['doctorName'] . '</h3><table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Pet Owner Name</th>
                            <th>Animal Name</th>
                            <th>Service Name</th>
                            <th>Reason</th>
                            <th>Appt.date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>';
                $previousAppointmentDate = $appointment['appointmentDate'];
            endif;
        ?>
        <tr>
            <td><?php echo $appointment['appointmentid']; ?></td>
            <td><?php echo $appointment['name']; ?></td>
            <td><?php echo $appointment['animalname']; ?></td>
            <td><?php echo $appointment['service_name']; ?></td>
            <td><?php echo $appointment['reason']; ?></td>
            <td><?php echo $appointment['appointmentDate']; ?></td>
            <td><button class="btn btn-success">Approved</button></td>
        </tr>
        <?php endforeach; ?>
        <?php if ($previousAppointmentDate !== null): ?></tbody></table><?php endif; ?>
    </div>
</body>
</html>

<?php
include('includes/footer.php');
include('includes/script.php');
?>
