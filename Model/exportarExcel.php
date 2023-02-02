<?php
require_once "Conexiones.php";
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename = archivo.xls");
$sql = "SELECT * FROM INVENTARIO_BTL";
$consult = oci_parse($conexion,$sql);
$result = oci_execute($consult);
?>
<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Nombre del producto</th>
            <th>Ubicacion</th>
            <th>Medidas</th>
            <th>Estado</th>
        </tr>
    </thead>
    <tbody>
        <?php
        while($row = oci_fetch_array($consult, OCI_ASSOC)){
            ?>
            <tr>
                <td><?php echo $row['ID']; ?></td>
                <td><?php echo $row['NOM_PRODUCTO']; ?></td>
                <td><?php echo $row['UBICACION']; ?></td>
                <td><?php echo $row['MEDIDAS']; ?></td>
                <td><?php echo $row['ESTADO']; ?></td>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>