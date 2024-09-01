<?php
// Assuming you have established a database connection
include('includes/config.php');
include('includes/header.php');
include('includes/sidebar.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve the form data
  $pescriptionID = $_POST['prescription_id'];
  $patientName = $_POST['pname'];
  $date = $_POST['pdate'];
  $medications = $_POST['pmedication'];
  $vaccinations = $_POST['pvaccinations'];
  $dosage = $_POST['pdosage'];
  $frequency = $_POST['pfrequency'];
  $instructions = $_POST['pinstructions'];

  // Insert the prescription data into the database
  $query = "INSERT INTO prescription (patient_id, patient_name, date, medications, vaccinations, dosage, frequency, instructions) VALUES ('$patientID', '$patientName', '$date', '$medications', '$vaccinations', '$dosage', '$frequency', '$instructions')";
  $result = mysqli_query($con, $query);

  if ($result) {
     echo "<script>alert('Prescription details added successfully!');</script>";
     echo '<script>window.location.href = "Dashboard.php";</script>';
    exit;
  } else {
    // Error inserting prescription data
    // Handle the error appropriately
    $errorMessage = "Error inserting prescription data: " . mysqli_error($con);
  }
}
?>  
<div class="container-fluid px-4">
     <h1 class="mt-4">Vet Doctor | Dashboard</h1>
	 <br>
     <!DOCTYPE html>
     <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vet Doctor | Add Prescription </title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
  <link href="assets/css/styles.css" rel="stylesheet" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
  <div class="container-fluid px-4">
    <!-- ======= Appointment Section ======= -->
    <div class="container">
      <h3>Add Prescription</h3>
      <form action="" method="post" role="form" class="php-email-form" data-aos="fade-up" data-aos-delay="100"
        autofill="off">
        <div class="row">
        <div class="col-md-4 form-group">
            <label for="doctor" class="form-label">Treatment ID:</label>
            <select name="treatment_id" id="treatment_id" class="form-select" required>
              <option value="">-- Select Treatment ID --</option>
             
            </select>
          </div>
          <div class="col-md-4 form-group">
            <label for="services" class="form-label">Petowner:</label>
            <select name="service" id="service" class="form-select" required>
              <option value="">-- Select Petowner --</option>
            </select>
          </div>
          <div class="col-md-4 form-group">
            <label for="services" class="form-label">Animal Name:</label>
            <select name="service" id="service" class="form-select" required>
              <option value="">-- Select Animal Name --</option>
            </select>
          </div>

          <div class="col-md-4 form-group">
            <label for="services" class="form-label">Service Name:</label>
            <select name="service" id="service" class="form-select" required>
              <option value="">-- Select Service Name --</option>
            </select>
          </div>

          <div class="col-md-4 form-group">
            <label for="DoctorName" class="form-label">Medicine Type:</label>
            <select name="doctor" id="doctor" class="form-control" required>
              <option value="">--Select Medicine Type--</option>
            </select>
          </div>

          <div class="col-md-4 form-group">
            <label for="DoctorName" class="form-label">Medicine Name:</label>
            <select name="doctor" id="doctor" class="form-control" required>
              <option value="">--Select Medicine Name--</option>
            </select>
          </div>

          <div class="col-md-4 mb-3">
            <label for="appointment_date" class="form-label">Unit:</label>
            <input type="Number" id="appdate" name="appdate" class="form-control" autocomplete="off" required>
          </div>

          <div class="col-md-4 form-group">
            <label for="DoctorName" class="form-label">Cost:</label>
            <select name="doctor" id="doctor" class="form-control" required>
              <option value="">--Select Medicine Name--</option>
            </select>
          </div>

          <div class="col-md-4 form-group">
            <label for="DoctorName" class="form-label">Dosage:</label>
            <select name="doctor" id="doctor" class="form-control" required>
              <option value="">--Select Medicine Name--</option>
            </select>
          </div>

          <div class="col-md-8 mb-4">
            <label for="reason_for_visit" class="form-label">Notes:</label>
            <textarea id="reason" name="reason" class="form-control" rows="5" autocomplete="off" required></textarea>
          </div>

          <div class="text-left">
            <button type="submit" name="submit" class="btn btn-primary">Add Prescription</button>
          </div>
        </div>
      </form>
    </div>
    <!-- End Appointment Section -->
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
     
<?php
include('includes/footer.php');
include('includes/script.php');

?>