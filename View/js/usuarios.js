$(document).ready(function(){
    const loader = document.querySelector(".contenedor-loader");
    loader.style.opacity = 0
    loader.style.visibility = 'hidden';
})
//Validar que el usuario que crea no exista
function validar1(){
    usuario.addEventListener("keyup", function(){
        let usuario = $("#usuario").val();
        let contar = usuario.length;
        let array = {
            "validar": usuario
        }
        if(contar < 10){
            let div1 = document.getElementById("caracteres");
            div1.innerHTML = "El usuario debe tener minimo 10 caracteres";
            div1.style.color = "red";
            document.getElementById("Registrar").disabled = true;
            let div2 = document.getElementById("validar");
            div2.innerHTML = "Usuario";
        }else{
            $.ajax({
                type: "POST",
                url: "Model/crear_usuarios.php",
                data: array,
                success: function(response){
                    if(response == "Si existe"){
                        let div1 = document.getElementById("caracteres");
                        div1.innerHTML = "El usuario ya existe";
                        div1.style.color = "red";
                        document.getElementById("Registrar").disabled = true;
                    }else{
                        let div1 = document.getElementById("validar");
                        div1.innerHTML = 'Usuario <img src="https://img.icons8.com/ios/20/000000/pass.png"/>';
                        let div2 = document.getElementById("caracteres");
                        document.getElementById("Registrar").disabled = false;
                        div2.innerHTML = ''
                    }
                }
            })
        }
        
    })
}
//Validar que el usuario que crea no tengo la misma cedula
function validar2(){
    let cedula = document.getElementById("ced");
    cedula.addEventListener("keyup",function(){
        let cedula = $("#ced").val();
        let array = {
            "validar2": cedula
        }
        $.ajax({
            type: "POST",
            url: "Model/crear_usuarios.php",
            data: array,
            success: function(response){
                console.log(response)
                if(response == "Si existe"){
                    let div2 = document.getElementById("caracteres2");
                    div2.innerHTML = "La cedula ya existe";
                    div2.style.color = "red";
                    document.getElementById("Registrar").disabled = true;
                    let div = document.getElementById("validar2");
                    div.innerHTML = 'Cedula';
                }else{
                    let div2 = document.getElementById("validar2");
                    div2.innerHTML = 'Cedula <img src="https://img.icons8.com/ios/20/000000/pass.png"/>'
                    let div = document.getElementById("caracteres2");
                    div.innerHTML = ''
                    document.getElementById("Registrar").disabled = false;
                }
            }
        })
    })
}
//Crear el usuario
function crearUsuario(){
    let usuario = $("#usuario").val();
    let pass = $("#pass").val();
    let tipo = $("#tipo").val();
    let cedula = $("#ced").val();
    let nombres = $("#nombres").val();
    let direccion = $("#direccion").val();
    let celular = $("#celular").val();
    if(usuario == "" || pass == "" || tipo == "" || cedula == "" || nombres == "" || direccion == "" || celular == ""){
        Swal.fire({
            icon: "error",
            title: "Oops",
            text: "Hay campos vacios en el formulario"
        });
    }else{
        let array = {
            "user": usuario,
            "pass": pass,
            "tipe": tipo,
            "ced": cedula,
            "nom": nombres,
            "dir": direccion,
            "cel": celular
        };
        $.ajax({
            type: "POST",
            url: "Model/crear_usuarios.php",
            data: array,
            success: function(response){
                console.log(response);
                if(response == "Correcto"){
                    Swal.fire(
                        "Exelente",
                        "Haz creado un nuevo usuario",
                        "success"
                    )
                    setTimeout(function(){
                        window.location.reload();
                    }, 2000)
                }
                if(response == "Incorrecto"){
                    Swal.fire({
                        icon: "error",
                        title: "Oops",
                        text: "No se puedo crear el usuario en este momento intenta nuevamente"
                    })
                    setTimeout(function(){
                        window.location.reload();
                    },2000)
                }
            }
        });
    }
}
//Validar el usuario
function validarPass(){
    Cpass.addEventListener("keyup", function(){
        let pass = $("#pass").val();
        let Cpass = $("#Cpass").val();
        if(pass == Cpass){
            document.getElementById("contra1").innerHTML = "Contraseña <img src='https://img.icons8.com/ios/20/000000/pass.png'>"
            document.getElementById("contra2").innerHTML = "Confirmar Contraseña <img src='https://img.icons8.com/ios/20/000000/pass.png'>"
            document.getElementById("actualizar").disabled = false;
            document.getElementById("confirmar").innerText = ""
        }else{
            document.getElementById("confirmar").innerText = "Las contraseñas no coinciden"
            document.getElementById("actualizar").disabled = true;
        }
    })
}
//Actualizar datos de usuario
function editarUsuario(){
    let ced = $("#cedula").val();
    let user = $("#usuario").val();
    let pass = $("#pass").val();
    let Cpass = $("#Cpass").val();
    let nom = $("#nom").val();
    if(ced == "" || user == "" || pass == "" || Cpass == "" || nom == ""){
        Swal.fire({
            icon: "error",
            title: "Oops",
            text: "Debes de Rellenar todos los campos"
        })
    }
    let array = {
        "ced": ced,
        "user": user,
        "pass": pass,
        "Cpass": Cpass,
        "nom": nom,
    };
    $.ajax({
        type: "POST",
        url: "Model/editarUsuarios.php",
        data: array,
        success: function(response){
            if(response == "Correcto"){
                Swal.fire(
                    "Exelente",
                    "Haz Actualizado tus datos personales",
                    "success"
                );
                /*
                setTimeout(function(){
                    window.location.href = "index.php";
                },3000);
                */
            }else{
                Swal.fire(
                    "Ups",
                    "No se ha podido actualizar los datos",
                    "error"
                );
            }
        }
    })
}