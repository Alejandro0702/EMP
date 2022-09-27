<?php
    require_once('../php/conexion.php');
    class Pieza{
        public $id;
        public $desc;
        public $lenght;
        public $weight;
        public $id_profile_pz;
        
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
            $tabla = "pieza";
            $sql = "INSERT INTO ". $tabla ."
            VALUES (
            null, '". $obj->desc. "','".
            $obj->lenght . "','".
            $obj->weight."', ". $obj->id_profile_pz . ");";
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
            $tabla = "pieza";
            $sql = "SELECT id_pz as 'ID', descr as 'Descripcion',
            lenght_pz as 'LENGHT', weight_pz as 'WEIGHT', id_profile_pz as 'PROFILE'
             FROM ". $tabla. ";";
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
                '". $obj->desc ."',
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