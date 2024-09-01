<?php
include('includes/config.php');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id = $_POST['id'];
  $doctorName = $_POST['doctorName'];
  $specialization = $_POST['specialization'];
  $address = $_POST['address'];
  $contactno = $_POST['contactno'];
  $docEmail = $_POST['docEmail'];
  $docFees = $_POST['docFees'];

  // Update the doctor's information in the database
  $query = "UPDATE doctors SET doctorName=?, specilization=?, address=?, contactno=?, docEmail=?, docFees=? WHERE id=?";
  $stmt = mysqli_prepare($con, $query);
  mysqli_stmt_bind_param($stmt, 'ssssssi', $doctorName, $specialization, $address, $contactno, $docEmail, $docFees, $id);
  mysqli_stmt_execute($stmt);

  if (mysqli_stmt_affected_rows($stmt) === -1) {
    // Error occurred while updating
    echo "Error: Failed to update the doctor's information. " . mysqli_error($con);
  } else {
    // Successful update
    echo "Doctor's information updated successfully.";
    echo '<script>window.location.href = "manage_doctors.php";</script>';
  }

  mysqli_stmt_close($stmt);
  mysqli_close($con);
}

// Retrieve the doctor's information based on the provided ID
$id = $_GET['id'];
$query = "SELECT * FROM doctors WHERE id=$id";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
?>
<style type="text/css">
  

.container {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
}

.centered-form {
  width: 400px;
  padding: 20px;
  border: 1px solid #ccc;
  border-radius: 5px;
  background-color: #fff;
}

.centered-form h2 {
  text-align: center;
  margin-bottom: 20px;
}

.centered-form .form-group label {
  font-weight: bold;
}

.centered-form button[type="submit"] {
  margin-top: 20px;
}


</style>

<!-- Display the edit form -->
<div class="container">
  <div class="centered-form">
    <h2>Edit Doctor Information</h2>
    <form action="" method="post">
      <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

      <div class="form-group">
        <label for="doctorName">Doctor Name:</label>
        <input type="text" class="form-control" name="doctorName" value="<?php echo $row['doctorName']; ?>">
      </div>

      <div class="form-group">
        <label for="specialization">Specialization:</label>
        <input type="text" class="form-control" name="specialization" value="<?php echo $row['specilization']; ?>">
      </div>

      <div class="form-group">
        <label for="address">Address:</label>
        <input type="text" class="form-control" name="address" value="<?php echo $row['address']; ?>">
      </div>

      <div class="form-group">
        <label for="contactno">Contact Number:</label>
        <input type="text" class="form-control" name="contactno" value="<?php echo $row['contactno']; ?>">
      </div>

      <div class="form-group">
        <label for="docEmail">Email:</label>
        <input type="text" class="form-control" name="docEmail" value="<?php echo $row['docEmail']; ?>">
      </div>

      <div class="form-group">
        <label for="docFees">Fees:</label>
        <input type="text" class="form-control" name="docFees" value="<?php echo $row['docFees']; ?>">
      </div>

      <button type="submit" class="btn btn-primary">Update</button>
    </form>
  </div>
</div>


