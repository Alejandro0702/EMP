<?php
    require_once ($_SERVER['DOCUMENT_ROOT'].'/EMP/config.php');
    $DateAndTime = date('d/m/Y h:i:s a', time());
    echo '
    <header class="header">
        <div class="wrapper">
            <div class="logo">
                <img src="http://'. $_SERVER["HTTP_HOST"]. '/EMP/img/EMP logo.jpg" alt = "EMP">
            </div>
            <br>
        </div>
        <p>Generado el '. $DateAndTime.'</p>
    </header>
    ';
?>