<?php
session_start();
include('includes/header.php');
include('includes/config.php');

if (isset($_POST['submit'])) {
    // Retrieve the form data
    $specialization = $_POST['specialization'];
    $name = $_POST['docname'];
    $address = $_POST['address'];
    $contact = $_POST['contactno'];
    $email = $_POST['docemail'];
    $fees = $_POST['docfees'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    // Validate the form data (you can add more validation as per your requirements)

    // Check if passwords match
    if ($password !== $confirmPassword) {
        echo "Error: Passwords do not match.";
        exit;
    }

    // Hash the password
//     $hashedPassword = password_hash($
// password, PASSWORD_DEFAULT);
    // Prepare and execute the SQL statement to insert the doctor data into the database
    $stmt = $con->prepare("INSERT INTO doctors ( specilization, doctorName, address, docFees, contactno, docEmail, password) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssis", $specialization, $name, $address, $contact, $email, $fees, $password);
    if ($stmt->execute()) {
        echo "Doctor added successfully.";
    } else {
        echo "Error: Failed to add the doctor.";
    }
    $stmt->close();
    $con->close();
}
?>

<div class="container-fluid px-4">
  <h1 class="mt-4">Admin | Dashboard</h1>
  <br>
  <!DOCTYPE html>
<html>
<head>
  <title>Add Doctor-Form</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <link href="assets/css/styles.css" rel="stylesheet" />
</head>
  <div class="container">
    <h2>Add Doctor</h2>
    <form action="" method="post" role="form" class="php-email-form" data-aos="fade-up" data-aos-delay="100" autocomplete="off">

    <div class="form-group col-md-6">
    <label for="specialization">Specialization:</label>
    <input type="text" class="form-control" id="specialization" name="specialization" placeholder="Enter doctor's specialization" required>
    </div>

  <div class="form-group col-md-6">
    <label for="name">Name:</label>
    <input type="text" class="form-control" id="name" name="docname" placeholder="Enter doctor's name" required>
  </div>


  <div class="form-group col-md-6">
    <label for="name">Address:</label>
    <input type="textarea" class="form-control" id="address" name="address" placeholder="Enter Address" required>
  </div>
 
  <div class="form-group col-md-6">
    <label for="contact">Contact Number:</label>
    <input type="tel" class="form-control" id="contact" name="contactno" placeholder="Enter contact number" required>
  </div>
  <div class="form-group col-md-6">
    <label for="email">Email:</label>
    <input type="email" class="form-control" id="email" name="docemail" placeholder="Enter email" required>
  </div>
  <div class="form-group col-md-6">
    <label for="fee">Doctor's Fee:</label>
    <input type="number" class="form-control" id="fees" name="docfees" placeholder="Enter doctor's fee" required>
  </div>
  <div class="form-group col-md-6">
    <label for="password">Password:</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
  </div>
  <div class="form-group col-md-6">
    <label for="confirmPassword">Confirm Password:</label>
    <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirm password" required>
  </div>
  &nbsp;&nbsp;&nbsp;<button type="submit" name="submit" class="btn btn-primary">Add Doctor</button>
</form>

</div>
</div>

<?php
include('includes/footer.php');
include('includes/script.php');
?>
