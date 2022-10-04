<?php
    include_once ($_SERVER['DOCUMENT_ROOT'].'/EMP/config.php');
    require_once CRUD_PATH.'Pieza.php';
    //require_once('../php/crud/Pieza.php');
    $pieza = new Pieza();
    if( !empty($_POST['descr']) && !empty($_POST['long']) &&
        !empty($_POST['peso'])  && !empty($_POST['sel_Tipo'])){
        Comilla($_POST['descr']);
        $pieza->desc = $_POST['descr'];
        //$pieza->lenght = $_POST['long'];
        $pieza->lenght = Comilla($_POST['long']);
        $pieza->weight = $_POST['peso'];
        $pieza->id_profile_pz = $_POST['sel_Tipo'];
        $pieza->Registrar($pieza);
        header('Location: ../principal/piezas.php?registro=1');
    }
    else{
        header('Location: ../principal/piezas.php?registro=0');
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