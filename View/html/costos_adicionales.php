<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="View/img/farmaibague.png">
    <link rel="stylesheet" href="View/css/Carga.css">
    <link rel="stylesheet" href="View/css/bootstrap.css">
    <link rel="stylesheet" href="View/css/styles.css">
    <link rel="stylesheet" href="View/css/navbar.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.11.3/b-2.1.1/b-colvis-2.1.1/b-html5-2.1.1/b-print-2.1.1/datatables.min.css"/>
    <title>Configuracion</title>
</head>
<body>
<?php
require 'header.php';
?>
<br>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <h3><img src="https://img.icons8.com/ios-filled/50/null/settings-3.png"/> Proveedores</h3>
        </div>
    </div>
    <br>
    <div class="row">
        <!-- Consulta para buscar la persona quien recibe el inventario -->
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
            <h5 id="cargando1">Nit. Proveedor</h5>
            <input class="form-control" type="text" id="nitVendor" name="nitVendor">
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
            <h5 id="cargando1">Nombre del Proveedor</h5>
            <input class="form-control" type="text" id="nameVendor" name="nameVendor">
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
            <h5 id="cargando1">Direccion del Proveedor</h5>
            <input class="form-control" type="text" id="addressVendor" name="addressVendor">
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
            <h5 id="cargando1">Celular del Proveedor</h5>
            <input class="form-control" type="number" id="phoneProveedor" name="phoneProveedor">
        </div>
    </div>
    <br>
    <div class="row">
        <button class="btn btn-primary" style="width: 100%;" onclick="aggVendor()">Agregar Proveedor</button>
    </div>
    <br>
</div>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <h3><img src="https://img.icons8.com/ios-filled/50/null/settings-3.png"/> Configuracion Descuentos</h3>
        </div>
    </div>
    <br>
    <div class="row">
        <!-- Consulta para buscar la persona quien recibe el inventario -->
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
            <h5 id="cargando1">Agregar Descuento</h5>
            <input class="form-control" type="text" id="discount" name="discount">
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
            <h5 id="cargando1">Descuento %</h5>
            <input class="form-control" type="number" id="price" name="price">
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <button class="btn btn-primary" style="width: 100%;" onclick="aggDiscount()">Agregar Nuevo Descuento</button>
        </div>
    </div>
    <br>
</div>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <h3><img src="https://img.icons8.com/ios-filled/50/null/settings-3.png"/> Configuracion de Metodos de Pago y Costos Adicionales</h3>
        </div>
    </div>
    <br>
    <div class="row">
        <!-- Consulta para buscar la persona quien recibe el inventario -->
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
            <h5 id="cargando1">Agregar Metodo de Pago</h5>
            <input class="form-control" type="text" id="method" name="method">
            <br>
            <button class="btn btn-primary" onclick="aggMethod()">Agregar Metodo de Pago</button>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
            <h5 id="cargando1">Agregar Costo Adicional</h5>
            <input class="form-control" type="text" id="cost" name="cost">
            <br>
            <button class="btn btn-primary" onclick="aggCost()">Agregar Costo Adicional</button>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
            <h5 id="cargando1">Valor Costo Adicional</h5>
            <input class="form-control" type="number" id="value" name="value">
            <br>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <h3>Descuentos, Costos Adicionales y Metodos de Pago</h3>
        </div>
    </div>
    <!-- Agregar productos al carrito -->
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 col-xl-5" id="carrito">
            <div class="table-responsive">
                <table class="table table-hover" id="table">
                    <thead>
                        <tr class="table-dark">
                            <th>Id</th>
                            <th>Nombre Descuento</th>
                            <th>Descuento %</th>
                            <th>Accion</th>
                        </tr>
                    </thead>
                    <?php
                        $sql = "SELECT * 
                        FROM DISCOUNTS ";
                        $consult = mysqli_query($conexion, $sql);
                    ?>
                    <tbody>
                        <?php
                        while($row = mysqli_fetch_assoc($consult)){
                        ?>
                            <tr>
                                <td><?php echo $row['ID'] ?></td>
                                <td><?php echo $row['DISCOUNT_NAME'] ?></td>
                                <td><?php echo $row['DISCOUNT_PRICE'] ?></td>
                                <td><button class="btn btn-danger" onclick="eliminar('DISCOUNTS', <?php echo $row['ID'] ?>)">Eliminar</button></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr class="footers">
                            <th>Id</th>
                            <th>Nombre Descuento</th>
                            <th>Descuento %</th>
                            <th>Accion</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4" id="carrito">
            <div class="table-responsive">
                <table class="table table-hover" id="table">
                    <thead>
                        <tr class="table-dark">
                            <th>Id</th>
                            <th>Costo Adicional</th>
                            <th>Precio</th>
                            <th>Accion</th>
                        </tr>
                    </thead>
                    <?php
                        $sql = "SELECT * 
                        FROM COST_ADDITIONAL ";
                        $consult = mysqli_query($conexion, $sql);
                    ?>
                    <tbody>
                        <?php
                        while($row = mysqli_fetch_assoc($consult)){
                        ?>
                            <tr>
                                <td><?php echo $row['ID'] ?></td>
                                <td><?php echo $row['COST_ADDITIONAL'] ?></td>
                                <td><?php echo $row['PRICE'] ?></td>
                                <td><button class="btn btn-danger" onclick="eliminar('COST_ADDITIONAL', <?php echo $row['ID'] ?>)">Eliminar</button></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr class="footers">
                            <th>Id</th>
                            <th>Nombre Descuento</th>
                            <th>Precio</th>
                            <th>Accion</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3" id="carrito">
            <div class="table-responsive">
                <table class="table table-hover" id="table">
                    <thead>
                        <tr class="table-dark">
                            <th>Id</th>
                            <th>Metodo de Pago</th>
                            <th>Accion</th>
                        </tr>
                    </thead>
                    <?php
                        $sql = "SELECT * 
                        FROM PAYMENT_METHOD";
                        $consult = mysqli_query($conexion, $sql);
                    ?>
                    <tbody>
                        <?php
                        while($row = mysqli_fetch_assoc($consult)){
                        ?>
                            <tr>
                                <td><?php echo $row['ID'] ?></td>
                                <td><?php echo $row['PAYMENT_NAME'] ?></td>
                                <td><button class="btn btn-danger" onclick="eliminar('PAYMENT_METHOD', <?php echo $row['ID'] ?>)">Eliminar</button></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr class="footers">
                            <th>Id</th>
                            <th>Metodo de Pago</th>
                            <th>Accion</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <h3>Proveedores</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="table-responsive">
                <table class="table table-hover" id="table">
                    <thead>
                        <tr class="table-dark">
                            <th>Nit Proveedor</th>
                            <th>Nombre Proveedor</th>
                            <th>Direccion Proveedor</th>
                            <th>Telefono Proveedor</th>
                            <th>Accion</th>
                        </tr>
                    </thead>
                    <?php
                        $sql = "SELECT * 
                        FROM VENDORS";
                        $consult = mysqli_query($conexion, $sql);
                    ?>
                    <tbody>
                        <?php
                        while($row = mysqli_fetch_assoc($consult)){
                        ?>
                            <tr>
                                <td><?php echo $row['NIT_VENDOR'] ?></td>
                                <td><?php echo $row['NAME_VENDOR'] ?></td>
                                <td><?php echo $row['ADDRESS_VENDOR'] ?></td>
                                <td><?php echo $row['PHONE_VENDOR'] ?></td>
                                <td><button class="btn btn-danger" onclick="eliminar('VENDORS', <?php echo $row['ID'] ?>)">Eliminar</button></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr class="footers">
                            <th>Nit Proveedor</th>
                            <th>Nombre Proveedor</th>
                            <th>Direccion Proveedor</th>
                            <th>Telefono Proveedor</th>
                            <th>Accion</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

<br>
<!-- Jquery  -->
<script src="View/js/jquery-3.6.0.js"></script>
<!-- SweetAlert  -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Bootstrap  -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<!-- Datatable  -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.11.3/b-2.1.1/b-colvis-2.1.1/b-html5-2.1.1/b-print-2.1.1/datatables.min.js"></script>

<!-- Script del Programador  -->
<script src="View/js/navbar.js"></script>
<script src="View/js/costos_adicionales.js"></script>
</body>
</html>