<?php
require "Conexiones.php";
if(isset($_POST['cost'])){
    try{
        $name = $_POST['cost'];
        $price = $_POST['value'];
        $sql = "INSERT INTO COST_ADDITIONAL(COST_ADDITIONAL, PRICE) VALUES('$name', $price)";
        $consult = mysqli_query($conexion, $sql);
    if($consult){
        echo "Correcto";
    }
    }catch(Exception $ex){
        echo $ex;
    }
}elseif(isset($_POST['name'])){
    try{
        $name = $_POST['name'];
        $price = $_POST['price'];
        $sql = "INSERT INTO DISCOUNTS(DISCOUNT_NAME, DISCOUNT_PRICE) VALUES('$name', $price)";
        $consult = mysqli_query($conexion, $sql);
    if($consult){
        echo "Correcto";
    }
    }catch(Exception $ex){
        echo $ex;
    }
}elseif(isset($_POST['method'])){
    try{
        $name = $_POST['method'];
        $sql = "INSERT INTO PAYMENT_METHOD(PAYMENT_NAME) VALUES('$name')";
        $consult = mysqli_query($conexion, $sql);
    if($consult){
        echo "Correcto";
    }
    }catch(Exception $ex){
        echo $ex;
    }
}elseif(isset($_POST['type'])){
    try{
        $id = $_POST['id'];
        $table = $_POST['type'];
        $sql = "DELETE FROM $table WHERE ID = $id";
        $consult = mysqli_query($conexion, $sql);
    if($consult){
        echo "Correcto";
    }
    }catch(Exception $ex){
        echo $ex;
    }
}elseif(isset($_POST['nit'])){
    try{
        $nit = $_POST['nit'];
        $name = $_POST['name_vendor'];
        $dir = $_POST['dir'];
        $tel = $_POST['tel'];
        $sql = "INSERT INTO VENDORS(NIT_VENDOR, NAME_VENDOR, ADDRESS_VENDOR, PHONE_VENDOR) VALUES('$nit', '$name', '$dir', $tel)";
        $consult = mysqli_query($conexion, $sql);
    if($consult){
        echo "Correcto";
    }
    }catch(Exception $ex){
        echo $ex;
    }
}elseif(isset($_POST['pre'])){
    try{
        $presentacion = $_POST['pre'];
        $sql = "INSERT INTO PRESENTACION (PRESENTACION) VALUES('$presentacion')";
        $consult = mysqli_query($conexion, $sql);
        if($consult){
            echo "Correcto";
        }
    }catch(Exception $ex){
        echo $ex;
    }
}elseif(isset($_POST['table'])){
    try{
        $id = $_POST['id'];
        $type = $_POST['table'];
        $name = $_POST['names'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $gender = $_POST['gender'];
        $sql = "UPDATE $type SET NAMES = '$name', EMAIL = '$email', ADDRES = '$address', PHONE = '$phone', GENDER = '$gender'
        WHERE CED_NRO = $id";
        $consult = mysqli_query($conexion, $sql);
        if($consult){
            echo "Correcto";
        }
    }catch(Exception $ex){
        echo $ex;
    }
}
?>