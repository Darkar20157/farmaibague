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