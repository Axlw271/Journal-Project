<?php  
    session_start(); 
    $servername = "localhost";
    $usernamedb = "alexisce_alexis";
    $passworddb = "S?7R&Ux{FP;6";
    $dbname = "alexisce_lsm";   
    $username = $_POST['user'];  
    $password = $_POST['pass'];  
    // Create connection
    $conn = new mysqli($servername, $usernamedb, $passworddb,$dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
          //to prevent from mysqli injection  
          $username = stripcslashes($username);  
          $password = stripcslashes($password);  
          $username = mysqli_real_escape_string($conn, $username);  
          $password = mysqli_real_escape_string($conn, $password);  
          $sql = "select *from usuarios where user = '$username' and pass = '$password'";  
          $result = mysqli_query($conn, $sql);  
          if (mysqli_num_rows($result) === 1) {
              $row = mysqli_fetch_assoc($result);
              if ($row['user'] === $username && $row['pass'] === $password) {
                                 
                  $_SESSION['user'] = $row['user'];
                 echo "<script>window.location = 'home.php';</script>";
                  exit();
              }else{
                  header("Location: login.html?error=Usuario o contrasena incorrectos");
                  exit();
              }
          }else{
              header("Location: login.html?error=Usuario o contrasena incorrectos");
              exit();
          }
?>  