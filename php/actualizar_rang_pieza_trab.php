<?php
    header("Content-type: application/json; charset=utf-8");
    $input = json_decode(file_get_contents("php://input"), true);
    include_once ($_SERVER['DOCUMENT_ROOT'].'/EMP/config.php');
    require_once CRUD_PATH.'Pieza_Trabajo.php';
    $output = array("RESPUESTA" => "");
    $obj = new Pieza_Trabajo();
    if( !empty($input["ID"]) && !empty($input["CL"]) && !empty($input["HEAT"]) 
    && ( !empty($input["CLEAN"]) || $input["CLEAN"] == 0)
    && ( !empty($input["FU"]) || $input["FU"] == 0)
    && ( !empty($input["QC"]) || $input["QC"] == 0)
    && ( !empty($input["W"]) || $input["W"] == 0))
    {
        try {
            $obj->id = $input["ID"];
            $obj->CL = $input["CL"];
            $obj->HEAT = $input["HEAT"];
            $obj->CLEAN = $input["CLEAN"];
            $obj->FU = $input["FU"];
            $obj->QC = $input["QC"];
            $obj->W = $input["W"];
            $obj->Actualizar_Pieza($obj);
            $output["RESPUESTA"] = "correcto";
        } catch (\Throwable $th) {
            $output["RESPUESTA"] = "error: " + $th;
        }
    }
    else{
        $output["RESPUESTA"] = "error";
    }
    echo json_encode($output);
?>