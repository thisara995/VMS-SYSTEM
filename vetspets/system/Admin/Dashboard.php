<?php
include('includes/header.php');
include('includes/sidebar.php');
?>
<div class="container-fluid px-4">
     <h1 class="mt-4">Admin | Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Admin | Dashboard</li>
     </ol>
 <div class="row">
 <div class="col-xl-3 col-md-6">
    <div class="card bg-primary text-white mb-4">
        <div class="card-body">
            <i class="fas fa-user-md"></i>
            <span class="ml-2">&nbsp;Doctors  <?php include('number_of_doctors.php') ?></span>
        </div>
        <div class="card-footer d-flex align-items-center justify-content-between">
            <a class="small text-white stretched-link" href="#">View Details</a>
        </div>
    </div>
</div>

<div class="col-xl-3 col-md-6">
    <div class="card bg-primary text-white mb-4">
        <div class="card-body">
        <i class="fa-solid fa-user"></i>
            <span class="ml-2">&nbsp;Pet Owners  <?php include('number_of_petowners.php') ?></span>
        </div>
        <div class="card-footer d-flex align-items-center justify-content-between">
            <a class="small text-white stretched-link" href="#">View Details</a>
        </div>
    </div>
</div>


    <div class="col-xl-3 col-md-6">
    <div class="card bg-primary text-white mb-4">
        <div class="card-body">
            <i class="fa-solid fa-paw"></i>
            <span class="ml-2">&nbsp;Animals  <?php include('number_of_pets.php') ?></span>
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
            <span class="ml-2">&nbsp; Appointments  <?php include('number_of_appoinments.php') ?></span>
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
            <span class="ml-2">&nbsp;Medicines <?php include('number_of_medicines.php') ?></span>
        </div>
        <div class="card-footer d-flex align-items-center justify-content-between">
            <a class="small text-white stretched-link" href="#">View Details</a>
        </div>
    </div>
</div>


   <!-- <div class="col-xl-3 col-md-6">
    <div class="card bg-primary text-white mb-4">
        <div class="card-body">
            <i class="fa-regular fa-money-bill-1"></i> 
            <span class="ml-2">&nbsp;Income</span>
        </div>
        <div class="card-footer d-flex align-items-center justify-content-between">
            <a class="small text-white stretched-link" href="#">View Details</a>
        </div>
    </div>
</div> -->



<!-- <div class="col-xl-3 col-md-6">
    <div class="card bg-primary text-white mb-4">
        <div class="card-body">
            <i class="fa-solid fa-envelope"></i> 
            <span class="ml-2">&nbsp;Messages</span>
        </div>
        <div class="card-footer d-flex align-items-center justify-content-between">
            <a class="small text-white stretched-link" href="#">View Details</a>
        </div>
    </div>
</div> -->
       
<div class="col-xl-3 col-md-6">
    <div class="card bg-primary text-white mb-4">
        <div class="card-body">
            <i class="fa-solid fa-comments"></i> 
            <span class="ml-2">&nbsp;Feedbacks <?php include('number_of_feedbacks.php') ?></span>
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
            <span class="ml-2">&nbsp;Prescriptions <?php include('number_of_prescriptions.php') ?></span>
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