<div class="col-md-12">
    <div class="card card-success">
            <div class="card-header">
            <h3 class="card-title">Bienvenido al contenido de la compañia</h3>

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
                    <button type="button" class="btn btn-primary"  onclick="AbrirModalRegistroCompany()"><i class="fas fa-plus"> </i> Registrar</button>
                    </div> 
                </div>
            </div>
            <table id="tabla_company" class="display responsive nowrap" style="width:100%">
                    <thead>
                        <tr>
                          <th>#</th>
                          <th>Compañia</th>
                          <th>NIT</th>
                          <th>Editar</th>
                        </tr>
                    </thead>
                    <tbody id="Listadocompanias">
                    </tbody>
            </table>
            </div>
              <!-- /.card-body -->
        </div>
            <!-- /.card -->
    </div>
</div>

<form autocomplete="false" onsubmit="return false">

<div class="modal fade" id="modal_registro_company" role="dialog">

    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header modal-primary">
        <h4 class="modal-title"><b>Orden de Servicio</b></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <!-- FORMULARIO REGISTRO DE USUARIOS, CAMPOS -->
        
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-body p-0">
                <div class="bs-stepper linear">


                  <div class="bs-stepper-header" role="tablist">

                    <!-- DATOS DEL VEHICULO -->
                    <div class="step active" data-target="#datos-part">
                      <button type="button" class="step-trigger" role="tab" aria-controls="datos-part" id="datos-trigger" aria-selected="true">
                        <span class="bs-stepper-circle">1</span>
                        <span class="bs-stepper-label">Datos del Vehículo</span>
                      </button>
                    </div>

                    <!-- DATOS DE BATERIAS -->
                    <div class="line"></div>
                    <div class="step" data-target="#bateria-part">
                      <button type="button" class="step-trigger" role="tab" aria-controls="bateria-part" id="bateria-trigger" aria-selected="false">
                        <span class="bs-stepper-circle">2</span>
                        <span class="bs-stepper-label">Batería</span>
                      </button>
                    </div>

                    <!-- DATOS DE LLANTAS -->
                    <div class="line"></div>
                    <div class="step" data-target="#llanta-part">
                      <button type="button" class="step-trigger" role="tab" aria-controls="llanta-part" id="llanta-trigger" aria-selected="false" >
                        <span class="bs-stepper-circle">3</span>
                        <span class="bs-stepper-label">Llanta</span>
                      </button>
                    </div>

                    <!-- DATOS DE ACEITES -->
                    <div class="line"></div>
                    <div class="step" data-target="#aceite-part">
                      <button type="button" class="step-trigger" role="tab" aria-controls="aceite-part" id="aceite-trigger" aria-selected="false" >
                        <span class="bs-stepper-circle">4</span>
                        <span class="bs-stepper-label">Aceites</span>
                      </button>
                    </div>

                  </div><!-- FIN DE LOS TITULOS-->
                  <div class="bs-stepper-content">


                    <!-- FORMULARIO DATOIS-->
                    <div id="datos-part" class="content active dstepper-block" role="tabpanel" aria-labelledby="datos-trigger">
                    <div class="row"> 
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="">Placa</label>
                          <select class="js-example-basic-single"  name="state" id="sel_pro_vehiculo" style="width:100%; heigth: 40px;">   
                          </select><br><br>
                        </div>
                      </div>
                      <div class="col-md-4">
                          <div class="form-group">
                            <label for="">Revision bimestral Cotrautol</label>
                            <select class="js-example-basic-single"  name="state" id="" style="width:100%; heigth: 40px;">   
                            </select><br><br>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="">Revision registradora</label>
                            <select class="js-example-basic-single"  name="state" id="" style="width:100%; heigth: 40px;">   
                            </select><br><br>
                          </div>
                        </div>
                        </div>
                      <div class="row">
                        <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Km Gps</label>
                            <input type="text" class="form-control" id="txt_mar_edit" placeholder="Ingrese la marca"><br>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="">Vencimiento del extintor</label>
                            <input type="date" class="form-control" id="txt_mar_edit" style="width:100%; heigth: 40px;"><br>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="">Observaciones de la registradora</label>
                            <input type="text" class="form-control" id="txt_mar_edit" placeholder="Ingrese la marca"><br>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-13">
                          <div class="form-group">
                            <label for="">Observaciones</label>
                            <textarea class="form-control" id="txt_mar_edit" placeholder="Ingrese la marca"></textarea><br>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="">Operario</label>
                            <select class="js-example-basic-single"  name="state" id="" style="width:100%; heigth: 40px;">   
                            </select><br><br>
                          </div>
                        </div>
                      <button class="btn btn-primary" onclick="stepper.next()">Siguiente</button>
                    </div>



                    
                    <!-- FORMULARIO BATERIA-->
                    <div id="bateria-part" class="content" role="tabpanel" aria-labelledby="bateria-trigger">
                    <div class="row">
                      <div class="col-md-4">
                          <div class="form-group">
                            <label for="">Bateria</label>
                            <select class="js-example-basic-single"  name="state" id="" style="width:100%; heigth: 40px;">   
                            </select><br><br>
                          </div>
                      </div>
                      <div class="col-md-4">
                          <div class="form-group">
                            <label for="">Tipo de bateria</label>
                            <select class="js-example-basic-single"  name="state" id="" style="width:100%; heigth: 40px;">   
                            </select><br><br>
                          </div>
                      </div>
                      <div class="col-md-4">
                          <div class="form-group">
                            <label for="">marca</label>
                            <select class="js-example-basic-single"  name="state" id="" style="width:100%; heigth: 40px;">   
                            </select><br><br>
                          </div>
                      </div>
                    </div>
                    <div class="row">  
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="">serial</label>
                            <input type="text" class="form-control" id="txt_mar_edit" placeholder="Ingrese la marca"><br>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="">Fecha de venta</label>
                            <input type="date" class="form-control" id="txt_mar_edit" style="width:100%; heigth: 40px;"><br>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="">Fecha de instalacion</label>
                            <input type="date" class="form-control" id="txt_mar_edit" style="width:100%; heigth: 40px;"><br>
                          </div>
                        </div>
                    </div>
                    <div class="row"> 
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="">Tiempo de uso</label>
                            <input type="text" class="form-control" id="txt_mar_edit" placeholder="Ingrese la marca"><br>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="">Proximo cambio</label>
                            <input type="date" class="form-control" id="txt_mar_edit" style="width:100%; heigth: 40px;"><br>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="">Proximo mantenimiento</label>
                            <input type="date" class="form-control" id="txt_mar_edit" style="width:100%; heigth: 40px;"><br>
                          </div>
                        </div>
                    </div>
                    <div class="col-md-13">
                          <div class="form-group">
                            <label for="">Oportunidades de mejora</label>
                            <textarea class="form-control" id="txt_mar_edit" placeholder="Ingrese la marca"></textarea><br>
                          </div>
                        </div>  
                      <button class="btn btn-primary" onclick="stepper.previous()">Anterior</button>
                      <button class="btn btn-primary" onclick="stepper.next()">Siguiente</button>
                    </div>
                      



                     <!-- FORMULARIO llanta-->
                    <div id="llanta-part" class="content" role="tabpanel" aria-labelledby="llanta-trigger">
                    <div class="row">
                      <div class="col-md-2">
                          <div class="form-group">
                            <label for="">Profundidad</label>
                            <select class="js-example-basic-single"  name="state" id="" style="width:100%; heigth: 40px;">   
                            </select><br><br>
                          </div>
                      </div>
                      <div class="col-md-1">
                          <div class="form-group">
                            <label for="">Marca</label>
                            <select class="js-example-basic-single"  name="state" id="" style="width:100%; heigth: 40px;">   
                            </select><br><br>
                          </div>
                      </div>
                      <div class="col-md-1">
                          <div class="form-group">
                            <label for="">Tipo</label>
                            <select class="js-example-basic-single"  name="state" id="" style="width:100%; heigth: 40px;">   
                            </select><br><br>
                          </div>
                      </div>
                      <div class="col-md-1">
                          <div class="form-group">
                            <label for="">Estado</label>
                            <select class="js-example-basic-single"  name="state" id="" style="width:100%; heigth: 40px;">   
                            </select><br><br>
                          </div>
                      </div>
                      <div class="col-md-1">
                          <div class="form-group">
                            <label for="">serial</label>
                            <input type="text" class="form-control" id="txt_mar_edit" placeholder="Ingrese la marca" ><br>
                          </div>
                        </div>
                    </div> 
                    <button class="btn btn-primary" onclick="stepper.previous()">Anterior</button>
                    <button class="btn btn-primary" onclick="stepper.next()">Siguiente</button>
                    </div>




                      <!-- FORMULARIO ACCEITE-->
                      <div id="aceite-part" class="content" role="tabpanel" aria-labelledby="aceite-trigger">
                      <div class="form-group">
                        <label for="exampleInputFile">File input</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                          </div>
                          <div class="input-group-append">
                            <span class="input-group-text">Upload</span>
                          </div>
                        </div>
                      </div>
                      <button class="btn btn-primary" onclick="stepper.previous()">Anterior</button>
                      <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>


                  </div>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
              </div>
            </div>
            <!-- /.card -->
          </div>
        </div>

        
        </div>
      </div>
    </div>
</div>

</form>

<script type="text/javascript" src="../js/company.js"></script>
<script>
  $(document).ready(function(){
    listar_company();
    $('.js-example-basic-single').select2();
    $("#modal_registro_company").on('shown.bs.modal',function(){
    });

    // inicimos wizzard
      // BS-Stepper Init
      window.stepper = new Stepper(document.querySelector('.bs-stepper'))
    

  });
</script>