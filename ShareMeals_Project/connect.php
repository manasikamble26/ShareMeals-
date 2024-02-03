<?php
$server = "localhost";
                $user = "root";
                $password = "Manasi@2004";
                $database = "cp";

                $connection = new mysqli($server,$user,$password,$database);

                if ($connection->connect_error){
                    die("Connection failed: ".$connection->connect_error);
                }
                ?>