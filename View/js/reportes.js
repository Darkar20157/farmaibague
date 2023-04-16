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
function seacherReport(){
    let date = document.getElementById("date").value;
    let array = {
        "date": date
    }
    $.ajax({
        type: "POST",
        url: "Model/reports.php",
        data: array,
        success: function(response){
            let div = document.getElementById("row1")
            div.innerHTML = response;
            return false;
        }
    })
}