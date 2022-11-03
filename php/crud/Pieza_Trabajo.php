<?php
    include_once ($_SERVER['DOCUMENT_ROOT'].'/EMP/config.php');
    require_once MODEL_PATH."conexion.php";
    class Pieza_Trabajo{
        public $id_job_art;
        public $id_job;
        public $id_pz;
        public $qty;
        public $CL;
        public $HEAT;
        public $FU;
        public $QC;
        public $W;
        public $CLEAN;
        public $FINISH;
        public $DD;
        public $NOTE;

        public function Registrar($obj){
            $con = new Conexion();
            $con->Conectar();
            $sql = "CALL pr_Insertar_Piezas_Trabajo(
                $obj->id_job,
                $obj->id_pz,
                '$obj->NOTE'
            );";
            if ($con->conexion->query($sql) === TRUE) {
                $msj= '<script>console.log("New record created successfully")</script>';
            } else {
                $msj="Error: " . $sql . "<br>" . $con->error;
            }
            $con->Desconectar();
        }

        public function Consultar($obj){
           
        }

        public function Consulta_Todos(){
            
        }
        public function Actualizar($obj){
            $sql = "CALL asdasdasdasdasdasdasd(
                $obj->id_job,
                $obj->id_pz,
                $obj->qty,
                $obj->CL,
                $obj->HEAT,
                $obj->FU,
                $obj->QC,
                $obj->W,
                $obj->CLEAN,
                $obj->FINISH,
                $obj->DD,
                $obj->NOTE
            );";
        }
        
        public function Actualizar_Pieza($obj){
            $con = new Conexion();
            $con->Conectar();
            
            $sql = "CALL pr_Actualizar_Piezas_Trabajo (
                ". $obj->id .",
                '". $obj->CL."',
                '".$obj->HEAT."',
                '".$obj->FU."',
                '".$obj->QC."',
                '".$obj->W."',
                '".$obj->CLEAN."',
                '".  $this->Porcentaje($obj)."'
            );";
            if ($con->conexion->query($sql) === TRUE) {
                $msj = '<script>console.log("Usuario actualizado correctamente ;)")</script>';
                $msj = "Correcto";
            } else {
                $msj = "Error: " . $sql . "<br>" . $con->error;
                $msj = "Error";
            }
            $con->Desconectar();
        }
        public function Porcentaje($obj){
            return (($obj->FU + $obj->QC + $obj->W + $obj->CLEAN)/4);
        }


        public function Eliminar($obj){
            $con = new Conexion();
            $con->Conectar();
            $sql = "DELETE FROM job_art where id_job_art = ". $obj->id .";";
            if ($con->conexion->query($sql) === TRUE) {
                $msj =  "The record deleted successfully";
            } else {
                $msj = "Error: " . $sql . "<br>" . $con->error;
            }
            $con->Desconectar();
        }
        
    }
?>