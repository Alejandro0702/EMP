<?php
    header("Content-type: application/json; charset=utf-8");
    $input = json_decode(file_get_contents("php://input"), true);
    require_once('../php/crud/usuario.php');
    $output = array("RESPUESTA" => "");
    $usr = new Usuario();
    if( !empty($input["ID"]) ){
        try {
            $id = $input["ID"];
            $usr->id = $id;
            $usr->Eliminar($usr);
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