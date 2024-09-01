<?php
include('includes/config.php');

// Retrieve doctors' information from the database
$query = "SELECT * FROM doctors";
$result = mysqli_query($con, $query);
?>

<!-- Display the table -->
<!-- Display the table with Bootstrap styling -->
<table class="table table-striped">
  <thead>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Specialization</th>
      <th>Address</th>
      <th>Contact Number</th>
      <th>Email</th>
      <th>Fees</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    while ($row = mysqli_fetch_assoc($result)) {
      echo '<tr>';
      echo '<td>' . $row['id'] . '</td>';
      echo '<td>' . $row['doctorName'] . '</td>';
      echo '<td>' . $row['specilization'] . '</td>';
      echo '<td>' . $row['address'] . '</td>';
      echo '<td>' . $row['contactno'] . '</td>';
      echo '<td>' . $row['docEmail'] . '</td>';
      echo '<td>' . $row['docFees'] . '</td>';
      echo '<td><a href="update_doctors.php?id=' . $row['id'] . '">Edit</a></td>';
      echo '</tr>';
    }
    ?>
  </tbody>
</table>

