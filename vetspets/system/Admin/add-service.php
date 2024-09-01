<?php
// Assuming you have established a database connection
session_start();
include('includes/header.php');
include('includes/config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the form data
    $service = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    // Prepare the SQL query
    $query = "INSERT INTO tblservices (service, price, description) VALUES ('$service', '$price', '$description')";

    // Execute the query
    $result = mysqli_query($con, $query);

    // Check if the insertion was successful
    if ($result) {
        $message = "Service added successfully.";
        $alertClass = "alert-success";
    } else {
        $message = "Error adding service: " . mysqli_error($con);
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
  <title>Add Service-Form</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <link href="assets/css/styles.css" rel="stylesheet" />
</head>
<body>
  <div class="container">
    <h2>Add Service</h2>
    <form method="POST">
      <div class="form-group col-md-6">
        <label for="name">Service Name:</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Enter service name" required>
      </div>
       <div class="form-group col-md-6">
        <label for="name">Price:</label>
        <input type="text" class="form-control" id="name" name="price" placeholder="Enter service name" required>
      </div>

      <div class="form-group col-md-6">
        <label for="description">Description:</label>
        <textarea class="form-control" id="description" name="description" placeholder="Enter service description" required></textarea>
      &nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-primary">Add Service</button>
    </form>
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