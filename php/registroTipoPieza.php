<?php
    require_once('../php/crud/tipoPieza.php');
    $tipoPz = new TipoPieza();
    if( !empty($_POST['descr']) && !empty($_POST['medida1']) 
    && !empty($_POST['medida2']) && !empty($_POST['sel_medida1']) 
    && !empty($_POST['sel_medida2']) ){

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
        $tipoPz->Registrar($tipoPz);
        header('Location: ../principal/tiposDePieza.php?registro=1');
    }
    else{
        header('Location: ../principal/tiposDePieza.php?registro=0');
    }
?>