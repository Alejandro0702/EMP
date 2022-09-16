<?php
    require_once('../php/crud/Pieza.php');
    $pieza = new Pieza();
    if( !empty($_POST['descr']) ){
        $pieza->desc = $_POST['descr'];
        $pieza->Registrar($pieza);
        header('Location: ../principal/piezas.php?registro=1');
    }
    else{
        header('Location: ../principal/piezas.php?registro=0');
    }
?>