<?php
// session_start();
// if (isset($_SESSION['usuario'])) {
//     header('Location: index.php');
//     die();
// }
require_once('../utilidades/metodosBD.php');
$metodosBD = new MetodosBD();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //Validamos que los datos hayan sido rellenados
    $correo = filter_var(strtolower($_POST['correo']),FILTER_SANITIZE_STRING);
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    $errores = '';
    if (empty($correo) or empty($password) or empty($password2)) {
        echo'<script type="text/javascript">
        alert("Tienes que llenar todos los campos");
        </script>';
        
        $errores = 'Llena todos los campos';
    } else {

        $resultado = $metodosBD->validarCorreo($correo);

        //Si el resultado es diferente de falso significa que ya existe el usuario

        if ($resultado != false) {
            echo'<script type="text/javascript">
            alert("El correo electrónico ya está registrado");
            </script>';
            
            $errores = 'Correo ya registrado';
        }

        //Ahora vamos a "hashear" la contraseña para protegerla un poco.

        //OJO: La seguridad es un tema muy complejo, aquí solo estamos haciendo un hash a la contraseña, pero esto no asegura por completo la información encriptada.

        //$password = hash('sha512', $password);
        //$password2 = hash('sha512', $password2);

        //Ahora tenemos que comprobar que las contraseñas sean  iguales

        if ($password != $password2) {
            echo'<script type="text/javascript">
            alert("Las contraseñas no son iguales");
            </script>';
            
            $errores = 'Las contraseñas no son iguales';
        }

    }

    if ($errores == '') {

        $nuevo=$metodosBD->crearUsuario($correo,$password);
        $usuario=$metodosBD->consultarIdUsuario($correo,$password);
        $idUsuario = (int)$usuario[0]['idUsuario'];
        $aux = $metodosBD->crearPaciente($idUsuario);
        if ($aux) {
            header("Location:../vista/inicio_sesion.php");
    
        }
            //Después de registrar al usuario redirigimos para que inicie sesión.
        

        
    }

}


require_once('../vista/registro.php');

?>
