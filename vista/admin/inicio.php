
<?php
  require_once('../../utilidades/metodosBD.php');
  $metodosBD = new MetodosBD();
if(isset($_GET['action']))
  {
  if($_GET['action'] == 'habilitarP'){
    $idUsuario = $_GET['id'];
    $update = $metodosBD->habilitarProfesional($idUsuario);
		if($update){
		  echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Usuario habilitado correctamente</div>';
		}else{
		echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Error, no se pudo habilitar el usuario.</div>';
		}
	}

  if($_GET['action'] == 'deshabilitarP'){
    $idUsuario = $_GET['id'];
    $update = $metodosBD->deshabilitarProfesional($idUsuario);
		if($update){
		  echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Usuario deshabilitado correctamente</div>';
		}else{
		echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Error, no se pudo deshabilitar el usuario.</div>';
		}
	}
  if($_GET['action'] == 'habilitarV'){
    $idUsuario = $_GET['id'];
    $update = $metodosBD->habilitarVoluntario($idUsuario);
		if($update){
		  echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Usuario habilitado correctamente</div>';
		}else{
		echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Error, no se pudo habilitar el usuario.</div>';
		}
	}

  if($_GET['action'] == 'deshabilitarV'){
    $idUsuario = $_GET['id'];
    $update = $metodosBD->deshabilitarVoluntario($idUsuario);
		if($update){
		  echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Usuario deshabilitado correctamente</div>';
		}else{
		echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Error, no se pudo deshabilitar el usuario.</div>';
		}
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
  <link rel="stylesheet" type="text/css"  href="../../css/bootstrap.css">
  <link rel="stylesheet" type="text/css"  href="../../css/estilos.css">
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
      <div class="row justify-content-md-center">
        <a class="btn col-sm-6" href="registro_profesional.php">Registrar Profesional</a>
        <a class="btn col-sm-6" href="registro_voluntario.php">Registrar Voluntario</a>
      </div>
      <div class="row justify-content-center p-5">
        <div class="col-md-12">
          <label for="touch-profesional"><span>Ver Profesionales <img src="../../icons/down-arrow.png" alt=""></span></label>               
          <input type="checkbox" id="touch-profesional">     
          <div class="slide-profesional">
            <!-- FILTRO PROFESIONAL-->
            <form class="form-inline" method="get">
              <div class="form-group">
              
                <select name="filter" class="form-control" onchange="form.submit()">
                  
                  <?php $filter = (isset($_GET['filter']) ? strtolower($_GET['filter']) : 3);  ?>
                  <option value=3 <?php if($filter == 3){ echo 'selected'; } ?>>Todos</option>
                  <option value=0 <?php if($filter == 0){ echo 'selected'; } ?>>Deshabilitado</option>
                  <option value=1 <?php if($filter == 1){ echo 'selected'; } ?>>Habilitado</option> 
                </select>
            </div>
            </form>
            <!-- END FILTRO PROFESIONAL -->
            <table class="table table-striped collapsible" >
              <thead>
                <tr>
                  <th scope="col">Id Interno</th>
                  <th scope="col">Nombres</th>
                  <th scope="col">Apellidos</th>
                  <th scope="col">Documento</th>
                  <th scope="col">Celular</th>
                  <th scope="col">Titulo Profesional</th>
                  <th scope="col">Tarjeta Profesional</th>
                  <th scope="col">Estado</th>
                  <th scope="col">Acciones</th>
                </tr>
              </thead>
              <tbody>
                <!-- DATOS PROFESIONAL-->
                <?php
                if($filter != 0 AND $filter != 1){
                  $resultado=$metodosBD->listarProfesionales();
                  
                }else{
                  $resultado=$metodosBD->consultarFiltroProfesional($filter);
                }
                if(mysqli_num_rows($resultado) == 0){
					        echo '<tr><td colspan="9">No hay datos.</td></tr>';
                }else{
                  while ($row = mysqli_fetch_assoc($resultado)){
                  echo '
                    <tr>
                      <td>'.$row['usuario_idUsuario'].'</td>
                      <td><a style="color: #120e3c; font-weight: 700;" href="profesional.php?id='.$row['usuario_idUsuario'].'">'.$row['nombre'].'</a></td>
                      <td>'.$row['apellido'].'</td>
                      <td>'.$row['documentoIdentidad'].'</td>
                      <td>'.$row['celular'].'</td>
                      <td>'.$row['tituloProfesional'].'</td>
                      <td>'.$row['estadoTarjeta'].'</td>
                      <td>';
                      if($row['estado'] == '0'){
                        echo '<label class="deshabilitado">Deshabilitado</label>';
                      }
                      else if ($row['estado'] == '1' ){
                        echo '<label class="habilitado">Habilitado</label>';
                      }
                    echo '
                      </td>
                      <td>

                        <a href="profesional.php?id='.$row['usuario_idUsuario'].'" title="Editar datos"><img src="../../icons/editar.png"></a>
                        ';
                    if($row['estado'] == 0){
                      echo '
                      <a href="inicio.php?action=habilitarP&id='.$row['usuario_idUsuario'].'" title="Habilitar" onclick="return confirm(\'Esta seguro de que desea habilitar al usuario '.$row['nombre'].'?\')" ><img src="../../icons/cheque.png"></a>
                      </td>
                    </tr>
                      ';
                    }else {
                      echo '
                      <a href="inicio.php?action=deshabilitarP&id='.$row['usuario_idUsuario'].'" title="Deshabilitar" onclick="return confirm(\'Esta seguro de que desea deshabilitar al usuario '.$row['nombre'].'?\')"><img src="../../icons/uncheck.png"></a>
                      </td>
                    </tr>
                      ';
                    }
                      
                    
                  
                  }

                }
				        ?>
                <!-- END DATOS PROFESIONAL-->
                </tbody>
              </table>

          </div>

          <label for="touch-voluntario"><span>Ver Voluntarios<img src="../../icons/down-arrow.png" alt=""></span></label>               
          <input type="checkbox" id="touch-voluntario">     
          <div class="slide-voluntario">
            <!-- FILTRO VOLUNTARIO -->
            <form class="form-inline" method="get">
              <div class="form-group">
              
                <select name="filter" class="form-control" onchange="form.submit()">
                  
                  <?php $filter = (isset($_GET['filter']) ? strtolower($_GET['filter']) : 3);  ?>
                  <option value=3 <?php if($filter == 3){ echo 'selected'; } ?>>Todos</option>
                  <option value=0 <?php if($filter == 0){ echo 'selected'; } ?>>Deshabilitado</option>
                  <option value=1 <?php if($filter == 1){ echo 'selected'; } ?>>Habilitado</option> 
                </select>
            </div>
            </form>
            <!-- END FILTRO VOLUNTARIO-->
            <table class="table table-striped collapsible" >
              <thead>
                <tr>
                  <th scope="col">Id Interno</th>
                  <th scope="col">Nombres</th>
                  <th scope="col">Apellidos</th>
                  <th scope="col">Documento</th>
                  <th scope="col">Celular</th>
                  <th scope="col">Ocupacion</th>
                  <th scope="col">Capacitacion</th>
                  <th scope="col">Estado</th>
                  <th scope="col">Acciones</th>
                </tr>
              </thead>
              <tbody>
                <!-- DATOS VOLUNTARIO -->
                <?php
                if($filter != 0 AND $filter != 1){
                  $resultado=$metodosBD->listarVoluntarios();
                  
                }else{
                  $resultado=$metodosBD->consultarFiltroVoluntario($filter);
                }
                if(mysqli_num_rows($resultado) == 0){
					        echo '<tr><td colspan="9">No hay datos.</td></tr>';
                }else{
                  while ($row = mysqli_fetch_assoc($resultado)){
                  echo '
                    <tr>
                      <td>'.$row['usuario_idUsuario'].'</td>
                      <td><a style="color: #120e3c; font-weight: 700;" href="voluntario.php?id='.$row['usuario_idUsuario'].'">'.$row['nombre'].'</a></td>
                      <td>'.$row['apellido'].'</td>
                      <td>'.$row['documento'].'</td>
                      <td>'.$row['celular'].'</td>
                      <td>'.$row['ocupacion'].'</td>
                      <td>'.$row['estadoCapacitacion'].'</td>
                      <td>';
                      if($row['estado'] == '0'){
                        echo '<label class="deshabilitado">Deshabilitado</label>';
                      }
                      else if ($row['estado'] == '1' ){
                        echo '<label class="habilitado">Habilitado</label>';
                      }
                    echo '
                      </td>
                      <td>

                        <a href="voluntario.php?id='.$row['usuario_idUsuario'].'" title="Editar datos"><img src="../../icons/editar.png"></a>
                        ';
                    if($row['estado'] == 0){
                      echo '
                      <a href="inicio.php?action=habilitarV&id='.$row['usuario_idUsuario'].'" title="Habilitar" onclick="return confirm(\'Esta seguro de que desea habilitar al usuario '.$row['nombre'].'?\')" ><img src="../../icons/cheque.png"></a>
                      </td>
                    </tr>
                      ';
                    }else {
                      echo '
                      <a href="inicio.php?action=deshabilitarV&id='.$row['usuario_idUsuario'].'" title="Deshabilitar" onclick="return confirm(\'Esta seguro de que desea deshabilitar al usuario '.$row['nombre'].'?\')"><img src="../../icons/uncheck.png"></a>
                      </td>
                    </tr>
                      ';
                    }
                      
                    
                  
                  }

                }
				        ?>
                <!-- END DATOS VOLUNTARIO-->
                </tbody>
              </table>

          </div>
    </div>
      </div>


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