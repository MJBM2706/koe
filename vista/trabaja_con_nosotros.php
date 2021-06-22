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
    <script src="https://kit.fontawesome.com/61afc60e6b.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
    .fa-envelope{
    font-size:25px;
    }
    </style>
    <style>
    .fa-phone{
    font-size:25px;
    }
    </style>
    <style>
    .fa-user-tie{
     font-size:25px;
    }
    </style>

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
                <a class="nav-link" href="../index.php"><img src="../icons/koe.png" alt="Home" width="30px"></a>
            </li>
            <li class="nav-item">
                    <a class="nav-link" href="../controlador/LoginController.php">Inicia Sesión</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../controlador/RegistroController.php">Regístrate</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="conocenos.php">Conócenos</a>
            </li> 
            <li class="nav-item">
                <a class="active nav-link" href="#">Trabaja con Nosotros</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="donaciones.php">Donaciones</a>
            </li>  
        </ul>
      </div>  
    </nav>
  </header>
<div class="wrapper">
  <div class="col-md col-sm ">
    <p class="h1">Trabaja con nosotros</p>
    <p class="h4">  <i class="fas fa-phone"> </i> Numero: 3002427778 </p>
    <p class="h4"> <i class="fas fa-envelope"> </i>  Correo: koe@gmail.com</p>
    <!--formulario--> 
    <div class="wrapper">
      <div class="col-md col-sm">
        <h2>Formulario de contacto</h2>

        <form action="procesar_formulario.php" method="post">

          <div class="form-group">                      
            <label class=h4 for="nombrecompleto" >Nombre completo: </label>
            <input class="form-control" type="text" name="nombre" id="nombre"
            placeholder="Escriba su nombre completo">
          </div>
              
          <div class="form-group">
            <label class=h4 for="correoe">Correo electronico: </label>
            <input class="form-control" type="text" name="correoe" id="correoe" 
            placeholder="Escriba su correo electronico">
          </div>

          <div class="form-group">
            <label class=h4 for="comentarios">Comentario: </label>
            <textarea class="form-control" name="comentarios" id="comentarios" 
            placeholder="Escriba sus comentarios" cols="30" rows="10"></textarea>
          </div>
          <div class=" wrapper form-group">
          <input class="wrapper" type="submit" name="enviar" id="enviar" value="Enviar formulario">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

    <footer>
      <div class="footer">
        <nav class="navbar navbar-expand-sm navbar-dark bg-primary justify-content-center" >
        
        
          <ul class="navbar-nav ">
            <li class="nav-item">
              <a class="nav-link" href="../controlador/LoginController.php">Inicia Sesión</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../controlador/RegistroController.php">Regístrate</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="conocenos.php">Conócenos</a>
            </li> 
            <li class="nav-item">
              <a class="active nav-link" href="#">Trabaja con Nosotros</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="donaciones..php">Donaciones</a>
            </li>  
          </ul>
        </nav>
        <nav class="navbar navbar-expand-sm navbar-dark bg-primary justify-content-center" >
          <ul class="navbar-nav ">
            <li class="nav-item">
              <a class="nav-link" href="https://www.twitter.com/"><img src="../icons/twitter.png" alt="Twitter" width="30px"></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="https://www.facebook.com/"><img src="../icons/facebook.png" alt="Facebook" width="30px"></a>
            </li>
          </ul>
        </nav>
        <nav class="navbar navbar-expand-sm navbar-dark bg-primary justify-content-center" >
          <ul class="navbar-nav ">
            <li class="nav-item">
            <a class="nav-link" href="#">Copyright© 2021</a> 
            </li>
          </ul>
        </nav>
      </div>
   

    </footer>

</body>

</html>