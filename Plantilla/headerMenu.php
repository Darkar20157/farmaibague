<!-- Loading --> 
<div class="contenedor-loader">
    <img src="View/img/bet.webp" width="80"><h2> Betplay</h2>
    <div class="loader">
    </div>
</div>
<!-- Creando la sesion y consultamos si el usuario existe y que se le debe mostrar -->
<?php
require "Model/Conexiones.php";
echo $conectado;
session_start();
$user = $_SESSION['usuario'];
if($user == null){
    require "Error.php";
    die;
}
$sql = "SELECT
*
FROM
USUARIOS
WHERE
NOM_USUARIOS = '$user'";
$consul = oci_parse($conexion,$sql);
$resul = oci_execute($consul);
while($row = oci_fetch_array($consul,OCI_ASSOC)){
    $TP = $row['TIPO_USER'];
    $nom = $row['NOMBRE'];
    $ape = $row['APELLIDO'];
    $ced = $row['CEDULA'];
}
$Tnom = $nom." ".$ape;
?>
<?php
//Super administrador
if($TP == "Super Administrador"){
    ?>
<input type="hidden" id="cedula" value="<?php echo $ced ?>">
<input type="hidden" id="tipoUser" value="<?php echo $TP ?>">
<header>
    <nav class="nav">
        <div class="nav-left">
            <label for="btn-menu" id="btn"><img class="sub-menu" src="https://img.icons8.com/material-outlined/25/000000/menu--v1.png"/></label> <img src="View/img/bet.webp"><a class="dashboard" href=""> Betplay </a>
        </div>
        <ul class="menu">
            <li class="iconos-menu1"><a href="index.php?accion=<?php echo base64_encode("routePage")?>&ruta=<?php echo base64_encode("View/html/dashboard.php"); ?>">Inicio</a></li>
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
                        <img src="https://img.icons8.com/office/25/ffffff/test-account.png"/> <?php echo $Tnom ?>
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
            <a class="opt" href="index.php?accion=<?php echo base64_encode("routePage")?>&ruta=<?php echo base64_encode("View/html/Entradas_Inv.php");?>">Entradas Inventario</a>
            <a class="opt" href="index.php?accion=<?php echo base64_encode("routePage")?>&ruta=<?php echo base64_encode("View/html/Salidas_Inv.php"); ?>">Salidas Inventario</a>
            <a class="opt" href="index.php?accion=<?php echo base64_encode("routePage")?>&ruta=<?php echo base64_encode("View/html/Inventario_Admin.php"); ?>">Inventario</a>
            <a class="opt" href="index.php?accion=<?php echo base64_encode("routePage")?>&ruta=<?php echo base64_encode("View/html/inventarioLider.php"); ?>">Inventario Lider</a>
            <a class="opt" href="index.php?accion=<?php echo base64_encode("routePage")?>&ruta=<?php echo base64_encode("View/html/inventarioBTL.php"); ?>">Inventario BTL</a>
        </ul>
    </nav>
    <label for="btn-menu" class="icon-equis"><h6>x</h6></label>
</div>
<div class="toast-apilado" id="div">
    
</div>
<!-- Jquery -->
<script src="View/js/jquery-3.6.0.js"></script>
<!-- CDN bootstrap -->
<script src="View/js/bootstrap.bundle.min.js"></script>
<!-- Js creados -->
<script src="View/js/dashboard.js"></script>
<script src="View/js/navbar.js"></script>
<?php
//Menu de Administrador
}elseif($TP == "Administrador"){
?>
<input type="hidden" id="cedula" value="<?php echo $ced ?>">
<input type="hidden" id="tipoUser" value="<?php echo $TP ?>">
<header>
    <nav class="nav">
        <div class="nav-left">
            <label for="btn-menu" id="btn"><img class="sub-menu" src="https://img.icons8.com/material-outlined/25/000000/menu--v1.png"/></label> <img src="View/img/bet.webp"><a class="dashboard" href=""> Betplay </a>
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
                        <img src="https://img.icons8.com/office/25/ffffff/test-account.png"/> <?php echo $Tnom ?>
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
            <a class="opt" href="index.php?accion=<?php echo base64_encode("routePage")?>&ruta=<?php echo base64_encode("View/html/Entradas_Inv.php");?>">Entradas Inventario</a>
            <a class="opt" href="index.php?accion=<?php echo base64_encode("routePage")?>&ruta=<?php echo base64_encode("View/html/Salidas_Inv.php"); ?>">Salidas Inventario</a>
            <a class="opt" href="index.php?accion=<?php echo base64_encode("routePage")?>&ruta=<?php echo base64_encode("View/html/Inventario_Admin.php") ?>">Inventario</a>
            <a class="opt" href="index.php?accion=<?php echo base64_encode("routePage")?>&ruta=<?php echo base64_encode("View/html/inventarioBTL.php"); ?>">Inventario BTL</a>
        </ul>
    </nav>
    <label for="btn-menu" class="icon-equis"><h6>x</h6></label>
</div>
<div class="toast-apilado" id="div">
    
</div>

<!-- Jquery -->
<script src="View/js/jquery-3.6.0.js"></script>
<!-- CDN bootstrap -->
<script src="View/js/bootstrap.bundle.min.js"></script>
<!-- Js creados -->
<script src="View/js/navbar.js"></script>
<script src="View/js/notificacionesAdmin.js"></script>
<?php
}
?>