<?php
require "Conexiones.php";
//Consultamos en entradas los siguientes datos
if(isset($_POST['cod'])){
    $cod = $_POST['cod'];
    $sql = "SELECT 
    *
    FROM DETAIL_ART
    WHERE BARCODE = '$cod'";
    $consult = mysqli_query($conexion,$sql);
    $array = mysqli_fetch_assoc($consult);
    $JSON = json_encode($array);
    print_r($JSON);
}elseif(isset($_POST['nit'])){
    $nit = $_POST['nit'];
    $sql = "SELECT 
    * 
    FROM VENDORS
    WHERE NIT_VENDOR = '$nit'";
    $consult = mysqli_query($conexion, $sql);
    $array = mysqli_fetch_assoc($consult);
    $JSON = json_encode($array);
    print_r($JSON);
}elseif(isset($_POST['barcode'])){
    $cod = $_POST['barcode'];
    $sql = "SELECT * 
    FROM 
    INVENTARIO INV 
    INNER JOIN DETAIL_ART DA 
    ON INV.BARCODE = DA.BARCODE
    WHERE INV.BARCODE = $cod";
    $consult = mysqli_query($conexion,$sql);
    $array = mysqli_fetch_assoc($consult);
    $JSON = json_encode($array);
    print_r($JSON);
}

?>