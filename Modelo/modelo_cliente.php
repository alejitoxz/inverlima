<?php
session_start();
    class modelo_cliente{
        private $conexion;
        public $data;

        function __construct(){
            require_once 'modelo_conexion.php';
            $this->conexion = new conexion();
        }

        function listar_cliente(){
            $conn = $this->conexion->conectar();
            $idCompany = $_SESSION['COMPANY'];
            $Rol = $_SESSION['ROL'];
            $idUsuario = $_SESSION['S_ID'];

            $sql  = "SELECT
            cl.id,
            p.nombre,
            p.apellido,
            p.cedula,
            p.telefono,
            p.email,
            p.direccion,
            p.id as idPersona
            FROM
            cliente AS cl
            INNER JOIN persona AS p ON ( cl.idPersona = p.id ) 
            INNER JOIN company AS c ON ( c.id = cl.idCompany ) 
            WHERE
            cl.estatus = 1 AND c.id = $idCompany
            ";
           //echo $sql;
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

        function buscarPersona($valor){
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

        //revisar el tema del alert, no funciona bien
        function registrar_cliente($id,$nombre,$apellido,$cedula,$telefono,$email,$direccion){
            $idCompany = $_SESSION['COMPANY'];
            $idUsuario = $_SESSION['S_ID'];
            $cadena = "";
            if($id){
                $cadena = "
                INSERT INTO cliente(id,idCompany,idUsuario,estatus) 
                VALUES($id,$idCompany,$idUsuario,1)";
            }else{
                
                $cadena = "DECLARE @idPersona int
                INSERT INTO persona(nombre,apellido,cedula,telefono,email,direccion)
                VALUES('$nombre','$apellido','$cedula','$telefono','$email','$direccion')
                SET @idPersona = SCOPE_IDENTITY()
                INSERT INTO cliente(idCompany,idPersona,idUsuario,estatus) 
                VALUES($idCompany,@idPersona,$idUsuario,1)";
            }
            $conn = $this->conexion->conectar();
            $sql  = "BEGIN TRY
                     BEGIN TRAN
                     
                     $cadena
                     
                     COMMIT TRAN
                     END TRY
                     BEGIN CATCH
                     ROLLBACK TRAN
                     END CATCH";
            $resp = sqlsrv_query($conn, $sql);
           
            if( $resp === false) {
                return 0;
            }else{
                return 1;
            }
            
            $this->conexion->conectar();
        }

        function modificar_estatus_cliente($id,$estatus){
            $conn = $this->conexion->conectar();
            $sql  = "UPDATE cliente set estatus= $estatus
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


        function modificar_datos_cliente($id,$nombre,$apellido,$cedula,$telefono,$email,$direccion,$idPersona){
            $conn = $this->conexion->conectar();

            $sql  = "UPDATE persona SET
                    nombre = '$nombre', 
                    apellido = '$apellido',
                    cedula = $cedula,
                    telefono = '$telefono',
                    email = '$email',
                    direccion = '$direccion'
                    WHERE id = $idPersona
                    ";
                   
            $resp = sqlsrv_query($conn, $sql);
            
            if( $resp === false) {
                return 0;
            }else{
                return 1;
            }
            
            $this->conexion->conectar();
        }

    }