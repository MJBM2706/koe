<?php
session_start();
if (!isset($_SESSION['tipo'])) {
    header('Location: ../../index.php');
    die();
}else{
  if($_SESSION['tipo'] == 'profesional'){
    include '../../utilidades/metodosBD.php';
    $usuario_idUsuario = $_SESSION['idUsuario'];
    $metodosBD = new MetodosBD();
    $resultado = $metodosBD->consultarProfesional($usuario_idUsuario);
    if(mysqli_num_rows($resultado) > 0){
      while ($row = mysqli_fetch_assoc($resultado)){
        $userName = $row['nombre'];
        $estado = $row['estado'];
      }
    }
    if(!$estado){
      header('Location: ../../index.php');
      echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Usted se encuentra deshabilitado</div>';
    }

  }else{
    header('Location: ../../index.php');
    die();
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
            <a class="nav-link" href="../conocenos_log.php">Con??cenos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../trabaja_con_nosotros_log.php">Trabaja con Nosotros</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../donaciones_log.php">Donaciones</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../../controlador/cerrar.php">Cerrar Sesi??n</a>
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
            <a class='nav-link' href="agenda.php">
              <img class="icon" src="../../icons/appointment.png" alt="" srcset="">
              <p>Mi agenda</p>
            </a>
          </li>
        </ul>
      </section>
      <aside class="content"> 
        <!-- FILTRO PACIENTE-->
            <form id="form" class="form-inline" method="get">
              <div class="form-group">
              <input name="key" class="form-control" type="text" >
              <div class="btn" onclick="form.submit()"><img src="../../icons/magnifying-glass.png" alt="Buscar" width="20px"></div>
            </div>
            </form>
          <?php
        if (isset($_GET['key'])){
        $busqueda = $_GET['key'];
        if ($busqueda == ''){
          $resultado = $metodosBD->listarPacientes();
        }else{
          $resultado = $metodosBD->buscarPaciente($busqueda);
        }
    
          ?>
          <table>
        <thead>
        <tr>
          <th>N?? Documento</th>
          <th>Nombre</th>
          <th  style="text-align:center;" >Nueva Historia</th>

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
                      <td><a style="color: #120e3c; font-weight: 500;" href="historiaPaciente.php?id='.$row['usuario_idUsuario'].'">'.$row['nombre'].' '.$row['apellido'].'</a></td>
                      <td style="text-align:center;" ><a href="nuevaHistoria.php?id='.$row['usuario_idUsuario'].'"><img src="../../icons/boton-circular-plus(1).png" width="20px"></a></td>
                    </tr>
                    
                    ';
                  }
                }
        ?>        
        </tbody>
        </table>
      

        <?php
      
   
        }
        ?>
        <!-- END FILTRO PACIENTE -->
      </aside>
    </div>
  </div>
  <
 <footer>
    <div class="footer">
      <nav class="navbar navbar-expand-sm navbar-dark bg-primary justify-content-center">
        <ul class="navbar-nav ">
          <li class="nav-item">
            <a class="nav-link" href="../conocenos_log.php">Con??cenos</a>
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
            <a class="nav-link" href="#">Copyright?? 2021</a>
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