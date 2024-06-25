<?php
include_once("conexion.php");
$conexion = new CConexion();
$db = $conexion->conexionBD();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir y limpiar los datos enviados
    $nombre = pg_escape_string($_POST['nombre']);
    $apellidoPaterno = pg_escape_string($_POST['apellidoPaterno']);
    $apellidoMaterno = pg_escape_string($_POST['apellidoMaterno']);
    $correo = pg_escape_string($_POST['correo']);
    $telefono = pg_escape_string($_POST['telefono']);
    $gradoAcademico = pg_escape_string($_POST['gradoAcademico']);
    $institucion = pg_escape_string($_POST['institucion']);
    $perfil = pg_escape_string($_POST['perfil']);
    $docencia = pg_escape_string($_POST['docencia']);
    $areas = pg_escape_string($_POST['areas']);
    $semblanza = pg_escape_string($_POST['semblanza']);
    $modalidad = pg_escape_string($_POST['modalidad']);
    $otraModalidadTexto = pg_escape_string($_POST['otraModalidadTexto']);
    $nombreActividad = pg_escape_string($_POST['nombreActividad']);
    $presencial = pg_escape_string($_POST['presencial']);
    $enLinea = pg_escape_string($_POST['enLinea']);
    $independiente = pg_escape_string($_POST['independiente']);
    $duracion = pg_escape_string($_POST['duracion']);
    $tipo = pg_escape_string($_POST['tipo']);
    $otroTipoTexto = pg_escape_string($_POST['otroTipoTexto']);
    $dirigido = pg_escape_string($_POST['dirigido']);
    $ingreso = pg_escape_string($_POST['ingreso']);
    $egreso = pg_escape_string($_POST['egreso']);
    $clasificacion = pg_escape_string($_POST['clasificacion']);
    $presentacion = pg_escape_string($_POST['presentacion']);
    $objetivo = pg_escape_string($_POST['objetivo']);
    $temario = pg_escape_string($_POST['temario']);
    $actividad = pg_escape_string($_POST['actividad']);

    // Preparar la consulta SQL con parámetros
    $query = "INSERT INTO RECURSO_INSTRUCTOR (nombre, apellido_paterno, apellido_materno, correo, telefono, grado_academico, institucion, perfil, docencia, areas, semblanza, modalidad, otra_modalidad, nombre_actividad, presencial, en_linea, independiente, duracion, tipo, otro_tipo, dirigido_a, perfil_ingreso, perfil_egreso, clasificacion, presentacion, objetivo, temario, actividades) 
              VALUES ($1, $2, $3, $4, $5, $6, $7, $8, $9, $10, $11, $12, $13, $14, $15, $16, $17, $18, $19, $20, $21, $22, $23, $24, $25, $26, $27, $28)";

    // Preparar los valores para la consulta
    $values = array($nombre, $apellidoPaterno, $apellidoMaterno, $correo, $telefono, $gradoAcademico, $institucion, $perfil, $docencia, $areas, $semblanza, $modalidad, $otraModalidadTexto, $nombreActividad, $presencial, $enLinea, $independiente, $duracion, $tipo, $otroTipoTexto, $dirigido, $ingreso, $egreso, $clasificacion, $presentacion, $objetivo, $temario, $actividad);

    // Ejecutar la consulta preparada
    $result = pg_query_params($db, $query, $values);

    if ($result) {
        // Éxito al guardar en la base de datos
        echo "Los datos se han guardado correctamente.";
    } else {
        // Error al guardar en la base de datos
        echo "Error: " . $query . "<br>" . pg_last_error($db);
    }
} else {
    // Si no es método POST, redirigir o manejar el error
    echo "Error: Método no permitido.";
}

?>

