$(document).ready(function(){
    const loader = document.querySelector(".contenedor-loader");
    loader.style.opacity = 0
    loader.style.visibility = 'hidden';
})
function aggCost(){
    let name = document.getElementById("cost").value;
    let price = document.getElementById("value").value;
    let array = {
        "cost": name,
        "value": price
    }

    $.ajax({
        type: "POST",
        url: "Model/costosAdicionales.php",
        data: array,
        success: function(response){
            console.log(response)
            if(response == "Correcto"){
                Swal.fire(
                    "Excelente!",
                    "Se ha guardado correctamente",
                    "success"
                )
                setTimeout(function(){
                    window.location.reload();
                }, 2000);
            }else{
                Swal.fire(
                    "Ups!",
                    "Ha ocurrido un error "+response,
                    "error"
                )
            }
            return false;
        }
    })
}
function aggDiscount(){
    let name = document.getElementById("discount").value;
    let price = document.getElementById("price").value;
    let array = {
        "name": name,
        "price": price
    }

    $.ajax({
        type: "POST",
        url: "Model/costosAdicionales.php",
        data: array,
        success: function(response){
            if(response == "Correcto"){
                Swal.fire(
                    "Excelente!",
                    "Se ha guardado correctamente",
                    "success"
                )
                setTimeout(function(){
                    window.location.reload();
                }, 2000);
            }else{
                Swal.fire(
                    "Ups!",
                    "Ha ocurrido un error "+response,
                    "error"
                )
            }
            return false;
        }
    })
}
function aggMethod(){
    let name = document.getElementById("method").value;
    let array = {
        "method": name,
    }

    $.ajax({
        type: "POST",
        url: "Model/costosAdicionales.php",
        data: array,
        success: function(response){
            if(response == "Correcto"){
                Swal.fire(
                    "Excelente!",
                    "Se ha guardado correctamente",
                    "success"
                )
                setTimeout(function(){
                    window.location.reload();
                }, 2000);
            }else{
                Swal.fire(
                    "Ups!",
                    "Ha ocurrido un error "+response,
                    "error"
                )
            }
            return false;
        }
    })
}

function editar(type, id, name, email, address, phone, gender){
    if(!id == 0){
        localStorage.setItem("client", id);
        localStorage.setItem("table", type);
        $("#name").val(name)
        $("#email").val(email)
        $("#addres").val(address)
        $("#cel").val(phone)
        $("#gen").val(gender)
        return false;
    }
    let array = {
        "table": localStorage.getItem("table"),
        "id": localStorage.getItem("client"),
        "names": $("#name").val(),
        "email": $("#email").val(),
        "address": $("#addres").val(),
        "phone": $("#cel").val(),
        "gender": $("#gen").val()
    }
    $.ajax({
        type: "POST",
        url: "Model/costosAdicionales.php",
        data: array,
        success: function(response){
            if(response == "Correcto"){
                Swal.fire(
                    "Excelente!",
                    "Se ha editado correctamente",
                    "success"
                )
                setTimeout(function(){
                    window.location.reload();
                }, 2000);
            }else{
                Swal.fire(
                    "Ups!",
                    "Ha ocurrido un error "+response,
                    "error"
                )
                return false;
            }
        }
    })
}

function eliminar(type, id){
    let array = {
        "type": type,
        "id": id
    }
    $.ajax({
        type: "POST",
        url: "Model/costosAdicionales.php",
        data: array,
        success: function(response){
            if(response == "Correcto"){
                Swal.fire(
                    "Excelente!",
                    "Se ha eliminado correctamente",
                    "success"
                )
                setTimeout(function(){
                    window.location.reload();
                }, 2000);
            }else{
                Swal.fire(
                    "Ups!",
                    "Ha ocurrido un error "+response,
                    "error"
                )
                return false;
            }
        }
    })
}
function aggVendor(){
    let nit = document.getElementById("nitVendor").value;
    let name = document.getElementById("nameVendor").value;
    let dir = document.getElementById("addressVendor").value;
    let tel = document.getElementById("phoneProveedor").value;
    if(nit == "" || name == "" || dir == "" || tel == ""){
        Swal.fire(
            "Ups!",
            "Hay campos vacios para crear el proveedor ",
            "error"
        )
        return false;
    }
    let array = {
        "nit": nit,
        "name_vendor": name,
        "dir": dir,
        "tel": tel
    }
    $.ajax({
        type: "POST",
        url: "Model/costosAdicionales.php",
        data: array,
        success: function(response){
            console.log(response);
            if(response == "Correcto"){
                Swal.fire(
                    "Excelente!",
                    "Se ha eliminado correctamente",
                    "success"
                )
                setTimeout(function(){
                    window.location.reload();
                }, 2000);
            }else{
                Swal.fire(
                    "Ups!",
                    "Ha ocurrido un error "+response,
                    "error"
                )
                return false;
            }
        }
    })
}

function aggPresentation(){
    let presentation = document.getElementById("presentation").value;
    if(presentation == ""){
        Swal.fire(
            "Ups!",
            "Hay campos vacios para crear la presentacion",
            "error"
        )
        return false;
    }
    let array = {
        "pre": presentation
    }
    $.ajax({
        type: "POST",
        url: "Model/costosAdicionales.php",
        data: array,
        success: function(response){
            console.log(response);
            if(response == "Correcto"){
                Swal.fire(
                    "Excelente!",
                    "Se ha eliminado correctamente",
                    "success"
                )
                setTimeout(function(){
                    window.location.reload();
                }, 2000);
            }else{
                Swal.fire(
                    "Ups!",
                    "Ha ocurrido un error "+response,
                    "error"
                )
                return false;
            }
        }
    })
}