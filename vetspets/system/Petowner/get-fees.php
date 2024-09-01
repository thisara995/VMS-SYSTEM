<?php
include('includes/config.php');

if (isset($_POST['doctor_id'])) {
  $doctorid = $_POST['doctor_id'];

  // Query the database to fetch the price based on the service id
  $query = mysqli_query($con, "SELECT docFees FROM doctors WHERE id = '".$doctorid."'");
  
  if ($query) {
    $row = mysqli_fetch_assoc($query);

    // Return the price as JSON response
    echo json_encode($row);
  } else {
    // Query failed
    echo json_encode(['error' => 'Failed to fetch fee']);
  }
} else {
  // Invalid request
  echo json_encode(['error' => 'Invalid request']);
}
?>
