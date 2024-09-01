<?php
session_start();
include "includes/config.php";
include('includes/header.php');
include('includes/sidebar.php');

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
     <h1 class="mt-4">Welcome <?php echo $Name ?> | Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Pet Owner | Dashboard</li>
     </ol>
 <div class="row">
    <div class="col-xl-3 col-md-6">
    <div class="card bg-primary text-white mb-4">
        <div class="card-body">
            <i class="fa-solid fa-circle-user"></i>
            <span class="ml-2">&nbsp;My Profile</span>
        </div>
        <div class="card-footer d-flex align-items-center justify-content-between">
            <a class="small text-white stretched-link" href="profile.php">View Details</a>
        </div>
    </div>
</div>


<div class="col-xl-3 col-md-6">
    <div class="card bg-primary text-white mb-4">
        <div class="card-body">
            <i class="fa-solid fa-paw"></i>
            <span class="ml-2">&nbsp;My Pets <?php include('number_of_pets.php') ?></span>
        </div>
        <div class="card-footer d-flex align-items-center justify-content-between">
            <a class="small text-white stretched-link" href="#">View Details</a>
        </div>
    </div>
</div>

<div class="col-xl-3 col-md-6">
    <div class="card bg-primary text-white mb-4">
        <div class="card-body">
             <i class="fas fa-calendar-alt fa"></i>
            <span class="ml-2">&nbsp;My Appointments  <?php include('number_of_ownerappointments.php') ?></span>
        </div>
        <div class="card-footer d-flex align-items-center justify-content-between">
            <a class="small text-white stretched-link" href="view-appointment.php">View Details</a>
        </div>
    </div>
</div>


                          
<div class="col-xl-3 col-md-6">
    <div class="card bg-primary text-white mb-4">
        <div class="card-body">
            <i class="fas fa-calendar-alt fa"></i>
            <span class="ml-2">&nbsp;Approved appoinments <?php include('approved_appointments.php') ?> </span>
        </div>
        <div class="card-footer d-flex align-items-center justify-content-between">
            <a class="small text-white stretched-link" href="view_approved_appointments.php">View Details</a>
        </div>
    </div>
</div>
<?php
include('includes/footer.php');
include('includes/script.php');

?>