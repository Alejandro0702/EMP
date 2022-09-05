<?php

class Conexion
{
    public $SQL_SERVER;
    public $SQL_USER;
    public $SQL_PASS;
    public $SQL_DB;
    public $conexion;
    function __construct()
    {
        $this->SQL_SERVER = "localhost";
        $this->SQL_USER = "root";
        $this->SQL_PASS = "";
        $this->SQL_DB = "StructuralSteel_db";
    }
    function Conectar(){
        $this->conexion = mysqli_connect(
            $this->SQL_SERVER,
            $this->SQL_USER,
            $this->SQL_PASS,
            $this->SQL_DB
        );
        $this->conexion->set_charset("utf8");
        if (mysqli_connect_errno()) {
            echo ("Error al conectar con el servidor.");
        }
        else{
            echo("Conectado ;)");
        }
    }
    function Desconectar(){
        mysqli_close($this->conexion);
    }
}    
?>
