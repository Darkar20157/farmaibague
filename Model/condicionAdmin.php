<?php
require_once "Conexiones.php";
//Acepta o rechaza la devolucion el administrador
$ID = $_POST['idA'];
$sql = "UPDATE SALIDAS_INV SET ESTADO = 'Devolucion' WHERE ID = $ID";
$consult = oci_parse($conexion, $sql);
$result = oci_execute($consult);
if($consult){
    echo $ID;
}else{
    echo "Incorrecto";
}
?>