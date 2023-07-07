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
            <th><h6 style="padding-right:1em; margin:0em;">Selected Tours</h6></th>
            <th><h6 style="padding-right:1em">Price</h6></th>
            <th><h6 style="padding-right:1em">Tickets</h6></th>
            <th><h6 style="padding-right:1em">Edit</h6></th>
            <th><h6 style="padding-right:1em">Total</h6></th>
        </tr>
        <tbody class="text-center">
        <?php
    
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


    
            $total=0;
            $count=0;
            if(isset($_SESSION['cart']))
            {
                foreach ($_SESSION['cart'] as $key => $value)
                {
                    $total = $total + ($value['cost']*$value['tickets']);
                    $tour_total = $value['cost']*$value['tickets'];
                    $count = $count + 1;
                    echo "
                    <tr style='padding:25px;'>
                        
                        <td>$count</td>
                        <td>$value[place]</td>
                        <td>$value[cost]</td>
                        <td>$value[tickets]</td>
                        <form action='atc.php' method='POST'>
                        <td><button class='btn btn-sm btn-outline-danger' style='margin:8px;' name='remove'>Remove</button></td>
                        <input type='hidden' name='place' value='$value[place]'>
                        </form>
                        <td>$tour_total</td>
                    </tr>
                    ";
                }
                
            }
            echo"   <tr style='background-color:#b5e5ff;'>
                    <th colspan='5'><h3 style=;'padding-right:1em; margin:0em;'>Total payment:</h3></th>
                    <th><h3 style=;'padding-right:1em; margin:0em;'>$ $total</h3></th>
                    </tr>
                    <tr>
                    <th colspan='6'><h3 style='margin:0em;'>
                    <form action='history.php' method='POST' style='padding:1px'>";?>
                    <?php
                    #foreach($_SESSION['cart'] as $key => $value)
                    #{
                     #   echo"
                      #  <input type='hidden' name='tid' value='".$value['tid']."'>
                       # <input type='hidden' name='tickets' value='".$value['tickets']."'>

                        #";
                    #}
                    echo "
                    <button class='btn btn-outline-danger' name='pay'>PAY</button>
                    
                    </form>
                    </h3></th>
                    </tr>
                ";
            ?>
        </tbody>               

</body>
</html>
