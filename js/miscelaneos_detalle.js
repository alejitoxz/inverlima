var table_miscelaneos_detalle;
function listar_miscelaneos_detalle(){
    table_miscelaneos_detalle = $('#tabla_miscelaneos_detalle').DataTable( {
        "ordering":true,
        "paging": true,
        "searching": { "regex": true },
        "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
        "pageLength": 10,
        "destroy":true,
        "async": true ,
        "processing": true,
        "ajax": {
            "url": "../controlador/miscelaneos_detalle/controlador_miscelaneos_detalle_listar.php",
            "type": "POST"
        },
        "columns": [
            //{ "data": "id" },
            { "data": "descripcion" },
            { "data": "descripcion_miscelaneos"},
            {"defaultContent":
            "<button style='font-size:13px;' type='button' class='eliminarc btn btn-danger'><i class='fa fa-trash'></i></button><button style='font-size:13px;' type='button' class='editarc btn btn-info'><i class='fa fa-edit'></i></button>"}
        ],
        "language":idioma_espanol,
       select: true
    } );
    
}
function AbrirModalRegistromiscelaneos_detalle(){
    $("#modal_registro_miscelaneos_detalle").modal({backdrop:'static',keyboard:false})
    $("#modal_registro_miscelaneos_detalle").modal('show');
}

function registrar_miscelaneos_detalle(){
    var descripcion_detalle = $("#txt_descripcion_detalle").val();
    var categoria_miscelaneo = $("#sel_cat_miscelaneo_detalle").val();

    if( descripcion_detalle == '' ||
        categoria_miscelaneo == ''

        ){
            return swal.fire("Mensaje De Advertencia", "llene los campos vacios", "warning");
        }
    $.ajax({
        "url": "../controlador/miscelaneos/controlador_miscelaneos_detalle_registro.php",
        "type": "POST",
        data:{
        descripcion_detalle:descripcion_detalle,
        categoria_miscelaneo:categoria_miscelaneo
        }
    }).done(function(resp){
        console.log(resp);
        if(resp > 0){
            if(resp==1){
            $("#modal_registro_miscelaneos_detalle").modal('hide');
            Swal.fire("Mensaje De Confirmacion",'Registro realizado', "success").then((value)=>{
                table_miscelaneos_detalle.ajax.reload();
                limpiarRegistro();
            });
        }
        }else{
            Swal.fire("Mensaje De Error",'No se pudo completar el Registro', "error");
        }
    })

}
function limpiarRegistro(){
    $("#txt_descripcion_detalle").val("");
    $("#sel_cat_miscelaneo_detalle").val("");
}

// FUNCION PARA ELIMINAR (ANULAR) REGISTRO
$('#tabla_miscelaneos_detalle').on('click','.eliminarc',function(){
    if(table_miscelaneos_detalle.row(this).child.isShown()){
        var idmiscelaneos_detalle = table_miscelaneos_detalle.row(this).data().id;
    }else{
        var idmiscelaneos_detalle = table_miscelaneos_detalle.row($(this).parents('tr')).data().id;
    }
    Swal.fire({
        title: '¿Seguro desea eliminar el registro?',
        text: "Una vez hecho esto, se eliminara del sistema",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Aceptar',
        cancelButtonText: 'Cancelar'
      }).then((result) => {
          console.log(result);
        if (result.value) {
        modificar_estatus(idmiscelaneos_detalle,0);
          Swal.fire(
            'Eliminado',
            '¡Tu registro ha sido eliminado!',
            'success'
          )
        }
      })
    
})
function modificar_estatus(id,estatus){
    $.ajax({
        "url": "../controlador/miscelaneos/controlador_modificar_miscelaneos_estatus.php",
        type: "POST",
        data:{
        id:id,
        estatus:estatus
        }
    }).done(function(resp){
        if(resp>0){
            if(resp==1){
                    listar_miscelaneos();
                
            }else{
                Swal.fire("Mensaje De Advertencia",'No se pudo borrar el archivo', "warning")
            }
        }
    })
}


function AbrirModalEditarC(){
    $("#modal_editar_C").modal({backdrop:'static',keyboard:false})
    $("#modal_editar_C").modal('show');
}

// FUNCION PARA EDITAR REGISTRO
$('#tabla_miscelaneos_detalle').on('click','.editarc',function(){
    
    if(table_miscelaneos_detalle.row(this).child.isShown()){
        var datosmiscelaneos_detalle = table_miscelaneos_detalle.row(this).data();
    }else{
        var datosmiscelaneos_detalle = table_miscelaneos_detalle.row($(this).parents('tr')).data();
    }
    
    var id = datosmiscelaneos_detalle.id;
    var descripcion = datosmiscelaneos.descripcion;
     //levantar modal
    AbrirModalEditarC();
    //ingresas datos modal
    $("#id").val(id);
    $("#txt_miscelaneos_detalle_edit").val(descripcion);
   
})
function modificar_miscelaneos_detalle(){
    var id = $("#id").val();
    var descripcion = $("#txt_miscelaneos_detalle_edit").val();

    console.log(descripcion);
    if( descripcion == ''
    ){
            return swal.fire("Mensaje De Advertencia", "llene los campos vacios", "warning");
        }

    $.ajax({
        "url": "../controlador/miscelaneos/controlador_miscelaneos_editar.php",
        "type": "POST",
        data:{
        id:id,
        descripcion:descripcion,
        }
    }).done(function(resp){
        console.log(resp);
        if(resp > 0){
            $("#modal_editar_C").modal('hide');
            Swal.fire("Mensaje De Confirmacion",'Datos Actualizados', "success")
                .then((value)=> {
                table_miscelaneos.ajax.reload();
            });
        
        }else{
            Swal.fire("Mensaje De Error",'No se pudo completar la edicion', "error");
        }
    })

}