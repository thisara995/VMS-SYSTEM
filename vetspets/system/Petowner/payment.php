<?php
include('includes/header.php');
include('includes/config.php');

if (isset($_POST['submit'])) 
{
  $service = $_POST['service'];
  $price = $_POST['price'];
  $animalname = $_POST['animalname'];
  $cateogry = $_POST['category'];
  $appointmentdate = $_POST['appointmentDate'];
  $appointmenttime = $_POST['appointmentTime'];
  $reason = $_POST['reason'];

  $query = mysqli_query($con, "INSERT INTO appointment (service,price,animalname,category, appointmentDate, appointmentTime, reason) VALUES ('".$service."', '".$price."','".$animalname."', '". $cateogry."','". $appointmentdate."', '".$appointmenttime."', '".$reason."')");

  if($query)
  {
    echo "<script>alert('Your appointment successfully booked');</script>";
    // header('location:user-login.php');
  }
}

?>
<div class="container-fluid px-4">
     <h1 class="mt-4">Pet Owner | Payment</h1>
	 <br>
	

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="assets/css/styles.css" rel="stylesheet" />
</head>
<body>

<?php include('includes/sidebar.php');?>
 <!-- ======= Appointment Section ======= -->

<div class="container">
  <h3>Payment</h3>
    <form id="multiStepForm">
      <div id="step1">
        <h4>Step 1: Payment Information</h4>
        <br>
        <div class="form-group col-md-6">
          <label for="paymentMethod">Payment Method:</label>
          <select class="form-control" id="paymentMethod">
            <option value="">Select payment method</option>
            <option value="creditCard">Credit Card</option>
            <option value="debitCard">Debit Card</option>
            <option value="paypal">PayPal</option>
            <option value="bankTransfer">Bank Transfer</option>
          </select>
        </div>
        <div class="form-group col-md-6">
          <label for="cardNumber">Card Number:</label>
          <input type="text" class="form-control" id="cardNumber" placeholder="Enter card number">
        </div>

        <div class="form-group col-md-6">
          <label for="cardNumber">Amount</label>
          <input type="text" class="form-control" id="cardNumber" placeholder="Enter the amount">
        </div>
        <br>
        <button type="button" class="btn btn-primary next"style="margin-left: 10px;">Next</button>
      </div>
      <div id="step3" style="display: none;">
        <h4>Step 2: Confirmation</h4>
        <br>
        <p>Thank you for submitting the form!</p>
        <br>
        <button type="button" class="btn btn-primary prev">Previous</button>
        <a href="success.php" class="btn btn-success" style="margin-left: 10px;">Submit</a>
      </div>
    </form>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
      // Next button
      $(".next").click(function() {
        var currentStep = $(this).closest("div[id^='step']");
        var nextStep = currentStep.next();

        currentStep.hide();
        nextStep.show();
      });

      // Previous button
      $(".prev").click(function() {
        var currentStep = $(this).closest("div[id^='step']");
        var prevStep = currentStep.prev();

        currentStep.hide();
        prevStep.show();
      });
    });
  </script>

  <!-- End Appointment Section -->
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
