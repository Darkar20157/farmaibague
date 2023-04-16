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
    <title>Devoluciones</title>
</head>
<body style="background-color: whitesmoke;">
<?php
require "header.php";
?>
<!-- Reportes -->
<div class="container" style="background-color: white; border-radius: 10px;">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <h3><img src="https://img.icons8.com/external-itim2101-lineal-color-itim2101/50/null/external-returns-logistics-itim2101-lineal-color-itim2101.png"/> Devoluciones</h3>
        </div>
    </div>
</div>
<div class="container" style="background-color: white; border-radius: 10px;">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
            <h5>Codigo Factura</h5>
            <input class="form-control" type="text" id="barcodeVoucher">
            <br>
            <button class="btn btn-success" onclick="seacherVoucher()">Buscar</button>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xl-9">
            <div class="table-responsive">
                <table class="table table-hover" id="table1">
                    <thead>
                        <tr>
                            <th>Cod. Factura</th>
                            <th>Cod. Producto</th>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio Unitario</th>
                            <th>Presentación</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody id="body">
                        
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Cod. Factura</th>
                            <th>Cod. Producto</th>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio Unitario</th>
                            <th>Presentación</th>
                            <th>Estado</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <h5>Descripción</h5>
            <textarea class="form-control" id="des" maxlength="199"></textarea>
        </div>
    </div>
</div>
<div class="container" style="background-color: white; border-radius: 10px;">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <h3>Devoluciones</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Numero voucher</th>
                            <th>Codigo</th>
                            <th>Producto</th>
                            <th>Presentacion</th>
                            <th>Fecha</th>
                            <th>Descripción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM DEVOLUTIONS DS INNER JOIN INVENTARIO INV ON DS.BARCODE = INV.BARCODE WHERE DS.BARCODE = DS.BARCODE GROUP BY DS.NRO_VOUCHER, DS.BARCODE";
                        $consul = mysqli_query($conexion, $sql);
                        while($row = mysqli_fetch_assoc($consul)){
                            ?>
                            <tr>
                                <td><?php echo $row['NRO_VOUCHER'] ?></td>
                                <td><?php echo $row['BARCODE'] ?></td>
                                <td><?php echo $row['NAME_PRODUCT'] ?></td>
                                <td><?php echo $row['PACKAGING'] ?></td>
                                <td><?php echo $row['DATE'] ?></td>
                                <td><?php echo $row['DESCRIPTION'] ?></td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
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
<script src="View/js/devoluciones.js"></script>
<script src="View/js/select2.js"></script>
<script src="View/js/notificacionesAdmin.js"></script>
<script src="View/js/navbar.js"></script>

</body>
</html>