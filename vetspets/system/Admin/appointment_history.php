<?php
session_start(); // Start the session

include('includes/config.php');


$sql = "SELECT * FROM appointment"; // Query to fetch the appointments for the session ID
$result = $con->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Appointment History</h1>
    <?php
    if ($result && $result->num_rows > 0) {
        echo '<table>
                <tr>
                    <th>ID</th>
                    <th>Service</th>
                    <th>Doctor Specialization</th>
                    <th>Doctor ID</th>
                    <th>User ID</th>
                    <th>Animal Name</th>
                    <th>Appointment Date</th>
                    <th>Appointment Time</th>
                    <th>Reason</th>
                    <th>Posting Date</th>
                    <th>User Status</th>
                    <th>Doctor Status</th>
                    <th>Updation Date</th>
                    <th>Status</th>
                </tr>';

        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row['id'] . '</td>';
            echo '<td>' . $row['service'] . '</td>';
            echo '<td>' . $row['doctorSpecialization'] . '</td>';
            echo '<td>' . $row['doctorId'] . '</td>';
            echo '<td>' . $row['userid'] . '</td>';
            echo '<td>' . $row['animalname'] . '</td>';
            echo '<td>' . $row['appointmentDate'] . '</td>';
            echo '<td>' . $row['appointmentTime'] . '</td>';
            echo '<td>' . $row['reason'] . '</td>';
            echo '<td>' . $row['postingDate'] . '</td>';
            echo '<td>' . $row['userStatus'] . '</td>';
            echo '<td>' . $row['doctorStatus'] . '</td>';
            echo '<td>' . $row['updationDate'] . '</td>';
            echo '<td>' . $row['status'] . '</td>';
            echo '</tr>';
        }

        echo '</table>';
    } else {
        echo '<p>No appointments found for the session ID.</p>';
    }
    ?>

</body>
</html>

<?php
// Close the connection
$con->close();
?>
