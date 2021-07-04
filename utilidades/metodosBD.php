<?php
require 'Conexion.php';

class MetodosBD{
    private $conn;

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

    function consultarPaciente($usuario_idUsuario){
        $this->conn=new Conexion();
        $resultado=$this->conn->conexion();
        $result = $resultado->query("SELECT * FROM paciente WHERE usuario_idUsuario = $usuario_idUsuario");
        
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

    
    
    
}






?>