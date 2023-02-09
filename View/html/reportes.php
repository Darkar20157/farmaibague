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
    <title>Reportes</title>
</head>
<body style="background-color: whitesmoke;">
<?php
require "header.php";
?>
<!-- Reportes -->
<div class="container" style="background-color: white; border-radius: 10px;">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <h3><img src="https://img.icons8.com/arcade/50/null/economic-improvement.png"/> Reportes</h3>
        </div>
    </div>
</div>
<div class="container" id="contenedor" style="background-color: white; border-radius: 10px;">
    <div class="row" id="row1">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" id="col">
            <?php
            $sql = "SELECT 
            SL.DATE_VOUCHER,
            DI.BARCODE, 
            DI.NAME_PRODUCT, 
            DI.PACKAGING, 
            DI.AMOUNT, 
            DI.PRICE_UNID, 
            DI.PRICE_BUY,
            (SL.PRICE_UNID * SL.AMOUNT) AS TOTAL_VENTA,
            (SL.PRICE_UNID * SL.AMOUNT) - DI.PRICE_BUY AS TOTAL_GANADO
            FROM DETAIL_INVENTORY DI
            LEFT JOIN SALES SL
            ON SL.BARCODE = DI.BARCODE";
            $consulta = mysqli_query($conexion, $sql);
            ?>
            <div class="table-responsive">
                <table class="table table-hover" id="table2">
                    <thead>
                        <tr class="table-dark">
                            <th>Fecha Venta</th>
                            <th>Codigo Producto</th>
                            <th>Nombre Producto</th>
                            <th>Embalaje</th>
                            <th>Cantidad</th>
                            <th>Precio Unid.</th>
                            <th>Precio Compra</th>
                            <th>Total Venta</th>
                            <th>Total Ganado</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    while($row = mysqli_fetch_array($consulta)){
                        ?>
                        <tr class="table-danger">
                            <td><?php echo $row['DATE_VOUCHER']; ?></td>
                            <td><?php echo $row['BARCODE']; ?></td>
                            <td><?php echo $row['NAME_PRODUCT']; ?></td>
                            <td><?php echo $row['PACKAGING']; ?></td>
                            <td><?php echo $row['AMOUNT']; ?></td>
                            <td><?php echo $row['PRICE_UNID']; ?></td>
                            <td><?php echo $row['PRICE_BUY']; ?></td>
                            <td><?php echo $row['TOTAL_VENTA']; ?></td>
                            <td><?php echo $row['TOTAL_GANADO']; ?></td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr class="footers">
                            <th>Fecha Venta</th>
                            <th>Codigo Producto</th>
                            <th>Nombre Producto</th>
                            <th>Embalaje</th>
                            <th>Cantidad</th>
                            <th>Precio Unid.</th>
                            <th>Precio Compra</th>
                            <th>Total Venta</th>
                            <th>Total Ganado</th>
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