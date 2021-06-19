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
                        <a class="nav-link" href="../index.php"><img src="../../icons/koe.png" alt="Logo" width="30px"></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="conocenos.vista.php">Conócenos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="trabajaConNosotros.vista.php">Trabaja con Nosotros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="donaciones.vista.php">Donaciones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Cerrar Sesión</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <div class="container">
        <section class="sidebar">
            <ul>
                <li class='option'>
                    <a href="#">
                        <img class="icon" src="../../icons/house.png" alt="" srcset="">
                        <p>Inicio</p>
                    </a>
                </li>
                <li class='option'>
                    <a href="cuenta.php">
                        <img class="icon" src="../../icons/user.png" alt="" srcset="">
                        <p>Mi Cuenta</p>
                    </a>
                </li>
                <li class='option'>
                    <a href="">
                        <img class="icon" src="../../icons/message.png" alt="" srcset="">
                        <p>Mensajes</p>
                    </a>
                </li>
                <li class='option'>
                    <a href="">
                        <img class="icon" src="../../icons/medical_record.png" alt="" srcset="">
                        <p>Historial Clinico</p>
                    </a>
                </li>
                <li class='option'>
                    <a href="">
                        <img class="icon" src="../../icons/appointment.png" alt="" srcset="">
                        <p>Citas</p>
                    </a>
                </li>
            </ul>
        </section>
        <aside class="content">
            <h5>Datos Personales</h5>
            <hr>
            <div>
                <ul class="profile-info">
                    <li>
                        <p>NOMBRES</p>
                        <p><strong>JUAN</strong> </p>
                    </li>
                    <li>
                        <p>APELLIDOS</p>
                        <p><strong>PEREZ MARTINEZ</strong></p>
                    </li>
                    <li>
                        <p>IDENTIFICACION</p>
                        <p>
                            <strong>
                                <span class='doc-type'>CC</span>122585024
                            </strong>
                        </p>
                    </li>
                    <li>
                        <p>ESPECIALIDAD</p>
                        <p><strong>PSIQUIATRA</strong> </p>
                    </li>
                    <li>
                        <p>TARJETA PROFESIONAL</p>
                        <p><strong>1541545</strong> </p>
                    </li>
                </ul>
            </div>
            <h5>Datos de Contacto</h5>
            <hr>
            <form action="" method="post" class="profile-form">
                <div>
                    <ul class="profile-info contact-info">
                        <li>
                            <p>*Departamento</p>
                            <select class="profile-form-option" name="departamento" id="">
                                <option value="amazonas">Amazonas</option>
                                <option value="antioquia">Antioquia</option>
                                <option value="atlantico">Atlántico</option>
                                <option value="bolivar">Bolívar</option>
                                <option value="boyaca">Boyacá</option>
                            </select>
                        </li>
                        <li>
                            <p>*En que ciudad vives?</p>
                            <select class="profile-form-option" name="ciudad" id="">
                                <option value="amazonas">Leticia</option>
                                <option value="antioquia">Medellín</option>
                                <option value="atlantico">Barranquilla</option>
                                <option value="bolivar">Cartagena</option>
                                <option value="boyaca">Tunja</option>
                            </select>
                        </li>
                        <li>
                            <p>*Direccion en la que vives?</p>
                            <input type="text" placeholder="Tu Direccion">
                        </li>
                        <li>
                            <p>*Correo Electronico</p>
                            <input type="email" name="" id="" placeholder="Tu email">
                        </li>
                        <li>
                            <p>*Telefono</p>
                            <input type="tel" placeholder="Tu telefono">
                        </li>
                        <li>
                            <p>*Numero de Celular</p>
                            <input type="tel" placeholder="Tu Celular">
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


    <footer>
        <div class="footer">
            <nav class="navbar navbar-expand-sm navbar-dark bg-primary justify-content-center">


                <ul class="navbar-nav ">

                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="trabajaConNosotros.vista.php">Trabaja con Nosotros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="donaciones.vista.php">Donaciones</a>
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