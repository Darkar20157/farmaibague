function registrarProducto(){
    document.getElementById("registrar").disabled = true;
    var cod = $("#cod_product").val();
    var nom = $("#nom_product").val();
    var gra = $("#gram_unid").val()+$("#gram_letras").val();
    var marca = $("#marca").val();
    var precio = $("#precio").val();
    var notes = $("#notes").val();
    if(cod == '' || nom == '' || gra == '' || marca == '' || precio == ''){
        Swal.fire(
            "Oops",
            "Se han encontrado campos vacios",
            "error",
        )
        document.getElementById("registrar").disabled = false;
        return false;
    }else{
        let array = {
            "cod": cod,
            "nom": nom,
            "gra": gra,
            "marca": marca,
            "precio": precio,
            "notes": notes
        }
        $.ajax({
            type: "POST",
            url: "Model/registrarProductos.php",
            data: array,
            success: function(response){
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
                        text: "No se pudo registrar el producto"+response
                    })
                    document.getElementById("registrar").disabled = false;
                    return false;
                }
            }
        })
    }
}
function edit(code, nom, gram, mar, pre, notes){
    localStorage.setItem("code", code),
    localStorage.setItem("nom", nom),
    document.getElementById("exampleModalLabel").innerText = 'Editando Producto: '+nom;
    document.getElementById("edit_code").value = code;
    document.getElementById("edit_nom").value = nom;
    document.getElementById("gramos_edit").value = gram;
    document.getElementById("edit_marca").value = mar;
    document.getElementById("edit_precio").value = pre;
    document.getElementById("edit_notes").value = notes;
}
function editProducto(){
    var code = localStorage.getItem("code");
    var nom = localStorage.getItem("nom");
    document.getElementById("edit_guardar").disabled = true;
    let array = {
        "edit_code": code,
        "edit_nom": $('#edit_nom').val(),
        "edit_gramos": $('#gramos_edit').val(),
        "edit_marca": $('#edit_marca').val(),
        "edit_precio": $('#edit_precio').val(),
        "edit_notes": $('#edit_notes').val(),
    }
    Swal.fire({
        title: 'Estas seguro de editar',
        text: "Se editara el producto Codigo: "+code+" Nombre: "+nom,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Editar'
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "POST",
                url: "Model/registrarProductos.php",
                data: array,
                success: function(response){
                    console.log(response);
                    if(response == "Correcto"){
                        Swal.fire(
                            'Editado!',
                            'Haz editado este producto. '+nom,
                            'success'
                        )
                        setTimeout(function(){
                            window.location.reload();
                        }, 2000)      
                    }else{
                        Swal.fire({
                            icon: "error",
                            title: "Oops",
                            text: "No se pudo editar el producto"+response
                        })
                        document.getElementById("edit_guardar").disabled = false;
                    }                    
                }
            })
        }else{
            document.getElementById("edit_guardar").disabled = false;
        }
      })
    
}
function elminarProducto(code, nom){
    let array = {
        "code": code
    }
    Swal.fire({
        title: 'Estas seguro de eliminar',
        text: "Eliminaras el producto Codigo: "+code+" Nombre: "+nom,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Eliminar'
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "POST",
                url: "Model/registrarProductos.php",
                data: array,
                success: function(response){
                    console.log(response)
                    if(response == "Correcto"){
                        Swal.fire(
                            'Eliminado!',
                            'Haz eliminado este producto. '+nom,
                            'success'
                        )      
                    }else{
                        Swal.fire({
                            icon: "error",
                            title: "Oops",
                            text: "No se pudo eliminar el producto"+response
                        })
                    }
                    setTimeout(function(){
                        window.location.reload();
                    }, 2000)
                }
            })
        }
      })
}
function validar(){
    let cod = document.getElementById("cod_product").value;
    let array = {
        "val": cod
    }
    $.ajax({
        type: "POST",
        url: "Model/registrarProductos.php",
        data: array,
        success: function(response){
            if(response == "Incorrecto"){
                Swal.fire(
                    "Ups",
                    "El codigo que estas usando ya existe",
                    "warning"
                )
                document.getElementById("registrar").disabled = true;
            }else{
                document.getElementById("registrar").disabled = false;
            }
        }
    })
}