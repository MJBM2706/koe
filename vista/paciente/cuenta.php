<?php
session_start();
if (!isset($_SESSION['tipo'])) {
    header('Location: ../../index.php');
    die();
}

include '../../utilidades/metodosBD.php';
$usuario_idUsuario = $_SESSION['idUsuario'];
$metodosBD = new MetodosBD();

if (isset($_POST['enviarDatosPersonales'])){
  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $tipoDocumento = $_POST['tipoDocumento'];
  $documentoIdentidad = $_POST['documento'];
  $fechaNacimiento = $_POST['fechaNacimiento'];
  $resul = $metodosBD->actualizarDatosPersonalesPaciente($usuario_idUsuario, $nombre,$apellido,$tipoDocumento,$documentoIdentidad,$fechaNacimiento);
  
    echo "<script>alert('Datos actualizados correctamente');</script>";
  
}

if (isset($_POST['enviarDatosContacto'])){
  $departamento = $_POST['departamento'];
  $ciudad = $_POST['ciudad'];
  $direccion = $_POST['direccion'];
  $celular = $_POST['celular'];
  $contactoEmergencia = $_POST['contactoEmergencia'];
  $celularEmergencia = $_POST['celularEmergencia'];
  $resultt = $metodosBD->actualizarDatosContactoPaciente($usuario_idUsuario, $departamento,$ciudad,$direccion,$celular,$contactoEmergencia,$celularEmergencia);
  if($resultt != true){
    echo "<script>alert('No se pudieron actualizar los datos');</script>";
  }else {
    echo "<script>alert('Datos actualizados correctamente');</script>";
  }
}


?>
<!DOCTYPE html>
<html lang="en">

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
    <script>
    window.ChatraGroupID = 'bahcTXkE5dTdZmHQE';
  </script>
  <script>
window.ChatraSetup = {
    colors: {
        buttonText: '#f0f0f0', /* color del texto del botón de chat */
        buttonBg: '#120e3c'    /* color de fondo del botón de chat */
    }
};
</script>
  <!-- Chatra {literal} -->
  <script>
      (function(d, w, c) {
          w.ChatraID = 'xPF3JLfW6W3u99nC2';
          var s = d.createElement('script');
          w[c] = w[c] || function() {
              (w[c].q = w[c].q || []).push(arguments);
          };
          s.async = true;
          s.src = 'https://call.chatra.io/chatra.js';
          if (d.head) d.head.appendChild(s);
      })(document, window, 'Chatra');
  </script>
  <!-- /Chatra {/literal} -->
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
  <div class="row container">
  <section class="sidebar navbar-dark">
      <ul class="navbar-nav" >
        <li class='nav-item  option'>
          <a class=' nav-link' href="inicio.php">
            <img class="icon" src="../../icons/house.png" alt="" srcset="">
            <p >Inicio</p>
          </a>
        </li>
        <li class='option'>
          <a class='active  nav-link' href="#">
            <img class="icon" src="../../icons/user.png" alt="" srcset="">
            <p>Mi Cuenta</p>
          </a>
        </li>
        <li class='option'>
          <a class='nav-link' href="historia.php">
            <img class="icon" src="../../icons/medical_record.png" alt="" srcset="">
            <p>Historial Clinico</p>
          </a>
        </li>
        <li class='option'>
          <a class='nav-link' href="citas.php">
            <img class="icon" src="../../icons/appointment.png" alt="" srcset="">
            <p>Agendar Cita</p>
          </a>
        </li>
      </ul>
    </section>
        <aside class=" content">
            <h5 >Datos Personales</h5>
            <hr>
            <form action="" method="post" class="profile-form">
            <?php
            $resultado = $metodosBD->consultarPaciente($usuario_idUsuario);
            if(mysqli_num_rows($resultado) > 0){
              while ($row = mysqli_fetch_assoc($resultado)){
            ?>
                  <div>
                    <ul class="profile-info contact-info">
                        <li>
                            <p>Nombre</p>
                            <input type="text" name="nombre" placeholder="Tu nombre" value="<?php echo $row['nombre'] ?>" required>
                        </li>
                        <li>
                            <p>Apellidos</p>
                            <input type="text" name="apellido" placeholder="Tus Apellidos" value="<?php echo $row['apellido'] ?>" required>
                        </li>
                        <li>
                            <p>Tipo de documento</p>
 
                            <select class="profile-form-option" name="tipoDocumento" id="tipoDocumento"  required>
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
                            <p>Documento de Identidad</p>
                            <input type="text" name="documento" placeholder="Tu documento de identidad" value="<?php echo $row['documentoIdentidad'] ?>" required>
                        </li>
                        <li>
                            <p>Fecha de Nacimiento</p>
                            <input type="date" name="fechaNacimiento" value="<?php echo $row['fechaNacimiento'] ?>" required> 
                        </li>
                        <li>
                            <p>Email</p>
                            <input type="email" name="correo" value="<?php echo $_SESSION['correo'] ?>" disabled required > 
                        </li>
                    </ul>
                  </div>
                  <?php
                  }}
                  ?>
                <input class="confirm" type="checkbox" required><span>Acepto los terminos y condiciones de los datos registrados en este sitio. </span>

                <div class="profile-form"> 
                  
                  <input width="100%" type="submit" name="enviarDatosPersonales" value="Actualizar">
                </div>
   
            </form>
           
            <h5>Datos de Contacto</h5>
            <hr>

            <form action="" method="post" class="profile-form" >
            <?php
            $resultado = $metodosBD->consultarPaciente($usuario_idUsuario);
            if(mysqli_num_rows($resultado) > 0){
              while ($row = mysqli_fetch_assoc($resultado)){
            ?>
                <div>
                    <ul class="profile-info contact-info">
                        <li>
                            <p>Departamento</p>
                            <select class="profile-form-option" name="departamento" id=""  required>
                              <option value="<?php echo $row['departamento'] ?>"><?php echo $row['departamento'] ?></option>
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
                            <p>Ciudad</p>
                            <select class="profile-form-option" name="ciudad" id="" value="<?php echo $row['ciudad'] ?>" required>
                            <option value="<?php echo $row['ciudad'] ?>"><?php echo $row['ciudad'] ?>
                                <option value="Leticia">Leticia</option>
                                <option value="Medellín">Medellín</option>
                                <option value="Barranquilla">Barranquilla</option>
                                <option value="Cartagena">Cartagena</option>
                                <option value="Tunja">Tunja</option>
                            </select>
                        </li>
                        <li>
                            <p>Direccion</p>
                            <input type="text" name="direccion" placeholder="Tu Direccion" value="<?php echo $row['direccion'] ?>" required>
                        </li>
                        <li>
                            <p>Celular</p>
                            <input type="tel" name="celular" placeholder="Tu Celular" value="<?php echo $row['celular'] ?>" required>
                        </li>
                        <li>
                            <p>Nombre del contacto de Emergencia</p>
                            <input type="tel" name="contactoEmergencia" placeholder="Nombre del contacto" value="<?php echo $row['contactoEmergencia'] ?>" required>
                        </li>
                        <li>
                            <p>Celular del contacto de Emergencia</p>
                            <input type="tel" name="celularEmergencia" placeholder="Celular del contacto" value="<?php echo $row['celularEmergencia'] ?>" required>
                        </li>
                    </ul>
                </div>
                <?php
                  }}
                  ?>
                <input class="confirm" type="checkbox" required><span>Acepto los terminos y condiciones de los datos registrados en este sitio.</span>
                <div class="profile-form">
                  <input type="submit" name="enviarDatosContacto" value="Actualizar">
                </div>
            </form>
        </aside>
    </div>


  </div>

    

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