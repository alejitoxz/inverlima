<div class="col-md-12">
    <div class="card card-success">
            <div class="card-header">
            <h3 class="card-title">Bienvenido al contenido de los clientes</h3>

            <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="card-refresh" data-source="/pages/widgets.html" data-source-selector="#card-refresh-content"><i class="fas fa-sync-alt"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
            </div>
                <!-- /.card-tools -->
            </div>
              <!-- /.card-header -->
            <div class="card-body">
            <div class="form-group">
                <div class="col-lg-10">
                    <div class="col-lg-2">
                    <button type="button" class="btn btn-primary"  onclick="AbrirModalRegistroCliente()"><i class="fas fa-plus"> </i> Registrar</button>
                    </div> 
                </div>
            </div>
            <table id="tabla_cliente" class="display responsive nowrap" style="width:100%">
                    <thead>
                        <tr>
                          <th style="display:none"></th>
                          <th>#</th>
                          <th>nombre</th>
                          <th>apellido</th>
                          <th>cedula</th>
                          <th>telefono</th>
                          <th>email</th>
                          <th>direccion</th>
                          <th>Editar</th>
                        </tr>
                    </thead>
                    <tbody id="Listadoclientes">
                    </tbody>
            </table>
            </div>
              <!-- /.card-body -->
        </div>
            <!-- /.card -->
    </div>
</div>

<form autocomplete="false" onsubmit="return false">

<div class="modal fade" id="modal_registro_cliente" role="dialog">

    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header modal-primary">
        <h4 class="modal-title"><b>Registro </b></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <!-- FORMULARIO REGISTRO DE USUARIOS, CAMPOS -->
        <form class="form">

        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label for="">Cedula</label>
              <input type="text" class="form-control" id="txt_cedula_cliente" placeholder="Ingrese la cedula" onchange="buscarPersona(this.value)"><br>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="">Nombres</label>
              <input type="hidden" id="idPersona">
              <input type="text" class="form-control" id="txt_nombre_cliente" placeholder="Ingrese los nombres"><br>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="">Apellidos</label>
              <input type="text" class="form-control" id="txt_apellido_cliente" placeholder="Ingrese los apellidos"><br>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label for="">Telefono</label>
              <input type="text" class="form-control" id="txt_telefono_cliente" placeholder="Ingrese el telefono"><br>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="">Email</label>
              <input type="text" class="form-control" id="txt_email_cliente" placeholder="Ingrese el email"><br>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="">Direccion</label>
              <input type="text" class="form-control" id="txt_direccion_cliente" placeholder="Ingrese la direccion"><br>
            </div>
          </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Cancelar</button>
          <button type="button" class="btn btn-primary" onclick="registrar_cliente()"><i class="fa fa-check"></i> Guardar</button>
        </div>
      </div>
    </div>
  </div>

  <!-- MODAL PARA EDITAR REGISTRO -->
  <div class="modal fade" id="modal_editar_cliente" role="dialog">

    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header modal-primary">
        <h4 class="modal-title"><b>Editar Usuario</b></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <!-- FORMULARIO REGISTRO DE USUARIOS, CAMPOS -->
        <form class="form">

        <div class="row">
          <div class="col-md-4">
          <input type="hidden" id="id" >
            <div class="form-group">
              <label for="">Nombres</label>
              <input type="text" class="form-control" id="txt_nombre_cliente_edit" placeholder="Ingrese los Nombres"><br>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="">Apellidos</label>
              <input type="text" class="form-control" id="txt_apellido_cliente_edit" placeholder="Ingrese los apellidos"><br>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="">Cedula</label>
              <input type="text" class="form-control" id="txt_cedula_cliente_edit" placeholder="Ingrese la cedula"><br>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label for="">Telefono</label>
              <input type="text" class="form-control" id="txt_telefono_cliente_edit" placeholder="Ingrese el telefono"><br>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="">Email</label>
              <input type="text" class="form-control" id="txt_email_cliente_edit" placeholder="Ingrese el email"><br>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="">Direccion</label>
              <input type="text" class="form-control" id="txt_direccion_cliente_edit" placeholder="Ingrese la direccion"><br>
            </div>
          </div>
          </div>
        
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Cancelar</button>
          <button type="button" class="btn btn-primary" onclick="modificar_datos_cliente()"><i class="fa fa-check"></i> Modificar</button>
        </div>
      </div>
    </div>
  </div>
  </form>
<script type="text/javascript" src="../js/cliente.js"></script>

<script>
  $(document).ready(function(){
    listar_cliente();
    $("#modal_registro_cliente").on('shown.bs.modal',function(){

    });
  });
    

</script>
