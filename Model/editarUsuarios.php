<?php
require_once "Conexiones.php";
//Cambiamos datos del usuario
$ced = mysqli_real_escape_string($conexion, $_POST['ced']);
$user = mysqli_real_escape_string($conexion, $_POST['user']);
$pass = mysqli_real_escape_string($conexion, $_POST['pass']);
$Cpass = mysqli_real_escape_string($conexion, $_POST['Cpass']);
$nom = mysqli_real_escape_string($conexion, $_POST['nom']);
if($pass != $Cpass){
    die("Error pass");
}
$Npass = password_hash($pass, PASSWORD_DEFAULT);
$sql = "UPDATE USERS SET EMAIL = '$user', PASSWORDS = '$Npass', NAME_USER = '$nom' WHERE CED_NRO = $ced";
$consul = mysqli_query($conexion,$sql);
if($consul){
    echo "Correcto";
}else{
    echo "No se pudo actualizar intenta nuevamente";
}

?>