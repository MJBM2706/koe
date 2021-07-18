<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koe</title>
    <link rel="icon" type="image/png" href="../icons/koe.png">
    <link rel="stylesheet" type="text/css"  href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css"  href="../css/estilos.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
  <header>
    <nav class="navbar navbar-expand-sm navbar-dark bg-primary" >
      <a class="navbar-brand" href="#"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse  justify-content-center" id="collapsibleNavbar">
        <ul class="navbar-nav ">
          <li class="nav-item">
              <a class="nav-link" href="../index.php"><img src="../icons/koe.png" alt="Logo" width="30px"></a>
          </li>
          <li class="nav-item">
            <a class="active nav-link" href="#">Inicia Sesión</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../controlador/RegistroController.php">Registrate</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../vista/conocenos.php">Conócenos</a>
          </li> 
          <li class="nav-item">
            <a class="nav-link" href="../vista/trabaja_con_nosotros.php">Trabaja con Nosotros</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../vista/donaciones.php">Donaciones</a>
          </li>  
        </ul>
      </div>  
    </nav>
  </header>
  <div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <img src="../icons/profile-user.png" id="icon" alt="User Icon" />
    </div>

    <!-- Login Form -->
    <form action="../controlador/LoginController.php" method="post">
      <input type="email" id="correo" class="fadeIn second" name="correo" placeholder="Correo Electrónico">
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="Contraseña">
      <input type="submit" class="fadeIn fourth" value="Log In">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="../controlador/RegistroController.php">¿No tienes una cuenta? Regístrate</a>
    </div>
  </div>
</div>
    <footer>
      <div class="footer">
        <nav class="navbar navbar-expand-sm navbar-dark bg-primary justify-content-center" >
        
        
          <ul class="navbar-nav ">
            <li class="nav-item">
              <a class="active nav-link" href="#">Inicia Sesión</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../controlador/RegistroController.php">Registrate</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../vista/conocenos.php">Conócenos</a>
            </li> 
            <li class="nav-item">
              <a class="nav-link" href="../vista/trabaja_con_nosotros.php">Trabaja con Nosotros</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../vista/donaciones.php">Donaciones</a>
            </li>  
          </ul>
        </nav>
        <nav class="navbar navbar-expand-sm navbar-dark bg-primary justify-content-center" >
          <ul class="navbar-nav ">
            <li class="nav-item">
              <a class="nav-link" href="#"><img src="../icons/twitter.png" alt="Twitter" width="30px"></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"><img src="../icons/facebook.png" alt="Facebook" width="30px"></a>
            </li>
          </ul>
        </nav>
        <nav class="navbar navbar-expand-sm navbar-dark bg-primary justify-content-center" >
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