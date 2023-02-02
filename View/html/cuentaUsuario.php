<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="View/css/Carga.css">
    <link rel="icon" href="View/img/farmaibague.png">
    <link rel="stylesheet" href="View/css/Carga.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="View/css/navbar.css">
    <link rel="stylesheet" href="View/css/toast.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Mi Cuenta</title>
</head>
<body style="background-color: whitesmoke">
<?php
require "header.php"
?>
<div class="container" style="background-color: white; border-radius: 10px">
    <br>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <h3><img src="https://img.icons8.com/windows/32/000000/edit-user.png"/> Mi cuenta</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="alert alert-danger d-flex align-items-center" role="alert">
                <div>
                    <img src="https://img.icons8.com/ios-glyphs/25/fa314a/error--v1.png"/> Si editas tu usuario obligatoriamente tienes que cambiar la contraseña
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<div class="container" style="background-color: white; border-radius: 10px; padding: 20px">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card mb-3" style="max-width: 100%;">
                <div class="row g-0">
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                        <img src="https://img.icons8.com/officel/180/ffffff/edit-user-male.png" style="padding: 60px" height="100%" width="100%" class="img-fluid rounded-start">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5>Cedula</h5>
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="cedula" value="<?php echo $ced ?>" readonly>
                                <label for="cedula">Cedula</label>
                            </div>
                            <h5>Usuario</h5>
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="usuario" placeholder="name@example.com" value="<?php echo $user ?>">
                                <label for="usuario">Usuario</label>
                            </div>
                            <h5 id="contra1">Contraseña</h5>
                            <div class="form-floating  mb-3">
                                <input type="password" class="form-control" id="pass" onclick="validarPass()">
                                <label for="pass">Contraseña</label>
                            </div>
                            <h5 id="contra2">Confirmar Contraseña</h5>
                            <div class="form-floating" style="margin-bottom: 5px">
                                <input type="password" class="form-control" id="Cpass">
                                <label for="pass">Confirmar Contraseña</label>
                            </div>
                            <div id="confirmar" style="color: red; font-size: 12px; margin-bottom: 5px"></div>
                            <h5>Nombres</h5>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="nom" value="<?php echo $nom ?>">
                                <label for="nom">Nombres</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<div class="container" style="background-color: white; padding: 15px; border-radius: 10px">
    <div class="row">
        <div class="col-6">
            <button class="btn btn-primary" id="actualizar" style="width: 100%" onclick="editarUsuario()">Actualizar</button>
        </div>
        <div class="col-6">
            <button class="btn btn-secondary" id="cancelar" style="width: 100%">Cancelar</button>
        </div>
    </div>
</div>
<br>
<script src="View/js/jquery-3.6.0.js"></script>
<!-- Sweet Alert -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Js Creado -->
<script src="View/js/usuarios.js"></script>
<script>
    document.getElementById("actualizar").disabled = true;
</script>
</body>
</html>