<?php
require_once "Conexiones.php";
//Mostramos las notificaciones del administrador
/*
if(isset($_POST['cedula'])){
    $cedula = $_POST['cedula'];
    $sql = "SELECT
    COUNT(*) as RECHAZADO
    FROM
    SALIDAS_INV
    WHERE
    ESTADO = 'Rechazado'
    AND ENTREGA = $cedula";
    $consult = mysqli_query($conexion, $sql);
    while($row = mysqli_fetch_array($consult)){
        $noti = $row['RECHAZADO'];
    }
    echo $noti;

    //Imprimimos las notifcaciones de los productos rechazados
}elseif(isset($_POST['ced'])){
    $cedula = $_POST['ced'];
    $sql = "SELECT
    ID,
    FECHA,
    COD,
    NOM_PRODUCTO,
    CANTIDAD,
    ESTADO
    FROM
    SALIDAS_INV
    WHERE
    ESTADO = 'Rechazado'
    AND ENTREGA = $cedula";
    $consult = oci_parse($conexion, $sql);
    $result = oci_execute($consult);
    $i = 1;
    while($row = oci_fetch_array($consult, OCI_ASSOC)){
        $id = $row['ID'];
        ?>
        <div class="toast-conta<?php echo $i ?>">
            <div class="toast-new">
                <div class="toast-T">
                    <strong><img src="View/img/bet.webp" width="25"> <img src="https://img.icons8.com/ios-glyphs/24/fa314a/error.png"/>Producto Rechazado!!</strong>
                    <small><?php echo $row['FECHA']; ?></small>
                    <button class="toast-close" id="close<?php echo $i ?>">X</button>
                </div>
                <div class="toast-B">
                    <strong><?php echo $i,"# ",$row['NOM_PRODUCTO']; ?></strong>
                    <small>Cant. <?php echo $row['CANTIDAD']; ?></small>
                    <small><?php echo $row['ESTADO']; ?></small>
                </div>
                <div class="toast-F">
                    <button class="Aceptar" id="btnClose<?php echo $i ?>" onclick="aceptar(<?php echo $id ?>)">Aceptar</button>
                </div>
            </div>
        </div>
    <?php
    $i = $i + 1;
    }
}
*/
?>