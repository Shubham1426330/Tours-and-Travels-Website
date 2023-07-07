<!DOCTYPE html>
<html>
<body>
<?php
$servername = 'localhost';
$user = 'root';
$passwd = 'mysql';

$conn = new mysqli($servername, $user, $passwd);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Creating database:
$sql = "CREATE DATABASE fasttravels";
if ($conn->query($sql) === TRUE) {
  echo "Your Database has been created successfully";
} else {
  echo "Error creating database: " . $conn->error;
}

/* DataBase */
$dbname = 'fasttravels';

/* Check the connection */
$conn = mysqli_connect($servername, $user, $passwd, $dbname);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Creating Table:
$table1 = "CREATE TABLE admin (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(50),
    password VARCHAR(50)
    )";
if (mysqli_query($conn, $table1)) {
    echo " ,<br/>Table admin created successfully";
  } else {
    echo "<br/>Error creating table: " . mysqli_error($conn);
  }

$query1 = "INSERT INTO admin (email, password)
VALUES ('admin@gmail.com', 'admin1');"; 
$result1 = mysqli_multi_query($conn, $query1);


$table2 = "CREATE TABLE sign (
    idNumber INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    FirstName VARCHAR(30) NOT NULL,
    LastName VARCHAR(30) NOT NULL,
    PhoneNumber VARCHAR(50),
    Email VARCHAR(50),
    Password VARCHAR(50)
    )";
if (mysqli_query($conn, $table2)) {
    echo " ,<br/>Table sign created successfully";
  } else {
    echo "<br/>Error creating table: " . mysqli_error($conn);
  }
  

$table3 = "CREATE TABLE tours (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    place VARCHAR(200) NOT NULL,
    days VARCHAR(100),
    start DATE,
    end DATE,
    capacity VARCHAR(200),
    cost VARCHAR(200),
    img VARCHAR(25)
     )";
if (mysqli_query($conn, $table3)) {
    echo " ,<br/>Table tours created successfully";
  } else {
    echo "<br/>Error creating table: " . mysqli_error($conn);
  }


$table4 = "CREATE TABLE history (
    usr_id INT(25),
    tour_id INT(25),
    tickets INT(50)
     )";
if (mysqli_query($conn, $table4)) {
    echo " ,<br/>Table history created successfully";
  } else {
    echo "<br/>Error creating table: " . mysqli_error($conn);
  }



#Already added some sample values but can add more by logging with admin credentials!!
$query2 = "INSERT INTO tours (place, days, start, end, capacity, cost, img)
VALUES ('Banff', '3', '2022-11-09', '2022-11-12', '50', '200', 'banf.jpg'),
       ('Paris', '6', '2023-01-03', '2023-01-07', '150', '350', 'paris.jpg'),
       ('New York', '16', '2022-12-15', '2022-12-31', '160', '930', 'ny.jpg'),
       ('Mauritius', '7', '2023-02-02', '2023-02-09', '120', '250', 'mauritius.jpg'),
       ('Waterton', '3', '2022-12-23', '2022-12-26', '40', '120', 'waterton.jpg'),
       ('Dubai', '14', '2023-04-06', '2023-04-20', '154', '1020', 'dubai.jpg'),
       ('London', '6', '2023-03-05', '2023-03-11', '75', '600', 'london.jpg');";


if (mysqli_multi_query($conn, $query2)) {
    echo "<br/>New records created successfully</br>";
    } else {
    echo "<br/>Error:</br> " . mysqli_error($conn);
    }
    ?>
    <a href="1index.html">Click here to visit to the website</a>
    <?php
$conn->close();
?>
</body>
</html>