<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="View/img/farmaibague.png">
    <link rel="stylesheet" href="View/css/Carga.css">
    <link rel="stylesheet" href="View/css/navbar.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Crear Usuarios</title>
</head>
<?php
require "header.php";
?>
<br>
<!-- Menu crear usuarios -->
<div class="container" style="background-color: white; border-radius: 10px; padding: 15px;">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <h3><img src="https://img.icons8.com/dotty/40/000000/add-user-male.png"/> Crear Usuarios</h3>
        </div>
    </div>
</div>
<br>
<div class="container" style="background-color: white; border-radius: 10px; padding: 15px;">
    <div class="row">
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
            <h4 id="validar">Correo</h4>
            <div class="form-floating">
                <input type="text" class="form-control" id="usuario" placeholder="name@example.com" onclick="validar1()" required>
                <label for="usuario">Correo</label>
            </div>
            <div id="caracteres" style="font-size: 12px"></div>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
            <h4>Contraseña</h4>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="pass" required>
                <label for="pass">Contraseña</label>
            </div>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
            <h4>Tipo de Usuario</h4>
            <div class="form-floating mb-3">
                <select class="form-select" name="tipo" id="tipo" required>
                    <option value="">Seleccione una opcion</option>
                    <option value="2">Administrador</option>
                    <option value="3">Vendedor</option>
                </select>
                <label for="tipo">Tipo de Usuario</label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
            <h4 id="validar2">Cedula</h4>
            <div class="form-floating">
                <input type="number" class="form-control" id="ced" max="9999999999" onclick="validar2()" required>
                <label for="ced">Cedula</label>
            </div>
            <div id="caracteres2" style="font-size: 12px"></div>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
            <h4>Nombres</h4>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="nombres" required>
                <label for="nombres">Nombres</label>
            </div>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
            <h4>Direccion</h4>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="direccion" required>
                <label for="direccion">Direccion</label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
            <h4 id="validar2">Celular</h4>
            <div class="form-floating">
                <input type="number" class="form-control" id="celular" max="9999999999" required>
                <label for="celular">Celular</label>
            </div>
            <div id="caracteres2" style="font-size: 12px"></div>
        </div>
    </div>
</div>
<br>
<div class="container" style="background-color: white; padding: 15px; border-radius: 10px">
    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
            <button class="btn btn-primary" id="Registrar" style="width: 100%" onclick="crearUsuario()">Registrar Usuario</button>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
            <a href="index.php?accion=<?php echo base64_encode("routePage")?>&ruta=<?php echo base64_encode("View/html/dashboard.php"); ?>"><button class="btn btn-secondary" id="Cancelar" style="width: 100%">Cancelar</button></a>
        </div>
    </div>
</div>
<!-- Jquery -->
<script src="View/js/jquery-3.6.0.js"></script>
<!-- Js Creado -->
<script src="View/js/usuarios.js"></script>
<!-- CDN bootstrap -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!-- Sweet Alert -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>