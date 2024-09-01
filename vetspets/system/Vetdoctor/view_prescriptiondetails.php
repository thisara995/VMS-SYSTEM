<?php
include('includes/config.php');
include('includes/header.php');


// Retrieve prescription details from the database
$query = "SELECT * FROM prescription";
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) > 0) {
    // Display the table
    echo '<center><h2>Prescription Details</h2></center><br>
    <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Patient ID</th>
                    <th>Patient Name</th>
                    <th>Date</th>
                    <th>Medications</th>
                    <th>Vaccinations</th>
                    <th>Dosage</th>
                    <th>Frequency</th>
                    <th>Instructions</th>
                </tr>
            </thead>
            <tbody>';

    // Fetch and display each row of prescription details
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>
                <td>'.$row['id'].'</td>
                <td>'.$row['patient_id'].'</td>
                <td>'.$row['patient_name'].'</td>
                <td>'.$row['date'].'</td>
                <td>'.$row['medications'].'</td>
                <td>'.$row['vaccinations'].'</td>
                <td>'.$row['dosage'].'</td>
                <td>'.$row['frequency'].'</td>
                <td>'.$row['instructions'].'</td>
            </tr>';
    }

    echo '</tbody>
        </table>';
} else {
    echo 'No prescription details found.';
}

// Close the database connection
mysqli_close($con);
?>

<?php
include('includes/footer.php');
include('includes/script.php');

?>
