<?php
    header("Content-type: application/json; charset=utf-8");
    include_once ($_SERVER['DOCUMENT_ROOT'].'/EMP/config.php');
    require_once CRUD_PATH.'Pieza_Trabajo.php';

    $piezaT = new Pieza_Trabajo();
    $input = json_decode(file_get_contents("php://input"), true);
    $output = array("RESPUESTA" => "");

    if( !empty($input['IDJ']) && !empty($input['IDPZ'])
    && !empty($input['NOTE']) && !empty($input['DESCR']) ){
        try {
            $m = Matriz($input['IDPZ'], $input['DESCR']);
            $piezaT->id_job = $input['IDJ'];
            $piezaT->NOTE = $input['NOTE'];
            /*
            foreach ($input['IDPZ'] as $valor) {
                $piezaT->id_pz = $valor;
                $piezaT->Registrar($piezaT);
            }*/
            for ($i=0; $i < count($input['IDPZ']); $i++) { 
                $piezaT->id_pz = $m[$i][0];
                $piezaT->descr = $m[$i][1];
                $piezaT->Registrar($piezaT);
            }
            $output["RESPUESTA"] = "correcto";
        } catch (\Throwable $th) {
            $output["RESPUESTA"] = "Error al añadir piezas".$th;
        }
    }
    else{
        $output["RESPUESTA"] = "error Vacio";
    }
    echo json_encode($output);

    function Matriz($arr1, $arr2){
        $m = array();
        for ($i=0; $i < count($arr1); $i++) { 
            $m[$i][0]= $arr1[$i];
            $m[$i][1]= $arr2[$i];
        }
        return $m;
    }
?>