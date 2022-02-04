
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
                cadena+="<option value ='"+data[i]['id']+"'>"+data[i]['placa']+"</option>";
            }
            $("#sel_placa_vehiculo").html(cadena);
            $("#sel_placa_vehiculo_edit").html(cadena);
        }else{
            cadena+="<option value =''>No se encontraron registros</option>"; 
        }
    })
}
function listar_operario(){
    $.ajax({
        "url": "../controlador/ordenServicio/controlador_operario_listar.php",
        "type": "POST"
    }).done(function(resp){
        var data = JSON.parse(resp);
        
        var cadena="";
        if(data.length>0){
            cadena+="<option value='0'>Seleccionar</option>"; 
            for(var i=0; i < data.length; i++){
                cadena+="<option value ='"+data[i]['id']+"'>"+data[i]['operario']+"</option>";
            }
            $("#sel_operario").html(cadena);
            $("#sel_placa_vehiculo_edit").html(cadena);
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
            $("#sel_placa_vehiculo_edit").html(cadena);
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
            $("#sel_placa_vehiculo_edit").html(cadena);
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
            $("#sel_placa_vehiculo_edit").html(cadena);
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
            $("#sel_placa_vehiculo_edit").html(cadena);
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
            $("#sel_placa_vehiculo_edit").html(cadena);
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
            $("#sel_placa_vehiculo_edit").html(cadena);
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
            $("#sel_placa_vehiculo_edit").html(cadena);
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
            $("#sel_placa_vehiculo_edit").html(cadena);
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
            $("#sel_placa_vehiculo_edit").html(cadena);
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
    var operario = $("#sel_operario").val();
    var bateria = $("#sel_bateria").val();
    var tipoBateria = $("#sel_tipoBateria").val();
    var marca = $("#sel_marca").val();
    var serial = $("#txt_serial").val();
    var fVenta = $("#txt_fVenta").val();
    var fIntalacion = $("#txt_fInstalacion").val();
    var tUso = $("#txt_tUso").val();
    var pCambio = $("#txt_pCambio").val();
    var pMantenimiento = $("#txt_pMantenimiento").val();
    var oMejora = $("#txt_oMejora").val();
    var llantaSerial1 = $("#txt_llantaSerial1").val();
    var profundidad1 = $("#sel_profundidad1").val();
    var opmarca1 = $("#sel_marca_llanta1").val();
    var tipoMarca1 = $("#sel_tipoMarca1").val();
    var estado1 = $("#sel_estado1").val();
    var fInstalacion1 = $("#sel_fInstalacion1").val();
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
    var opmarca6 = $("#sel_marca_llanta6").val();
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
    var marca = $("#sel_marca_aceite").val();
    var cantidad1 = $("#txt_cantidad1").val();
    var presentacion1 = $("#sel_presentacion1").val();
    var nivelacion = $("#sel_nivelacion1").val();
    var cNivelacion = $("#txt_cNivelacion1").val();
    var fAceite = $("#sel_filtro_aceite").val();
    var fCombustible = $("#sel_filtro_combustible").val();
    var fAire = $("#sel_filtro_aire").val();
    var serial = $("#txt_serial").val();
    var fVenta = $("#txt_fVenta").val();
    var marca = $("#sel_marca").val();
    var serial = $("#txt_serial").val();
    var fVenta = $("#txt_fVenta").val();
    var marca = $("#sel_marca").val();
    var serial = $("#txt_serial").val();
    var fVenta = $("#txt_fVenta").val();

    $.ajax({
        "url": "../controlador/conductor/controlador_conductor_registro.php",
        "type": "POST",
        data:{
        id:id,
        nombre:nombre,
        apellido:apellido,
        cedula:cedula,
        telefono:telefono,
        email:email,
        direccion:direccion,
        eps:eps,
        vSeguridad:vSeguridad,
        arl:arl,
        rh:rh,
        fondoPension:fondoPension,
        vLicencia:vLicencia,
        placa:placa
        }
    }).done(function(resp){
        console.log(resp);
        if(resp > 0){
            if(resp==1){
            $("#modal_registro_conductor").modal('hide');
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