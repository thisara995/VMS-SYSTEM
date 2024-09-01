<?php
// Assuming you have established a database connection
session_start();
include('includes/header.php');
include('includes/config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the form data
    $medicineName = $_POST["medicineName"];
    $category = $_POST["category"];
    $manufacturer = $_POST["manufacturer"];
    $quantity = $_POST["quantity"];
    $expiryDate = $_POST["expiryDate"];
    $price = $_POST["price"];

    // Prepare the SQL query
    $query = "INSERT INTO medicine (medicine_name, category, manufacturer, quantity, expiry_date, price) VALUES ('$medicineName', '$category', '$manufacturer', '$quantity', '$expiryDate', '$price')";

    // Execute the query
    $result = mysqli_query($con, $query);

    // Check if the insertion was successful
    if ($result) {
        $message = "medicine added successfully.";
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
    <h2>Add Medicine</h2>
<form method="POST" >
  <div class="form-group col-md-6">
    <label for="medicineName">Medicine Name:</label>
    <input type="text" class="form-control" name="medicineName" id="medicineName" placeholder="Enter medicine name" required>
  </div>
  <div class="form-group col-md-6">
    <label for="category">Medicine Category:</label>
    <select class="form-control" name="category" id="category" required>
      <option value="category1">antimicrobials</option>
      <option value="category2">antiinflammatory</option>
      <option value="category3">growthpromoters</option>
    </select>
  </div>
  <div class="form-group col-md-6">
    <label for="manufacturer">Manufacturer:</label>
    <input type="text" class="form-control" name="manufacturer" id="manufacturer" placeholder="Enter manufacturer name" required>
  </div>
  <div class="form-group col-md-6">
    <label for="quantity">Quantity:</label>
    <input type="number" class="form-control" name="quantity" id="quantity" placeholder="Enter quantity" required>
  </div>
  <div class="form-group col-md-6">
    <label for="expiryDate">Expiry Date:</label>
    <input type="date" class="form-control" name="expiryDate" id="expiryDate" required>
  </div>
  <div class="form-group col-md-6">
    <label for="price">Price:</label>
    <input type="number" class="form-control" name="price" id="price" placeholder="Enter price" required>
  </div>
  &nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-primary">Add Medicine</button>
</form>
  </div>
</body>
</html>
<?php
include('includes/footer.php');
include('includes/script.php');
?>