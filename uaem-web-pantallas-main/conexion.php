<?php
class CConexion {
    private $conn;

    public function conexionBD(){
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

//PERFIL
function obtenerPerfiles() {
    $conexion = new CConexion();
    $conn = $conexion->conexionBD();

    $query = "SELECT * FROM perfil";
    try {
        $stmt = $conn->query($query);
        $perfiles = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error al obtener los perfiles: " . $e->getMessage();
        $perfiles = [];
    } finally {
        $conexion->closeConnection();
    }

    return $perfiles;
}

//MODALIDAD
function obtenerModalidades() {
    $conexion = new CConexion();
    $conn = $conexion->conexionBD();

    $query = "SELECT * FROM modalidad";
    try {
        $stmt = $conn->query($query);
        $modalidades = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error al obtener las modalidades: " . $e->getMessage();
        $modalidades = [];
    } finally {
        $conexion->closeConnection();
    }

    return $modalidades;
}

//TIPOS
function obtenerTipos() {
    $conexion = new CConexion();
    $conn = $conexion->conexionBD();

    $query = "SELECT id, tipo FROM tipo"; // Ajustado a la estructura de tu tabla
    try {
        $stmt = $conn->query($query);
        $tipos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        echo "Error al obtener los tipos de actividad: " . $e->getMessage();
        $tipos = [];
    } finally {
        $conexion->closeConnection();
    }

    return $tipos;
}

//CLASIFICACIONES
function obtenerClasificaciones() {
    $conexion = new CConexion();
    $conn = $conexion->conexionBD();

    $query = "SELECT * FROM clasificacion";
    try {
        $stmt = $conn->query($query);
        $clasificaciones = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error al obtener las clasificaciones de actividad: " . $e->getMessage();
        $clasificaciones = [];
    } finally {
        $conexion->closeConnection();
    }

    return $clasificaciones;
}


?>
