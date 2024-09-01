<?php
session_start();
include('includes/header.php');
include('includes/config.php');

// Check if the user is logged in, if not redirect to login page
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit;
}

// Check if the pet ID is provided in the URL
if (isset($_GET['id'])) {
    $pet_id = $_GET['id'];

    // Retrieve pet information based on the pet ID and owner's email
    $email = $_SESSION['email'];
    $query = "SELECT animal, animalname, animaltype, animalgender, animalage, animalweight, animalcolour, image
              FROM animal
              WHERE id = ? AND owner_email = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param("ss", $pet_id, $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $pet = $result->fetch_assoc();

    // Check if the pet exists and belongs to the owner
    if (!$pet) {
        echo "Pet not found.";
        exit;
    }

    // Handle the form submission for updating pet information
    if (isset($_POST['update_pet'])) {
        $animalname = $_POST['animalname'];
        $animaltype = $_POST['animaltype'];
        $animalgender = $_POST['animalgender'];
        $animalage = $_POST['animalage'];
        $animalweight = $_POST['animalweight'];
        $animalcolour = $_POST['animalcolour'];

        // Update the pet information in the database
        $update_query = "UPDATE animal
                         SET animalname = ?, animaltype = ?, animalgender = ?, animalage = ?, animalweight = ?, animalcolour = ?
                         WHERE id = ?";
        $update_stmt = $con->prepare($update_query);
        $update_stmt->bind_param("ssssssi", $animalname, $animaltype, $animalgender, $animalage, $animalweight, $animalcolour, $pet_id);

        if ($update_stmt->execute()) {
            // Check if a new image file is uploaded
            if (!empty($_FILES['image']['name'])) {
                $animal_image = $_FILES['image']['name'];
                $animal_image_tmp_name = $_FILES['image']['tmp_name'];
                $animal_image_folder = 'Petimage/' . $animal_image;

                // Upload the image file
                if (move_uploaded_file($animal_image_tmp_name, $animal_image_folder)) {
                    // Update the image field in the database
                    $update_image_query = "UPDATE animal
                                           SET image = ?
                                           WHERE id = ?";
                    $update_image_stmt = $con->prepare($update_image_query);
                    $update_image_stmt->bind_param("si", $animal_image, $pet_id);

                    if ($update_image_stmt->execute()) {
                        echo "Pet information and image updated successfully!";
                    } else {
                        echo "Error updating pet image: " . $con->error;
                    }
                } else {
                    echo "Error uploading the image file.";
                }
            } else {
                echo "Pet information updated successfully!";
            }
        } else {
            echo "Error updating pet information: " . $con->error;
        }
    }
} else {
    echo "Pet ID not provided.";
    exit;
}
?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Pet Owner | Edit Pet</h1>
    <br>

    <div class="container">
        <h4>Edit Pet Information</h4>
        <form method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="animalname" class="form-label">Animal Name</label>
                <input type="text" class="form-control" id="animalname" name="animalname" value="<?php echo $pet['animalname']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="animaltype" class="form-label">Animal Category</label>
                <input type="text" class="form-control" id="animaltype" name="animaltype" value="<?php echo $pet['animaltype']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="animalgender" class="form-label">Animal Gender</label>
                <input type="text" class="form-control" id="animalgender" name="animalgender" value="<?php echo $pet['animalgender']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="animalage" class="form-label">Animal Age</label>
                <input type="text" class="form-control" id="animalage" name="animalage" value="<?php echo $pet['animalage']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="animalweight" class="form-label">Animal Weight</label>
                <input type="text" class="form-control" id="animalweight" name="animalweight" value="<?php echo $pet['animalweight']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="animalcolour" class="form-label">Animal Colour</label>
                <input type="text" class="form-control" id="animalcolour" name="animalcolour" value="<?php echo $pet['animalcolour']; ?>" required>
            </div>
            <div class="md-3 ">
                <label for="image" class="form-label">Animal Image:</label>
                <input type="file" class="form-control-file" name="image" id="image" accept="image/png, image/jpeg, image/jpg" required><br>
            </div>
            <button type="submit" name="update_pet" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>

<?php
include('includes/footer.php');
include('includes/script.php');
?>
