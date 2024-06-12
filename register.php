<?php
$servername = "localhost";
$username = "alexisce_alexis";
$password = "S?7R&Ux{FP;6";
$dbname = "alexisce_lsm";

// Recibiendo y sanitizando datos del formulario
$user = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$pass = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
try {
    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    session_start(); 
    // Verificar la conexión
    if ($conn->connect_error) {
        throw new Exception("Connection failed: " . $conn->connect_error);
    }
    
    // Preparar y enlazar
    $stmt = $conn->prepare("INSERT INTO usuarios (user, pass, email) VALUES (?, ?, ?)");
    if (!$stmt) {
        throw new Exception("Prepare statement failed: " . $conn->error);
    }
    $stmt->bind_param("sss", $user, $pass, $email);
    
    // Ejecutar la consulta
    if ($stmt->execute()) {
        echo "<script>alert('Registro exitoso');</script>";
        
        $_SESSION['user'] = $user;
        echo "<script>window.location = 'examen.php';</script>";
    } else {
        throw new Exception("Execute statement failed: " . $stmt->error);
    }
    
    // Cerrar la conexión
    $stmt->close();
    $conn->close();
    
} catch (Exception $e) {
    echo "Registro fallido: " . $e->getMessage() ;
}
?>
