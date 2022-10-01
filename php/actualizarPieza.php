<?php
    require_once('../php/crud/Pieza.php');
    $pieza = new Pieza();
    if( !empty($_POST['id']) && !empty($_POST['descr']) && !empty($_POST['long']) &&
        !empty($_POST['peso'])  && !empty($_POST['sel_Tipo'])){
        $pieza->id = $_POST['id'];
        $pieza->desc = $_POST['descr'];
        $pieza->lenght = $_POST['long'];
        $pieza->weight = $_POST['peso'];
        $pieza->id_profile_pz = $_POST['sel_Tipo'];
        $pieza->Actualizar($pieza);
        header('Location: ../principal/piezas.php?actualizacion=1');
    }
    else{
        header('Location: ../principal/piezas.php?actualizacion=0');
    }
?>