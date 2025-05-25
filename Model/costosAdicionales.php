<?php
require "Conexiones.php";
if(isset($_POST['prefix'])){
    try{
        $prefix = mysqli_real_escape_string($conexion, $_POST['prefix']);
        $dateInitial = mysqli_real_escape_string($conexion, $_POST['dateInitial']);
        $dateEnd = mysqli_real_escape_string($conexion, $_POST['dateEnd']);
        $rangeInitial = mysqli_real_escape_string($conexion, $_POST['rangeInitial']);
        $rangeFinal = mysqli_real_escape_string($conexion, $_POST['rangeFinal']);
        $nroAutorization = mysqli_real_escape_string($conexion, $_POST['nroAutorization']);
        $codeTechnical = mysqli_real_escape_string($conexion, $_POST['codeTechnical']);        
        $sql = "INSERT INTO RESOLUTION(CODE_RESOLUTION, ISSUE_DATE_START, ISSUE_DATE_END, RANGE_INITIAL, RANGE_END, NRO_AUTORIZATION, CODE_TECHNICAL) 
        VALUES('$prefix', '$dateInitial', '$dateEnd', $rangeInitial, $rangeFinal, $nroAutorization, '$codeTechnical')";
        $consult = mysqli_query($conexion, $sql);
        if($consult){
            echo "Correcto";
        }
    }catch(Exception $ex){
        echo $ex;
    }
}
if(isset($_POST['cost'])){
    try{
        $name = mysqli_real_escape_string($conexion, $_POST['cost']);
        $price = mysqli_real_escape_string($conexion, $_POST['value']);        
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
        $name = mysqli_real_escape_string($conexion, $_POST['name']);
        $price = mysqli_real_escape_string($conexion, $_POST['price']);
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
        $name = mysqli_real_escape_string($conexion, $_POST['method']);
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
        $id = mysqli_real_escape_string($conexion, $_POST['id']);
        $table = mysqli_real_escape_string($conexion, $_POST['type']);        
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
        $nit = mysqli_real_escape_string($conexion, $_POST['nit']);
        $name = mysqli_real_escape_string($conexion, $_POST['name_vendor']);
        $dir = mysqli_real_escape_string($conexion, $_POST['dir']);
        $tel = mysqli_real_escape_string($conexion, $_POST['tel']);        
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
        $presentacion = mysqli_real_escape_string($conexion, $_POST['pre']);
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
        $id = mysqli_real_escape_string($conexion, $_POST['id']);
        $type = mysqli_real_escape_string($conexion, $_POST['table']);
        $name = mysqli_real_escape_string($conexion, $_POST['names']);
        $email = mysqli_real_escape_string($conexion, $_POST['email']);
        $address = mysqli_real_escape_string($conexion, $_POST['address']);
        $phone = mysqli_real_escape_string($conexion, $_POST['phone']);
        $gender = mysqli_real_escape_string($conexion, $_POST['gender']);        
        $sql = "UPDATE $type SET NAMES = '$name', EMAIL = '$email', ADDRES = '$address', PHONE = '$phone', GENDER = '$gender'
        WHERE CED_NRO = $id";
        $consult = mysqli_query($conexion, $sql);
        if($consult){
            echo "Correcto";
        }
    }catch(Exception $ex){
        echo $ex;
    }
}elseif (isset($_POST['nitProv'])) {
    try {
        $id = $_POST['id'];
        $nitProv = $_POST['nitProv'];
        $nomProv = $_POST['nomProv'];
        $dirProv = $_POST['dirProv'];
        $telProv = $_POST['telProv'];
        $sql = "UPDATE VENDORS SET NIT_VENDOR = '$nitProv', NAME_VENDOR = '$nomProv', ADDRESS_VENDOR = '$dirProv', PHONE_VENDOR = '$telProv' WHERE ID = '$id'";
        $consult = mysqli_query($conexion, $sql);
        if($consult){
            echo "Correcto";
        }
    }catch(Exception $ex){
        echo $ex;
    }
}
?>