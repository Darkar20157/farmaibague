<?php
require_once "Conexiones.php";
date_default_timezone_set("America/Bogota");
//Insertar datos en la tabla entradas_inv
if(isset($_POST['cod_entrada'])){
    try {
        $fecha = date("Y-m-d H:i:s");
        $cod = mysqli_real_escape_string($conexion, $_POST['cod_entrada']);
        $producto = mysqli_real_escape_string($conexion, $_POST["producto_entrada"]);
        $precio = mysqli_real_escape_string($conexion, $_POST['precio']);
        $cantidad = mysqli_real_escape_string($conexion, $_POST["cantidad_entrada"]);
        $packaging = mysqli_real_escape_string($conexion, $_POST['packaging']);
        $novedad = mysqli_real_escape_string($conexion, $_POST["novedades"]);
        $proveedor = mysqli_real_escape_string($conexion, $_POST['proveedor_producto']);
        $priceBuy = mysqli_real_escape_string($conexion, $_POST['priceBuy']);        
        
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
        $id = mysqli_real_escape_string($conexion, $_POST['idEdit']);
        $nom = mysqli_real_escape_string($conexion, $_POST['nom']);
        $cant = mysqli_real_escape_string($conexion, $_POST['cant']);
        $pric = mysqli_real_escape_string($conexion, $_POST['pric']);
        $emb = mysqli_real_escape_string($conexion, $_POST['emb']);
        $preC = mysqli_real_escape_string($conexion, $_POST['preC']);
        $nov = mysqli_real_escape_string($conexion, $_POST['nov']);
                
        $sql = "UPDATE DETAIL_INVENTORY SET NAME_PRODUCT = '$nom', AMOUNT = $cant, PRICE_UNID = $pric, PACKAGING = '$emb', PRICE_BUY = $preC, NOTES = '$nov' WHERE ID = $id";
        $consult = mysqli_query($conexion, $sql);
        if($consult){
            // $sql1 = "SELECT BARCODE FROM DETAIL_INVENTORY WHERE ID = $id AND PACKAGING = '$emb'";
            // $consult1 = mysqli_query($conexion, $sql1);
            // $row = mysqli_fetch_assoc($consult1);
            // $barcode = $row['BARCODE'];
            // if($consult1){
            //     $sql2 = "UPDATE INVENTARIO SET NAME_PRODUCT = '$nom', PRICE = $pric, PACKAGING = '$emb' WHERE BARCODE = '$barcode'";
            //     $consult2 = mysqli_query($conexion, $sql2);
            //     if($consult2){
            //         echo "Correcto";
            //     }else{
            //         echo "Incorrecto";
            //     }
            // }
            echo "Correcto";
        }
    }catch(Exception $ex){
        echo "Incorrecto";
    }
}elseif(isset($_POST['idEditInv'])){
    try{
        $id = mysqli_real_escape_string($conexion, $_POST['idEditInv']);
        $nom = mysqli_real_escape_string($conexion, $_POST['nom']);
        $cant = mysqli_real_escape_string($conexion, $_POST['cant']);
        $pre = mysqli_real_escape_string($conexion, $_POST['pre']);
        $emb = mysqli_real_escape_string($conexion, $_POST['emb']);
        $nit = mysqli_real_escape_string($conexion, $_POST['nit']);

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