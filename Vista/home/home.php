<?php
session_start();
$Rol = $_SESSION['ROL'];
if ($Rol == 1 || $Rol == 4) {

?>
<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <div class="row">

                <div class="col-lg-3 col-6">
                <div class="small-box bg-warning">
                    <div class="inner">
                    <h3 id="contadorServicio">0</h3>

                    <p>Orden de servicio</p>
                    </div>
                    <div class="icon">
                    <i class="fas fa-list"></i>
                    </div>
                    <a onclick="cargar_contenido('contenido_principal','ordenServicio/vista_ordenServicio_listar.php')" class="small-box-footer">Usuarios Registrados 
                        <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                        <h3 id="contadorVehiculo">0</h3>

                        <p>Vehículos</p>
                        </div>
                        <div class="icon">
                        <i class="fas fa-taxi"></i>
                        </div>
                        <a onclick="cargar_contenido('contenido_principal','vehiculo/vista_vehiculo_listar.php')" class="small-box-footer">Vehículos Registrados 
                            <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                    <div class="inner">
                    <h3 id="contadorPropietario">0</h3>
                        <p>Propietarios</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-tie"></i>
                    </div>
                        <a onclick="cargar_contenido('contenido_principal','propietario/vista_propietario_listar.php')" class="small-box-footer">Propietarios Registrados 
                            <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
          
              

            </div>
        </div>
    </div>
</div> 

<?php
}
?>


<div class="col-md-12">
  <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Area Chart</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <div class="card-body">
        <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
          <canvas id="areaChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 487px;" width="487" height="250" class="chartjs-render-monitor"></canvas>
        </div>
      </div>
      <!-- /.card-body -->
  </div>
</div>

<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
        <h1 class="card-title"><b>Proximos Vencimientos</b></h1>
        </div>
        <div class="card-body">
            <!-- /.card-header -->
            <div class="card-body">
            <div class="form-group">
                <div class="col-lg-10">
                    <div class="col-lg-2">
                    <!--<button type="button" class="btn btn-primary"  onclick="reporte()" ><i class='fa fa-file-pdf'></i>Exportar</button>-->
                    </div> 
                </div>
            </div>
        <table id="tabla_alerta" class="display responsive nowrap " style="width:100%">
            <thead class="thead-dark">
                <tr>
                    <th>Propietario</th>
                    <th>Placa</th>
                    <th>E-mail</th>
                    <th>Vencimiento</th>
                    <th>Fecha</th>
                    <th>Enviar</th>
                </tr>
            </thead>
            <tbody id="Listadohome">
            </tbody>
        </table>
        </div>
            <!-- /.card-body -->
    </div>
            <!-- /.card -->
    </div>
</div>

<script src="../js/home.js"></script>
<script>
  $(document).ready(function(){
    listar_home();
  })
</script>
<script src="../js/usuario.js"></script>
<script src="../js/home.js"></script>
<script src="../js/vehiculo.js"></script>
<script src="../js/propietario.js"></script>
<script>
    contarOrden();
    contarVehiculo();
    contarPropietario();
    graficaOrdenes();
    //contarConductor();
</script>
<script src="../Vista/plugins/chart.js/Chart.min.js"></script>

<style>
    .red{
        background-color:red !important;
    }
</style>
