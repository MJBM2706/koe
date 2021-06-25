<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koe</title>
    <link rel="icon" type="image/png" href="../icons/koe.png">
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
          <a class=' nav-link' href="inicio.php">
            <img class="icon" src="../../icons/house.png" alt="" srcset="">
            <p >Inicio</p>
          </a>
        </li>
        <li class='option'>
          <a class='active  nav-link' href="#">
            <img class="icon" src="../../icons/user.png" alt="" srcset="">
            <p>Mi Cuenta</p>
          </a>
        </li>
        <li class='option'>
          <a class='nav-link' href="">
            <img class="icon" src="../../icons/message.png" alt="" srcset="">
            <p>Mensajes</p>
          </a>
        </li>
        <li class='option'>
          <a class='nav-link' href="historia.php">
            <img class="icon" src="../../icons/medical_record.png" alt="" srcset="">
            <p>Historial Clinico</p>
          </a>
        </li>
        <li class='option'>
          <a class='nav-link' href="">
            <img class="icon" src="../../icons/appointment.png" alt="" srcset="">
            <p>Citas</p>
          </a>
        </li>
      </ul>
    </section>
        <aside class="content">
            <h5>Datos Personales</h5>
            <hr>
            <form action="" method="post" class="profile-form">
                <div>
                    <ul class="profile-info contact-info">
                        <li>
                            <p>Nombre</p>
                            <input type="text" placeholder="Tu nombre">
                        </li>
                        <li>
                            <p>Apellidos</p>
                            <input type="tel" placeholder="Tus Apellidos">
                        </li>
                        <li>
                            <p>Tipo de documento</p>
                            <select class="profile-form-option" name="tipoDocumento" id="">
                                <option value="CEDULA">Cedula</option>
                                <option value="CEDULA EXTRANJERIA">Cedula Extranjeria</option>
                                <option value="DOC.IDENT. DE EXTRANJEROS">Doc.Ident. de Extranjeros</option>
                                <option value="IDENT. FISCAL PARA EXT.">Ident. Fiscal para Ext.</option>
                                <option value="NIT PARA PERSONAS">NIT Personas Naturales</option>
                                <option value="NUIP">NUIP</option>
                                <option value="PASAPORTE">Pasaporte</option>
                                <option value="REGISTRO CIVIL">Registro Civil</option>
                                <option value="TARJETA DE INDENTIDAD">Tarjeta de Identidad</option>
                                <option value="PASAPORTE ONU">Pasaporte ONU</option>
                                <option value="PERMISO ESPECIAL PERMANENCIA">Permiso especial Permanencia</option>
                                <option value="SALVOCODUCTO DE PERMANENCIA">Salvoconducto de Permanencia</option>
                                <option value="PERMISO ESPECIAL FORMACN PEPFF">Permiso Especial Formacn PEPFF</option>
                               
                            </select>
                        </li>
                        <li>
                            <p>Documento de Identidad</p>
                            <input type="tel" placeholder="Tu documento de identidad">
                        </li>
                        <li>
                            <p>Fecha de Nacimiento</p>
                            <input type="date" name="fecha"> 
                        </li>
                    </ul>
                </div>
                
            </form>
            <h5>Datos de Contacto</h5>
            <hr>
            <form action="" method="post" class="profile-form">
                <div>
                    <ul class="profile-info contact-info">
                        <li>
                            <p>Departamento</p>
                            <select class="profile-form-option" name="departamento" id="">
                                <option value="amazonas">Amazonas</option>
                                <option value="antioquia">Antioquia</option>
                                <option value="arauca">Arauca</option>
                                <option value="atlantico">Atlántico</option>
                                <option value="bogota">Bogotá</option>
                                <option value="bolivar">Bolívar</option>
                                <option value="boyaca">Boyacá</option>
                                <option value="caldas">Caldas</option>
                                <option value="caqueta">Caquetá</option>
                                <option value="casanare">Casanare</option>
                                <option value="cauca">Cauca</option>
                                <option value="cesar">Cesar</option>
                                <option value="choco">Chocó</option>
                                <option value="cordoba">Córdoba</option>
                                <option value="cundinamarca">Cundinamarca</option>
                                <option value="guainia">Guainía</option>
                                <option value="guaviare">Guaviare</option>
                                <option value="huila">Huila</option>
                                <option value="la guajira">La Guajira</option>
                                <option value="magdalena">Magdalena</option>
                                <option value="meta">Meta</option>
                                <option value="narino">Nariño</option>
                                <option value="santander">Norte de Santander</option>
                                <option value="putumayo">Putumayo</option>
                                <option value="quindio">Quindío</option>
                                <option value="risaralda">Risaralda</option>
                                <option value="san andres y providencia">San Andrés y Providencia</option>
                                <option value="bolivar">Santander</option>
                                <option value="boyaca">Sucre</option>
                                <option value="boyaca">Tolima</option>
                                <option value="boyaca">Valle del Cauca</option>
                                <option value="boyaca">Vaupés</option>
                                <option value="boyaca">Vichada</option>
                            </select>
                        </li>
                        <li>
                            <p>Ciudad</p>
                            <select class="profile-form-option" name="ciudad" id="">
                                <option value="amazonas">Leticia</option>
                                <option value="antioquia">Medellín</option>
                                <option value="atlantico">Barranquilla</option>
                                <option value="bolivar">Cartagena</option>
                                <option value="boyaca">Tunja</option>
                            </select>
                        </li>
                        <li>
                            <p>Direccion</p>
                            <input type="text" placeholder="Tu Direccion">
                        </li>
                        <li>
                            <p>Celular</p>
                            <input type="tel" placeholder="Tu Celular">
                        </li>
                        <li>
                            <p>Nombre del contacto de Emergencia</p>
                            <input type="tel" placeholder="Nombre del contacto">
                        </li>
                        <li>
                            <p>Celular del contacto de Emergencia</p>
                            <input type="tel" placeholder="Celular del contacto">
                        </li>
                    </ul>
                </div>
                <input class="confirm" type="checkbox"><span>Acepto los terminos y condiciones de los datos registrados en este sitio</span>
                <div>

                    <input type="submit" name="enviar" value="Actualizar">
                </div>
            </form>
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