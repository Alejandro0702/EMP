<?php
    include_once ($_SERVER['DOCUMENT_ROOT'].'/EMP/config.php');
    require_once CRUD_PATH.'usuario.php';
    //require_once('../php/crud/usuario.php');
    $usr = new Usuario();
    if(
        !empty($_POST['nombre']) && !empty($_POST['apPat']) && !empty($_POST['apMat'])
        && !empty($_POST['tel']) && !empty($_POST['email']) && !empty($_POST['nomUsr'])
        && !empty($_POST['pass']) && !empty($_POST['sel_Tipo'] && !empty($_POST['id']))
    ){
        $usr->id = $_POST['id'];
        $usr->nombre = $_POST['nombre'];
        $usr->apellidoPat = $_POST['apPat'];
        $usr->apellidoMat = $_POST['apMat'];
        $usr->numero = $_POST['tel'];
        $usr->correo = $_POST['email'];
        $usr->nom_usr = $_POST['nomUsr'];
        $usr->pswrd = $_POST['pass'];
        $usr->idTipo_usr = $_POST['sel_Tipo'];
        $usr->Actualizar($usr);
        header('Location: ../principal/usuario.php?actualizacion=1');
    }
    else{
        header('Location: ../principal/usuario.php?actualizacion=0');
    }
?>