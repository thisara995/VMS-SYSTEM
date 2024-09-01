<?php
include('includes/config.php');

if (isset($_GET["id"]) && !empty($_GET["id"])) {
    $id = $_GET["id"];
    $sql = "DELETE FROM `animal` WHERE id = $id";
    $result = mysqli_query($con, $sql);

    if ($result) {
        $message = "Data deleted successfully";
        header("Location: managepet.php?msg=" . urlencode($message));
        exit; // Important to prevent further execution of the script after redirection.
    } else {
        echo "Failed: " . mysqli_error($con);
    }
} else {
    echo "Invalid ID provided.";
}
?>
