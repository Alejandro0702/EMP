<?php
    require_once('../php/conexion.php');
    class Trabajos{
        public $id;
        private $tabla;
        function __construct()
        {
            $con = new Conexion();
        }
        public function Registrar(){
            $con = new Conexion();
            $con->Conectar();
            $sql = "CALL pr_Generar_Trabajo();";
            if ($con->conexion->query($sql) === TRUE) {
                $msj =  '<script>console.log("New record created successfully")</script>';
                $msj = "Correcto";
            } else {
                $msj =  "Error: " . $sql . "<br>" . $con->error;
                $msj = "Error";
            }
            $con->Desconectar();
        }

        public function Consultar($obj){
          
        }
        // Consulta de Trabajos con detalles
        public function Consulta_Todos(){
            $con = new Conexion();
            $con->Conectar();
            $sql = "CALL pr_Consulta_Trabajos();";
            $result = $con->conexion->query($sql);
            if ($result->num_rows < 0) {
                return null;
            } else {
                return $result;
            }
            $con->Desconectar();
        }
        //Consulta de trabajos sin detalles
        public function Consulta_Todos_sd(){
            $con = new Conexion();
            $con->Conectar();
            $sql = "CALL pr_Consulta_Trabajos_sd();";
            $result = $con->conexion->query($sql);
            if ($result->num_rows < 0) {
                return null;
            } else {
                return $result;
            }
            $con->Desconectar();
        }
        public function Actualizar($obj){
           
        }

        public function Eliminar($obj){
           
        }

    }

?>