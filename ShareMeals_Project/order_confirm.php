<?php
    include 'connect.php';
    if(isset($_POST['submit'])){
        $rcvr_id = $_POST['rcvr_id'];
        $rcvr_quan = $_POST['rcvr_quan'];
        $donor_id = $_POST['donor_id'];
        $donor_quan = $_POST['donor_quan'];
        $flag=0;
        $flag2=0;

        $sql = "SELECT Sr_No from receiver";
        $result = $connection->query($sql);

        while($row = $result->fetch_assoc()){
            if ($row['Sr_No'] == $rcvr_id){
                $flag=1;
            }
        }

        if($flag){
            $sql = "SELECT Sr_No from donor";
            $result = $connection->query($sql);
            
            while($row = $result->fetch_assoc()){
                if ($row['Sr_No'] == $donor_id){
                    $flag2=1;
                }
            }
        }
        
        if($flag2){

            if($rcvr_quan==$donor_quan){
                $sql = "DELETE from `donor` where Sr_No=$donor_id";
                $result = $connection->query($sql);

                if($result){
                    $sql = "DELETE from `receiver` where Sr_No=$rcvr_id";
                    $result = $connection->query($sql);

                    if($result){
                        echo "<script type='text/JavaScript'>alert('Order Confirmed!')</script>";
                        echo "<script type='text/JavaScript'>window.location.href = 'home.html';</script>";
                    }
                }
            }

            else if($rcvr_quan>$donor_quan){
                $sql = "DELETE from `donor` where Sr_No=$donor_id";
                $result = $connection->query($sql);

                if($result){
                    $sql = "UPDATE `receiver` SET Quantity=$rcvr_quan-$donor_quan where Sr_No=$rcvr_id";
                    $result = $connection->query($sql);

                    if($result){
                        echo "<script type='text/JavaScript'>alert('Order Confirmed!')</script>";
                        echo "<script type='text/JavaScript'>window.location.href = 'home.html';</script>";
                    }
                }
            }

            else{
                $sql = "UPDATE `donor` SET Quantity=$donor_quan-$rcvr_quan where Sr_No=$donor_id";
                $result = $connection->query($sql);

                if($result){
                    $sql = "DELETE from `receiver` where Sr_No=$rcvr_id";
                    $result = $connection->query($sql);

                    if($result){
                        echo "<script type='text/JavaScript'>alert('Order Confirmed!')</script>";
                        echo "<script type='text/JavaScript'>window.location.href = 'home.html';</script>";
                    }
                }
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="order_confirm.css">
    <title>Order Details</title>
</head>
<body>
    <img id="logo" src="ShareMeals_logo.jpeg" alt="Logo">

    <form class="container" method="post">
        <h1>Order Details</h1>

        <div class="form">
            
            <div class="tags">
                <big>Receiver ID</big>
                <big>Receiving Quantity</big>
                <big>Donor ID</big>
                <big>Donating Quantity</big>
            </div>

            <div class="inputs">
                <input type="number" name="rcvr_id" id="rcvr_id" placeholder="Enter Receiver ID">
                <input type="number" name="rcvr_quan" id="rcvr_quan" placeholder="Enter Receiving Quantity">
                <input type="number" name="donor_id" id="donor_id" placeholder="Enter Donor ID">
                <input type="number" name="donor_quan" id="donor_quan" placeholder="Enter Donating Quantity">
            </div>
        </div>
        <button name="submit">Submit</button>
    </form>
</body>
</html>