$(document).ready(function(){
    $("#ced").select2();
    $("#cel").select2();
    const loader = document.querySelector(".contenedor-loader");
    loader.style.opacity = 0
    loader.style.visibility = 'hidden';
    //Datatable
    $('#table1').DataTable({
        initComplete: function () {
            this.api().columns().every( function () {
                var column = this;
                var select = $('<select><option value=""></option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
 
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        },
        dom: 'Bfrtip',
        buttons: [
            'copy', 'excel', 'pdf'
        ],
        pageLength: 50
    });
    $('#table3').DataTable({
        initComplete: function () {
            this.api().columns().every( function () {
                var column = this;
                var select = $('<select><option value=""></option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
 
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        },
        dom: 'Bfrtip',
        buttons: [
            'copy', 'excel', 'pdf'
        ],
        pageLength: 50
    });
    $('#table4').DataTable({
        initComplete: function () {
            this.api().columns().every( function () {
                var column = this;
                var select = $('<select><option value=""></option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
 
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        },
        dom: 'Bfrtip',
        buttons: [
            'copy', 'excel', 'pdf'
        ],
        pageLength: 50
    });
    //Select2 
    $('#cod_salida').select2();
})

// Si se recarga la pagina se vacia el carrito
if(location.reload){
    vaciarCarrito();
}
//Dinamismo en buscar asesor betplay quien recibe productos
function aggClient(){
    var ced = $("#ced_nro").val();
    var names = $("#names").val();
    var email = $("#ema").val();
    var address = $("#address").val();
    var phone = $("#phone").val();
    var gender = $("#gender").val();
    if(ced == "" || names == "" || address == "" || phone == ""){
        Swal.fire({
            icon: "warning",
            title: "Advertencia",
            text: "Completa todos los campos obligatorios (*)"
        })
        return false;
    }
    let array = {
        "ced": ced,
        "names": names,
        "email": email,
        "address": address,
        "phone": phone,
        "gender": gender
    }
    $.ajax({
        type: "POST",
        url: "Model/registrarVentas.php",
        data: array,
        success: function(response){
            if(response == 'Cedula'){
                Swal.fire({
                    icon: "error",
                    title: "Ups",
                    text: "La cedula ya existe"
                })
            }else if(response == 'Celular'){
                Swal.fire({
                    icon: "error",
                    title: "Ups",
                    text: "El celular ya existe"
                })
            }else if(response == "Correcto"){
                Swal.fire({
                    icon: "success",
                    title: "Exelente!",
                    text: "Se agregado el usuario correctamente"
                })
                setTimeout(function(){
                    window.location.reload();
                }, 2000);
            }else{
                Swal.fire({
                    icon: "error",
                    title: "Ups",
                    text: "Ah ocurrido un error: "+response
                })
            }
        }
    })

}
function search(type){
    var tipo = "";
    var id = null;
    if(type == 'cedula'){
        tipo += "CED_NRO";
        id = document.getElementById("ced").value;
        document.getElementById("cel").disabled = true;
    }
    if(type == "celular"){
        tipo += "PHONE";
        id = document.getElementById("cel").value;
        document.getElementById("ced").disabled = true;
    }
    let array = {
        "id": id,
        "type": tipo
    }
    $.ajax({
        type: "POST",
        url: "Model/registrarVentas.php",
        dataType: "json",
        data: array,
        success: function(response){
            $("#cedula_cliente").val(response.CED_NRO);
            $("#nombre").val(response.NAMES);
            $("#celular").val(response.PHONE);
            $("#direccion").val(response.ADDRES);
            $("#email").val(response.EMAIL);
        }
    })

    
}
function datosEntrega(){
    document.getElementById("cargando1").innerHTML = "Cedula <div class='spinner-border spinner-border-sm' role='status'><span class='visually-hidden'>Loading...</span></div>"
    let cedula = $("#ced_resp").val();
    let array = {
        "cedula": cedula
    }
    $.ajax({
        type: "POST",
        url: "Model/registrarSalidas.php",
        dataType: "json",
        data: array,
        success: function(response){
            let nombre = response.nombre;
            let cargo = response.cargo;
            document.getElementById("nombre").value = nombre;
            document.getElementById("cargo").value = cargo;
            document.getElementById("cargando1").innerHTML = "Cedula";
        }
    })
}
//Dinamismo y busqueda del producto
function productoSalidas(){
    let codP = $("#cod_salida").val();
    let embalaje = $("#embalaje").val();
    let col = document.getElementById("cargando");
    col.innerHTML = "<div class='spinner-border' role='status'><span class='visually-hidden'>Loading...</span></div>";
    let array = {
        "barcode": codP,
        "embalaje": embalaje
    };
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "Model/consulta.php",
        data: array,
        success: function(response){
            if(response == null){
                Swal.fire(
                    'Ups',
                    'No hay productos con ese embajale en el inventario',
                    'warning'
                )
                $("#cod_salida").val("");
                $("#producto_salida").val("");
                $("#marca").val("");
                $("#gramaje").val("");
                $("#embalaje").val("");
                $("#precio").val("");
            }else{
                let col = document.getElementById("cargando");
                col.innerHTML = "";
                $("#producto_salida").val(response.NAME_PRODUCT);
                $("#gramaje").val(response.GRAMMAGE_MINIMETERAGE);
                $("#cantidad").attr('max', response.AMOUNT);
                $("#embalaje").val(response.PACKAGING);
                $("#precio").val(response.PRICE);
            }
        }
    })
    return false;
}
//Insertar datos en el carrito
function carrito(){
    let codigo = $("#cod_salida").val();
    let nombre = $("#producto_salida").val();
    let gramaje = $("#gramaje").val();
    let cantidad = $("#cantidad").val();
    let embalaje = $("#embalaje").val();
    let precio = $("#precio").val();
    let discount = $("#discount").val();
    if(cantidad == "" || discount == ""){
        Swal.fire({
            icon: "error",
            title: "Ups",
            text: "Digita una cantidad al producto o elige un descuento"
        })
        return false;
    }
    let array = {
        "cod": codigo,
        "nom": nombre,
        "gram": gramaje,
        "cant": cantidad,
        "pre": precio,
        "dis": discount,
        "emb": embalaje
    }
    $.ajax({
        type: "POST",
        url: "Model/carrito.php",
        data: array,
        success: function(response){
            if(response == 'no hay'){
                Swal.fire(
                    'Ups!',
                    'Esa cantidad no existe en el inventario',
                    'warning'
                )
                return false;
            }
            document.getElementById("fila").innerHTML = response;
        }
    })
}

//Eliminar todos los datos del carrito
function vaciarCarrito(){
    let cedula = document.getElementById("cedula").value;
    let array = {
        "borrar": cedula
    }
    $.ajax({
        type: "POST",
        url: "Model/carrito.php",
        data: array,
        success: function(response){
        }
    })
    document.getElementById("fila").innerHTML = "";
}

//Eliminar una elemento del carrito
function eliminarUnidad(id, embajale){
    let cod = id;
    let array = {
        "borrarUnidad": cod,
        "embalaje": embajale
    }
    document.getElementById("fila").innerHTML = "<div class='spinner-border' role='status'><span class='visually-hidden'>Loading...</span></div>";
    $.ajax({
        type: "POST",
        url: "Model/carrito.php",
        data: array,
        success: function(response){
            document.getElementById("fila").innerHTML = response;
            return false;
        }
    })
}
function verTotal(){
    let methodPay = document.getElementById("methodPay").value;
    let costAdi = document.getElementById("costAdi").value;
    if(methodPay == "" || costAdi == ""){
        Swal.fire(
            'Ups!',
            'Agrega un costo adicional o metodo de pago',
            'warning'
        )
        document.getElementById("registrar").disabled = true;
        return false;
    }
    let array = {
        "methodPay": methodPay,
        "costAdi": costAdi
    }
    document.getElementById("registrar").disabled = false;
    $.ajax({
        type: "POST",
        url: "Model/registrarVentas.php",
        dataType: 'json',
        data: array,
        success: function(response){
            console.log(response)
            let subtotal = response.subtotal;
            let total = response.total;
            $("#subtotal").val(subtotal);
            $("#total").val(total);
        }
    })
}
//Registrar una salida
function salidas(){
    let ced = $("#cedula_cliente").val();
    let pago = $("#pago").val();
    let costAdi = $("#costAdi").val();
    let methodPay = $("#methodPay").val();
    if(ced == ""){
        Swal.fire({
            icon: 'error',
            title: 'Oops',
            text: 'Ingresa un cliente para realizar la venta'
        })
        document.getElementById("registrar").disabled = false;
        return false;
    }
    if(pago == "" || pago == NaN){
        Swal.fire({
            icon: 'error',
            title: 'Oops',
            text: 'Digita el valor que paga el cliente'
        })
        document.getElementById("registrar").disabled = false;
        return false;
    }
    pago = parseInt(pago);
    let total = parseInt($("#total").val());
    if(pago < total){
        Swal.fire({
            icon: 'error',
            title: 'Oops',
            text: 'El valor pagado es menor que la factura'
        })
        document.getElementById("registrar").disabled = false;
        return false;
    }
    let array = {
        "cedSale": ced,
        "pago": pago,
        "costAdi": costAdi,
        "methodPay": methodPay
    }
    document.getElementById("registrar").disabled = true;
    $.ajax({
        type: "POST",
        url: "Model/registrarVentas.php",
        data: array,
        success: function(response){
            if(isNaN(response)){
                Swal.fire(
                    "Registro Exitoso!",
                    "¿Deseas imprimir la factura? ",
                    "success"
                )
                Swal.fire({
                    title: 'Registro Exitoso!',
                    text: "¿Deseas imprimir la factura?",
                    icon: 'success',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, Imprimir!'
                  }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire(
                            'Imprimiendo...',
                            'Espera estamos imprimiendo tu factura!',
                            'success'
                        )
                        imprimir(response);
                        
                        // setTimeout(function(){
                        //     location.reload();
                        // }, 5000);
                        
                    }else{
                        
                        // setTimeout(function(){
                        //     location.reload();
                        // }, 2000);
                        
                    }
                  })
            }else{
                Swal.fire({
                    icon: "error",
                    title: "Oops",
                    text: "No se puedo registrar "+response
                })
                /*
                setTimeout(function(){
                    location.reload();
                }, 2000);
                */
            }
        }
    })
}

function imprimir(id){
    let array = {
        "nroFactura": id
    }
    $.ajax({
        type: "POST",
        url: "Model/imprimir.php",
        data: array,
        success: function(response){
            console.log(response);
        }
    })
}

//Dinamismo en mostrar las tablas
document.getElementById("T1").style.cursor = "pointer";
document.getElementById("T3").style.cursor = "pointer";

document.getElementById("row1").style.display = "none";
document.getElementById("row3").style.display = "none";

document.getElementById("ocultar1").style.cursor = "pointer";
document.getElementById("ocultar3").style.cursor = "pointer";

//Tabla 1
function mostrar1(){
    document.getElementById("row1").style.display = "block";
}
function ocultar1(){
    document.getElementById("row1").style.display = "none";
}

//Tabla 3
function mostrar3(){
    document.getElementById("row3").style.display = "block";
}
function ocultar3(){
    document.getElementById("row3").style.display = "none";
}
