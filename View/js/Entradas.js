$(document).ready(function(){
    //Datable con filtros y botones de exportacion
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
        pageLength: 20
    });
    $('#table2').DataTable({
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
        pageLength: 20
    });
    $('.select_form-control').select2();
    document.getElementById("Ncod_entrada").disabled = true;
    const loader = document.querySelector(".contenedor-loader");
    loader.style.opacity = 0
    loader.style.visibility = 'hidden';
})

//Validar campos que no esten vacios
function registrarEntrada(){
    document.getElementById("registrar").disabled = true;
    let codEnt = $("#cod_entrada").val();
    let proEnt = $("#producto_entrada").val();
    let precio = $("#precio").val();
    let cantidad = $("#cantidad_entrada").val();
    let proPro = $("#proveedor_producto").val();
    let packaging = $("#packaging").val();
    let priceBuy = $("#priceBuy").val();
    let novedades = $("#novedades").val();
    if(codEnt == "" || proEnt == "" || precio == "" || cantidad == "" 
    || proPro == "" || packaging == "" || priceBuy == "" || novedades == ""){
        Swal.fire(
            "Oops",
            "Se han encontrado campos vacios",
            "error",
        )
        document.getElementById("registrar").disabled = false;
        return false;
    }else{
        let array = {
            "cod_entrada": codEnt,
            "producto_entrada": proEnt,
            "precio": precio,
            "cantidad_entrada": cantidad,
            "proveedor_producto": proPro,
            "novedades": novedades,
            "packaging": packaging,
            "priceBuy": priceBuy
        }
        enviarEntrada(array);
    }
}

//Envia la entrada a la base de datos
function enviarEntrada(datos){
    $.ajax({
        type: "POST",
        url: "Model/registrarEntradas.php",
        data: datos,
        success: function(response){
            console.log(response);
            if(response == "Correcto"){
                Swal.fire(
                    'Buen trabajo',
                    'Se ha registrado satisfactoriamente',
                    'success'
                );
                setTimeout(function(){
                    location.reload();
                }, 2000)
            }else{
                Swal.fire({
                    icon: "error",
                    title: "Oops",
                    text: "No se pudo registrar el producto "+response
                })
                document.getElementById("registrar").disabled = false;
                return false;
            }
        }
    })
}
// Funcion para consultar el codigo del producto
function productoEntradas(){
    let codP = $("#cod_entrada").val();
    let array = {
        "cod": codP
    };
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "Model/consulta.php",
        data: array,
        success: function(response){
            $("#producto_entrada").val(response.NAME_PRODUCT);
            $("#precio").val(response.PRICE);
           
        }
    })
}
function vendors(){
    let vendors = $('#proveedor_producto').val();
    let array = {
        "nit": vendors
    };
    $.ajax({
        type: "POST",
        url: "Model/consulta.php",
        dataType: "json",
        data: array,
        success: function(response){
            $("#direccion_proveedor").val(response.ADDRESS_VENDOR);
            $("#telefono_proveedor").val(response.PHONE_VENDOR);
        }
    })
}
function editar(id, name, cant, price, emb, priceBuy, notes){
    if(!id == 0){
        localStorage.setItem("idInv", id);
        $("#nom").val(name)
        $("#cant").val(cant)
        $("#pric").val(price)
        $("#emb").val(emb)
        $("#preC").val(priceBuy)
        $("#nov").val(notes)
        return false;
    }
    let array = {
        "idEdit": localStorage.getItem("idInv"),
        "nom": $("#nom").val(),
        "cant": $("#cant").val(),
        "pric": $("#pric").val(),
        "emb": $("#emb").val(),
        "preC": $("#preC").val(),
        "nov": $("#nov").val(),
    }
    $.ajax({
        type: "POST",
        url: "Model/registrarEntradas.php",
        data: array,
        success: function(response){
            if(response == "Correcto"){
                Swal.fire(
                    'Editado!!',
                    'Se ha editado el producto correctamente',
                    'success'
                )
                setTimeout(function(){
                    window.location.reload();
                }, 2000)
            }
            
        }
    })
}
function eliminar(id){
    let array = {
        "id": id
    }
    Swal.fire({
        title: 'Estas seguro de eliminar?',
        text: "Eliminadaras este producto!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Eliminar!'
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "POST",
                url: "Model/registrarEntradas.php",
                data: array,
                success: function(response){
                    if(response == "Correcto"){
                        Swal.fire(
                            'Eliminado!',
                            'Este registro ha sido eliminado.',
                            'success'
                        )
                        setTimeout(function(){
                            window.location.reload();
                        }, 2000)
                    }
                }
            })
        }
      })
}
function editarInv(id, name, gram, brand, cant, price, emb, nit){
    if(!id == 0){
        localStorage.setItem("idInv", id);
        $("#nompInv").val(name)
        $("#cantInv").val(cant)
        $("#precInv").val(price)
        $("#embInv").val(emb)
        $("#nit").val(nit)
        return false;
    }
    let array = {
        "idEditInv": localStorage.getItem("idInv"),
        "nom": $("#nompInv").val(),
        "cant": $("#cantInv").val(),
        "pre": $("#precInv").val(),
        "emb": $("#embInv").val(),
        "nit": $("#nit").val(),
    }
    $.ajax({
        type: "POST",
        url: "Model/registrarEntradas.php",
        data: array,
        success: function(response){
            if(response == "Correcto"){
                Swal.fire(
                    'Editado!!',
                    'Se ha editado el producto correctamente',
                    'success'
                )
                setTimeout(function(){
                    window.location.reload();
                }, 2000)
            }
            
        }
    })
}

function eliminarInv(id){
    let array = {
        "idInv": id
    }
    Swal.fire({
        title: 'Estas seguro de eliminar?',
        text: "Eliminadaras este producto!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Eliminar!'
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "POST",
                url: "Model/registrarEntradas.php",
                data: array,
                success: function(response){
                    if(response == "Correcto"){
                        Swal.fire(
                            'Eliminado!',
                            'Este registro ha sido eliminado.',
                            'success'
                        )
                        setTimeout(function(){
                            window.location.reload();
                        }, 2000)
                    }
                }
            })
        }
      })
}

//Dinamismo en la pagina
document.getElementById("selector1").style.cursor = "pointer";
document.getElementById("selector2").style.cursor = "pointer";

//Dinamismo en mostrar las tablas
document.getElementById("T1").style.cursor = "pointer";
document.getElementById("T2").style.cursor = "pointer";

document.getElementById("row1").style.display = "none";
document.getElementById("row2").style.display = "none";

document.getElementById("ocultar1").style.cursor = "pointer";
document.getElementById("ocultar2").style.cursor = "pointer";

//Tabla 1
function mostrar1(){
    document.getElementById("row1").style.display = "block";
}
function ocultar1(){
    document.getElementById("row1").style.display = "none";
}

//Tabla 2
function mostrar2(){
    document.getElementById("row2").style.display = "block";
}
function ocultar2(){
    document.getElementById("row2").style.display = "none";
}
