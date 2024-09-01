<?php 
  session_start();
   include('includes/config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/Petownerlogin.css">
    <title>Admin-Login</title>
</head>
<body>
      <div class="container">
        <div class="box form-box">
            <?php 
             if(isset($_POST['submit'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            
            // Query to check if admin exists with the given username and password
            $sql = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
            $result = $con->query($sql);
            
            // Check if the query returned any rows
            if ($result->num_rows > 0) {
              // Admin login successful
              header("Location: Dashboard.php");
              // Perform any necessary actions or redirect to admin panel
            } else {
                echo "<script>alert('Invalid username or password!');</script>";
                // echo "<a href='login.php'><button>Go Back</button>";
            }
            
            // Close the database connection
            $con->close();
        }
            ?>
            
            <header>Admin | Login</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="email">Username</label>
                    <input type="text" name="username" id="username" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" required>
                </div>

                <div class="field">
                    
                    <input type="submit" class="btn" name="submit" value="Login" required>
                </div>
                <div class="links">
                </div>
            </form>
        </div>
      </div>
</body>
</html>