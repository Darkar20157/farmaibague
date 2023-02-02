<?php
require 'Conexiones.php';
if(isset($_POST['gra'])){
    //Guarda Producto
    try {
        $cod = $_POST['cod'];
        $nom = $_POST['nom'];
        $gra = $_POST['gra'];
        $marca = $_POST['marca'];
        $precio = $_POST['precio'];
        $notes = $_POST['notes'];
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
        $code = $_POST['edit_code'];
        $nom = $_POST['edit_nom'];
        $gram = $_POST['edit_gramos'];
        $marca = $_POST['edit_marca'];
        $precio = $_POST['edit_precio'];
        $notes = $_POST['edit_notes'];
        $sql = "UPDATE DETAIL_ART SET BARCODE = $code, NAME_PRODUCT = '$nom', GRAMMAGE_MINIMETERAGE = '$gram', BRAND = '$marca', PRICE = $precio, NOTE = '$notes' WHERE BARCODE = $code";
        $consult = mysqli_query($conexion, $sql);
        if($consult){
            echo "Correcto";
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