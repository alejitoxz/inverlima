<?php

$ID = $_POST['id'];
$USUARIO = $_POST['usuario'];
$ROL = $_POST['rol'];

$Datos = $_POST['Datos'];

session_start();
$_SESSION['S_ID']=$ID;
$_SESSION['USUARIO']=$USUARIO;
$_SESSION['ROL']=$ROL;
$_SESSION['Datos']=$Datos;