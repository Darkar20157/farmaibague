<!-- Loading -->
<div class="contenedor-loader">
    <img src="View/img/farmaibague.png" width="80"> <h2> FarmaIbague</h2>
    <div class="loader">
    </div>
</div>

<!-- Creando la sesion y consultamos si el usuario existe y que se le debe mostrar -->
<?php
$fecha_real = date("Y-m-d");
require "Model/Conexiones.php";
session_start();
$user = $_SESSION['NAME_USER'];
$sql = "SELECT
*
FROM
USERS
WHERE
EMAIL = '$user'";
$consul = mysqli_query($conexion,$sql);
while($row = mysqli_fetch_array($consul)){
    $TP = $row['TYPE_USER'];
    $nom = $row['NAME_USER'];
    $ced = $row['CED_NRO'];
}
//Menu de usuarios
if($TP == 1){
    ?>
<input type="hidden" id="cedula" value="<?php echo $ced ?>">
<input type="hidden" id="tipoUser" value="<?php echo $TP ?>">
<header>
    <nav class="nav">
        <div class="nav-left">
            <label for="btn-menu" id="btn"><img class="sub-menu" src="https://img.icons8.com/material-outlined/25/000000/menu--v1.png"/></label> <img src="View/img/farmaibague.png"><a class="dashboard" href=""> FarmaIbague </a>
        </div>
        <ul class="menu">
            <li class="iconos-menu1"><a href="index.php?accion=<?php echo base64_encode("routePage")?>&ruta=<?php echo base64_encode("View/html/dashboard.php"); ?>">Inicio</a></li>
            <li class="iconos-menu2">
                <div class="dropdown">
                    <a class="dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://img.icons8.com/office/25/ffffff/appointment-reminders--v1.png"/><span class="badge bg-danger" id="num"></span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><!--<a href="index.php?accion=<?php /*echo base64_encode("routePage")?>&ruta=<?php echo base64_encode("View/html/notificaciones.php");*/ ?>" class="dropdown-item">-->Notificaciones</a></li>
                    </ul>
                </div>
            </li>
            <li class="iconos-menu3">
                <div class="dropdown">
                    <a class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://img.icons8.com/office/25/ffffff/test-account.png"/> <?php echo $nom ?>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="index.php?accion=<?php echo base64_encode("routePage")?>&ruta=<?php echo base64_encode("View/html/cuentaUsuario.php"); ?>">Mi Cuenta</a></li>
                        <li><a class="dropdown-item" href="index.php?accion=<?php echo base64_encode("routePage")?>&ruta=<?php echo base64_encode("View/html/crearUsuarios.php"); ?> ">Crear Usuarios</a></li>
                        <li><a class="dropdown-item" href="index.php?accion=signOut">Cerrar Sesion</a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </nav>
</header>
<input type="checkbox" id="btn-menu" hidden>
<div class="container-menu">
    <nav class="menu-lateral">
        <br>
        <ul class="body">
            <a class="opt" href="index.php?accion=<?php echo base64_encode("routePage")?>&ruta=<?php echo base64_encode("View/html/gestion_productos.php"); ?>">Gestion Productos</a>
            <a class="opt" href="index.php?accion=<?php echo base64_encode("routePage")?>&ruta=<?php echo base64_encode("View/html/Entradas_Inv.php");?>">Entradas Inventario</a>
            <a class="opt" href="index.php?accion=<?php echo base64_encode("routePage")?>&ruta=<?php echo base64_encode("View/html/Salidas_Inv.php"); ?>">Ventas</a>
            <a class="opt" href="index.php?accion=<?php echo base64_encode("routePage")?>&ruta=<?php echo base64_encode("View/html/costos_adicionales.php"); ?>">Configuracion de Costos Adicionales</a>
        </ul>
    </nav>
    <label for="btn-menu" class="icon-equis"><h6>x</h6></label>
</div>
<div class="toast-apilado" id="div" hidden>
    
</div>
<?php
//Menu de Lider o auxiliar
}elseif($TP == 2 || $TP == 3){
?>
<input type="hidden" id="cedula" value="<?php echo $ced ?>">
<input type="hidden" id="tipoUser" value="<?php echo $TP ?>">
<header>
    <nav class="nav">
        <div class="nav-left">
            <label for="btn-menu" id="btn"><img class="sub-menu" src="https://img.icons8.com/material-outlined/25/000000/menu--v1.png"/></label> <img src="View/img/farmaibague.png"><a class="dashboard" href=""> FarmaIbague </a>
        </div>
        <ul class="menu">
            <li class="iconos-menu1">
                <a href="index.php?accion=<?php echo base64_encode("routePage")?>&ruta=<?php echo base64_encode("View/html/dashboard.php"); ?>">Inicio</a>
            </li>
            <li class="iconos-menu2">
                <div class="dropdown">
                    <a class="dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://img.icons8.com/office/25/ffffff/appointment-reminders--v1.png"/><span class="badge bg-danger" id="num"></span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><a href="index.php?accion=<?php echo base64_encode("routePage")?>&ruta=<?php echo base64_encode("View/html/notificaciones.php"); ?>" class="dropdown-item">Notificaciones</a></li>
                    </ul>
                </div>
            </li>
            <li class="iconos-menu3">
                <div class="dropdown">
                    <a class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://img.icons8.com/office/25/ffffff/test-account.png"/> <?php echo $nom ?>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="index.php?accion=<?php echo base64_encode("routePage")?>&ruta=<?php echo base64_encode("View/html/cuentaUsuario.php") ?>">Mi Cuenta</a></li>
                        <li><a class="dropdown-item" href="index.php?accion=signOut">Cerrar Sesion</a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </nav>
</header>
<input type="checkbox" id="btn-menu" hidden>
<div class="container-menu">
    <nav class="menu-lateral">
        <br>
        <ul class="body">
            <a class="opt" href="index.php?accion=<?php echo base64_encode("routePage")?>&ruta=<?php echo base64_encode("View/html/gestion_productos.php") ?>">Gestion Productos</a>
            <a class="opt" href="index.php?accion=<?php echo base64_encode("routePage")?>&ruta=<?php echo base64_encode("View/html/Entradas_Inv.php");?>">Entradas Inventario</a>
            <a class="opt" href="index.php?accion=<?php echo base64_encode("routePage")?>&ruta=<?php echo base64_encode("View/html/Salidas_Inv.php"); ?>">Ventas</a>
            <a class="opt" href="index.php?accion=<?php echo base64_encode("routePage")?>&ruta=<?php echo base64_encode("View/html/costos_adicionales.php"); ?>">Configuracion</a>
        </ul>
    </nav>
    <label for="btn-menu" class="icon-equis"><h6>x</h6></label>
</div>
<div class="toast-apilado" id="div" hidden>
    
</div>

<?php
}
?>