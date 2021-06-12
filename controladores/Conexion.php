
<?php
//Aquí creo la conexion con la base de datos 
class Conexion{
    private $con;
    public function __construct()
    {
        $this->con = new mysqli('localhost','root','','');
    }

    //Se crean los métodos para el CRUD de la base de datos
}
?>