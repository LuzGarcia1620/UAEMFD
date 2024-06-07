<?php
class CConexion {
    public function conexionBD(){
        $host = "localhost";
        $dbname = "postgres";
        $username = "postgres";
        $password = "root";  // Corrección del nombre de la variable

        try {
            $conn = new PDO("pgsql:host=$host;dbname=$dbname", $username, $password);
            echo "Conexión establecida";
        } catch (PDOException $exp) {
            echo ("No se conectó a la base de datos: $exp");
        }

        return $conn;
    }
}
?>
