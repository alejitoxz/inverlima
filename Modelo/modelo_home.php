<?php

use PHPMailer\PHPMailer\PHPMailer;
use  PHPMailer\PHPMailer\Exception;
session_start();
    class modelo_home{
        private $conexion;
        public $data;

        function __construct(){
            require_once 'modelo_conexion.php';
            $this->conexion = new conexion();
            
            require  'PHPMailer/Exception.php';
            require  'PHPMailer/PHPMailer.php';
            require  'PHPMailer/SMTP.php';
            $this->mail = new PHPMailer();
        }
        function listar_home(){
            $conn = $this->conexion->conectar();
            $idCompany = $_SESSION['COMPANY'];
            $Rol = $_SESSION['ROL'];
            $idUsuario = $_SESSION['S_ID'];

          
            $sql  = "DECLARE @Fecha DATE = DATEADD( DAY, 15, CONVERT ( DATE, GETDATE( ), 1 ) ), @fechaActual DATE = GETDATE( ) SELECT
            * 
            FROM
                (
                SELECT
                    ( prop.nombre + ' ' + prop.apellido ) AS propietario,
                    prop.cedula,
                    prop.telefono,
                    prop.email,
                    v.placa,
                    CONVERT ( VARCHAR, s.motorProximoCambio ) AS Fecha,
                    @Fecha AS FechaActual,
                CASE
                        
                        WHEN s.motorProximoCambio BETWEEN @fechaActual 
                        AND @Fecha THEN
                            'Aceite Motor' 
                            END AS Vencimiento 
                    FROM
                        ordenServicio AS os
                        LEFT JOIN vehiculo AS v ON ( os.idVehiculo = v.id )
                        LEFT JOIN propietario AS pro ON ( pro.id = v.idPropietario )
                        LEFT JOIN persona AS prop ON ( pro.idPersona = prop.id )
                        INNER JOIN servicio AS s ON ( os.idServicio = s.id ) UNION
                    SELECT
                        ( prop.nombre + ' ' + prop.apellido ) AS propietario,
                        prop.cedula,
                        prop.telefono,
                        prop.email,
                        v.placa,
                        CONVERT ( VARCHAR, s.cajaProximoCambio ) AS Fecha,
                        @Fecha AS FechaActual,
                    CASE
                            
                            WHEN s.cajaProximoCambio BETWEEN @fechaActual 
                            AND @Fecha THEN
                                'Aceite Caja' 
                                END AS Vencimiento 
                        FROM
                            ordenServicio AS os
                            LEFT JOIN vehiculo AS v ON ( os.idVehiculo = v.id )
                            LEFT JOIN propietario AS pro ON ( pro.id = v.idPropietario )
                            LEFT JOIN persona AS prop ON ( pro.idPersona = prop.id )
                            INNER JOIN servicio AS s ON ( os.idServicio = s.id ) UNION
                        SELECT
                            ( prop.nombre + ' ' + prop.apellido ) AS propietario,
                            prop.cedula,
                            prop.telefono,
                            prop.email,
                            v.placa,
                            CONVERT ( VARCHAR, s.transmicionProximoCambio ) AS Fecha,
                            @Fecha AS FechaActual,
                        CASE
                                
                                WHEN s.transmicionProximoCambio BETWEEN @fechaActual 
                                AND @Fecha THEN
                                    'Aceite Transmision' 
                                    END AS Vencimiento 
                            FROM
                                ordenServicio AS os
                                LEFT JOIN vehiculo AS v ON ( os.idVehiculo = v.id )
                                LEFT JOIN propietario AS pro ON ( pro.id = v.idPropietario )
                                LEFT JOIN persona AS prop ON ( pro.idPersona = prop.id )
                                INNER JOIN servicio AS s ON ( os.idServicio = s.id ) UNION
                            SELECT
                                ( prop.nombre + ' ' + prop.apellido ) AS propietario,
                                prop.cedula,
                                prop.telefono,
                                prop.email,
                                v.placa,
                                CONVERT ( VARCHAR, s.refrigeranteProximoCambio ) AS Fecha,
                                @Fecha AS FechaActual,
                            CASE
                                    
                                    WHEN s.refrigeranteProximoCambio BETWEEN @fechaActual 
                                    AND @Fecha THEN
                                        'Refrigerante' 
                                        END AS Vencimiento 
                                FROM
                                    ordenServicio AS os
                                    LEFT JOIN vehiculo AS v ON ( os.idVehiculo = v.id )
                                    LEFT JOIN propietario AS pro ON ( pro.id = v.idPropietario )
                                    LEFT JOIN persona AS prop ON ( pro.idPersona = prop.id )
                                    INNER JOIN servicio AS s ON ( os.idServicio = s.id ) UNION
                                SELECT
                                    ( prop.nombre + ' ' + prop.apellido ) AS propietario,
                                    prop.cedula,
                                    prop.telefono,
                                    prop.email,
                                    v.placa,
                                    CONVERT ( VARCHAR, s.hidraulicoProximoCambio ) AS Fecha,
                                    @Fecha AS FechaActual,
                                CASE
                                        
                                        WHEN s.hidraulicoProximoCambio BETWEEN @fechaActual 
                                        AND @Fecha THEN
                                            'Aceite Hidraulico' 
                                            END AS Vencimiento 
                                    FROM
                                        ordenServicio AS os
                                        LEFT JOIN vehiculo AS v ON ( os.idVehiculo = v.id )
                                        LEFT JOIN propietario AS pro ON ( pro.id = v.idPropietario )
                                        LEFT JOIN persona AS prop ON ( pro.idPersona = prop.id )
                                        INNER JOIN servicio AS s ON ( os.idServicio = s.id ) UNION
                                    SELECT
                                        ( prop.nombre + ' ' + prop.apellido ) AS propietario,
                                        prop.cedula,
                                        prop.telefono,
                                        prop.email,
                                        v.placa,
                                        CONVERT ( VARCHAR, s.proximoCambio ) AS Fecha,
                                        @Fecha AS FechaActual,
                                    CASE
                                            
                                            WHEN s.proximoCambio BETWEEN @fechaActual 
                                            AND @Fecha THEN
                                                'Bateria' 
                                                END AS Vencimiento 
                                        FROM
                                            ordenServicio AS os
                                            LEFT JOIN vehiculo AS v ON ( os.idVehiculo = v.id )
                                            LEFT JOIN propietario AS pro ON ( pro.id = v.idPropietario )
                                            LEFT JOIN persona AS prop ON ( pro.idPersona = prop.id )
                                            INNER JOIN servicio AS s ON ( os.idServicio = s.id ) UNION
                                        SELECT
                                            ( prop.nombre + ' ' + prop.apellido ) AS propietario,
                                            prop.cedula,
                                            prop.telefono,
                                            prop.email,
                                            v.placa,
                                            CONVERT ( VARCHAR, os.vExtintor ) AS Fecha,
                                            @Fecha AS FechaActual,
                                        CASE
                                                
                                                WHEN os.vExtintor BETWEEN @fechaActual 
                                                AND @Fecha THEN
                                                    'Extintor' 
                                                    END AS Vencimiento 
                                            FROM
                                                ordenServicio AS os
                                                LEFT JOIN vehiculo AS v ON ( os.idVehiculo = v.id )
                                                LEFT JOIN propietario AS pro ON ( pro.id = v.idPropietario )
                                                LEFT JOIN persona AS prop ON ( pro.idPersona = prop.id )
                                                INNER JOIN servicio AS s ON ( os.idServicio = s.id ) 
                                            ) tablas 
                                    WHERE
                Vencimiento IS NOT NULL
            ";
            $resp = sqlsrv_query($conn, $sql);
            if( $resp === false) {
                return 0;
            }
            $i = 0;
            $Fecha = [];
            $data = [];
            while($row = sqlsrv_fetch_array( $resp, SQLSRV_FETCH_ASSOC))
            {
                $data['data'][$i] = $row;

             
                $i++;
            }

            
            
            if($data>0){
                return $data;
            }else{
                return 0;
            }
            
            $this->conexion->conectar();
           
        }

        function listar_grafico_orden(){
            $conn = $this->conexion->conectar();
          
            $sql  = " SELECT COUNT
                            ( * ) AS cantidad,
                            --YEAR ( s.fecha_creacion ) YEAR,
                            MONTH ( s.fecha_creacion ) MONTH 
                        FROM
                            ordenServicio AS s 
                           where s.estatus = 1

                        GROUP BY
                            --YEAR ( s.fecha_creacion ),
                            MONTH ( s.fecha_creacion )
            ";
            $resp = sqlsrv_query($conn, $sql);
            if( $resp === false) {
                return 0;
            }
            $i = 0;
            $data = [];
            while($row = sqlsrv_fetch_array( $resp, SQLSRV_FETCH_ASSOC))
            {
                $orden[$i] = $row;
                $i++;
            }
               
            $arrayData      = [];
            $arrayDatax     = [];
            for($j=1; $j<=12; $j++){
                $mes    = $j;
                $cant   = 0;
                if($j<=9) {
                    $mes = '0'.$j;   
                }             
                for($x=0; $x<count($orden);$x++){              
                    if($mes==$orden[$x]["MONTH"] ){
                        $cant = $orden[$x]["cantidad"];
                    }
                }
                    
                array_push($arrayDatax,$cant);
                    
                if($j==12){          
                    array_push($data,$arrayDatax); 
                }            
            }
           

            
                  
            if($data>0){
                return $data;
            }else{
                return 0;
            }
            
            $this->conexion->conectar();
           
        }

        function enviarVencimiento($Propietario,$Placa,$Vencimiento,$Fecha,$Email){
            
            //echo $Email;
            try {
            $cuerpoMail = utf8_decode("
            <b><h4><center>Inverlima</center></h4><b>
            <center><img width='450' height='150' src='https://www.visualsaturbano.com/inverlima/Vista/imagenes/logo_administracion.png'></center>
            <b><h4><center>Hola $Propietario, Inverlima te informa:</center></h4><b>
            <b><h4><center>Le indicamos que su vehículo de placa $Placa, esta próximo a su vencimiento :</center></h4><b>
            <b><h4><center>$Vencimiento  $Fecha</center></h4><b>
            <h4><center>Por favor, debe estar al día</center></h4>
            
                ");	 
            $this->mail->IsSMTP();
            $this->mail->SMTPAuth = true;
            $this->mail->SMTPSecure = "ssl";
            $this->mail->Host = "smtp.gmail.com";
            $this->mail->Port = 465;
            $this->mail->Username = "pruebahost19@gmail.com";
            $this->mail->Password = "123456789-a";									
            $this->mail->setFrom( 'pruebahost19@gmail.com'  );
            $this->mail->addAddress ( $Email );									
            $this->mail->Subject='INVERLIMA';
            $this->mail->From ="pruebahost19@gmail.com";
            $this->mail->FromName = "INVERLIMA"; 
            $this->mail->MsgHTML($cuerpoMail);
            $this->mail->IsHTML(true);
            $this->mail->Send();
            echo 1 ;
            }catch( Exception  $e ) {
            echo 0 ;
            }

        }

        function VencimientoPDF($datos){
            $conn = $this->conexion->conectar();
            $date = date('Y-m-d');
            require('../../vista/plugins/fpdf/fpdf.php');
            $pdf = new FPDF();
            $pdf->AddPage();
            
            //cabecera
            $pdf->SetFont('Arial','B',12);
            $pdf->Image('../../vista/imagenes/logo-alcaldia.png' , 18 ,6, 0 , 30,'png');
            $pdf->SetFont('Arial','B',15);
            $pdf->Cell(200,10,'ALCALDIA DE IBAGUE',0,1,'C');
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(200,6,'SECRETARIA DE TRANSITO Y TRANSPORTE DE LA MOVILIDAD',0,1,'C');
            $pdf->SetFont('Arial','B',10);
            $pdf->SetTextColor(2,8,4);
            $pdf->Cell(200,6,'Tarjeta de Control Numero',0,1,'C');
            $pdf->Image('../../vista/imagenes/musical.png' , 170 ,6, 0 , 30,'png');
            $pdf->ln(10);

            //info
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(8);
            $pdf->Cell(15,8,'Fecha: ',0,0,'L');
            $pdf->Cell(30,8,$date,0,1,'L');
            $pdf->SetFont('Arial','B',12);
            $pdf->Cell(0,8,'Historial de vencimiento a los proximos 15 dias ',0,0,'C');
            $pdf->ln(15);

            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(8);
            $pdf->SetFillColor(200,200,200);
            $pdf->Cell(53,8,'Propietario',1,0,'C',true);
            $pdf->Cell(53,8,'Conductor',1,0,'C',true);
            $pdf->Cell(23,8,'Placa',1,0,'C',true);
            $pdf->Cell(23,8,'Vencimiento',1,0,'C',true);
            $pdf->Cell(23,8,'Fecha',1,1,'C',true);
            //datos
            foreach ($datos as $item) {
                $Propietario    = $item['propietario'];
                $Conductor      = $item['conductor'];
                $Placa          = $item['placa'];
                $Vencimiento    = $item['Vencimiento'];
                $Fecha          = $item['Fecha'];

                $pdf->SetFont('Arial','',9);
                $pdf->Cell(8);
                $pdf->Cell(53,8,$Propietario,1,0,'L');
                $pdf->Cell(53,8,$Conductor,1,0,'L');
                $pdf->Cell(23,8,$Placa,1,0,'C');
                $pdf->Cell(23,8,$Vencimiento,1,0,'C');
                $pdf->Cell(23,8,$Fecha,1,1,'C');


            }
            
            $pdf->Output();
            $this->conexion->conectar();
        } 

}