<?php 
session_start(); 
include "includes/config.php";

if (isset($_POST['docemail']) && isset($_POST['password'])) {

    function validate($data){

       $data = trim($data);

       $data = stripslashes($data);

       $data = htmlspecialchars($data);

       return $data;

    }

    $email = validate($_POST['docemail']);

    $pass = validate($_POST['password']);

    if (empty($email)) {

        header("Location: login.php?error=User Name is required");

        exit();

    }else if(empty($pass)){

        header("Location: login.php?error=Password is required");

        exit();

    }else{

        $sql = "SELECT * FROM doctors WHERE docEmail='$email' AND password='$pass'";

        $result = mysqli_query($con, $sql);

        if (mysqli_num_rows($result) === 1) {

            $row = mysqli_fetch_assoc($result);

            if ($row['docEmail'] === $email && $row['password'] === $pass) {

                echo "Logged in!";

                $_SESSION['docEmail'] = $row['docEmail'];

                $_SESSION['doctorName'] = $row['doctorName'];

                $_SESSION['id'] = $row['id'];

                header("Location: Dashboard.php");

                exit();

            }else{

                header("Location: login.php?error=Incorect User name or password");

                exit();

            }

        }else{

            header("Location: login.php?error=Incorect User name or password");

            exit();

        }

    }

}else{

    header("Location: login.php");

    exit();

}
?>