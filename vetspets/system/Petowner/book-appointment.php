
<?php
session_start();
include('includes/header.php');
include('includes/config.php');
include('includes/sidebar.php');

if (isset($_POST['submit'])) {
    $service = $_POST['service'];
    $specialization = $_POST['Doctorspecialization'];
    $animal = $_POST['animal'];
    $doctorid = $_POST['doctor'];
    $userid = $_SESSION['id'];
    $appdate = $_POST['appdate'];
    $time = $_POST['apptime'];
    $reason = $_POST['reason'];
    
    // Insert appointment data into the database
    $query = mysqli_query($con, "INSERT INTO appointment (service_name, doctorSpecialization, doctorId, userid, animalname, appointmentDate, appointmentTime, reason) VALUES ('$service', '$specialization', '$doctorid', '$userid', '$animal', '$appdate', '$time', '$reason')");
    
    if ($query) {
        echo "<script>alert('Your appointment successfully booked');</script>";
    } else {
        echo "<script>alert('Failed to book appointment');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pet Owner | Book Appointment</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
  <link href="assets/css/styles.css" rel="stylesheet" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script>
        $(document).ready(function() {
            $('#Doctorspecialization').on('change', function() {
                var specialization = $(this).val();
                $.ajax({
                    url: 'get_doctor.php',
                    type: 'POST',
                    data: {
                        specialization: specialization
                    },
                    success: function(response) {
                        $('#doctor').html(response);
                    }
                });
            });
        });
    </script>
</head>

<body>

  <?php include('includes/sidebar.php'); ?>

  <div class="container-fluid px-4">
    <h1 class="mt-4">Pet Owner | Book Appointment</h1>
    <br>

    <!-- ======= Appointment Section ======= -->
    <div class="container">
      <h3>Book Appointment</h3>
      <form action="" method="post" role="form" class="php-email-form" data-aos="fade-up" data-aos-delay="100"
        autofill="off">
        <div class="row">
        <div class="col-md-4 form-group">
            <label for="doctor" class="form-label">Animal:</label>
            <select name="animal" id="animal" class="form-select" required>
              <option value="">-- Select Animal --</option>
              <?php
               $email = $_SESSION['email'];
              $animalQuery = mysqli_query($con, "SELECT * FROM animal WHERE owner_email = '".$email."'");
              while ($animal = mysqli_fetch_assoc($animalQuery)) {
                echo "<option value='" . $animal['animalname'] . "'>" . $animal['animalname'] . "</option>";
              }
              ?>
            </select>
          </div>
          <div class="col-md-4 form-group">
            <label for="services" class="form-label">Services:</label>
            <select name="service" id="service" class="form-select" required>
              <option value="">-- Select Service --</option>
              <?php
              $serviceQuery = mysqli_query($con, "SELECT service_id, service_name FROM tblservices");
              while ($service = mysqli_fetch_assoc($serviceQuery)) {
                echo "<option value='" . $service['service_id'] . "'>" . $service['service_name'] . "</option>";
              }
              ?>
            </select>
          </div>

          <div class="col-md-4 form-group">
            <label for="Doctorspecialization" class="form-label">Doctor Specialization:</label>
            <select name="Doctorspecialization" id="Doctorspecialization" class="form-control" onChange="getdoctor(this.value);"required>
            <option value="">Select Specialization</option>
                                <?php $ret=mysqli_query($con,"select * from doctorspecilization");
                                while($row=mysqli_fetch_array($ret))
                                {
                                  ?>
                                <option value="<?php echo htmlentities($row['specilization']);?>">
                                  <?php echo htmlentities($row['specilization']);?>
                                </option>
                                <?php } ?>
                                </select>
          </div>

          <div class="col-md-4 form-group">
            <label for="DoctorName" class="form-label">Doctor Name:</label>
            <select name="doctor" id="doctor" class="form-control" required>
              <option value="">Select a doctor</option>
            </select>
          </div>

          <div class="col-md-4 mb-3">
            <label for="appointment_date" class="form-label">Appointment Date:</label>
            <input type="date" id="appdate" name="appdate" class="form-control" autocomplete="off" required>
          </div>

          <div class="col-md-4 mb-3">
            <label for="appointment_time" class="form-label">Appointment Time:</label>
            <input type="time" id="apptime" name="apptime" class="form-control" autocomplete="off" required>
          </div>

          <div class="col-md-8 mb-4">
            <label for="reason_for_visit" class="form-label">Reason for Visit:</label>
            <textarea id="reason" name="reason" class="form-control" rows="5" autocomplete="off" required></textarea>
          </div>

          <div class="text-left">
            <button type="submit" name="submit" class="btn btn-primary">Make an Appointment</button>
          </div>
        </div>
      </form>
    </div>
    <!-- End Appointment Section -->
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <?php
  include('includes/footer.php');
  include('includes/script.php');
  ?>
</body>

</html>
