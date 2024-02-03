<?php
    include 'connect.php';
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $quantity = $_POST['quantity'];
        $city = $_POST['city'];
        $contact = $_POST['contact'];
        $address = $_POST['address'];

        $sql = "INSERT INTO `receiver`(name,quantity,city,contact,address) VALUES('".$name."',".$quantity.",'".$city."',".$contact.",'".$address."')";
        $result = $connection->query($sql);

        if($result){
            echo "<script type='text/JavaScript'>alert('Receiver Registered Successfully')</script>";
            echo "<script type='text/JavaScript'>window.location.href='home.html';</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="receive.css">
    <title>Donate</title>
</head>
<body>
    <img id="logo" src="ShareMeals_logo.jpeg" alt="Logo">
    <div class="outer">
        <form class="container" method="post" style="height: 440px; padding-top: 20px; margin-top:20px;">
            <br><br>
            <h1 style="display:flex; margin-left: 80px; margin-top: 5px;">Receiver Registration</h1>

            <div class="inner" style="position: absolute; display:flex; margin-left:80px;">
                <div class="tags">
                    <big>Receiver Name</big>
                    <big>Quantity</big>
                    <big>City</big>
                    <big>Contact</big>
                    <big>Address</big>
                </div>

                <div class="inputs">
                    <input type="text" name="name" placeholder="Enter your Name">
                    <input type="number" name="quantity" placeholder="Enter Quantity">
                    <input type="text" name="city" placeholder="Enter your City">
                    <input type="number" name="contact" placeholder="Enter your Contact">
                    <input type="text" name="address" placeholder="Enter your Address">
                </div>
            </div>
            <button name="submit" style="position: absolute; margin-left: -40px; margin-top: 220px; cursor:pointer;">Submit</button>
            <br><br><br><br>
        </form>
    </div>
</body>
</html>