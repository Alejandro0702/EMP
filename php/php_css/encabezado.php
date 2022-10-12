<?php
    require_once ($_SERVER['DOCUMENT_ROOT'].'/EMP/config.php');
    $DateAndTime = date('d/m/Y h:i:s a', time());
    echo '
    <style>
        h2{
            text-align: center;
        }
        #tabla {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
            font-size: 80%;
        }
        #tabla th {
            padding-top: 6px;
            padding-bottom: 6px;
            text-align: left;
            background-color: #00571a;
            color: white;
        }
        #tabla td, #tabla th {
            border: 1px solid #ddd;
            padding: 3px;
        }
        p{
            font-size: 80%;
        }
        
    </style>
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