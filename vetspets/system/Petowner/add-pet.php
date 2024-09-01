<?php
session_start();
include('includes/header.php');
include('includes/config.php');

if(isset($_POST['submit']))
{
    $animalname = $_POST['animalname'];
    $animaltype = $_POST['category'];
    $animalgender = $_POST['gender'];
    $animalage = $_POST['animalage'];
    $animalweight = $_POST['animalweight'];
    $animalcolour = $_POST['animalcolour'];
    $user_email = $_SESSION['email'];

    // Image Upload
    $img_name = $_FILES['image']['name'];
    $img_tmp_name = $_FILES['image']['tmp_name'];
    $petimage_folder = 'Petimage/'.  $img_name;

    $insert = "INSERT INTO animal (animalname, animaltype, animalgender, animalage, animalweight, animalcolour, owner_email, image)
                                 VALUES ('$animalname', '$animaltype', '$animalgender', '$animalage', '$animalweight', '$animalcolour', '$user_email', '$img_name')";
    $upload = mysqli_query($con,$insert);
    if($upload){
        move_uploaded_file($img_tmp_name,$petimage_folder);
        echo "<script>alert('Successfully Added. Your Pet Information');</script>";
    } else {
        echo "<script>window.location='Dashboard.php';</script>";
    }
}
?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Pet Owner | Add Pet</h1>
    <br>
    <div class="container">
        <h4>Add Pet</h4>
        <form action="" method="post" role="form" class="php-email-form" data-aos="fade-up" data-aos-delay="100" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-3 mb-2">
                    <label for="animalname" class="form-label">Animal Name:</label>
                    <input type="text" id="animalname" name="animalname" class="form-control" autocomplete="off" required>
                </div>

                <div class="col-md-3 form-group">
                    <label for="category" class="form-label">Animal Category:</label>
                    <select name="category" id="category" class="form-select" required>
                        <option value="">--Select Category--</option>
                        <option value="Dog">Dog</option>
                        <option value="Cat">Cat</option>
                        <option value="Rabbit">Rabbit</option>
                        <option value="Cow">Cow</option>
                    </select>
                </div>

                <div class="col-md-3 form-group">
                    <label for="gender" class="form-label">Animal Gender:</label>
                    <select name="gender" id="gender" class="form-select" required>
                        <option value="">--Select Gender--</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3 form-group">
                    <label for="animalweight" class="form-label">Animal Weight:</label>
                    <input type="number" id="animalweight" name="animalweight" class="form-control" autocomplete="off" required>
                </div>

                <div class="col-md-3 form-group">
                    <label for="animalage" class="form-label">Animal Age:</label>
                    <input type="number" id="animalage" name="animalage" class="form-control" autocomplete="off" required>
                </div>

                <div class="col-md-3 form-group">
                    <label for="animalcolour" class="form-label">Animal Colour:</label>
                    <input type="text" id="animalcolour" name="animalcolour" class="form-control" autocomplete="off" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3 mb-2">
                    <label for="image" class="form-label">Animal Image:</label>
                    <input type="file" class="form-control-file" name="image" id="image" accept="image/png, image/jpeg, image/jpg" required><br>
                </div>
            </div>

            <br>
            <div class="text-left"><button type="submit" name="submit" class="btn btn-primary">Add Pet</button></div>
        </form>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<?php
include('includes/footer.php');
include('includes/script.php');
?>
