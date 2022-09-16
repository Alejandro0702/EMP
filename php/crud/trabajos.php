<?php
    require_once('../php/conexion.php');
    class Trabajos{
        public $id;
        private $tabla;

        function __construct()
        {
            $con = new Conexion();
        }
        public function Registrar($obj){
           
        }

        public function Consultar($obj){
          
        }

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
        public function Actualizar($obj){
           
        }

        public function Eliminar($obj){
           
        }

    }

?>