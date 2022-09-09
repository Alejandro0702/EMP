<?php
    require_once('../php/conexion.php');
    class tipoUsuario{
        public $id;
        public $desc;
        public $msj;
        private $tabla;
        function __construct()
        {
            $con = new Conexion();
        }
        public function Registrar($obj){
            $con = new Conexion();
            $con->Conectar();
            $tabla = "tipo_usuario";
            $sql = "INSERT INTO ". $tabla ."
            VALUES (null, '". $obj->desc. "');";
            if ($con->conexion->query($sql) === TRUE) {
                echo '<script>console.log("New record created successfully")</script>';
                $msj = "Correcto";
            } else {
                echo "Error: " . $sql . "<br>" . $con->error;
                $msj = "Error";
            }
            $con->Desconectar();
        }

        public function Consultar($obj){
            $con = new Conexion();
            $con->Conectar();
            $tabla = "tipo_usuario";
            $sql = "SELECT idTipo_usr as 'ID', descr as 'Descripcion' FROM ". $tabla. " WHERE idTipo_usr = ". $obj->id . " ;";
            $result = $con->conexion->query($sql);
            if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<br>ID: " . $row["ID"]. " - Name: " . $row["Descripcion"]. "<br>";
            }
            } else {
                echo "0 results";
            }
            $con->Desconectar();
        }

        public function Consulta_Todos(){
            $con = new Conexion();
            $con->Conectar();
            $tabla = "tipo_usuario";
            $sql = "SELECT idTipo_usr as 'ID', descr as 'Descripcion' FROM ". $tabla. ";";
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
            $tabla = "tipo_usuario";
            $sql = "UPDATE ". $tabla ."
            SET descr = '". $obj->desc. "' where idTipo_usr = ".$obj->id.";";
            if ($con->conexion->query($sql) === TRUE) {
                echo "New record updated successfully";
                $msj = "Correcto";
            } else {
                echo "Error: " . $sql . "<br>" . $con->error;
                $msj = "Error";
            }
            $con->Desconectar();
        }

        public function Eliminar($obj){
            $con = new Conexion();
            $con->Conectar();
            $tabla = "tipo_usuario";
            $sql = "DELETE FROM tipo_usuario
            where idTipo_usr = ".$obj->id.";";
            if ($con->conexion->query($sql) === TRUE) {
                echo "The record deleted successfully";
                $msj = "Correcto";
            } else {
                echo "Error: " . $sql . "<br>" . $con->error;
                $msj = "Error";
            }
            $con->Desconectar();
        }

    }
?>