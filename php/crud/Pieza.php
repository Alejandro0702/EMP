<?php
    include_once ($_SERVER['DOCUMENT_ROOT'].'/EMP/config.php');
    require_once MODEL_PATH."conexion.php";
    class Pieza{
        public $id;
        public $lenght;
        public $weight;
        public $id_profile_pz;
        
        private $tabla;
        function __construct()
        {
            $con = new Conexion();
        }
        public function Registrar($obj){
            $con = new Conexion();
            $con->Conectar();
            $tabla = "pieza";
            $sql = "INSERT INTO ". $tabla ."
            VALUES (
            null, 
            '". $obj->lenght . "',
            '".$obj->weight."',
            ". $obj->id_profile_pz . ");";
            if ($con->conexion->query($sql) === TRUE) {
                echo '<script>console.log("New record created successfully")</script>';
            } else {
                echo "Error: " . $sql . "<br>" . $con->error;
            }
            $con->Desconectar();
        }

        public function Consultar($obj){
           
        }

        public function Consulta_Todos(){
            $con = new Conexion();
            $con->Conectar();
            $tabla = " pieza ";
            $sql = "SELECT id_pz as 'ID', lenght_pz as 'LENGHT',
            weight_pz as 'WEIGHT', profile_pieza.descr as 'PROFILE'
             FROM ". $tabla. " INNER JOIN profile_pieza ON pieza.id_profile_pz = profile_pieza.id_profile_pz;";
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
            $sql = "CALL pr_Actualizar_Pieza(
                 ". $obj->id .",
                '". $obj->lenght ."', 
                '". $obj->weight ."',
                 ". $obj->id_profile_pz . "
            );";
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
            $sql = "DELETE FROM pieza 
            where id_pz = ".$obj->id.";";
            if ($con->conexion->query($sql) === TRUE) {
                $msj = "The record deleted successfully";
            } else {
                $msj = "Error: " . $sql . "<br>" . $con->error;
            }
            $con->Desconectar();
        }

    }
?>