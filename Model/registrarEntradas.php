<?php
require_once "Conexiones.php";
//Insertar datos en la tabla entradas_inv
if(isset($_POST['cod_entrada'])){
    try {
        $fecha = $_POST["fecha_entradas"];
        $fecha = date('Y-m-d H:i:s', strtotime($fecha));
        $cod = $_POST['cod_entrada'];
        $producto = $_POST["producto_entrada"];
        $cantidad = $_POST["cantidad_entrada"];
        $novedad = $_POST["novedades"];
        // $categoria = $_POST["categoria"];
        // $detProduc = $_POST['marca_producto'];
        $proveedor = $_POST['proveedor_producto'];
        $precio = $_POST['precio'];
        
        $sql3 = "SELECT AMOUNT FROM INVENTARIO WHERE BARCODE = $cod";
        $consult3 = mysqli_query($conexion, $sql3);
        $row = mysqli_fetch_assoc($consult3);
        if(empty($row['AMOUNT'])){
            $sql3 = "INSERT INTO INVENTARIO (BARCODE, NAME_PRODUCT, AMOUNT, NIT_VENDOR, PRICE_UNID) VALUES($cod, '$producto', $cantidad, '$proveedor', $precio)";
            //$consult3 = mysqli_query($conexion, $sql3);
        }else{
            $amount = $row['AMOUNT'] + $cantidad;
            $sql = "UPDATE INVENTARIO SET AMOUNT = $amount WHERE BARCODE = $cod";
            $consult = mysqli_query($conexion, $sql);
        }
        try{
            $sql4 = mysqli_query($conexion,"INSERT INTO DETAIL_INVENTORY (BARCODE, NAME_PRODUCT, AMOUNT, NIT_VENDOR, DATE_CREATION,
            PRICE_UNID, NOTES) VALUES($cod, '$producto', $cantidad, '$proveedor', '$fecha', $precio, '$novedad')");
            
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
}
?>