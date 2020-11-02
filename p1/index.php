<a href="registro.php">Registrar</a>
<?php
include_once "Figura.php";
$figura = new Figura();
$guardados = $figura->mostrar();

echo "<table border='1'>";
echo "<tr>";
for($i=1; $i <= 669; $i++){
    echo "<td ";
    foreach ($guardados as $numero) {
        if ($numero["numero"] == $i) {
            echo "style='background-color: yellow'";
        }
    }
    echo ">".$i;

    if($i%20==0){
        echo "</td></tr>";
    }
}
echo "</tr>";
echo "</table>";