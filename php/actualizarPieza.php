<?php
    include_once ($_SERVER['DOCUMENT_ROOT'].'/EMP/config.php');
    require_once CRUD_PATH.'Pieza.php';
    $pieza = new Pieza();
    if( !empty($_POST['id']) && !empty($_POST['long']) &&
        !empty($_POST['peso'])  && !empty($_POST['sel_Tipo'])){
        $pieza->id = $_POST['id'];
        $pieza->lenght = Comilla($_POST['long']);
        $pieza->weight = $_POST['peso'];
        $pieza->id_profile_pz = $_POST['sel_Tipo'];
        $pieza->Actualizar($pieza);
        header('Location: ../principal/piezas.php?actualizacion=1');
    }
    else{
        header('Location: ../principal/piezas.php?actualizacion=0');
    }
    function Comilla($x){
        $arr = str_split($x);
        $temp = array();
        $max = count($arr);
        $j = 0;
        for ($i=0; $i < $max; $i++) {
            $temp[$j] = $arr[$i];
            if($arr[$i] == "'"){
                $j++;
                $temp[$j] = "'";
            }
            $j++;
        }
        return implode($temp);
    }
?>