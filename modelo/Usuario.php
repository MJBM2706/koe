<?php

class Usuario
{
    //Variables o atributos
    var $idUsuario;
    var $correo;
    var $password;
    

    function __construct($idUsuario,$correo,$password){

        $this->idUsuario = $idUsuario;
        $this->correo = $correo;
        $this->password = $password;

    }

    //Funciones o métodos
    function setIdUsuario($idUsuario){

        $this->idUsuario = $idUsuario;

    }

    function getIdUsuario(){

        return $this->idUsuario;

    }

    function setCorreo($correo){

        $this->correo = $correo;

    }

    function getCorreo(){

        return $this->correo;

    }

    function setPassword($password){

        $this->password = $password;

    }

    function getPassword(){

        return $this->password;

    }

}

?>