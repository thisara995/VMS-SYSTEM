<?php
session_start();
include('includes/header.php');
include('includes/sidebar.php');

if (!isset($_SESSION["docEmail"])) {
    // Redirect to the login page or any other appropriate action
    echo '<script>window.location.href = "login.php";</script>';
    exit;
}
?>
<div class="container-fluid px-4">
     <h1 class="mt-4">Vet Doctor | Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Vet Doctor | Dashboard</li>
     </ol>

     <div class="row">
 <div class="col-xl-3 col-md-6">
    <div class="card bg-primary text-white mb-4">
        <div class="card-body">
            <i class="fa-solid fa-circle-user"></i>
            <span class="ml-2">&nbsp;My Profile</span>
        </div>
        <div class="card-footer d-flex align-items-center justify-content-between">
            <a class="small text-white stretched-link" href="doctor_profile.php">View Details</a>
        </div>
    </div>
</div>

<div class="col-xl-3 col-md-6">
    <div class="card bg-primary text-white mb-4">
        <div class="card-body">
        <i class="fas fa-calendar-alt fa"></i>
            <span class="ml-2">&nbsp;Appointments <?php include('doc_appointments.php') ?></span>
        </div>
        <div class="card-footer d-flex align-items-center justify-content-between">
            <a class="small text-white stretched-link" href="appointments.php">View Details</a>
        </div >
    </div>
</div>


    <div class="col-xl-3 col-md-6">
    <div class="card bg-primary text-white mb-4">
        <div class="card-body">
            <i class="fa-solid fa-paw"></i>
            <span class="ml-2">&nbsp;patients <?php include('doc_patients.php') ?></span>
        </div>
        <div class="card-footer d-flex align-items-center justify-content-between">
            <a class="small text-white stretched-link" href="#">View Details</a>
        </div>
    </div>
</div>
          
    <div class="col-xl-3 col-md-6">
    <div class="card bg-primary text-white mb-4">
        <div class="card-body">
            <i class="fa-solid fa-notes-medical"></i>
            <span class="ml-2">&nbsp;Medical History</span>
        </div>
        <div class="card-footer d-flex align-items-center justify-content-between">
            <a class="small text-white stretched-link" href="#">View Details</a>
        </div>
    </div>
</div>

                          
   <div class="col-xl-3 col-md-6">
    <div class="card bg-primary text-white mb-4">
        <div class="card-body">
            <i class="fa fa-medkit"></i>
            <span class="ml-2">&nbsp;Medicines</span>
        </div>
        <div class="card-footer d-flex align-items-center justify-content-between">
            <a class="small text-white stretched-link" href="#">View Details</a>
        </div>
    </div>
</div>

<div class="col-xl-3 col-md-6">
    <div class="card bg-primary text-white mb-4">
        <div class="card-body">
            <i class="fa-solid fa-file-prescription"></i>
            <span class="ml-2">&nbsp;Prescriptions</span>
        </div>
        <div class="card-footer d-flex align-items-center justify-content-between">
            <a class="small text-white stretched-link" href="#">View Details</a>
        </div>
    </div>
</div> 


<div class="col-xl-3 col-md-6">
    <div class="card bg-primary text-white mb-4">
        <div class="card-body">
        <i class="fa-solid fa-kit-medical"></i>
            <span class="ml-2">&nbsp;Treatments</span>
        </div>
        <div class="card-footer d-flex align-items-center justify-content-between">
            <a class="small text-white stretched-link" href="#">View Details</a>
        </div>
    </div>
</div>
       
<div class="col-xl-3 col-md-6">
    <div class="card bg-primary text-white mb-4">
        <div class="card-body">
        <i class="fa-regular fa-money-bill-1"></i>
            <span class="ml-2">&nbsp;Income</span>
        </div>
        <div class="card-footer d-flex align-items-center justify-content-between">
            <a class="small text-white stretched-link" href="#">View Details</a>
        </div>
    </div>
</div>





<?php
include('includes/footer.php');
include('includes/script.php');

?>