<form method="post" action="<?=$_SERVER["PHP_SELF"]?>">
    <input type="text" name="nombre" placeholder="Facultad">
    <input type="submit" name="submit" value="Guardar">
</form>
<?php
    if(!empty($_POST)){
        $nombre = $_POST["nombre"];

        include_once "clases/Facultad.php";
        $facultad = new Facultad();
        $facultad->setNombre($nombre);
        $filas = $facultad->insertar();

        if($filas!=0){
            echo "Facultad guardada";
        }else{
            echo "Error: Informarcion no guardada";
        }
    }
