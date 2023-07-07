<?php
session_start();
?>

<html>
<body>
<?php

$usremail = $_POST['usremail'];
$usrpass = $_POST['usrpass'];

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

// Checking entries into table:

$query1="select * from sign where Email='$usremail' and Password='$usrpass'";
$result1=mysqli_query($conn, $query1);
$count1= mysqli_num_rows($result1);


$query2="select * from admin where email='$usremail' and password='$usrpass'";
$result2=mysqli_query($conn, $query2);
$count2= mysqli_num_rows($result2);

if ($count1 > 0)
{
    $usr_detail = mysqli_fetch_assoc($result1);
    $_SESSION['id'] = $usr_detail['idNumber'];
    $_SESSION['fname'] = $usr_detail['FirstName'];
    $_SESSION['lname'] = $usr_detail['LastName'];
    $_SESSION['phone'] = $usr_detail['PhoneNumber'];
    $_SESSION['email'] = $usr_detail['Email'];
    echo "<script>
    <!--
    window.location='list.php';
    //-->
    </script>";
}
elseif ($count2 > 0)
{
    echo "<script>
    <!--
    window.location='addtours.html';
    //-->
    </script>";
}
else
{
    echo "Login Failure. Check your credentials!";
}

$conn->close();
?>
</body>
</html>