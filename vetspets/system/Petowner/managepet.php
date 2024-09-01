<?php
session_start();
include('includes/header.php');
include('includes/config.php');

// Check if the user is logged in, if not redirect to login page
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit;
}
?>

<?php
if (isset($_GET['msg'])) {
    // Retrieve the 'msg' parameter value and decode it
    $message = urldecode($_GET['msg']);

    // Display the alert message
    echo "<script>alert('$message');</script>";
}
?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Pet Owner | Manage Pets</h1>
    <br>

    <div class="container">
        <h4>Manage Pets</h4>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <style>
                        .action-icons {
                            display: flex;
                            justify-content: space-between;
                            width: 100px; /* Adjust the width as needed */
                        }

                        .action-icons a {
                            margin-right: 10px; /* Adjust the margin as needed */
                        }
                    </style>
                    <tr>
                        <th>Animal Name</th>
                        <th>Animal Category</th>
                        <th>Animal Gender</th>
                        <th>Animal Age</th>
                        <th>Animal Weight</th>
                        <th>Animal Colour</th>
                        <th>Animal Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include('includes/config.php');
                    $email = $_SESSION['email'];
                    $query = "SELECT animalid, animalname, animaltype, animalgender, animalage, animalweight, animalcolour, image
                              FROM animal
                              WHERE owner_email = ?";
                    $stmt = $con->prepare($query);
                    $stmt->bind_param("s", $email);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    while ($row = $result->fetch_assoc()) {
                        echo '<tr>';
                        echo '<td>'.$row['animalname'].'</td>';
                        echo '<td>'.$row['animaltype'].'</td>';
                        echo '<td>'.$row['animalgender'].'</td>';
                        echo '<td>'.$row['animalage'].'</td>';
                        echo '<td>'.$row['animalweight'].'</td>';
                        echo '<td>'.$row['animalcolour'].'</td>';
                        echo '<td>';
                        echo '<img src="Petimage/'.$row['image'].'" alt="'.$row['animalname'].'" height="100" width="100">';
                        echo '</td>';
                        echo '<td>';
                        echo '<a href="edit_pet.php?id=' . $row['animalid'] . '"><i class="fas fa-edit" style="margin-right: 10px;"></i></a>';
                        echo '<a href="delete_pet.php?id=' .$row['animalid'] .'"><i class="fas fa-trash"></i></a>';
                        echo '</td>';
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
include('includes/footer.php');
include('includes/script.php');
?>
