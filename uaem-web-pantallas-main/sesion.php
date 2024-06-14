<?php
require 'conexion.php';

session_start();

$usuario = $_POST['usuario'];
$password = $_POST['password'];

// Conexión a la base de datos
$conexion = new CConexion();
$conn = $conexion->conexionBD();

$query = "SELECT * FROM usuario WHERE usuario = :usuario AND password = :password";
$stmt = $conn->prepare($query);
$stmt->bindParam(':usuario', $usuario);
$stmt->bindParam(':password', $password);

$stmt->execute();
$cantidad = $stmt->rowCount();

if ($cantidad > 0) {
    $_SESSION['usuario'] = $usuario;
    header('Location: perfil.php');
    exit;
} else {
    header('Location: login.php?error=1');
    exit;
}
?>
