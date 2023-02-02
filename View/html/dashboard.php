<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="View/img/farmaibague.png">
    <link rel="stylesheet" href="View/css/Carga.css">
    <link rel="stylesheet" href="View/css/bootstrap.css">
    <link rel="stylesheet" href="View/css/navbar.css">
    <link rel="stylesheet" href="View/css/toast.css">
    <link rel="stylesheet" href="View/css/graficas.css">
    <title>Dashboard</title>
</head>
<body style="background-color: whitesmoke">
<?php
require "header.php";
?>
<?php
setlocale(LC_TIME, 'spanish');
$mes = strftime("%Y");
$mesM = ucfirst($mes);
?>
<br>
<div class="container">
    <div class="row">
        
    </div>
</div>
<br> 

<!-- Jquery -->
<script src="View/js/jquery-3.6.0.js"></script>
<!-- CDN bootstrap -->
<script src="View/js/bootstrap.bundle.min.js"></script>
<!-- Js creados -->
<script src="View/js/dashboard.js"></script>
<script src="View/js/navbar.js"></script>
<?php
?>
</body>
</html>