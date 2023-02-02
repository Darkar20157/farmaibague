<?php
require_once "Conexiones.php";
$sql = "SELECT
SUM(STOCK) AS SUMA,
CATEGORIA
FROM INVENTARIO 
group by CATEGORIA";
$consult = oci_parse($conexion, $sql);
$result = oci_execute($consult);
$i = 0;
while($row = oci_fetch_array($consult,OCI_ASSOC)){
    $Sarray[$i] = array(
        "categoria" => $row['CATEGORIA'],
        "stock" => $row['SUMA']
    );
    $i = $i + 1;
}
$Narray = json_encode($Sarray);
print_r($Narray);

?>