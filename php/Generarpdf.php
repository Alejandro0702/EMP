<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/EMP/config.php');
require_once PDF_PATH.'autoload.inc.php';
use Dompdf\Dompdf;
class GenerarPdf
{    
    static function Generar($html, $tipoHoja, $nombre){
        $dompdf = new Dompdf();
        $options = $dompdf->getOptions();
        $options->set(array('isRemoteEnabled' => true )); //mostrar imagenes
        $dompdf->setOptions($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper($tipoHoja);
        //$dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream($nombre, array("Attachment" => false ));
    }
}
?>