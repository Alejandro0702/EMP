<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Estructuras Metálicas - Tipos de Usuario</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <link href="./css/style.css" rel="stylesheet" />
        <link href="../css/style_principal.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
        <script src="../js/script_tabla.js" defer></script>
        <!-- Data Table -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    </head>
    <body class="sb-nav-fixed">
        <?php
            include_once ($_SERVER['DOCUMENT_ROOT'].'/EMP/config.php');
        ?>
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
                            <a id="tab-modificar" class="nav-link" href="#">Modificación</a>
                        </li>
                    </ul>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Tipos de usuario</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Tipos de usuario que pueden ingresar al sistema</li>
                        </ol>
                        <div id="form-registrar">
                            <div >
                            <form id="formulario" action="../php/registroTipo.php" method="post" class="Borde-Form">
                                <label for="descr">Descripción</label>
                                <br>
                                <input type="text"  name="descr" id="descr" placeholder="Ingresa una descripción" maxlength="25" required>
                                <br><br>
                                <button type="submit" class="btn btn-primary">Registrar  <i class="fa fa-check"></i></button>
                            </form>
                            </div>
                            <br>
                        </span>
                        </div>
                        <div id="form-modificar">
                            <form id="formulario" name= "formulario" action="../php/actualizarTipo.php" method="post" class="Borde-Form">
                                <label for="id">Número Identificador</label>
                                <br>
                                <input type="text"  name="id" id="id" placeholder="ID" maxlength="25" required disabled>
                                <br>
                                <label for="descr">Descripción</label>
                                <br>
                                <input type="text"  name="descr" id="descr" placeholder="Ingresa una descripción" maxlength="25" required>
                                <br><br>
                                <button id="i_Actualizar" type="submit" class="btn btn-primary">Actualizar   <i class="fa fa-refresh"></i></button>
                            </form>
                            <br>
                        </div>


                        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                            <div class="input-group">
                                <input id="txtFiltro" class="form-control" type="text" placeholder="Buscar..." aria-label="Buscar..." aria-describedby="btnNavbarSearch" />
                                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                            </div>
                        </form>

                        <button name="n_Eliminar" id="i_Eliminar" class="btn btn-danger">Eliminar   <i class="fa fa-times"></i></button>
                        <form class="derecha mb-0" action="../php/reportes/reporte_tipo-usr.php" method="post" target="_blank">
                                <button class="btn btn-info">Imprimir <i class="fa fa-print"></i></button>
                        </form>
                        <button id="i_Seleccionar" class="btn btn-success">Seleccionar</button>
                        
                        <!-- -->
                        <?php
                            include CRUD_PATH.'tipoUsuario.php';
                            $tipoUsr = new tipoUsuario();
                            $result = $tipoUsr->Consulta_Todos();
                            if(mysqli_num_rows($result) > 0)
                            {
                                $table = '
                                <table id="tabla" class="table table-striped table-bordered" border=1>
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col"> ID </th>
                                            <th scope="col">Descripción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
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
                                    </tbody>
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
        <script src="../js/js_crud/script_TipoUsr.js"></script>
        <script src="../js/script_Reg-Mod.js"></script>
    </body>
</html>
