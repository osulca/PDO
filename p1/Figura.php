<?php
include_once "../clases/ConexionBD.php";

class Figura
{
    private $numero;

    public function getNumero()
    {
        return $this->numero;
    }

    public function setNumero($numero): void
    {
        $this->numero = $numero;
    }

    public function insertar(): bool
    {
        try {
            $conexionDB = new ConexionBD();
            $conn = $conexionDB->abrirConexion();
            $sql = "INSERT INTO figuras(numero) 
                    VALUES(?)";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $this->numero, PDO::PARAM_INT);

            $stmt->execute();
            $filasAfectadas = $stmt->rowCount();

            if($filasAfectadas != 0){
                $resultado = true;
            }else{
                $resultado = false;
            }

            $conexionDB->cerrarConexion();
            return $resultado;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function mostrar()
    {
        try {
            $conexionDB = new ConexionBD();
            $conn = $conexionDB->abrirConexion();
            $sql = "SELECT * FROM figuras";

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