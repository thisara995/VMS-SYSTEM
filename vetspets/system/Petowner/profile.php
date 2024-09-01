<?php
session_start();
include('includes/config.php');
include('includes/header.php');


// Check if the user is not logged in
if (!isset($_SESSION["email"])) {
    // Redirect to the login page or any other appropriate action
    header("Location: login.php");
    exit;
}

// Get the user details from the session or database
$email = $_SESSION["email"];

// Prepare and execute the SQL statement to fetch user details based on the email
$stmt = $con->prepare("SELECT * FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();

// Fetch the result
$result = $stmt->get_result();

// Check if the user exists
if ($result->num_rows == 1) {
    // User exists, fetch the details
    $row = $result->fetch_assoc();
    $id=$row["id"];
    $Name = $row["name"];
    $Address = $row["address"];
    $city = $row["city"];
    $email = $row["email"];
    $pnumber = $row["phonenumber"];
} else {
    // User not found, handle accordingly
    // Redirect, display an error message, or take any other appropriate action
    // header("Location: error.php");
    exit;
}

// Close the prepared statement
$stmt->close();

// Close the database connection
$con->close();
?>
<div class="container-fluid px-4">
     <h1 class="mt-4">Pet Owner | Profile</h1>
	 <br>
	

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
  <link href="assets/css/styles.css" rel="stylesheet" />
  <style>
    .profile-box {
      background-color: #f8f9fa;
      padding: 20px;
      border-radius: 45px;


    }

    .square-image {
        width: 400px;
        height: 400px;
        border: 2px solid #000;
        background-color: transparent;
    }

  </style>
</head>
<body>

<?php include('includes/sidebar.php');?>
  <div class="container mt-4">
    <div class="row">
      <div class="col-md-5">
      <?php include("displayingimg.php"); ?>
        <form action="upload_img.php" method="POST" enctype="multipart/form-data">
            <input type="file" name="image" id="image">
            <input type="submit" value="Upload Image" name="submit">
        </form>

          <div class="form-group">
     <form action="delete_img.php" method="post">
       <button type="submit" name="delete" onclick="return confirm('Are you sure you want to remove your profile image?')">Remove photo</button>
     </form>
    </div>
      </div>
    </div>
      <div class="col-md-7">
        <div class="profile-box" style="width: 700px; background-color: grey; margin-top: 50px;">
          <h1>Welcome <?php echo $Name; ?></h1>
          <p>Address: <?php echo $Address; ?></p>
          <p>Phone Number: <?php echo $pnumber; ?></p>
          <p>City: <?php echo $city; ?></p>
          <p>Email: <?php echo $email; ?></p>
          <a href="edit-profile.php" class="btn btn-primary">Edit Profile</a>
        </div>
      </div>
    </div>
  </div>
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

