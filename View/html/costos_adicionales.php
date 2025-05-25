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
            <h3><img width="64" height="64" src="https://img.icons8.com/glyph-neue/64/receipt.png" alt="receipt"/> Resolucion</h3>
        </div>
    </div>
    <br>
    <div class="row">
        <!-- Consulta para buscar la persona quien recibe el inventario -->
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
            <h5 id="cargando1">Cod. Prefijo</h5>
            <input class="form-control" type="text" id="prefix" name="prefix">
        </div>
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
            <h5 id="cargando1">Fecha Inicial</h5>
            <input class="form-control" type="date" id="dateInitial" name="dateInitial">
        </div>
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
            <h5 id="cargando1">Fecha Final</h5>
            <input class="form-control" type="date" id="dateEnd" name="dateEnd">
        </div>
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
            <h5 id="cargando1">Rango Inicial</h5>
            <input class="form-control" type="number" id="rangeInitial" name="rangeInitial">
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
            <h5 id="cargando1">Rango Final</h5>
            <input class="form-control" type="number" id="rangeFinal" name="rangeFinal">
        </div>
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
            <h5 id="cargando1">Numero Autorizacion</h5>
            <input class="form-control" type="number" id="nroAutorization" name="nroAutorization">
        </div>
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
            <h5 id="cargando1">Codigo Tecnico</h5>
            <input class="form-control" type="text" id="codeTechnical" name="codeTechnical">
        </div>
    </div>
    <br>
    <div class="row">
        <button class="btn btn-primary" style="width: 100%;" onclick="aggResolution()">Agregar Resolucion</button>
    </div>
    <br>
</div>
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
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
            <h5 id="cargando1">Agregar Metodo de Pago</h5>
            <input class="form-control" type="text" id="method" name="method">
            <br>
            <button class="btn btn-primary" onclick="aggMethod()">Agregar Metodo de Pago</button>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
            <h5 id="cargando1">Agregar Presentación</h5>
            <input class="form-control" type="text" id="presentation" name="presentation">
            <br>
            <button class="btn btn-primary" onclick="aggPresentation()">Agregar Presentación</button>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
            <h5 id="cargando1">Agregar Costo Adicional</h5>
            <input class="form-control" type="text" id="cost" name="cost">
            <br>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
            <h5 id="cargando1">Valor Costo Adicional</h5>
            <input class="form-control" type="number" id="value" name="value">
            <br>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <button class="btn btn-primary" onclick="aggCost()">Agregar Costo Adicional</button>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <h3>Resoluciones</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" id="carrito">
            <div class="table-responsive">
                <table class="table table-hover" id="table">
                    <thead>
                        <tr class="table-dark">
                            <th>Id</th>
                            <th>Codigo Resolucion</th>
                            <th>Fecha Inicial</th>
                            <th>Fecha Final</th>
                            <th>Rango Inicial</th>
                            <th>Rango Final</th>
                            <th>Numero Autorizacion</th>
                            <th>Codigo Tecnico</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <?php
                        $sql = "SELECT * 
                        FROM RESOLUTION ";
                        $consult = mysqli_query($conexion, $sql);
                    ?>
                    <tbody>
                        <?php
                        while($row = mysqli_fetch_assoc($consult)){
                        ?>
                            <tr>
                                <td><?php echo $row['ID'] ?></td>
                                <td><?php echo $row['CODE_RESOLUTION'] ?></td>
                                <td><?php echo $row['ISSUE_DATE_START'] ?></td>
                                <td><?php echo $row['ISSUE_DATE_END'] ?></td>
                                <td><?php echo $row['RANGE_INITIAL'] ?></td>
                                <td><?php echo $row['RANGE_END'] ?></td>
                                <td><?php echo $row['NRO_AUTORIZATION'] ?></td>
                                <td><?php echo $row['CODE_TECHNICAL'] ?></td>
                                <td><button class="btn btn-danger" onclick="eliminar('RESOLUTION', <?php echo $row['ID'] ?>)">Eliminar</button></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr class="footers">
                            <th>Id</th>
                            <th>Codigo Resolucion</th>
                            <th>Fecha Inicial</th>
                            <th>Fecha Final</th>
                            <th>Rango Inicial</th>
                            <th>Rango Final</th>
                            <th>Numero Autorizacion</th>
                            <th>Codigo Tecnico</th>
                            <th>Eliminar</th>
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
            <h3>Descuentos, Costos Adicionales, Metodos de Pago y Presentaciones</h3>
        </div>
    </div>
    <!-- Agregar productos al carrito -->
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6" id="carrito">
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
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6" id="carrito">
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
    </div>
    <br>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
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
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
            <div class="table-responsive">
                <table class="table table-hover" id="table">
                    <thead>
                        <tr class="table-dark">
                            <th>Id</th>
                            <th>Nombre Presentación</th>
                            <th>Accion</th>
                        </tr>
                    </thead>
                    <?php
                        $sql = "SELECT * 
                        FROM PRESENTACION";
                        $consult = mysqli_query($conexion, $sql);
                    ?>
                    <tbody>
                        <?php
                        while($row = mysqli_fetch_assoc($consult)){
                        ?>
                            <tr>
                                <td><?php echo $row['ID'] ?></td>
                                <td><?php echo $row['PRESENTACION'] ?></td>
                                <td><button class="btn btn-danger" onclick="eliminar('PRESENTACION', <?php echo $row['ID'] ?>)">Eliminar</button></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr class="footers">
                            <th>Id</th>
                            <th>Nombre Presentación</th>
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
            <h3>Clientes</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="table-responsive">
                <table class="table table-hover" id="table1">
                    <thead>
                        <tr class="table-dark">
                            <th>Nombres</th>
                            <th>Email</th>
                            <th>Direccion</th>
                            <th>Celular</th>
                            <th>Genero</th>
                            <th>Editar</th>
                            <th>Borrar</th>
                        </tr>
                    </thead>
                    <?php
                        $sql = "SELECT * 
                        FROM CLIENTS";
                        $consult = mysqli_query($conexion, $sql);
                    ?>
                    <tbody>
                        <?php
                        while($row = mysqli_fetch_assoc($consult)){
                        ?>
                            <tr>
                                <td><?php echo $row['NAMES'] ?></td>
                                <?php if(empty($row['EMAIL'])){    
                                ?> 
                                <td><?php echo "SIN CORREO"; ?></td> 
                                <?php 
                                }else{ 
                                ?>
                                <td><?php echo $row['EMAIL']; ?></td>
                                <?php
                                    } 
                                ?>
                                <td><?php echo $row['ADDRES'] ?></td>
                                <td><?php echo $row['PHONE'] ?></td>
                                <td><?php echo $row['GENDER'] ?></td>
                                <td><button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="editar('CLIENTS', <?php echo $row['CED_NRO'] ?>, 
                                                                                                                                                    '<?php echo $row['NAMES'] ?>',
                                                                                                                                                    '<?php echo $row['EMAIL'] ?>',
                                                                                                                                                    '<?php echo $row['ADDRES'] ?>',
                                                                                                                                                    '<?php echo $row['PHONE'] ?>',
                                                                                                                                                    '<?php echo $row['GENDER'] ?>')">Editar</button></td>
                                <td><button class="btn btn-danger" onclick="eliminar('CLIENTS', <?php echo $row['ID'] ?>)">Eliminar</button></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr class="footers">
                            <th>Nombres</th>
                            <th>Email</th>
                            <th>Direccion</th>
                            <th>Celular</th>
                            <th>Genero</th>
                            <th>Editar</th>
                            <th>Borrar</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
<br>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <h3>Proveedores</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="table-responsive">
                <table class="table table-hover" id="table2">
                    <thead>
                        <tr class="table-dark">
                            <th>Nit Proveedor</th>
                            <th>Nombre Proveedor</th>
                            <th>Direccion Proveedor</th>
                            <th>Telefono Proveedor</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
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
                                <td><button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal2" onclick="editarProv(<?php echo $row['ID'] ?>,
                                                                                                                                         '<?php echo $row['NIT_VENDOR'] ?>',
                                                                                                                                         '<?php echo $row['NAME_VENDOR'] ?>',
                                                                                                                                         '<?php echo $row['ADDRESS_VENDOR'] ?>',
                                                                                                                                         '<?php echo $row['PHONE_VENDOR'] ?>',
                                                                                                                                         )">Editar</button></td>
                                <td><button class="btn btn-danger" onclick="eliminar('VENDORS', <?php echo $row['ID'] ?>)">Eliminar</button></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                    <tfooter>
                        <tr class="footers">
                            <th>Nit Proveedor</th>
                            <th>Nombre Proveedor</th>
                            <th>Direccion Proveedor</th>
                            <th>Telefono Proveedor</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </tfooter>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Editar Cliente</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-4">
                <h5>Nombre Cliente</h5>
                <input class="form-control" type="text" id="name" name="name">
            </div>
            <div class="col-4">
                <h5>Email</h5>
                <input class="form-control" type="text" id="email" name="email">
            </div>
            <div class="col-4">
                <h5>Direccion</h5>
                <input class="form-control" type="text" id="addres" name="addres">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-4">
                <h5>Celular</h5>
                <input class="form-control" type="number" id="cel" name="cel">
            </div>
            <div class="col-4">
                <h5>Genero</h5>
                <input class="form-control" type="text" id="gen" name="gen">
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" onclick="editar(0)">Guardar Cambios</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Editar Proveedor</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-4">
                <h5>Nit Proveedor</h5>
                <input class="form-control" type="text" id="nitProv" name="nitProv">
            </div>
            <div class="col-4">
                <h5>Nombre Proveedor</h5>
                <input class="form-control" type="text" id="nomProv" name="nomProv">
            </div>
            <div class="col-4">
                <h5>Direccion Proveedor</h5>
                <input class="form-control" type="text" id="dirProv" name="dirProv">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-4">
                <h5>Telefono Proveedor</h5>
                <input class="form-control" type="number" id="telProv" name="telProv">
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" onclick="editarProv(0)">Guardar Cambios</button>
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