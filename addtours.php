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
$cost = $_POST['cost'];
$img = $_POST['img'];

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
    $sql1 = "INSERT INTO tours (place, days, start, end, capacity, cost, img)
    VALUES ('$place', '$days', '$start', '$end', '$capacity', '$cost', '$img');";
    
    if (mysqli_multi_query($conn, $sql1)) {
    echo "New records created successfully<br/>";
    echo "<a href='addtours.html' style='font-size:20px;'><button type='submit'>Add another tour</button></a><br/><br/>";
    echo "<a href='updatetours.html' style='font-size:20px;'><button type='submit'>Update a tour</button></a>";
    } else {
    echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
    }


$conn->close();
?>
</body>
</html>