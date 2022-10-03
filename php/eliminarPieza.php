<?php
    header("Content-type: application/json; charset=utf-8");
    include_once ($_SERVER['DOCUMENT_ROOT'].'/EMP/config.php');
    require_once CRUD_PATH.'Pieza.php';
    //require_once('../php/crud/Pieza.php');
    $input = json_decode(file_get_contents("php://input"), true);
    $output = array("RESPUESTA" => "");
    $pieza = new Pieza();
    if( !empty($input["ID"]) ){
        try {
            $id = $input["ID"];
            $pieza->id = $id;
            $pieza->Eliminar($pieza);
            $output["RESPUESTA"] = "correcto";
        } catch (\Throwable $th) {
            $output["RESPUESTA"] = "error";
        }
    }
    else{
        $output["RESPUESTA"] = "error";
    }
    echo json_encode($output);
?>