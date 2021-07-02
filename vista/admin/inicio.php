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
 <div class="wrapper fadeInDown">
     <form style="width: 70%;">
    <div id="editarRegistros">
        <div class="container">
            <div class="row justify-content-center P-3">
                <H2>REGISTRO DE PACIENTES</H2>
            </div>
                <div class="row justify-content-center">
                    <div class="col-md-4">
                        <label style="padding-left: 2%;" for="">Nombre:</label>
                        <input type="text" id="password" class="form-control" name="login" placeholder="Nombre">
                    </div>
                    <div class="col-md-4">
                        <label style="padding-left: 2%;" for="">Apellido:</label>
                        <input type="text" id="password" class="form-control" name="login" placeholder="Apellido">
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-4">
                        <label style="padding-left: 2%;" for="">Telefono:</label>
                        <input type="text" id="password" class="form-control" name="login" placeholder="Telefono">
                    </div>
                    <div class="col-md-4">
                        <label style="padding-left: 2%;" for="">Dirección:</label>  
                        <input type="Email" id="password" class="form-control" name="login" placeholder="Dirección">
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-4">
                        <label style="padding-left: 2%;" for="">Correo:</label>
                        <input type="Email" id="password" class="form-control" name="login" placeholder="Correo">
                    </div>
                    <div class="col-md-4">
                        <label style="padding-left: 2%;" for="">Contraseña:</label>  
                        <input type="Email" id="password" class="form-control" name="login" placeholder="Contraseña">
                    </div>
                </div>
                <div class="row justify-content-center p-3">
                    <div class="col-md-4">                    
                        <input type="button" id="password" Value="Guardar" class="btn-primary" name="login" placeholder="Correo">
                    </div>
                </div>
            </div>
        </div>  
        
        <div id="listaEmpleados">
          <div class="row justify-content-center p-3">
              <div class="col-md-12">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">First</th>
                      <th scope="col">Last</th>
                      <th scope="col">Handle</th>
                      <th scope="col"></th>
                      </tr>
                  </thead>
                  <tbody>
                    <tr>
                    <th scope="row">1</th>
                      <td>Mark</td>
                      <td>Otto</td>
                      <td>@mdo</td>
                      <td>
                        <button type="button" style="background: antiquewhite;" class="btn btn-secondary">Modificar</button>
                        <button type="button" class="btn btn-secondary" style="background-color: darkcyan;">Eliminar</button>
                      </td>
                    </tr>
                    <tr>
                      <th scope="row">2</th>
                      <td>Jacob</td>
                      <td>Thornton</td>
                      <td>@fat</td>
                      <td>
                        <button type="button" class="btn btn-secondary" style="background: antiquewhite;">Modificar</button>
                        <button type="button" class="btn btn-secondary" style="background-color: darkcyan;">Eliminar</button>
                      </td>
                    </tr>
                    <tr>
                      <th scope="row">3</th>
                      <td>Larry</td>
                      <td>the Bird</td>
                      <td>@twitter</td>
                      <td>
                        <button type="button" class="btn btn-secondary" style="background: antiquewhite;">Modificar</button>
                        <button type="button" class="btn btn-secondary" style="background-color: darkcyan;">Eliminar</button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
          </div>
        </div>
       
     </form>
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