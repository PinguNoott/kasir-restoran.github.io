<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin6">
                
                    <!-- ============================================================== -->
                    <a class="nav-toggler waves-effect waves-light text-dark d-block d-md-none"
                        href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
              
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        
                        <!-- Dashboard -->
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link"
                               href="<?= base_url('home/dashboard') ?>" aria-expanded="false">
                                <i class="me-3 fa fa-tachometer-alt" aria-hidden="true"></i>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>

                                 <!-- Order -->
                      <li class="sidebar-item">
    <a class="sidebar-link waves-effect waves-dark sidebar-link"
       href="<?= base_url('home/order') ?>" aria-expanded="false">
        <!-- Replace with food-related icon, e.g., utensils for food -->
        <i class="me-3 fa fa-utensils" aria-hidden="true"></i>
        <span class="hide-menu">Menu</span> 
    </a>
</li>

                        <!-- User -->
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link"
                               href="<?= base_url('home/user') ?>" aria-expanded="false">
                                <i class="me-3 fa fa-users" aria-hidden="true"></i>
                                <span class="hide-menu">User</span>
                            </a>
                        </li>

                        <!-- Barang -->
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link"
                               href="<?= base_url('home/barang') ?>" aria-expanded="false">
                                <i class="me-3 fa fa-box" aria-hidden="true"></i>
                                <span class="hide-menu">Barang</span>
                            </a>
                        </li>

                        <!-- Transaksi -->
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link"
                               href="<?= base_url('home/transaksi') ?>" aria-expanded="false">
                                <i class="me-3 fa fa-bullhorn" aria-hidden="true"></i>
                                <span class="hide-menu">Transaksi</span>
                            </a>
                        </li>

                       <!-- Restore -->
<li class="sidebar-item">
    <a class="sidebar-link waves-effect waves-dark" href="javascript:void(0);" aria-expanded="false">
        <!-- Update to a more relevant icon for Restore -->
        <i class="me-3 fa fa-undo" aria-hidden="true"></i> 
        <span class="hide-menu">Restore</span>
    </a>
    <ul class="collapse first-level">
        <li class="sidebar-item">
            <a href="<?= base_url('home/ruser') ?>" class="sidebar-link">
                <i class="fa fa-user me-3" aria-hidden="true"></i>
                <span class="hide-menu">Restore User</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="<?= base_url('home/rbarang') ?>" class="sidebar-link">
                <i class="fa fa-cogs me-3" aria-hidden="true"></i>
                <span class="hide-menu">Restore Barang</span>
            </a>
        </li>
    </ul>
</li>

<!-- Setting -->
<li class="sidebar-item">
    <a class="sidebar-link waves-effect waves-dark sidebar-link"
       href="<?= base_url('home/setting') ?>" aria-expanded="false">
        <!-- Update to a more relevant icon for Settings -->
        <i class="me-3 fa fa-cogs" aria-hidden="true"></i> 
        <span class="hide-menu">Setting</span>
    </a>
</li>


                        <!-- Logout -->
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link"
                               href="<?= base_url('home/logout') ?>" aria-expanded="false">
                                <i class="me-3 fa fa-sign-out-alt" aria-hidden="true"></i>
                                <span class="hide-menu">Logout</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-md-6 col-8 align-self-center">
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                            </nav>
                        </div>
                    </div>

                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Sales chart -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- Column -->
                   
                <!-- ============================================================== -->
                <!-- Recent blogss -->
                <!-- ============================================================== -->
            </div>