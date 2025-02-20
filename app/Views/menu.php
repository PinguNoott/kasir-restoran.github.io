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
      <header class="topbar" data-navbarbg="skin6" style="background-color: #F0F9FF;">
    <nav class="navbar top-navbar navbar-expand-md navbar-light">
        <div class="container-fluid">
            <!-- Logo / Title -->
            <div class="navbar-header" data-logobg="skin6">
                <a class="nav-toggler waves-effect waves-light text-dark d-block d-md-none"
                   href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
            </div>

            <!-- Right Side Navbar -->
            <ul class="navbar-nav ms-auto d-flex align-items-center">
                <!-- Profile Dropdown -->
                <li class="nav-item dropdown">
                    <?php
                    $session = session();
                    $id_user = $session->get('id_user'); // Ambil ID user dari session

                    // Ambil data user dari database
                    $db = \Config\Database::connect();
                    $query = $db->table('user')->where('id_user', $id_user)->get();
                    $user = $query->getRow(); // Ambil satu baris data user

                    // Cek apakah user ditemukan
                    if ($user) {
                        $username = $user->username; // Ambil username dari database
                        $foto = $user->foto; // Ambil foto dari database
                    } else {
                        $username = "Guest"; // Default jika tidak ada user
                        $foto = null;
                    }

                    // Jika tidak ada foto atau foto kosong, gunakan gambar default
                    $fotoProfil = !empty($foto) ? base_url('images/' . $foto) : base_url('images/user.jpg');
                    ?>

                    <a class="nav-link dropdown-toggle text-dark" href="#" id="profileDropdown" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="<?= $fotoProfil ?>" class="rounded-circle" width="40" height="40">
                        <span class="ms-2"><?= htmlspecialchars($username) ?></span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="profileDropdown">
                        <li><a class="dropdown-item" href="<?= base_url('home/profil/' . $id_user) ?>">
                            <i class="fa fa-user me-2"></i> Edit Profile</a>
                        </li>
                        <li><a class="dropdown-item" href="<?= base_url('home/logout') ?>">
                            <i class="fa fa-sign-out-alt me-2"></i> Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
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
                <a class="sidebar-link waves-effect waves-dark"
                   href="<?= base_url('home/dashboard') ?>" aria-expanded="false">
                    <i class="me-3 fas fa-home"></i> 
                    <span class="hide-menu">Dashboard</span>
                </a>
            </li>

            <!-- User Management -->
            <li class="sidebar-item">
                <a class="sidebar-link waves-effect waves-dark"
                   href="<?= base_url('home/user') ?>" aria-expanded="false">
                    <i class="me-3 fas fa-user"></i> 
                    <span class="hide-menu">User</span>
                </a>
            </li>

            <!-- Tugas -->
            <li class="sidebar-item">
                <a class="sidebar-link waves-effect waves-dark"
                   href="<?= base_url('home/tugas') ?>" aria-expanded="false">
                    <i class="me-3 fas fa-tasks"></i> 
                    <span class="hide-menu">Tugas</span>
                </a>
            </li>

            <!-- Daftar Tugas -->
            <li class="sidebar-item">
                <a class="sidebar-link waves-effect waves-dark"
                   href="<?= base_url('home/daftartugas') ?>" aria-expanded="false">
                   <i class="me-3 fas fa-clipboard-list"></i>
                    <span class="hide-menu">Daftar Tugas</span>
                </a>
            </li>

            <!-- Log Activity -->
            <!-- <li class="sidebar-item">
                <a class="sidebar-link waves-effect waves-dark"
                   href="<?= base_url('home/logactivity') ?>" aria-expanded="false">
                    <i class="me-3 fas fa-history"></i> 
                    <span class="hide-menu">Log Activity</span>
                </a>
            </li> -->

            <!-- Setting -->
            <li class="sidebar-item">
                <a class="sidebar-link waves-effect waves-dark"
                   href="<?= base_url('home/setting') ?>" aria-expanded="false">
                    <i class="me-3 fas fa-cog"></i> 
                    <span class="hide-menu">Setting</span>
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