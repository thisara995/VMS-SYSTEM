<?php
// Assuming you have established a database connection
session_start();
include('includes/header.php');
include('includes/config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the form data
    $treatment = $_POST['treatment'];
    $treatmentCost = $_POST['treatmentCost'];
    $note = $_POST['note'];

    // Prepare the SQL query
    $query = "INSERT INTO treatments (treatment, treatment_cost, note) VALUES ('$treatment', '$treatmentCost', '$note')";

    // Execute the query
    $result = mysqli_query($con, $query);

    // Check if the insertion was successful
    if ($result) {
        $message = "Treatment added successfully.";
        $alertClass = "alert-success";
    } else {
        $message = "Error adding treatment: " . mysqli_error($con);
        $alertClass = "alert-danger";
    }
}
?>
  
<div class="container-fluid px-4">
     <h1 class="mt-4">Admin | Dashboard</h1>
	 <br>
     <!DOCTYPE html>
<html>
<head>
  <title>Add Treatment-Form</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <link href="assets/css/styles.css" rel="stylesheet" />
</head>
<body>
  <div class="container">
    <h3>Add Treatment</h3>
    <form  method="POST">
      <div class="form-group col-md-6">
        <label for="treatment">Treatment:</label>
        <input type="text" class="form-control" id="treatment" name="treatment" required>
      </div>
      <div class="form-group col-md-6">
        <label for="treatmentCost">Treatment Cost:</label>
        <input type="number" class="form-control" id="treatmentCost" name="treatmentCost" required>
      </div>
      <div class="form-group col-md-6">
        <label for="note">Note:</label>
        <textarea class="form-control" id="note" name="note" rows="3"></textarea>
      </div>
      &nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-primary">Add Treatment</button>
    </form>
  </div>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
include('includes/footer.php');
include('includes/script.php');
?>