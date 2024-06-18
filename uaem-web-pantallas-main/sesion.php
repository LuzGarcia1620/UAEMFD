<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Redirigir según el rol del usuario
switch ($_SESSION['role']) {
    case 1:
        header("Location: perfil.php");
        break;
    case 2:
        header("Location: perfil_admin.php");
        break;
    case 3:
        header("Location: perfil_instructor.php");
        break;
    default:
        header("Location: login.php");
        break;
}
exit();
?>
