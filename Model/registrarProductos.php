<?php
require 'Conexiones.php';
if(isset($_POST['gra'])){
    //Guarda Producto
    try {
        $cod = mysqli_real_escape_string($conexion, $_POST['cod']);
        $nom = mysqli_real_escape_string($conexion, $_POST['nom']);
        $gra = mysqli_real_escape_string($conexion, $_POST['gra']);
        $marca = mysqli_real_escape_string($conexion, $_POST['marca']);
        $precio = mysqli_real_escape_string($conexion, $_POST['precio']);
        $notes = mysqli_real_escape_string($conexion, $_POST['notes']);
        $sql = "INSERT INTO DETAIL_ART(BARCODE, NAME_PRODUCT, GRAMMAGE_MINIMETERAGE, BRAND, PRICE, NOTE) VALUES ($cod, '$nom', '$gra', '$marca', $precio, '$notes')";
        $consult = mysqli_query($conexion, $sql);
        if($consult){
            echo "Correcto";
        }else{
            echo "Incorrecto";
        }
    } catch (Exception $ex) {
        echo "Error: ".$ex;
    }
}elseif(isset($_POST['code'])){
    //Elimina Producto
    try {
        $code = $_POST['code'];
        $sql = "DELETE FROM DETAIL_ART WHERE BARCODE = $code";
        $consult = mysqli_query($conexion, $sql);
        if($consult){
            echo "Correcto";
        }else{
            echo "Incorrecto";
        }
    } catch (Exception $ex) {
        echo "Error: ".$ex;
    }
}elseif(isset($_POST['edit_code'])){
    //Edita Producto
    try {
        $code = mysqli_real_escape_string($conexion, $_POST['edit_code']);
        $nom = mysqli_real_escape_string($conexion, $_POST['edit_nom']);
        $gram = mysqli_real_escape_string($conexion, $_POST['edit_gramos']);
        $marca = mysqli_real_escape_string($conexion, $_POST['edit_marca']);
        $precio = mysqli_real_escape_string($conexion, $_POST['edit_precio']);
        $notes = mysqli_real_escape_string($conexion, $_POST['edit_notes']);
        
        $sql = "UPDATE DETAIL_ART SET BARCODE = $code, NAME_PRODUCT = '$nom', GRAMMAGE_MINIMETERAGE = '$gram', BRAND = '$marca', PRICE = $precio, NOTE = '$notes' WHERE BARCODE = $code";
        $consult = mysqli_query($conexion, $sql);
        if($consult){
            $sql2 = "UPDATE DETAIL_INVENTORY SET BARCODE = $code, NAME_PRODUCT = '$nom', PRICE_UNID = $precio WHERE BARCODE = $code";
            $consult2 = mysqli_query($conexion, $sql2);
            if($consult2){
                $sql3 = "UPDATE INVENTARIO SET BARCODE = $code, NAME_PRODUCT = '$nom', PRICE = $precio WHERE BARCODE = $code";
                $consult3 = mysqli_query($conexion, $sql3);
                if($consult3){
                    echo "Correcto";
                }
            }
        }else{
            echo "Incorrecto";
        }
    } catch (Exception $ex) {
        echo "Error: ".$ex;
    }
}elseif(isset($_POST['val'])){
    //Valida Producto Existente
    $cod = $_POST['val'];
    $sql = "SELECT BARCODE FROM DETAIL_ART WHERE BARCODE = $cod";
    $consult = mysqli_query($conexion, $sql);
    if($consult){
        $result = mysqli_fetch_assoc($consult);
        if(empty($result['BARCODE'])){
            echo "Correcto";
        }else{
            echo "Incorrecto";
        }
    }

}
?>