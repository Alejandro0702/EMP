<?php

use FontLib\Table\Type\post;

    include_once ($_SERVER['DOCUMENT_ROOT'].'/EMP/config.php');
    require_once CRUD_PATH.'trabajos.php';
    $job = new Trabajos();
    if( !empty($_POST['id']) ){
        try {
            $job->id = $_POST['id'];
            $job->Registrar($job);
            header('Location: ../principal/trabajos.php?registro=1');
        } catch (\Throwable $th) {
            header('Location: ../principal/trabajos.php?registro=0');   
        }
    }
    else{
        header('Location: ../principal/trabajos.php?registro=0');   
    }
?>