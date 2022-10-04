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
        <link rel="stylesheet" href="../../css/normalize.css">
        <link rel="stylesheet" href="../../css/reportes.css">
    </head>
    <body>
    <?php
        include_once ($_SERVER['DOCUMENT_ROOT'].'/EMP/config.php');
        require_once CSS_PATH.'encabezado.php';
        require_once CRUD_PATH.'trabajos.php';
        echo '
        <div class="header-text text-center">
            <h4>Reporte de trabajos</h4>
        </div>
        <br>
        ';
        $trabajos = new Trabajos();
        $result = $trabajos->Consulta_Todos_sd();
        if(mysqli_num_rows($result) > 0)
        {
            $table = '
            <table id="tabla" class="table table-striped table-bordered" border=1 style="font-size: 85%;">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">JOB ID</th>
                        <th scope="col">Fecha de creación</th>
                    </tr>
                </thead>
            ';
            while($row = mysqli_fetch_array($result))
            {
                $table .= '
                        <tr>
                            <td>'.$row["JOB ID"].'</td>
                            <td>'.$row["Fecha de registro"].'</td>
                        </tr>
                ';
            }
            $table .= '
                <tfoot class="thead-dark">
                    <tr>
                        <th scope="col">JOB ID</th>
                        <th scope="col">Fecha de creación</th>
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
    require_once MODEL_PATH.'Generarpdf.php';
    GenerarPdf::Generar($html, 'letter', 'Reporte_Trabajos_'.date('d-m-Y'));
?>