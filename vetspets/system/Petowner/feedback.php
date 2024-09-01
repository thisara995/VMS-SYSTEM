<?php
session_start();
include('includes/header.php');
include('includes/config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $satisfaction = $_POST['satisfaction'];
    $feedback = $_POST['feedback'];

    // Prepare and execute an SQL INSERT query
    $stmt = $con->prepare("INSERT INTO feedback (name, email, satisfaction, feedback) VALUES (?, ?, ?, ?)");
    $stmt->bind_param('ssss', $name, $email, $satisfaction, $feedback);

    if ($stmt->execute()) {
       echo '<div style="background-color: green; color: white; padding: 10px;">Form submitted successfully.</div>';

    } else {
        echo "Form submission failed: " . $stmt->error;
    }

    // Close the statement and the connection
    $stmt->close();
    $con->close();
}
?>

<div class="container-fluid px-4">
     <h1 class="mt-4">Pet Owner | Feedback</h1>
	 <br>
	

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="assets/css/styles.css" rel="stylesheet" />
</head>
<body>

<?php include('includes/sidebar.php');?>


<div class="container">
  <h3>Feedback</h3>
  <form method="POST">
      <div class="form-group col-md-6">
        <label for="name">Name:</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
      </div>
      <div class="form-group col-md-6">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email address">
      </div>

      <div class="form-group col-md-6">
        <label for="satisfaction">Service Satisfaction:</label>
        <select class="form-control" id="satisfaction" name="satisfaction">
          <option value="">Select satisfaction level</option>
          <option value="excellent">Excellent</option>
          <option value="good">Good</option>
          <option value="fair">Fair</option>
          <option value="poor">Poor</option>
        </select>
      </div>
      <div class="form-group col-md-6">
        <label for="feedback">Feedback:</label>
        <textarea class="form-control" id="feedback" rows="4" name="feedback" placeholder="Enter your feedback"></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</section>
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
