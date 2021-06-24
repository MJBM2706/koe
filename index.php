<?php
session_start();

if (isset($_SESSION['tipo'])) {
    switch ($_SESSION['tipo']) {
        case 'paciente':
            header('Location: vista/paciente/inicio.php');
            break;
        case 'voluntario':
            header('Location: vista/voluntario/inicio.php');
            break;
        case 'profesional':
            header('Location: vista/profesional/inicio.php');
            break;
        case 'admin':
            header('Location: vista/admin/inicio.php');
            break;
    }
    die();
}else {

    header('Location: vista/inicio_sin_logueo.php');
    die();
}

?>