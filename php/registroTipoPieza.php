<?php
    include_once ($_SERVER['DOCUMENT_ROOT'].'/EMP/config.php');
    require_once CRUD_PATH.'tipoPieza.php';
    //require_once('../php/crud/tipoPieza.php');
    $tipoPz = new TipoPieza();
    if( !empty($_POST['descr']) && !empty($_POST['medida1']) 
    && !empty($_POST['medida2']) && !empty($_POST['sel_medida1']) 
    && !empty($_POST['sel_medida2']) && !empty($_POST['id'])){

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
            header('Location: ../principal/tiposDePieza.php?registro=1');
        } catch (\Throwable $th) {
            header('Location: ../principal/tiposDePieza.php?registro=0');
        }
    }
    else{
        header('Location: ../principal/tiposDePieza.php?registro=0');
    }
?>