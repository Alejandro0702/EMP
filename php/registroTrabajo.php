<?php
    require_once('../php/crud/trabajos.php');
    $job = new Trabajos();
    try {
        $job->Registrar();
        header('Location: ../principal/trabajos.php?registro=1');
    } catch (\Throwable $th) {
        header('Location: ../principal/trabajos.php?registro=0');   
    }
?>