<?php
session_start();

if ($_SESSION) 
{
   
    
} else {
    require('vistas/inicioSinLogueo.vista.php');
}



?>
