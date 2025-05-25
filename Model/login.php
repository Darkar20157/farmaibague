<?php
require_once "Conexiones.php";
session_start();
//Verificamos el usuario y mostramos un mensaje error o success
if(isset($_POST['user'])){
    try{
        $user = $_POST['user'];
        $sql = "SELECT
        EMAIL
        FROM
        USERS
        WHERE
        EMAIL = '$user'";
        $result = mysqli_query($conexion, $sql);
        while($row = mysqli_fetch_assoc($result)){
            $usuario = $row['EMAIL'];
        }
        if(!empty($usuario)){
            echo "correcto";
        }else{
            throw new Exception("No existe el usuario");
        }
    }catch(Exception $ex){
        echo $ex;
    }
//Verificar  Contraseña
}elseif(isset($_POST['pass1'])){
    try{
        $user = $_POST['user1'];
        $passInput = $_POST['pass1'];
        $sql = "SELECT
        *
        FROM
        USERS
        WHERE
        EMAIL = '$user'";
        $result = mysqli_query($conexion, $sql);
        while($row = mysqli_fetch_assoc($result)){
            $pass = $row['PASSWORDS'];
            $user = $row['EMAIL'];
            if(password_verify($passInput, $pass)){
                $_SESSION['NAME_USER'] = $row['EMAIL'];
                $_SESSION['TYPE_USER'] = $row['TYPE_USER'];
                echo "Correcto";
            }else{
                echo "Incorrecto";
            }
        }
    }catch(Exception $ex){
        echo $ex;
    }

}

?>