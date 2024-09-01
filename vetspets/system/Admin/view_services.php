<?php
include('includes/config.php');
include('includes/header.php');


// Retrieve prescription details from the database
$query = "SELECT * FROM tblservices";
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) > 0) {
    // Display the table
    echo '<center><h2>Services Details</h2></center><br>
    <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Service</th>
                    <th>Price</th>
                    <th>Creation Date</th>
                </tr>
            </thead>
            <tbody>';

    // Fetch and display each row of data
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>
                <td>'.$row['id'].'</td>
                <td>'.$row['service'].'</td>
                <td>'.$row['price'].'</td>
                <td>'.$row['creationDate'].'</td>
            </tr>';
    }

    echo '</tbody>
        </table>';
} else {
    echo 'No treatment details found.';
}

// Close the database connection
mysqli_close($con);
?>

<?php
include('includes/footer.php');
include('includes/script.php');

?>