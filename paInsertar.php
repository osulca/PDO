<?php
    include_once "clases/Facultad.php";
    include_once "clases/PA.php";
?>
<form method="post" action="<?=$_SERVER["PHP_SELF"]?>">
    <input type="text" name="nombre" placeholder="Programa Academico"><br>
    <select name="facultad">
        <?php
            $facultad = new Facultad();
            $facultades = $facultad->mostrar();
            print_r($facultades);
            foreach ($facultades as $item){
                echo "<option value='".$item["id"]."'>".$item["nombre"]."</option>";
            }
        ?>
    </select><br>
    <input type="submit" name="submit" value="Guardar">
</form>
<?php
if(!empty($_POST)){
    $nombre = $_POST["nombre"];
    $facultad = $_POST["facultad"];

    $pa = new PA();
    $pa->setNombre($nombre);
    $pa->setIdFacultad($facultad);
    $filas = $pa->insertar();

    if($filas!=0){
        echo "Facultad guardada";
    }else{
        echo "Error: Informarcion no guardada";
    }
}
