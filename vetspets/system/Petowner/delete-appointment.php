<?php
include('includes/config.php');
$id = $_GET['id'];

$query = mysqli_query($con, "DELETE FROM appointment WHERE id = '".$id."'");

if ($query) {
  header("Location: view-appointment.php");
  exit();
}
?>