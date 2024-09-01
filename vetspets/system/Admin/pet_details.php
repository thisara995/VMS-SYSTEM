<?php
// Assuming you have established a database connection
include('includes/config.php');
include('includes/header.php');

// Retrieve customer details from the database
$query = "SELECT * FROM animal";
$result = mysqli_query($con, $query);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Patient Details</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
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
    <h2>Patient  Details</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Animal Name</th>
            <th>Animal Type</th>
            <th>Animal Gender</th>
            <th>Animal Age</th>
            <th>Animal Weight</th>
            <th>Animal Colour</th>
         
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                  <td><?php echo $row['animalid']; ?></td>
                <td><?php echo $row['animalname']; ?></td>
                <td><?php echo $row['animaltype']; ?></td>
                <td><?php echo $row['animalgender']; ?></td>
                <td><?php echo $row['animalage']; ?></td>
                <td><?php echo $row['animalweight']; ?></td>
                <td><?php echo $row['animalcolour']; ?></td>
              
            </tr>
        <?php } ?>
    </table>

</body>
</html>
<?php
include('includes/footer.php');
include('includes/script.php');

?>