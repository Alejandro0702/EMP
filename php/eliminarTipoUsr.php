<?php
    header("Content-type: application/json; charset=utf-8");
    require_once('../php/crud/tipoUsuario.php');
    $input = json_decode(file_get_contents("php://input"), true);
    $output = array("RESPUESTA" => "");
    $tipoUsr = new tipoUsuario();
    if( !empty($input["ID"]) ){
        try {
            $id = $input["ID"];
            $tipoUsr->id = $id;
            $tipoUsr->Eliminar($tipoUsr);
            $output["RESPUESTA"] = "correcto";
        } catch (\Throwable $th) {
            $output["RESPUESTA"] = "Error";
        }
    }
    else{
        $output["RESPUESTA"] = "error";
    }
    echo json_encode($output);
?>