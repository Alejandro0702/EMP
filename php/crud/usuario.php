<?php
    include_once ($_SERVER['DOCUMENT_ROOT'].'/EMP/config.php');
    require_once MODEL_PATH."conexion.php";
    class Usuario{
        public $id_usr;
        public $nom_usr;
        public $nombre;
        public $pswrd;
        public $apellidoPat;
        public $apellidoMat;
        public $correo;
        public $numero;
        public $idTipo_usr;
        public $msj;
        private $tabla;
        function __construct()
        {
            $con = new Conexion();
        }
        public function Registrar($obj){
            $con = new Conexion();
            $con->Conectar();
            $tabla = "usuario";
            $sql = "INSERT INTO ". $tabla ."
            VALUES (null,
                '". $obj->nom_usr      ."',
                '". $obj->pswrd         ."',
                '". $obj->nombre        ."',
                '". $obj->apellidoPat   ."',
                '". $obj->apellidoMat   ."',
                '". $obj->correo        ."',
                '". $obj->numero        ."',
                '". $obj->idTipo_usr    ."'
            );";
            if ($con->conexion->query($sql) === TRUE) {
                echo '<script>console.log("Usuario creado correctamente ;)")</script>';
                $msj = "Correcto";
            } else {
                echo "Error: " . $sql . "<br>" . $con->error;
                $msj = "Error";
            }
            $con->Desconectar();
        }

        public function Consultar($obj){

            /*PENDIENTE*/
          
        }

        public function Consulta_Todos(){
            $con = new Conexion();
            $con->Conectar();
            $tabla = "usuario";
            $sql = "SELECT 
            id_usr as 'ID', nomb_usr as 'Usuario',
            pswrd as 'Contraseña', nombre as 'Nombre', apellidoPat as 'Apellido Paterno',
            apellidoMat as 'Apellido Materno', correo as 'Correo', numero as 'Teléfono',
            tipo_usuario.descr as 'Tipo de Usuario'
             FROM ". $tabla. "
             INNER JOIN tipo_usuario on tipo_usuario.idTipo_usr = usuario.idTipo_usr
             order by usuario.id_usr asc;";
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
            $sql = "
                CALL pr_Actualizar_Usr(". $obj->id .",
                '". $obj->nom_usr."', '". $obj->pswrd ."', '". $obj->nombre . "',
                '". $obj->apellidoPat ."', '". $obj->apellidoMat ."', '". $obj->correo ."',
                '". $obj->numero . "', ". $obj->idTipo_usr .");
            ";
            if ($con->conexion->query($sql) === TRUE) {
                $msj = '<script>console.log("Usuario actualizado correctamente ;)")</script>';
                $msj = "Correcto";
            } else {
                $msj = "Error: " . $sql . "<br>" . $con->error;
                $msj = "Error";
            }
            $con->Desconectar();
        }

        public function Eliminar($obj){
            $con = new Conexion();
            $con->Conectar();
            $tabla = " usuario ";
            $sql = "DELETE FROM". $tabla ."
            where id_usr = ". $obj->id. ";";
            if ($con->conexion->query($sql) === TRUE) {
                $msj =  "The record deleted successfully";
            } else {
                $msj = "Error: " . $sql . "<br>" . $con->error;
            }
            $con->Desconectar();
        }

    }//clase
?>