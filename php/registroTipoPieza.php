<?php
    require_once('../php/crud/tipoPieza.php');
    $tipoPz = new TipoPieza();
    if( !empty($_POST['descr']) ){
        $tipoPz->desc = $_POST['descr'];
        $tipoPz->Registrar($tipoPz);
        header('Location: ../principal/tiposDePieza.php?registro=1');
    }
    else{
        header('Location: ../principal/tiposDePieza.php?registro=0');
    }
?>