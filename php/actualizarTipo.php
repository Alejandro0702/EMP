<?php
    include('../php/crud/tipoUsuario.php');
    
    $tipoUsr = new tipoUsuario();
    if( !empty($_POST['descr']) && !empty($_POST['id']) ){
        try {
            $tipoUsr->id = $_POST['id'];
            $tipoUsr->desc = $_POST['descr'];
            $tipoUsr->Actualizar($tipoUsr);
            header('Location: ../principal/tipoDeUsuario.php?actualizacion=1');
        } catch (\Throwable $th) {
            header('Location: ../principal/tipoDeUsuario.php?actualizacion=0');    
        }
    }
    else{
        header('Location: ../principal/tipoDeUsuario.php?actualizacion=0');
    }
?>