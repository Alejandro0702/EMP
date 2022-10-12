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
        echo '
        <div>
            <h2>Reporte de usuarios</h2>
        </div>
        ';
        require_once CRUD_PATH.'usuario.php';
        $usr = new Usuario();
        $result = $usr->Consulta_Todos();
        if(mysqli_num_rows($result) > 0)
        {
            $table = '
            <table id="tabla" border=1 class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col"> ID </th>
                        <th scope="col">Usuario</th>
                        <th scope="col">Contraseña</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido Paterno</th>
                        <th scope="col">Apellido Materno</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Teléfono</th>
                        <th scope="col">Tipo de Usuario</th>
                    </tr>
                </thead>
            ';
            while($row = mysqli_fetch_array($result))
            {
            $table .= '
                <tr>
                    <td>'.$row["ID"].'</td>
                    <td>'.$row["Usuario"].'</td>
                    <td>'.$row["Contraseña"].'</td>
                    <td>'.$row["Nombre"].'</td>
                    <td>'.$row["Apellido Paterno"].'</td>
                    <td>'.$row["Apellido Materno"].'</td>
                    <td>'.$row["Correo"].'</td>
                    <td>'.$row["Teléfono"].'</td>
                    <td>'.$row["Tipo de Usuario"].'</td>
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
    GenerarPdf::Generar($html, 'letter', 'Reporte_Usuarios_'.date('d-m-Y'));
?>