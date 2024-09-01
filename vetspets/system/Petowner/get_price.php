<?php
include('includes/config.php');

if (isset($_POST['service_id'])) {
  $serviceId = $_POST['service_id'];

  // Query the database to fetch the price based on the service id
  $query = mysqli_query($con, "SELECT price FROM tblservices WHERE id = '".$serviceId."'");
  
  if ($query) {
    $row = mysqli_fetch_assoc($query);

    // Return the price as JSON response
    echo json_encode($row);
  } else {
    // Query failed
    echo json_encode(['error' => 'Failed to fetch price']);
  }
} else {
  // Invalid request
  echo json_encode(['error' => 'Invalid request']);
}
?>
