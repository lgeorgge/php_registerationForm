
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>
<body>
    <form action="loginPage.php" method="post">
        <button type="submit" name="login">Login</button>
        <button type="submit" name="register">Register</button>
    </form>
</body>
</html>



<?php

if(isset($_POST['login'])){
    header("Location: loginPage.php");
    
}

if(isset($_POST['register'])){
    header("Location: index.php");
}




?>
