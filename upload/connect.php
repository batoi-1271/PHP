<?php
// $server = "localhost";
// $user = "root";
// $pass="";
// $database = "zerotype";
// $conn = mysqli_connect($server, $user, $pass, $database);

// echo "Hello";

$servername = "localhost";
$username = "root";
$password = "1234";
$database = "zerotype";

$conn = new mysqli($servername, $username, $password, $database);
mysqli_query($conn, 'set names "utf8"');

// if ($conn->connect_error) {
//  die("Connection failed: " . $conn->connect_error);
// }
// echo "Connected successfully";
?>