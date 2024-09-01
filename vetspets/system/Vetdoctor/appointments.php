<?php
session_start();
include('includes/config.php');
include('includes/header.php');

// Retrieve the session ID
$userid = $_SESSION['id'];

// Retrieve the appointment details for the logged-in user
$query = "SELECT id, service, doctorSpecialization, doctorId, userid, animalname, appointmentDate, appointmentTime, reason, postingDate, userStatus, doctorStatus, updationDate, status FROM appointment WHERE doctorId = ?";
$stmt = $con->prepare($query);
$stmt->bind_param('i', $userid);
$stmt->execute();
$result = $stmt->get_result();
?>
<center><h2>My Appointments</h2></center>
<div class="table-responsive" style="margin-top: 50px">
  <table class="table">
    <thead>
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
      </tr>
    </thead>
    <tbody>
      <?php
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
      ?>
    </tbody>
  </table>
</div>
<?php
include('includes/footer.php');
include('includes/script.php');

?>