<form method="post" action="<?=$_SERVER["PHP_SELF"]?>">
    <input type="number" name="numero" placeholder="Ingrese numero">
    <input type="submit" name="submit" value="Guardar">
</form>
<?php
if(isset($_POST["submit"])){
    $numero = $_POST["numero"];
    include_once "Figura.php";
    $figura = new Figura();
    $figura->setNumero($numero);
    if($figura->insertar()){
        header("location: index.php");
    }else{
        echo "los datos no se guardaron";
    }
}
