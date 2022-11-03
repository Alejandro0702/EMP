<?php
    header("Content-type: application/json; charset=utf-8");
    include_once ($_SERVER['DOCUMENT_ROOT'].'/EMP/config.php');
    require_once CRUD_PATH.'Pieza_Trabajo.php';
    $input = json_decode(file_get_contents("php://input"), true);
    $output = array("RESPUESTA" => "");
    $obj = new Pieza_Trabajo();
    if( !empty($input["ID"]) ){
        try {
            $id = $input["ID"];
            $obj->id = $id;
            $obj->Eliminar($obj);
            $output["RESPUESTA"] = "correcto";
        } catch (\Throwable $th) {
            $output["RESPUESTA"] = "Error";
        }
    }
    else{
        $output["RESPUESTA"] = "error vacio";
    }
    echo json_encode($output);
?>