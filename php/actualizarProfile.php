<?php
    header("Content-type: application/json; charset=utf-8");
    include_once ($_SERVER['DOCUMENT_ROOT'].'/EMP/config.php');
    require_once CRUD_PATH.'tipoPieza.php';
    $input = json_decode(file_get_contents("php://input"), true);
    $output = array("RESPUESTA" => "");
    $tipoPz = new TipoPieza();

    if( !empty($input["MED"]) && !empty($input["SEL"])
    && !empty($input["ID"])){
        try {
            $tipoPz->id = $input["ID"];
            $tipoPz->desc = Concatenar($input["MED"], $input["SEL"], $input["DESCR"]);
            $tipoPz->Actualizar($tipoPz);
            $output["RESPUESTA"] = "correcto";
        } catch (\Throwable $th) {
            $output["RESPUESTA"] = "error";
        }
    }
    else
        $output["RESPUESTA"] = "error Vacio";    
    
    echo json_encode($output);
    
    function Concatenar($arr1, $arr2, $d){
        $x = $d. " ";
        for ($i=1; $i <= count($arr1) ; $i++) { 
            if($arr2[$i-1] == "pulgada")
                $x .= $arr1[$i-1] . '"' ;
            else
                $x .= $arr1[$i-1] . "''" ;
            if($i < count($arr1))
                $x .= "x";
        }
        return $x;
    }
?>