<?php
    include('../php/crud/tipoUsuario.php');
    
    $tipoUsr = new tipoUsuario();
    if( !empty($_POST['descr']) ){
        $tipoUsr->desc = $_POST['descr'];
        $tipoUsr->Registrar($tipoUsr);
        header('Location: ../dashboard/tipoDeUsuario.php?registro=1');
    }
    else{
        header('Location: ../dashboard/tipoDeUsuario.php?registro=0');
    }
?>