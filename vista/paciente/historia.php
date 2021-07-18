
<?php
 session_start();
 if (!isset($_SESSION['tipo'])) {
     header('Location: ../index.php');
}else{
    if($_SESSION['tipo'] == 'paciente'){
        
    }
     else{
    header('Location: ../../index.php');
    die();
  }  
}
require_once('../../utilidades/metodosBD.php');
$metodosBD = new MetodosBD();
$idPaciente = $_SESSION['idUsuario'];
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
        <h2 class="text-center">Antecedentes Historia</h2>
        <?php
          $antecedentes = $metodosBD->consultarAntecedentesHistoria($idPaciente);
          if(mysqli_num_rows($antecedentes) > 0){
            while ($entrada = mysqli_fetch_assoc($antecedentes)){?>            
              <div class="card mb-5">
                <div class="card-body">
                  <p class="card-text"><strong>Antecedentes Familiares: </strong><?php echo $entrada['antecedentes_fam'] ?></p>
                  <p class="card-text"><strong>Antecedentes Familiares Patológicos: </strong><?php echo $entrada['antecedentes_fam_pat'] ?></p>
                  <p class="card-text"><strong>Antecedentes Familiares NO Patológicos: </strong><?php echo $entrada['antecedentes_fam_no_pat'] ?></p>
                  <p class="card-text"><strong>Historial Prenatal: </strong><?php echo $entrada['historial_prenatal'] ?></p>
                  <p class="card-text"><strong>Niñez Temprana: </strong><?php echo $entrada['niñez_temprana'] ?></p>
                  <p class="card-text"><strong>Niñez Media: </strong><?php echo $entrada['niñez_media'] ?></p>
                  <p class="card-text"><strong>Adolescencia: </strong><?php echo $entrada['adolescencia'] ?></p>
                  <p class="card-text"><strong>Vida Adulta: </strong><?php echo $entrada['vida_adulta'] ?></p>
                </div>
              </div>
              <?php
            }
          }else{?>
              <div class="card">
                <h5 class="mt-2 text-center">Sus antecedentes aún no han sido ingresados...</h5>
              </div>
            <?php
            }?>
        <h2 class="text-center">Historia Clínica</h2>
        <?php
          $entradas = $metodosBD->consultarHistoria($idPaciente);
          if(mysqli_num_rows($entradas) > 0){
            while ($entrada = mysqli_fetch_assoc($entradas)){
              if($entrada['tipoProfesional_Voluntario'] == 'profesional'){
                $profesionales_voluntarios = $metodosBD->consultarProfesional($entrada['profesional_voluntario_IdUsuario']);
              }else{
                $profesionales_voluntarios = $metodosBD->consultarVoluntario($entrada['profesional_voluntario_IdUsuario']);
              }  
              while ($profesional_voluntario = mysqli_fetch_assoc($profesionales_voluntarios)){?> 
                <div class="card mb-5">
                  <div class="row" >
                    <div class="col-4 card-header text-center offset-2">
                      <h5 class=""><?php echo $entrada['fecha'] ?></h5>
                    </div>
                    <div class="col-4 card-header text-center">
                      <h5 class=""><strong ><?php echo ucwords($entrada['tipoProfesional_Voluntario'].": ")?></strong><?php echo $profesional_voluntario['nombre']." ". $profesional_voluntario['apellido']?></h5>
                    </div>
                  </div>
                  <div class="card-body">
                    <p class="card-text"><strong>Fuente de Información: </strong><?php echo $entrada['fuenteInformacion'] ?></p>
                    <p class="card-text"><strong>Motivo de consulta: </strong><?php echo $entrada['motivoConsulta'] ?></p>
                    <p class="card-text"><strong>Historia de la enfermedad actual: </strong><?php echo $entrada['historiaEnfermedadActual'] ?></p>
                    <?php
                    if($entrada['tipoProfesional_Voluntario'] == 'profesional'){
                    ?>
                    <p class="card-text"><strong>Examen Mental: </strong><?php echo $entrada['examenMental'] ?></p>
                    <p class="card-text"><strong>Diagnóstico: </strong><?php echo $entrada['diagnostico'] ?></p>
                    <p class="card-text"><strong>Formulación dinámica: </strong><?php echo $entrada['formulacionDinamica'] ?></p>
                    <p class="card-text"><strong>Pronóstico: </strong><?php echo $entrada['pronostico'] ?></p>
                    <p class="card-text"><strong>Tratamiento: </strong><?php echo $entrada['tratamiento'] ?></p>
                    <?php  
                  }
                    ?>
                  
                  </div>
                </div>
                <?php    
              }
            }
            }else {?>
              <div class="card">
                <h5 class="mt-2 text-center">Aún no hay historias para mostrar...</h5>
              </div>
            <?php
            }?>
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