<?php
    include 'connect.php';
    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $pswd = $_POST['pswd'];

        $sql = "UPDATE `users` SET Password='".$pswd."' where Email_Id='".$email."'";
        $result = $connection->query($sql);

        if($result){
            echo "<script type='text/JavaScript'>alert('Password Reset successful')</script>";
            echo "<script type='text/JavaScript'>window.location.href='login.php';</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="forgot.css">
    <script src="https://kit.fontawesome.com/c8ffd88059.js" crossorigin="anonymous"></script>
    <title>Forgot Password</title>
</head>
<body>
    <img id="logo" src="ShareMeals_logo.jpeg" alt="Logo">

    <div class="outer">
        <div class="container">
            <br><br>
            <h1>Reset Password</h1>

            <form method="post">
                <div class="tags">
                    <big>Email ID</big>
                    <big>New Password</big>
                </div>

                <div class="inputs">
                    <div class="one">
                        <input type="email" name="email" placeholder="Enter Email">
                        <i id="mail" class="fa-sharp fa-solid fa-envelope"></i>
                    </div>
                    
                    <div class="two">
                        <input id="password" type="password" name="pswd" placeholder="Enter New Password">
                        <span id="eye" onclick="my()">
                            <i class="fa-sharp fa-solid fa-eye-slash" id="close"></i>
                            <i class="fa-solid fa-eye" id="open"></i>
                        </span>
                    </div>
                </div>
                <br><br><br><br>
                <button name="submit">Submit</button>
            </form>
        </div>
    </div>

    <script src="forgot.js"></script>
</body>
</html>