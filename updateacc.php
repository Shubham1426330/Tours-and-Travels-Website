<?php
session_start();
?>

<html>
<body>
<?php

$email = $_POST['email'];
$pass = $_POST['pass'];
$phone = $_POST['phone'];
$usrname = $_SESSION['fname']; 

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

$sql_user = "SELECT * FROM sign WHERE Email = '$email' ;";
$result1 = mysqli_query($conn, $sql_user);
$num1 = mysqli_num_rows($result1);

$sql_pass = "SELECT * FROM sign WHERE Password = '$pass';";
$result2 = mysqli_query($conn, $sql_pass);
$num2 = mysqli_num_rows($result2);



if ($num1>0)
{
    echo "The Email you entered has already been taken. Change your Email!";
}
elseif ($num2>0)
{
    echo "The Password you entered has already been taken. Change your password!";
}
else{
      $sql2 = "UPDATE sign SET Email = '$email', Password = '$pass', PhoneNumber = '$phone' WHERE FirstName = '$usrname';"; 

      if (mysqli_multi_query($conn, $sql2)) {
      echo "New records updated successfully<br/><br/>";
      } else {
      echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
      }
}

$conn->close();
?>
</body>
</html>