<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="View/img/bet.webp">
    <link rel="stylesheet" href="View/css/Carga.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="View/css/navbar.css">
    <link rel="stylesheet" href="View/css/toast.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Notificaciones</title>
</head>
<body>

<!-- Loading -->
<div class="contenedor-loader">
    <img src="View/img/bet.webp" width="80"><h2> Betplay</h2>
    <div class="loader">
    </div>
</div>

<?php
require "Model/Conexiones.php";
session_start();
$user = $_SESSION['usuario'];
$sql = "SELECT
*
FROM
USUARIOS
WHERE
NOM_USUARIOS = '$user'";
$consul = oci_parse($conexion,$sql);
$resul = oci_execute($consul);
while($row = oci_fetch_array($consul)){
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
        </ul>
    </nav>
    <label for="btn-menu" class="icon-equis"><h6>x</h6></label>
</div>
<div class="toast-apilado" id="div">
    
</div>
<!-- Jquery -->
<script src="View/js/jquery-3.6.0.js"></script>
<!-- CDN bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
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
<div class="toast-apilado" id="div" hidden>
    
</div>
<br>
<!-- Consulta para ver las notificaciones -->
<div class="container">
    <div class="row">
        <div class="col-12">
            <h3><img src="https://img.icons8.com/office/25/ffffff/appointment-reminders--v1.png"/> Notificaciones</h3>
        </div>
    </div>
</div>
<br>
<?php
$sql = "SELECT
*
FROM
SALIDAS_INV
WHERE
ESTADO = 'Rechazado'
AND ENTREGA = $ced";
$consult = oci_parse($conexion, $sql);
$result = oci_execute($consult);
?>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <h4>Productos Rechazados</h4>
            <br>
            <div class="list-group">
                <?php
                while($row = oci_fetch_array($consult, OCI_ASSOC)){
                    $id = $row['ID'];
                    $cedRechazo = $row['RESPONSABLE'];
                    $sql1 = "SELECT NOMBRE, APELLIDO FROM USUARIOS WHERE CEDULA = $cedRechazo";
                    $consult1 = oci_parse($conexion, $sql1);
                    $result1 = oci_execute($consult1);
                    while($row1 = oci_fetch_array($consult1, OCI_ASSOC)){
                        $nom = $row1['NOMBRE'];
                        $ape = $row1['APELLIDO'];
                        $Tnom = $nom." ".$ape;
                    }
                ?>
                <a href="#" class="list-group-item list-group-item-action" aria-current="true" id="<?php echo $id ?>">
                    <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1"><img src="https://img.icons8.com/ios-glyphs/24/fa314a/error.png"/> Te han Rechazado un Producto!!</h5>
                    <small><?php echo $row['FECHA']; ?></small>
                    </div>
                    <h5 style="text-align: center;">Datos del Rechazo</h5>
                    <div class="d-flex w-100 justify-content-between">
                        <p class="mb-1">Cedula: <?php echo $row['RESPONSABLE']; ?></p>
                        <p class="mb-1">Nombre: <?php echo $Tnom; ?></p>
                        <p class="mb-1">Producto: <?php echo $row['COD']," - ",$row['NOM_PRODUCTO']; ?></p>
                    </div>
                    <small>Cant. <?php echo $row['CANTIDAD']; ?></small>
                    <small style="margin-left: 890px">Estado. <?php echo $row['ESTADO']; ?></small>
                    <br>
                    <button class="btn btn-success" style="width: 100%;" onclick="aceptarNoti(<?php echo $id ?>)">Aceptar</button>
                </a>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
<!-- Jquery -->
<script src="View/js/jquery-3.6.0.js"></script>
<!-- CDN bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<!-- Js creados -->
<script src="View/js/notificacionesAdmin.js"></script>
<script src="View/js/navbar.js"></script>

<?php
}elseif($TP == "Lider Comercial" OR $TP == "Aux. Betplay"){
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
            <a class="opt" href="index.php?accion=<?php echo base64_encode("routePage")?>&ruta=<?php echo base64_encode("View/html/inventarioLider.php");?>">Inventario General</a>
        </ul>
    </nav>
    <label for="btn-menu" class="icon-equis"><h6>x</h6></label>
</div>
<div class="toast-apilado" id="div" hidden>
    
</div>
<br>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <h3><img src="https://img.icons8.com/office/25/ffffff/appointment-reminders--v1.png"/> Notificaciones</h3>
        </div>
    </div>
</div>
<!-- Consulta para ver las notificaciones -->
<?php
$sql1 = "SELECT *
FROM
ENTREGAS
WHERE
RESPONSABLE = $ced
AND NOTIFICACION = 1";
$consult1 = oci_parse($conexion, $sql1);
$result1 = oci_execute($consult1);
?>
<br>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <h4>Productos entregados</h4>
            <br>
            <div class="list-group">
                <?php
                while($row1 = oci_fetch_array($consult1, OCI_ASSOC)){
                    $id = $row1['ID'];
                ?>
                <a href="#" class="list-group-item list-group-item-action" aria-current="true" id="<?php echo $id ?>">
                    <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1"><img src="View/img/bet.webp" width="25"> Tienes un Nuevo Producto!!</h5>
                    <small>Cant. <?php echo $row1['CANTIDAD']; ?></small>
                    </div>
                    <p class="mb-1"><?php echo $row1['COD']," - ",$row1['NOM_PRODUCTO']; ?></p>
                    <small><?php echo $row1['NOM_ENT']; ?></small>
                    <small><span class="badge bg-warning"><?php echo $row1['ESTADO']; ?></span></small><br><br>
                    <button class="btn btn-success" style="width: 100%; margin-left: 10px;" onclick="aceptarAux(<?php echo $id ?>)">Aceptar</button>
                    <button class="btn btn-danger" style="width: 100%; margin-left: 10px; margin-top: 2%;" onclick="rechazarAux(<?php echo $id ?>)">Rechazar</button>
                </a>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
<!-- Jquery -->
<script src="View/js/jquery-3.6.0.js"></script>
<!-- CDN bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<!-- Js creado -->
<script src="View/js/notificacionesAdmin.js"></script>
<script src="View/js/navbar.js"></script>

<?php
}
?>
<script>
    $(document).ready(function(){
        const loader = document.querySelector(".contenedor-loader");
        loader.style.opacity = 0
        loader.style.visibility = 'hidden';
    })
</script>
</body>
</html>