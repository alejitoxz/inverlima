var table;
function listar_orden(){
    table = $('#tabla_orden').DataTable( {
        "ordering":true,
        "paging": true,
        "searching": { "regex": true },
        "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
        "pageLength": 10,
        "destroy":true,
        "async": true ,
        "processing": true,
        "ajax": {
            "url": "../controlador/ordenServicio/controlador_listar_orden.php",
            "type": "POST"
        },
        "columns": [
            { "data": "id" },
            { "data": "id" },
            { "data": "id" },
            { "data": "id" },
            { "data": "id" },
            { "data": "id" },
            { "data": "id" },
            { "data": "id" },
            { "data": "id" },
            { "data": "id" },
            { "data": "id" },
            { "data": "id" },
            { "data": "id" },
            { "data": "id" },
            { "data": "id" },
            { "data": "id" },
            { "data": "id" },
            { "data": "id" },
            { "data": "id" },
            { "data": "id" },
            { "data": "id" },
            { "data": "id" },
            { "data": "id" },
            { "data": "id" },
            { "data": "id" },
            { "data": "id" },
            { "data": "id" },
            { "data": "id" },
            { "data": "id" },
            { "data": "id" },
            { "data": "id" },
            { "data": "id" },
            { "data": "id" },
            { "data": "id" },
            { "data": "id" },
            { "data": "id" },
            { "data": "id" },
            { "data": "id" },
            { "data": "id" },
            { "data": "id" },
            { "data": "id" },
            { "data": "id" },
            { "data": "id" },
            { "data": "id" },
            { "data": "id" },
            { "data": "id" },
            { "data": "id" },
            { "data": "id" },
            { "data": "id" },
            { "data": "id" },
            { "data": "id" },
            { "data": "id" },
            { "data": "id" },
            { "data": "id" },
            { "data": "id" },
            { "data": "id" },
            { "data": "id" },
            { "data": "id" },
            { "data": "id" },
            { "data": "id" },
            { "data": "id" },
            { "data": "id" },
            { "data": "id" },
            { "data": "id" },
            { "data": "id" },
            { "data": "id" },
            { "data": "id" },
            { "data": "id" },
            { "data": "id" },
            { "data": "id" },
            { "data": "id" },
            { "data": "id" },
            { "data": "id" },
            { "data": "id" },
            { "data": "id" },
            { "data": "id" },
            { "data": "id" },
            { "data": "id" },
            { "data": "id" },
            { "data": "id" },
            { "data": "id" },
            { "data": "id" },
            { "data": "id" },
            { "data": "id" },
            { "data": "id" },
            { "data": "id" },
            { "data": "id" },
            { "data": "id" },
            { "data": "id" },
            { "data": "id" },
            { "data": "id" },
            { "data": "id" },
            { "data": "id" },
            { "data": "id" },
            { "data": "id" },
            { "data": "id" },
            { "data": "id" },
            { "data": "id" },
            { "data": "id" },
            { "data": "placa" },
            { "data": "cod_interno" },
            { "data": "rRegistradora" },
            { "data": "tecnico" },
            { "data": "fecha_creacion" },
            { "data": "observacion" },
            {"defaultContent":
            "<button style='font-size:13px;' type='button' class='eliminar btn btn-danger'><i class='fa fa-trash'></i></button><button style='font-size:13px;' type='button' class='editar btn btn-info'><i class='fa fa-edit'></i></button>"}
        ],
        "language":idioma_espanol,
       select: true
    } );
    
}

function AbrirModalRegistroOrdenServicio(){
    $("#modal_registro_OrdenServicio").modal({backdrop:'static',keyboard:false})
    $("#modal_registro_OrdenServicio").modal('show');
    $(document).ready(function(){
        $('.js-example-basic-single').select2();
        $("#modal_registro_OrdenServicio").on('shown.bs.modal',function(){
        });
    
        // inicimos wizzard
          // BS-Stepper Init
          window.stepper = new Stepper(document.querySelector('.bs-stepper'))

          
          
    
      });
}
function AbrirModalEditarOrdenServicio(){
    $("#modal_editar_OrdenServicio").modal({backdrop:'static',keyboard:false})
    $("#modal_editar_OrdenServicio").modal('show');
    $(document).ready(function(){
        $('.js-example-basic-single').select2();
        $("#modal_editar_OrdenServicio").on('shown.bs.modal',function(){
        });
    
        // inicimos wizzard
          // BS-Stepper Init
          window.stepper = new Stepper(document.querySelector('.stepper-editar'))
          
    
      });
}

function listar_placa(){
    $.ajax({
        "url": "../controlador/ordenServicio/controlador_placa_listar.php",
        "type": "POST"
    }).done(function(resp){
        var data = JSON.parse(resp);
        
        var cadena="";
        if(data.length>0){
            cadena+="<option value='0'>Seleccionar</option>"; 
            for(var i=0; i < data.length; i++){
                cadena+="<option value ='"+data[i]['id']+"'>"+data[i]['placa']+" - "+data[i]['cod_interno']+"</option>";
            } 
            $("#sel_placa_vehiculo").html(cadena);
            $("#sel_editar_placa_vehiculo").html(cadena);
        }else{
            cadena+="<option value =''>No se encontraron registros</option>"; 
        }
    })
}
function listar_tecnico(){
    $.ajax({
        "url": "../controlador/ordenServicio/controlador_tecnico_listar.php",
        "type": "POST"
    }).done(function(resp){
        var data = JSON.parse(resp);
        
        var cadena="";
        if(data.length>0){
            cadena+="<option value='0'>Seleccionar</option>"; 
            for(var i=0; i < data.length; i++){
                cadena+="<option value ='"+data[i]['id']+"'>"+data[i]['tecnico']+"</option>";
            }
            $("#sel_tecnico").html(cadena);
            $("#sel_editar_tecnico").html(cadena);
        }else{
            cadena+="<option value =''>No se encontraron registros</option>"; 
        }
    })
}

function odometro(id){
    $.ajax({
        "url": "../controlador/vehiculo/controlador_odometro.php",
        "type": "POST",
        "data": {id}
    }).done(function(resp){
        var data = JSON.parse(resp);
         
        var cadena="";
        if(data.length>0){            
            $("#txt_kmGps").val(data[0]['Odometer']);
            $("#txt_editar_kmGps").val(data[0]['Odometer']);
        }else{
            cadena+="<option value =''>No se encontraron registros</option>"; 
        }
    })
}

function listar_bateria(){
    $.ajax({
        "url": "../controlador/ordenServicio/controlador_bateria_listar.php",
        "type": "POST"
    }).done(function(resp){
        var data = JSON.parse(resp);
        
        var cadena="";
        if(data.length>0){
            cadena+="<option value='0'>Seleccionar</option>"; 
            for(var i=0; i < data.length; i++){
                cadena+="<option value ='"+data[i]['id']+"'>"+data[i]['bateria']+"</option>";
            }
            $("#sel_bateria").html(cadena);
            $("#sel_editar_bateria").html(cadena);
        }else{
            cadena+="<option value =''>No se encontraron registros</option>"; 
        }
    })
}
function listar_tipoBateria(){
    $.ajax({
        "url": "../controlador/ordenServicio/controlador_tipoBateria_listar.php",
        "type": "POST"
    }).done(function(resp){
        var data = JSON.parse(resp);
        
        var cadena="";
        if(data.length>0){
            cadena+="<option value='0'>Seleccionar</option>"; 
            for(var i=0; i < data.length; i++){
                cadena+="<option value ='"+data[i]['id']+"'>"+data[i]['tipoBateria']+"</option>";
            }
            $("#sel_tipoBateria").html(cadena);
            $("#sel_editar_tipoBateria").html(cadena);
        }else{
            cadena+="<option value =''>No se encontraron registros</option>"; 
        }
    })
}
function listar_marca(){
    $.ajax({
        "url": "../controlador/ordenServicio/controlador_marca_listar.php",
        "type": "POST"
    }).done(function(resp){
        var data = JSON.parse(resp);
        
        var cadena="";
        if(data.length>0){
            cadena+="<option value='0'>Seleccionar</option>"; 
            for(var i=0; i < data.length; i++){
                cadena+="<option value ='"+data[i]['id']+"'>"+data[i]['marca']+"</option>";
            }
            $("#sel_marca").html(cadena);
            $("#sel_editar_marca").html(cadena);
        }else{
            cadena+="<option value =''>No se encontraron registros</option>"; 
        }
    })
}
function listar_marca_llanta(){
    $.ajax({
        "url": "../controlador/ordenServicio/controlador_marca_llanta_listar.php",
        "type": "POST"
    }).done(function(resp){
        var data = JSON.parse(resp);
        
        var cadena="";
        if(data.length>0){
            cadena+="<option value='0'>Seleccionar</option>"; 
            for(var i=0; i < data.length; i++){
                cadena+="<option value ='"+data[i]['id']+"'>"+data[i]['llanta']+"</option>";
            }
            $("#sel_marca_llanta").html(cadena);
            $("#sel_marca_llanta1").html(cadena);
            $("#sel_marca_llanta2").html(cadena);
            $("#sel_marca_llanta3").html(cadena);
            $("#sel_marca_llanta4").html(cadena);
            $("#sel_marca_llanta5").html(cadena);
            $("#sel_editar_marca_llanta").html(cadena);
            $("#sel_editar_marca_llanta1").html(cadena);
            $("#sel_editar_marca_llanta2").html(cadena);
            $("#sel_editar_marca_llanta3").html(cadena);
            $("#sel_editar_marca_llanta4").html(cadena);
            $("#sel_editar_marca_llanta5").html(cadena);
        }else{
            cadena+="<option value =''>No se encontraron registros</option>"; 
        }
    })
}
function listar_tipo_aceite(){
    $.ajax({
        "url": "../controlador/ordenServicio/controlador_tipo_aceite_listar.php",
        "type": "POST"
    }).done(function(resp){
        var data = JSON.parse(resp);
        
        var cadena="";
        if(data.length>0){
            cadena+="<option value='0'>Seleccionar</option>"; 
            for(var i=0; i < data.length; i++){
                cadena+="<option value ='"+data[i]['id']+"'>"+data[i]['tipo_aceite']+"</option>";
            }
            $("#sel_tipo_aceite").html(cadena);
            $("#sel_tipo_aceite1").html(cadena);
            $("#sel_tipo_aceite2").html(cadena);
            $("#sel_tipo_aceite3").html(cadena);
            $("#sel_tipo_aceite4").html(cadena);
            $("#sel_editar_tipo_aceite").html(cadena);
            $("#sel_editar_tipo_aceite1").html(cadena);
            $("#sel_editar_tipo_aceite2").html(cadena);
            $("#sel_editar_tipo_aceite3").html(cadena);
            $("#sel_editar_tipo_aceite4").html(cadena);
        }else{
            cadena+="<option value =''>No se encontraron registros</option>"; 
        }
    })
}
function listar_marca_aceite(){
    $.ajax({
        "url": "../controlador/ordenServicio/controlador_marca_aceite_listar.php",
        "type": "POST"
    }).done(function(resp){
        var data = JSON.parse(resp);
        
        var cadena="";
        if(data.length>0){
            cadena+="<option value='0'>Seleccionar</option>"; 
            for(var i=0; i < data.length; i++){
                cadena+="<option value ='"+data[i]['id']+"'>"+data[i]['marca_aceite']+"</option>";
            }
            $("#sel_marca_aceite").html(cadena);
            $("#sel_marca_aceite1").html(cadena);
            $("#sel_marca_aceite2").html(cadena);
            $("#sel_marca_aceite3").html(cadena);
            $("#sel_marca_aceite4").html(cadena);
            $("#sel_editar_marca_aceite").html(cadena);
            $("#sel_editar_marca_aceite1").html(cadena);
            $("#sel_editar_marca_aceite2").html(cadena);
            $("#sel_editar_marca_aceite3").html(cadena);
            $("#sel_editar_marca_aceite4").html(cadena);
        }else{
            cadena+="<option value =''>No se encontraron registros</option>"; 
        }
    })
}
function listar_filtro_aceite(){
    $.ajax({
        "url": "../controlador/ordenServicio/controlador_filtro_aceite_listar.php",
        "type": "POST"
    }).done(function(resp){
        var data = JSON.parse(resp);
        
        var cadena="";
        if(data.length>0){
            cadena+="<option value='0'>Seleccionar</option>"; 
            for(var i=0; i < data.length; i++){
                cadena+="<option value ='"+data[i]['id']+"'>"+data[i]['filtro_aceite']+"</option>";
            }
            $("#sel_filtro_aceite").html(cadena);
            $("#sel_editar_filtro_aceite").html(cadena);
        }else{
            cadena+="<option value =''>No se encontraron registros</option>"; 
        }
    })
}
function listar_filtro_aire(){
    $.ajax({
        "url": "../controlador/ordenServicio/controlador_filtro_aire_listar.php",
        "type": "POST"
    }).done(function(resp){
        var data = JSON.parse(resp);
        
        var cadena="";
        if(data.length>0){
            cadena+="<option value='0'>Seleccionar</option>"; 
            for(var i=0; i < data.length; i++){
                cadena+="<option value ='"+data[i]['id']+"'>"+data[i]['filtro_aire']+"</option>";
            }
            $("#sel_filtro_aire").html(cadena);
            $("#sel_editar_filtro_aire").html(cadena);
        }else{
            cadena+="<option value =''>No se encontraron registros</option>"; 
        }
    })
}
function listar_filtro_combustible(){
    $.ajax({
        "url": "../controlador/ordenServicio/controlador_filtro_combustible_listar.php",
        "type": "POST"
    }).done(function(resp){
        var data = JSON.parse(resp);
        
        var cadena="";
        if(data.length>0){
            cadena+="<option value='0'>Seleccionar</option>"; 
            for(var i=0; i < data.length; i++){
                cadena+="<option value ='"+data[i]['id']+"'>"+data[i]['filtro_combustible']+"</option>";
            }
            $("#sel_filtro_combustible").html(cadena);
            $("#sel_editar_filtro_combustible").html(cadena);
        }else{
            cadena+="<option value =''>No se encontraron registros</option>"; 
        }
    })
}

function registrar_orden_Servicio(){

    var id = $("#idPersonaC").val();
    var placa = $("#sel_placa_vehiculo").val();
    var revBimCotrautol = $("#txt_revb").val();
    var rRegistradora = $("#sel_rReg").val();
    var kmGps = $("#txt_kmGps").val();
    var vExtintor = $("#txt_vExtintor").val();
    var oReg = $("#txt_oReg").val();
    var observacion = $("#txt_obs").val();
    var tecnico = $("#sel_tecnico").val();
    var bateria = $("#sel_bateria").val();
    var tipoBateria = $("#sel_tipoBateria").val();
    var marca = $("#sel_marca").val();
    var serial = $("#txt_serial").val();
    var fVenta = $("#txt_fVenta").val();
    var fInstalacion = $("#txt_fInstalacion").val();
    var tUso = $("#txt_tUso").val();
    var pCambio = $("#txt_pCambio").val();
    var pMantenimiento = $("#txt_pMantenimiento").val();
    var oMejora = $("#txt_oMejora").val();
    var llantaSerial1 = $("#txt_llantaSerial1").val();
    var profundidad1 = $("#sel_profundidad1").val();
    var opmarca1 = $("#sel_marca_llanta1").val();
    var tipoMarca1 = $("#sel_tipoMarca1").val();
    var estado1 = $("#sel_estado1").val();
    var fInstalacion1 = $("#txt_fInstalacion1").val();
    var fReencauche1 = $("#txt_fReencauche1").val();
    var fCambio1 = $("#txt_fCambio1").val();
    var fRotacion1 = $("#txt_fRotacion1").val();

    var llantaSerial2 = $("#txt_llantaSerial2").val();
    var profundidad2 = $("#sel_profundidad2").val();
    var opmarca2 = $("#sel_marca_llanta2").val();
    var tipoMarca2 = $("#sel_tipoMarca2").val();
    var estado2 = $("#sel_estado2").val();
    var fInstalacion2 = $("#sel_fInstalacion2").val();
    var fReencauche2 = $("#txt_fReencauche2").val();
    var fCambio2 = $("#txt_fCambio2").val();
    var fRotacion2 = $("#txt_fRotacion2").val();

    var llantaSerial3 = $("#txt_llantaSerial3").val();
    var profundidad3 = $("#sel_profundidad3").val();
    var opmarca3 = $("#sel_marca_llanta3").val();
    var tipoMarca3 = $("#sel_tipoMarca3").val();
    var estado3 = $("#sel_estado3").val();
    var fInstalacion3 = $("#sel_fInstalacion3").val();
    var fReencauche3 = $("#txt_fReencauche3").val();
    var fCambio3 = $("#txt_fCambio3").val();
    var fRotacion3 = $("#txt_fRotacion3").val();

    var llantaSerial4 = $("#txt_llantaSerial4").val();
    var profundidad4 = $("#sel_profundidad4").val();
    var opmarca4 = $("#sel_marca_llanta4").val();
    var tipoMarca4 = $("#sel_tipoMarca4").val();
    var estado4 = $("#sel_estado4").val();
    var fInstalacion4 = $("#sel_fInstalacion4").val();
    var fReencauche4 = $("#txt_fReencauche4").val();
    var fCambio4 = $("#txt_fCambio4").val();
    var fRotacion4 = $("#txt_fRotacion4").val();

    var llantaSerial5 = $("#txt_llantaSerial5").val();
    var profundidad5 = $("#sel_profundidad5").val();
    var opmarca5 = $("#sel_marca_llanta5").val();
    var tipoMarca5 = $("#sel_tipoMarca5").val();
    var estado5 = $("#sel_estado5").val();
    var fInstalacion5 = $("#sel_fInstalacion5").val();
    var fReencauche5 = $("#txt_fReencauche5").val();
    var fCambio5 = $("#txt_fCambio5").val();
    var fRotacion5 = $("#txt_fRotacion5").val();

    var llantaSerial6 = $("#txt_llantaSerial6").val();
    var profundidad6 = $("#sel_profundidad6").val();
    var opmarca6 = $("#sel_marca_llanta").val();
    var tipoMarca6 = $("#sel_tipoMarca6").val();
    var estado6 = $("#sel_estado6").val();
    var fInstalacion6 = $("#sel_fInstalacion6").val();
    var fReencauche6 = $("#txt_fReencauche6").val();
    var fCambio6 = $("#txt_fCambio6").val();
    var fRotacion6 = $("#txt_fRotacion6").val();


    var calibracion1 = $("#txt_cal1").val();
    var calibracion2 = $("#txt_cal2").val();
    var calibracion3 = $("#txt_cal3").val();
    var calibracion4 = $("#txt_cal4").val();
    var calibracion5 = $("#txt_cal5").val();
    var calibracion6 = $("#txt_cal6").val();
    var oCalibracion = $("#txt_oCalibracion").val();
    var balanceo1 = $("#sel_bal1").val();
    var balanceo2 = $("#sel_bal2").val();
    var balanceo3 = $("#sel_bal3").val();
    var balanceo4 = $("#sel_bal4").val();
    var balanceo5 = $("#sel_bal5").val();
    var balanceo6 = $("#sel_bal6").val();
    var oBalanceo = $("#txt_oBalanceo").val();
    var alineacion1 = $("#sel_alineacion1").val();
    var alineacion2 = $("#sel_alineacion2").val();
    var observacionG3 = $("#txt_obs3").val();
    var observacionM3 = $("#txt_obsM3").val();

    var fecha = $("#txt_fechaA").val();
    var pCambioA = $("#txt_pCambioA").val();
    var kilometraje = $("#txt_kilometraje").val();
    var cKilometraje = $("#txt_ckilometraje").val();
    var tipoAceite = $("#sel_tipo_aceite").val();
    var marca10 = $("#sel_marca_aceite").val();
    var cantidad1 = $("#txt_cantidad1").val();
    var presentacion1 = $("#sel_presentacion1").val();
    var nivelacion = $("#sel_nivelacion1").val();
    var cNivelacion = $("#txt_cNivelacion1").val();
    var fAceite = $("#sel_filtro_aceite").val();
    var fCombustible = $("#sel_filtro_combustible").val();
    var fAire = $("#sel_filtro_aire").val();
    var tipoAceite1 = $("#sel_tipo_aceite1").val();
    var marca1 = $("#sel_marca_aceite1").val();
    var uCambio = $("#txt_uCambio1").val();
    var pCambio10 = $("#txt_pCambio1").val();
    var cantidad2 = $("#txt_cantidad2").val();
    var presentacion2 = $("#sel_presentacion2").val();
    var nivelacion2 = $("#sel_nivelacion2").val();
    var cNivelacion2 = $("#txt_nivelacion2").val();

    var tipoAceite3 = $("#sel_tipo_aceite2").val();
    var marca3 = $("#sel_marca_aceite2").val();
    var uCambio3 = $("#txt_uCambio2").val();
    var pCambio3 = $("#txt_pCambio2").val();
    var cantidad3 = $("#txt_cantidad2").val();
    var presentacion3 = $("#sel_presentacion3").val();
    var nivelacion3 = $("#sel_nivelacion3").val();
    var cNivelacion3 = $("#txt_nivelacion3").val();

    var tipoAceite4 = $("#sel_tipo_aceite3").val();
    var marca4 = $("#sel_marca_aceite3").val();
    var uCambio4 = $("#txt_uCambio3").val();
    var pCambio4 = $("#txt_pCambio3").val();

    var tipoAceite5 = $("#sel_tipo_aceite4").val();
    var marca5 = $("#sel_marca_aceite4").val();
    var uCambio5 = $("#txt_uCambio4").val();
    var pCambio5 = $("#txt_pCambio4").val();

    var lFreno = $("#sel_lFreno").val();
    var lParabrisa = $("#sel_lParabrisa").val();
    var refrigerante = $("#sel_refrigerante").val();
    var hidraulico = $("#sel_hidraulico").val();
    var lMotor = $("#sel_lMotor").val();
    var lCaja = $("#sel_lCaja").val();
    var lTransmision = $("#sel_lTransmision").val();

    var lFrenos1 = $("#sel_lFrenos1").val();
    var engrase = $("#sel_engrase").val();
    var sRadiador = $("#sel_sRadiador").val();
    var sFiltroAire = $("#sel_sFiltroAire").val();

    
    var observacionesF = $("#txt_observacionesF").val();

    $.ajax({
        "url": "../controlador/ordenServicio/controlador_ordenServicio_registro.php",
        "type": "POST",
        data:{
        id:id,
        placa:placa,
        revBimCotrautol:revBimCotrautol,
        rRegistradora:rRegistradora,
        kmGps:kmGps,
        vExtintor:vExtintor,
        oReg:oReg,
        observacion:observacion,
        tecnico:tecnico,
        bateria:bateria,
        tipoBateria:tipoBateria,
        marca:marca,
        serial:serial,
        fVenta:fVenta,
        fInstalacion:fInstalacion,
        tUso:tUso,
        pCambio:pCambio,
        pMantenimiento:pMantenimiento,
        oMejora:oMejora,
        llantaSerial1:llantaSerial1,
        profundidad1:profundidad1,
        opmarca1:opmarca1,
        tipoMarca1:tipoMarca1,
        estado1:estado1,
        fInstalacion1:fInstalacion1,

        fReencauche1:fReencauche1,
        fCambio1:fCambio1,
        fRotacion1:fRotacion1,
        llantaSerial2:llantaSerial2,
        profundidad2:profundidad2,
        opmarca2:opmarca2,
        tipoMarca2:tipoMarca2,
        estado2:estado2,
        fInstalacion2:fInstalacion2,
        fReencauche2:fReencauche2,
        fCambio2:fCambio2,
        fRotacion2:fRotacion2,

        llantaSerial3:llantaSerial3,
        profundidad3:profundidad3,
        opmarca3:opmarca3,
        tipoMarca3:tipoMarca3,
        estado3:estado3,
        fInstalacion3:fInstalacion3,
        fReencauche3:fReencauche3,
        fCambio3:fCambio3,
        fRotacion3:fRotacion3,
        llantaSerial4:llantaSerial4,
        profundidad4:profundidad4,
        opmarca4:opmarca4,
        tipoMarca4:tipoMarca4,
        estado4:estado4,
        fInstalacion4:fInstalacion4,
        fReencauche4:fReencauche4,
        fCambio4:fCambio4,
        fRotacion4:fRotacion4,
        llantaSerial5:llantaSerial5,
        profundidad5:profundidad5,
        opmarca5:opmarca5,
        tipoMarca5:tipoMarca5,
        estado5:estado5,
        fInstalacion5:fInstalacion5,
        fReencauche5:fReencauche5,
        fCambio5:fCambio5,
        fRotacion5:fRotacion5,
        llantaSerial6:llantaSerial6,
        profundidad6:profundidad6,
        opmarca6:opmarca6,
        tipoMarca6:tipoMarca6,
        estado6:estado6,
        fInstalacion6:fInstalacion6,
        fReencauche6:fReencauche6,
        fCambio6:fCambio6,
        fRotacion6:fRotacion6,

        calibracion1:calibracion1,
        calibracion2:calibracion2,
        calibracion3:calibracion3,
        calibracion4:calibracion4,
        calibracion5:calibracion5,
        calibracion6:calibracion6,
        oCalibracion:oCalibracion,
        balanceo1:balanceo1,
        balanceo2:balanceo2,
        balanceo3:balanceo3,
        balanceo4:balanceo4,
        balanceo5:balanceo5,
        balanceo6:balanceo6,
        oBalanceo:oBalanceo,
        alineacion1:alineacion1,
        alineacion2:alineacion2,
        observacionG3:observacionG3,
        observacionM3:observacionM3,

        fecha:fecha,
        pCambioA:pCambioA,
        kilometraje:kilometraje,
        cKilometraje:cKilometraje,
        tipoAceite:tipoAceite,
        marca10:marca10,
        cantidad1:cantidad1,
        presentacion1:presentacion1,
        nivelacion:nivelacion,
        cNivelacion:cNivelacion,
        fAceite:fAceite,
        fCombustible:fCombustible,
        fAire:fAire,
        tipoAceite1:tipoAceite1,
        marca1:marca1,
        uCambio:uCambio,
        pCambio10:pCambio10,
        cantidad2:cantidad2,
        presentacion2:presentacion2,
        nivelacion2:nivelacion2,
        cNivelacion2:cNivelacion2,

        tipoAceite3:tipoAceite3,
        marca3:marca3,
        uCambio3:uCambio3,
        pCambio3:pCambio3,
        cantidad3:cantidad3,
        presentacion3:presentacion3,
        nivelacion3:nivelacion3,
        cNivelacion3:cNivelacion3,

        tipoAceite4:tipoAceite4,
        marca4:marca4,
        uCambio4:uCambio4,
        pCambio4:pCambio4,
        tipoAceite5:tipoAceite5,
        marca5:marca5,
        uCambio5:uCambio5,
        pCambio5:pCambio5,

        lFreno:lFreno,
        lParabrisa:lParabrisa,
        refrigerante:refrigerante,
        hidraulico:hidraulico,
        lMotor:lMotor,
        lCaja:lCaja,
        lTransmision:lTransmision,
        lFrenos1:lFrenos1,
        engrase:engrase,
        sRadiador:sRadiador,
        sFiltroAire:sFiltroAire,
        observacionesF:observacionesF
        }
    }).done(function(resp){
        console.log(resp);
        if(resp > 0){
            if(resp==1){
            $("#modal_registro_ordenServicio").modal('hide');
            Swal.fire("Mensaje De Confirmacion",'Registro realizado', "success").then((value)=>{
                table.ajax.reload();
                limpiarRegistro();
            });
        }else{
            Swal.fire("Mensaje De Advertencia",'El usuario ya se encuentra en uso', "warning");
        }
        }else{
            Swal.fire("Mensaje De Error",'No se pudo completar el Registro', "error");
        }
    })

}

$('#tabla_orden').on('click','.editar',function(){

    if(table.row(this).child.isShown()){
        var datosOrden = table.row(this).data();
    }else{
        var datosOrden = table.row($(this).parents('tr')).data();
    }
    
    var id =datosOrden.id;
    var placa =datosOrden.placa;
    var revBimCotrautol =datosOrden.revBimCotrautol;
    var rRegistradora =datosOrden.rRegistradora;
    var vExtintor =datosOrden.vExtintor;
    var oReg =datosOrden.oReg;
    var observacion =datosOrden.observacion;     
    var tecnico =datosOrden.tecnico;
    var bateria =datosOrden.bateria;
    var tipoBateria =datosOrden.tipoBateria;
    var marca =datosOrden.marca;
    var serial =datosOrden.serial;
    var fVenta =datosOrden.fVenta;
    var fInstalacion =datosOrden.fInstalacion;
    var tUso =datosOrden.tUso;
    var pCambio =datosOrden.pCambio;
    var pMantenimiento =datosOrden.pMantenimiento;
    var oMejora =datosOrden.oMejora;
    var llantaSerial1 =datosOrden.llantaSerial1;
    var profundidad1 =datosOrden.profundidad1;
    var opmarca1 =datosOrden.opmarca1;
    var tipoMarca1 =datosOrden.tipoMarca1;
    var estado1 =datosOrden.estado1;
    var fInstalacion1 =datosOrden.fInstalacion1;
    var fReencauche1 =datosOrden.fReencauche1;
    var fCambio1 =datosOrden.fCambio1;
    var fRotacion1 =datosOrden.fRotacion1;

    var llantaSerial2 =datosOrden.llantaSerial2;
    var profundidad2 =datosOrden.profundidad2;
    var opmarca2 =datosOrden.opmarca2;
    var tipoMarca2 =datosOrden.tipoMarca2;
    var estado2 =datosOrden.estado2;
    var fInstalacion2 =datosOrden.fInstalacion2;
    var fReencauche2 =datosOrden.fReencauche2;
    var fCambio2 =datosOrden.fCambio2;
    var fRotacion2 =datosOrden.fRotacion2;

    var llantaSerial3 =datosOrden.llantaSerial3;
    var profundidad3 =datosOrden.profundidad3;
    var opmarca3 =datosOrden.opmarca3;
    var tipoMarca3 =datosOrden.tipoMarca3;
    var estado3 =datosOrden.estado3;
    var fInstalacion3 =datosOrden.fInstalacion3;
    var fReencauche3 =datosOrden.fReencauche3;
    var fCambio3 =datosOrden.fCambio3;
    var fRotacion3 =datosOrden.fRotacion3;

    var llantaSerial4 =datosOrden.llantaSerial4;
    var profundidad4 =datosOrden.profundidad4;
    var opmarca4 =datosOrden.opmarca4;
    var tipoMarca4 =datosOrden.tipoMarca4;
    var estado4 =datosOrden.estado4;
    var fInstalacion4 =datosOrden.fInstalacion4;
    var fReencauche4 =datosOrden.fReencauche4;
    var fCambio4 =datosOrden.fCambio4;
    var fRotacion4 =datosOrden.fRotacion4;

    var llantaSerial5 =datosOrden.llantaSerial5;
    var profundidad5 =datosOrden.profundidad5;
    var opmarca5 =datosOrden.opmarca5;
    var tipoMarca5 =datosOrden.tipoMarca5;
    var estado5 =datosOrden.estado5;
    var fInstalacion5 =datosOrden.fInstalacion5;
    var fReencauche5 =datosOrden.fReencauche5;
    var fCambio5 =datosOrden.fCambio5;
    var fRotacion5 =datosOrden.fRotacion5;

    var llantaSerial6 =datosOrden.llantaSerial6;
    var profundidad6 =datosOrden.profundidad6;
    var opmarca6 =datosOrden.opmarca6;
    var tipoMarca6 =datosOrden.tipoMarca6;
    var estado6 =datosOrden.estado6;
    var fInstalacion6 =datosOrden.fInstalacion6;
    var fReencauche6 =datosOrden.fReencauche6;
    var fCambio6 =datosOrden.fCambio6;
    var fRotacion6 =datosOrden.fRotacion6;


    var calibracion1 =datosOrden.calibracion1;
    var calibracion2 =datosOrden.calibracion2;
    var calibracion3 =datosOrden.calibracion3;
    var calibracion4 =datosOrden.calibracion4;
    var calibracion5 =datosOrden.calibracion5;
    var calibracion6 =datosOrden.calibracion6;
    var oCalibracion =datosOrden.oCalibracion;
    var balanceo1 =datosOrden.balanceo1;
    var balanceo2 =datosOrden.balanceo2;
    var balanceo3 =datosOrden.balanceo3;
    var balanceo4 =datosOrden.balanceo4;
    var balanceo5 =datosOrden.balanceo5;
    var balanceo6 =datosOrden.balanceo6;
    var oBalanceo =datosOrden.oBalanceo;
    var alineacion1 =datosOrden.alineacion1;
    var alineacion2 =datosOrden.alineacion2;
    var observacionG3 =datosOrden.observacionG3;
    var observacionM3 =datosOrden.observacionM3;

    var fecha =datosOrden.fecha;
    var pCambioA =datosOrden.pCambioA;
    var kilometraje =datosOrden.kilometraje;
    var cKilometraje =datosOrden.cKilometraje;
    var tipoAceite =datosOrden.tipoAceite;
    var marca10 =datosOrden.marca10;
    var cantidad1 =datosOrden.cantidad1;
    var presentacion1 =datosOrden.presentacion1;
    var nivelacion =datosOrden.nivelacion;
    var cNivelacion =datosOrden.cNivelacion;
    var fAceite =datosOrden.fAceite;
    var fCombustible =datosOrden.fCombustible;
    var fAire =datosOrden.fAire;
    var tipoAceite1 =datosOrden.tipoAceite1;
    var marca1 =datosOrden.marca1;
    var uCambio =datosOrden.uCambio;
    var pCambio10 =datosOrden.pCambio10;
    var cantidad2 =datosOrden.cantidad2;
    var presentacion2 =datosOrden.presentacion2;
    var nivelacion2 =datosOrden.nivelacion2;
    var cNivelacion2 =datosOrden.cNivelacion2;

    var tipoAceite3 =datosOrden.tipoAceite3;
    var marca3 =datosOrden.marca3;
    var uCambio3 =datosOrden.uCambio3;
    var pCambio3 =datosOrden.pCambio3;
    var cantidad3 =datosOrden.cantidad3;
    var presentacion3 =datosOrden.presentacion3;
    var nivelacion3 =datosOrden.nivelacion3;
    var cNivelacion3 =datosOrden.cNivelacion3;

    var tipoAceite4 =datosOrden.tipoAceite4;
    var marca4 =datosOrden.marca4;
    var uCambio4 =datosOrden.uCambio4;
    var pCambio4 =datosOrden.pCambio4;

    var tipoAceite5 =datosOrden.tipoAceite5;
    var marca5 =datosOrden.marca5;
    var uCambio5 =datosOrden.uCambio5;
    var pCambio5 =datosOrden.pCambio5;

    var lFreno =datosOrden.lFreno;
    var lParabrisa =datosOrden.lParabrisa;
    var refrigerante =datosOrden.refrigerante;
    var hidraulico =datosOrden.hidraulico;
    var lMotor =datosOrden.lMotor;
    var lCaja =datosOrden.lCaja;
    var lTransmision =datosOrden.lTransmision;

    var lFrenos1 =datosOrden.lFrenos1;
    var engrase =datosOrden.engrase;
    var sRadiador =datosOrden.sRadiador;
    var sFiltroAire =datosOrden.sFiltroAire;
    console.log("Datos",datosOrden.sFiltroAire);
    
    var observacionesF =datosOrden.observacionesF;
    //levantar modal
    AbrirModalEditarOrdenServicio();
    //ingresas datos modal
    $("#idPersonaC").val(id);
    $("#sel_editar_placa_vehiculo").val(placa).trigger('change');
    $("#txt_editar_revb").val(revBimCotrautol);
    $("#sel_editar_rReg").val(rRegistradora).trigger('change');
    $("#txt_editar_kmGps").val(0);
    $("#txt_editar_vExtintor").val(vExtintor);
    $("#txt_editar_oReg").val(oReg);
    $("#txt_editar_obs").val(observacion);
    $("#sel_editar_tecnico").val(tecnico).trigger('change');
    $("#sel_editar_bateria").val(bateria).trigger('change');
    $("#sel_editar_tipoBateria").val(tipoBateria).trigger('change');
    $("#sel_editar_marca").val(marca).trigger('change');
    $("#txt_editar_serial").val(serial);
    $("#txt_editar_fVenta").val(fVenta);
    $("#txt_editar_fInstalacion").val(fInstalacion);
    $("#txt_editar_tUso").val(tUso);
    $("#txt_editar_pCambio").val(pCambio);
    $("#txt_editar_pMantenimiento").val(pMantenimiento);
    $("#txt_editar_oMejora").val(oMejora);
    $("#txt_editar_llantaSerial1").val(llantaSerial1);
    $("#sel_editar_profundidad1").val(profundidad1).trigger('change');
    $("#sel_editar_marca_llanta1").val(opmarca1).trigger('change');
    $("#sel_editar_tipoMarca1").val(tipoMarca1).trigger('change');
    $("#sel_editar_estado1").val(estado1).trigger('change');
    $("#sel_editar_fInstalacion1").val(fInstalacion1).trigger('change');
    $("#txt_editar_fReencauche1").val(fReencauche1);
    $("#txt_editar_fCambio1").val(fCambio1);
    $("#txt_editar_fRotacion1").val(fRotacion1);

    $("#txt_editar_llantaSerial2").val(llantaSerial2);
    $("#sel_editar_profundidad2").val(profundidad2).trigger('change');
    $("#sel_editar_marca_llanta2").val(opmarca2).trigger('change');
    $("#sel_editar_tipoMarca2").val(tipoMarca2).trigger('change');
    $("#sel_editar_estado2").val(estado2).trigger('change');
    $("#sel_editar_fInstalacion2").val(fInstalacion2).trigger('change');
    $("#txt_editar_fReencauche2").val(fReencauche2);
    $("#txt_editar_fCambio2").val(fCambio2);
    $("#txt_editar_fRotacion2").val(fRotacion2);

    $("#txt_editar_llantaSerial3").val(llantaSerial3);
    $("#sel_editar_profundidad3").val(profundidad3).trigger('change');
    $("#sel_editar_marca_llanta3").val(opmarca3).trigger('change');
    $("#sel_editar_tipoMarca3").val(tipoMarca3).trigger('change');
    $("#sel_editar_estado3").val(estado3).trigger('change');
    $("#sel_editar_fInstalacion3").val(fInstalacion3).trigger('change');
    $("#txt_editar_fReencauche3").val(fReencauche3);
    $("#txt_editar_fCambio3").val(fCambio3);
    $("#txt_editar_fRotacion3").val(fRotacion3);

    $("#txt_editar_llantaSerial4").val(llantaSerial4);
    $("#sel_editar_profundidad4").val(profundidad4).trigger('change');
    $("#sel_editar_marca_llanta4").val(opmarca4).trigger('change');
    $("#sel_editar_tipoMarca4").val(tipoMarca4).trigger('change');
    $("#sel_editar_estado4").val(estado4).trigger('change');
    $("#sel_editar_fInstalacion4").val(fInstalacion4).trigger('change');
    $("#txt_editar_fReencauche4").val(fReencauche4);
    $("#txt_editar_fCambio4").val(fCambio4);
    $("#txt_editar_fRotacion4").val(fRotacion4);

    $("#txt_editar_llantaSerial5").val(llantaSerial5);
    $("#sel_editar_profundidad5").val(profundidad5).trigger('change');
    $("#sel_editar_marca_llanta5").val(opmarca5).trigger('change');
    $("#sel_editar_tipoMarca5").val(tipoMarca5).trigger('change');
    $("#sel_editar_estado5").val(estado5).trigger('change');
    $("#sel_editar_fInstalacion5").val(fInstalacion5).trigger('change');
    $("#txt_editar_fReencauche5").val(fReencauche5);
    $("#txt_editar_fCambio5").val(fCambio5);
    $("#txt_editar_fRotacion5").val(fRotacion5);

    $("#txt_editar_llantaSerial6").val(llantaSerial6);
    $("#sel_editar_profundidad6").val(profundidad6).trigger('change');
    $("#sel_editar_marca_llanta").val(opmarca6).trigger('change');
    $("#sel_editar_tipoMarca6").val(tipoMarca6).trigger('change');
    $("#sel_editar_estado6").val(estado6).trigger('change');
    $("#sel_editar_fInstalacion6").val(fInstalacion6).trigger('change');
    $("#txt_editar_fReencauche6").val(fReencauche6);
    $("#txt_editar_fCambio6").val(fCambio6);
    $("#txt_editar_fRotacion6").val(fRotacion6);


    $("#txt_editar_cal1").val(calibracion1);
    $("#txt_editar_cal2").val(calibracion2);
    $("#txt_editar_cal3").val(calibracion3);
    $("#txt_editar_cal4").val(calibracion4);
    $("#txt_editar_cal5").val(calibracion5);
    $("#txt_editar_cal6").val(calibracion6);
    $("#txt_editar_oCalibracion").val(oCalibracion);
    $("#sel_editar_bal1").val(balanceo1).trigger('change');
    $("#sel_editar_bal2").val(balanceo2).trigger('change');
    $("#sel_editar_bal3").val(balanceo3).trigger('change');
    $("#sel_editar_bal4").val(balanceo4).trigger('change');
    $("#sel_editar_bal5").val(balanceo5).trigger('change');
    $("#sel_editar_bal6").val(balanceo6).trigger('change');
    $("#txt_editar_oBalanceo").val(oBalanceo);
    $("#sel_editar_alineacion1").val(alineacion1).trigger('change');
    $("#sel_editar_alineacion2").val(alineacion2).trigger('change');
    $("#txt_editar_obs3").val(observacionG3);
    $("#txt_editar_obsM3").val(observacionM3);

    $("#txt_editar_fechaA").val(fecha);
    $("#txt_editar_pCambioA").val(pCambioA);
    $("#txt_editar_kilometraje").val(kilometraje);
    $("#txt_editar_ckilometraje").val(cKilometraje);
    $("#sel_editar_tipo_aceite").val(tipoAceite).trigger('change');
    $("#sel_editar_marca_aceite").val(marca10).trigger('change');
    $("#txt_editar_cantidad1").val(cantidad1);
    $("#sel_editar_presentacion1").val(presentacion1).trigger('change');
    $("#sel_editar_nivelacion1").val(nivelacion).trigger('change');
    $("#txt_editar_cNivelacion1").val(cNivelacion);
    $("#sel_editar_filtro_aceite").val(fAceite).trigger('change');
    $("#sel_editar_filtro_combustible").val(fCombustible).trigger('change');
    $("#sel_editar_filtro_aire").val(fAire).trigger('change');
    $("#sel_editar_tipo_aceite1").val(tipoAceite1).trigger('change');
    $("#sel_editar_marca_aceite1").val(marca1).trigger('change');
    $("#txt_editar_uCambio1").val(uCambio);
    $("#txt_editar_pCambio1").val(pCambio10);
    $("#txt_editar_cantidad2").val(cantidad2);
    $("#sel_editar_presentacion2").val(presentacion2).trigger('change');
    $("#sel_editar_nivelacion2").val(nivelacion2).trigger('change');
    $("#txt_editar_nivelacion2").val(cNivelacion2);

    $("#sel_editar_tipo_aceite2").val(tipoAceite3).trigger('change');
    $("#sel_editar_marca_aceite2").val(marca3).trigger('change');
    $("#txt_editar_uCambio2").val(uCambio3);
    $("#txt_editar_pCambio2").val(pCambio3);
    $("#txt_editar_cantidad2").val(cantidad3);
    $("#sel_editar_presentacion3").val(presentacion3).trigger('change');
    $("#sel_editar_nivelacion3").val(nivelacion3).trigger('change');
    $("#txt_editar_nivelacion3").val(cNivelacion3);

    $("#sel_editar_tipo_aceite3").val(tipoAceite4).trigger('change');
    $("#sel_editar_marca_aceite3").val(marca4).trigger('change');
    $("#txt_editar_uCambio3").val(uCambio4);
    $("#txt_editar_pCambio3").val(pCambio4);

    $("#sel_editar_tipo_aceite4").val(tipoAceite5).trigger('change');
    $("#sel_editar_marca_aceite4").val(marca5).trigger('change');
    $("#txt_editar_uCambio4").val(uCambio5);
    $("#txt_editar_pCambio4").val(pCambio5);

    $("#sel_editar_lFreno").val(lFreno).trigger('change');
    $("#sel_editar_lParabrisa").val(lParabrisa).trigger('change');
    $("#sel_editar_refrigerante").val(refrigerante).trigger('change');
    $("#sel_editar_hidraulico").val(hidraulico).trigger('change');
    $("#sel_editar_lMotor").val(lMotor).trigger('change');
    $("#sel_editar_lCaja").val(lCaja).trigger('change');
    $("#sel_editar_lTransmision").val(lTransmision).trigger('change');

    $("#sel_editar_lFrenos1").val(lFrenos1).trigger('change');
    $("#sel_editar_engrase").val(engrase).trigger('change');
    $("#sel_editar_sRadiador").val(sRadiador).trigger('change');
    $("#sel_editar_sFiltroAire").val(sFiltroAire).trigger('change');

    
    $("#txt_editar_observacionesF").val(observacionesF);

})

function modificar_orden_Servicio(){
 
    var id = $("#idPersonaC").val();
    var placa = $("#sel_editar_placa_vehiculo").val();
    var revBimCotrautol = $("#txt_editar_revb").val();
    var rRegistradora = $("#sel_editar_rReg").val();
    var kmGps = $("#txt_editar_kmGps").val();
    var vExtintor = $("#txt_editar_vExtintor").val();
    var oReg = $("#txt_editar_oReg").val();
    var observacion = $("#txt_editar_obs").val();
    var tecnico = $("#sel_editar_tecnico").val();
    var bateria = $("#sel_editar_bateria").val();
    var tipoBateria = $("#sel_editar_tipoBateria").val();
    var marca = $("#sel_editar_marca").val();
    var serial = $("#txt_editar_serial").val();
    var fVenta = $("#txt_editar_fVenta").val();
    var fInstalacion = $("#txt_editar_fInstalacion").val();
    var tUso = $("#txt_editar_tUso").val();
    var pCambio = $("#txt_editar_pCambio").val();
    var pMantenimiento = $("#txt_editar_pMantenimiento").val();
    var oMejora = $("#txt_editar_oMejora").val();
    var llantaSerial1 = $("#txt_editar_llantaSerial1").val();
    var profundidad1 = $("#sel_editar_profundidad1").val();
    var opmarca1 = $("#sel_marca_editar_llanta1").val();
    var tipoMarca1 = $("#sel_editar_tipoMarca1").val();
    var estado1 = $("#sel_editar_estado1").val();
    var fInstalacion1 = $("#sel_editar_fInstalacion1").val();
    var fReencauche1 = $("#txt_editar_fReencauche1").val();
    var fCambio1 = $("#txt_editar_fCambio1").val();
    var fRotacion1 = $("#txt_editar_fRotacion1").val();

    var llantaSerial2 = $("#txt_editar_llantaSerial2").val();
    var profundidad2 = $("#sel_editar_profundidad2").val();
    var opmarca2 = $("#sel_editar_marca_llanta2").val();
    var tipoMarca2 = $("#sel_editar_tipoMarca2").val();
    var estado2 = $("#sel_editar_estado2").val();
    var fInstalacion2 = $("#sel_editar_fInstalacion2").val();
    var fReencauche2 = $("#txt_editar_fReencauche2").val();
    var fCambio2 = $("#txt_editar_fCambio2").val();
    var fRotacion2 = $("#txt_editar_fRotacion2").val();

    var llantaSerial3 = $("#txt_editar_llantaSerial3").val();
    var profundidad3 = $("#sel_editar_profundidad3").val();
    var opmarca3 = $("#sel_editar_marca_llanta3").val();
    var tipoMarca3 = $("#sel_editar_tipoMarca3").val();
    var estado3 = $("#sel_editar_estado3").val();
    var fInstalacion3 = $("#sel_editar_fInstalacion3").val();
    var fReencauche3 = $("#txt_editar_fReencauche3").val();
    var fCambio3 = $("#txt_editar_fCambio3").val();
    var fRotacion3 = $("#txt_editar_fRotacion3").val();

    var llantaSerial4 = $("#txt_editar_llantaSerial4").val();
    var profundidad4 = $("#sel_editar_profundidad4").val();
    var opmarca4 = $("#sel_editar_marca_llanta4").val();
    var tipoMarca4 = $("#sel_editar_tipoMarca4").val();
    var estado4 = $("#sel_editar_estado4").val();
    var fInstalacion4 = $("#sel_editar_fInstalacion4").val();
    var fReencauche4 = $("#txt_editar_fReencauche4").val();
    var fCambio4 = $("#txt_editar_fCambio4").val();
    var fRotacion4 = $("#txt_editar_fRotacion4").val();

    var llantaSerial5 = $("#txt_editar_llantaSerial5").val();
    var profundidad5 = $("#sel_editar_profundidad5").val();
    var opmarca5 = $("#sel_editar_marca_llanta5").val();
    var tipoMarca5 = $("#sel_editar_tipoMarca5").val();
    var estado5 = $("#sel_editar_estado5").val();
    var fInstalacion5 = $("#sel_editar_fInstalacion5").val();
    var fReencauche5 = $("#txt_editar_fReencauche5").val();
    var fCambio5 = $("#txt_editar_fCambio5").val();
    var fRotacion5 = $("#txt_editar_fRotacion5").val();

    var llantaSerial6 = $("#txt_editar_llantaSerial6").val();
    var profundidad6 = $("#sel_editar_profundidad6").val();
    var opmarca6 = $("#sel_editar_marca_llanta").val();
    var tipoMarca6 = $("#sel_editar_tipoMarca6").val();
    var estado6 = $("#sel_editar_estado6").val();
    var fInstalacion6 = $("#sel_editar_fInstalacion6").val();
    var fReencauche6 = $("#txt_editar_fReencauche6").val();
    var fCambio6 = $("#txt_editar_fCambio6").val();
    var fRotacion6 = $("#txt_editar_fRotacion6").val();


    var calibracion1 = $("#txt_editar_cal1").val();
    var calibracion2 = $("#txt_editar_cal2").val();
    var calibracion3 = $("#txt_editar_cal3").val();
    var calibracion4 = $("#txt_editar_cal4").val();
    var calibracion5 = $("#txt_editar_cal5").val();
    var calibracion6 = $("#txt_editar_cal6").val();
    var oCalibracion = $("#txt_editar_oCalibracion").val();
    var balanceo1 = $("#sel_editar_bal1").val();
    var balanceo2 = $("#sel_editar_bal2").val();
    var balanceo3 = $("#sel_editar_bal3").val();
    var balanceo4 = $("#sel_editar_bal4").val();
    var balanceo5 = $("#sel_editar_bal5").val();
    var balanceo6 = $("#sel_editar_bal6").val();
    var oBalanceo = $("#txt_editar_oBalanceo").val();
    var alineacion1 = $("#sel_editar_alineacion1").val();
    var alineacion2 = $("#sel_editar_alineacion2").val();
    var observacionG3 = $("#txt_editar_obs3").val();
    var observacionM3 = $("#txt_editar_obsM3").val();

    var fecha = $("#txt_editar_fechaA").val();
    var pCambioA = $("#txt_editar_pCambioA").val();
    var kilometraje = $("#txt_editar_kilometraje").val();
    var cKilometraje = $("#txt_editar_ckilometraje").val();
    var tipoAceite = $("#sel_editar_tipo_aceite").val();
    var marca10 = $("#sel_editar_marca_aceite").val();
    var cantidad1 = $("#txt_editar_cantidad1").val();
    var presentacion1 = $("#sel_editar_presentacion1").val();
    var nivelacion = $("#sel_editar_nivelacion1").val();
    var cNivelacion = $("#txt_editar_cNivelacion1").val();
    var fAceite = $("#sel_editar_filtro_aceite").val();
    var fCombustible = $("#sel_editar_filtro_combustible").val();
    var fAire = $("#sel_editar_filtro_aire").val();
    var tipoAceite1 = $("#sel_editar_tipo_aceite1").val();
    var marca1 = $("#sel_editar_marca_aceite1").val();
    var uCambio = $("#txt_editar_uCambio1").val();
    var pCambio10 = $("#txt_editar_pCambio1").val();
    var cantidad2 = $("#txt_editar_cantidad2").val();
    var presentacion2 = $("#sel_editar_presentacion2").val();
    var nivelacion2 = $("#sel_editar_nivelacion2").val();
    var cNivelacion2 = $("#txt_editar_nivelacion2").val();

    var tipoAceite3 = $("#sel_editar_tipo_aceite2").val();
    var marca3 = $("#sel_editar_marca_aceite2").val();
    var uCambio3 = $("#txt_editar_uCambio2").val();
    var pCambio3 = $("#txt_editar_pCambio2").val();
    var cantidad3 = $("#txt_editar_cantidad2").val();
    var presentacion3 = $("#sel_editar_presentacion3").val();
    var nivelacion3 = $("#sel_editar_nivelacion3").val();
    var cNivelacion3 = $("#txt_editar_nivelacion3").val();

    var tipoAceite4 = $("#sel_editar_tipo_aceite3").val();
    var marca4 = $("#sel_editar_marca_aceite3").val();
    var uCambio4 = $("#txt_editar_uCambio3").val();
    var pCambio4 = $("#txt_editar_pCambio3").val();

    var tipoAceite5 = $("#seleditar__tipo_aceite4").val();
    var marca5 = $("#sel_editar_marca_aceite4").val();
    var uCambio5 = $("#txt_editar_uCambio4").val();
    var pCambio5 = $("#txt_editar_pCambio4").val();

    var lFreno = $("#sel_editar_lFreno").val();
    var lParabrisa = $("#sel_editar_lParabrisa").val();
    var refrigerante = $("#sel_editar_refrigerante").val();
    var hidraulico = $("#sel_editar_hidraulico").val();
    var lMotor = $("#sel_editar_lMotor").val();
    var lCaja = $("#sel_editar_lCaja").val();
    var lTransmision = $("#sel_editar_lTransmision").val();

    var lFrenos1 = $("#sel_editar_lFrenos1").val();
    var engrase = $("#sel_editar_engrase").val();
    var sRadiador = $("#sel_editar_sRadiador").val();
    var sFiltroAire = $("#sel_editar_sFiltroAire").val();
    

    $.ajax({
        "url": "../controlador/ordenServicio/controlador_ordenServicio_modificar.php",
        "type": "POST",
        data:{
            id:id,
            placa:placa,
            revBimCotrautol:revBimCotrautol,
            rRegistradora:rRegistradora,
            kmGps:kmGps,
            vExtintor:vExtintor,
            oReg:oReg,
            observacion:observacion,
            tecnico:tecnico,
            bateria:bateria,
            tipoBateria:tipoBateria,
            marca:marca,
            serial:serial,
            fVenta:fVenta,
            fInstalacion:fInstalacion,
            tUso:tUso,
            pCambio:pCambio,
            pMantenimiento:pMantenimiento,
            oMejora:oMejora,
            llantaSerial1:llantaSerial1,
            profundidad1:profundidad1,
            opmarca1:opmarca1,
            tipoMarca1:tipoMarca1,
            estado1:estado1,
            fInstalacion1:fInstalacion1,
    
            fReencauche1:fReencauche1,
            fCambio1:fCambio1,
            fRotacion1:fRotacion1,
            llantaSerial2:llantaSerial2,
            profundidad2:profundidad2,
            opmarca2:opmarca2,
            tipoMarca2:tipoMarca2,
            estado2:estado2,
            fInstalacion2:fInstalacion2,
            fReencauche2:fReencauche2,
            fCambio2:fCambio2,
            fRotacion2:fRotacion2,
    
            llantaSerial3:llantaSerial3,
            profundidad3:profundidad3,
            opmarca3:opmarca3,
            tipoMarca3:tipoMarca3,
            estado3:estado3,
            fInstalacion3:fInstalacion3,
            fReencauche3:fReencauche3,
            fCambio3:fCambio3,
            fRotacion3:fRotacion3,
            llantaSerial4:llantaSerial4,
            profundidad4:profundidad4,
            opmarca4:opmarca4,
            tipoMarca4:tipoMarca4,
            estado4:estado4,
            fInstalacion4:fInstalacion4,
            fReencauche4:fReencauche4,
            fCambio4:fCambio4,
            fRotacion4:fRotacion4,
            llantaSerial5:llantaSerial5,
            profundidad5:profundidad5,
            opmarca5:opmarca5,
            tipoMarca5:tipoMarca5,
            estado5:estado5,
            fInstalacion5:fInstalacion5,
            fReencauche5:fReencauche5,
            fCambio5:fCambio5,
            fRotacion5:fRotacion5,
            llantaSerial6:llantaSerial6,
            profundidad6:profundidad6,
            opmarca6:opmarca6,
            tipoMarca6:tipoMarca6,
            estado6:estado6,
            fInstalacion6:fInstalacion6,
            fReencauche6:fReencauche6,
            fCambio6:fCambio6,
            fRotacion6:fRotacion6,
    
            calibracion1:calibracion1,
            calibracion2:calibracion2,
            calibracion3:calibracion3,
            calibracion4:calibracion4,
            calibracion5:calibracion5,
            calibracion6:calibracion6,
            oCalibracion:oCalibracion,
            balanceo1:balanceo1,
            balanceo2:balanceo2,
            balanceo3:balanceo3,
            balanceo4:balanceo4,
            balanceo5:balanceo5,
            balanceo6:balanceo6,
            oBalanceo:oBalanceo,
            alineacion1:alineacion1,
            alineacion2:alineacion2,
            observacionG3:observacionG3,
            observacionM3:observacionM3,
    
            fecha:fecha,
            pCambioA:pCambioA,
            kilometraje:kilometraje,
            cKilometraje:cKilometraje,
            tipoAceite:tipoAceite,
            marca10:marca10,
            cantidad1:cantidad1,
            presentacion1:presentacion1,
            nivelacion:nivelacion,
            cNivelacion:cNivelacion,
            fAceite:fAceite,
            fCombustible:fCombustible,
            fAire:fAire,
            tipoAceite1:tipoAceite1,
            marca1:marca1,
            uCambio:uCambio,
            pCambio10:pCambio10,
            cantidad2:cantidad2,
            presentacion2:presentacion2,
            nivelacion2:nivelacion2,
            cNivelacion2:cNivelacion2,
    
            tipoAceite3:tipoAceite3,
            marca3:marca3,
            uCambio3:uCambio3,
            pCambio3:pCambio3,
            cantidad3:cantidad3,
            presentacion3:presentacion3,
            nivelacion3:nivelacion3,
            cNivelacion3:cNivelacion3,
    
            tipoAceite4:tipoAceite4,
            marca4:marca4,
            uCambio4:uCambio4,
            pCambio4:pCambio4,
            tipoAceite5:tipoAceite5,
            marca5:marca5,
            uCambio5:uCambio5,
            pCambio5:pCambio5,
    
            lFreno:lFreno,
            lParabrisa:lParabrisa,
            refrigerante:refrigerante,
            hidraulico:hidraulico,
            lMotor:lMotor,
            lCaja:lCaja,
            lTransmision:lTransmision,
            lFrenos1:lFrenos1,
            engrase:engrase,
            sRadiador:sRadiador,
            sFiltroAire:sFiltroAire,
            observacionesF:observacionesF
        }
    }).done(function(resp){
        console.log(resp);
        if(resp > 0){
            $("#modal_editar_OrdenServicio").modal('hide');
            Swal.fire("Mensaje De Confirmacion",'Datos Actualizados', "success")
                .then((value)=>{
                table.ajax.reload();
            });
        
        }else{
            Swal.fire("Mensaje De Error",'No se pudo completar la edicion', "error");
        }
    })

}