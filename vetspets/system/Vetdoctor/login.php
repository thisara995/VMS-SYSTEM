
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/Petownerlogin.css">
    <title>Login</title>
</head>
<body>
      <div class="container">
        <div class="box form-box">
            
            <header> Vet Doctor | Login</header>
            <form action="Login_func.php" method="post">
                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="docemail" id="email" autocomplete="off" required>
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