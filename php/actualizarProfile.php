<?php
    include('../php/crud/tipoPieza.php');
    
    $tipoPz = new TipoPieza();
    if( !empty($_POST['descr']) && !empty($_POST['id']) ){
        try {
            $tipoPz->id = $_POST['id'];
            $tipoPz->desc = $_POST['descr'];
            $tipoPz->Actualizar($tipoPz);
            header('Location: ../principal/tiposDePieza.php?actualizacion=1');
        } catch (\Throwable $th) {
            header('Location: ../principal/tiposDePieza.php?actualizacion=0');    
        }
    }
    else{
        header('Location: ../principal/tiposDePieza.php?actualizacion=0');
    }
?>