<?php

class Voluntario extends Usuario
{
    //Variables o atributos
    var $idVoluntario;
    var $usuario_idUsuario;
    var $nombre;
    var $apellido;
    var $ocupacion;
    var $estadoCapacitacion;
    var $estado;

    function __construct($idProfesional,$usuario_idUsuario,$nombre,$apellido,$ocupacion,$estadoCapacitacion,$estado){


        $this->idProfesional = $idProfesional;
        $this->usuario_idUsuario = $usuario_idUsuario;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->ocupacion = $ocupacion;
        $this->estadoCapacitacion = $estadoCapacitacion;
        $this->estado = $estado;

    }

    //Funciones o métodos
    function setIdVoluntario($idVoluntario){

        $this->idVoluntario = $idVoluntario;

    }

    function getIdVoluntario(){

        return $this->idVoluntario;

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

    function setOcupacion($ocupacion){

        $this->ocupacion = $ocupacion;

    }

    function getTituloProfesional(){

        return $this->ocupacion;

    }

    

    
    function setEstadoCapacitacion($estadoTarjeta){

        $this->estadoTarjeta = $estadoTarjeta;

    }

    function getEstadoCapacitacion(){

        return $this->estadoTarjeta;

    }


    
    function setEstado($estado){

        $this->estado = $estado;

    }

    function getEstado(){

        return $this->estado;

    }


   
}