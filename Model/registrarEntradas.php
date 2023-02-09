<?php
require_once "Conexiones.php";
date_default_timezone_set("America/Bogota");
//Insertar datos en la tabla entradas_inv
if(isset($_POST['cod_entrada'])){
    try {
        $fecha = date("Y-m-d H:i:s");
        $cod = $_POST['cod_entrada'];
        $producto = $_POST["producto_entrada"];
        $precio = $_POST['precio'];
        $cantidad = $_POST["cantidad_entrada"];
        $packaging = $_POST['packaging'];
        $novedad = $_POST["novedades"];
        $proveedor = $_POST['proveedor_producto'];
        $priceBuy = $_POST['priceBuy'];
        
        $sql3 = "SELECT AMOUNT FROM INVENTARIO WHERE BARCODE = $cod AND PACKAGING = '$packaging'";
        $consult3 = mysqli_query($conexion, $sql3);
        $row = mysqli_fetch_assoc($consult3);
        if(empty($row['AMOUNT'])){
            $sql3 = "INSERT INTO INVENTARIO (BARCODE, NAME_PRODUCT, AMOUNT, NIT_VENDOR, PRICE, PACKAGING) VALUES($cod, '$producto', $cantidad, '$proveedor', $precio, '$packaging')";
            $consult3 = mysqli_query($conexion, $sql3);
        }else{
            $amount = $row['AMOUNT'] + $cantidad;
            $sql = "UPDATE INVENTARIO SET AMOUNT = $amount WHERE BARCODE = $cod AND PACKAGING = '$packaging'";
            $consult = mysqli_query($conexion, $sql);
        }
        try{
            $sql4 = mysqli_query($conexion,"INSERT INTO DETAIL_INVENTORY (BARCODE, NAME_PRODUCT, AMOUNT, NIT_VENDOR, DATE_CREATION,
            PRICE_UNID, PACKAGING, PRICE_BUY, NOTES) VALUES($cod, '$producto', $cantidad, '$proveedor', '$fecha', $precio, '$packaging', $priceBuy, '$novedad')");
            
            if($sql4){
                echo "Correcto";
            }else{
                new Exception("Incorrecto");
            }
        }catch(Exception $ex){
            echo "Incorrecto ".$ex;
        }
    } catch (Throwable $th) {
        echo "Incorrecto ".$th;
    }
}elseif(isset($_POST['id'])){
    try{
        $id = $_POST['id'];
        $sql = "DELETE FROM DETAIL_INVENTORY WHERE ID = $id";
        $consult = mysqli_query($conexion, $sql);
        if($consult){
            echo "Correcto";
        }
    }catch(Exception $ex){
        echo "Incorrecto".$ex;
    }
}
?>