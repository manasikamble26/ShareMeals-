<?php
    include "connect.php";
    if(isset($_POST['save'])){
        $sql = "SELECT * FROM login";
        $result = $connection->query($sql);

        if($result){
            $row = $result->fetch_assoc();
            $email = $row['Email'];
        
            $contact = $_POST['contact'];
            $city = $_POST['city'];
            $country = $_POST['country'];

            $sql = "UPDATE `users` SET Contact=".$contact.", City='".$city."', Country='".$country."' WHERE Email_Id='".$email."'";
            $result = $connection->query($sql);

            if($result){
                echo "<script>alert('Profile Updated Successfully')</script>";
                echo "<script>window.location.href='home.html';</script>";
            }
        }
    }

    if(isset($_POST['cancel'])){
        header('location: profile.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="profile.css">
    <script src="https://kit.fontawesome.com/c8ffd88059.js" crossorigin="anonymous"></script>
    <title>Profile</title>
</head>
<body>
    <header id="top">
        <img id="logo" src="ShareMeals_logo.jpeg" alt="Logo" onclick="window.location.href='about.html';">
        <nav>
            <li><a href="home.html"><big>Home</big></a></li>
            <li><a href="donor.php"><big>Donors</big></a></li>
            <li><a href="receiver.php"><big>Receivers</big></a></li>
            <li><a href="event.html"><big>Events</big></a></li>
            <li><a href="contact.html"><big>Contact Us</big></a></li>
        </nav>
        <i id="search" class="fa-solid fa-magnifying-glass"></i>
        <input type="text" placeholder="Search">
        <img id="user" src="user-solid.jpg" alt="Profile" onclick="window.location.href='profile.php';">
    </header>
    <h1>Profile</h1>

    <form method="post">
    <div class="content" style="display: flex; background-image: linear-gradient(to right,#FFEFB3,#FEBBE7); padding-top:20px; margin-left: 500px; margin-right:500px; padding-bottom:100px; border-radius:10%;">
        <br>
        <div class="tags" style="display: flex; flex-direction:column; align-items:end; margin-right: 30px; margin-left: 100px;">
            <h2>E-Mail</h2>
            <h2>Password</h2>
            <h2>Contact</h2>
            <h2>City</h2>
            <h2>Country</h2>
        </div>

        <div class="values" style="display: flex; flex-direction:column; align-items:start;">
            <?php
                include "connect.php";
                $sql = "SELECT * FROM login";
                $result = $connection->query($sql);

                if($result){
                    $row = $result->fetch_assoc();
                    $email = $row['Email'];
                    $pswd = $row['Password'];
                    
                    echo "<h2 name='email' style='font-weight: 300;'>".$email."</h2>";
                    echo "<h2 style='font-weight: 300;'>".$pswd."</h2>"; 
                }
            ?>
            <div class="inputs" style="display: flex; flex-direction:column; margin-top:-10px;">
                <input type="number" name="contact" placeholder="Enter your Contact" style="margin-left:3px;">
                <input type="text" name="city" placeholder="Enter your City" style="margin-left:3px; margin-top:35px;">
                <input type="text" name="country" placeholder="Enter your Country" style="margin-left:3px; margin-top: 35px;">
            </div>
        </div>
    </div>

    <div class="btn" style="display: flex; margin-left: 680px; margin-top:-80px;">
        <button name="cancel" style="width:60px; height:40px; margin-right:30px; background-color: rgb(203, 241, 250); cursor:pointer;">Cancel</button>
        <button name="save" style="width:60px; height:40px; background-color: rgb(203, 241, 250); cursor:pointer;">Save</button>
    </div>
    </form>
    <script src="profile.js"></script>
</body>
</html>