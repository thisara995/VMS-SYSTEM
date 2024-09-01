<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8">
  <title>Responsive Registration Form | CodingLab</title>
  <link rel="stylesheet" href="assets/css/petownreg.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script>
    function validateForm() {
      var password = document.getElementById("password").value;
      var confirmPassword = document.getElementById("conpassword").value;

      if (password !== confirmPassword) {
        alert("Passwords do not match");
        return false;
      }
    }
  </script>
</head>
<body>
  <div class="container">
    <div class="title">Pet Owner | Registration</div>
    <div class="content">
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data" autocomplete="off">
        <div class="user-details">
        <div class="input-box">
          <span class="details">Name</span>
          <input type="text" id="name" name="name" placeholder="Enter your Name" required>
         </div>
         <div class="input-box">
          <span class="details">Email</span>
          <input type="email" id="email" name="email" placeholder="Enter your email" required>
        </div>
        <div class="input-box">
          <span class="details">Phone Number</span>
          <input type="text" id="phonenumber" name="phoneNumber" placeholder="Enter your number" required>
         </div>
         <div class="input-box">
          <span class="details">Address</span>
          <input type="textarea" id="address" name="address" placeholder="Enter your Address" required></textarea>
        </div>
        <div class="input-box">
          <span class="details">City</span>
          <input type="text" id="city" name="city" placeholder="Enter your City" required>
        </div>
        <div class="input-box">
          <span class="details">Password</span>
          <input type="password" id="password" name="password" placeholder="Enter your password" required>
        </div>
          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="password"id="conpassword" name="confirmPassword" placeholder="Confirm your password" required>
          </div>
          <div class="input-box">
          <span class="details">Choose an image:</span>
          <input type="file" id="profileImage" name="profileImage" accept="image/*" required>
        </div>
        </div>
        <div class="button" style="margin-bottom: 10px;">
        <input type="submit" id="submit" name="submit" value="Register"><br>
      </div>
    <div class="links" style="margin-top: 10px;">
    Already a member? <a href="login.php">Sign In</a>
  </div>

      </form>
    </div>
  </div>

  <?php
  if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit'])) {
    include('includes/config.php');

    // Get user inputs
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phoneNumber = $_POST['phoneNumber'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $profileImageName = $_FILES['profileImage']['name'];
    $profileImageTmp = $_FILES['profileImage']['tmp_name'];

    // Move uploaded image to a location
    $uploadPath = 'Users/' . $profileImageName;
    move_uploaded_file($profileImageTmp, $uploadPath);

    // Create and execute SQL query to insert data into the database
    $sql = "INSERT INTO users (name, email, phoneNumber, address, city, password, image) VALUES ('$name', '$email', '$phoneNumber', '$address', '$city', '$password', '$uploadPath')";
    // You should use prepared statements to prevent SQL injection in a production environment
 // Execute the query
 if (mysqli_query($con, $sql)) {
  echo "<script>var registrationSuccess = true;</script>";
} else {
  echo "<script>var registrationSuccess = false;</script>";
  echo "<script>console.log('Error: " . mysqli_error($con) . "');</script>";
}

// Close the database connection
mysqli_close($con);
}
?>
 <script>
    if (typeof registrationSuccess !== 'undefined' && registrationSuccess) {
      alert("Registration successful!");
      window.location.href = "login.php";
    }
  </script>
</body>
</html>
