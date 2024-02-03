<?php
    include 'connect.php';
    if(isset($_POST['login'])){
        $email = $_POST['email'];
        $pswd = $_POST['pswd'];

        $sql = "SELECT * FROM `users`";
        $result = $connection->query($sql);

        if($result){
            while($row = $result->fetch_assoc()){
                if($row['Email_Id']==$email and $row['Password']==$pswd){
                    $s = "INSERT INTO `login` VALUES('".$email."','".$pswd."')";
                    $r = $connection->query($s);
                    if($r){
                        header('location: home.html');
                    }
                }
            }
        }
        echo "<script type='text/JavaScript'>alert('No such user found!')</script>";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <script src="https://kit.fontawesome.com/c8ffd88059.js" crossorigin="anonymous"></script>
    <title>Login</title>
</head>
<body>
    <img id="logo" src="ShareMeals_logo.jpeg" alt="LOGO">
    <form method="post">
        <div id="body">
            <div id="info">
            <h1>Log In</h1>
            <big>Email ID</big>
            <input id="email" type="email" name="email" placeholder="Enter E-Mail">
            <i class="fa-sharp fa-solid fa-envelope"></i>
            <br>

            <big id="pswd">Password</big>
            <input id="password" type="password" name="pswd" placeholder="Enter password">
            <span id="eye" onclick="my()">
                <i class="fa-sharp fa-solid fa-eye-slash" id="close"></i>
                <i class="fa-solid fa-eye" id="open"></i>
            </span>
            </div>
            
            <span id="bottom">
                <br>
                <input id="remember" type="checkbox">
                <p>Remember Me</p>
                <button id="login" name="login" style="margin-top: 40px;">Log In</button>

                <a href="forgot.php" style="margin-top:90px">Forgot Password?</a>
            </span>

            <br>
            <a href="registration.php" style="margin-left: 65px; text-decoration:none;">Don't have an account? Create one!</a>
        </div>
    </form>

    <script src="login.js"></script>
</body>
</html>