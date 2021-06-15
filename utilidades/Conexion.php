<?php
class Conexion {

    public function __construct(){

    }

  public function conexion() {
    try {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $db_name = "id17038902_koe";

        $conn = new mysqli($servername, $username, $password, $db_name);
        if ($conn -> connect_errno) {
          echo "Failed to connect to MySQL: " . $conn -> connect_error;
      } else {
          return $conn;
      }
    } catch (Exception $error) {
      return false; 
    }
  }
}
?>