<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title><?=$this->fungsi->RS()->nama_rs?></title>
        <!-- Favicon -->
        <link rel="shortcut icon" href="<?=site_url('uploads/images/rs/'.$this->fungsi->RS()->icon_rs)?>" />
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="<?=site_url('assets/backend/')?>css/bootstrap.min.css">
        <!-- Typography CSS -->
        <link rel="stylesheet" href="<?=site_url('assets/backend/')?>css/typography.css">
        <!-- Style CSS -->
        <link rel="stylesheet" href="<?=site_url('assets/backend/')?>css/style.css">
        <!-- Responsive CSS -->
        <link rel="stylesheet" href="<?=site_url('assets/backend/')?>css/responsive.css">
        <!-- jquery confirm css -->
        <link href='<?=site_url('assets/backend/')?>jquery-confirm/css/jquery-confirm.css' rel='stylesheet' />

        <script src="<?=site_url('assets/backend/')?>js/jquery.min.js"></script>

    </head>
    <body>
        <!-- loader Start -->
        <div id="loading" style="background: #fff url('<?=site_url("uploads/images/rs/".$this->fungsi->RS()->icon_rs)?>') no-repeat scroll center center;  ">
            <div id="loading-center">
            </div>
        </div>
        <!-- loader END -->
      
        <!-- Wrapper Start -->
        <div class="wrapper">
            <!-- Sidebar  -->
            <div class="iq-sidebar">
                <div class="iq-sidebar-logo d-flex justify-content-between">
                    <a href="index.html">
                        <img src="<?=site_url('uploads/images/rs/'.$this->fungsi->RS()->logo_rs)?>" class="img-fluid" alt="">
                    </a>
                    <div class="iq-menu-bt-sidebar">
                        <div class="iq-menu-bt align-self-center">
                            <div class="wrapper-menu">
                                <div class="main-circle"><i class="ri-more-fill"></i></div>
                                <div class="hover-circle"><i class="ri-more-2-fill"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="sidebar-scrollbar">
                    <nav class="iq-sidebar-menu">
                        <ul id="iq-sidebar-toggle" class="iq-menu">
                            <li class="<?= is_nav(@$pg, 'dashboard') ?>">
                                <a href="<?=site_url(set_url('dashboard'))?>" class="iq-waves-effect">
                                    <i class="ri-home-8-fill"></i>
                                    <span>Dashboard</span>
                                </a>
                            </li>
                            <li class="<?= is_nav(@$pg, 'artikel') ?>">
                                <a href="<?=site_url(set_url('artikel'))?>" class="iq-waves-effect">
                                    <i class="ri-device-fill"></i>
                                    <span>Artikel</span>
                                </a>
                            </li>
                            <li class="<?= is_nav(@$pg, 'banner') ?>">
                                <a href="<?=site_url(set_url('banner'))?>" class="iq-waves-effect">
                                    <i class="ri-hospital-fill"></i>
                                    <span>Banner</span>
                                </a>
                            </li>
                            <li class="<?= is_nav(@$pg, 'anggota') ?>">
                                <a href="#anggota" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false">
                                    <i class="fa fa-users"></i>
                                    <span>Anggota System</span>
                                    <i class="ri-arrow-right-s-line iq-arrow-right"></i>
                                </a>
                                <ul id="anggota" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                                    <!-- <li>
                                        <a href="<?=site_url(set_url('dokter'))?>">
                                            <i class="fa fa-user-md"></i>Dokter
                                        </a>
                                    </li> -->
                                    <li>
                                        <a href="<?=site_url(set_url('anggota'))?>">
                                            <i class="ri-profile-fill"></i>Admin
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="<?= is_nav(@$pg, 'tentang') ?>">
                                <a href="#rs" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false">
                                    <i class="ri-apps-fill"></i>
                                    <span>Tentang Kami</span>
                                    <i class="ri-arrow-right-s-line iq-arrow-right"></i>
                                </a>
                                <ul id="rs" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                                    <li>
                                        <a href="<?=site_url(set_url('rs/sejarah'))?>">
                                            <i class="ri-profile-fill"></i>Sejarah RSPAU
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?=site_url(set_url('rs/profile'))?>">
                                            <i class="ri-profile-fill"></i>Profil RSPAU
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?=site_url(set_url('rs/visimisi'))?>">
                                            <i class="ri-profile-fill"></i>Visi Misi RSPAU
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?=site_url(set_url('rs/struktur'))?>">
                                            <i class="ri-profile-fill"></i>Struktur Organisasi
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?=site_url(set_url('pmkp'))?>">
                                            <i class="ri-profile-fill"></i>Indikator Mutu PMKP
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?=site_url(set_url('partner'))?>">
                                            <i class="ri-profile-fill"></i>Kerjasama
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="<?= is_nav(@$pg, 'fasilitas') ?>">
                                <a href="#pelayanan" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false">
                                    <i class="ri-table-fill"></i>
                                    <span>Fasilitas</span>
                                    <i class="ri-arrow-right-s-line iq-arrow-right"></i>
                                </a>
                                <ul id="pelayanan" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                                    <li>
                                        <a href="<?=site_url(set_url('layanan'))?>">
                                            <i class="ri-profile-fill"></i>Alat / Layanan
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?=site_url(set_url('layanan/tambahan/igd'))?>">
                                            <i class="ri-profile-fill"></i>Instalasi Gawat Darurat
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?=site_url(set_url('layanan/tambahan/belum'))?>">
                                            <i class="ri-profile-fill"></i>Layanan Yang Belum Tersedia
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?=site_url(set_url('layanan/tambahan/wbk'))?>">
                                            <i class="ri-profile-fill"></i>WBK dan WBBM
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="<?= is_nav(@$pg, 'alur') ?>">
                                <a href="#alur" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false">
                                    <i class="lab la-mendeley"></i>
                                    <span>Alur Pelayanan</span>
                                    <i class="ri-arrow-right-s-line iq-arrow-right"></i>
                                </a>
                                <ul id="alur" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                                    <li>
                                        <a href="<?=site_url(set_url('alur/index/irj'))?>">
                                            <i class="ri-profile-fill"></i>Instalasi Rawat Jalan
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?=site_url(set_url('alur/index/igd'))?>">
                                            <i class="ri-profile-fill"></i>Instalasi Gawat Darurat
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?=site_url(set_url('alur/index/iri'))?>">
                                            <i class="ri-profile-fill"></i>Instalasi Rawat Inap
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?=site_url(set_url('alur/index/icu'))?>">
                                            <i class="ri-profile-fill"></i>ICU
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?=site_url(set_url('alur/index/jkn'))?>">
                                            <i class="ri-profile-fill"></i>JKN/BPJS
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="<?= is_nav(@$pg, 'ppid') ?>">
                                <a href="#ppid" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false">
                                    <i class="ri-sensor-line"></i>
                                    <span>PPID</span>
                                    <i class="ri-arrow-right-s-line iq-arrow-right"></i>
                                </a>
                                <ul id="ppid" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                                    <li>
                                        <a href="<?=site_url(set_url('ppid/index/apaitu'))?>">
                                            <i class="ri-profile-fill"></i>Apa itu PPID
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?=site_url(set_url('ppid/bagian/layanan'))?>">
                                            <i class="ri-profile-fill"></i>Layanan
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?=site_url(set_url('ppid/bagian/informasi'))?>">
                                            <i class="ri-profile-fill"></i>Informasi Publik
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?=site_url(set_url('ppid/index/regulasi'))?>">
                                            <i class="ri-profile-fill"></i>Regulasi PPID
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="<?= is_nav(@$pg, 'saran') ?>">
                                <a href="<?=site_url(set_url('saran'))?>" class="iq-waves-effect">
                                    <i class="ri-archive-fill"></i>
                                    <span>Kotak Saran</span>
                                </a>
                            </li>
                            <li class="<?= is_nav(@$pg, 'testimoni') ?>">
                                <a href="<?=site_url(set_url('testimoni'))?>" class="iq-waves-effect">
                                    <i class="ri-store-line"></i>
                                    <span>Testimoni</span>
                                </a>
                            </li>
                            <li class="<?= is_nav(@$pg, 'pengaturan') ?>">
                                <a href="#pengaturan" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false">
                                    <i class="ri-settings-3-fill"></i>
                                    <span>Pengaturan</span>
                                    <i class="ri-arrow-right-s-line iq-arrow-right"></i>
                                </a>
                                <ul id="pengaturan" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                                    <li>
                                        <a href="<?=site_url(set_url('rs/infodasar'))?>">
                                            <i class="ri-profile-fill"></i>Informasi Dasar
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?=site_url(set_url('rs/tatatertib'))?>">
                                            <i class="ri-profile-fill"></i>Tata Tertib
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?=site_url(set_url('callcenter'))?>">
                                            <i class="ri-profile-fill"></i>Nomor Call Center
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?=site_url(set_url('faq'))?>" class="iq-waves-effect">
                                            <i class="ri-hospital-fill"></i>
                                            <span>Faq</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?=site_url(set_url('rs/privacy'))?>" class="iq-waves-effect">
                                            <i class="ri-hospital-fill"></i>
                                            <span>Privacy Policy</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?=site_url(set_url('rs/zona'))?>" class="iq-waves-effect">
                                            <i class="ri-hospital-fill"></i>
                                            <span>Zona Integritas</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?=site_url(set_url('rs/edukasi'))?>" class="iq-waves-effect">
                                            <i class="ri-hospital-fill"></i>
                                            <span>Edukasi</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?=site_url(set_url('rs/rekanan'))?>" class="iq-waves-effect">
                                            <i class="ri-hospital-fill"></i>
                                            <span>Kelengkapan Pencatatan Rekanan</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?=site_url(set_url('rs/statis'))?>" class="iq-waves-effect">
                                            <i class="ri-hospital-fill"></i>
                                            <span>Link Statis</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- <li class="<?= is_nav(@$pg, 'ppid') ?>">
                                <a href="#ppid" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false">
                                    <i class="ri-copper-coin-fill"></i>
                                    <span>PPID</span>
                                    <i class="ri-arrow-right-s-line iq-arrow-right"></i>
                                </a>
                                <ul id="ppid" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                                    <li>
                                        <a href="<?=site_url(set_url('ppid/apaitu'))?>">
                                            <i class="ri-profile-fill"></i> Apa itu PPID
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?=site_url(set_url('ppid/regulasi'))?>">
                                            <i class="ri-profile-fill"></i> Regulasi PPID
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?=site_url(set_url('pangkat'))?>">
                                            <i class="ri-profile-fill"></i>Pangkat
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?=site_url(set_url('poli'))?>">
                                            <i class="ri-profile-fill"></i>Poli
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?=site_url(set_url('kategori'))?>">
                                            <i class="ri-profile-fill"></i>Kategori Artikel
                                        </a>
                                    </li> -->
                                    <!-- <li>
                                        <a href="<?=site_url(set_url('partner'))?>">
                                            <i class="ri-profile-fill"></i>Partner
                                        </a>
                                    </li>
                                </ul>
                            </li> -->
                            <li>
                                <a href="<?=site_url(set_url('auth/logout'))?>" class="iq-waves-effect">
                                    <i class="ri-login-box-line"></i>
                                    <span>Logout</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <div class="p-3"></div>
                </div>
            </div>
            
            <!-- Page Content  -->
            <div id="content-page" class="content-page">
                <!-- TOP Nav Bar -->
                <div class="iq-top-navbar">
                    <div class="iq-navbar-custom">
                        <div class="iq-sidebar-logo">
                            <div class="top-logo">
                                <a href="index.html" class="logo">
                                    <img src="<?=site_url('uploads/images/rs/'.$this->fungsi->RS()->logo_rs)?>" class="img-fluid" alt="">
                                    <!-- <span>RS</span> -->
                                </a>
                            </div>
                        </div>
                        <nav class="navbar navbar-expand-lg navbar-light p-0">
                            <!-- <div class="iq-search-bar">
                                <form action="#" class="searchbox">
                                    <input type="text" class="text search-input" placeholder="Type here to search...">
                                    <a class="search-link" href="#"><i class="ri-search-line"></i></a>
                                </form>
                            </div>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <i class="ri-menu-3-line"></i>
                            </button> -->
                            <div class="iq-menu-bt align-self-center">
                                <div class="wrapper-menu">
                                    <div class="main-circle"><i class="ri-more-fill"></i></div>
                                    <div class="hover-circle"><i class="ri-more-2-fill"></i></div>
                                </div>
                            </div>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav ml-auto navbar-list">
                                    <li class="nav-item iq-full-screen">
                                        <a href="#" class="iq-waves-effect" id="btnFullscreen"><i class="ri-fullscreen-line"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <ul class="navbar-list">
                                <li>
                                    <a href="#" class="search-toggle iq-waves-effect d-flex align-items-center">
                                        <img src="<?=site_url('assets/backend/')?>images/user/1.jpg" class="img-fluid rounded mr-3" alt="user">
                                        <div class="caption">
                                            <h6 class="mb-0 line-height"><?=$_SESSION['username_anggota']?></h6>
                                            <!-- <span class="font-size-12">Available</span> -->
                                        </div>
                                    </a>
                                    <div class="iq-sub-dropdown iq-user-dropdown">
                                        <div class="iq-card shadow-none m-0">
                                            <div class="iq-card-body p-0 ">
                                                <div class="bg-primary p-3">
                                                    <h5 class="mb-0 text-white line-height"><?=$_SESSION['username_anggota']?></h5>
                                                    <!-- <span class="text-white font-size-12">Available</span> -->
                                                </div>
                                                <a href="profile.html" class="iq-sub-card iq-bg-primary-hover">
                                                    <div class="media align-items-center">
                                                        <div class="rounded iq-card-icon iq-bg-primary">
                                                            <i class="ri-file-user-line"></i>
                                                        </div>
                                                        <div class="media-body ml-3">
                                                            <h6 class="mb-0 ">My Profile</h6>
                                                            <p class="mb-0 font-size-12">View personal profile details.</p>
                                                        </div>
                                                    </div>
                                                </a>
                                                <a href="profile-edit.html" class="iq-sub-card iq-bg-primary-hover">
                                                    <div class="media align-items-center">
                                                        <div class="rounded iq-card-icon iq-bg-primary">
                                                            <i class="ri-profile-line"></i>
                                                        </div>
                                                        <div class="media-body ml-3">
                                                            <h6 class="mb-0 ">Edit Profile</h6>
                                                            <p class="mb-0 font-size-12">Modify your personal details.</p>
                                                        </div>
                                                    </div>
                                                </a>
                                                <a href="account-setting.html" class="iq-sub-card iq-bg-primary-hover">
                                                    <div class="media align-items-center">
                                                        <div class="rounded iq-card-icon iq-bg-primary">
                                                            <i class="ri-account-box-line"></i>
                                                        </div>
                                                        <div class="media-body ml-3">
                                                            <h6 class="mb-0 ">Account settings</h6>
                                                            <p class="mb-0 font-size-12">Manage your account parameters.</p>
                                                        </div>
                                                    </div>
                                                </a>
                                                <a href="privacy-setting.html" class="iq-sub-card iq-bg-primary-hover">
                                                    <div class="media align-items-center">
                                                        <div class="rounded iq-card-icon iq-bg-primary">
                                                            <i class="ri-lock-line"></i>
                                                        </div>
                                                        <div class="media-body ml-3">
                                                            <h6 class="mb-0 ">Privacy Settings</h6>
                                                            <p class="mb-0 font-size-12">Control your privacy parameters.</p>
                                                        </div>
                                                    </div>
                                                </a>
                                                <div class="d-inline-block w-100 text-center p-3">
                                                    <a class="bg-primary iq-sign-btn" href="<?=site_url(set_url('admin/auth/logout'))?>" role="button">Sign out
                                                        <i class="ri-login-box-line ml-2"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
             
                <?= $template ?>
                
                <!-- Footer -->
                <footer class="bg-white iq-footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-6">
                                <ul class="list-inline mb-0">
                                    <!-- <li class="list-inline-item"><a href="privacy-policy.html">Privacy Policy</a></li>
                                    <li class="list-inline-item"><a href="terms-of-service.html">Terms of Use</a></li> -->
                                </ul>
                            </div>
                            <div class="col-lg-6 text-right">
                                Copyright 2020 <a href="#">RSPAU</a> All Rights Reserved.
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- Footer END -->
            </div>
        </div>
          <!-- Wrapper END -->



        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="<?=site_url('assets/backend/')?>js/bootstrap.min.js"></script>
        <!-- Wow JavaScript -->
        <script src="<?=site_url('assets/backend/')?>js/wow.min.js"></script>
        <!-- Smooth Scrollbar JavaScript -->
        <script src="<?=site_url('assets/backend/')?>js/smooth-scrollbar.js"></script>
        <!-- Hash Change JavaScript -->
        <script src="<?=site_url('assets/backend/')?>js/jquery.hashchange.min.js"></script>

        <!-- jquery confirm JavaScript -->
        <script src="<?=site_url('assets/backend/')?>jquery-confirm/js/jquery-confirm.js"></script>

        <!-- Chart Custom JavaScript -->
        <script src="<?=site_url('assets/backend/')?>js/chart-custom.js"></script>

        <!-- Custom JavaScript -->
        <script src="<?=site_url('assets/backend/')?>js/custom.js"></script>
        
        <script>
            var site_url = "<?=site_url(set_url(@$this->uri->segment(2)))?>"
            var base_url = "<?=base_url()?>"
        </script>
        <!-- site JavaScript -->
        <script src="<?=site_url('assets/backend/')?>js/backend/site.js"></script>  
        

    </body>
</html>
