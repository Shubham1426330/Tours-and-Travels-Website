<?php
session_start();
?>

<!DOCTYPE html>
<html lang = "en">
<head>
    <title>myCart</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="business.css">
</head>
<body>
    <div id = "wrapper" style="background-color:White; ">
    <header>
        <h1><span class="effect">Fast Travels & Tours</span></h1>
        <style>
            td,tr{
                border: 1px solid black;
            }
        </style>
    </header>
    &nbsp
    <nav style="text-align: center; font-size:2em; font-color:black;">My Cart</nav>


    <table align="center" border="1px" style=" color: black;">
        <tr style="background-color:#b5e5ff; font-size:1.7em;">
            <th><h6 style="padding-right:1em; margin:0em;">Index no.</h6></th>
            <th><h6 style="padding-right:1em; margin:0em;">My Tours</h6></th>
            <th><h6 style="padding-right:1em">Number of Days</h6></th>
            <th><h6 style="padding-right:1em">Start date</h6></th>
            <th><h6 style="padding-right:1em">End Date</h6></th>
        </tr>
        <tbody class="text-center">
        <?php

                        
            $place = $_POST['place'];
            $days = $_POST['days'];
            $start = $_POST['start'];
            $end = $_POST['end'];
    
            $servername = 'localhost';
            $user = 'root';
            $passwd = 'mysql';

            $conn = new mysqli($servername, $user, $passwd);

            if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            }


            /* DataBase */
            $dbname = 'fasttravels';

            /* Check the connection */
            $conn = mysqli_connect($servername, $user, $passwd, $dbname);
            if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
            }


            // SQL QUERY
            $query1 = "SELECT * FROM tours;";

            // FETCHING DATA FROM DATABASE
            $result1 = mysqli_query($conn, $query1);    

            // Creating Table:
            $sql = "CREATE TABLE $_SESSION[fname](
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                place VARCHAR(30) NOT NULL,
                days VARCHAR(30) NOT NULL,
                start VARCHAR(50),
                end VARCHAR(50)
                )";

            if (mysqli_query($conn, $sql)) {
                echo " ,Table $_SESSION[fname] created successfully";
            } else {
                echo "Error creating table: " . mysqli_error($conn);
            }


            $query2 = "INSERT INTO $_SESSION[fname](place, days, start, end,)
            VALUES ('$place', '$days', '$start', '$end');";

            // FETCHING DATA FROM DATABASE
            $result2 = mysqli_query($conn, $query1);  
            $num = mysqli_num_rows($result1);

            foreach ($_SESSION['cart'] as $key => $value)
            {
                $tour_total = $value['cost']*$value['tickets'];
                $count = $count + 1;
                print_r($value);
                echo "
                <tr>
                    <td>$count</td>
                    <td></td>
                    <td>$value[cost]</td>
                    <td style='padding-top:1em; '><input type='number' value='$value[tickets]' 
                    min ='1' max='10' style='text-align:center; margin-left:5.5em; margin-right:-4em;'> </td>
                    <td><button class='btn btn-sm btn-outline-danger'>Remove</button></td>
                    <td>$tour_total</td>
                </tr>
                ";
            }
                
            echo"   <tr style='background-color:#b5e5ff;'>
                    <th colspan='5'><h3 style=;'padding-right:1em; margin:0em;'>Total payment:</h3></th>
                    <th><h3 style=;'padding-right:1em; margin:0em;'>$ $total</h3></th>
                    </tr>
                ";
            ?>
        </tbody>               



</body>
</html>
