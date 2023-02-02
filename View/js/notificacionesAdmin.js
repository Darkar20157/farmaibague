$(document).ready(function(){
    // Muestra el numero de notificaciones del usuario
    let cedula = $("#cedula").val();
    let array1 = {
        "cedula": cedula
    }
    $.ajax({
        type: "POST",
        url: "Model/notificacionesAdmin.php",
        data: array1,
        success: function(response){
            let noti = document.getElementById("num");
            noti.innerHTML = response;
        }
    })
    // Muestra las notificaciones del usuario
    let array2 = {
        "ced": cedula
    };
    $.ajax({
        type: "POST",
        url: "Model/notificacionesAdmin.php",
        data: array2,
        success: function(response){
            let div = document.getElementById("div");
            div.innerHTML = response;
            quitar();
            btnQuitar();
        }
        
    })
    const loader = document.querySelector(".contenedor-loader");
    loader.style.opacity = 0
    loader.style.visibility = 'hidden';
})
// Acepta las notificaciones desde el menu para el administrador
function aceptarNoti(id){
    let borrar = document.getElementById(id);
    borrar.style.display = 'none';
    let identificador = id;
    let array = {
        "idA": identificador
    }
    $.ajax({
        type: "POST",
        url: "Model/condicionAdmin.php",
        data: array,
        success: function(response){
        }
    })
}
// Aceptar en el menu notificaciones pero auxiliares y lideres
function aceptarAux(id){
    let borrar = document.getElementById(id);
    borrar.style.display = 'none';
    let identificador = id;
    let array = {
        "idA": identificador
    }
    $.ajax({
        type: "POST",
        url: "Model/condicion.php",
        data: array,
        success: function(response){
            console.log(response);
        }
    })
}
// Rechazo en el menu notificaciones pero auxiliares y lideres
function rechazarAux(id){
    let borrar = document.getElementById(id);
    borrar.style.display = 'none';
    let identificador = id;
    let array = {
        "idR": identificador
    }
    $.ajax({
        type: "POST",
        url: "Model/condicion.php",
        data: array,
        success: function(response){
            console.log(response);
        }
    })
}

// Acepta la notificaciones del usuario desde la alerta notificaciones
function aceptar(id){
    let identificador = id;
    let array = {
        "idA": identificador
    }
    $.ajax({
        type: "POST",
        url: "Model/condicionAdmin.php",
        data: array,
        success: function(response){
            
        }
    })
}

//Dinamismo en las notificaciones del administrador
function quitar(){
    let close0 = !!document.getElementById("close0");
    if(close0 == false){
    }else{
        let close0 = document.getElementById("close0");
        const quitar0 = document.querySelector(".subtitle");
        close0.addEventListener("click", function(){
            quitar0.classList.toggle("close0");
        })
    }
    let close1 = !!document.getElementById("close1");
    if(close1 == false){;
        let apilado = document.querySelector(".toast-apilado");
        apilado.style.display = "none";
    }else{
        let close1 = document.getElementById("close1");
        const quitar1 = document.querySelector(".toast-conta1");
        close1.addEventListener("click", function(){
            quitar1.classList.toggle("close1");
        })
    }
    
    let close2 = !!document.getElementById("close2");
    if(close2 == false){
    }else{
        let close2 = document.getElementById("close2");
        const quitar2 = document.querySelector(".toast-conta2");
        close2.addEventListener("click", function(){
            quitar2.classList.toggle("close2");
        })
    }

    let close3 = !!document.getElementById("close3");
    if(close3 == false){
    }else{
        let close3 = document.getElementById("close3");
        const quitar3 = document.querySelector(".toast-conta3");
        close3.addEventListener("click", function(){
        quitar3.classList.toggle("close3");
    })
    }
}

function btnQuitar(){
    let btnClose1 = !!document.getElementById("btnClose1");
    if(btnClose1 == false){
    }else{
        let btnClose1 = document.getElementById("btnClose1");
        const btnQuitar1 = document.querySelector(".toast-conta1");
        btnClose1.addEventListener("click", function(){
            btnQuitar1.classList.toggle("close1");
        })
    }

    let btnClose2 = !!document.getElementById("btnClose2");
    if(btnClose2 == false){
    }else{
        let btnClose2 = document.getElementById("btnClose2");
        const btnQuitar2 = document.querySelector(".toast-conta2");
        btnClose2.addEventListener("click", function(){
        btnQuitar2.classList.toggle("close2");
        })
    }
    let btnClose3 = !!document.getElementById("btnClose3");
    if(btnClose3 == false){
    }else{
        let btnClose3 = document.getElementById("btnClose3");
        const btnQuitar3 = document.querySelector(".toast-conta3");
        btnClose3.addEventListener("click", function(){
            btnQuitar3.classList.toggle("close3");
        })
    }
    
}