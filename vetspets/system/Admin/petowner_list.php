<?php
include('includes/config.php');
include('includes/header.php');

// Retrieve doctors' information from the database
$query = "SELECT * FROM users";
$result = mysqli_query($con, $query);
?>

<!-- Display the table -->
<!-- Display the table with Bootstrap styling -->

<center><h1>Pet owner list</h1></center>
<table class="table table-striped">
  <thead>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Address</th>
      <th>Contact Number</th>
      <th>Email</th>
      <th>city</th>
      <th>registered Date</th>
    </tr>
  </thead>
  <tbody>
    <?php
    while ($row = mysqli_fetch_assoc($result)) {
      echo '<tr>';
      echo '<td>' . $row['id'] . '</td>';
      echo '<td>' . $row['name'] . '</td>';
      echo '<td>' . $row['address'] . '</td>';
      echo '<td>' . $row['phonenumber'] . '</td>';
      echo '<td>' . $row['email'] . '</td>';
      echo '<td>' . $row['city'] . '</td>';
      echo '<td>' . $row['regDate'] . '</td>';
      echo '</tr>';
    }
    ?>
  </tbody>
</table>

<?php
include('includes/footer.php');
include('includes/script.php');

?>