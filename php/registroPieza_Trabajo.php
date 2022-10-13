<?php
    header("Content-type: application/json; charset=utf-8");
    include_once ($_SERVER['DOCUMENT_ROOT'].'/EMP/config.php');
    require_once CRUD_PATH.'Pieza_Trabajo.php';

    $piezaT = new Pieza_Trabajo();
    $input = json_decode(file_get_contents("php://input"), true);
    $output = array("RESPUESTA" => "");

    if( !empty($input['IDJ']) && !empty($input['IDPZ']) && !empty($input['NOTE'])){
        try {
            $piezaT->id_job = $input['IDJ'];
            $piezaT->NOTE = $input['NOTE'];
            foreach ($input['IDPZ'] as $valor) {
                $piezaT->id_pz = $valor;
                $piezaT->Registrar($piezaT);
            }
            $output["RESPUESTA"] = "correcto";
        } catch (\Throwable $th) {
            $output["RESPUESTA"] = "Error al añadir piezas";
        }
    }
    else{
        $output["RESPUESTA"] = "error Vacio";
    }
    echo json_encode($output);
?>