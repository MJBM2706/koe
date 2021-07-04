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

if(isset($_GET['id'])){
  $idUsuario = $_GET['id'];


}else{
  header('Location: ../error.php');
}


if(isset($_POST['updateProfesional'])){
  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $tipoDocumento = $_POST['tipoDocumento'];
  $documento = $_POST['documento'];
  $fechaNacimiento = $_POST['fechaNacimiento'];
  $departamento = $_POST['departamento'];
  $ciudad = $_POST['ciudad'];
  $direccion = $_POST['direccion'];
  $celular = $_POST['celular'];
  $tituloProfesional = $_POST['tituloProfesional'];
  $tarjetaProfesional = $_POST['tarjetaProfesional'];
  $estadoTarjeta = $_POST['estadoTarjeta'];

  $errores = '';
  if (empty($nombre)
    or empty($apellido)
    or empty($tipoDocumento)
    or empty($documento)
    or empty($fechaNacimiento)
    or empty($departamento)
    or empty($ciudad)
    or empty($direccion)
    or empty($celular)
    or empty($tituloProfesional)
    or empty($tarjetaProfesional)
    or empty($estadoTarjeta)
    ) {
        echo'<script type="text/javascript">
        alert("Tienes que llenar todos los campos");
        </script>';
        
        $errores = 'Llena todos los campos';
    } else {

        if ($errores == ''){
          $actualizar=$metodosBD->actualizarProfesional($idUsuario,$nombre,$apellido,$tipoDocumento,$documento,$fechaNacimiento,$departamento,$ciudad,$direccion,$celular,$tituloProfesional,$tarjetaProfesional,$estadoTarjeta);
        if ($actualizar) {
            echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Los datos han sido actualizados con éxito.</div>';
        }else{
							echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error. No se pudieron actualizar los datos</div>';
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
      <h4><a style="margin-right: 15px;" href="inicio.php"><img src="../../icons/back-track.png" alt="Ir atrás"></a>Detalle Profesional</h4>
      <hr>
      <form action="" method="post" class="profile-form">
        <?php
          $resultado = $metodosBD->consultarUsuario($idUsuario);
            if(mysqli_num_rows($resultado) > 0){
              while ($row = mysqli_fetch_assoc($resultado)){
              ?>  
              <div>
                <ul class="profile-info contact-info">
                  <li>
                    <label for="correo">Correo Electrónico</label>
                    <input type="email" name="correo" value="<?php echo $row['correo'] ?>" disabled required>
                  </li>
              <?php
              }
            } 
            $resultado = $metodosBD->consultarProfesional($idUsuario);
            if(mysqli_num_rows($resultado) > 0){
              while ($row = mysqli_fetch_assoc($resultado)){
            ?>
            <li>
              <label for="nombre">Nombres</label>
              <input type="text" name="nombre" value="<?php echo $row['nombre'] ?>" required>
            </li>
            <li>
              <label for="apellido">Apellidos</label>
              <input type="text" name="apellido" value="<?php echo $row['apellido'] ?>" required>
            </li>
            <li>
              <label for="tipoDocumento">Tipo de documento</label>
              <select class="profile-form-option" name="tipoDocumento" id="tipoDocumento" required>
                <option value="<?php echo $row['tipoDocumento'] ?>"><?php echo $row['tipoDocumento'] ?>
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
              <input type="text" name="documento" value="<?php echo $row['documentoIdentidad'] ?>" required>
            </li>
            <li>
              <label for="fechaNacimiento">Fecha de nacimiento</label>
              <input type="date" name="fechaNacimiento" value="<?php echo $row['fechaNacimiento'] ?>" required>
            </li>
            <li>
              <label for="departamento">Departamento</label>
              <select class="profile-form-option" name="departamento" required>
                <option value="<?php echo $row['departamento'] ?>"><?php echo $row['departamento'] ?>
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
              <select class="profile-form-option" name="ciudad" id="" required>
                <option value="<?php echo $row['ciudad'] ?>"><?php echo $row['ciudad'] ?>
                <option value="Leticia">Leticia</option>
                <option value="Medellín">Medellín</option>
                <option value="Barranquilla">Barranquilla</option>
                <option value="Cartagena">Cartagena</option>
                <option value="Tunja">Tunja</option>
              </select>
            </li>
            <li>
              <label for="direccion">Dirección</label>
              <input type="text" name="direccion" value="<?php echo $row['direccion'] ?>" required>
            </li>
            <li>
              <label for="celular">Celular</label>
              <input type="tel" name="celular" value="<?php echo $row['celular'] ?>" required>
            </li>
            <li>
              <label for="tituloProfesional">Título Profesional</label>
              <input type="text" name="tituloProfesional" value="<?php echo $row['tituloProfesional'] ?>" required>
            </li>
            <li>
              <label for="tarjetaProfesional">Tarjeta Profesional</label>
              <input type="text" name="tarjetaProfesional" value="<?php echo $row['tarjetaProfesional'] ?>" required>
            </li>
            <li>
              <label for="estadoTarjeta">Estado de la tarjeta</label>
              <select class="profile-form-option" name="estadoTarjeta" id="" required>
                <option value="<?php echo $row['estadoTarjeta'] ?>"><?php echo $row['estadoTarjeta'] ?>
                <option value="Ok">Ok</option>
                <option selected value="En proceso">En proceso</option>
                <option value="Rechazada">Rechazada</option>
              </select>
            </li>
          </ul>
        </div>
        <?php
        }}
        ?>
        <input class="confirm" name="terminosycondiciones" type="checkbox" required>
        <label for="terminosycondiciones">Acepto los terminos y condiciones de los datos registrados
          en este sitio.</label>
        <div class="profile-form">
          <input type="submit" name="updateProfesional" value="Actualizar Profesional">
          
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