<?php
require_once "Conexiones.php";

// Condicion de aceptar o rechazar productos

// Aceptar
if(isset($_POST['idA'])){
    //Busco el id
    $id = $_POST['idA'];
    $sql0 = "SELECT * FROM ENTREGAS WHERE ID = $id";
    $consult0 = oci_parse($conexion,$sql0);
    $result0 = oci_execute($consult0);
    while($row0 = oci_fetch_array($consult0,OCI_ASSOC)){
        $fecha = $row0['FECHA'];
        $cod = $row0['COD'];
        $responsable = $row0['RESPONSABLE'];
        $entrega = $row0['ENTREGA'];
    }
    //Actualizo si el boton fue aceptar
    $sql = "UPDATE ENTREGAS SET NOTIFICACION = 0, ESTADO = 'Aceptado' WHERE ID = $id";
    $consult = oci_parse($conexion,$sql);
    $result = oci_execute($consult);
    if($result){
        $sql2 = "UPDATE SALIDAS_INV SET ESTADO = 'Aceptado'
        WHERE
        FECHA = '$fecha'
        AND COD = $cod
        AND RESPONSABLE = $responsable
        AND ENTREGA = $entrega";
        $consult2 = oci_parse($conexion, $sql2);
        $result2 = oci_execute($consult2);
        if($result2){
            echo "Correcto";
        }
    }
// Rechazar
}elseif(isset($_POST['idR'])){
    $id = $_POST['idR'];
    $sql0 = "SELECT * FROM ENTREGAS WHERE ID = $id";
    $consult0 = oci_parse($conexion,$sql0);
    $result0 = oci_execute($consult0);
    while($row0 = oci_fetch_array($consult0,OCI_ASSOC)){
        $fecha = $row0['FECHA'];
        $cod = $row0['COD'];
        $responsable = $row0['RESPONSABLE'];
        $entrega = $row0['ENTREGA'];
    }
    $sql = "UPDATE ENTREGAS SET ESTADO = 'Rechazado', NOTIFICACION = 0 WHERE ID = $id";
    $consult = oci_parse($conexion,$sql);
    $result = oci_execute($consult);

    // Si es rechazado la tabla salidas_inv tendra un estado de devolucion
    if($result){
        $sql1 = "UPDATE SALIDAS_INV SET ESTADO = 'Rechazado'
        WHERE COD = $cod
        AND RESPONSABLE = $responsable
        AND ENTREGA = $entrega
        AND FECHA = '$fecha'";
        $consult1 = oci_parse($conexion,$sql1);
        $result1 = oci_execute($consult1);
        if($result1){
            $sql2 = "SELECT CANTIDAD 
            FROM SALIDAS_INV
            WHERE
            ESTADO = 'Rechazado'
            AND COD = $cod
            AND ENTREGA = $entrega
            AND FECHA = '$fecha'";
            $consult2 = oci_parse($conexion,$sql2);
            $result2 = oci_execute($consult2);
            
            // Y se actuliaza el inventario
            while($row2 = oci_fetch_array($consult2, OCI_ASSOC)){
                $cantA = $row2['CANTIDAD'];
            }
            $sql3 = "SELECT *
            FROM INVENTARIO
            WHERE COD_PRODUCTO = $cod";
            $consult3 = oci_parse($conexion,$sql3);
            $result3 = oci_execute($consult3);
            while($row3 = oci_fetch_array($consult3, OCI_ASSOC)){
                $stock = $row3['STOCK'];
            }
            $Total = $stock + $cantA;
            $sql4 = "UPDATE INVENTARIO SET STOCK = $Total WHERE COD_PRODUCTO = $cod";
            $consult4 = oci_parse($conexion,$sql4);
            $result4 = oci_execute($consult4);
            if($result4){
                echo "Correcto";
            }
        }
    }
}
?>