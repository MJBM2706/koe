<?php
 session_start();
 if (isset($_SESSION['correo'])) {
     header('Location: ../vista/paciente/inicio.php');
   die();
}
require_once('../utilidades/metodosBD.php');
$metodosBD = new MetodosBD();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //Validamos que los datos hayan sido rellenados
    $correo = filter_var(strtolower($_POST['correo']),FILTER_SANITIZE_STRING);
    $password = $_POST['password'];
    $errores = '';
    if (empty($correo) or empty($password)) {
        echo'<script type="text/javascript">
        alert("Tienes que llenar todos los campos");
        </script>';
        
        $errores = 'Llena todos los campos';
    } else {

        $resultado = $metodosBD->validarCorreo($correo);

        //Si el resultado es diferente de falso significa que ya existe el usuario

        if ($resultado != true) {
            echo'<script type="text/javascript">
            alert("El correo electrónico no está registrado");
            </script>';
            
            $errores = 'Correo no registrado';
        }else{

            $puedeIniciar = $metodosBD->iniciarSesion($correo,$password);
            if ($puedeIniciar!=true){
                echo'<script type="text/javascript">
                alert("La contraseña no es correcta");
                </script>';
                
                $errores = 'La contraseña no es correcta';
            }

        }
        //Ahora vamos a "hashear" la contraseña para protegerla un poco.

        //OJO: La seguridad es un tema muy complejo, aquí solo estamos haciendo un hash a la contraseña, pero esto no asegura por completo la información encriptada.

        //$password = hash('sha512', $password);
        //$password2 = hash('sha512', $password2);

        //Ahora tenemos que comprobar que las contraseñas sean  iguales

       

    }

    if ($errores == '') {
        $idUsuario = $metodosBD->consultarIdUsuario($correo,$password);

           
            $_SESSION['correo'] = $correo;
            $_SESSION['idUsuario'] = $idUsuario;
            $_SESSION['password'] = $password;
            $_SESSION['tipo'] = "paciente";
            header("Location:../vista/paciente/inicio.php");
            //Después de iniciar sesión redirigimos a la página de inicio
        

        
    }

}


require('../vista/inicio_sesion.php');

?>