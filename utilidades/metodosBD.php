<?php
require 'Conexion.php';

class MetodosBD{
    private $conn;

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

    function crearUsuario($correo,$pass){
        $this->conn=new Conexion();
        $resultado=$this->conn->conexion();
        $resultado->query("INSERT INTO usuario (idUsuario,correo,password) VALUES (null,'$correo','$pass')");

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
        $resultado = $stm->query("INSERT INTO paciente (idPaciente,usuario_idUsuario,nombre,apellido,telefono,fechaNacimiento) VALUES (null,'$usuario_idUsuario',null,null,null,null)");
        if($resultado){
            return true;
        }
        return false;

    }

    
    
    
}






?>