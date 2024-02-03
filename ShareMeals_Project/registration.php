<?php
    include 'connect.php';
    if(isset($_POST['register'])){
        $email = $_POST['email'];
        $pswd = $_POST['pswd'];
        $flag=0;

        $sql = "SELECT * FROM `users`";
        $result = $connection->query($sql);

        if($result){
            while($row = $result->fetch_assoc()){
                if($row['Email_Id']==$email){
                    $flag=1;
                }
            }
            if($flag){
                echo "<script type='text/JavaScript'>alert('Account already exists!')</script>";
                echo "<script type='text/JavaScript'>window.location.href='login.php';</script>";
            }
            else{
                $sql = "INSERT INTO `users`(Email_Id, Password) VALUES('".$email."','".$pswd."')";
                $result = $connection->query($sql);

                if($result){
                    echo "<script type='text/JavaScript'>alert('Account created successfully!')</script>";
                    echo "<script type='text/JavaScript'>window.location.href='login.php';</script>";
                }
                else{
                    echo "<script type='text/JavaScript'>alert('Account not created!')</script>";
                }
            }
        }
        die("Error: ".$connection->connect_error);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="registration.css">
    <script src="https://kit.fontawesome.com/c8ffd88059.js" crossorigin="anonymous"></script>
    <title>Login</title>
</head>
<body>
    <img id="logo" src="ShareMeals_logo.jpeg" alt="LOGO">
    <form method="post">
        <div id="body">
            <div id="info">
            <h1>Register</h1>
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
                <button name="register" style="margin-top: 20px;">Register</button>
            </span>

            <br>
            <a href="login.php" style="margin-left: 65px; text-decoration:none;">Already have an account? Log In!</a>
        </div>
    </form>

    <script src="login.js"></script>
</body>
</html>