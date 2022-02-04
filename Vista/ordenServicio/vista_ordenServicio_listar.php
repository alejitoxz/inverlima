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
                    <button type="button" class="btn btn-primary"  onclick="AbrirModalRegistroOrdenServicio()"><i class="fas fa-plus"> </i> Registrar</button>
                    </div> 
                </div>
            </div>
            <table id="tabla_orden" class="display responsive nowrap" style="width:100%">
                    <thead>
                        <tr>
                          <th>Orden</th>
                          <th>Placa</th>
                          <th>N. Interno</th>
                          <th>Registradora</th>
                          <th>Operario</th>
                          <th>Creacion</th>
                          <th>Observacion</th>
                          <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="ListadoOrden">
                    </tbody>
            </table>
            </div>
              <!-- /.card-body -->
        </div>
            <!-- /.card -->
    </div>
</div>

<form autocomplete="false" onsubmit="return false">

<div class="modal fade" id="modal_registro_OrdenServicio" role="dialog">

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
                    <div class="step active" data-target="#datos-part" onclick="stepper.to(1)">
                      <button type="button" class="step-trigger" role="tab" aria-controls="datos-part" id="datos-trigger" aria-selected="true">
                        <span class="bs-stepper-circle"><i class="fas fa-bus"></i></span>
                        <span class="bs-stepper-label">Datos del Vehículo</span>
                      </button>
                    </div>

                    <!-- DATOS DE BATERIAS -->
                    <div class="line"></div>
                    <div class="step" data-target="#bateria-part" onclick="stepper.to(2)">
                      <button type="button" class="step-trigger" role="tab" aria-controls="bateria-part" id="bateria-trigger" aria-selected="false">
                        <span class="bs-stepper-circle"><i class="fas fa-car-battery"></i></span>
                        <span class="bs-stepper-label">Batería</span>
                      </button>
                    </div>

                    <!-- DATOS DE LLANTAS -->
                    <div class="line"></div>
                    <div class="step" data-target="#llanta-part" onclick="stepper.to(3)">
                      <button type="button" class="step-trigger" role="tab" aria-controls="llanta-part" id="llanta-trigger" aria-selected="false" >
                        <span class="bs-stepper-circle"><i class="fas fa-ring"></i></span>
                        <span class="bs-stepper-label">Llanta</span>
                      </button>
                    </div>

                    <!-- DATOS DE ACEITES -->
                    <div class="line"></div>
                    <div class="step" data-target="#aceite-part" onclick="stepper.to(4)">
                      <button type="button" class="step-trigger" role="tab" aria-controls="aceite-part" id="aceite-trigger" aria-selected="false" >
                        <span class="bs-stepper-circle"><i class="fas fa-oil-can"></i></span>
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
                          <select class="js-example-basic-single"  name="state" id="sel_placa_vehiculo" style="width:100%; heigth: 40px;" onchange="odometro(this.value)">    
                          </select><br><br>
                        </div>
                      </div>
                      <div class="col-md-4">
                          <div class="form-group">
                            <label for="">Revision bimestral Cotrautol</label>
                            <select class="js-example-basic-single"  name="state" id="txt_revb" style="width:100%; heigth: 40px;">   
                              <option value="0">Seleccionar</option>
                              <option value="1">Si</option>
                              <option value="2">No</option>
                            </select><br><br>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="">Revision registradora</label>
                            <select class="js-example-basic-single"  name="state" id="sel_rReg" style="width:100%; heigth: 40px;">   
                              <option value="0">Seleccionar</option>
                              <option value="1">Si</option>
                              <option value="2">No</option>
                            </select><br><br>
                          </div>
                        </div>
                        </div>
                      <div class="row">
                        <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Km Gps</label>
                            <input type="text" class="form-control" id="txt_kmGps"readonly><br>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="">Vencimiento del extintor</label>
                            <input type="date" class="form-control" id="txt_vExtintor" style="width:100%; heigth: 40px;"><br>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="">Observaciones de la registradora</label>
                            <input type="text" class="form-control" id="txt_oReg" placeholder="Ingrese la marca"><br>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-13">
                          <div class="form-group">
                            <label for="">Observaciones</label>
                            <textarea class="form-control" id="txt_obs" placeholder="Ingrese la marca"></textarea><br>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="">Operario</label>
                            <select class="js-example-basic-single" id="sel_operario" name="state" style="width:100%; heigth: 40px;">   
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
                            <select class="js-example-basic-single"  name="state" id="sel_bateria" style="width:100%; heigth: 40px;">   
                            </select><br><br>
                          </div>
                      </div>
                      <div class="col-md-4">
                          <div class="form-group">
                            <label for="">Tipo de bateria</label>
                            <select class="js-example-basic-single"  name="state" id="sel_tipoBateria" style="width:100%; heigth: 40px;">   
                            </select><br><br>
                          </div>
                      </div>
                      <div class="col-md-4">
                          <div class="form-group">
                            <label for="">marca</label>
                            <select class="js-example-basic-single"  name="state" id="sel_marca" style="width:100%; heigth: 40px;">   
                            </select><br><br>
                          </div>
                      </div>
                    </div>
                    <div class="row">  
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="">serial</label>
                            <input type="text" class="form-control" id="txt_serial" placeholder="Ingrese la marca"><br>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="">Fecha de venta</label>
                            <input type="date" class="form-control" id="txt_fVenta" style="width:100%; heigth: 40px;"><br>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="">Fecha de instalacion</label>
                            <input type="date" class="form-control" id="txt_fIntalacion" style="width:100%; heigth: 40px;"><br>
                          </div>
                        </div>
                    </div>
                    <div class="row"> 
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="">Tiempo de uso</label>
                            <input type="text" class="form-control" id="txt_tUso" placeholder="Ingrese la marca"><br>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="">Proximo cambio</label>
                            <input type="date" class="form-control" id="txt_pCambio" style="width:100%; heigth: 40px;"><br>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="">Proximo mantenimiento</label>
                            <input type="date" class="form-control" id="txt_pMantenimiento" style="width:100%; heigth: 40px;"><br>
                          </div>
                        </div>
                    </div>
                    <div class="col-md-13">
                          <div class="form-group">
                            <label for="">Oportunidades de mejora</label>
                            <textarea class="form-control" id="txt_oMejora" placeholder="Ingrese la marca"></textarea><br>
                          </div>
                        </div>  
                      <button class="btn btn-primary" onclick="stepper.previous()">Anterior</button>
                      <button class="btn btn-primary" onclick="stepper.next()">Siguiente</button>
                    </div>
                      



                     <!-- FORMULARIO llanta-->
                    <div id="llanta-part" class="content" role="tabpanel" aria-labelledby="llanta-trigger">
                    <h5>Llanta 1</h5>
                    <div class="row">

                      <div class="col-md-3">
                      <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                              <label for="">serial</label>
                              <input type="text" class="form-control" id="txt_llantaSerial1" placeholder="Ingrese la marca" ><br>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="">Profundidad</label>
                              <select class="js-example-basic-single"  name="state" id="sel_profundidad1" style="width:100%; heigth: 40px;">   
                                <option value="0">Seleccionar</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                              </select><br><br>
                            </div>
                        </div>
                        </div>
                      </div>
                      
                      <div class="col-md-3">
                          <div class="form-group">
                            <label for="">Marca</label>
                            <select class="js-example-basic-single"  name="state" id="sel_marca_llanta1" style="width:100%; heigth: 40px;">   
                            </select><br><br>
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="form-group">
                            <label for="">Tipo</label>
                            <select class="js-example-basic-single"  name="state" id="sel_tipoMarca1" style="width:100%; heigth: 40px;">   
                              <option value="0" selected>Seleccionar</option>
                              <option value="1">Traccion</option>
                              <option value="2">Direccional</option>
                            </select><br><br>
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="form-group">
                            <label for="">Estado</label>
                            <select class="js-example-basic-single"  name="state" id="sel_estado1" style="width:100%; heigth: 40px;">   
                              <option value="0" selected>Seleccionar</option>
                              <option value="1">Nueva</option>
                              <option value="2">Reencauchada</option>
                            </select><br><br>
                          </div>
                      </div>
                      
                    </div>
                    <div class="row">
                        
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="">F.Instalacion</label>
                            <input type="date" class="form-control" id="txt_fInstalacion1" style="width:100%; heigth: 40px;">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="">F.Reencauche</label>
                            <input type="date" class="form-control" id="txt_fReencauche1" style="width:100%; heigth: 40px;">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="">F.Cambio</label>
                            <input type="date" class="form-control" id="txt_fCambio1" style="width:100%; heigth: 40px;">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="">F. Rotacion</label>
                            <input type="date" class="form-control" id="txt_fRotacion1" style="width:100%; heigth: 40px;">
                          </div>
                        </div>
                    </div>
                    <h5>Llanta 2</h5>
                    <div class="row">

                      <div class="col-md-3">
                      <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                              <label for="">serial</label>
                              <input type="text" class="form-control" id="txt_mar_edit2" placeholder="Ingrese la marca" ><br>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="">Profundidad</label>
                              <select class="js-example-basic-single"  name="state" id="sel_profundidad2" style="width:100%; heigth: 40px;">   
                              <option value="0">Seleccionar</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                              </select><br><br>
                            </div>
                        </div>
                        </div>
                      </div>
                      
                      <div class="col-md-3">
                          <div class="form-group">
                            <label for="">Marca</label>
                            <select class="js-example-basic-single"  name="state" id="sel_marca_llanta2" style="width:100%; heigth: 40px;">   
                            </select><br><br>
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="form-group">
                            <label for="">Tipo</label>
                            <select class="js-example-basic-single"  name="state" id="sel_tipoMarca2" style="width:100%; heigth: 40px;">   
                              <option value="0">Seleccionar</option>
                              <option value="1">Traccion</option>
                              <option value="2">Direccional</option>
                            </select><br><br>
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="form-group">
                            <label for="">Estado</label>
                            <select class="js-example-basic-single"  name="state" id="sel_estado2" style="width:100%; heigth: 40px;">   
                              <option value="0">Seleccionar</option>
                              <option value="1">Nueva</option>
                              <option value="2">Reencauchada</option>
                            </select><br><br>
                          </div>
                      </div>
                      
                    </div>
                    <div class="row">
                        
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="">F.Instalacion</label>
                            <input type="date" class="form-control" id="sel_fInstalacion2" style="width:100%; heigth: 40px;">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="">F.Reencauche</label>
                            <input type="date" class="form-control" id="txt_fReencauche2" style="width:100%; heigth: 40px;">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="">F.Cambio</label>
                            <input type="date" class="form-control" id="txt_fCambio2" style="width:100%; heigth: 40px;">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="">F. Rotacion</label>
                            <input type="date" class="form-control" id="txt_fRotacion2" style="width:100%; heigth: 40px;">
                          </div>
                        </div>
                    </div>
                    <h5>Llanta 3</h5>
                    <div class="row">

                      <div class="col-md-3">
                      <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                              <label for="">serial</label>
                              <input type="text" class="form-control" id="txt_llantaSerial3" placeholder="Ingrese la marca" ><br>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="">Profundidad</label>
                              <select class="js-example-basic-single"  name="state" id="sel_profundidad3" style="width:100%; heigth: 40px;">   
                                <option value="0">Seleccionar</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                              </select><br><br>
                            </div>
                        </div>
                        </div>
                      </div>
                      
                      <div class="col-md-3">
                          <div class="form-group">
                            <label for="">Marca</label>
                            <select class="js-example-basic-single"  name="state" id="sel_marca_llanta3" style="width:100%; heigth: 40px;">   
                            </select><br><br>
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="form-group">
                            <label for="">Tipo</label>
                            <select class="js-example-basic-single"  name="state" id="sel_tipoMarca3" style="width:100%; heigth: 40px;">   
                              <option value="0" selected>Seleccionar</option>
                              <option value="1">Traccion</option>
                              <option value="2">Direccional</option>
                            </select><br><br>
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="form-group">
                            <label for="">Estado</label>
                            <select class="js-example-basic-single"  name="state" id="sel_estado3" style="width:100%; heigth: 40px;">   
                              <option value="0" selected>Seleccionar</option>
                              <option value="1">Nueva</option>
                              <option value="2">Reencauchada</option>
                            </select><br><br>
                          </div>
                      </div>
                      
                    </div>
                    <div class="row">
                        
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="">F.Instalacion</label>
                            <input type="date" class="form-control" id="sel_fInstalacion3" style="width:100%; heigth: 40px;">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="">F.Reencauche</label>
                            <input type="date" class="form-control" id="txt_fReencauche3" style="width:100%; heigth: 40px;">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="">F.Cambio</label>
                            <input type="date" class="form-control" id="txt_fCambio3" style="width:100%; heigth: 40px;">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="">F. Rotacion</label>
                            <input type="date" class="form-control" id="txt_fRotacion3" style="width:100%; heigth: 40px;">
                          </div>
                        </div>
                    </div>
                    <h5>Llanta 4</h5>
                    <div class="row">

                      <div class="col-md-3">
                      <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                              <label for="">serial</label>
                              <input type="text" class="form-control" id="txt_llantaSerial4" placeholder="Ingrese la marca" ><br>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="">Profundidad</label>
                              <select class="js-example-basic-single"  name="state" id="sel_profundidad4" style="width:100%; heigth: 40px;">   
                                <option value="0">Seleccionar</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                              </select><br><br>
                            </div>
                        </div>
                        </div>
                      </div>
                      
                      <div class="col-md-3">
                          <div class="form-group">
                            <label for="">Marca</label>
                            <select class="js-example-basic-single"  name="state" id="sel_marca_llanta4" style="width:100%; heigth: 40px;">   
                            </select><br><br>
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="form-group">
                            <label for="">Tipo</label>
                            <select class="js-example-basic-single"  name="state" id="sel_tipoMarca4" style="width:100%; heigth: 40px;">   
                              <option value="0" selected>Seleccionar</option>
                              <option value="1">Traccion</option>
                              <option value="2">Direccional</option>
                            </select><br><br>
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="form-group">
                            <label for="">Estado</label>
                            <select class="js-example-basic-single"  name="state" id="sel_estado4" style="width:100%; heigth: 40px;">   
                              <option value="0" selected>Seleccionar</option>
                              <option value="1">Nueva</option>
                              <option value="2">Reencauchada</option>
                            </select><br><br>
                          </div>
                      </div>
                      
                    </div>
                    <div class="row">
                        
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="">F.Instalacion</label>
                            <input type="date" class="form-control" id="sel_fInstalacion4" style="width:100%; heigth: 40px;">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="">F.Reencauche</label>
                            <input type="date" class="form-control" id="txt_fReencauche4" style="width:100%; heigth: 40px;">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="">F.Cambio</label>
                            <input type="date" class="form-control" id="txt_fCambio4" style="width:100%; heigth: 40px;">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="">F. Rotacion</label>
                            <input type="date" class="form-control" id="txt_fRotacion4" style="width:100%; heigth: 40px;">
                          </div>
                        </div>
                    </div>
                    <h5>Llanta 5</h5>
                    <div class="row">

                      <div class="col-md-3">
                      <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                              <label for="">serial</label>
                              <input type="text" class="form-control" id="txt_llantaSerial5" placeholder="Ingrese la marca" ><br>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="">Profundidad</label>
                              <select class="js-example-basic-single"  name="state" id="sel_profundidad5" style="width:100%; heigth: 40px;">   
                                <option value="0">Seleccionar</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                              </select><br><br>
                            </div>
                        </div>
                        </div>
                      </div>
                      
                      <div class="col-md-3">
                          <div class="form-group">
                            <label for="">Marca</label>
                            <select class="js-example-basic-single"  name="state" id="sel_marca_llanta5" style="width:100%; heigth: 40px;">   
                            </select><br><br>
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="form-group">
                            <label for="">Tipo</label>
                            <select class="js-example-basic-single"  name="state" id="sel_tipoMarca5" style="width:100%; heigth: 40px;">   
                              <option value="0" selected>Seleccionar</option>
                              <option value="1">Traccion</option>
                              <option value="2">Direccional</option>
                            </select><br><br>
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="form-group">
                            <label for="">Estado</label>
                            <select class="js-example-basic-single"  name="state" id="sel_estado5" style="width:100%; heigth: 40px;">   
                              <option value="0" selected>Seleccionar</option>
                              <option value="1">Nueva</option>
                              <option value="2">Reencauchada</option>
                            </select><br><br>
                          </div>
                      </div>
                      
                    </div>
                    <div class="row">
                        
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="">F.Instalacion</label>
                            <input type="date" class="form-control" id="sel_fInstalacion5" style="width:100%; heigth: 40px;">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="">F.Reencauche</label>
                            <input type="date" class="form-control" id="txt_fReencauche5" style="width:100%; heigth: 40px;">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="">F.Cambio</label>
                            <input type="date" class="form-control" id="txt_fCambio5" style="width:100%; heigth: 40px;">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="">F. Rotacion</label>
                            <input type="date" class="form-control" id="txt_fRotacion5" style="width:100%; heigth: 40px;">
                          </div>
                        </div>
                    </div>
                    <h5>Llanta 6</h5>
                    <div class="row">

                      <div class="col-md-3">
                      <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                              <label for="">serial</label>
                              <input type="text" class="form-control" id="txt_llantaSerial6" placeholder="Ingrese la marca" ><br>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="">Profundidad</label>
                              <select class="js-example-basic-single"  name="state" id="sel_profundidad6" style="width:100%; heigth: 40px;">   
                              <option value="0">Seleccionar</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                              </select><br><br>
                            </div>
                        </div>
                        </div>
                      </div>
                      
                      <div class="col-md-3">
                          <div class="form-group">
                            <label for="">Marca</label>
                            <select class="js-example-basic-single"  name="state" id="sel_marca_llanta" style="width:100%; heigth: 40px;">   
                            </select><br><br>
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="form-group">
                            <label for="">Tipo</label>
                            <select class="js-example-basic-single"  name="state" id="sel_tipoMarca6" style="width:100%; heigth: 40px;">   
                              <option value="0" selected>Seleccionar</option>
                              <option value="1">Traccion</option>
                              <option value="2">Direccional</option>
                            </select><br><br>
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="form-group">
                            <label for="">Estado</label>
                            <select class="js-example-basic-single"  name="state" id="sel_estado6" style="width:100%; heigth: 40px;">   
                                <option value="0" selected>Seleccionar</option>
                              <option value="1">Nueva</option>
                              <option value="2">Reencauchada</option>
                            </select><br><br>
                          </div>
                      </div>
                      
                    </div>
                    <div class="row">
                        
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="">F.Instalacion</label>
                            <input type="date" class="form-control" id="sel_fInstalacion6" style="width:100%; heigth: 40px;">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="">F.Reencauche</label>
                            <input type="date" class="form-control" id="txt_fReencauche6" style="width:100%; heigth: 40px;">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="">F.Cambio</label>
                            <input type="date" class="form-control" id="txt_fCambio6" style="width:100%; heigth: 40px;">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="">F. Rotacion</label>
                            <input type="date" class="form-control" id="txt_fRotacion6" style="width:100%; heigth: 40px;">
                          </div>
                        </div>
                    </div>
                    <h5>Calibracion:</h5>
                    <div class="row">
                        <div class="col-md-2">
                          <div class="form-group">
                            <label for="">llanta 1/Lbs.</label>
                            <input type="number" value="0" class="form-control" id="txt_cal1" style="width:100%; heigth: 40px;">
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                            <label for="">llanta 2/Lbs.</label>
                            <input type="number"value="0" class="form-control" id="txt_cal2" style="width:100%; heigth: 40px;">
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                            <label for="">llanta 3/Lbs.</label>
                            <input type="number"value="0" class="form-control" id="txt_cal3" style="width:100%; heigth: 40px;">
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                            <label for="">llanta 4/Lbs.</label>
                            <input type="number"value="0" class="form-control" id="txt_cal4" style="width:100%; heigth: 40px;">
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                            <label for="">llanta 5/Lbs.</label>
                            <input type="number"value="0" class="form-control" id="txt_cal5" style="width:100%; heigth: 40px;">
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                            <label for="">llanta 6/Lbs.</label>
                            <input type="number"value="0" class="form-control" id="txt_cal6" style="width:100%; heigth: 40px;">
                          </div>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-md-12">
                          <div class="form-group">
                            <label for="">Observaciones de calibracion</label>
                            <textarea  class="form-control" id="txt_oCalibracion" ></textarea>
                          </div>
                        </div>
                    </div>
                    <div class="row">
                      <div class="col-md-2">
                          <div class="form-group">
                            <label for="">Balanceo 1.</label>
                            <select class="js-example-basic-single"  name="state" id="sel_bal1" style="width:100%; heigth: 40px;">   
                              <option value="0" selected>Seleccionar</option>
                              <option value="1">Si</option>
                              <option value="2">No</option>
                            </select><br><br>
                          </div>
                      </div>
                      <div class="col-md-2">
                          <div class="form-group">
                            <label for="">Balanceo 2.</label>
                            <select class="js-example-basic-single"  name="state" id="sel_bal2" style="width:100%; heigth: 40px;">   
                              <option value="0" selected>Seleccionar</option>
                              <option value="1">Si</option>
                              <option value="2">No</option>
                            </select><br><br>
                          </div>
                      </div>
                      <div class="col-md-2">
                          <div class="form-group">
                            <label for="">Balanceo 3.</label>
                            <select class="js-example-basic-single"  name="state" id="sel_bal3" style="width:100%; heigth: 40px;">   
                              <option value="0" selected>Seleccionar</option>
                              <option value="1">Si</option>
                              <option value="2">No</option>
                            </select><br><br>
                          </div>
                      </div>
                      <div class="col-md-2">
                          <div class="form-group">
                            <label for="">Balanceo 4.</label>
                            <select class="js-example-basic-single"  name="state" id="sel_bal4" style="width:100%; heigth: 40px;">   
                              <option value="0" selected>Seleccionar</option>
                              <option value="1">Si</option>
                              <option value="2">No</option>
                            </select><br><br>
                          </div>
                      </div>
                      <div class="col-md-2">
                          <div class="form-group">
                            <label for="">Balanceo 5.</label>
                            <select class="js-example-basic-single"  name="state" id="sel_bal5" style="width:100%; heigth: 40px;">   
                              <option value="0" selected>Seleccionar</option>
                              <option value="1">Si</option>
                              <option value="2">No</option>
                            </select><br><br>
                          </div>
                      </div>
                      <div class="col-md-2">
                          <div class="form-group">
                            <label for="">Balanceo 6.</label>
                            <select class="js-example-basic-single"  name="state" id="sel_bal6" style="width:100%; heigth: 40px;">   
                              <option value="0" selected>Seleccionar</option>
                              <option value="1">Si</option>
                              <option value="2">No</option>
                            </select><br><br>
                          </div>
                      </div>
                      <div class="col-md-12">
                          <div class="form-group">
                            <label for="">Observaciones de Balanceo</label>
                            <textarea  class="form-control" id="txt_mar_edit" ></textarea>
                          </div>
                        </div>
                    </div>
                    <div class="row">
                      <div class="col-md-2">
                          <div class="form-group">
                            <label for="">Alineacion 1.</label>
                            <select class="js-example-basic-single"  name="state" id="sel_alineacion1" style="width:100%; heigth: 40px;">   
                              <option value="0" selected>Seleccionar</option>
                              <option value="1">Si</option>
                              <option value="2">No</option>
                            </select><br><br>
                          </div>
                      </div>
                      <div class="col-md-2">
                          <div class="form-group">
                            <label for="">Alineacion 2.</label>
                            <select class="js-example-basic-single"  name="state" id="sel_alineacion2" style="width:100%; heigth: 40px;">   
                              <option value="0" selected>Seleccionar</option>
                              <option value="1">Si</option>
                              <option value="2">No</option>
                            </select><br><br>
                          </div>
                      </div>
                      <div class="col-md-12">
                          <div class="form-group">
                            <label for="">Observaciones</label>
                            <textarea  class="form-control" id="txt_obs3" ></textarea>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="">Observaciones de Mejora</label>
                            <textarea  class="form-control" id="txt_obsM3" ></textarea>
                          </div>
                        </div>
                    </div>
                     
                    <button class="btn btn-primary" onclick="stepper.previous()">Anterior</button>
                    <button class="btn btn-primary" onclick="stepper.next()">Siguiente</button>
                    </div>




                      <!-- FORMULARIO ACCEITE-->
                      <div id="aceite-part" class="content" role="tabpanel" aria-labelledby="aceite-trigger">
                        <h5>Cambio de aceite del motor</h5>
                        <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="">Fecha</label>
                              <input type="date" class="form-control" id="txt_fechaA" placeholder="Ingrese placa"><br>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="">Proximo cambio</label>
                              <input type="date" class="form-control" id="txt_pCambioA" placeholder="Ingrese placa"><br>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="">Kilometraje</label>
                              <input type="text" class="form-control" id="txt_kilometraje" placeholder="Ingrese placa"><br>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="">Cambio x Kilometraje</label>
                              <input type="text" class="form-control" id="txt_ckilometraje" placeholder="Ingrese placa"><br>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="">Tipo de aceite</label>
                              <select class="js-example-basic-single"  name="state" id="sel_tipo_aceite" style="width:100%; heigth: 40px;">   
                              </select><br><br>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="">Marca</label>
                              <select class="js-example-basic-single"  name="state" id="sel_marca_aceite" style="width:100%; heigth: 40px;">   
                              </select><br><br>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="">Cantidad x 1/4</label>
                              <input type="Number"value="0" class="form-control" id="txt_cantidad1" placeholder="Ingrese placa"><br>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="">presentacion</label>
                              <select class="js-example-basic-single"  name="state" id="sel_presentacion1" style="width:100%; heigth: 40px;">   
                                <option value="0">Seleccionar</option>
                                <option value="1">Sellado</option>
                                <option value="2">Granel</option>
                              </select><br><br>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="">nivelacion</label>
                              <select class="js-example-basic-single"  name="state" id="sel_nivelacion1" style="width:100%; heigth: 40px;">   
                                <option value="0">Seleccionar</option>
                                <option value="1">Si</option>
                                <option value="2">No</option>
                              </select><br><br>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="">cantidad nivelada 1/4</label>
                              <input type="number"value="0" class="form-control" id="txt_cNivelacion1" placeholder="Ingrese placa"><br>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                              <label for="">Filtro aceite</label>
                              <select class="js-example-basic-single"  name="state" id="sel_filtro_aceite" style="width:100%; heigth: 40px;">   
                              </select><br><br>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="">Filtro de combustible</label>
                              <select class="js-example-basic-single"  name="state" id="sel_filtro_combustible" style="width:100%; heigth: 40px;">   
                              </select><br><br>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="">Filtro de aire</label>
                              <select class="js-example-basic-single"  name="state" id="sel_filtro_aire" style="width:100%; heigth: 40px;">   
                              </select><br><br>
                            </div>
                          </div>
                        </div>
                        <h5>Aceite de caja</h5>
                        <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                              <label for="">Tipo de aceite</label>
                              <select class="js-example-basic-single"  name="state" id="sel_tipo_aceite1" style="width:100%; heigth: 40px;">   
                              </select><br><br>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="">Marca</label>
                              <select class="js-example-basic-single"  name="state" id="sel_marca_aceite1" style="width:100%; heigth: 40px;">   
                              </select><br><br>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="">Ultimo cambio</label>
                              <input type="date" class="form-control" id="txt_uCambio1" placeholder="Ingrese placa"><br>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="">Proximo cambio</label>
                              <input type="date" class="form-control" id="txt_pCambio1" placeholder="Ingrese placa"><br>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-3">
                              <div class="form-group">
                                <label for="">Cantidad x 1/4</label>
                                <input type="number"value="0" class="form-control" id="txt_cantidad2" placeholder="Ingrese placa"><br>
                              </div>
                            </div>
                            <div class="col-md-3">
                              <div class="form-group">
                                <label for="">presentacion</label>
                                <select class="js-example-basic-single"  name="state" id="sel_presentacion2" style="width:100%; heigth: 40px;">   
                                  <option value="0">Seleccionar</option>
                                  <option value="1">Sellado</option>
                                  <option value="2">Granel</option>
                                </select><br><br>
                              </div>
                            </div>
                            <div class="col-md-3">
                              <div class="form-group">
                                <label for="">nivelacion</label>
                                <select class="js-example-basic-single"  name="state" id="sel_nivelacion2" style="width:100%; heigth: 40px;">   
                                  <option value="0">Seleccionar</option>
                                  <option value="1">Si</option>
                                  <option value="2">No</option>
                                </select><br><br>
                              </div>
                            </div>
                            <div class="col-md-3">
                              <div class="form-group">
                                <label for="">cantidad nivelada 1/4</label>
                                <input type="number"value="0" class="form-control" id="txt_nivelacion2" placeholder="Ingrese placa"><br>
                              </div>
                            </div>
                          </div>
                        <h5>Aceite de la transmision</h5>
                        <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                              <label for="">Tipo de aceite</label>
                              <select class="js-example-basic-single"  name="state" id="sel_tipo_aceite2" style="width:100%; heigth: 40px;">   
                              </select><br><br>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="">Marca</label>
                              <select class="js-example-basic-single"  name="state" id="sel_marca_aceite2" style="width:100%; heigth: 40px;">   
                              </select><br><br>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="">Ultimo cambio</label>
                              <input type="date" class="form-control" id="txt_uCambio2" placeholder="Ingrese placa"><br>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="">Proximo cambio</label>
                              <input type="date" class="form-control" id="txt_pCambio2" placeholder="Ingrese placa"><br>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-3">
                              <div class="form-group">
                                <label for="">Cantidad x 1/4</label>
                                <input type="number"value="0" class="form-control" id="txt_cantidad2" placeholder="Ingrese placa"><br>
                              </div>
                            </div>
                            <div class="col-md-3">
                              <div class="form-group">
                                <label for="">presentacion</label>
                                <select class="js-example-basic-single"  name="state" id="sel_presentacion3" style="width:100%; heigth: 40px;">   
                                  <option value="0">Seleccionar</option>
                                  <option value="1">Sellado</option>
                                  <option value="2">Granel</option>
                                </select><br><br>
                              </div>
                            </div>
                            <div class="col-md-3">
                              <div class="form-group">
                                <label for="">nivelacion</label>
                                <select class="js-example-basic-single"  name="state" id="sel_nivelacion3" style="width:100%; heigth: 40px;">   
                                  <option value="0">Seleccionar</option>
                                  <option value="1">Si</option>
                                  <option value="2">No</option>
                                </select><br><br>
                              </div>
                            </div>
                            <div class="col-md-3">
                              <div class="form-group">
                                <label for="">cantidad nivelada 1/4</label>
                                <input type="number"value="0" class="form-control" id="txt_nivelacion3" placeholder="Ingrese placa"><br>
                              </div>
                            </div>
                          </div>
                        <h5>Refrigerante</h5>
                        <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                              <label for="">Tipo de aceite</label>
                              <select class="js-example-basic-single"  name="state" id="sel_tipo_aceite3" style="width:100%; heigth: 40px;">   
                              </select><br><br>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="">Marca</label>
                              <select class="js-example-basic-single"  name="state" id="sel_marca_aceite3" style="width:100%; heigth: 40px;">   
                              </select><br><br>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="">Ultimo cambio</label>
                              <input type="date" class="form-control" id="txt_uCambio3" placeholder="Ingrese placa"><br>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="">Proximo cambio</label>
                              <input type="date" class="form-control" id="txt_pCambio3" placeholder="Ingrese placa"><br>
                            </div>
                          </div>
                        </div>
                        <h5>Hidraulico</h5>
                        <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                              <label for="">Tipo de aceite</label>
                              <select class="js-example-basic-single"  name="state" id="sel_tipo_aceite4" style="width:100%; heigth: 40px;">   
                              </select><br><br>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="">Marca</label>
                              <select class="js-example-basic-single"  name="state" id="sel_marca_aceite4" style="width:100%; heigth: 40px;">   
                              </select><br><br>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="">Ultimo cambio</label>
                              <input type="date" class="form-control" id="txt_uCambio4" placeholder="Ingrese placa"><br>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="">Proximo cambio</label>
                              <input type="date" class="form-control" id="txt_pCambio4" placeholder="Ingrese placa"><br>
                            </div>
                          </div>
                        </div>
                        <h5>Medicion de liquidos</h5>
                        <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                              <label for="">Liquido de frenos</label>
                              <select class="js-example-basic-single"  name="state" id="sel_lFreno" style="width:100%; heigth: 40px;">   
                                <option value="0">Seleccionar</option>
                                <option value="1">Si</option>
                                <option value="2">No</option>
                              </select><br><br>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="">liquido de parabrisas</label>
                              <select class="js-example-basic-single"  name="state" id="sel_lParabrisa" style="width:100%; heigth: 40px;">   
                                <option value="0">Seleccionar</option>
                                <option value="1">Si</option>
                                <option value="2">No</option>
                              </select><br><br>
                            </div>
                          </div>
                          <div class="col-md-4">
                              <div class="form-group">
                                <label for="">Refrigerantes</label>
                                <select class="js-example-basic-single"  name="state" id="sel_refrigerante" style="width:100%; heigth: 40px;">   
                                  <option value="0">Seleccionar</option>
                                  <option value="1">Si</option>
                                  <option value="2">No</option>
                                </select><br><br>
                              </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                              <div class="form-group">
                                <label for="">Hidraulico</label>
                                <select class="js-example-basic-single"  name="state" id="sel_hidraulico" style="width:100%; heigth: 40px;">   
                                  <option value="0">Seleccionar</option>
                                  <option value="1">Si</option>
                                  <option value="2">No</option>
                                </select><br><br>
                              </div>
                            </div>
                            <div class="col-md-3">
                              <div class="form-group">
                                <label for="">Motor</label>
                                <select class="js-example-basic-single"  name="state" id="sel_lMotor" style="width:100%; heigth: 40px;">   
                                  <option value="0">Seleccionar</option>
                                  <option value="1">Si</option>
                                  <option value="2">No</option>
                                </select><br><br>
                              </div>
                            </div>
                            <div class="col-md-3">
                              <div class="form-group">
                                <label for="">Caja</label>
                                <select class="js-example-basic-single"  name="state" id="sel_lCaja" style="width:100%; heigth: 40px;">   
                                  <option value="0">Seleccionar</option>
                                  <option value="1">Si</option>
                                  <option value="2">No</option>
                                </select><br><br>
                              </div>
                            </div>
                            <div class="col-md-3">
                              <div class="form-group">
                                <label for="">Transmision</label>
                                <select class="js-example-basic-single"  name="state" id="sel_lTransmision" style="width:100%; heigth: 40px;">   
                                  <option value="0">Seleccionar</option>
                                  <option value="1">Si</option>
                                  <option value="2">No</option>
                                </select><br><br>
                              </div>
                            </div>
                          </div>
                          <h5>Otros</h5>
                          <div class="row">
                          <div class="col-md-3">
                              <div class="form-group">
                                <label for="">Limpieza de frenos</label>
                                <select class="js-example-basic-single"  name="state" id="sel_lFrenos1" style="width:100%; heigth: 40px;">   
                                  <option value="0">Seleccionar</option>
                                  <option value="1">Si</option>
                                  <option value="2">No</option>
                                </select><br><br>
                              </div>
                            </div>
                            <div class="col-md-3">
                              <div class="form-group">
                                <label for="">Engrase</label>
                                <select class="js-example-basic-single"  name="state" id="sel_engrase" style="width:100%; heigth: 40px;">   
                                  <option value="0">Seleccionar</option>
                                  <option value="1">Si</option>
                                  <option value="2">No</option>
                                </select><br><br>
                              </div>
                            </div>
                            <div class="col-md-3">
                              <div class="form-group">
                                <label for="">Sopleteo Radiador</label>
                                <select class="js-example-basic-single"  name="state" id="sel_sRadiador" style="width:100%; heigth: 40px;">   
                                  <option value="0">Seleccionar</option>
                                  <option value="1">Si</option>
                                  <option value="2">No</option>
                                </select><br><br>
                              </div>
                            </div>
                            <div class="col-md-3">
                              <div class="form-group">
                                <label for="">Sopleteo filtro de aire</label>
                                <select class="js-example-basic-single"  name="state" id="sel_sFiltroAire" style="width:100%; heigth: 40px;">   
                                  <option value="0">Seleccionar</option>
                                  <option value="1">Si</option>
                                  <option value="2">No</option>
                                </select><br><br>
                              </div>
                            </div>
                            <div class="col-md-12">
                          <div class="form-group">
                            <label for="">Observaciones</label>
                            <textarea class="form-control" id="txt_observacionesF" placeholder="Ingrese la marca"></textarea><br>
                          </div>
                        </div>
                          </div>
                      <button class="btn btn-primary" onclick="stepper.previous()">Anterior</button>
                      <button type="submit" class="btn btn-primary" onclick="registrar_orden_Servicio()">Guardar</button>
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

<script type="text/javascript" src="../js/ordenServicio.js"></script>
<script>
  listar_placa();
  listar_operario();
  listar_bateria();
  listar_tipoBateria();
  listar_marca();
  listar_marca_llanta();
  listar_tipo_aceite();
  listar_marca_aceite();
  listar_filtro_aceite();
  listar_filtro_combustible();
  listar_filtro_aire();
  listar_orden();
</script>