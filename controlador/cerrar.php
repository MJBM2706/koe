<?php session_start();
session_destroy();
echo'<script type="text/javascript">
                alert("La sesión se ha cerrado correctamente");
                </script>';
header('Location: ../vista/inicio_sin_logueo.php');
die();
?>