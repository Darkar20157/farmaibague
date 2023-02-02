<!DOCTYPE html>
<html lang="en">
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
    <title>Inventario de Entrega</title>
</head>
<body>
<?php
require 'header.php';
?>
<!-- Mostramos tabla para el administrador -->
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <h3>Gestion de Productos</h3>
        </div>
    </div>
</div>
<div class="container" style="background-color: white; border-radius: 10px;">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <h3><img src="https://img.icons8.com/ios-filled/50/000000/inventory-flow.png"/> Crear Productos</h3>
        </div>
    </div>
    <br>
    <div class="row">
        <!-- Activamos o desactivamos casillas con un click -->
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
            <?php
            $sql = "SELECT MAX(BARCODE) AS BARCODE FROM DETAIL_ART";
            $consult = mysqli_query($conexion, $sql);
            $ult = mysqli_fetch_assoc($consult);
            ?>
            <h5 id="selector1">Codigo producto (*)</h5>
            <input class="form-control" type="number" id="cod_product" name="cod_product" value="<?php echo $ult['BARCODE'] + 1 ?>" onblur="validar()">
            <div class="err"></div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
            <h5 id="selector1">Nombre Producto (*)</h5>
            <input class="form-control" type="text" id="nom_product" name="nom_product">
        </div>
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
            <h5>Precio Unitario (*)</h5>
            <input class="form-control" type="number" name="precio" id="precio">
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
            <h5 id="selector1">Unidad de Medida (*)</h5>
            <input class="form-control" type="number" id="gram_unid" name="gram_unid">
        </div>
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
            <h5 id="selector1">Unidad de Medida GR/ML (*)</h5>
            <select class="form-select" name="gram_letras" id="gram_letras">
                <option value="">Selecciona una opcion</option>
                <option value="GR">Gramos</option>
                <option value="MG">Miligramos</option>
                <option value="ML">Mililitros</option>
                <option value="M3">Cm3</option>
            </select>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
            <h5>Laboratorio (*)</h5>
            <input class="form-control" id="marca" name="marca" type="text">
        </div>
    </div><br>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <h5 style="text-align: center">Notas</h5>
            <textarea class="form-control" name="notes" id="notes" placeholder="Maximo 500 caracteres" maxlength="500" style="height: 100px; width: 100%"></textarea>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <button class="btn btn-primary" style="width: 100%" id="registrar" onclick="registrarProducto()">Registrar Producto</button>
        </div>
    </div>
    <br>
</div>
<!-- Mostramos tablas de inventarios -->
<div class="container" id="contenedor" style="background-color: white; border-radius: 10px;">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" >
            <h3>Detalle Inventario</h3>
        </div>
    </div>
    <div class="row" id="row1">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" id="col">
            <?php
            $sql = "SELECT * FROM DETAIL_ART";
            $consulta = mysqli_query($conexion,$sql);
            ?>
            <div class="table-responsive">
                <table class="table table-hover" id="table1">
                    <thead>
                        <tr class="table-dark">
                            <th>Codigo Producto</th>
                            <th>Nombre Producto</th>
                            <th>Unidad/Medida</th>
                            <th>Laboratorio</th>
                            <th>Precio</th>
                            <th>Notas</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    while($row = mysqli_fetch_array($consulta)){
                    ?>
                    <tr>
                        <td><?php echo $row['BARCODE']; ?></td>
                        <td><?php echo $row['NAME_PRODUCT']; ?></td>
                        <td><?php echo $row['GRAMMAGE_MINIMETERAGE']; ?></td>
                        <td><?php echo $row['BRAND']; ?></td>
                        <td><?php echo $row['PRICE']; ?></td>
                        <td><?php echo $row['NOTE']; ?></td>
                        <td>
                            <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="edit(<?php echo $row['BARCODE'] ?>, 
                                                                                                                                '<?php echo $row['NAME_PRODUCT'] ?>',
                                                                                                                                '<?php echo $row['GRAMMAGE_MINIMETERAGE'] ?>', 
                                                                                                                                '<?php echo $row['BRAND'] ?>',
                                                                                                                                '<?php echo $row['PRICE'] ?>',
                                                                                                                                '<?php echo $row['NOTE'] ?>',
                                                                                                                                )">
                            Editar
                        </button>
                        </td>
                        </button>
                        <td><button class="btn btn-danger" onclick="elminarProducto(<?php echo $row['BARCODE'] ?>, '<?php echo $row['NAME_PRODUCT'] ?>')">Eliminar</button></td>
                    </tr>
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
                            <th>Precio</th>
                            <th>Notas</th>
                            <th><button class="btn btn-warning">Editar</button></th>
                            <th><button class="btn btn-danger">Eliminar</button></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Editando Producto</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-6">
                        <h6>Codigo Producto</h6>
                        <input class="form-control" type="number" name="edit_code" id="edit_code">
                    </div>
                    <div class="col-6">
                        <h6>Nombre Producto</h6>
                        <input class="form-control" type="text" name="edit_nom" id="edit_nom">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-6">
                        <h6>Gramaje Producto</h6>
                        <input class="form-control" type="text" name="gramos_edit" id="gramos_edit">
                    </div>
                    <div class="col-6">
                        <h6>Marca Producto</h6>
                        <input class="form-control" type="text" name="edit_marca" id="edit_marca">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-12">
                        <h6>Precio Producto</h6>
                        <input class="form-control" type="number" name="edit_precio" id="edit_precio">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-12">
                        <h6 style="text-align: center">Notas</h6>
                        <textarea class="form-control" name="edit_notes" id="edit_notes" placeholder="Maximo 500 caracteres" maxlength="500" style="height: 100px; width: 100%"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="edit_guardar" onclick="editProducto()">
                    Guarda Cambios
                </button>
            </div>
        </div>
    </div>
</div>
<!-- Jquery -->
<script src="View/js/jquery-3.6.0.js"></script>
<!-- CDN bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Datatable -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.11.3/b-2.1.1/b-colvis-2.1.1/b-html5-2.1.1/b-print-2.1.1/datatables.min.js"></script>
<script>
$('#table5').DataTable({
    dom: 'Bfrtip',
    buttons: [
        'copy', 'excel', 'pdf'
    ],
    pageLength: 100,
    responsive: true
    
});
$(document).ready(function(){
    const loader = document.querySelector(".contenedor-loader");
    loader.style.opacity = 0
    loader.style.visibility = 'hidden';
})
</script>
<!-- Js creado -->
<script src="View/js/notificacionesAdmin.js"></script>
<script src="View/js/navbar.js"></script>
<script src="View/js/gestion_productos.js"></script>
<script src="View/js/Entradas.js"></script>
</body>
</html>