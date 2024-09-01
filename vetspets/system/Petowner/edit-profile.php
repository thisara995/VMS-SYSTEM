<?php
session_start();
include('includes/config.php');
include('includes/header.php');

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    // Redirect to the login page or any other appropriate action
    header("Location: login.php");
    exit;
}

// Retrieve the user data from the database
$email = $_SESSION['email'];
$sql = "SELECT * FROM users WHERE email = '$email'";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    // User found, retrieve the data
    $row = $result->fetch_assoc();
    $id=$row["id"];
    $Name = $row["name"];
    $Address = $row["address"];
    $city = $row["city"];
    $email = $row["email"];
    $pnumber = $row["phonenumber"];
} else {
    echo "User not found.";
    exit;
}

$con->close();
?>

<div class="container-fluid px-4">
     <h1 class="mt-4">Pet Owner | Edit Profile</h1>
	 <br>
	

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="assets/css/styles.css" rel="stylesheet" />
</head>
<body>
<?php include('includes/sidebar.php');?>
  <div class="container">
    <h5>Edit Profile </h5>
    <!DOCTYPE html>
<html>
<head>
  <title>Pet Owner Profile</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <form method="POST" action="update_profile.php">
      <div class="form-group col-md-6">
        <label for="fullName">Full Name:</label>
        <input type="text" class="form-control" id="fullName" value="<?php echo $Name; ?>" name="name" placeholder="Enter your full name">
      </div>
      <div class="form-group col-md-6">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" placeholder="Enter your email address" readonly>
      </div>
      <div class="form-group col-md-6">
        <label for="phone">Phone Number:</label>
        <input type="tel" class="form-control" id="phone" name="pnumber" value="<?php echo $pnumber; ?>" placeholder="Enter your phone number">
      </div>
      <div class="form-group col-md-6">
        <label for="address">Address:</label>
        <input type="text" class="form-control" id="address" value="<?php echo $Address; ?>" name="address" placeholder="Enter your address">
      </div> 
      <div class="form-group col-md-6">
        <label for="petName">city</label>
        <input type="text" class="form-control" id="petName" value="<?php echo $city; ?>" name="city" placeholder="Enter your pet's name">
      </div>
     

      &nbsp;&nbsp; <button type="submit" class="btn btn-primary ">Save Profile</button>
    </form>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</body>
</html>
			
<?php
include('includes/footer.php');
include('includes/script.php');

?>