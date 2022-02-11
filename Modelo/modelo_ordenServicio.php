<?php
session_start();
    class modelo_ordenServicio{
        private $conexion;
        public $data;

        function __construct(){
            require_once 'modelo_conexion.php';
            require  'phpqrcode/qrlib.php';
            $this->conexion = new conexion();
        }

        function listar_orden(){
            $conn = $this->conexion->conectar();
            $idCompany = $_SESSION['COMPANY'];
            $Rol = $_SESSION['ROL'];
            $idUsuario = $_SESSION['S_ID'];

            $sql = "SELECT
            ( prop.nombre + ' ' + prop.apellido ) AS tecnico,
            v.placa,
			v.cod_interno,
            os.id,
            os.rRegistradora,
            os.observacion,
            CONVERT ( VARCHAR, os.fecha_creacion ) AS fecha_creacion
            FROM
                ordenServicio AS os
                LEFT JOIN vehiculo AS v ON ( os.idVehiculo = v.id )
                LEFT JOIN tecnico AS t ON ( t.id = os.idTecnico)
                LEFT JOIN persona AS prop ON ( t.idPersona = prop.id )
                INNER JOIN servicio AS s ON ( os.idServicio = s.id )
								order by os.fecha_creacion asc";
            $resp = sqlsrv_query($conn, $sql);
            if( $resp === false) {
                return 0;
            }
            $i = 0;
            $data = [];
            while($row = sqlsrv_fetch_array( $resp, SQLSRV_FETCH_ASSOC))
            {
                $data['data'][] = $row;
                $i++;
                
            }
            if($data>0){
                return $data;
            }else{
                return 0;
            }

            $this->conexion->conectar();
        }

        function listar_conductor(){
            $conn = $this->conexion->conectar();
            $idCompany = $_SESSION['COMPANY'];
            $Rol = $_SESSION['ROL'];
            $idUsuario = $_SESSION['S_ID'];


            $sql  = "SELECT
                    con.id,
                    p.id as idPersonaC,
                    p.nombre,
                    p.apellido,
                    (p.nombre + ' ' + p.apellido) AS dueno, 
                    p.cedula,
                    p.telefono,
                    p.email,
                    p.direccion,
                    con.eps,
                    CONVERT ( VARCHAR, con.vSeguridad ) AS vSeguridad,
                    con.arl,
                    con.rh,
                    con.fondoPension,
                    CONVERT ( VARCHAR, con.vLicencia ) AS vLicencia,
                    CONVERT ( VARCHAR, v.vSoat ) AS vSoat,
                    CONVERT ( VARCHAR, v.vMovilizacion ) AS vMovilizacion,
                    v.nMovilizacion,
                    v.placa,
                    v.nInterno,
                    v.id as idVehiculo,
                    c.entResp,
                    c.nit
                    FROM
                    conductor AS con
                    INNER JOIN vehiculo AS v ON ( con.idVehiculo = v.id )
                    INNER JOIN persona AS p ON ( con.idPersona = p.id ) 
                    INNER JOIN company AS c ON ( c.id = con.idCompany ) 
                    WHERE con.estatus = 1 
            ";
            $resp = sqlsrv_query($conn, $sql);
            if( $resp === false) {
                return 0;
            }
            $i = 0;
            $data = [];
            while($row = sqlsrv_fetch_array( $resp, SQLSRV_FETCH_ASSOC))
            {
                $data['data'][] = $row;
                $i++;
                
            }
            if($data>0){
                return $data;
            }else{
                return 0;
            }
            
            $this->conexion->conectar();
        }

        function listar_tecnico(){
            $conn = $this->conexion->conectar();
            $idCompany = $_SESSION['COMPANY'];
            $Rol = $_SESSION['ROL'];
            $idUsuario = $_SESSION['S_ID'];
    

            $sql  = "SELECT 
            t.id,
            (p.nombre + ' ' +p.apellido) as tecnico
            FROM
            tecnico as t
            INNER JOIN persona AS p ON (t.idPersona = p.id)
            INNER JOIN company AS c ON ( c.id = t.idCompany ) 
            where t.estatus = 1 ";
            $resp = sqlsrv_query($conn, $sql);
            if( $resp === false) {
                return 0;
            }
            $i = 0;
            $data = [];
            while($row = sqlsrv_fetch_array( $resp, SQLSRV_FETCH_ASSOC))
            {
                $data[$i] = $row;
                $i++;
            }
            if($data>0){
                return $data;
            }else{
                return 0;
            }
            
            $this->conexion->conectar();
        }

        function listar_placa(){
            $conn = $this->conexion->conectar();
            $idCompany = $_SESSION['COMPANY'];
            $Rol = $_SESSION['ROL'];
            $idUsuario = $_SESSION['S_ID'];



            $sql  = "SELECT v.id, v.placa , v.cod_interno
            from vehiculo as v
            INNER JOIN company AS c ON ( c.id = v.idCompany ) 
            where v.estatus = 1";
            $resp = sqlsrv_query($conn, $sql);
            if( $resp === false) {
                return 0;
            }
			$i = 0;
            $data = [];
			while($row = sqlsrv_fetch_array( $resp, SQLSRV_FETCH_ASSOC))
			{
				$data[$i] = $row;
				$i++;
			}
            if($data>0){
                return $data;
            }else{
                return 0;
            }
            
            $this->conexion->conectar();
        }

        function listar_bateria(){
            $conn = $this->conexion->conectar();
            $idCompany = $_SESSION['COMPANY'];
            $Rol = $_SESSION['ROL'];
            $idUsuario = $_SESSION['S_ID'];



            $sql  = "SELECT 
            m.id, 
            m.descripcion as bateria
            from 
            miscelaneos_detalle as m
            INNER JOIN miscelaneos AS mi ON ( mi.id = m.id_miscelaneo ) 
            where m.estatus = 1  AND m.id_miscelaneo = 11";
            $resp = sqlsrv_query($conn, $sql);
            if( $resp === false) {
                return 0;
            }
			$i = 0;
            $data = [];
			while($row = sqlsrv_fetch_array( $resp, SQLSRV_FETCH_ASSOC))
			{
				$data[$i] = $row;
				$i++;
			}
            if($data>0){
                return $data;
            }else{
                return 0;
            }
            
            $this->conexion->conectar();
        }
        function listar_tipoBateria(){
            $conn = $this->conexion->conectar();
            $idCompany = $_SESSION['COMPANY'];
            $Rol = $_SESSION['ROL'];
            $idUsuario = $_SESSION['S_ID'];



            $sql  = "SELECT 
            m.id, 
            m.descripcion as tipoBateria
            from 
            miscelaneos_detalle as m
            INNER JOIN miscelaneos AS mi ON ( mi.id = m.id_miscelaneo ) 
            where m.estatus = 1  AND m.id_miscelaneo = 18";
            $resp = sqlsrv_query($conn, $sql);
            if( $resp === false) {
                return 0;
            }
			$i = 0;
            $data = [];
			while($row = sqlsrv_fetch_array( $resp, SQLSRV_FETCH_ASSOC))
			{
				$data[$i] = $row;
				$i++;
			}
            if($data>0){
                return $data;
            }else{
                return 0;
            }
            
            $this->conexion->conectar();
        }
        function listar_marca(){
            $conn = $this->conexion->conectar();
            $idCompany = $_SESSION['COMPANY'];
            $Rol = $_SESSION['ROL'];
            $idUsuario = $_SESSION['S_ID'];



            $sql  = "SELECT 
            m.id, 
            m.descripcion as marca
            from 
            miscelaneos_detalle as m
            INNER JOIN miscelaneos AS mi ON ( mi.id = m.id_miscelaneo ) 
            where m.estatus = 1 AND m.id_miscelaneo = 19";
            $resp = sqlsrv_query($conn, $sql);
            if( $resp === false) {
                return 0;
            }
			$i = 0;
            $data = [];
			while($row = sqlsrv_fetch_array( $resp, SQLSRV_FETCH_ASSOC))
			{
				$data[$i] = $row;
				$i++;
			}
            if($data>0){
                return $data;
            }else{
                return 0;
            }
            
            $this->conexion->conectar();
        }
        function listar_marca_llanta(){
            $conn = $this->conexion->conectar();
            $idCompany = $_SESSION['COMPANY'];
            $Rol = $_SESSION['ROL'];
            $idUsuario = $_SESSION['S_ID'];

 

            $sql  = "SELECT 
            m.id, 
            m.descripcion as llanta
            from 
            miscelaneos_detalle as m
            INNER JOIN miscelaneos AS mi ON ( mi.id = m.id_miscelaneo ) 
            where m.estatus = 1 AND m.id_miscelaneo = 9";
            $resp = sqlsrv_query($conn, $sql);
            if( $resp === false) {
                return 0;
            }
			$i = 0;
            $data = [];
			while($row = sqlsrv_fetch_array( $resp, SQLSRV_FETCH_ASSOC))
			{
				$data[$i] = $row;
				$i++;
			}
            if($data>0){
                return $data;
            }else{
                return 0;
            }
            
            $this->conexion->conectar();
        }
        function listar_tipo_aceite(){
            $conn = $this->conexion->conectar();
            $idCompany = $_SESSION['COMPANY'];
            $Rol = $_SESSION['ROL'];
            $idUsuario = $_SESSION['S_ID'];

  
            $sql  = "SELECT 
            m.id, 
            m.descripcion as tipo_aceite
            from 
            miscelaneos_detalle as m
            INNER JOIN miscelaneos AS mi ON ( mi.id = m.id_miscelaneo ) 
            where m.estatus = 1  AND m.id_miscelaneo = 16";
            $resp = sqlsrv_query($conn, $sql);
            if( $resp === false) {
                return 0;
            }
			$i = 0;
            $data = [];
			while($row = sqlsrv_fetch_array( $resp, SQLSRV_FETCH_ASSOC))
			{
				$data[$i] = $row;
				$i++;
			}
            if($data>0){
                return $data;
            }else{
                return 0;
            }
            
            $this->conexion->conectar();
        }
        function listar_marca_aceite(){
            $conn = $this->conexion->conectar();
            $idCompany = $_SESSION['COMPANY'];
            $Rol = $_SESSION['ROL'];
            $idUsuario = $_SESSION['S_ID'];



            $sql  = "SELECT 
            m.id, 
            m.descripcion as marca_aceite
            from 
            miscelaneos_detalle as m
            INNER JOIN miscelaneos AS mi ON ( mi.id = m.id_miscelaneo ) 
            where m.estatus = 1  AND m.id_miscelaneo = 14";
            $resp = sqlsrv_query($conn, $sql);
            if( $resp === false) {
                return 0;
            }
			$i = 0;
            $data = [];
			while($row = sqlsrv_fetch_array( $resp, SQLSRV_FETCH_ASSOC))
			{
				$data[$i] = $row;
				$i++;
			}
            if($data>0){
                return $data;
            }else{
                return 0;
            }
            
            $this->conexion->conectar();
        }

        function listar_filtro_aceite(){
            $conn = $this->conexion->conectar();
            $idCompany = $_SESSION['COMPANY'];
            $Rol = $_SESSION['ROL'];
            $idUsuario = $_SESSION['S_ID'];

   

            $sql  = "SELECT 
            m.id, 
            m.descripcion as filtro_aceite
            from 
            miscelaneos_detalle as m
            INNER JOIN miscelaneos AS mi ON ( mi.id = m.id_miscelaneo ) 
            where m.estatus = 1  AND m.id_miscelaneo = 20";
            $resp = sqlsrv_query($conn, $sql);
            if( $resp === false) {
                return 0;
            }
			$i = 0;
            $data = [];
			while($row = sqlsrv_fetch_array( $resp, SQLSRV_FETCH_ASSOC))
			{
				$data[$i] = $row;
				$i++;
			}
            if($data>0){
                return $data;
            }else{
                return 0;
            }
            
            $this->conexion->conectar();
        }
        function listar_filtro_aire(){
            $conn = $this->conexion->conectar();
            $idCompany = $_SESSION['COMPANY'];
            $Rol = $_SESSION['ROL'];
            $idUsuario = $_SESSION['S_ID'];


            $sql  = "SELECT 
            m.id, 
            m.descripcion as filtro_aire
            from 
            miscelaneos_detalle as m
            INNER JOIN miscelaneos AS mi ON ( mi.id = m.id_miscelaneo ) 
            where m.estatus = 1  AND m.id_miscelaneo = 21";
            $resp = sqlsrv_query($conn, $sql);
            if( $resp === false) {
                return 0;
            }
			$i = 0;
            $data = [];
			while($row = sqlsrv_fetch_array( $resp, SQLSRV_FETCH_ASSOC))
			{
				$data[$i] = $row;
				$i++;
			}
            if($data>0){
                return $data;
            }else{
                return 0;
            }
            
            $this->conexion->conectar();
        }
        function listar_filtro_combustible(){
            $conn = $this->conexion->conectar();
            $idCompany = $_SESSION['COMPANY'];
            $Rol = $_SESSION['ROL'];
            $idUsuario = $_SESSION['S_ID'];


            $sql  = "SELECT 
            m.id, 
            m.descripcion as filtro_combustible
            from 
            miscelaneos_detalle as m
            INNER JOIN miscelaneos AS mi ON ( mi.id = m.id_miscelaneo ) 
            where m.estatus = 1 AND m.id_miscelaneo = 22";
            $resp = sqlsrv_query($conn, $sql);
            if( $resp === false) {
                return 0;
            }
			$i = 0;
            $data = [];
			while($row = sqlsrv_fetch_array( $resp, SQLSRV_FETCH_ASSOC))
			{
				$data[$i] = $row;
				$i++;
			}
            if($data>0){
                return $data;
            }else{
                return 0;
            }
            
            $this->conexion->conectar();
        }



        function buscar_persona($valor){
            $conn = $this->conexion->conectar();
            $sql  = "SELECT
                    *
                    FROM
                    persona 
                    WHERE cedula = $valor
            ";
            $resp = sqlsrv_query($conn, $sql);
            if( $resp === false) {
                return 0;
            }
            $i = 0;
            $data = [];
            while($row = sqlsrv_fetch_array( $resp, SQLSRV_FETCH_ASSOC))
            {
                $data['data'][] = $row;
                $i++;
                
            }
            if($data>0){
                return $data;
            }else{
                return 0;
            }
            
            $this->conexion->conectar();
        }

        function registrar_ordenServicio($id,$placa,$revBimCotrautol,$rRegistradora,$kmGps,$vExtintor,$oReg,$observacion,$tecnico,$bateria,$tipoBateria,$marca,$serial,$fVenta,$fIntalacion,$tUso,$pCambio,$pMantenimiento,$oMejora,$llantaSerial1,$profundidad1,$opmarca1,$tipoMarca1,$estado1,$fInstalacion1,$fReencauche1,$fCambio1,$fRotacion1,$llantaSerial2,$profundidad2,$opmarca2,$tipoMarca2,$estado2,$fInstalacion2,$fReencauche2,$fCambio2,$fRotacion2,$llantaSerial3,$profundidad3,$opmarca3,$tipoMarca3,$estado3,$fInstalacion3,$fReencauche3,$fCambio3,$fRotacion3,$llantaSerial4,$profundidad4,$opmarca4,$tipoMarca4,$estado4,$fInstalacion4,$fReencauche4,$fCambio4,$fRotacion4,$llantaSerial5,$profundidad5,$opmarca5,$tipoMarca5,$estado5,$fInstalacion5,$fReencauche5,$fCambio5,$fRotacion5,$llantaSerial6,$profundidad6,$opmarca6,$tipoMarca6,$estado6,$fInstalacion6,$fReencauche6,$fCambio6,$fRotacion6,$calibracion1,$calibracion2,$calibracion3,$calibracion4,$calibracion5,$calibracion6,$oCalibracion,$balanceo1,$balanceo2,$balanceo3,$balanceo4,$balanceo5,$balanceo6,$oBalanceo,$alineacion1,$alineacion2,$observacionG3,$observacionM3,$fecha,$pCambioA,$kilometraje,$cKilometraje,$tipoAceite,$marca10,$cantidad1,$presentacion1,$nivelacion,$cNivelacion,$fAceite,$fCombustible,$fAire,$tipoAceite1,$marca1,$uCambio,$pCambio10,$cantidad2,$presentacion2,$nivelacion2,$cNivelacion2,$tipoAceite3,$marca3,$uCambio3,$pCambio3,$cantidad3,$presentacion3,$nivelacion3,$cNivelacion3,$tipoAceite4,$marca4,$uCambio4,$pCambio4,$tipoAceite5,$marca5,$uCambio5,$pCambio5,$lFreno,$lParabrisa,$refrigerante,$hidraulico,$lMotor,$lCaja,$lTransmision,$lFrenos1,$engrase,$sRadiador,$sFiltroAire,$observacionesF){
            $idCompany = $_SESSION['COMPANY'];
            $idUsuario = $_SESSION['S_ID'];
            $cadena = "";
            
                
                $cadena = "DECLARE @idServicio int
                INSERT INTO servicio(
                            bateria,
                            tipoBateria,
                            marca,
                            serial,
                            fVenta,
                            fInstalacion,
                            tiempoUso,
                            proximoCambio,
                            proximoMantenimiento,
                            oportunidadesMejora,
                            llanta1Serial,
                            llanta1Profundidad,
                            llanta1Marca,
                            llanta1Tipo,
                            llanta1Estado,
                            llanta1Instalacion,
                            llanta1Reencauche,
                            llanta1Cambio,
                            llanta1Rotacion,
                            llanta2Serial,
                            llanta2Profundidad,
                            llanta2Marca,
                            llanta2Tipo,
                            llanta2Estado,
                            llanta2Instalacion,
                            llanta2Reencauche,
                            llanta2Cambio,
                            llanta2Rotacion,
                            llanta3Serial,
                            llanta3Profundidad,
                            llanta3Marca,
                            llanta3Tipo,
                            llanta3Estado,
                            llanta3Instalacion,
                            llanta3Reencauche,
                            llanta3Cambio,
                            llanta3Rotacion,
                            llanta4Serial,
                            llanta4Profundidad,
                            llanta4Marca,
                            llanta4Tipo,
                            llanta4Estado,
                            llanta4Instalacion,
                            llanta4Reencauche,
                            llanta4Cambio,
                            llanta4Rotacion,
                            llanta5Serial,
                            llanta5Profundidad,
                            llanta5Marca,
                            llanta5Tipo,
                            llanta5Estado,
                            llanta5Instalacion,
                            llanta5Reencauche,
                            llanta5Cambio,
                            llanta5Rotacion,
                            llanta6Serial,
                            llanta6Profundidad,
                            llanta6Marca,
                            llanta6Tipo,
                            llanta6Estado,
                            llanta6Instalacion,
                            llanta6Reencauche,
                            llanta6Cambio,
                            llanta6Rotacion,
                            calibracionLlanta1,
                            calibracionLlanta2,
                            calibracionLlanta3,
                            calibracionLlanta4,
                            calibracionLlanta5,
                            calibracionLlanta6,
                            observacionCalibracion,
                            Balanceo1,
                            Balanceo2,
                            Balanceo3,
                            Balanceo4,
                            Balanceo5,
                            Balanceo6,
                            oBalanceo,
                            alineacion1,
                            alineacion2,
                            lObservacionGeneral,
                            lObservacionMejora,
                            motorFecha,
                            motorProximoCambio,
                            motorKilometraje,
                            motorCambioKilometraje,
                            motorTipoAceite,
                            motorMarca,
                            motorCantidad,
                            motorPresentacion,
                            motorNivelacion,
                            motorCantidadNivelada,
                            motorFiltroAceite,
                            motorfiltroCombustible,
                            motorFiltroAire,
                            cajaTipoAceite,
                            cajaMarca,
                            cajaUltimoCambio,
                            cajaProximoCambio,
                            cajaCantidad,
                            cajaPresentacion,
                            cajaNivelacion,
                            cajaCantidadNivelada,
                            transmicionTipoAceite,
                            transmicionMarca,
                            transmicionUltimoCambio,
                            transmicionProximoCambio,
                            transmicionCantidad,
                            transmicionPresentacion,
                            transmicionNivelacion,
                            transmicionCantidadNivelada,
                            refrigeranteTipoAceite,
                            refrigeranteMarca,
                            refrigeranteUltimoCambio,
                            refrigeranteProximoCambio,
                            hidraulicoTipoAceite,
                            hidraulicoMarca,
                            hidraulicoUltimoCambio,
                            hidraulicoProximoCambio,
                            liquidoFrenos,
                            liquidoParabrisas,
                            liquidoRefrigerantes,
                            liquidoHidraulico,
                            liquidoMotor,
                            liquidoCaja,
                            liquidoTransmision,
                            otrosLimpiezaFrenos,
                            otrosEngrase,
                            otrosSopleteoRadiador,
                            otrosSopleteoFiltroAire,
                            observacionesGenerales2
                    
                                    )
                VALUES(
                    $bateria,
                    $tipoBateria,
                    $marca,
                    '$serial',
                    '$fVenta',
                    '$fIntalacion',
                    '$tUso',
                    '$pCambio',
                    '$pMantenimiento',
                    '$oMejora',
                    '$llantaSerial1',
                    $profundidad1,
                    $opmarca1,
                    $tipoMarca1,
                    $estado1,
                    '$fInstalacion1',
                    '$fReencauche1',
                    '$fCambio1',
                    '$fRotacion1',
                    '$llantaSerial2',
                    $profundidad2,
                    $opmarca2,
                    $tipoMarca2,
                    $estado2,
                    '$fInstalacion2',
                    '$fReencauche2',
                    '$fCambio2',
                    '$fRotacion2',
                    '$llantaSerial3',
                    $profundidad3,
                    $opmarca3,
                    $tipoMarca3,
                    $estado3,
                    '$fInstalacion3',
                    '$fReencauche3',
                    '$fCambio3',
                    '$fRotacion3',
                    '$llantaSerial4',
                    $profundidad4,
                    $opmarca4,
                    $tipoMarca4,
                    $estado4,
                    '$fInstalacion4',
                    '$fReencauche4',
                    '$fCambio4',
                    '$fRotacion4',
                    '$llantaSerial5',
                    $profundidad5,
                    $opmarca5,
                    $tipoMarca5,
                    $estado5,
                    '$fInstalacion5',
                    '$fReencauche5',
                    '$fCambio5',
                    '$fRotacion5',
                    '$llantaSerial6',
                    $profundidad6,
                    $opmarca6,
                    $tipoMarca6,
                    $estado6,
                    '$fInstalacion6',
                    '$fReencauche6',
                    '$fCambio6',
                    '$fRotacion6',
                    '$calibracion1',
                    '$calibracion2',
                    '$calibracion3',
                    '$calibracion4',
                    '$calibracion5',
                    '$calibracion6',
                    '$oCalibracion',
                    $balanceo1,
                    $balanceo2,
                    $balanceo3,
                    $balanceo4,
                    $balanceo5,
                    $balanceo6,
                    '$oBalanceo',
                    $alineacion1,
                    $alineacion2,
                    '$observacionG3',
                    '$observacionM3',
                    '$fecha',
                    '$pCambioA',
                    '$kilometraje',
                    '$cKilometraje',
                    $tipoAceite,
                    $marca10,
                    $cantidad1,
                    $presentacion1,
                    $nivelacion,
                    $cNivelacion,
                    $fAceite,
                    $fCombustible,
                    $fAire,
                    $tipoAceite1,
                    $marca1,
                    '$uCambio',
                    '$pCambio10',
                    $cantidad2,
                    $presentacion2,
                    $nivelacion2,
                    $cNivelacion2,
                    $tipoAceite3,
                    $marca3,
                    '$uCambio3',
                    '$pCambio3',
                    $cantidad3,
                    $presentacion3,
                    $nivelacion3,
                    $cNivelacion3,
                    $tipoAceite4,
                    $marca4,
                    '$uCambio4',
                    '$pCambio4',
                    $tipoAceite5,
                    $marca5,
                    '$uCambio5',
                    '$pCambio5',
                    $lFreno,
                    $lParabrisa,
                    $refrigerante,
                    $hidraulico,
                    $lMotor,
                    $lCaja,
                    $lTransmision,
                    $lFrenos1,
                    $engrase,
                    $sRadiador,
                    $sFiltroAire,
                    '$observacionesF'
                )
                SET @idServicio = SCOPE_IDENTITY()
                INSERT INTO ordenServicio(
                    idServicio,
                    idVehiculo,
                    estatus,
                    revBimCotrautol,
                    vExtintor,
                    rRegistradora,
                    oRegistradora,
                    observacion,
                    idTecnico

                ) 
                VALUES(
                    @idServicio,$placa,$revBimCotrautol,1,'$vExtintor',$rRegistradora,'$oReg','$observacion',$tecnico
                )";
            
            
            $conn = $this->conexion->conectar();
            $sql  = "BEGIN TRY
                     BEGIN TRAN
                     
                     $cadena
                     
                     COMMIT TRAN
                     END TRY
                     BEGIN CATCH
                     ROLLBACK TRAN
                     END CATCH";
                     //echo $sql;
            $resp = sqlsrv_query($conn, $sql);

            if( $resp === false) {
                return 0;
            }else{
                return 1;
            }
            
            $this->conexion->conectar();
        }

        function generarqr($id){
            $dir = "../../Vista/imagenes/qr/";
            // consulta
            if($id){
                $idF = $id;
            }else{
                $conn = $this->conexion->conectar();
                $sql  = "SELECT MAX(id) as id from conductor";
                $resp = sqlsrv_query($conn, $sql);
                $i = 0;
                while($row = sqlsrv_fetch_array( $resp, SQLSRV_FETCH_ASSOC))
                {
                    $data[$i] = $row;
                    $i++;
                }

                $idF = $data[0]['id'];
            }
            if(!file_exists($dir)){
                mkdir($dir);
            }
            $filename = $dir."qr-".$idF.".png";
            //echo "<img src='$filename'> ";
            $tamano = 10;
            $level = "M";
            $frameSize = 3;
            $contenido = "https://www.visualsatco.com/visualsat.sutc/qr.php?conductor=".$idF;

            QRcode::png($contenido,$filename,$level,$tamano,$frameSize);

        
        }

        function contador_conductor(){
            $conn = $this->conexion->conectar();
            $idCompany = $_SESSION['COMPANY'];
            $Rol = $_SESSION['ROL'];
            $idUsuario = $_SESSION['S_ID'];

            $sql  = "SELECT COUNT(id) as contadorConductor from conductor
            where estatus = 1 ";
           //echo $sql;
            $resp = sqlsrv_query($conn, $sql);
            if( $resp === false) {
                return 0;
            }
            $i = 0;
            
            while($row = sqlsrv_fetch_array( $resp, SQLSRV_FETCH_ASSOC))
            {
                $data[$i] = $row;
                $i++;
            }
            if($data>0){
                return $data;
            }else{
                return 0;
            }
            
            $this->conexion->conectar();
        }

        function contador_orden(){
            $conn = $this->conexion->conectar();
            $idCompany = $_SESSION['COMPANY'];
            $Rol = $_SESSION['ROL'];
            $idUsuario = $_SESSION['S_ID'];


            $sql  = "SELECT COUNT(id) as contadorServicio from servicio
           ";
           //echo $sql;
            $resp = sqlsrv_query($conn, $sql);
            if( $resp === false) {
                return 0;
            }
            $i = 0;
            
            while($row = sqlsrv_fetch_array( $resp, SQLSRV_FETCH_ASSOC))
            {
                $data[$i] = $row;
                $i++;
            }
            if($data>0){
                return $data;
            }else{
                return 0;
            }
            
            $this->conexion->conectar();
        }

        function modificar_conductor($id,$estatus){
            $conn = $this->conexion->conectar();
            $sql  = "UPDATE conductor set estatus= $estatus
                    WHERE id='$id'
                    ";
                   
            $resp = sqlsrv_query($conn, $sql);
            
            if( $resp === false) {
                return 0;
            }else{
                return 1;
            }
            
            $this->conexion->conectar();
        }
    
        function modificar_datos_ordenServicio($id,$idPersonaC,$nombre,$apellido,$cedula,$telefono,$email,$direccion,$idVehiculo,$eps,$arl,$rh,$fondoPension,$vLicencia,$vSeguridad){
            $conn = $this->conexion->conectar();
            $idCompany = $_SESSION['COMPANY'];
            $cadena = "DECLARE @idServicio int
                INSERT INTO servicio(
                            bateria,
                            tipoBateria,
                            marca,
                            serial,
                            fVenta,
                            fInstalacion,
                            tiempoUso,
                            proximoCambio,
                            proximoMantenimiento,
                            oportunidadesMejora,
                            llanta1Serial,
                            llanta1Profundidad,
                            llanta1Marca,
                            llanta1Tipo,
                            llanta1Estado,
                            llanta1Instalacion,
                            llanta1Reencauche,
                            llanta1Cambio,
                            llanta1Rotacion,
                            llanta2Serial,
                            llanta2Profundidad,
                            llanta2Marca,
                            llanta2Tipo,
                            llanta2Estado,
                            llanta2Instalacion,
                            llanta2Reencauche,
                            llanta2Cambio,
                            llanta2Rotacion,
                            llanta3Serial,
                            llanta3Profundidad,
                            llanta3Marca,
                            llanta3Tipo,
                            llanta3Estado,
                            llanta3Instalacion,
                            llanta3Reencauche,
                            llanta3Cambio,
                            llanta3Rotacion,
                            llanta4Serial,
                            llanta4Profundidad,
                            llanta4Marca,
                            llanta4Tipo,
                            llanta4Estado,
                            llanta4Instalacion,
                            llanta4Reencauche,
                            llanta4Cambio,
                            llanta4Rotacion,
                            llanta5Serial,
                            llanta5Profundidad,
                            llanta5Marca,
                            llanta5Tipo,
                            llanta5Estado,
                            llanta5Instalacion,
                            llanta5Reencauche,
                            llanta5Cambio,
                            llanta5Rotacion,
                            llanta6Serial,
                            llanta6Profundidad,
                            llanta6Marca,
                            llanta6Tipo,
                            llanta6Estado,
                            llanta6Instalacion,
                            llanta6Reencauche,
                            llanta6Cambio,
                            llanta6Rotacion,
                            calibracionLlanta1,
                            calibracionLlanta2,
                            calibracionLlanta3,
                            calibracionLlanta4,
                            calibracionLlanta5,
                            calibracionLlanta6,
                            observacionCalibracion,
                            Balanceo1,
                            Balanceo2,
                            Balanceo3,
                            Balanceo4,
                            Balanceo5,
                            Balanceo6,
                            oBalanceo,
                            alineacion1,
                            alineacion2,
                            lObservacionGeneral,
                            lObservacionMejora,
                            motorFecha,
                            motorProximoCambio,
                            motorKilometraje,
                            motorCambioKilometraje,
                            motorTipoAceite,
                            motorMarca,
                            motorCantidad,
                            motorPresentacion,
                            motorNivelacion,
                            motorCantidadNivelada,
                            motorFiltroAceite,
                            motorfiltroCombustible,
                            motorFiltroAire,
                            cajaTipoAceite,
                            cajaMarca,
                            cajaUltimoCambio,
                            cajaProximoCambio,
                            cajaCantidad,
                            cajaPresentacion,
                            cajaNivelacion,
                            cajaCantidadNivelada,
                            transmicionTipoAceite,
                            transmicionMarca,
                            transmicionUltimoCambio,
                            transmicionProximoCambio,
                            transmicionCantidad,
                            transmicionPresentacion,
                            transmicionNivelacion,
                            transmicionCantidadNivelada,
                            refrigeranteTipoAceite,
                            refrigeranteMarca,
                            refrigeranteUltimoCambio,
                            refrigeranteProximoCambio,
                            hidraulicoTipoAceite,
                            hidraulicoMarca,
                            hidraulicoUltimoCambio,
                            hidraulicoProximoCambio,
                            liquidoFrenos,
                            liquidoParabrisas,
                            liquidoRefrigerantes,
                            liquidoHidraulico,
                            liquidoMotor,
                            liquidoCaja,
                            liquidoTransmision,
                            otrosLimpiezaFrenos,
                            otrosEngrase,
                            otrosSopleteoRadiador,
                            otrosSopleteoFiltroAire,
                            observacionesGenerales2
                    
                                    )
                VALUES(
                    $bateria,
                    $tipoBateria,
                    $marca,
                    '$serial',
                    '$fVenta',
                    '$fIntalacion',
                    '$tUso',
                    '$pCambio',
                    '$pMantenimiento',
                    '$oMejora',
                    '$llantaSerial1',
                    $profundidad1,
                    $opmarca1,
                    $tipoMarca1,
                    $estado1,
                    '$fInstalacion1',
                    '$fReencauche1',
                    '$fCambio1',
                    '$fRotacion1',
                    '$llantaSerial2',
                    $profundidad2,
                    $opmarca2,
                    $tipoMarca2,
                    $estado2,
                    '$fInstalacion2',
                    '$fReencauche2',
                    '$fCambio2',
                    '$fRotacion2',
                    '$llantaSerial3',
                    $profundidad3,
                    $opmarca3,
                    $tipoMarca3,
                    $estado3,
                    '$fInstalacion3',
                    '$fReencauche3',
                    '$fCambio3',
                    '$fRotacion3',
                    '$llantaSerial4',
                    $profundidad4,
                    $opmarca4,
                    $tipoMarca4,
                    $estado4,
                    '$fInstalacion4',
                    '$fReencauche4',
                    '$fCambio4',
                    '$fRotacion4',
                    '$llantaSerial5',
                    $profundidad5,
                    $opmarca5,
                    $tipoMarca5,
                    $estado5,
                    '$fInstalacion5',
                    '$fReencauche5',
                    '$fCambio5',
                    '$fRotacion5',
                    '$llantaSerial6',
                    $profundidad6,
                    $opmarca6,
                    $tipoMarca6,
                    $estado6,
                    '$fInstalacion6',
                    '$fReencauche6',
                    '$fCambio6',
                    '$fRotacion6',
                    '$calibracion1',
                    '$calibracion2',
                    '$calibracion3',
                    '$calibracion4',
                    '$calibracion5',
                    '$calibracion6',
                    '$oCalibracion',
                    $balanceo1,
                    $balanceo2,
                    $balanceo3,
                    $balanceo4,
                    $balanceo5,
                    $balanceo6,
                    '$oBalanceo',
                    $alineacion1,
                    $alineacion2,
                    '$observacionG3',
                    '$observacionM3',
                    '$fecha',
                    '$pCambioA',
                    '$kilometraje',
                    '$cKilometraje',
                    $tipoAceite,
                    $marca10,
                    $cantidad1,
                    $presentacion1,
                    $nivelacion,
                    $cNivelacion,
                    $fAceite,
                    $fCombustible,
                    $fAire,
                    $tipoAceite1,
                    $marca1,
                    '$uCambio',
                    '$pCambio10',
                    $cantidad2,
                    $presentacion2,
                    $nivelacion2,
                    $cNivelacion2,
                    $tipoAceite3,
                    $marca3,
                    '$uCambio3',
                    '$pCambio3',
                    $cantidad3,
                    $presentacion3,
                    $nivelacion3,
                    $cNivelacion3,
                    $tipoAceite4,
                    $marca4,
                    '$uCambio4',
                    '$pCambio4',
                    $tipoAceite5,
                    $marca5,
                    '$uCambio5',
                    '$pCambio5',
                    $lFreno,
                    $lParabrisa,
                    $refrigerante,
                    $hidraulico,
                    $lMotor,
                    $lCaja,
                    $lTransmision,
                    $lFrenos1,
                    $engrase,
                    $sRadiador,
                    $sFiltroAire,
                    '$observacionesF'
                )
                SET @idServicio = SCOPE_IDENTITY()
                INSERT INTO ordenServicio(
                    idServicio,
                    idVehiculo,
                    estatus,
                    revBimCotrautol,
                    vExtintor,
                    rRegistradora,
                    oRegistradora,
                    observacion,
                    idTecnico

                ) 
                VALUES(
                    @idServicio,$placa,$revBimCotrautol,1,'$vExtintor',$rRegistradora,'$oReg','$observacion',$tecnico
                )";
            $resp = sqlsrv_query($conn, $sql);
            
            if( $resp === false) {
                return 0;
            }else{
                return 1;
            }
            
            $this->conexion->conectar();
        }


        function listar_vencimientos(){
            $conn = $this->conexion->conectar();
            $idCompany = $_SESSION['COMPANY'];
            $sql  = "SELECT 
            con.id,
            (p.nombre + ' ' +p.apellido) as dueno
            from 
            conductor as con
            INNER JOIN persona AS p ON (con.idPersona = p.id)
            where con.idCompany = $idCompany and con.estatus = 1
            ";
            $resp = sqlsrv_query($conn, $sql);
            if( $resp === false) {
                return 0;
            }
            $i = 0;
            $data = [];
            while($row = sqlsrv_fetch_array( $resp, SQLSRV_FETCH_ASSOC))
            {
                $data[$i] = $row;
                $i++;
            }
            if($data>0){
                return $data;
            }else{
                return 0;
            }
            
            $this->conexion->conectar();
        }
        





}