<?php
session_start(); 
include('includes/config.php');
include('includes/header.php');

$sessionId = $_SESSION['id'];
$sessionId = $con->real_escape_string($sessionId); // Escape the session ID

$sql = "SELECT a.appointmentid , s.	service_name, d.doctorName, a.doctorSpecialization, a.animalname, a.appointmentDate, a.appointmentTime, a.reason, a.postingDate, a.updationDate, a.status 
        FROM appointment a
        INNER JOIN tblservices s ON a.appointmentid = service_id 
        INNER JOIN doctors d ON  a.doctorId = d.Id
        WHERE a.userid = '$sessionId'";

$result = $con->query($sql);

if ($result) {
    if ($result->num_rows > 0) {
        echo '
        <div class="container mt-5">
            <h1>My appointments</h1>
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Service Name</th>
                        <th>Doctor Specialization</th>
                        <th>Doctor Name</th>
                        <th>Animal Name</th>
                        <th>Appointment Date</th>
                        <th>Appointment Time</th>
                        <th>Reason</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>';

        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row['appointmentid'] . '</td>';
            echo '<td>' . $row['service_name'] . '</td>';
            echo '<td>' . $row['doctorSpecialization'] . '</td>';
            echo '<td>' . $row['doctorName'] . '</td>';
            echo '<td>' . $row['animalname'] . '</td>';
            echo '<td>' . $row['appointmentDate'] . '</td>';
            echo '<td>' . $row['appointmentTime'] . '</td>';
            echo '<td>' . $row['reason'] . '</td>';
            
            // Display status as buttons with colored background
            if ($row['status'] === 'approved') {
                echo '<td><button class="btn btn-success">Approved</button></td>';
            } elseif ($row['status'] === 'pending') {
                echo '<td><button class="btn btn-warning">Pending</button></td>';
            } else {
                echo '<td><button class="btn btn-secondary">' . $row['status'] . '</button></td>';
            }
            
            echo '</tr>';
        }

        echo '</tbody></table></div>';
    } else {
        echo 'No appointments found for the session ID.';
    }
} else {
    echo "Error executing query: " . $con->error;
}

// Close the connection
$con->close();
?>

<!-- Add Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<?php
include('includes/footer.php');
include('includes/script.php');
?>
