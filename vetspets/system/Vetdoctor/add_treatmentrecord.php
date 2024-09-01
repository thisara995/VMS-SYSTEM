
<?php
include('includes/header.php');
include('includes/config.php');
include('includes/sidebar.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pet Owner | Add Treatment Record</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
  <link href="assets/css/styles.css" rel="stylesheet" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>

  <div class="container-fluid px-4">
    <h1 class="mt-4">Vet Doctor | Add Treatment Record</h1>
    <br>

    <!-- ======= Appointment Section ======= -->
    <div class="container">
      <h3>Add Treatment Record</h3>
      <form action="" method="post" role="form" class="php-email-form" data-aos="fade-up" data-aos-delay="100"
        autofill="off">
        <div class="row">
        <div class="col-md-4 form-group">
            <label for="services" class="form-label">Appointment ID:</label>
            <select name="appointmentid" id="appointmentid" class="form-select" required>
              <option value="">-- Select Appointment --</option>
            </select>
          </div>
        <div class="col-md-4 form-group">
            <label for="doctor" class="form-label">Pet Owner:</label>
            <select name="animal" id="animal" class="form-select" required>
              <option value="">-- Select Pet Owner --</option>
             
            </select>
          </div>
          <div class="col-md-4 form-group">
            <label for="services" class="form-label">Animal:</label>
            <select name="service" id="service" class="form-select" required>
              <option value="">-- Select Animal --</option>
            </select>
          </div>

          <div class="col-md-4 form-group">
            <label for="services" class="form-label">Service:</label>
            <select name="service" id="service" class="form-select" required>
              <option value="">-- Select Service --</option>
            </select>
          </div> 
          <br>
          <div class="col-md-8 mb-4">
            <label for="reason_for_visit" class="form-label">Treatment Description:</label>
            <textarea id="reason" name="reason" class="form-control" rows="5" autocomplete="off" required></textarea>
          </div>

          <div class="text-left">
            <button type="submit" name="submit" class="btn btn-primary">Add Treatment Record</button>
          </div>
        </div>
      </form>
    </div>
    <!-- End Appointment Section -->
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

