var table;
function listar_home(){
    table = $('#tabla_alerta').DataTable( {
        "ordering":true,
        "paging": true,
        "searching": { "regex": true },
        "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
        "pageLength": 10,
        "destroy":true,
        "async": true ,
        "processing": true,
        "ajax": {
            "url": "../controlador/home/controlador_home_listar.php",
            "type": "POST"
        },
        "columns": [
            { "data": "propietario"},
            { "data": "placa" },
            { "data": "email" },
            { "data": "Vencimiento" },
            { "data": "Fecha" },
            {"defaultContent":
            "</button><button style='font-size:13px;' type='button' class='enviarCorreo btn btn-success'><i class='fa fa-envelope'></i></button>"}
        ],
        "language":idioma_espanol,
       select: true
    } ); 
    
}

// FUNCION PARA EDITAR REGISTRO
$('#tabla_alerta').on('click','.enviarCorreo',function(){

    if(table.row(this).child.isShown()){
        var datos = table.row(this).data();
    }else{
        var datos = table.row($(this).parents('tr')).data();
    }

    var propietario = datos.propietario;
    var placa = datos.placa;
    var email = datos.email;
    var Vencimiento = datos.Vencimiento;
    var Fecha = datos.Fecha;

    Swal.fire({
        title: '¿Seguro desea enviar un email?',
        text: "Una vez hecho esto, se enviará un email con los datos de vencimiento del registro",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Aceptar',
        cancelButtonText: 'Cancelar'
      }).then((result) => {
        if (result.value) {
            $.ajax({
                "url": "../Controlador/home/controlador_home_enviar_vencimiento.php",
                "type": "POST",
                data:{
                Propietario : propietario,
                Vencimiento : Vencimiento,
                Placa       : placa,
                Email       : email,
                Fecha       : Fecha
                }
            }).done(function(resp){
                if(resp > 0){
                    Swal.fire("¡Email enviado con exito!",'Pronto recibira el email', "success")
                }else{
                    Swal.fire("Error",'No se pudo enviar el email, revise su conexion', "error");
                }
            })
        }
      })

})

// FUNCION PARA EXPORTAR REPORTE
function reporte(){
    var url = "../controlador/home/controlador_exportar_reporte.php"
    window.open(url,'_blank');
}

// funcion para charts de ordenbes de servicio por meses
function graficaOrdenes(){
    console.log("Hola");
    $.ajax({
        "url": "../Controlador/home/controlador_grafico_orden.php",
        "type": "POST",
    }).done(function(resp){
    
        var resultado = eval("(" + resp + ")");
        console.log("Prueba",resultado['cantidad']);

        var areaChartCanvas = $('#areaChart').get(0).getContext('2d')
        var areaChartData = {
        labels  : ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
        datasets: [
            {
            label               : 'Ordenes registradas',
            backgroundColor     : 'rgba(0,83,149,0.8)',
            borderColor         : 'rgba(0,83,149)',
            pointRadius          : false,
            pointColor          : '#3b8bba',
            pointStrokeColor    : 'rgba(60,141,188,1)',
            pointHighlightFill  : '#fff',
            pointHighlightStroke: 'rgba(60,141,188,1)',
            data                : resultado[0]
            }
        ]
        }

    var areaChartOptions = {
      maintainAspectRatio : false,
      responsive : true,
      legend: {
        display: false
      },
      scales: {
        xAxes: [{
          gridLines : {
            display : false,
          }
        }],
        yAxes: [{
          gridLines : {
            display : false,
          }
        }]
      }
    }

    // This will get the first returned node in the jQuery collection.
    new Chart(areaChartCanvas, {
      type: 'line',
      data: areaChartData,
      options: areaChartOptions
    })

    })
}