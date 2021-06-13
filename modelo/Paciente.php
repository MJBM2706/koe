<?php

class Paciente extends Usuario
{
    //Variables o atributos
    var $idPaciente;
    var $usuario_idUsuario;
    var $nombre;
    var $apellido;
    var $telefono;
    var $fechaNacimiento;

    function __construct($idPaciente,$usuario_idUsuario,$nombre,$apellido,$telefono,$fechaNacimiento){

        $this->idPaciente = $idPaciente;
        $this->usuario_idUsuario = $usuario_idUsuario;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->telefono = $telefono;
        $this->fechaNacimiento = $fechaNacimiento;

    }

    //Funciones o métodos
    function setIdPaciente($idPaciente){

        $this->idPaciente = $idPaciente;

    }

    function getIdPaciente(){

        return $this->idPaciente;

    }

    function setUsuario_idUsuario($usuario_idUsuario){

        $this->usuario_idUsuario = $usuario_idUsuario;

    }

    function getUsuario_idUsuario(){

        return $this->usuario_idUsuario;

    }

    function setNombre($nombre){

        $this->nombre = $nombre;

    }

    function getNombre(){

        return $this->nombre;

    }

    function setApellido($apellido){

        $this->apellido = $apellido;

    }

    function getApellido(){

        return $this->apellido;

    }

    function setTelefono($telefono){

        $this->telefono = $telefono;

    }

    function getTelefono(){

        return $this->telefono;

    }

    function setFechaNacimiento($fechaNacimiento){

        $this->fechaNacimiento = $fechaNacimiento;

    }

    function getFechaNacimiento(){

        return $this->fechaNacimiento;

    }
}

?>