<?php
session_start();
include('includes/config.php');
include('includes/header.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve the form data
  $day = $_POST['day'];
  $fromTime = $_POST['fromTime'];
  $toTime = $_POST['toTime'];
  $status = $_POST['status'];

  // Get the session email
  $doc_email = $_SESSION['docEmail'];
  $doctorId = $_SESSION['id'];

  // Insert the visiting hours into the database
  $query = "INSERT INTO visiting_hours (day, from_time, to_time, status, doc_email) VALUES ('$day', '$fromTime', '$toTime', '$status', '$doc_email')";
  $result = mysqli_query($con, $query);

  if ($result) {
    echo "<script>alert('Visiting hours added successfully!');</script>";
    echo '<script>window.location.href = "Dashboard.php";</script>';
    $day = $fromTime = $toTime = $status = '';
    exit;
  } else {
    // Error adding visiting hours
    $errorMessage = "Error adding visiting hours: " . mysqli_error($con);
  }
}
?>

  
<div class="container-fluid px-4">
     <h1 class="mt-4">Vet Doctor | Dashboard</h1>
	 <br>
     <!DOCTYPE html>
<html>
<head>
  <title>Doctor Prescription Form</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <link href="assets/css/styles.css" rel="stylesheet" />
</head>
<body>
  <div class="container">
    <h2>Add Visiting Hours</h2>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <div class="form-group col-md-6">
        <label for="day">Day:</label>
        <select class="form-control" id="day" name="day" value="<?php echo $day; ?>" required>
          <option value="">Select a day</option>
          <option value="Monday">Monday</option>
          <option value="Tuesday">Tuesday</option>
          <option value="Wednesday">Wednesday</option>
          <option value="Thursday">Thursday</option>
          <option value="Friday">Friday</option>
          <option value="Saturday">Saturday</option>
          <option value="Sunday">Sunday</option>
        </select>
      </div>
      <div class="form-group col-md-6">
        <label for="fromTime">From Time:</label>
        <input type="time" class="form-control" id="fromTime" name="fromTime" value=""  required>
      </div>
      <div class="form-group col-md-6">
        <label for="toTime">To Time:</label>
        <input type="time" class="form-control" id="toTime" name="toTime" value="" required>
      </div>
      <div class="form-group col-md-6">
        <label for="status">Status:</label>
        <select class="form-control" id="status" name="status" value="" required>
          <option value="active">Active</option>
          <option value="inactive">Inactive</option>
        </select>
      </div>
      <br>
     <button type="submit" class="btn btn-primary">Add Visiting Hours</button>
    </form>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

  
</html>      
<?php
include('includes/footer.php');
include('includes/script.php');

?>