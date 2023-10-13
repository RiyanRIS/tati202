<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="https://adminlte.io/themes/v3/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
</div>

<nav class="main-header navbar navbar-expand navbar-white navbar-light">

    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
</nav>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="index3.html" class="brand-link">
        <img src="https://adminlte.io/themes/v3/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="https://adminlte.io/themes/v3/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Admin</a>
            </div>
        </div>

        <nav class="mt-2" id="nav">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="<?= site_url('home') ?>" class="nav-link" data-nav="home">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Home
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= site_url('siswa') ?>" class="nav-link" data-nav="siswa">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Data Siswa
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= site_url('kelas') ?>" class="nav-link" data-nav="kelas">
                        <i class="nav-icon fas fa-landmark"></i>
                        <p>
                            Data Kelas
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= site_url('kriteria') ?>" class="nav-link" data-nav="kriteria">
                        <i class="nav-icon fas fa-pen-square"></i>
                        <p>
                            Data Kriteria
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= site_url('subkriteria') ?>" class="nav-link" data-nav="subkriteria">
                        <i class="nav-icon fas fa-file-contract"></i>
                        <p>
                            Data Kriteria Detail
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= site_url('nilai') ?>" class="nav-link" data-nav="nilai">
                        <i class="nav-icon fas fa-graduation-cap"></i>
                        <p>
                            Data Nilai
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= site_url('hasil') ?>" class="nav-link" data-nav="nilai">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Hasil
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= site_url('logout') ?>" class="nav-link">
                        <i class="nav-icon fa fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>