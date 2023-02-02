<?php
// Llamamos al controlador y a la conexion
require_once "Controller/controller.php";
require_once "Model/Conexiones.php";
$controller = new Controller; 
// Si la accion existe en la url
if(isset($_GET['accion'])){
    //Que decodifique la accion si es igual routePage
    if(base64_decode($_GET['accion']) == 'routePage'){
        // Llamamos a la funcion routePage del controlador y decimos que si es igual que la decodifique
        $controller->routePage($_GET['ruta']);
    }
    //Codicion si la accion es igual signOut que significa cerrar sesion que elimine todas la sesiones y la destruya
    switch($_GET['accion']){
        case 'signOut':
            session_start();
            unset($_SESSION["usuario"]);
            session_destroy();
            echo "<script>window.location='index.php';</script>";
        break;
    }
 
}else{
    require_once "View/html/login.php";
}


?>