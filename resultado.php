<?php
$servername = "localhost";
$username = "alexisce_alexis";
$password = "S?7R&Ux{FP;6";
$dbname = "alexisce_lsm";

session_start();
$user= $_SESSION['user'];
$act= $_POST['act_id'];
$resultado= $_POST['resultado'];
// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
$sql = "INSERT INTO resultados (user, act_id, resultado)
VALUES ('$user','$act','$resultado')";
if ($conn->query($sql) === TRUE) {
  echo "<script>alert('registro exitoso')</script>";
 // echo("<script>window.location = 'home.php';</script>");
} else {
  echo "<script>alert('registro fallido')</script>";
 // echo("<script>window.location = 'home.php';</script>");
}
$conn->close();
?>