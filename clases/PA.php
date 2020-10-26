<?php
include_once "ConexionBD.php";

class PA{
    private $id;
    private $nombre;
    private $id_facultad;

    public function setNombre($nombre): void
    {
        $this->nombre = $nombre;
    }

    public function setIdFacultad($id_facultad): void
    {
        $this->id_facultad = $id_facultad;
    }

    public function insertar(){
        try{
            $conexionDB = new ConexionBD();
            $conn = $conexionDB->abrirConexion();
            $sql = "INSERT INTO pa(nombre, id_facultad)
                    VALUES(?, ?)";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $this->nombre, PDO::PARAM_STR);
            $stmt->bindParam(2, $this->id_facultad, PDO::PARAM_STR);
            $stmt->execute();
            $filas = $stmt->rowCount();

            $conexionDB->cerrarConexion();
            return $filas;
        }catch(PDOException $e){
            return $e->getMessage();
        }
    }

    public function mostrarPAs()
    {
        try {
            $conexionDB = new ConexionBD();
            $conn = $conexionDB->abrirConexion();
            $sql = "SELECT * FROM pa";

            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $resultado = $stmt->fetchAll();

            $conexionDB->cerrarConexion();
            return $resultado;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}