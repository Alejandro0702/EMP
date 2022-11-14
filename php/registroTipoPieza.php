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
            $tipoPz->Registrar($tipoPz);
            $output["RESPUESTA"] = "correcto";
        } catch (\Throwable $th) {
            $output["RESPUESTA"] = "error";
        }
    }
    else
        $output["RESPUESTA"] = "error Vacio";    
    
        echo json_encode($output);
    

    //Ya estaba
    /*
        //Concatenar Descripcion
        $descripcion = $_POST['descr']. " ";
        if($_POST['sel_medida1'] == "pulgada")
            $descripcion = $descripcion. $_POST['medida1'] . '"' ;
        else
            $descripcion = $descripcion. $_POST['medida1'] . "''" ;
        $descripcion = $descripcion. " x ";
        if($_POST['sel_medida2'] == "pulgada")
            $descripcion = $descripcion. $_POST['medida2'] . '"' ;
        else
            $descripcion = $descripcion. $_POST['medida2'] . "''" ;
        $tipoPz->desc = $descripcion;
        $tipoPz->id = $_POST['id'];

        try {
            $tipoPz->Registrar($tipoPz);
            $output["RESPUESTA"] = "correcto";
        } catch (\Throwable $th) {
            $output["RESPUESTA"] = "error";
        }
    
    */
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