<?php include_once ($_SERVER['DOCUMENT_ROOT'].'/EMP/config.php'); ?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Estructuras Metálicas - Trabajos</title>
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="css/styles.css" rel="stylesheet" />
        <link href="../css/style_principal.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="../css/style_trabajos.css" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
        
        <!-- Data Table -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
        <script type="text/javascript" charset="utf8" src="../js/script_DataTable.js"> </script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.php">Estructuras Metálicas</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i><?php print $_SESSION['nombre']." ". $_SESSION['apellidoPat'];?></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <!--
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        -->
                        <li><a class="dropdown-item" href="../php/logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Principal
                            </a>
                            <div class="sb-sidenav-menu-heading">Opciones</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Usuarios
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="tipoDeUsuario.php">Tipos de usuario</a>
                                    <a class="nav-link" href="usuario.php">Usuarios</a>
                                </nav>
                            </div>
                           <!--Trabajos-->
                           <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Trabajos
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Piezas
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="tiposDePieza.php">Tipos</a>
                                            <a class="nav-link" href="piezas.php">Piezas +</a>
                                        </nav>
                                    </div>                             
                                </nav>
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="trabajos.php">Trabajos +</a>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <?php print $_SESSION['nombre']." ". $_SESSION['apellidoPat'];?>
                    </div>
                </nav>
            </div>

            <div id="layoutSidenav_content">
                <main>
                    <!-- NAVEGACION SUPERIOR-->
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a id="tab-registrar" class="nav-link active" aria-current="page" href="#">Registro</a>
                        </li>
                        <li class="nav-item">
                            <a id="tab-anadir" class="nav-link" href="#">Añadir Piezas</a>
                        </li>
                        <li class="nav-item">
                            <a id="tab-modificar" class="nav-link" href="#">Modificación</a>
                        </li>
                        <li class="nav-item">
                            <a id="tab-detalles" class="nav-link" href="#">Detalles</a>
                        </li>
                    </ul>

                    <!-- CONTENEDOR DE ACCIONES-->
                    <div class="container-fluid px-4">
                        <!-- CREAR NUEVOS TRABAJOS-->
                        <div id="form-registrar">
                            <h1 class="mt-4">Trabajos</h1>
                            <ol class="breadcrumb mb-4">
                                <li class="breadcrumb-item active">Trabajos registrados en el sistema</li>
                            </ol>
                            <form id="formulario-registrar" action="../php/registroTrabajo.php" method="post" >
                                <label for="id">Número de Trabajo</label>
                                <br>
                                <span id="span_id"></span>
                                <br>
                                <input type="text"  name="id" id="id" placeholder="Escribe un # de trabajo..." title="Solo números" maxlength="8" pattern="[0-9]+" required>
                                <br><br>
                                <button type="submit" class="btn btn-primary" title="Oprima para crear un proyecto nuevo">Crear Nuevo <i class="fa fa-plus-square"></i></button>
                            </form>
                            <br>
                            <hr>
                            <br>
                            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                                <div class="input-group">
                                    <input id="txtFiltro" class="form-control" type="text" placeholder="Buscar..." aria-label="Buscar..." aria-describedby="btnNavbarSearch" />
                                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                                    </div>
                            </form>
                            <!-- -->
                            <button name="n_Eliminar" id="i_Eliminar" class="btn btn-danger" title="Seleccione un trabajo para eliminar">Eliminar   <i class="fa fa-times"></i></button>
                            <form class="derecha mb-0" action="../php/reportes/reporte_trabajo.php" method="post" target="_blank">
                                    <button class="btn btn-info">Imprimir <i class="fa fa-print"></i></button>
                            </form>
                        </div>
                        
                        <!-- AÑADIR PIEZAS A TRABAJOS-->
                        <div id="form-anadir">
                            <div id="formulario_selec_trab" >
                                <div id="formulario_principal">
                                    <h1 class="mt-4">Trabajos</h1>
                                    
                                    <ol class="breadcrumb mb-4">
                                        <li class="breadcrumb-item active">Añadir piezas a trabajos</li>
                                    </ol>
                                    <form id="formulario_anadir" name="formulario_anadir" action="" method="" >
                                        <label for="idJob">Número de Trabajo</label>
                                        <br>
                                        <input type="text"  name="idJob" id="idJob" placeholder="Selecciona un Trabajo..." title="Seleccione un trabajo de la tabla a su derecha" maxlength="5" required>
                                        <br>
                                        <label for="nota">Nota: </label>
                                        <br>
                                        <input type="text"  name="nota" id="nota" placeholder="Agrega una Nota..." maxlength="150" pattern="[A-Za-z]+" title="Solo letras y números" required>
                                        <br><br>
                                        <button id="btn_Anadir" name="btn_Anadir" type="submit" class="btn btn-primary" title="Añadir todas las piezas agregadas a la tabla 'Piezas Añadidas'">Añadir todos <i class="fa fa-check"></i></button>
                                    </form>
                                </div>
                                <div id="tablas_trab_pz">
                                    <h3>Selecciona un trabajo</h3>
                                    <?php
                                    require_once CRUD_PATH.'trabajos.php';
                                    $trabajos = new Trabajos();
                                    $result = $trabajos->Consulta_Todos_sd();
                                    if(mysqli_num_rows($result) > 0)
                                    {
                                        $table = '
                                        <table id="tabla_trab" class="table table-striped table-bordered" border=1 style="font-size: 85%;">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th scope="col">JOB ID</th>
                                                    <th scope="col">Fecha de creación</th>
                                                </tr>
                                            </thead>
                                            <tbody>
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
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th scope="col">JOB ID</th>
                                                    <th scope="col">Fecha de creación</th>
                                                </tr>
                                            </tfoot>
                                        </table>';
                                        echo $table;
                                    }
                                    ?>

                                </div>
                            </div>
                            
                            <br>
                            <h5>Piezas Añadidas:</h5>
                                <button id="quitar" name="quitar" type="button" class="btn btn-danger" title="Quitar de la lista la pieza seleccionada">Quitar Pieza</button>
                            <br><br>
                            <table id="tabla-pz-anadir" border=1 class="table table-striped table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">DESCRIPCIÓN</th>
                                        <th scope="col">LENGHT</th>
                                        <th scope="col">WEIGHT</th>
                                        <th scope="col">PROFILE</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                            
                            <br>
                            <hr>
                            <h5>Piezas:</h5>
                            <button id="Seleccionar" name="Seleccionar" type="button" class="btn btn-secondary" title="Oprime para añadir a la lista de piezas">Seleccionar</button>
                        </div>



                        <!-- MODIFICAR TRABAJOS (AÑADIR O QUITAR PIEZAS)-->
                        <div id="form-modificar">
                            <div id="formulario_Rangos_tablas">
                                <div id="formulario_Rangos">
                                    <h1 class="mt-4">Trabajos</h1>
                                    <ol class="breadcrumb mb-4">
                                        <li class="breadcrumb-item active">Modificar piezas en producción</li>
                                    </ol>
                                    <form id="formulario_rangos" name="formulario_rangos" action="" method="">
                                        <div class="row">
                                            <div class="col">
                                                <label for="idJob_">Número de Trabajo</label><br>
                                                <input type="text"  name="idJob_" id="idJob_" class="form-control" placeholder="Selecciona un Trabajo..." maxlength="5" required disabled>
                                            </div>
                                            <div class="col">
                                            <label for="idPz_">Pieza - Trabajo</label><br>
                                            <input type="text"  name="idPz_" id="idPz_" class="form-control" placeholder="Pieza..." maxlength="5" required disabled>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <label for="CL">CL: </label><br>
                                                <input type="text"  name="CL" id="CL" class="form-control" placeholder="CL..." maxlength="30">
                                            </div>
                                            <div class="col">
                                                <label for="HEAT">HEAT: </label><br>
                                                <input type="text"  name="HEAT" id="HEAT" class="form-control" placeholder="HEAT..." maxlength="30">
                                            </div>
                                        </div>
                                        <br>
                                        <!--Rangos-->
                                        <div class="row">
                                            <div class="col">
                                                <label for="FU">FU: </label>
                                                <span id="FU_SPAN"></span><br>
                                                <input class="form-range" type="range" name="FU" id="FU" min="0" max="100" step="10" onchange="Valor_FU()">
                                            </div>
                                            <div class="col">
                                                <label for="Q_C">Q.C.: </label>
                                                <span id="Q_C_SPAN"></span><br>
                                                <input class="form-range" type="range"  name="Q_C" id="Q_C" min="0" max="100" step="10" onchange="Valor_Q_C()">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <label for="W">W: </label>
                                                <span id="W_SPAN"></span><br>
                                                <input class="form-range" type="range"  name="W" id="W" min="0" max="100" step="10" onchange="Valor_W()">
                                            </div>
                                            <div class="col">
                                                <label for="CLEAN">CLEAN: </label>
                                                <span id="CLEAN_SPAN"></span><br>
                                                <input class="form-range" type="range"  name="CLEAN" id="CLEAN"  min="0" max="100" step="10" onchange="Valor_CLEAN()">
                                            </div>
                                        </div>
                                        <br>
                                        <button id="btn_Mod" name="btn_Mod" type="button" class="btn btn-primary">Modificar  <i class="fa fa-check"></i></button>
                                        <button id="i_Eliminar_Pieza" class="btn btn-danger">Eliminar Pieza</button>
                                    </form>
                                </div>
                            </div>
                            <hr>
                            
                            <?php
                            require_once CRUD_PATH.'trabajos.php';
                            $trabajos = new Trabajos();
                            $result = $trabajos->Consulta_Todos();
                            if(mysqli_num_rows($result) > 0)
                            {
                                $table = '
                                <table id="tabla_det_res" class="table table-striped table-bordered" border=1 style="font-size: 85%;">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">JOB ID</th>
                                            <th scope="col">ID JOB-PZ</th>
                                            <th scope="col">ID PZ</th>
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
                                        </tr>
                                    </thead>
                                    <tbody>
                                ';
                                while($row = mysqli_fetch_array($result))
                                {
                                    $table .= '
                                            <tr>
                                                <td>'.$row["JOB ID"].'</td>
                                                <td>'.$row["ID JOB-PZ"].'</td>
                                                <td>'.$row["ID PZ"].'</td>
                                                <td>'.$row["DESCRIPTION"].'</td>
                                                <td>'.$row["PROFILE"].'</td>
                                                <td>'.$row["LENGHT"].'</td>
                                                <td>'.$row["W(LBS)"].'</td>
                                                <td>'.$row["CL"].'</td>
                                                <td>'.$row["HEAT"].'</td>
                                                <td>'.$row["FU"].'%</td>
                                                <td>'.$row["QC"].'%</td>
                                                <td>'.$row["W"].'%</td>
                                                <td>'.$row["CLEAN"].'%</td>
                                                <td>'.$row["FINISH"].'%</td>
                                            </tr>
                                    ';
                                }
                                $table .= '
                                    </tbody>
                                    <tfoot class="thead-dark">
                                        <tr>
                                            <th scope="col">JOB ID</th>
                                            <th scope="col">ID JOB-PZ</th>
                                            <th scope="col">ID PZ</th>
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
                                        </tr>
                                    </tfoot>
                                </table>';
                                echo $table;
                            }
                            ?>
                        </div><!-- MODIFICAR TRABAJOS (AÑADIR O QUITAR PIEZAS)-->



                        <!-- IMPRIMIR TRABAJOS CON DETALLES -->
                        <div id="form-detalles">
                            <h1 class="mt-4">Trabajos</h1>
                            <ol class="breadcrumb mb-4">
                                <li class="breadcrumb-item active">Detalles de los trabajos</li>
                            </ol>
                            <form id="formulario_detalles" name="formulario_detalles" action="../php/reportes/reporte_trabajo-detalles.php" method="POST" target="_blank" >
                                <label for="idJob">Número de Trabajo</label>
                                <br>
                                <input type="text"  name="idJob" id="idJob" placeholder="Escribe # de Trabajo para imprimir..." maxlength="5">
                                <div class="form-check">
                                    <input name="printAll" class="form-check-input" type="checkbox" value="1" id="flexCheckChecked">
                                    <label class="form-check-label" for="flexCheckChecked">
                                        Imprimir todo
                                    </label>
                                </div>
                                
                                <button id="btn_imprimirDet" name="btn_imprimirDet" type="submit" class="btn btn-primary">Imprimir <i class="fa fa-print"></i></button>
                            </form>
                            <hr>
                        </div>

                        <br>
                        
                        <div id="tabla-jobs">
                            <?php
                                require_once CRUD_PATH.'trabajos.php';
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
                                        <tbody>
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
                                        </tbody>
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
                        </div>
                        <div id="tabla-piezas">
                            <?php
                            require_once CRUD_PATH.'Pieza.php';
                            $pieza = new Pieza();
                            $result = $pieza->Consulta_Todos();
                            if(mysqli_num_rows($result) > 0)
                            {
                                $table = '
                                <table id="tabla-pz" name="tabla-pz" border=1 class="display">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">LENGHT</th>
                                            <th scope="col">WEIGHT</th>
                                            <th scope="col">PROFILE</th>
                                        </tr>
                                    </thead>
                                    <tbody>
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
                                $table .= '
                                    </tbody>
                                </table>';
                                echo $table;
                            }
                            ?>
                        </div>
                        <div id="tabla-trabajos-det">
                            <?php
                                require_once CRUD_PATH.'trabajos.php';
                                $trabajos = new Trabajos();
                                $result = $trabajos->Consulta_Todos();
                                if(mysqli_num_rows($result) > 0)
                                {
                                    $table = '
                                    <table id="tabla_det" class="table table-striped table-bordered" border=1 style="font-size: 85%;">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th scope="col">JOB ID</th>
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
                                                    <td>'.$row["ID PZ"].'</td>
                                                    <td>'.$row["ID JOB-PZ"].'</td>
                                                    <td>'.$row["QTY"].'</td>
                                                    <td>'.$row["DESCRIPTION"].'</td>
                                                    <td>'.$row["PROFILE"].'</td>
                                                    <td>'.$row["LENGHT"].'</td>
                                                    <td>'.$row["W(LBS)"].'</td>
                                                    <td>'.$row["CL"].'</td>
                                                    <td>'.$row["HEAT"].'</td>
                                                    <td>'.$row["FU"].'%</td>
                                                    <td>'.$row["QC"].'%</td>
                                                    <td>'.$row["W"].'%</td>
                                                    <td>'.$row["CLEAN"].'%</td>
                                                    <td>'.$row["FINISH"].'%</td>
                                                    <td>'.$row["DD"].'</td>
                                                    <td>'.$row["NOTE"].'</td>
                                                </tr>
                                        ';
                                    }
                                    $table .= '</table>';
                                    echo $table;
                                }
                            ?>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2022</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
        <script src="../js/script_FiltroTabla.js"></script>
        <script src="../js/script_tabla_trabajos.js"></script>
        <script src="../js/script_Reg-Mod_job.js"></script>
        <script src="../js/js_crud/script_trabajos.js"></script>
        
    </body>
</html>
