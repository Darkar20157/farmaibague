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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <title>Inventario</title>
</head>
<body style="background-color: whitesmoke;">
<?php
require "header.php";
?>
<!-- Inventario Entradas -->
<div class="container" style="background-color: white; border-radius: 10px;">
    <div class="row" style="padding: 10px 0px 5px">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <h3>Inventario</h3>
        </div>
    </div>
</div>
<div class="container" style="background-color: white; border-radius: 10px;">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <h3><img src="https://img.icons8.com/ios-filled/50/000000/inventory-flow.png"/> Entradas</h3>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6"> 
            <h5>Fecha de Entrada (*)</h5>
            <input class="form-control" type="datetime-local" name="fecha_entradas" id="fecha_entradas">
        </div>
        <!-- Activamos o desactivamos casillas con un click -->
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
            <h5 id="selector1">Codigo producto (*)</h5>
            <select style="width: 100%;" class="select_form-control" name="cod_entrada" id="cod_entrada" onchange="productoEntradas()">
                <option value="">Seleccione un Codigo</option>
                <?php
                $sql = "SELECT BARCODE, NAME_PRODUCT FROM DETAIL_ART ORDER BY BARCODE ASC";
                $consul = mysqli_query($conexion,$sql);
                while($row = mysqli_fetch_array($consul)){
                ?>
                <option value="<?php echo $row['BARCODE'];?>"><?php echo $row['BARCODE']?> - <?php echo $row["NAME_PRODUCT"] ?></option>
                <?php
                }
                ?>
            </select>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
            <h5>Producto (*)</h5>
            <input class="form-control" id="producto_entrada" name="producto_entrada" type="text">
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
            <h5>Precio Unitario (*)</h5>
            <input class="form-control" type="number" name="precio" id="precio">
        </div>
    </div>
    <br>

    <div class="row">
        <!-- <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
            <h5>Categoria (*)</h5>
            <select class="form-select" name="categoria" id="categoria">
                <option value="">Selecciona un opcion</option>
                <?php
                /*
                $sql3 = "SELECT * FROM CATEGORY";
                $consult = mysqli_query($conexion, $sql3);
                while($row = mysqli_fetch_assoc($consult)){
                ?>
                <option value="<?php echo $row['ID'] ?>"><?php echo $row['NAME_CATEGORY'] ?></option>
                <?php
                }
                */
                ?>
            </select>
        </div> -->
        <!--         
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
            <h5>Detalle Producto (*)</h5>
            <select class="form-select" id="marca_producto" name="marca_producto">
                <option value="">Selecciona un opcion</option>
                <?php
                $sql3 = "SELECT * FROM DETAIL_ART";
                $consult = mysqli_query($conexion, $sql3);
                while($row = mysqli_fetch_assoc($consult)){
                    $conCatDetailArt = $row['NAME_PRODUCT'] . " - " . $row['GRAMMAGE_MINIMETERAGE'] ." - ". $row['BRAND'];
                ?>
                <option value="<?php echo $row['ID'] ?>"><?php echo $conCatDetailArt?></option>
                <?php
                }
                ?>
            </select>
            <input class="form-control" maxlength="119" type="text" id="marca_producto" name="marca_producto">
        </div> 
        -->
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
            <h5>Cantidad (*)</h5>
            <input class="form-control" type="number" name="cantidad_entrada" id="cantidad_entrada" min="0" max="100000">
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
            <h5>Nombre Proveedor (*)</h5>
            <select class="form-select" id="proveedor_producto" name="proveedor_producto" onchange="vendors()">
                <option value="">Selecciona un opcion</option>
                <?php
                $sql3 = "SELECT * FROM VENDORS";
                $consult = mysqli_query($conexion, $sql3);
                while($row = mysqli_fetch_assoc($consult)){
                ?>
                <option value="<?php echo $row['NIT_VENDOR'] ?>"><?php echo $row['NAME_VENDOR'] ?></option>
                <?php
                }
                ?>
            </select>
            <!-- <input class="form-control" maxlength="119" type="text" id="proveedor_producto" name="proveedor_producto"> -->
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <h5 style="text-align: center">Novedades (*)</h5>
            <textarea class="form-control" name="novedades" id="novedades" placeholder="Novedades" style="height: 100px; width: 100%"></textarea>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <button class="btn btn-primary" style="width: 100%" id="registrar" onclick="registrarEntrada()">Registrar Entradas</button>
        </div>
    </div>
    <br>
</div>
<!-- Mostramos tablas de inventarios -->
<div class="container" id="contenedor" style="background-color: white; border-radius: 10px;">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" >
            <h3 id="T1" onclick="mostrar1()">Detalle Inventario</h3>
        </div>
    </div>
    <div class="row" id="row1">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" id="col">
            <?php
            $sql = "SELECT * FROM DETAIL_INVENTORY";
            $consulta = mysqli_query($conexion, $sql);
            ?>
            <div class="table-responsive">
                <table class="table table-hover" id="table1">
                    <thead>
                        <tr class="table-dark">
                            <th>Codigo Producto</th>
                            <th>Nombre Producto</th>
                            <th>Cant. Producto</th>
                            <th>Nit Proveedor</th>
                            <th>Fecha Ingreso</th>
                            <th>Price</th>
                            <th>Novedades</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    while($row = mysqli_fetch_array($consulta)){
                        if($row['AMOUNT'] <= 10){
                            ?>
                            <tr class="table-danger">
                                <td><?php echo $row['BARCODE']; ?></td>
                                <td><?php echo $row['NAME_PRODUCT']; ?></td>
                                <td><?php echo $row['AMOUNT']; ?></td>
                                <td><?php echo $row['NIT_VENDOR']; ?></td>
                                <td><?php echo $row['DATE_CREATION']; ?></td>
                                <td><?php echo $row['PRICE_UNID']; ?></td>
                                <td><?php echo $row['NOTES']; ?></td>
                            </tr>
                        <?php
                        }elseif($row['AMOUNT'] <= 100){
                            ?>
                            <tr class="table-warning">
                                <td><?php echo $row['BARCODE']; ?></td>
                                <td><?php echo $row['NAME_PRODUCT']; ?></td>
                                <td><?php echo $row['AMOUNT']; ?></td>
                                <td><?php echo $row['NIT_VENDOR']; ?></td>
                                <td><?php echo $row['DATE_CREATION']; ?></td>
                                <td><?php echo $row['PRICE_UNID']; ?></td>
                                <td><?php echo $row['NOTES']; ?></td>
                            </tr>
                        <?php
                        }elseif($row['AMOUNT'] > 100){
                            ?>
                            <tr class="table-success">
                                <td><?php echo $row['BARCODE']; ?></td>
                                <td><?php echo $row['NAME_PRODUCT']; ?></td>
                                <td><?php echo $row['AMOUNT']; ?></td>
                                <td><?php echo $row['NIT_VENDOR']; ?></td>
                                <td><?php echo $row['DATE_CREATION']; ?></td>
                                <td><?php echo $row['PRICE_UNID']; ?></td>
                                <td><?php echo $row['NOTES']; ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    <?php
                    }
                    ?>
                    </tbody>
                    <tfoot>
                        <tr class="footers">
                            <th>Codigo Producto</th>
                            <th>Nombre Producto</th>
                            <th>Cant. Producto</th>
                            <th>Nit Proveedor</th>
                            <th>Fecha Ingreso</th>
                            <th>Price</th>
                            <th>Novedades</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <br>
            <h5 id="ocultar1" onclick="ocultar1()"><img src="https://img.icons8.com/ios-glyphs/20/000000/double-up--v2.png"/>Ocultar</h5>
            <br>
        </div>
    </div>
</div>
<div class="container" id="contenedor" style="background-color: white; border-radius: 10px;">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" >
            <h3 id="T1" onclick="mostrar2()">Inventario Productos</h3>
        </div>
    </div>
    <div class="row" id="row1">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" id="col">
            <?php
            $sql = "SELECT 
            INV.*,
            VEN.NAME_VENDOR,
            VEN.ADDRESS_VENDOR,
            VEN.PHONE_VENDOR,
            DA.GRAMMAGE_MINIMETERAGE,
            DA.BRAND
            FROM INVENTARIO INV
            INNER JOIN DETAIL_ART DA ON INV.BARCODE = DA.BARCODE
            INNER JOIN VENDORS VEN ON INV.NIT_VENDOR = VEN.NIT_VENDOR";
            $consulta = mysqli_query($conexion, $sql);
            ?>
            <div class="table-responsive">
                <table class="table table-hover" id="table2">
                    <thead>
                        <tr class="table-dark">
                            <th>Codigo Producto</th>
                            <th>Nombre Producto</th>
                            <th>Unidad/Medida</th>
                            <th>Laboratorio</th>
                            <th>Cant. Producto</th>
                            <th>Price</th>
                            <th>Nit Proveedor</th>
                            <th>Nombre Proveedor</th>
                            <th>Direccion Proveedor</th>
                            <th>Celular Proveedor</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    while($row = mysqli_fetch_array($consulta)){
                        if($row['AMOUNT'] <= 10){
                            ?>
                            <tr class="table-danger">
                                <td><?php echo $row['BARCODE']; ?></td>
                                <td><?php echo $row['NAME_PRODUCT']; ?></td>
                                <td><?php echo $row['GRAMMAGE_MINIMETERAGE']; ?></td>
                                <td><?php echo $row['BRAND']; ?></td>
                                <td><?php echo $row['AMOUNT']; ?></td>
                                <td><?php echo $row['PRICE_UNID']; ?></td>
                                <td><?php echo $row['NIT_VENDOR']; ?></td>
                                <td><?php echo $row['NAME_VENDOR']; ?></td>
                                <td><?php echo $row['ADDRESS_VENDOR']; ?></td>
                                <td><?php echo $row['PHONE_VENDOR']; ?></td>
                            </tr>
                        <?php
                        }elseif($row['AMOUNT'] <= 100){
                            ?>
                            <tr class="table-warning">
                                <td><?php echo $row['BARCODE']; ?></td>
                                <td><?php echo $row['NAME_PRODUCT']; ?></td>
                                <td><?php echo $row['GRAMMAGE_MINIMETERAGE']; ?></td>
                                <td><?php echo $row['BRAND']; ?></td>
                                <td><?php echo $row['AMOUNT']; ?></td>
                                <td><?php echo $row['PRICE_UNID']; ?></td>
                                <td><?php echo $row['NIT_VENDOR']; ?></td>
                                <td><?php echo $row['NAME_VENDOR']; ?></td>
                                <td><?php echo $row['ADDRESS_VENDOR']; ?></td>
                                <td><?php echo $row['PHONE_VENDOR']; ?></td>
                            </tr>
                        <?php
                        }elseif($row['AMOUNT'] > 100){
                            ?>
                            <tr class="table-success">
                                <td><?php echo $row['BARCODE']; ?></td>
                                <td><?php echo $row['NAME_PRODUCT']; ?></td>
                                <td><?php echo $row['GRAMMAGE_MINIMETERAGE']; ?></td>
                                <td><?php echo $row['BRAND']; ?></td>
                                <td><?php echo $row['AMOUNT']; ?></td>
                                <td><?php echo $row['PRICE_UNID']; ?></td>
                                <td><?php echo $row['NIT_VENDOR']; ?></td>
                                <td><?php echo $row['NAME_VENDOR']; ?></td>
                                <td><?php echo $row['ADDRESS_VENDOR']; ?></td>
                                <td><?php echo $row['PHONE_VENDOR']; ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    <?php
                    }
                    ?>
                    </tbody>
                    <tfoot>
                        <tr class="footers">
                            <th>Codigo Producto</th>
                            <th>Nombre Producto</th>
                            <th>Unidad/Medida</th>
                            <th>Laboratorio</th>
                            <th>Cant. Producto</th>
                            <th>Price</th>
                            <th>Nit Proveedor</th>
                            <th>Nombre Proveedor</th>
                            <th>Direccion Proveedor</th>
                            <th>Celular Proveedor</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <br>
            <h5 id="ocultar1" onclick="ocultar2()"><img src="https://img.icons8.com/ios-glyphs/20/000000/double-up--v2.png"/>Ocultar</h5>
            <br>
        </div>
    </div>
</div>
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

<!-- Script echos  -->
<script src="View/js/select2.js"></script>
<script src="View/js/Entradas.js"></script>
<script src="View/js/notificacionesAdmin.js"></script>
<script src="View/js/navbar.js"></script>

</body>
</html>