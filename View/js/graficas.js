$(document).ready(function(){
    $.ajax({
        type: "POST",
        dateType: "json",
        url: "Model/datosGraficas.php",
        data: 1,
        success: function(datos){
            var tiempo = new Date();
            let año = tiempo.getFullYear();
            let data = JSON.parse(datos);

            let cate1 = data[0].categoria;
            let stock1 = parseInt(data[0].stock);

            let cate2 = data[1].categoria;
            var stock2 = parseInt(data[1].stock); 
            
            let cate3 = data[2].categoria;
            let stock3 = parseInt(data[2].stock);

            let Total = parseInt(stock1) + parseInt(stock2) + parseInt(stock3);
            
            let porcentaje1 = (stock1 * 100) / Total;
            let porcentaje2 = (stock2 * 100) / Total;
            let porcentaje3 = (stock3 * 100) / Total;

            Highcharts.chart('container', {
                chart: {
                    type: 'variablepie'
                },
                title: {
                    text: 'Inventario '+año
                },
                tooltip: {
                    headerFormat: '',
                    pointFormat: '<span style="color:{point.color}">\u25CF</span> <b> {point.name}</b><br/>' +
                        'Stock : <b>{point.y}</b><br/>' +
                        'Porcentaje de Stock : <b>{point.z}%</b><br/>'
                },
                series: [{
                    minPointSize: 10,
                    innerSize: '20%',
                    zMin: 0,
                    name: 'countries',
                    data: [{
                        name: cate1,
                        y: stock1,
                        z: porcentaje1
                    }, {
                        name: cate2,
                        y: stock2,
                        z: porcentaje2
                    }, {
                        name: cate3,
                        y: stock3,
                        z: porcentaje3
                    }]
                }]
            });
        }
    })
})

