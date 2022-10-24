<?php  ob_start(); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Estructuras Metálicas - Trabajos - Detalles</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="../../css/normalize.css">
        <link rel="stylesheet" href="../../css/reportes.css">
    </head>
    <body>
    <?php
        include_once ($_SERVER['DOCUMENT_ROOT'].'/EMP/config.php');
        require_once CSS_PATH.'encabezado.php';
        require_once CRUD_PATH.'trabajos.php';
        echo '
        <div>
            <h2>Reporte de trabajos</h2>
        </div>
        ';
        $trabajos = new Trabajos();
        $result = null;
        if(empty($_POST['printAll']) && !empty($_POST['idJob'])){
            $id = $_POST['idJob'];
            $trabajos->id = $id;
            
            $result = $trabajos->Consultar($trabajos);
        }
        else{
            $result = $trabajos->Consulta_Todos();
        }
        if(mysqli_num_rows($result) > 0)
        {
            $table = '
            <table id="tabla" border=1 style="font-size: 85%;">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">JOB ID</th>
                        <th scope="col">P.O.</th>
                        <th scope="col">ID PZ</th>
                        <th scope="col">ID JOB-PZ</th>
                        <th scope="col">QTY</th>
                        <th scope="col">DESCRIPTION</th>
                        <th scope="col">PROFILE</th>
                        <th scope="col">LENGHT</th>
                        <th scope="col">W(LBS)</th>
                        <th scope="col">CL</th>
                        <th scope="col">HEAT</th>
                        <th scope="col">FU</th>
                        <th scope="col">QC</th>
                        <th scope="col">W</th>
                        <th scope="col">CLEAN</th>
                        <th scope="col">FINISH</th>
                        <th scope="col">DD</th>
                        <th scope="col">NOTE</th>
                    </tr>
                </thead>
                <tfoot class="thead-dark">
                    <tr>
                        <th scope="col">JOB ID</th>
                        <th scope="col">P.O.</th>
                        <th scope="col">ID PZ</th>
                        <th scope="col">ID JOB-PZ</th>
                        <th scope="col">QTY</th>
                        <th scope="col">DESCRIPTION</th>
                        <th scope="col">PROFILE</th>
                        <th scope="col">LENGHT</th>
                        <th scope="col">W(LBS)</th>
                        <th scope="col">CL</th>
                        <th scope="col">HEAT</th>
                        <th scope="col">FU</th>
                        <th scope="col">QC</th>
                        <th scope="col">W</th>
                        <th scope="col">CLEAN</th>
                        <th scope="col">FINISH</th>
                        <th scope="col">DD</th>
                        <th scope="col">NOTE</th>
                    </tr>
                </tfoot>
            ';
            while($row = mysqli_fetch_array($result))
            {
                $table .= '
                        <tr>
                            <td>'.$row["JOB ID"].'</td>
                            <td>'.$row["P.O."].'</td>
                            <td>'.$row["ID PZ"].'</td>
                            <td>'.$row["ID JOB-PZ"].'</td>
                            <td>'.$row["QTY"].'</td>
                            <td>'.$row["DESCRIPTION"].'</td>
                            <td>'.$row["PROFILE"].'</td>
                            <td>'.$row["LENGHT"].'</td>
                            <td>'.$row["W(LBS)"].'</td>
                            <td>'.$row["CL"].'</td>
                            <td>'.$row["HEAT"].'</td>
                            <td '.Color($row["FU"]).'>'.$row["FU"].'%</td>
                            <td '.Color($row["QC"]).'>'.$row["QC"].'%</td>
                            <td '.Color($row["W"]).'>'.$row["W"].'%</td>
                            <td '.Color($row["CLEAN"]).'>'.$row["CLEAN"].'%</td>
                            <td '.Color($row["FINISH"]).'>'.$row["FINISH"].'%</td>
                            <td>'.$row["DD"].'</td>
                            <td>'.$row["NOTE"].'</td>
                        </tr>
                ';
            }
            $table .= '</table>';
            echo $table;
        }
        function Color($x){
            $num = str_replace('%','', $x);
            if( (10 <= $num) && ($num < 30 )) //Avance entre 10 y 29
                return 'bgcolor="#cfffca"';
            if( (30 <= $num) && ($num < 50 )) //Avance entre 30 y 49
                return 'bgcolor="#a5eea0"';
            if( (50 <= $num) && ($num < 70 )) //Avance entre 50 y 69
                return 'bgcolor="#77dd77"';
            if( (70 <= $num) && ($num < 100 )) //Avance entre 70 y 99
                return 'bgcolor="#5dc460"';
            if( $num == 100) //Avance 100%
                return 'bgcolor="#42ab49"';
            return '';
        }
    ?>
    </body>
</html>
<?php
    $html = ob_get_clean();
    include_once ($_SERVER['DOCUMENT_ROOT'].'/EMP/config.php');
    require_once MODEL_PATH.'Generarpdf.php';
    GenerarPdf::Generar_Orientacion($html, 'folio', 'landscape', 'Reporte_Trabajos-Detalles_'.date('d-m-Y'));
?>