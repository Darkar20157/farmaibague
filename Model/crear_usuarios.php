<?php
require_once "Conexiones.php";

//Validamos si el usuario existe o no
if(isset($_POST['validar'])){
    $user = $_POST['validar'];
    $sql = "SELECT * FROM USERS WHERE EMAIL = '$user'";
    $consult = mysqli_query($conexion,$sql);
    while($row = mysqli_fetch_assoc($consult, MYSQLI_ASSOC)){
        $cedula = $row['CED_NRO'];
    }
    if($cedula == ""){
        echo "No existe";
    }else{
        echo "Si existe";
    }

//Validamos si la cedula existe o no
}elseif(isset($_POST['validar2'])){
    $ced = $_POST['validar2'];
    $sql = "SELECT * FROM USERS WHERE CED_NRO = '$ced'";
    $consult = mysqli_query($conexion, $sql);
    while($row = mysqli_fetch_assoc($consult)){
        $user = $row['EMAIL'];
    }
    if($user == ""){
        echo "No existe";
    }else{
        echo "Si existe";
    }
    
//Creamos un nuevo usuario
}elseif(isset($_POST['user'])){
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $tipe = $_POST['tipe'];
    $ced = $_POST['ced'];
    $nom = $_POST['nom'];
    $dir = $_POST['dir'];
    $cel = $_POST['cel'];
    $Npass = password_hash($pass, PASSWORD_DEFAULT);

    $sql = mysqli_query($conexion, "INSERT INTO USERS(NAME_USER, CED_NRO, PASSWORDS, EMAIL, ADDRES, PHONE, TYPE_USER) 
    VALUES('$nom', $ced, '$Npass', '$user', '$dir', $cel, $tipe)");

    if($sql){
        echo "Correcto";
    }else{
        echo "Incorrecto";
    }
}

?>