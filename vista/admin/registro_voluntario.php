<?php
 session_start();
 if (!isset($_SESSION['tipo'])) {
     header('Location: ../index.php');
}else{
    if($_SESSION['tipo'] == 'admin'){
        
    }
     else{
    header('Location: ../index.php');
    die();
  }  
}
require_once('../../utilidades/metodosBD.php');
$metodosBD = new MetodosBD();

if(isset($_POST['addVoluntario'])){
  $correo = filter_var(strtolower($_POST['correo']),FILTER_SANITIZE_STRING);
  $password = $_POST['pass1'];
  $password2 = $_POST['pass2'];
  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $tipoDocumento = $_POST['tipoDocumento'];
  $documento = $_POST['documento'];
  $fechaNacimiento = $_POST['fechaNacimiento'];
  $departamento = $_POST['departamento'];
  $ciudad = $_POST['ciudad'];
  $direccion = $_POST['direccion'];
  $celular = $_POST['celular'];
  $ocupacion = $_POST['ocupacion'];
  $estadoCapacitacion = $_POST['estadoCapacitacion'];


    
    $errores = '';
    if (empty($correo) 
    or empty($password) 
    or empty($password2)
    or empty($nombre)
    or empty($apellido)
    or empty($tipoDocumento)
    or empty($fechaNacimiento)
    or empty($departamento)
    or empty($ciudad)
    or empty($direccion)
    or empty($celular)
    or empty($ocupacion)
    or empty($estadoCapacitacion)
    ) {
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

        if ($errores == ''){
          $nuevo=$metodosBD->crearUsuarioVoluntario($correo,$password);
          $usuario=$metodosBD->consultarIdUsuario($correo,$password);
          $idUsuario = (int)$usuario[0]['idUsuario'];
          $aux = $metodosBD->crearVoluntario($idUsuario,$nombre,$apellido,$tipoDocumento,$documento,$fechaNacimiento,$departamento,$ciudad,$direccion,$celular,$ocupacion,$estadoCapacitacion);
        if ($aux) {
            echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Los datos han sido guardados con éxito.</div>';
        }else{
							echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error. No se pudieron guardar los datos</div>';
						}
        }

			}
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Koe</title>
  <link rel="icon" type="image/png" href="../../icons/koe.png">
  <link rel="stylesheet" type="text/css" href="../../css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../../css/estilos.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>

<body>
  <header>
    <nav class="navbar navbar-expand-sm navbar-dark bg-primary">
      <a class="navbar-brand" href="#"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse  justify-content-center" id="collapsibleNavbar">
        <ul class="navbar-nav ">
          <li class="nav-item">
            <a class="nav-link" href="../../index.php"><img src="../../icons/koe.png" alt="Logo" width="30px"></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../conocenos_log.php">Conócenos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../trabaja_con_nosotros_log.php">Trabaja con Nosotros</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../donaciones_log.php">Donaciones</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../../controlador/cerrar.php">Cerrar Sesión</a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <div class="contenedor">
    <div class="container">
      <h4><a style="margin-right: 15px;" href="inicio.php"><img src="../../icons/back-track.png" alt="Ir atrás"></a>Registro de Voluntario</h4>
      
      <hr>
      <form action="" method="post" class="profile-form">
        <div>
          <ul class="profile-info contact-info">
            <li>
              <label for="correo">Correo Electrónico</label>
              <input type="email" name="correo" required>
            </li>
            <li>
              <label for="pass1">Contraseña</label>
              <input type="password" name="pass1" required>
            </li>
            <li>
              <label for="pass2">Confirme la contraseña</label>
              <input type="password" name="pass2" required>
            </li>
            <li>
              <label for="nombre">Nombres</label>
              <input type="text" name="nombre" required>
            </li>
            <li>
              <label for="apellido">Apellidos</label>
              <input type="text" name="apellido" required>
            </li>
            <li>
              <label for="tipoDocumento">Tipo de documento</label>
              <select class="profile-form-option" name="tipoDocumento" id="tipoDocumento" required>
                <option value="Cédula">Cédula</option>
                <option value="Cédula Extranjeria">Cédula Extranjeria</option>
                <option value="Doc.Ident. de Extranjeros">Doc.Ident. de Extranjeros</option>
                <option value="Ident. Fiscal para Ext.">Ident. Fiscal para Ext.</option>
                <option value="NIT Personas Naturales">NIT Personas Naturales</option>
                <option value="NUIP">NUIP</option>
                <option value="Pasaporte">Pasaporte</option>
                <option value="Registro Civil">Registro Civil</option>
                <option value="Tarjeta de Identidad">Tarjeta de Identidad</option>
                <option value="Pasaporte ONU">Pasaporte ONU</option>
                <option value="Permiso especial Permanencia">Permiso especial Permanencia</option>
                <option value="Salvoconducto de Permanencia">Salvoconducto de Permanencia</option>
                <option value="Permiso Especial Formacn PEPFF">Permiso Especial Formacn PEPFF</option>
              </select>
            </li>
            <li>
              <label for="documento">Documento de identidad</label>
              <input type="text" name="documento" required>
            </li>
            <li>
              <label for="fechaNacimiento">Fecha de nacimiento</label>
              <input type="date" name="fechaNacimiento" required>
            </li>
            <li>
              <label for="departamento">Departamento</label>
              <select class="profile-form-option" name="departamento" required>
                <option value="Amazonas">Amazonas</option>
                <option value="Antioquia">Antioquia</option>
                <option value="Arauca">Arauca</option>
                <option value="Atlántico">Atlántico</option>
                <option value="Bogotá">Bogotá</option>
                <option value="Bolívar">Bolívar</option>
                <option value="Boyacá">Boyacá</option>
                <option value="Caldas">Caldas</option>
                <option value="Caquetá">Caquetá</option>
                <option value="Casanare">Casanare</option>
                <option value="Cauca">Cauca</option>
                <option value="Cesar">Cesar</option>
                <option value="Chocó">Chocó</option>
                <option value="Córdoba">Córdoba</option>
                <option value="Cundinamarca">Cundinamarca</option>
                <option value="Guainía">Guainía</option>
                <option value="Guaviare">Guaviare</option>
                <option value="Huila">Huila</option>
                <option value="La Guajira">La Guajira</option>
                <option value="Magdalena">Magdalena</option>
                <option value="Meta">Meta</option>
                <option value="Nariño">Nariño</option>
                <option value="Norte de Santander">Norte de Santander</option>
                <option value="Putumayo">Putumayo</option>
                <option value="Quindío">Quindío</option>
                <option value="Risaralda">Risaralda</option>
                <option value="San Andrés y Providencia">San Andrés y Providencia</option>
                <option value="Santander">Santander</option>
                <option value="Sucre">Sucre</option>
                <option value="Tolima">Tolima</option>
                <option value="Valle del Cauca">Valle del Cauca</option>
                <option value="Vaupés">Vaupés</option>
                <option value="Vichada">Vichada</option>
              </select>
            </li>
            <li>
              <label for="ciudad">Ciudad</label>
              <select class="profile-form-option" name="ciudad" required>
                <option value="Leticia">Leticia</option>
                <option value="Medellín">Medellín</option>
                <option value="Barranquilla">Barranquilla</option>
                <option value="Cartagena">Cartagena</option>
                <option value="Tunja">Tunja</option>
              </select>
            </li>
            <li>
              <label for="direccion">Dirección</label>
              <input type="text" name="direccion" required>
            </li>
            <li>
              <label for="celular">Celular</label>
              <input type="tel" name="celular" required>
            </li>
            <li>
              <label for="ocupacion">Ocupación</label>
              <input type="text" name="ocupacion" required>
            </li>
            
            <li>
              <label for="estadoCapacitacion">Estado de la Capacitación</label>
              <select class="profile-form-option" name="estadoCapacitacion" required>
                <option value="Ok">Ok</option>
                <option selected value="En proceso">En proceso de validación</option>
                <option value="Rechazada">Rechazada</option>
              </select>
            </li>
          </ul>
        </div>
        
        <input class="confirm" name="terminosycondiciones" type="checkbox" required>
        <label for="terminosycondiciones">Acepto los terminos y condiciones de los datos registrados
          en este sitio.</label>
        <div class="profile-form">
          <input type="submit" name="addVoluntario" value="Registrar Voluntario">
        </div>
      </form>
    </div>
  </div>
  <!-- PIE -->
  <footer>
    <div class="footer">
      <nav class="navbar navbar-expand-sm navbar-dark bg-primary justify-content-center">
        <ul class="navbar-nav ">
          <li class="nav-item">
            <a class="nav-link" href="../conocenos_log.php">Conócenos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../trabaja_con_nosotros_log.php">Trabaja con Nosotros</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../donaciones_log.php">Donaciones</a>
          </li>
        </ul>
      </nav>
      <nav class="navbar navbar-expand-sm navbar-dark bg-primary justify-content-center">
        <ul class="navbar-nav ">
          <li class="nav-item">
            <a class="nav-link" href="#"><img src="../../icons/twitter.png" alt="Twitter" width="30px"></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><img src="../../icons/facebook.png" alt="Facebook" width="30px"></a>
          </li>
        </ul>
      </nav>
      <nav class="navbar navbar-expand-sm navbar-dark bg-primary justify-content-center">
        <ul class="navbar-nav ">
          <li class="nav-item">
            <a class="nav-link" href="#">Copyright© 2021</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Privacy Policy</a>
          </li>
        </ul>
      </nav>
    </div>


  </footer>

</body>
</html>