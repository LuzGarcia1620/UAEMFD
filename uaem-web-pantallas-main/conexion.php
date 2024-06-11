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
}
?>
