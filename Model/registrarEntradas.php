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
}elseif(isset($_POST['idEdit'])){
    try{
        $id = $_POST['idEdit'];
        $nom = $_POST['nom'];
        $cant = $_POST['cant'];
        $pric = $_POST['pric'];
        $emb = $_POST['emb'];
        $preC = $_POST['preC'];
        $nov = $_POST['nov'];
        $sql = "UPDATE DETAIL_INVENTORY SET NAME_PRODUCT = '$nom', AMOUNT = $cant, PRICE_UNID = $pric, PACKAGING = '$emb', PRICE_BUY = $preC, NOTES = '$nov' WHERE ID = $id";
        $consult = mysqli_query($conexion, $sql);
        if($consult){
            echo "Correcto";
        }
    }catch(Exception $ex){
        echo "Incorrecto";
    }
}elseif(isset($_POST['idEditInv'])){
    try{
        $id = $_POST['idEditInv'];
        $nom = $_POST['nom'];
        $cant = $_POST['cant'];
        $pre = $_POST['pre'];
        $emb = $_POST['emb'];
        $nit = $_POST['nit'];
        $sql = "UPDATE INVENTARIO SET NAME_PRODUCT = '$nom', AMOUNT = $cant, NIT_VENDOR = '$nit', PRICE = $pre, PACKAGING = '$emb' WHERE ID = $id";
        $consult = mysqli_query($conexion, $sql);
        if($consult){
            echo "Correcto";
        }
    }catch(Exception $ex){
        echo "Incorrecto";
    }
}elseif(isset($_POST['idInv'])){
    try{
        $id = $_POST['idInv'];
        $sql = "DELETE FROM INVENTARIO WHERE ID = $id";
        $consult = mysqli_query($conexion, $sql);
        if($consult){
            echo "Correcto";
        }
    }catch(Exception $ex){
        echo "Incorrecto".$ex;
    }
}
?>