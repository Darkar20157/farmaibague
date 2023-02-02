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
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.11.3/b-2.1.1/b-colvis-2.1.1/b-html5-2.1.1/b-print-2.1.1/datatables.min.css"/>
    <title>Ventas</title>
</head>
<body>
<?php
require 'header.php';
?>
<br>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <h3><img src="https://img.icons8.com/wired/64/null/old-cash-register.png"/> Ventas</h3>
        </div>
    </div>
    <br>
    <div class="row">
        <!-- Consulta para buscar la persona quien recibe el inventario -->
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
            <h5 id="cargando1">Buscar cliente por cedula <button class="btn btn-success" data-bs-target="#exampleModalToggle" data-bs-toggle="modal" style="padding: 2px 5px;"><img src="https://img.icons8.com/fluency/25/null/add-user-male.png"/></button></h5>
            <select class="form-select" id="ced" onchange="search('cedula')">
                <option value="">Elige un Cliente</option>
                <?php
                $sql = "SELECT * FROM CLIENTS WHERE STATES = true";
                $consult = mysqli_query($conexion, $sql);
                while($row = mysqli_fetch_assoc($consult)){
                ?>
                    <option value="<?php echo $row['CED_NRO']?>"><?php echo $row['CED_NRO'] ?> - <?php echo $row['NAMES'] ?></option>
                <?php
                }
                ?>
            </select>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
            <h5 id="select" style="margin-bottom: 15px;">Buscar cliente por celular</h5>
            <div class="box">
                <select class="form-select" id="cel" onchange="search('celular')">
                    <option value="">Elige un Cliente</option>
                    <?php
                    $sql = "SELECT * FROM CLIENTS";
                    $consul = mysqli_query($conexion, $sql);
                    while($row = mysqli_fetch_assoc($consul)){
                    ?>
                        <option value="<?php echo $row['PHONE'] ?>"><?php echo $row['PHONE'] ?> - <?php echo $row['NAMES'] ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
            <h5 style="margin-bottom: 15px;">Cedula</h5>
            <input class="form-control" type="text" id="cedula_cliente" readonly>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
            <h5>Nombres</h5>
            <input class="form-control" type="text" id="nombre" readonly>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
            <h5>Celular</h5>
            <input class="form-control" type="number" id="celular" readonly>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
            <h5>Direccion</h5>
            <input class="form-control" type="text" id="direccion" readonly>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
            <h5>Correo</h5>
            <input class="form-control" type="email" id="email" readonly>
        </div>
    </div>
    <br>
</div>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <h3>Agregar Carrito</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" style="text-align: right; margin-bottom: 10px">
            <button class="btn btn-danger" onclick="vaciarCarrito()"><img src="https://img.icons8.com/material-outlined/24/ffffff/trash--v1.png"/>Vaciar</button>
        </div>
    </div>
    <!-- Agregar productos al carrito -->
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" id="carrito">
            <div class="table-responsive">
                <table class="table table-hover" id="table">
                    <thead>
                        <tr class="table-dark">
                            <th>Agregar un Producto</th>
                            <th>Producto</th>
                            <th>Laboratorio</th>
                            <th>Unid/Medida</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th>Descuento</th>
                            <th>Accion</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <select style="width: 100%" class="select2" name="cod_salida" id="cod_salida" onchange="productoSalidas()">
                                    <option value="">Seleccione el codigo</option>
                                    <?php
                                    $sql = "SELECT * 
                                    FROM INVENTARIO ";
                                    $consul = mysqli_query($conexion,$sql);
                                    while($row = mysqli_fetch_assoc($consul)){
                                        $COD = $row['BARCODE'];
                                        $NOM = $row['NAME_PRODUCT'];
                                    ?>
                                    <option value="<?php echo $COD; ?>"><?php echo $COD; ?> - <?php echo $NOM ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </td>
                            <td><input class="form-control" type="text" id="producto_salida" readonly></td>
                            <td><input class="form-control" type="text" id="marca" readonly></td>
                            <td><input class="form-control" type="text" id="gramaje" readonly></td>
                            <td><input class="form-control" type="number" id="cantidad"></td>
                            <td><input class="form-control" type="number" id="precio" readonly></td>
                            <td>
                                <select class="form-select" name="discount" id="discount">
                                    <option value="">Selecciona un Descuento</option>
                                    <?php
                                    $sql = "SELECT * FROM DISCOUNTS";
                                    $consult = mysqli_query($conexion, $sql);
                                    while($row = mysqli_fetch_assoc($consult)){
                                    ?>
                                        <option value="<?php echo $row['ID'] ?>"><?php echo $row['ID'] ?> - <?php echo $row['DISCOUNT_NAME'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </td>
                            <td><button class="btn btn-success" onclick="carrito()">Agregar</button></td>
                            <td id="cargando"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Codigo Producto</th>
                            <th>Producto</th>
                            <th>Laboratorio</th>
                            <th>Unid/Medida</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th>Id. Descuento</th>
                            <th>Accion</th>
                        </tr>
                    </thead>
                    <tbody id="fila">

                    </tbody>
                </table>
            </div>
            <br>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4" id="col">
            <h5>Costos Adicionales</h5>
            <select class="form-select" name="costAdi" id="costAdi">
                <option value="">Selecciona un Costo Adicional</option>
                <?php
                $sql = "SELECT * FROM COST_ADDITIONAL";
                $consult = mysqli_query($conexion, $sql);
                while($row = mysqli_fetch_assoc($consult)){
                ?>
                <option value="<?php echo $row['ID'] ?>"><?php echo $row['COST_ADDITIONAL'] ?></option>
                <?php
                }
                ?>
            </select>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4" id="col">
            <h5>Metodo de Pago</h5>
            <select class="form-select" name="methodPay" id="methodPay">
                <option value="">Selecciona un Costo Adicional</option>
                <?php
                $sql = "SELECT * FROM PAYMENT_METHOD";
                $consult = mysqli_query($conexion, $sql);
                while($row = mysqli_fetch_assoc($consult)){
                ?>
                <option value="<?php echo $row['ID'] ?>"><?php echo $row['PAYMENT_NAME'] ?></option>
                <?php
                }
                ?>
            </select>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4" id="col">
            <h5>Totales</h5>
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal2" style="width: 100%;" onclick="verTotal()">Ver total</button>
        </div>
    </div>
    <br>
</div>
<!-- Ver Inventarios -->
<div class="container" id="contenedor" style="background-color: white; border-radius: 10px;">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <h3 id="T1" onclick="mostrar1()">Facturas</h3>
        </div>
    </div>
    <br>
    <div class="row" id="row1">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" id="col">
            <div class="table-responsive">
                <table class="table table-hover" id="table1">
                    <thead>
                        <tr class="table-dark">
                            <th>Numero Factura</th>
                            <th>Cedula Cliente</th>
                            <th>Fecha del Voucher</th>
                            <th>Codigo de barras</th>
                            <th>Nombre Producto</th>
                            <th>Unidad/Medida</th>
                            <th>Cantidad</th>
                            <th>Precio Unitario</th>
                            <th>Cant./Articulos</th>
                            <th>Total/Articulo</th>
                            <th>Total Factura</th>
                            <th>Imprimir</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql2 = "SELECT 
                        NRO_FACTURA, 
                        SL.CED_NRO,
                        CL.NAMES,
                        CL.ADDRES,
                        CL.PHONE,
                        SL.DATE_VOUCHER,
                        SL.BARCODE,
                        BR.NAME_PRODUCT,
                        SL.AMOUNT,
                        SL.PRICE_UNID,
                        DS.DISCOUNT_NAME,
                        DS.DISCOUNT_PRICE,
                        CA.COST_ADDITIONAL,
                        CA.PRICE,
                        PM.PAYMENT_NAME,
                        SL.TOTAL_ITEMS,
                        SL.TOTAL_REGISTER,
                        SL.TOTAL_VOUCHER,
                        SL.PAY_CLIENT,
                        SL.EXCHANGE
                        FROM SALES SL
                        INNER JOIN CLIENTS CL ON SL.CED_NRO = CL.CED_NRO
                        INNER JOIN DETAIL_ART BR ON SL.BARCODE = BR.BARCODE
                        INNER JOIN COST_ADDITIONAL CA ON SL.COST_ADDITIONAL_ID = CA.ID
                        INNER JOIN PAYMENT_METHOD PM ON SL.PAYMENT_METHOD_ID = PM.ID
                        INNER JOIN DISCOUNTS DS ON SL.DISCOUNT_ID = DS.ID";
                        $consult2 = mysqli_query($conexion, $sql2);
                        while($rows2 = mysqli_fetch_assoc($consult2)){
                        ?>
                            <tr>
                                <td><?php echo $rows2['NRO_FACTURA'] ?></td>
                                <td><?php echo $rows2['CED_NRO'] ?></td>
                                <td><?php echo $rows2['DATE_VOUCHER'] ?></td>
                                <td><?php echo $rows2['BARCODE'] ?></td>
                                <td><?php echo $rows2['NAME_PRODUCT'] ?></td>
                                <td><?php echo $rows2['GRAMMAGE_MINIMETERAGE']?></td>
                                <td><?php echo $rows2['AMOUNT'] ?></td>
                                <td><?php echo $rows2['PRICE_UNID'] ?></td>
                                <td><?php echo $rows2['TOTAL_ITEMS'] ?></td>
                                <td><?php echo $rows2['TOTAL_REGISTER'] ?></td>
                                <td><?php echo $rows2['TOTAL_VOUCHER'] ?></td>
                                <td><button class="btn btn-success" onclick="imprimir('<?php echo $rows2['NRO_FACTURA']?>')">Imprimir</button></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr class="footers">
                            <th>Numero Factura</th>
                            <th>Cedula Cliente</th>
                            <th>Fecha del Voucher</th>
                            <th>Codigo de barras</th>
                            <th>Nombre Producto</th>
                            <th>Unidad/Medida</th>
                            <th>Cantidad</th>
                            <th>Precio Unitario</th>
                            <th>Total Articulos</th>
                            <th>Total por Articulo</th>
                            <th>Total Factura</th>
                            <th>Imprimir</th>
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
<br>
<!-- MODAL -->
<div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalToggleLabel">Agregar nuevo cliente  <img src="https://img.icons8.com/fluency/35/null/add-user-male.png"/></h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-4">
                <h5>Cedula(*)</h5>
                <input class="form-control" type="number" id="ced_nro" name="ced_nro">
            </div>
            <div class="col-4">
                <h5>Nombres(*)</h5>
                <input class="form-control" type="text" id="names" name="names">
            </div>
            <div class="col-4">
                <h5>Correo</h5>
                <input class="form-control" type="email" id="ema" name="ema">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-4">
                <h5>Direccion(*)</h5>
                <input class="form-control" type="text" id="address" name="address">
            </div>
            <div class="col-4">
                <h5>Celular(*)</h5>
                <input class="form-control" type="number" id="phone" name="phone">
            </div>
            <div class="col-4">
                <h5>Genero</h5>
                <select class="form-select" name="gender" id="gender">
                    <option value="">Selecciona un Genero</option>
                    <option value="Femenino">Femenino</option>
                    <option value="Masculino">Masculino</option>
                </select>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-success" onclick="aggClient()">Agregar Cliente</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Totales -->
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Total Venta</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-4">
                <h5>Subtotal</h5>
                <input class="form-control" type="text" id="subtotal" readonly>
            </div>
            <div class="col-4">
                <h5>Total</h5>
                <input class="form-control" type="text" id="total" readonly>
            </div>
            <div class="col-4">
                <h5>Pago</h5>
                <input class="form-control" type="number" id="pago">
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" style="width: 100%;" onclick="salidas()" id="registrar">Vender</button>
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
<script src="View/js/notificacionesAdmin.js"></script>
<script src="View/js/navbar.js"></script>
<script src="View/js/select2.js"></script>
<script src="View/js/Salidas.js"></script>
</body>
</html>