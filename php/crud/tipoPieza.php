<?php
    require_once('../php/conexion.php');
    class TipoPieza{
        public $id;
        public $desc;
        public $msj;
        private $tabla;
        function __construct()
        {
            $con = new Conexion();
        }
        public function Registrar($obj){
            /*
                MEJORAS:
                    PARA REGISTRAR MEDIDA DE PIE (COMILLA SIMPLE: ')
                    ES NECESARIO PONER DOS COMILLAS SIMPLES O MARCA ERROR
            */
            $con = new Conexion();
            $con->Conectar();
            $tabla = "profile_pieza";
            $sql = "INSERT INTO ". $tabla ."
            VALUES (null, '". $obj->desc. "');";
            if ($con->conexion->query($sql) === TRUE) {
                $msj = '<script>console.log("New record created successfully")</script>';
            } else {
                $msj = "Error: " . $sql . "<br>" . $con->error;
            }
            $con->Desconectar();
        }

        public function Consultar($obj){
            $con = new Conexion();
            $con->Conectar();
            $tabla = "profile_pieza";
            $sql = "SELECT idTipo_usr as 'ID', descr as 'Descripcion' FROM ". $tabla. " WHERE id_profile_pz = ". $obj->id . " ;";
            $result = $con->conexion->query($sql);
            if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $msj = "<br>ID: " . $row["ID"]. " - Name: " . $row["Descripcion"]. "<br>";
            }
            } else {
                $msj = "0 results";
            }
            $con->Desconectar();
        }

        public function Consulta_Todos(){
            $con = new Conexion();
            $con->Conectar();
            $tabla = "profile_pieza";
            $sql = "SELECT id_profile_pz as 'ID', descr as 'Descripcion' FROM ". $tabla. ";";
            $result = $con->conexion->query($sql);
            if ($result->num_rows < 0) {
                return null;
            } else {
                return $result;
            }
            $con->Desconectar();
        }
        public function Actualizar($obj){
            $con = new Conexion();
            $con->Conectar();
            $tabla = "profile_pieza";
            $sql = "UPDATE ". $tabla ."
            SET descr = '". $obj->desc. "' where id_profile_pz = ".$obj->id.";";
            if ($con->conexion->query($sql) === TRUE) {
                $msj = "New record updated successfully";
            } else {
                $msj = "Error: " . $sql . "<br>" . $con->error;
            }
            $con->Desconectar();
        }

        public function Eliminar($obj){
            $con = new Conexion();
            $con->Conectar();
            $sql = "DELETE FROM profile_pieza 
            where id_profile_pz = ".$obj->id.";";
            if ($con->conexion->query($sql) === TRUE) {
                $msj = "The record deleted successfully";
            } else {
                $msj = "Error: " . $sql . "<br>" . $con->error;
            }
            $con->Desconectar();
        }

    }
?>