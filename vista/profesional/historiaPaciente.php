<?php
 session_start();
 if (!isset($_SESSION['tipo'])) {
     header('Location: ../index.php');
}else{
    if($_SESSION['tipo'] == 'profesional'){
        
    }
     else{
    header('Location: ../index.php');
    die();
  }  
}
require_once('../../utilidades/metodosBD.php');
$metodosBD = new MetodosBD();

if(isset($_GET['id'])){
  $idPaciente = $_GET['id'];


}else{
  header('Location: ../error.php');
}


if(isset($_POST['updateAntecedentesHistoria'])){
  
  $estadoTarjeta = $_POST['estadoTarjeta'];

  $errores = '';
  if (empty($nombre)
    
    ) {
        echo'<script type="text/javascript">
        alert("Tienes que llenar todos los campos");
        </script>';
        
        $errores = 'Llena todos los campos';
    } else {

        if ($errores == ''){
          $actualizar=$metodosBD->actualizarAntecedentesHistoria($idPaciente,$antecedentesFam,$antecedentesFamPat,$antecedentesFamNoPat,$historialPrenatal,$niñezTemprana,$niñezMedia,$adolescencia,$vidaAdulta);
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
      <h4><a style="margin-right: 15px;" href="inicio.php"><img src="../../icons/back-track.png" alt="Ir atrás"></a>Detalle Historia Paciente</h4>
      <hr>
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
                    <textarea name="antecedentes_fam" id="" cols="30" rows="3">
                      <?php echo $row['antecedentes_fam'] ?>
                    </textarea>
                    
                  </li>
                </ul>
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
                </ul>
              </div>
            <?php
            }            
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