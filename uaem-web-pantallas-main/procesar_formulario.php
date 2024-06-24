<?php
include_once("conexion.php");
$conexion = new CConexion();
$conexion->conexionBD(); // Conectar a la base de datos

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $apellidoPaterno = $_POST['apellidoPaterno'];
    $apellidoMaterno = $_POST['apellidoMaterno'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $gradoAcademico = $_POST['gradoAcademico'];
    $institucion = $_POST['institucion'];
    $perfil = $_POST['perfil'];
    $docencia = $_POST['docencia'];
    $areas = $_POST['areas'];
    $semblanza = $_POST['semblanza'];

    // Insertar los datos en la tabla correspondiente
    $query = "INSERT INTO INSTRUCTOR (nombre, paterno, materno, correo, telefono, grado, institucion, idPerfil, tiempoDocencia, areas, semblanza) 
              VALUES ('$nombre', '$apellidoPaterno', '$apellidoMaterno', '$correo', '$telefono', '$gradoAcademico', '$institucion', '$perfil', '$docencia', '$areas', '$semblanza')";

    // Ejecutar la consulta
    if ($conexion->query($query) === TRUE) {
        echo "Datos guardados correctamente.";
    } else {
        echo "Error al guardar los datos: " . $conexion->error;
    }

    // Cerrar la conexión
    $conexion->cerrarConexion();
} else {
    echo "No se recibieron datos del formulario.";
}
?>
