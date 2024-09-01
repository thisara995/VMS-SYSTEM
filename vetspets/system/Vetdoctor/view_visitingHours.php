<?php
session_start();
include('includes/config.php');
include('includes/header.php');

// Retrieve the session email
$doc_email = $_SESSION['docEmail'];

// Retrieve the visiting hours data for the logged-in doctor
$query = "SELECT id, day, from_time, to_time, status FROM visiting_hours WHERE doc_email = '$doc_email'";
$result = mysqli_query($con, $query);

?>

<center><h1>Visting Hours</h1></center>

<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Day</th>
        <th>From Time</th>
        <th>To Time</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
      while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>' . $row['id'] . '</td>';
        echo '<td>' . $row['day'] . '</td>';
        echo '<td>' . $row['from_time'] . '</td>';
        echo '<td>' . $row['to_time'] . '</td>';
        echo '<td>' . $row['status'] . '</td>';
        echo '<td><a href="delete_visiting_hours.php?id=' . $row['id'] . '">Delete</a></td>';
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