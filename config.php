<?php
    date_default_timezone_set('America/Los_Angeles');
    define('ROOT_PATH', $_SERVER['DOCUMENT_ROOT'].'/EMP/');
    define('MODEL_PATH', ROOT_PATH.'php/');
    define('CRUD_PATH', MODEL_PATH.'crud/');
    define('REP_PATH', MODEL_PATH.'reportes/');
    define('CSS_PATH', MODEL_PATH.'php_css/');
    define('PDF_PATH', MODEL_PATH.'libreria/dompdf/');
    include_once MODEL_PATH.'sesion.php';
    Sesion::Comprobar();
?>