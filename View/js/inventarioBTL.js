function ingresar(){
    $("#formulario").submit("click",function(event){
        event.preventDefault();
        let datos = new FormData($("#formulario")[0]);
        $.ajax({
            url: 'Model/inventarioBTL.php',
            type: 'POST',
            data: datos,
            contentType: false,
            processData: false,
            success: function(response){
                console.log(response);
                if(response == "Correcto"){
                    Swal.fire(
                        'Buen Trabajo!',
                        'Se ha registrado satisfactoriamente',
                        'success'
                    )
                    setTimeout(function(){
                        location.reload();
                    }, 2000);
                }else{
                    Swal.fire({
                        icon: "error",
                        title: "Oops!",
                        text: "Ha ocurrido algo!"
                    })
                }
            }
        })
    })
}

function exportar(){
    window.location.href = "Model/exportarExcel.php";
}