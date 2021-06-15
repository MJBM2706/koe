<?php
// session_start();
// if (isset($_SESSION['usuario'])) {
//     header('Location: index.php');
//     die();
// }
require_once('utilidades/metodosBD.php');
$metodosBD = new MetodosBD();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //Validamos que los datos hayan sido rellenados
    $usuario = filter_var(strtolower($_POST['usuario']),FILTER_SANITIZE_STRING);
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    $errores = '';
    if (empty($usuario) or empty($password) or empty($password2)) {

        $errores = '<li>Por favor rellena todos lo campos correctamente</li>';
    } else {

        try {
            $conexion = new PDO('mysql:host=localhost;dbname=curso_login', 'root','');
            
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        $statement = $conexion->prepare('SELECT * FROM usuarios WHERE usuario = :usuario LIMIT 1');
        $statement->execute(array(':usuario' => $usuario));

        //El método fetch nos va a traer true si el usuario ya existe o false sino existe.

        $resultado = $statement->fetch();

        //Si el resultado es diferente de falso significa que ya existe el usuario

        if ($resultado != false) {

            $errores = '<li>El nombre de usuario ya existe</li>';
        }

        //Ahora vamos a "hashear" la contraseña para protegerla un poco.

        //OJO: La seguridad es un tema muy complejo, aquí solo estamos haciendo un hash a la contraseña, pero esto no asegura por completo la información encriptada.

        //$password = hash('sha512', $password);
        //$password2 = hash('sha512', $password2);

        //Ahora tenemos que comprobar que las contraseñas sean  iguales

        if ($password != $password2) {
            $errores = '<li>Las contraseñas no son iguales.</li>';
        }

    }

    if ($errores == '') {

        $nuevo=$metodosBD->crearUsuario('Luis','123');
        $usuario=$metodosBD->consultarIdUsuario('Luis','123');
        $idUsuario = (int)$usuario[0]['idUsuario'];
        $aux = $metodosBD->crearPaciente($idUsuario);
        if ($aux) {
            header("Location: vista/inicio_sesion.php");
    
        }
    //Después de registrar al usuario redirigimos para que inicie sesión.
        require_once('../vista/registro.php');

        
    }

}


    

?>
