<?php 
if(session_status() == PHP_SESSION_NONE){
    session_start();
}
?>
<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sistema Facturacion</title>

    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

    <link href="assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-fw fa-file-invoice-dollar"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Facturacion</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Menu Principal
            </div>

            <!-- Nav Item - Archivos Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseArchivos"
                    aria-expanded="true" aria-controls="collapseArchivos">
                    <i class="fas fa-fw fa-folder-open"></i>
                    <span>Archivos</span>
                </a>
                <div id="collapseArchivos" class="collapse" aria-labelledby="headingArchivos" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                       <a class="collapse-item" href="index.php?c=producto">Productos</a>
                       <a class="collapse-item" href="index.php?c=cliente">Clientes</a>
                       <a class="collapse-item" href="index.php?c=proveedor">Proveedores</a>
                       <a class="collapse-item" href="index.php?c=categoria">Categorias</a>
                       <a class="collapse-item" href="index.php?c=usuario">Usuarios</a>
                       <a class="collapse-item" href="index.php?c=inicio&a=cerrar">Terminar</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Procesos Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProcesos"
                    aria-expanded="true" aria-controls="collapseProcesos">
                    <i class="fas fa-fw fa-cogs"></i>
                    <span>Procesos</span>
                </a>
                <div id="collapseProcesos" class="collapse" aria-labelledby="headingProcesos" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="index.php?c=venta&a=index">Registrar Ventas</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Consultas Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseConsultas"
                    aria-expanded="true" aria-controls="collapseConsultas">
                    <i class="fas fa-fw fa-clipboard-list"></i>
                    <span>Consultas</span>
                </a>
                <div id="collapseConsultas" class="collapse" aria-labelledby="headingConsultas" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="index.php?c=producto">Stock Productos</a>
                        <a class="collapse-item" href="index.php?c=producto">Ventas por Día</a>
                        <a class="collapse-item" href="index.php?c=producto">Ventas por Fecha</a>
                        <a class="collapse-item" href="index.php?c=producto">Ventas por Cliente</a>
                        <a class="collapse-item" href="index.php?c=producto">Ventas por Producto</a>
                        <a class="collapse-item" href="index.php?c=producto">Ranking Ventas</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Herramientas Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseHerramientas"
                    aria-expanded="true" aria-controls="collapseHerramientas">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Herramientas</span>
                </a>
                <div id="collapseHerramientas" class="collapse" aria-labelledby="headingHerramientas" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="cambiarClave.php">Cambiar Password</a>
                    </div>
                </div>
            </li>
           
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

<!-- Main Content -->
<div id="content">

    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button>

        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                        <?php echo $_SESSION["nombre"]; ?></span>
                    <img class="img-profile rounded-circle"
                        src="assets/img/undraw_profile.svg">
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                    aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        Mi Cuenta
                    </a>
                                
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Cerrar Sesión
                     </a>
                </div>
            </li>
        </ul>
    </nav>
    <!-- End of Topbar -->
