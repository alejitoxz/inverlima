<?php
    require '../../modelo/modelo_home.php';
    

    $MU = new modelo_home();


    $datosVen = $MU->listar_home();
    
    $consulta = $MU->enviarVencimientoA($datosVen['propietario'],$datosVen['placa'],$datosVen['vencimiento'],$datosVen['fecha'],$datosVen['email']); 
    
    if($consulta){
        return 1;
    }else {
        return 0;
    }

