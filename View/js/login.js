// Desactiva el boton
document.getElementById("ingresar").disabled = true;
// Efecto desenfoque para consultar el usuario (user)
function verificarUser(){
    user.addEventListener("blur", function(){
        let input = document.getElementById("user").value;
        let array = {
            "user": input
        };
        $.ajax({
            type: "POST",
            url: "Model/login.php",
            data: array,
            success: function(response){
                if(response == "correcto"){
                    let div = document.getElementById("div");
                    div.className = "badge bg-success";
                    div.innerHTML = "El usuario es correcto";
                    document.getElementById("ingresar").disabled = false;
                }else{
                    let div = document.getElementById("div");
                    div.className = "badge bg-danger"
                    div.innerHTML = "El usuario es incorrecto";
                    document.getElementById("ingresar").disabled = true;
                }
            }
        });
    })
}
// Si tiene los datos correcto ingresa por medio del login
function ingresar(){
    let user = document.getElementById("user").value
    let pass = document.getElementById("pass").value
    let array = {
        "user1": user,
        "pass1": pass
    }
    $.ajax({
        type: "POST",
        url: "Model/login.php", 
        data: array,
        success: function(response){
            if(response == "Correcto"){
                Swal.fire(
                    'Bienvenido',
                    'Haz iniciado sesion correctamente',
                    'success'
                )
                setTimeout(function(){
                    window.location.href = "http://localhost/farmaibague/index.php?accion=cm91dGVQYWdl&ruta=Vmlldy9odG1sL2Rhc2hib2FyZC5waHA=";
                }, 2000)
            }else{
                Swal.fire({
                    icon: "error",
                    title: "Oops",
                    text: "El usuario y contraseña es incorrecto: "+response,
                })
                return false;
            }
        }
    })
}