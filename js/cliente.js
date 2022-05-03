var table_cliente;
function listar_cliente(){
    table_cliente = $('#tabla_cliente').DataTable( {
        "ordering":true,
        "paging": true,
        "searching": { "regex": true },
        "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
        "pageLength": 10,
        "destroy":true,
        "async": true ,
        "processing": false,
        "ajax": {
            "url": "../controlador/cliente/controlador_cliente_listar.php",
            "type": "POST"
        },
        "columnDefs": [
            {
                "targets": [ 0 ],
                "visible": false
            }
        ],
        "columns": [
            { "data": "idPersona" },
            { "data": "id" },
            { "data": "nombre" },
            { "data": "apellido" },
            { "data": "cedula" },
            { "data": "telefono" },
            { "data": "email" },
            { "data": "direccion" },
            {"defaultContent":
            "<button style='font-size:13px;' type='button' class='eliminar btn btn-danger'><i class='fa fa-trash'></i></button><button style='font-size:13px;' type='button' class='editar btn btn-info'><i class='fa fa-edit'></i></button>"}
        ],
        "language":idioma_espanol,
       select: true
    } );
    
}

function AbrirModalRegistroCliente(){
    $("#modal_registro_cliente").modal({backdrop:'static',keyboard:false})
    $("#modal_registro_cliente").modal('show');

}

function buscarPersona(valor){
    $.ajax({
        url:'../controlador/usuario/controlador_buscar_persona.php',
        type:'POST',
        data:{
            valor:valor
        }
    }).done(function(resp){
    var data = JSON.parse(resp);
    if(data){
        $("#idPersona").val(data.data[0]['id']);
        $("#txt_nombre_cliente").val(data.data[0]['nombre']);
        $("#txt_apellido_cliente").val(data.data[0]['apellido']);
        $("#txt_telefono_cliente").val(data.data[0]['telefono']);
        $("#txt_email_cliente").val(data.data[0]['email']);
        $("#txt_direccion_cliente").val(data.data[0]['direccion']);
    }else{
        $("#idPersona").val("");
        $("#txt_nombre_cliente").val("");
        $("#txt_apellido_cliente").val("");
        $("#txt_telefono_cliente").val("");
        $("#txt_email_cliente").val("");
        $("#txt_direccion_cliente").val("");
    }
    })
}

function registrar_cliente(){

    var id = $("#idPersona").val();
    var nombre = $("#txt_nombre_cliente").val();
    var apellido = $("#txt_apellido_cliente").val();
    var cedula = $("#txt_cedula_cliente").val();
    var telefono = $("#txt_telefono_cliente").val();
    var email = $("#txt_email_cliente").val();
    var direccion = $("#txt_direccion_cliente").val();

    if( nombre == '' ||
        apellido == '' ||
        cedula == '' ||
        telefono == '' ||
        email == '' ||
        direccion == '' 

        ){
            return swal.fire("Mensaje De Advertencia", "llene los campos vacios", "warning");
        }
    

    $.ajax({
        "url": "../controlador/cliente/controlador_cliente_registro.php",
        "type": "POST",
        data:{
        id:id,
        nombre:nombre,
        apellido:apellido,
        cedula:cedula,
        telefono:telefono,
        email:email,
        direccion:direccion,
        }
    }).done(function(resp){
        console.log(resp);
        if(resp > 0){
            if(resp==1){
                limpiarRegistro();
            $("#modal_registro_cliente").modal('hide');
            Swal.fire("Mensaje De Confirmacion",'Registro realizado', "success").then((value)=>{
                table_cliente.ajax.reload();
                
            });
        }else{
            Swal.fire("Mensaje De Advertencia",'El usuario ya se encuentra en uso', "warning");
        }
        }else{
            Swal.fire("Mensaje De Error",'No se pudo completar el Registro', "error");
        }
    })

}
function limpiarRegistro(){
    $("#idPersona").val("");
    $("#txt_cedula_cliente").val("");
    $("#txt_nombre_cliente").val("");
    $("#txt_apellido_cliente").val("");
    $("#txt_telefono_cliente").val("");
    $("#txt_email_cliente").val("");
    $("#txt_direccion_cliente").val("");
    console.log("registro exitoso");
}
// FUNCION PARA ELIMINAR (ANULAR) REGISTRO
$('#tabla_cliente').on('click','.eliminar',function(){
    if(table_cliente.row(this).child.isShown()){
        var idCliente = table_cliente.row(this).data().id;
    }else{
        var idCliente = table_cliente.row($(this).parents('tr')).data().id;
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
            modificar_estatus_cliente(idCliente,0);
          Swal.fire(
            'Eliminado',
            '¡Tu registro ha sido eliminado!',
            'success'
          )
        }
      })
    
})
function modificar_estatus_cliente(id,estatus){
    $.ajax({
        "url": "../controlador/cliente/controlador_cliente_modificar_estatus.php",
        type: "POST",
        data:{
        id:id,
        estatus:estatus
        }
    }).done(function(resp){
        if(resp>0){
            if(resp==1){
                listar_cliente();
                
            }else{
                Swal.fire("Mensaje De Advertencia",'No se pudo borrar el archivo', "warning")
            }
        }
    })
}

function AbrirModalEditarCliente(){
    $("#modal_editar_cliente").modal({backdrop:'static',keyboard:false})
    $("#modal_editar_cliente").modal('show');
}

// FUNCION PARA EDITAR REGISTRO
$('#tabla_cliente').on('click','.editar',function(){

    if(table_cliente.row(this).child.isShown()){
        var datosCliente = table_cliente.row(this).data();
    }else{
        var datosCliente = table_cliente.row($(this).parents('tr')).data();
    }

    var id = datosCliente.id;
    var nombres = datosCliente.nombre;
    var apellidos = datosCliente.apellido;
    var telefono = datosCliente.telefono;
    var cedula = datosCliente.cedula;
    var email = datosCliente.email;
    var direccion = datosCliente.direccion;
    var idPersona = datosCliente.idPersona;
    //levantar modal
    AbrirModalEditarCliente();
    //ingresas datos modal
    $("#id").val(id);
    $("#txt_nombre_cliente_edit").val(nombres);
    $("#txt_apellido_cliente_edit").val(apellidos);
    $("#txt_cedula_cliente_edit").val(cedula);
    $("#txt_telefono_cliente_edit").val(telefono);
    $("#txt_email_cliente_edit").val(email);
    $("#txt_direccion_cliente_edit").val(direccion);
    $("#idPersona").val(idPersona);

})
function modificar_datos_cliente(){
    var id = $("#id").val();
    var nombre = $("#txt_nombre_cliente_edit").val();
    var apellido = $("#txt_apellido_cliente_edit").val();
    var cedula = $("#txt_cedula_cliente_edit").val();
    var telefono = $("#txt_telefono_cliente_edit").val();
    var email = $("#txt_email_cliente_edit").val();
    var direccion = $("#txt_direccion_cliente_edit").val();
    var idPersona = $("#idPersona").val();

    if( id == ''||
        nombre == '' ||
        apellido == '' ||
        cedula == '' ||
        telefono == '' ||
        email == '' ||
        direccion == ''
        ){
            return swal.fire("Mensaje De Advertencia", "llene los campos vacios", "warning");
        }
    $.ajax({
        "url": "../controlador/cliente/controlador_cliente_modificar_datos.php",
        "type": "POST",
        data:{
        idPersona:idPersona,
        id:id,
        nombre:nombre,
        apellido:apellido,
        cedula:cedula,
        telefono:telefono,
        email:email,
        direccion:direccion
        }
    }).done(function(resp){
        console.log(resp);
        if(resp > 0){
            $("#modal_editar_cliente").modal('hide');
            Swal.fire("Mensaje De Confirmacion",'Datos Actualizados', "success")
                .then((value)=>{
                table.ajax.reload();
            });
        
        }else{
            Swal.fire("Mensaje De Error",'No se pudo completar la edicion', "error");
        }
    })
}
