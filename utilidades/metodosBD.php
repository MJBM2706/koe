<?php
require 'Conexion.php';

class MetodosBD{
    private $conn;

    function validarCorreo($correo){
        $this->conn=new Conexion();
        $resultado=$this->conn->conexion();
        $existe = $resultado->query("SELECT idUsuario FROM usuario WHERE correo='$correo' LIMIT 1");
        $existe->fetch_all();
        return $existe;

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