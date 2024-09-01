<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/Petownerlogin.css">
    <title>Register</title>
</head>
<body>
      <div class="container">
        <div class="box form-box">

        <?php 
         
         include('includes/config.php');
         if(isset($_POST['submit'])){

            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phonenumber'];
            $address = $_POST['address'];
            $city = $_POST['city'];
            $password = $_POST['password'];
            

         //verifying the unique email

         $verify_query = mysqli_query($con,"SELECT email FROM users WHERE email='$email'");

         if(mysqli_num_rows($verify_query) !=0 ){
            echo "<div class='message'>
                      <p>This email is used, Try another One Please!</p>
                  </div> <br>";
            echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
         }
         else{

            // mysqli_query($con,"INSERT INTO users(name,email,phonenumber,address,city,password) VALUES ('$name','$email','$phonenumber','$address','$city','$password')") or die("Erroe Occured");
            $query=mysqli_query($con,"insert into users(name,email,phonenumber,address,city,password) values('$name','$email','$phone','$address','$city','$password')") or die("Erroe Occured");
          
            echo "<div class='message'>
                      <p>Registration successfully!</p>
                  </div> <br>";
            echo "<a href='login.php'><button class='btn'>Login Now</button>";
         

         }

         }else{
         
        ?>

            <header>Pet Owner | Sign Up</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="phonenumber">Phone Number</label>
                    <input type="text" name="phonenumber" id="phonenumber" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="address">Address</label>
                    <input type="textarea" name="address" id="address" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="city">City</label>
                    <input type="text" name="city" id="city" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="conpassword"> Confirm Password</label>
                    <input type="password" name="confirmPassword" id="confirmPassword" autocomplete="off" required>
                </div>

                <div class="field">
                    
                    <input type="submit" class="btn" name="submit" value="Register" required>
                </div>
                <div class="links">
                    Already a member? <a href="login.php">Sign In</a>
                </div>
            </form>
        </div>
        <?php } ?>
      </div>
</body>
</html>