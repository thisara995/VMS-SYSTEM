<?php
include('includes/config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $specialization = $_POST['specialization'];

    // Prepare and execute an SQL SELECT query to retrieve doctors based on specialization
    $query = mysqli_query($con, "SELECT id, doctorName FROM doctors WHERE specilization = '$specialization'");
    
    // Generate the options for doctors based on query results
    if ($query && mysqli_num_rows($query) > 0) {
        while ($row = mysqli_fetch_assoc($query)) {
            $doctorId = $row['id'];
            $doctorName = $row['doctorName'];
            echo "<option value='$doctorId'>$doctorName</option>";
        }
    } else {
        echo "<option value=''>No doctors available for this specialization</option>";
    }
}
?>
