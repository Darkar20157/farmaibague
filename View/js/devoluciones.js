function seacherVoucher(){
    let voucher = document.getElementById("barcodeVoucher").value;
    let array = {
        "voucher": voucher
    }
    $.ajax({
        type: "POST",
        url: "Model/devolution.php",
        data: array,
        success: function(response){
            if(response == ""){
                Swal.fire(
                    'Ups',
                    'Esa factura ya se ha devuelto o no existe',
                    'warning'
                )
                return false;
            }else{
                document.getElementById("body").innerHTML = response;
            }
            
        }
    })
}

function devolutionAccept(voucherNro, barcode){
    let des = document.getElementById("des").value;
    if(des == ""){
        Swal.fire(
            'Ups',
            'Tienes que ingresar un porque de la devolucion',
            'warning'
        )
        return false;
    }
    let array = {
        "nroDevolution": voucherNro,
        "barcode": barcode,
        "description": des
    }
    $.ajax({
        type: "POST",
        url: "Model/devolution.php",
        data: array,
        success: function(response){
            if(response == "Correcto"){
                Swal.fire(
                    'Excelente',
                    'Se ha hecho la devolucion correctamente',
                    'success'
                )
                setTimeout(function(){
                    window.location.reload();
                }, 3000);
            }else{
                Swal.fire(
                    'Ups',
                    'Error: '+response,
                    'error'
                )
            }
        }
    })
}