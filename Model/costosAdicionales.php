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
}
?>