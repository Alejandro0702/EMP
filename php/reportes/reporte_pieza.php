<?php  ob_start(); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Estructuras Metálicas - Piezas</title>
        <link rel="stylesheet" href="../../css/normalize.css">
        <link rel="stylesheet" href="../../css/reportes.css">
    </head>
    <body>
    <?php
        include_once ($_SERVER['DOCUMENT_ROOT'].'/EMP/config.php');
        require_once CSS_PATH.'encabezado.php';
        require_once CRUD_PATH.'Pieza.php';
        echo '
        <div>
            <h2>Reporte de piezas</h2>
        </div>
        ';
        $pieza = new Pieza();
        $result = $pieza->Consulta_Todos();
        if(mysqli_num_rows($result) > 0)
        {
            $table = '
            <table id="tabla" border=1 class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">LENGHT</th>
                        <th scope="col">WEIGHT</th>
                        <th scope="col">PROFILE</th>
                    </tr>
                </thead>
            ';
            while($row = mysqli_fetch_array($result))
            {
                $table .= '
                    <tr>
                        <td>'.$row["ID"].'</td>
                        <td>'.$row["LENGHT"].'</td>
                        <td>'.$row["WEIGHT"].'</td>
                        <td>'.$row["PROFILE"].'</td>
                    </tr>
                ';
            }
            $table .= '</table>';
            echo $table;
        }
    ?>
    </body>
</html>
<?php
    $html = ob_get_clean();
    include_once ($_SERVER['DOCUMENT_ROOT'].'/EMP/config.php');
    require_once MODEL_PATH.'Generarpdf.php';
    GenerarPdf::Generar($html, 'letter', 'Reporte_Piezas_'.date('d-m-Y'));
?>