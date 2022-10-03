<?php  ob_start(); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Estructuras Metálicas - Tipos de Usuario</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="../../css/reportes.css">
    </head>
    <body>
    <?php
        include_once ($_SERVER['DOCUMENT_ROOT'].'/EMP/config.php');
        require_once CSS_PATH.'encabezado.php';
        include CRUD_PATH.'tipoUsuario.php';
        $tipoUsr = new tipoUsuario();
        $result = $tipoUsr->Consulta_Todos();
        if(mysqli_num_rows($result) > 0)
        {
            $table = '
            <table id="tabla_" class="table table-sm table-striped table-bordered" border=1>
                <thead class="thead-dark">
                    <tr>
                        <th scope="col"> ID </th>
                        <th scope="col">Descripción</th>            
                    </tr>
                </thead>
                
            ';
            while($row = mysqli_fetch_array($result))
            {
                $table .= '
                    
                        <tr>
                            <td>'.$row["ID"].'</td>
                            <td>'.$row["Descripcion"].'</td>
                        </tr>
                    
                ';
            }
            
            $table .= '
                    <tfoot class="thead-dark">
                    <tr>
                        <th scope="col"> ID </th>
                        <th scope="col">Descripción</th>
                    </tr>
                </tfoot>
            </table>';
            echo $table;
        }
    ?>
    </body>
</html>
<?php
    $html = ob_get_clean();
    
    include_once ($_SERVER['DOCUMENT_ROOT'].'/EMP/config.php');
    require_once PDF_PATH.'autoload.inc.php';
    //require_once('./php/libreria/dompdf/autoload.inc.php');
    use Dompdf\Dompdf;
    $dompdf = new Dompdf();
    
    $options = $dompdf->getOptions();
    $options->set(array('isRemoteEnabled' => true )); //mostrar imagenes
    $dompdf->setOptions($options);

    $dompdf->loadHtml($html);
    $dompdf->setPaper('letter');
    //$dompdf->setPaper('A4', 'landscape');
    $dompdf->render();
    $dompdf->stream("reporte.pdf", array("Attachment" => false ));
    
    //echo $html;
?>