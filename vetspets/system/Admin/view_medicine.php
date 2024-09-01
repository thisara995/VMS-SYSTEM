<?php
include('includes/config.php');
include('includes/header.php');



// Execute the query to retrieve medicine details
$sql = "SELECT * FROM medicine";
$result = $con->query($sql);

?>

<!DOCTYPE html>
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
     <center><h1>Medicine</h1></center>
    <table>
        <tr>
            <th>ID</th>
            <th>Medicine Name</th>
            <th>Category</th>
            <th>Manufacturer</th>
            <th>Quantity</th>
            <th>Expiry Date</th>
            <th>Price</th>
        </tr>

        <?php
        // Check if there are any rows returned
        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                ?>
                <tr>
                    <td><?php echo $row["medicine_id"]; ?></td>
                    <td><?php echo $row["medicine_name"]; ?></td>
                    <td><?php echo $row["category"]; ?></td>
                    <td><?php echo $row["manufacturer"]; ?></td>
                    <td><?php echo $row["quantity"]; ?></td>
                    <td><?php echo $row["expiry_date"]; ?></td>
                    <td><?php echo $row["price"]; ?></td>
                </tr>
                <?php
            }
        } else {
            echo "<tr><td colspan='7'>No medicines found.</td></tr>";
        }
        ?>
    </table>
</body>
</html>

<?php

// Close the connection
$con->close();
?>

<?php
include('includes/footer.php');
include('includes/script.php');

?>