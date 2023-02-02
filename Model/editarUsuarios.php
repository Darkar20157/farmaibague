<?php
require_once "Conexiones.php";
//Cambiamos datos del usuario
$ced = $_POST['ced'];
$user = $_POST['user'];
$pass = $_POST['pass'];
$Cpass = $_POST['Cpass'];
$nom = $_POST['nom'];
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