<?php
session_start();
?>

<html>
<body>
<?php

$place = $_POST['place'];
$days = $_POST['days'];
$start = $_POST['start'];
$end = $_POST['end'];
$capacity = $_POST['capacity'];


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

// Inserting entries into table:
    $sql2 = "UPDATE tours SET days = '$days', start = '$start', end = '$end', capacity = '$capacity' WHERE place = '$place';"; 
    
    if (mysqli_multi_query($conn, $sql2)) {
    echo "New records updated successfully<br/><br/>";
    echo "<a href='updatetours.html' style='font-size:20px;'><button type='submit'>Add a new tour</button></a><br/><br/>";
    echo "<a href='updatetours.html' style='font-size:20px;'><button type='submit'>Update another tour</button></a>";
    } else {
    echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
    }


$conn->close();
?>
</body>
</html>