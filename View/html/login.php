<!DOCTYPE html>
<html lang="en">  
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="View/img/farmaibague.png">
    <link rel="stylesheet" href="View/css/bootstrap.css">
    <link rel="stylesheet" href="View/css/styles.css">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="login">
                    <img src="View/img/farmaibague.png" width="100">
                    <h3>Bienvenido</h3>
                    <h5>Usuario</h5>
                    <input class="form-control" type="text" id="user" name="user" require onclick="verificarUser()">
                    <span id="div"></span>
                    <br>
                    <h5>Contraseña</h5>
                    <input class="form-control" type="password" id="pass" name="pass" require>
                    <br>
                    <input type="hidden" value="dashboard.php">
                    <button class="btn btn-primary" id="ingresar" name="ingresar" onclick="ingresar()">Ingresar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Jquery -->
    <script src="View/js/jquery-3.6.0.js"></script>
    <!-- Js creado -->
    <script src="View/js/login.js"></script>
    <!-- Sweet Alert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>