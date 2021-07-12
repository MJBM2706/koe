<?php
session_start();
if (!isset($_SESSION['tipo'])) {
    header('Location: ../../index.php');
    die();
}

include '../../utilidades/metodosBD.php';
$usuario_idUsuario = $_SESSION['idUsuario'];
$metodosBD = new MetodosBD();



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
          <a class='  nav-link' href="inicio.php">
            <img class="icon" src="../../icons/house.png" alt="" srcset="">
            <p >Inicio</p>
          </a>
        </li>
        <li class='option'>
          <a class='nav-link' href="cuenta.php">
            <img class="icon" src="../../icons/user.png" alt="" srcset="">
            <p>Mi Cuenta</p>
          </a>
        </li>
        <li class='option'>
          <a class='active nav-link' href="#">
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
    <aside class="content">
      <!-- FILTRO PACIENTE-->
            <form class="form-inline" method="get">
              <div class="form-group">
              <input name="key" class="form-control" type="text" >
              <div class="btn" onclick="form.submit()"><img src="../../icons/magnifying-glass.png" alt="Buscar" width="20px"></div>
            </div>
            </form>
<?php
  if (isset($_GET['key'])){
    $busqueda = $_GET['key'];
    $resultado = $metodosBD->buscarPaciente($busqueda);
    ?>
    <table>
      <thead>
        <tr>
          <th>N° Documento</th>
          <th>Nombre</th>
        </tr>
      </thead>
      <tbody>
        <?php
          if(mysqli_num_rows($resultado) == 0){
					        echo '<tr><td colspan="9">No hay coincidencias.</td></tr>';
                }else{
                  while ($row = mysqli_fetch_assoc($resultado)){
                  echo '
                    <tr>
                      <td>'.$row['documentoIdentidad'].'</td>
                       <td><a style="color: #120e3c; font-weight: 700;" href="historiaPaciente.php?id='.$row['usuario_idUsuario'].'">'.$row['nombre'].' '.$row['apellido'].'</a></td>
                      
                    </tr>
                    ';
        ?>        
      </tbody>
      </table>

      <?php
      }
   }
  }
?>
            <!-- END FILTRO PACIENTE -->


     <table  border="1" width="800">
      <thead>
      <tr>
        <th style="text-align: center;">HISTORIA CLÍNICA</th>
      </tr>
      </thead>
      <tbody>
        <tr>
          <td><strong>Antecendentes Familiares</strong></td>
        </tr>
        <tr>
          <td>$DATOS</td>
        </tr>
        <tr>
          <td><strong>Antecendentes Personales (Patologicos)</strong></td>
        </tr>
        <tr>
          <td>$DATOS</td>
        </tr>
        <tr>
          <td><strong>Antecendentes Personales (No Patologicos)</strong></td>
        </tr>
        <tr>
          <td>$DATOS</td>
        </tr>
        <tr>
              <td><strong>Historial Prenatal</strong></td>
          </tr>
          <tr>
          <td>$DATOS</td>
        </tr>
          <tr>
              <td><strong>Niñez Temprana</strong></td>
          </tr>
          <tr>
          <td>$DATOS</td>
        </tr>
          <tr>
              <td><strong> Niñez Media</strong></td>
          </tr>
          <tr>
          <td>$DATOS</td>
        </tr>
        <tr>
          <td><strong> Adolescencia</strong></td>
        </tr>
        <tr>
          <td>$DATOS</td>
        </tr>
        <tr>
              <td><strong> Vida adulta</strong></td>
        </tr>
        <tr>
          <td>$DATOS</td>
        </tr>
    </table>
    <br>
    <table  border="1" width="800">
        <tr>
            <td style="width: 50%;"><strong> Fecha</strong></td>
            <td style="width: 50%;"><strong> Profesional</strong></td> 
        </tr>
         <tr>
        <td>$DATOS </td>
        <td>$DATOS</td>
        </tr>
        <tr>
            <td colspan="2"><strong> Fuente de informacion</strong></td>
        </tr>
        <tr>
        <td colspan="2">$DATOS</td>
        </tr>
        <tr>
            <td colspan="2"><strong> Motivo de consulta</strong></td>
        </tr>
        <tr>
        <td colspan="2">$DATOS</td>
        </tr>
        <tr>
            <td colspan="2"><strong> Historia de la enfermedad actual</strong></td>
        </tr>
        <tr>
        <td colspan="2">$DATOS</td>
        </tr>
        <tr>
            <td colspan="2"><strong> Examen del estado mental</strong></td>
        </tr>
        <tr>
        <td colspan="2">$DATOS</td>
        </tr>
        <tr>
            <td colspan="2"><strong> Examen fisico</strong></td>
        </tr>
        <tr>
        <td colspan="2">$DATOS</td>
        </tr>
        <tr>
            <td colspan="2"><strong>Diagnostico</strong> </td>
        </tr>
         <tr>
        <td colspan="2">$DATOS</td>
        </tr>
        <tr>
            <td colspan="2"><strong> Formulación dinamica</strong></td>
        </tr>
         <tr>
        <td colspan="2">$DATOS</td>
        </tr>
        <tr>
            <td colspan="2"><strong> Prognostico</strong></td>
        </tr>
         <tr>
        <td colspan="2">$DATOS</td>
        </tr>
        <tr>
            <td colspan="2"><strong> Tratamiento</strong></td>
        </tr>
         <tr>
        <td colspan="2">$DATOS</td>
        </tr>
    </tbody>
    </table>
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