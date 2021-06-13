<?php

class Profesional extends Usuario
{
    //Variables o atributos
    var $idProfesional;
    var $usuario_idUsuario;
    var $nombre;
    var $apellido;
    var $tituloProfesional;
    var $tarjetaProfesional;
    var $estadoTarjeta;
    var $estado;

    function __construct($idProfesional,$usuario_idUsuario,$nombre,$apellido,$tituloProfesional,$tarjetaProfesional,$estadoTarjeta,$estado){

        $this->idProfesional = $idProfesional;
        $this->usuario_idUsuario = $usuario_idUsuario;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->tituloProfesional = $tituloProfesional;
        $this->tarjetaProfesional = $tarjetaProfesional;
        $this->estadoTarjeta = $estadoTarjeta;
        $this->estado = $estado;
        

    }

    //Funciones o métodos
    function setIdProfesional($idProfesional){

        $this->idProfesional = $idProfesional;

    }

    function getIdProfesional(){

        return $this->idProfesional;

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

    function setTituloProfesional($tituloProfesional){

        $this->tituloProfesional = $tituloProfesional;

    }

    function getTituloProfesional(){

        return $this->tituloProfesional;

    }

    function setTarjetaProfesional($tarjetaProfesional){

        $this->tarjetaProfesional = $tarjetaProfesional;

    }

    function getTarjetaProfesional(){

        return $this->tarjetaProfesional;

    }

    
    function setEstadoTarjeta($estadoTarjeta){

        $this->estadoTarjeta = $estadoTarjeta;

    }

    function getEstadoTarjeta(){

        return $this->estadoTarjeta;

    }


    
    function setEstado($estado){

        $this->estado = $estado;

    }

    function getEstado(){

        return $this->estado;

    }


   
}

?>