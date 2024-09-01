<?php
include('includes/header.php');
?>
<div class="container-fluid px-4">
     <h1 class="mt-4">Pet Owner | Change Password</h1>
	 <br>
	

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="assets/css/styles.css" rel="stylesheet" />
</head>
<body>
<?php include('includes/sidebar.php');?>
<html>
<head>
  <title>Pet Owner Change Password</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <h5>Pet Owner Change Password</h5>
    <br>
    <form>
      <div class="form-group col-md-6">
        <label for="currentPassword">Current Password:</label>
        <input type="password" class="form-control" id="currentPassword" placeholder="Enter current password" required>
      </div>
      <div class="form-group col-md-6">
        <label for="newPassword">New Password:</label>
        <input type="password" class="form-control" id="newPassword" placeholder="Enter new password" required>
      </div>
      <div class="form-group col-md-6">
        <label for="confirmPassword">Confirm Password:</label>
        <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm new password" required>
      </div>
      &nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-primary">Change Password</button>
    </form>
  </div>

  <!-- Include Bootstrap JS -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
			
<?php
include('includes/footer.php');
include('includes/script.php');

?>