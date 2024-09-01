<?php
session_start();
include('includes/config.php');
include('includes/header.php');


// Check if the user is not logged in
if (!isset($_SESSION["docEmail"])) {
    // Redirect to the login page or any other appropriate action
    header("Location: login.php");
    exit;
}

// Get the user details from the session or database
$email = $_SESSION["docEmail"];

// Prepare and execute the SQL statement to fetch user details based on the email
$stmt = $con->prepare("SELECT * FROM doctors WHERE docEmail = ?");
$stmt->bind_param("s", $email);
$stmt->execute();

// Fetch the result
$result = $stmt->get_result();

// Check if the user exists
if ($result->num_rows == 1) {
    // User exists, fetch the details
    $row = $result->fetch_assoc();
    $Name = $row["doctorName"];
    $Address = $row["address"];
    $Specialization = $row["specilization"];
    $Fees = $row["docFees"];
    $email = $row["docEmail"];
    $pnumber = $row["contactno"];
} else {
    // User not found, handle accordingly
    // Redirect, display an error message, or take any other appropriate action
    header("Location: error.php");
    exit;
}

// Close the prepared statement
$stmt->close();

// Close the database connection
$con->close();
?>



<!DOCTYPE html>
<html>
<head>
  <title>Profile page</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="assets/css/profile.css">
</head>
<body>

<div class="content">
   <div class="container" style="margin-left: 70px; margin-top: 20px;">
    <h2><u>Welcome  <?php echo $Name; ?> !</u></h2>
    <form id="registrationForm" method="post" action="">
      <div class="form-group">
        <label for="firstName">Name</label>
        <input type="text" id="username" name="uname" value="<?php echo $Name; ?>" readonly>
      </div>

      <div class="form-group">
        <label for="lastName">Specialization</label>
        <input type="text" id="nic" name="nic" value="<?php echo $Specialization; ?>" readonly>
      </div>

       <div class="form-group">
        <label for="lastName">Address</label>
        <input type="text" id="pnumber" name="pnumber" value="<?php echo $Address; ?>" readonly>
      </div>

      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $email; ?>" readonly>
      </div>

        <div class="form-group">
        <label for="lastName">Fees</label>
        <input type="text" id="Dob" name="Dob" value="<?php echo $Fees; ?>" readonly>
      </div>
    </form>
     <div class="form-group">
        <label for="lastName">Contact Number</label>
        <input type="text" id="Dob" name="Dob" value="<?php echo $pnumber; ?>" readonly>
      </div>
    </form>


    <div class="form-group">
    
       <a href=""></a><button type="submit" name="edit">Edit Profile</button></a>
    </div>
      <div class="form-group">
     <form action="deleteAcc.php" method="post">
       <button type="submit" name="delete" onclick="return confirm('Are you sure you want to delete your account?')">Delete Account</button>
     </form>
    </div>
    <!--  <div class="form-group">
     <form action="" method="">
       <button type="submit" style="background-color: green"><h3><b>+</b>POST AD</h3></button>
     </form>
    </div> -->


  </div>

</div>
</body>
</html>
<?php
include('includes/footer.php');
include('includes/script.php');

?>