<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="receiver.css">
    <script src="https://kit.fontawesome.com/c8ffd88059.js" crossorigin="anonymous"></script>
    <title>Receivers</title>
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
    <h1>Receivers</h1>

    <div class="container">
    <table class="table" align="center" border="1px solid black" width="80%" style="margin-bottom: 40px;">
        <thead>
            <tr height="50px">
                <th style="font-size: 25px;">Sr_No</th>
                <th style="font-size: 25px;">Name</th>
                <th style="font-size: 25px;">Quantity (in Kgs)</th>
                <th style="font-size: 25px;">City</th>
                <th style="font-size: 25px;">Contact</th>
                <th style="font-size: 25px;">Address</th>
                <th style="font-size: 25px;">Action</th>
            </tr>
        </thead>

            <tbody>
            <?php
                include 'connect.php';
                $sql = "SELECT * FROM receiver";
                $result = $connection->query($sql);

                if (!$result){
                    die("Invalid query: ".$connection->connect_error);
                }
                $text = '.$id.';

                while($row = $result->fetch_assoc()){
                    $id = $row['Sr_No'];
                    echo "<tr height='60px'>
                        <td style='font-size: 20px;' width=8% align='center'>".$row['Sr_No']."</td>
                        <td style='font-size: 20px;' width=20% align='center'>".$row['Name']."</td>
                        <td style='font-size: 20px;' width=20% align='center'>".$row['Quantity']."</td>
                        <td style='font-size: 20px;' width=15% align='center'>".$row['City']."</td>
                        <td style='font-size: 20px;' width=15% align='center'>".$row['Contact']."</td>
                        <td style='font-size: 20px;' width=30% align='center'>".$row['Address']."</td>
                        <td style='font-size: 20px;' width=20% align='center'>
                            <button class='wrapper' style='font-size: 18px; height:40px; background-color: #E06363;  margin:5px; cursor:pointer;' btnid=$id><a href='order_confirm.php' style='padding-right:20px; padding-left:-30px;'>Donate</a></button>
                        </td>
                    </tr>";
                }
            ?>
        </tbody>
    </table>
    </div>
    <script src="receiver.js"></script>
</body>
</html>