<?php
session_start();
?>

<html>
<body>
<?php


$fname = $_POST['fname'];
$lname = $_POST['lname'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$passver = $_POST['passver'];

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

// Inserting entries into table:
if ($pass != $passver)
{
    echo "Your password doesn't match.";
}
elseif ($num1>0)
{
    echo "The Email you entered has already been taken. Change your Email!";
}
elseif ($num2>0)
{
    echo "The Password you entered has already been taken. Change your password!";
}
else
{
    $sql = "INSERT INTO sign (FirstName, LastName, PhoneNumber, Email, Password)
    VALUES ('$fname', '$lname', '$phone', '$email', '$pass');";

    if (mysqli_multi_query($conn, $sql)) {
    echo "New records created successfully</br>
          </br>
          <a href='login.html'>Click here to Login</a>";
    } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}


$conn->close();
?>
</body>
</html>