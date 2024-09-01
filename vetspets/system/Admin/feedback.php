<?php
include('includes/config.php');
include('includes/header.php');



// Execute the query to retrieve feedback details
$sql = "SELECT * FROM feedback";
$result = $con->query($sql);

// Check if there are any rows returned
if ($result->num_rows > 0) {
    ?>

    <html>
    <head>
        <style>
            table {
                border-collapse: collapse;
                width: 100%;
            }
            th, td {
                padding: 8px;
                text-align: left;
                border-bottom: 1px solid #ddd;
            }
            th {
                background-color: #f2f2f2;
            }
        </style>
    </head>
    <body>
        <center><h1>Reviews</h1></center>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Satisfaction</th>
                <th>Feedback</th>
            </tr>

            <?php
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                ?>
                <tr>
                    <td><?php echo $row["id"]; ?></td>
                    <td><?php echo $row["name"]; ?></td>
                    <td><?php echo $row["email"]; ?></td>
                    <td><?php echo $row["satisfaction"]; ?></td>
                    <td><?php echo $row["feedback"]; ?></td>
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
    </html>

    <?php
} else {
    echo "No feedback records found.";
}

// Close the connection
$con->close();
?>

<?php
include('includes/footer.php');
include('includes/script.php');

?>
