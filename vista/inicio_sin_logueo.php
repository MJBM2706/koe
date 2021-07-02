<?php
session_start();
if (isset($_SESSION['tipo'])) {
    header('Location: ../index.php');
    die();
} 
?>
<!DOCTYPE html>
  <html lang="es">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Koe</title>
      <link rel="icon" type="image/png" href="../icons/koe.png">
      <link rel="stylesheet" type="text/css"  href="../css/estilos.css">
      <link rel="stylesheet" type="text/css"  href="../css/bootstrap.css">
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
      <nav class="navbar navbar-expand-sm navbar-dark bg-primary" >
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse  justify-content-center" id="collapsibleNavbar">
          <ul class="navbar-nav ">
            <li class="nav-item">
              <a class="nav-link" href="../controlador/LoginController.php">Inicia Sesión</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../controlador/RegistroController.php">Regístrate</a>
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
    <div class="contenedor">
      <div class="container">
        <div class="row ">
          <div class="col-md row-cols-sm-1 >">
            <img src="../img/logoCuadrado.png" alt="Logo" width="70%">
          </div>
          <div class="col-md row-cols-sm-1 >">
            <p class="justify-content-justify">El suidicio es la segunda causa principal de defunción en el grupo etario de 15 a 29 años(World Health Organization,2015).
              El suicidio es un grave problema de salud pública; no obstante, es prevenible mediante intervenciones oportunas[...](World Health Organization,2019).
            </p>
            <a class="btn col-sm-12" href="#">Necesito ayuda inmediata</a>
              <a class="btn col-sm-12" href="../controlador/RegistroController.php">Agendar cita con un profesional</a>
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