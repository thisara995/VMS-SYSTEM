<?php
session_start(); 
include('includes/config.php');
include('includes/header.php');
?>

<div class="container">
    <h1>My Approved Appointments</h1>
        <tbody>
            <?php
            $sessionId = $_SESSION['id'];
            $sessionId = $con->real_escape_string($sessionId); // Escape the session ID

            $sql = "SELECT a.appointmentid,s.service_name, d.doctorName, a.doctorSpecialization, a.animalname, a.appointmentDate, a.appointmentTime, a.reason, a.postingDate, a.updationDate, a.status FROM appointment a
                    INNER JOIN tblservices s ON a.appointmentid = service_id 
                    INNER JOIN doctors d ON a.doctorId = d.Id
                    WHERE a.userid = '$sessionId' AND a.status ='approved'";
            
            $result = $con->query($sql);

            if ($result) {
                if ($result->num_rows > 0) {
                    echo '
                    <div class="container mt-5">
                        <table class="table table-bordered table-striped">
                            <thead class="thead-dark">
                                <tr>
                                <th>ID</th>
                                <th>Service Name</th>
                                <th>Doctor Name</th>
                                <th>Animal Name</th>
                                <th>Appointment Date</th>
                                <th>Appointment Time</th>
                                <th>Reason</th>
                                <th>Posting Date</th>
                                <th>Updation Date</th>
                                <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>';

                    while ($row = $result->fetch_assoc()) {
                        echo '<tr>';
                        echo '<td>' . $row['appointmentid'] . '</td>';
                        echo '<td>' . $row['service_name'] . '</td>';
                        echo '<td>' . $row['doctorName'] . '</td>';
                        echo '<td>' . $row['animalname'] . '</td>';
                        echo '<td>' . $row['appointmentDate'] . '</td>';
                        echo '<td>' . $row['appointmentTime'] . '</td>';
                        echo '<td>' . $row['reason'] . '</td>';
                        echo '<td>' . $row['postingDate'] . '</td>';
                        echo '<td>' . $row['updationDate'] . '</td>';
                        echo '<td>';
                        
                        if ($row['status'] == 'approved') {
                            echo '<button class="btn btn-success">Approved</button>';
                        } else {
                            // Display something else if not approved
                        }
                        
                        echo '</td>';
                        echo '</tr>';
                    }
                } else {
                    echo '<tr><td colspan="11">No appointments found for the session ID.</td></tr>';
                }
            } else {
                echo '<tr><td colspan="11">Error executing query: ' . $con->error . '</td></tr>';
            }

            // Close the connection
            $con->close();
            ?>
          <!-- Add Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        </tbody>
    </table>
</div>

<?php
include('includes/footer.php');
include('includes/script.php');
?>
