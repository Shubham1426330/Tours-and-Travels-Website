<?php
session_start();
?>


<!DOCTYPE html>
<html lang = "en">
<head>
    <title>Tours</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="business.css">
</head>
<body>
    <div id = "wrapper" style="background-color:rgb(240, 248, 255)">
    <header>
        <h1><span class="effect">Fast Travels & Tours</span></h1>
    </header>

    <nav class = 'clear' style="text-align: center">    
    
        <a href = '1index.html'>Home</a> &nbsp;
        <a href = 'list.php'>Tours</a> &nbsp;
        <a href = 'updateacc.html'>Dashboard</a> &nbsp;
        <a href = 'logout.php'>Log out</a>
        <?php 
            $count = 0;
            if(isset($_SESSION['cart']))
            {
                $count = count($_SESSION['cart']);
            }
        ?>
        </nav>
        <nav style="padding: 0em; text-align: right;"><div style="padding: 2em; text-align: right;"><a href = 'mycart.php' class = 'btn btn-outline-success'>My Cart(<?php echo $count; ?>)</a>
        <a href = 'history.php' class = 'btn btn-outline-success'>My Order History</a></div></nav>
        <p style="text-align: Center; color:black; font-size: 25px; font-family: Georgia, 'Times new roman', serif; font-weight: bold; "> Welcome <?php echo $_SESSION['fname']; ?> </p>
        

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
    $num = mysqli_num_rows($result1);
    
    
    if ($num > 0) 
    {
        
    ?>

        <table align="center" border="1px" style=" color: black;">
            <tr style="background-color:#b5e5ff; font-size:2em;">
                <th><h2 style="padding-right:2em">Available Tours</h2></th>
            </tr>
                            
        <?php    
        // OUTPUT DATA OF EACH ROW
        while($row = mysqli_fetch_assoc($result1))
        {
            echo " 
                
                    <tr style='float: left;'>    
                        <td style='font-size: 17px; font-family: Georgia, 'Times new roman', serif;'> 
                                Tour no.: ".$row['id']."<br/>"
                                ?> 
                                <img src='images/<?php echo $row['img']; ?>' height='200px' width='344.6px'>
                                <?php echo " 
                                <br/>Location: ".$row['place']." <br/>
                                Days: ".$row['days']." <br/>
                                Start date of tour: ".$row['start']." <br/>
                                End date of tour: ".$row['end']." <br/>
                                Tickets left: ".$row['capacity']." <br/>
                                Tour cost: $".$row['cost']."/person
                                <form action='atc.php' method='POST' style= 'margin: auto; width: 250px; padding: 1em;'>
                                <input type='hidden' name='tid' value='".$row['id']."'>
                                <input type='hidden' name='timg' value='".$row['img']."'>
                                <input type='hidden' name='place' value='".$row['place']."'>
                                <input type='hidden' name='days' value='".$row['days']."'>
                                <input type='hidden' name='start' value='".$row['start']."'>
                                <input type='hidden' name='end' value='".$row['end']."'>
                                <input type='hidden' name='capacity' value='".$row['capacity']."'>
                                <input type='hidden' name='cost' value='".$row['cost']."'>
                                <Label for='capacity' style='font-size: 12px; font-family: Georgia, 'Times new roman', serif;'>Tickets:
                                    </label><input type='number' min='1' max='$row[capacity]' size='10' id='capacity' name='tickets' value='1'>
                                <button type='submit' id='mySubmit' name= 'atc'>Add to Cart</button>
                                </form>
                        </td>
                    </tr>
            ";
        }
    } 
    
    else {
        echo "0 results";
    } 
    ?> 
    </div>
</body>
</html>





