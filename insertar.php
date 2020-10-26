<?php
include_once "clases/Estudiante.php";
include_once("clases/PA.php");

?>
<form method="post" action="<?= $_SERVER['PHP_SELF'] ?>">
    <input type="number" name="codigo" placeholder="Ingrese codigo"><br>
    <input type="text" name="nombres" placeholder="Ingrese Nombres"><br>
    <input type="text" name="apellidos" placeholder="Ingrese Apellidos"><br>
    <input type="number" name="telefono" placeholder="Ingrese Telefono"><br>
    <input type="email" name="correo" placeholder="Ingrese Correo"><br>
    <select name="pa">
    <?php
        $pa = new PA();
        $pas = $pa->mostrarPAs();
        foreach ($pas as $programa){
            echo "<option value='".$programa["id"]."'>".$programa["nombre"]."</option>";
        }
    ?>
    </select><br>
    <input type="submit" name="submit" value="guardar">
</form>

<?php
if (isset($_POST["submit"])) {
    $codigo = $_POST["codigo"];
    $nombres = $_POST["nombres"];
    $apellidos = $_POST["apellidos"];
    $telefono = $_POST["telefono"];
    $correo = $_POST["correo"];
    $pa = $_POST["pa"];

    $estudiante = new Estudiante();
    $resultado = $estudiante->insertar($codigo, $nombres, $apellidos, $telefono, $correo, $pa);

    if ($resultado != 0) {
        header("location: index.php");
    } else {
        echo "Error: Informacion no Eliminada";
    }
}


