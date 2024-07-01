<?php
class CConexion {
    private $conn;

    public function conexionBD() {
        $host = "localhost";
        $dbname = "postgres";
        $username = "postgres";
        $password = "root";

        try {
            $this->conn = new PDO("pgsql:host=$host;dbname=$dbname", $username, $password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exp) {
            echo "No se conectó a la base de datos: " . $exp->getMessage();
            exit;
        }

        return $this->conn;
    }

    public function closeConnection() {
        $this->conn = null;
    }
}

// Funciones reutilizables para obtener datos
function obtenerDatos($tabla) {
    $conexion = new CConexion();
    $conn = $conexion->conexionBD();

    $query = "SELECT * FROM $tabla";
    try {
        $stmt = $conn->query($query);
        $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error al obtener los datos de $tabla: " . $e->getMessage();
        $datos = [];
    } finally {
        $conexion->closeConnection();
    }

    return $datos;
}

function obtenerPerfiles() {
    return obtenerDatos('perfil');
}

function obtenerModalidades() {
    return obtenerDatos('modalidad');
}

function obtenerTipos() {
    return obtenerDatos('tipo');
}

function obtenerClasificaciones() {
    return obtenerDatos('clasificacion');
}
?>
