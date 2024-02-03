<?php
    include 'connect.php';
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $quantity = $_POST['quantity'];
        $city = $_POST['city'];
        $contact = $_POST['contact'];
        $address = $_POST['address'];

        $sql = "INSERT INTO `donor`(name,quantity,city,contact,address) VALUES('".$name."',".$quantity.",'".$city."',".$contact.",'".$address."')";
        $result = $connection->query($sql);

        if($result){
            echo "<script type='text/JavaScript'>alert('Donor Registered Successfully')</script>";
            echo "<script type='text/JavaScript'>window.location.href='home.html';</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="donate.css">
    <title>Donate</title>
</head>
<body>
    <img id="logo" src="ShareMeals_logo.jpeg" alt="Logo">
    <div class="outer">
        <form class="container" method="post">
            <br><br>
            <h1>Donor Registration</h1>

            <div class="inner">
                <div class="tags">
                    <big>Donor Name</big>
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
            <button name="submit">Submit</button>
            <br><br><br><br>
        </form>
    </div>
</body>
</html>