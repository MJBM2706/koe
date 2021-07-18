<?php
require 'Conexion.php';

class MetodosBD{
    private $conn;

    function consultarAntecedentesHistoria($idPaciente){
        $this->conn=new Conexion();
        $resultado=$this->conn->conexion();
        $result = $resultado->query("SELECT * FROM antecedentes_historia WHERE paciente_Usuario_idUsuario = $idPaciente ");

    
        return $result;
    }
    
    function actualizarAntecedentesHistoria($idPaciente,$antecedentesFam,$antecedentesFamPat,$antecedentesFamNoPat,$historialPrenatal,$niñezTemprana,$niñezMedia,$adolescencia,$vidaAdulta){
        $this->conn=new Conexion();
        $resultado=$this->conn->conexion();
        $resultado->query("UPDATE antecedentes_historia SET antecedentes_fam = '$antecedentesFam', antecedentes_fam_pat =  '$antecedentesFamPat', antecedentes_fam_no_pat = '$antecedentesFamNoPat', historial_prenatal = '$historialPrenatal', niñez_temprana = '$niñezTemprana', niñez_media = '$niñezMedia', adolescencia = '$adolescencia', vida_adulta = '$vidaAdulta' WHERE paciente_Usuario_idUsuario = $idPaciente");
        if($resultado){
            return true;
        }
        return false;
    }

    function CrearAntecedentesHistoria($idPaciente,$antecedentesFam,$antecedentesFamPat,$antecedentesFamNoPat,$historialPrenatal,$niñezTemprana,$niñezMedia,$adolescencia,$vidaAdulta){
        $this->conn=new Conexion();
        $resultado=$this->conn->conexion();
        $resultado->query("INSERT INTO antecedentes_historia (paciente_Usuario_idUsuario,antecedentes_fam,antecedentes_fam_pat,antecedentes_fam_no_pat,historial_prenatal,niñez_temprana,niñez_media,adolescencia,vida_adulta) VALUES
         ('$idPaciente','$antecedentesFam','$antecedentesFamPat','$antecedentesFamNoPat','$historialPrenatal','$niñezTemprana','$niñezMedia ','$adolescencia','$vidaAdulta')");
        if($resultado){
            return true;
        }
        return false;
    }


    function CrearEntradaHistoria($idPaciente,$idProfesionalVoluntario,$fuenteInformacion,$motivoConsulta,$enfermedadActual,$examenMental,$diagnostico,$formulacionDinamica,$pronostico,$tratamiento,$tipo){
        $this->conn=new Conexion();
        $resultado=$this->conn->conexion();
        $resultado->query("INSERT INTO historia_clinica (paciente_Usuario_idUsuario,profesional_voluntario_IdUsuario,fuenteInformacion,motivoConsulta,historiaEnfermedadActual,examenMental,diagnostico,formulacionDinamica,pronostico,tratamiento,tipoProfesional_Voluntario) VALUES
         ('$idPaciente','$idProfesionalVoluntario','$fuenteInformacion','$motivoConsulta','$enfermedadActual','$examenMental','$diagnostico','$formulacionDinamica','$pronostico','$tratamiento','$tipo')");
        if($resultado){
            return true;
        }
        return false;
    }

    function consultarHistoria($idPaciente){
      $this->conn=new Conexion();
      $resultado=$this->conn->conexion();
      $result = $resultado->query("SELECT * FROM historia_clinica WHERE paciente_Usuario_idUsuario = '$idPaciente'");

      return $result;
    }

    

    function consultarFiltroProfesional($filtro){
        $this->conn=new Conexion();
        $resultado=$this->conn->conexion();
        $result = $resultado->query("SELECT * FROM profesional WHERE estado = '$filtro'");

    
        return $result;
    }

    function consultarFiltroVoluntario($filtro){
        $this->conn=new Conexion();
        $resultado=$this->conn->conexion();
        $result = $resultado->query("SELECT * FROM voluntario WHERE estado = '$filtro'");

    
        return $result;
    }

    function listarProfesionales(){
        $this->conn=new Conexion();
        $resultado=$this->conn->conexion();
        $result = $resultado->query("SELECT * FROM profesional");
        
        //$rows = $result->fetch_all(MYSQLI_ASSOC);
    
        return $result;
    }

    function listarVoluntarios(){
        $this->conn=new Conexion();
        $resultado=$this->conn->conexion();
        $result = $resultado->query("SELECT * FROM voluntario");
        
        //$rows = $result->fetch_all(MYSQLI_ASSOC);
    
        return $result;
    }

     function listarPacientes(){
        $this->conn=new Conexion();
        $resultado=$this->conn->conexion();
        $result = $resultado->query("SELECT * FROM paciente");
        
        //$rows = $result->fetch_all(MYSQLI_ASSOC);
    
        return $result;
    }


    function deshabilitarProfesional($usuario_idUsuario){
        $this->conn=new Conexion();
        $resultado=$this->conn->conexion();
        $resultado->query("UPDATE profesional SET estado = 0 WHERE usuario_idUsuario = $usuario_idUsuario");
        if($resultado){
            return true;
        }
        return false;
    }

    function deshabilitarVoluntario($usuario_idUsuario){
        $this->conn=new Conexion();
        $resultado=$this->conn->conexion();
        $resultado->query("UPDATE voluntario SET estado = 0 WHERE usuario_idUsuario = $usuario_idUsuario");
        if($resultado){
            return true;
        }
        return false;
    }
    
    function habilitarProfesional($usuario_idUsuario){
        $this->conn=new Conexion();
        $resultado=$this->conn->conexion();
        $resultado->query("UPDATE profesional SET estado = 1 WHERE usuario_idUsuario = $usuario_idUsuario");
        if($resultado){
            return true;
        }
        return false;
    }

    function habilitarVoluntario($usuario_idUsuario){
        $this->conn=new Conexion();
        $resultado=$this->conn->conexion();
        $resultado->query("UPDATE voluntario SET estado = 1 WHERE usuario_idUsuario = $usuario_idUsuario");
        if($resultado){
            return true;
        }
        return false;
    }

    function actualizarDatosContactoPaciente($usuario_idUsuario, $departamento,$ciudad,$direccion,$celular,$contactoEmergencia,$celularEmergencia){
        $this->conn=new Conexion();
        $resultado=$this->conn->conexion();
        $resultado->query("UPDATE paciente SET departamento = '$departamento', ciudad =  '$ciudad', direccion = '$direccion', celular = '$celular', contactoEmergencia = '$contactoEmergencia', celularEmergencia = '$celularEmergencia' WHERE usuario_idUsuario = $usuario_idUsuario");
        if($resultado){
            return true;
        }
        return false;
    }

    function actualizarDatosPersonalesPaciente($usuario_idUsuario, $nombre,$apellido,$tipoDocumento,$documentoIdentidad,$fechaNacimiento){
        $this->conn=new Conexion();
        $resultado=$this->conn->conexion();
        $resultado->query("UPDATE paciente SET nombre = '$nombre', apellido =  '$apellido', tipoDocumento = '$tipoDocumento', documentoIdentidad = '$documentoIdentidad', fechaNacimiento = '$fechaNacimiento' WHERE usuario_idUsuario = $usuario_idUsuario");
        
    
    }

    function actualizarProfesional($idUsuario,$nombre,$apellido,$tipoDocumento,$documento,$fechaNacimiento,$departamento,$ciudad,$direccion,$celular,$tituloProfesional,$tarjetaProfesional,$estadoTarjeta){
        $this->conn=new Conexion();
        $resultado=$this->conn->conexion();
        $resultado->query("UPDATE profesional SET nombre = '$nombre', apellido =  '$apellido', tipoDocumento = '$tipoDocumento', documentoIdentidad = '$documento', fechaNacimiento = '$fechaNacimiento', departamento = '$departamento', ciudad = '$ciudad', direccion = '$direccion', celular = '$celular', tituloProfesional = '$tituloProfesional', tarjetaProfesional = '$tarjetaProfesional', estadoTarjeta = '$estadoTarjeta'  WHERE usuario_idUsuario = $idUsuario"); 
        if($resultado){
            return true;
        }
        return false;
    }

    function actualizarMiCuentaProfesional($idUsuario,$nombre,$apellido,$fechaNacimiento,$departamento,$ciudad,$direccion,$celular){
      $this->conn=new Conexion();
        $resultado=$this->conn->conexion();
        $resultado->query("UPDATE profesional SET nombre = '$nombre', apellido =  '$apellido',fechaNacimiento = '$fechaNacimiento', departamento = '$departamento', ciudad = '$ciudad', direccion = '$direccion', celular = '$celular'  WHERE usuario_idUsuario = $idUsuario"); 
        if($resultado){
            return true;
        }
        return false;
    }

    function actualizarMiCuentaVoluntario($idUsuario,$nombre,$apellido,$fechaNacimiento,$departamento,$ciudad,$direccion,$celular){
      $this->conn=new Conexion();
      $resultado=$this->conn->conexion();
      $resultado->query("UPDATE voluntario SET nombre = '$nombre', apellido =  '$apellido', fechaNacimiento = '$fechaNacimiento', departamento = '$departamento', ciudad = '$ciudad', direccion = '$direccion', celular = '$celular' WHERE usuario_idUsuario = $idUsuario"); 
      if($resultado){
        return true;
      }
      return false;
    }

    function actualizarVoluntario($idUsuario,$nombre,$apellido,$tipoDocumento,$documento,$fechaNacimiento,$departamento,$ciudad,$direccion,$celular,$ocupacion,$estadoCapacitacion){
        $this->conn=new Conexion();
        $resultado=$this->conn->conexion();
        $resultado->query("UPDATE voluntario SET nombre = '$nombre', apellido =  '$apellido', tipoDocumento = '$tipoDocumento', documento = '$documento', fechaNacimiento = '$fechaNacimiento', departamento = '$departamento', ciudad = '$ciudad', direccion = '$direccion', celular = '$celular', ocupacion = '$ocupacion', estadoCapacitacion = '$estadoCapacitacion' WHERE usuario_idUsuario = $idUsuario"); 
        if($resultado){
            return true;
        }
        return false;
    }

    function consultarVoluntario($usuario_idUsuario){
        $this->conn=new Conexion();
        $resultado=$this->conn->conexion();
        $result = $resultado->query("SELECT * FROM voluntario WHERE usuario_idUsuario = $usuario_idUsuario");
        
        //$rows = $result->fetch_all(MYSQLI_ASSOC);
    
        return $result;
    }
    
    function consultarProfesional($usuario_idUsuario){
        $this->conn=new Conexion();
        $resultado=$this->conn->conexion();
        $result = $resultado->query("SELECT * FROM profesional WHERE usuario_idUsuario = $usuario_idUsuario");
        
        //$rows = $result->fetch_all(MYSQLI_ASSOC);
    
        return $result;
    }

    function consultarPaciente($usuario_idUsuario){
        $this->conn=new Conexion();
        $resultado=$this->conn->conexion();
        $result = $resultado->query("SELECT * FROM paciente WHERE usuario_idUsuario = $usuario_idUsuario");
        
        //$rows = $result->fetch_all(MYSQLI_ASSOC);
    
        return $result;
    }

    function buscarPaciente($busqueda){
      $this->conn=new Conexion();
        $resultado=$this->conn->conexion();
        $result = $resultado->query("SELECT * FROM paciente WHERE documentoIdentidad LIKE  '%$busqueda%' OR nombre LIKE  '%$busqueda%'");
        
        //$rows = $result->fetch_all(MYSQLI_ASSOC);
    
        return $result;
    }

    function consultarUsuario($usuario_idUsuario){
            $this->conn=new Conexion();
            $resultado=$this->conn->conexion();
            $result = $resultado->query("SELECT * FROM usuario WHERE idUsuario = $usuario_idUsuario");
            
            //$rows = $result->fetch_all(MYSQLI_ASSOC);
        
            return $result;
    }


    function tipoUsuario($usuario_idUsuario){
        $this->conn=new Conexion();
        $resultado=$this->conn->conexion();
        $result = $resultado->query("SELECT tipoUsuario FROM usuario WHERE idUsuario = $usuario_idUsuario");
        
        $rows = $result->fetch_all(MYSQLI_ASSOC);
    
        return $rows;
        
    }

    function iniciarSesion($correo,$password){
        $this->conn=new Conexion();
        $resultado=$this->conn->conexion();
        $existe=$resultado->query("SELECT EXISTS(SELECT idUsuario FROM usuario WHERE correo='$correo' AND password='$password');");
        $row=mysqli_fetch_row($existe);

        if ($row[0]=="1") {                 

            return true;
        }else{
           return false;
        }
    }

    function validarCorreo($correo){
        $this->conn=new Conexion();
        $resultado=$this->conn->conexion();
        $existe=$resultado->query("SELECT EXISTS (SELECT idUsuario FROM usuario WHERE correo='$correo');");
        $row=mysqli_fetch_row($existe);

        if ($row[0]=="1") {                 

            return true;
        }else{
           return false;
        }
        

    }

    function crearUsuarioPaciente($correo,$pass){
        $this->conn=new Conexion();
        $resultado=$this->conn->conexion();
        $resultado->query("INSERT INTO usuario (idUsuario,tipoUsuario,correo,password) VALUES (null,'paciente','$correo','$pass')");

    }

    function crearUsuarioProfesional($correo,$pass){
        $this->conn=new Conexion();
        $resultado=$this->conn->conexion();
        $resultado->query("INSERT INTO usuario (idUsuario,tipoUsuario,correo,password) VALUES (null,'profesional','$correo','$pass')");

    }

    function crearUsuarioVoluntario($correo,$pass){
        $this->conn=new Conexion();
        $resultado=$this->conn->conexion();
        $resultado->query("INSERT INTO usuario (idUsuario,tipoUsuario,correo,password) VALUES (null,'voluntario','$correo','$pass')");

    }

    function consultarIdUsuario($correo,$pass){
        $this->conn=new Conexion();
        $resultado=$this->conn->conexion();
        $result = $resultado->query("SELECT idUsuario FROM usuario WHERE correo='$correo' and password='$pass'");
        
        $rows = $result->fetch_all(MYSQLI_ASSOC);
    
        return $rows;
    
    }

    function crearPaciente($usuario_idUsuario){
        $this->conn=new Conexion();
        $stm=$this->conn->conexion();
        $resultado = $stm->query("INSERT INTO paciente (usuario_idUsuario) VALUES ('$usuario_idUsuario')");
        if($resultado){
            return true;
        }
        return false;

    }

    function crearProfesional($idUsuario,$nombre,$apellido,$tipoDocumento,$documento,$fecha_nacimiento,$departamento,$ciudad,$direccion,$celular,$tituloProfesional,$tarjetaProfesional,$estadoTarjeta){
        $this->conn=new Conexion();
        $stm=$this->conn->conexion();
        $resultado = $stm->query("INSERT INTO profesional(usuario_idUsuario,nombre,apellido,tipoDocumento,documentoIdentidad,fechaNacimiento,departamento,ciudad,direccion,celular,tituloProfesional,tarjetaProfesional,estadoTarjeta) VALUES ('$idUsuario','$nombre','$apellido','$tipoDocumento','$documento','$fecha_nacimiento','$departamento','$ciudad','$direccion','$celular','$tituloProfesional','$tarjetaProfesional','$estadoTarjeta')");
        if($resultado){
            return true;
        }
        return false;

    }

    function crearVoluntario($idUsuario,$nombre,$apellido,$tipoDocumento,$documento,$fechaNacimiento,$departamento,$ciudad,$direccion,$celular,$ocupacion,$estadoCapacitacion){
        $this->conn=new Conexion();
        $stm=$this->conn->conexion();
        $resultado = $stm->query("INSERT INTO voluntario (usuario_idUsuario,nombre,apellido,tipoDocumento,documento,fechaNacimiento,departamento,ciudad,direccion,celular,ocupacion,estadoCapacitacion) VALUES ('$idUsuario','$nombre','$apellido','$tipoDocumento','$documento','$fechaNacimiento','$departamento','$ciudad','$direccion','$celular','$ocupacion','$estadoCapacitacion')");
        if($resultado){
            return true;
        }
        return false;

    }

    
    
    
}






?>