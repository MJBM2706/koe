<?php
 session_start();
 if (isset($_SESSION['correo'])) {
   if($_SESSION['tipo'] == "paciente"){
    header('Location: ../vista/paciente/inicio.php');
   }else if($_SESSION['tipo'] == "voluntario"){

    header('Location: ../vista/voluntario/inicio.php');

   }else if($_SESSION['tipo'] == "profesional"){

    header('Location: vista/profesional/inicio.php');

   }else{

    header('Location: vista/Admin/inicio.php');

   }
     
   die();
}else{
    header('Location: vista/inicio_sin_logueo.php');
}
?>


