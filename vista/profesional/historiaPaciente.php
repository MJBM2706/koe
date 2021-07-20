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
if(isset($_GET['id'])){
  $idPaciente = $_GET['id'];

}else{
  header('Location: ../error.php');
}


if(isset($_POST['updateAntecedentesHistoria'])){

  $errores = '';
  $antecedentesFam = $_POST['antecedentes_fam'];
  $antecedentesFamPat = $_POST['antecedentes_fam_pat'];
  $antecedentesFamNoPat = $_POST['antecedentes_fam_no_pat'];
  $historialPrenatal = $_POST['historial_prenatal'];
  $niñezTemprana = $_POST['niñez_temprana'];
  $niñezMedia = $_POST['niñez_media'];
  $adolescencia = $_POST['adolescencia'];
  $vidaAdulta = $_POST['vida_adulta'];

  if (empty($antecedentesFam) or empty($antecedentesFamPat) or empty($antecedentesFamNoPat) or empty($historialPrenatal) or empty($niñezTemprana) or empty($niñezMedia) or empty($adolescencia) or empty($vidaAdulta)  ) {
        echo'<script type="text/javascript">
        alert("Tienes que llenar todos los campos");
        </script>';
        
        $errores = 'Llena todos los campos';
    } else {

        if ($errores == '' ){
          $actualizar=$metodosBD->actualizarAntecedentesHistoria($idPaciente,$antecedentesFam,$antecedentesFamPat,$antecedentesFamNoPat,$historialPrenatal,$niñezTemprana,$niñezMedia,$adolescencia,$vidaAdulta);
        if ($actualizar) {
            echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Los datos han sido actualizados con éxito.</div>';
        }else{
							echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error. No se pudieron actualizar los datos</div>';
						}
        }

			}
}

if(isset($_POST['NuevoAntecedentes'])){

  $errores = '';
  $antecedentesFam = $_POST['antecedentes_fam'];
  $antecedentesFamPat = $_POST['antecedentes_fam_pat'];
  $antecedentesFamNoPat = $_POST['antecedentes_fam_no_pat'];
  $historialPrenatal = $_POST['historial_prenatal'];
  $niñezTemprana = $_POST['niñez_temprana'];
  $niñezMedia = $_POST['niñez_media'];
  $adolescencia = $_POST['adolescencia'];
  $vidaAdulta = $_POST['vida_adulta'];


  if (empty($antecedentesFam) or empty($antecedentesFamPat) or empty($antecedentesFamNoPat) or empty($historialPrenatal) or empty($niñezTemprana) or empty($niñezMedia) or empty($adolescencia) or empty($vidaAdulta)) {
        
    echo'<script type="text/javascript">
    alert("Tienes que llenar todos los campos");
    </script>';
        
    $errores = 'Llena todos los campos';

    } else {

        if ($errores == ''){
          $crear=$metodosBD->CrearAntecedentesHistoria($idPaciente,$antecedentesFam,$antecedentesFamPat,$antecedentesFamNoPat,$historialPrenatal,$niñezTemprana,$niñezMedia,$adolescencia,$vidaAdulta);
        if ($crear) {
            echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Antecedentes creados con éxito.</div>';
        }else{
							echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error. No se pudieron crear los antecedentes</div>';
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
      <h4><a style="margin-right: 15px;" href="historia.php"><img src="../../icons/back-track.png" alt="Ir atrás"></a>Detalle Historia Paciente</h4>
      
      <hr>
      <h2 class="text-center mb-3" >Antecedentes de la historia</h2>
      <form action="" method="post" class="profile-form">
        <?php
          $resultado = $metodosBD->consultarAntecedentesHistoria($idPaciente);
            if(mysqli_num_rows($resultado) > 0){
              while ($row = mysqli_fetch_assoc($resultado)){
              ?>  
              <div>
                <ul class="profile-info contact-info">
                  <li style="width: 100%;">
                    <label for="antecedentes_fam">Antecedentes Familiares</label>
                    <textarea name="antecedentes_fam"><?php echo $row['antecedentes_fam']?></textarea>
                    
                  </li>
                   <li style="width: 100%;">
                    <label for="antecedentes_fam_pat">Antecedentes Familiares Patologicos</label>
                    <textarea name="antecedentes_fam_pat"><?php echo $row['antecedentes_fam_pat'] ?></textarea>
                  </li>
                  <li style="width: 100%;">
                    <label for="antecedentes_fam_no_pat">Antecedentes Familiares No Patologicos</label>
                    <textarea name="antecedentes_fam_no_pat"><?php echo $row['antecedentes_fam_no_pat'] ?></textarea>
                  </li>
                  <li style="width: 100%;">
                    <label for="historial_prenatal">Historia Prenatal</label>
                    <textarea name="historial_prenatal"><?php echo $row['historial_prenatal'] ?></textarea>
                  </li>
                  <li style="width: 100%;">
                    <label for="niñez_temprana">Niñez Temprana</label>
                    <textarea name="niñez_temprana"><?php echo $row['niñez_temprana'] ?></textarea>
                  </li>
                  <li style="width: 100%;">
                    <label for="niñez_media">Niñez Media</label>
                    <textarea name="niñez_media"><?php echo $row['niñez_media'] ?></textarea>
                  </li>
                  <li style="width: 100%;">
                    <label for="adolescencia">Adolescencia</label>
                    <textarea name="adolescencia"><?php echo $row['adolescencia'] ?></textarea>
                  </li>
                  <li style="width: 100%;">
                    <label for="vida_adulta">Vida Adulta</label>
                    <textarea name="vida_adulta"><?php echo $row['vida_adulta'] ?></textarea>
                  </li>
                </ul>
              </div>
              <div class="profile-form">
                <input type="submit" name="updateAntecedentesHistoria" value="Actualizar Antecedentes">
              </div>
              <?php
              }
            }
            else
            {
            ?>
            <div>
                <ul class="profile-info contact-info">
                  <li style="width: 100%;">
                    <label for="antecedentes_fam">Antecedentes Familiares</label>
                    <textarea name="antecedentes_fam" id="" cols="30" rows="2"></textarea>
                  </li>
                  <li style="width: 100%;">
                    <label for="antecedentes_fam_pat">Antecedentes Familiares Patologicos</label>
                    <textarea name="antecedentes_fam_pat" id="" cols="30" rows="2"></textarea>
                  </li>
                  <li style="width: 100%;">
                    <label for="antecedentes_fam_no_pat">Antecedentes Familiares No Patologicos</label>
                    <textarea name="antecedentes_fam_no_pat" id="" cols="30" rows="2"></textarea>
                  </li>
                  <li style="width: 100%;">
                    <label for="historial_prenatal">Historia Prenatal</label>
                    <textarea name="historial_prenatal" id="" cols="30" rows="2"></textarea>
                  </li>
                  <li style="width: 100%;">
                    <label for="niñez_temprana">Niñez Temprana</label>
                    <textarea name="niñez_temprana" id="" cols="30" rows="2"></textarea>
                  </li>
                  <li style="width: 100%;">
                    <label for="niñez_media">Niñez Media</label>
                    <textarea name="niñez_media" id="" cols="30" rows="2"></textarea>
                  </li>
                  <li style="width: 100%;">
                    <label for="adolescencia">Adolecencia</label>
                    <textarea name="adolescencia" id="" cols="30" rows="2"></textarea>
                  </li>
                  <li style="width: 100%;">
                    <label for="vida_adulta">Vida Adulta</label>
                    <textarea name="vida_adulta" id="" cols="30" rows="2"></textarea>
                  </li>
                </ul>
              </div>
              <input class="confirm" name="terminosycondiciones" type="checkbox" required>
              <label for="terminosycondiciones">Acepto los terminos y condiciones de los datos registrados
              en este sitio.</label>
              <div class="profile-form">
                <input type="submit" name="NuevoAntecedentes" value="Añadir Antecedentes">
              </div>
            <?php
            }            
            ?>
      </form>
      <hr>
      <h2 class="text-center mb-3" >Historias Médicas</h2>
      <a class="btn btn-primary" href="nuevaHistoria.php?id=<?php echo $idPaciente?>"><img style="margin-right: 10px;" src="../../icons/boton-circular-plus.png" width="20px">Nueva Historia</a>
      <?php
        $entradas = $metodosBD->consultarHistoria($idPaciente);

        if(mysqli_num_rows($entradas) > 0){
        while ($entrada = mysqli_fetch_assoc($entradas)){
          if($entrada['tipoProfesional_Voluntario'] == 'profesional'){
            $profesionales_voluntarios = $metodosBD->consultarProfesional($entrada['profesional_voluntario_IdUsuario']);
          }else{
            $profesionales_voluntarios = $metodosBD->consultarVoluntario($entrada['profesional_voluntario_IdUsuario']);
          }
          
          while ($profesional_voluntario = mysqli_fetch_assoc($profesionales_voluntarios)){

          
          ?> 
          <div class="card">
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
    } ?>

      
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