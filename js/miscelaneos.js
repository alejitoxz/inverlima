var table_miscelaneos;
function listar_miscelaneos(){
    table_miscelaneos = $('#tabla_miscelaneos').DataTable( {
        "ordering":true,
        "paging": true,
        "searching": { "regex": true },
        "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
        "pageLength": 10,
        "destroy":true,
        "async": true ,
        "processing": true,
        "ajax": {
            "url": "../controlador/miscelaneos/controlador_miscelaneos_listar.php",
            "type": "POST"
        },
        "columns": [
            { "data": "id" },
            { "data": "descripcion" },
            {"defaultContent":
            "<button style='font-size:13px;' type='button' class='eliminarc btn btn-danger'><i class='fa fa-trash'></i></button><button style='font-size:13px;' type='button' class='editarc btn btn-info'><i class='fa fa-edit'></i></button>"}
        ],
        "language":idioma_espanol,
       select: true
    } );
    
}
function AbrirModalRegistromiscelaneos(){
    $("#modal_registro_miscelaneos").modal({backdrop:'static',keyboard:false})
    $("#modal_registro_miscelaneos").modal('show');
}

function registrar_miscelaneos(){
    var descripcion = $("#txt_descripcion").val();

    if( descripcion == ''
        ){
            return swal.fire("Mensaje De Advertencia", "llene los campos vacios", "warning");
        }
    $.ajax({
        "url": "../controlador/miscelaneos/controlador_miscelaneos_registro.php",
        "type": "POST",
        data:{
        descripcion:descripcion,
        }
    }).done(function(resp){
        console.log(resp);
        if(resp > 0){
            if(resp==1){
            $("#modal_registro_miscelaneos").modal('hide');
            Swal.fire("Mensaje De Confirmacion",'Registro realizado', "success").then((value)=>{
                table_miscelaneos.ajax.reload();
                limpiarRegistro();
            });
        }
        }else{
            Swal.fire("Mensaje De Error",'No se pudo completar el Registro', "error");
        }
    })

}
function limpiarRegistro(){
    $("#txt_descripcion").val("");
}

// FUNCION PARA ELIMINAR (ANULAR) REGISTRO
$('#tabla_miscelaneos').on('click','.eliminarc',function(){
    if(table_miscelaneos.row(this).child.isShown()){
        var idmiscelaneos = table_miscelaneos.row(this).data().id;
    }else{
        var idmiscelaneos = table_miscelaneos.row($(this).parents('tr')).data().id;
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
        modificar_estatus(idmiscelaneos,0);
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
$('#tabla_company').on('click','.editarc',function(){
    
    if(table_company.row(this).child.isShown()){
        var datosCompany = table_company.row(this).data();
    }else{
        var datosCompany = table_company.row($(this).parents('tr')).data();
    }
    
    var id = datosCompany.id;
    var entResp = datosCompany.entResp;
    var nit = datosCompany.nit;
    //levantar modal
    AbrirModalEditarC();
    //ingresas datos modal
    $("#id").val(id);
    $("#txt_com_edit").val(entResp);
    $("#txt_nit_edit").val(nit);
   
})
function modificar_company(){
    var id = $("#id").val();
    var entResp = $("#txt_com_edit").val();
    var nit = $("#txt_nit_edit").val();

    if( entResp == '' ||
        nit == '' 
    ){
            return swal.fire("Mensaje De Advertencia", "llene los campos vacios", "warning");
        }

    $.ajax({
        "url": "../controlador/company/controlador_company_modificar.php",
        "type": "POST",
        data:{
        id:id,
        entResp:entResp,
        nit:nit,
        }
    }).done(function(resp){
        console.log(resp);
        if(resp > 0){
            $("#modal_editar_C").modal('hide');
            Swal.fire("Mensaje De Confirmacion",'Datos Actualizados', "success")
                .then((value)=>{
                table_company.ajax.reload();
            });
        
        }else{
            Swal.fire("Mensaje De Error",'No se pudo completar la edicion', "error");
        }
    })

}