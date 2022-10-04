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
        include CRUD_PATH.'tipoUsuario.php';
        echo '
        <div class="header-text text-center">
            <h4>Reporte de tipos de usuario</h4>
        </div>
        <br>
        ';
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
                            <td >'.$row["ID"].'</td>
                            <td >'.$row["Descripcion"].'</td>
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
    require_once MODEL_PATH.'Generarpdf.php';
    GenerarPdf::Generar($html, 'letter', 'Reporte_Tipos-De-Usuario_'.date('d-m-Y'));
?>