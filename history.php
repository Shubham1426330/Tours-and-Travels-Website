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
    <nav style="text-align: center; font-size:2em; font-color:black;">My Order History</nav>


    <table align="center" border="1px" style=" color: black;">
        <tr style="background-color:#b5e5ff; font-size:1.7em;">
            <th><h6 style="padding-right:1em; margin:0em;">Index no.</h6></th>
            <th><h6 style="padding-right:1em; margin:0em;">Tour location</h6></th>
            <th><h6 style="padding-right:1em">Tickets</h6></th>
            <th><h6 style="padding-right:1em">Tour total Days</h6></th>
            <th><h6 style="padding-right:1em">Start Date</h6></th>
            <th><h6 style="padding-right:1em">End Date</h6></th>
        </tr>
<div>
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

if(isset($_SESSION['cart'])){
    $a=$_SESSION['id'];
    foreach ($_SESSION['cart'] as $key => $value){
        $b=$value['tid'];
        $c=$value['tickets'];
        $sqll="INSERT into history (usr_id,tour_id,tickets) VALUES ($a,$b,$c)";
        mysqli_multi_query($conn, $sqll);
        $sql22="SELECT * from tours where id=$b ";
        $result22=mysqli_query($conn,$sql22);
        while($row3 = $result22->fetch_assoc()){
            $init_cap=$row3['capacity'];
        }
        $new_cap=$init_cap-$c;
        $neww=(string)$new_cap;

        $sql33="UPDATE tours set capacity=$neww where id=$b";
        mysqli_query($conn, $sql33);
    }
    unset($_SESSION['cart']);
}
?>       

</div>

<?php 
$a=$_SESSION['id'];
$sql5 = "SELECT * FROM history WHERE usr_id = $a";
$final = mysqli_query($conn, $sql5); 
while($row2 = $final->fetch_assoc()){
    $tmpid=$row2['tour_id'];
    $sql4 = "SELECT * FROM tours WHERE id = $tmpid;";
    $final4 = mysqli_query($conn, $sql4); 

    while($row222 = $final4->fetch_assoc())
    {
        //$sql5 = "SELECT * FROM tours WHERE id = '$tour_id[$count1]';";
        //$result2 = mysqli_query($conn, $sql2);
        echo "
        <tr style='padding:25px;'>
            <td>1</td>
            <td>$row222[place]</td>
            <td>$row2[tickets]</td>
            <td>$row222[days]</td>
            <td>$row222[start]</td>
            <td>$row222[end]</td>
        </tr>
    ";
    }   

}
            


$conn->close();
?>
</body>
</html>

