<?php
require_once "Conexiones.php";
//Miramos quien tiene notificaciones
if(isset($_POST['ced'])){
    $cedula = $_POST['ced'];
    $sql = "SELECT
    *
    FROM
    ENTREGAS
    WHERE
    RESPONSABLE = $cedula
    AND NOTIFICACION = 1
    AND ESTADO = 'En Proceso'";
    $consult = oci_parse($conexion, $sql);
    $result = oci_execute($consult);
    $i = 1;
    while($row = oci_fetch_array($consult,OCI_ASSOC)){
        if($i > 3){
            break;
        }
        $cedula = $row['ENTREGA'];
        $nombre = $row['NOM_ENT'];
        $id = $row['ID'];
        //Mostramos las notificaciones
        ?>
        <div class="toast-conta<?php echo $i ?>">
            <div class="toast-new">
                <div class="toast-T">
                    <strong><img src="View/img/bet.webp" width="25"> Tienes un nuevo producto!</strong>
                    <small><?php echo $row['FECHA']; ?></small>
                    <button class="toast-close" id="close<?php echo $i ?>">X</button>
                </div>
                <div class="toast-B">
                    <strong><?php echo $i,"# ",$row['NOM_PRODUCTO']; ?></strong>
                    <small>Cant. <?php echo $row['CANTIDAD']; ?></small>
                    <small><?php echo $nombre; ?></small>
                </div>
                <div class="toast-F">
                    <button class="Aceptar" id="btnClose<?php echo $i ?>" onclick="aceptar(<?php echo $id ?>)">Aceptar</button>
                    <button class="Rechazar" id="btnCloseR<?php echo $i ?>" onclick="rechazar(<?php echo $id ?>)">Rechazar</button>
                </div>
            </div>
        </div>
        <?php
        if($i + 1 > 3){
            ?>
            <div class="subtitle">
                <strong><img src="View/img/bet.webp" width="25"> Tienes mas notificaciones Revisalos!</strong>
                <button class="toast-close" id="close0">X</button>
            </div>
        <?php
        }
        $i = $i + 1;
        ?>
    <?php
    }
    //Contamos cuantas notificaciones tenemos
}elseif(isset($_POST['cedula'])){
    $cedula = $_POST['cedula'];
    $sql = "SELECT
    COUNT(NOTIFICACION) AS NOTI
    FROM
    ENTREGAS
    WHERE
    NOTIFICACION = 1
    AND RESPONSABLE = $cedula";
    $consult = oci_parse($conexion,$sql);
    $result = oci_execute($consult);
    while($row = oci_fetch_array($consult,OCI_ASSOC)){
        $num_notifi = $row['NOTI'];
    }
    echo $num_notifi;
}