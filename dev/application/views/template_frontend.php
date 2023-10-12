<?php 
	global $SConfig;
	$data_tarif = Api_Hardjo(null, $SConfig->api['url_tarif_ruangan']); 
	$rs=$this->db->get('rs')->row();
	// $data_tarif = json_decode(file_get_contents($url));



?>

<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>

<!-- Meta Tags -->
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<meta name="description" content="MedikalPro | Health & Medical Responsive HTML5 Template" />
<meta name="keywords" content="care, clinic, corporate, dental, dentist, doctor" />
<meta name="author" content="ThemeMascot" />

<!-- Page Title -->
<title><?= $rs->nama_rs?></title>

<!-- Favicon and Touch Icons -->
<link href="<?=base_url('uploads/images/rs/'.$rs->logo_rs)?>" rel="shortcut icon" type="image/png">
<!-- <link href="images/apple-touch-icon.png" rel="apple-touch-icon"> -->
<!-- <link href="images/apple-touch-icon-72x72.png" rel="apple-touch-icon" sizes="72x72"> -->
<!-- <link href="images/apple-touch-icon-114x114.png" rel="apple-touch-icon" sizes="114x114"> -->
<!-- <link href="images/apple-touch-icon-144x144.png" rel="apple-touch-icon" sizes="144x144"> -->

<!-- Stylesheet -->
<link href="<?=base_url('assets/frontend/')?>css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="<?=base_url('assets/frontend/')?>css/jquery-ui.min.css" rel="stylesheet" type="text/css">
<link href="<?=base_url('assets/frontend/')?>css/animate.css" rel="stylesheet" type="text/css">
<link href="<?=base_url('assets/frontend/')?>css/css-plugin-collections.css" rel="stylesheet"/>
<!-- CSS | menuzord megamenu skins -->
<link href="<?=base_url('assets/frontend/')?>css/menuzord-megamenu.css" rel="stylesheet"/>
<link id="menuzord-menu-skins" href="<?=base_url('assets/frontend/')?>css/menuzord-skins/menuzord-boxed.css" rel="stylesheet"/>
<!-- CSS | Main style file -->
<link href="<?=base_url('assets/frontend/')?>css/style-main.css" rel="stylesheet" type="text/css">

<!-- CSS -->
<link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">

<!-- CSS | Preloader Styles -->
<!-- <link href="css/preloader.css" rel="stylesheet" type="text/css"> -->

<!-- CSS | Custom Margin Padding Collection -->
<link href="<?=base_url('assets/frontend/')?>css/custom-bootstrap-margin-padding.css" rel="stylesheet" type="text/css">
<!-- CSS | Responsive media queries -->
<link href="<?=base_url('assets/frontend/')?>css/responsive.css" rel="stylesheet" type="text/css">
<!-- CSS | Style css. This is the file where you can place your own custom css code. Just uncomment it and use it. -->
<!-- <link href="css/style.css" rel="stylesheet" type="text/css"> -->

<!-- Revolution Slider 5.x CSS settings -->
<link  href="<?=base_url('assets/frontend/')?>js/revolution-slider/css/settings.css" rel="stylesheet" type="text/css"/>
<link  href="<?=base_url('assets/frontend/')?>js/revolution-slider/css/layers.css" rel="stylesheet" type="text/css"/>
<link  href="<?=base_url('assets/frontend/')?>js/revolution-slider/css/navigation.css" rel="stylesheet" type="text/css"/>

<!-- CSS | Theme Color -->
<link href="<?=base_url('assets/frontend/')?>css/colors/theme-skin-color-set2.css" rel="stylesheet" type="text/css">

<!-- external javascripts -->
<script src="<?=base_url('assets/frontend/')?>js/jquery-2.2.4.min.js"></script>
<script src="<?=base_url('assets/frontend/')?>js/jquery-ui.min.js"></script>
<script src="<?=base_url('assets/frontend/')?>js/bootstrap.min.js"></script>
<!-- JS | jquery plugin collection for this theme -->
<script src="<?=base_url('assets/frontend/')?>js/jquery-plugin-collection.js"></script>

<!-- Revolution Slider 5.x SCRIPTS -->
<script src="<?=base_url('assets/frontend/')?>js/revolution-slider/js/jquery.themepunch.tools.min.js"></script>
<script src="<?=base_url('assets/frontend/')?>js/revolution-slider/js/jquery.themepunch.revolution.min.js"></script>

<!-- JavaScript -->
<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<style>
	@media only screen and (max-width: 600px) {
		.header-top {
			display: none;
		}
	}
</style>
</head>
<body class="">
<div id="wrapper">
	<header id="header" class="header">
    <div class="header-top bg-theme-colored2 sm-text-center">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <div class="widget text-white">
				<i class="fa fa-phone-square text-white"></i> <?= $rs->telp_rs ?> <i class="fa fa-envelope text-white"></i> <?= $rs->email_rs ?>
            </div>
          </div>
          <div class="col-md-4">
            <div class="widget">
			  	<ul class="list-inline text-right flip sm-text-center">
					<li>
						<a class="text-white" href="<?=site_url('frequently-asked-question')?>">FAQ</a>
					</li>
					<li class="text-white">|</li>
					<li>
						<a class="text-white" href="tel:<?= $rs->telp_rs ?>">Help Desk</a>
					</li>
					<li class="text-white">|</li>
					<li>
						<a class="text-white" href="kontak">Support</a>
					</li>
				</ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="header-nav">
      <div class="header-nav-wrapper navbar-scrolltofixed bg-white">
        <div class="container">
          <nav id="menuzord-right" class="menuzord blue no-bg"><a class="menuzord-brand pull-left flip mb-15" href="index-mp-layout1.html"><img src="<?php echo site_url('uploads/images/rs/'.$rs->logo_rs) ?>" alt=""></a>
		  <ul class="menuzord-menu">
							<li class="">
								<a href="<?=site_url()?>">Home</a>
							</li>
							<li>
								<a href="#">Tentang Kami</a>
							  	<ul class="dropdown">
									<li>
										<a href="#">Sejarah RSPAU</a>
									  	<ul class="dropdown">
											<li>
												<a href="<?=site_url('sejarah')?>">Awal berdiri-sekarang</a>
											</li>
											<li>
												<a href="<?=site_url('sejarah-rs-pendidikan')?>">RS Pendidikan</a>
											</li>
											<li>
												<a href="<?=site_url('sejarah-kepemimpian-rspau')?>">Sejarah Pimpinan / Ka RSPAU dari masa ke masa</a>
											</li>
									  	</ul>
									</li>
									<li>
										<a href="<?=site_url('profile-rspau')?>">Profil RSPAU</a>
									</li>
									<li>
										<a href="<?=site_url('visi-misi')?>">Visi dan Misi RSPAU</a>
									</li>
									<li>
										<a href="<?=site_url('lokasi')?>">Lokasi RSPAU</a>
									</li>
									<li>
										<a href="<?=site_url('struktur-organisai')?>">Struktur Organisasi</a>
									</li>
									<li>
										<a href="<?=site_url('indikator-mutu-pmkp')?>">Indikator Mutu PMKP</a>
									</li>
									<li>
										<a href="<?=site_url('kerjasama')?>">Daftar Kerjasama</a>
									</li>
								</ul>
							</li>
							<li>
								<a href="#">Fasilitas</a>
							  	<ul class="dropdown">
									<li>
										<a href="<?=site_url('layanan-unggulan')?>">Alat-Alat Unggulan / Layanan Unggulan</a>
									</li>
									<li>
										<a href="#">Pelayanan Medik</a>
									  	<ul class="dropdown">
											<li>
												<a href="<?=site_url('instalasi-gawat-darurat')?>">Instalasi Gawat Darurat</a>
											</li>
											<li>
												<a href="<?=site_url('instalasi-rawat-jalan')?>">Instalasi Rawat Jalan</a>
											</li>
											<li>
												<a href="<?=site_url('instalasi-rawat-inap')?>">Instalasi Rawat Inap</a>
											</li>
									  	</ul>
									</li>
									<?php 
										$pelayanan_penunjang = $this->db->query("SELECT * FROM layanan WHERE fk_jenis_layanan = '3' ")->result(); 
									?>
									<?php if(!empty($pelayanan_penunjang)){ ?>
										<li>
											<a href="#">Pelayanan Penunjang</a>
										  	<ul class="dropdown">
												<?php foreach($pelayanan_penunjang as $key => $value){ ?>
													<li>
														<a href="<?=site_url('layanan-penunjang/'.$value->id_layanan)?>"><?=$value->nama_layanan?></a>
													</li>
												<?php } ?>
										  	</ul>
										</li>
									<?php } ?>
									<li>
										<a href="<?=site_url('pelayanan-belum-tersedia')?>">Pelayanan yang Belum Tersedia</a>
									</li>
									<li>
										<a href="https://wbs.rspauhardjolukito.com/" target="_blank">Whistleblowing System</a>
									</li>
									<li>
										<a href="<?=site_url('wbk-wbbm')?>">WBK dan WBBM</a>
									</li>
								</ul>
							</li>
							<li>
								<a href="#">Jadwal Pelayanan</a>
							  	<ul class="dropdown">
									<li>
										<a href="<?=site_url('dokter')?>">Dokter</a>
									</li>
									
								</ul>
							</li>
							<li>
								<a href="#">Alur Pelayanan</a>
							  	<ul class="dropdown">
									<li>
										<a href="<?=site_url('alur/irj')?>">Instalasi Rawat Jalan</a>
									</li>
									<li>
										<a href="<?=site_url('alur/igd')?>">Instalasi Gawat Darurat / IGD</a>
									</li>
									<li>
										<a href="<?=site_url('alur/iri')?>">Instalasi Rawat Inap</a>
									</li>
									<li>
										<a href="<?=site_url('alur/icu')?>">ICU</a>
									</li>
									<li>
										<a href="<?=site_url('alur/jkn')?>">JKN/BPJS</a>
									</li>
									
								</ul>
							</li>
							<li>
								<a href="#">PPID</a>
							  	<ul class="dropdown">
									<li>
										<a href="<?=site_url('apa-itu-ppid')?>">Apa itu PPID?</a>
									</li>
									<?php
										$record_pelayanan_ppid = $this->db->query("SELECT * FROM `ppid` WHERE `bagian` = 1 AND `deleteAt` IS NULL")->result();
									?>
									<?php if(!empty($record_pelayanan_ppid)){ ?>
									<li>
										<a href="#">Layanan</a>
									  	<ul class="dropdown">
											<?php foreach($record_pelayanan_ppid as $key => $value){ ?>
												<li>
													<a href="<?=site_url('layanan-ppid/'.$value->id_ppid)?>"><?=$value->judul?></a>
												</li>
											<?php } ?>
										</ul>
									</li>
									<?php } ?>
									<?php 
										$record_informasi_ppid = $this->db->query("SELECT * FROM ppid WHERE bagian = '2' AND deleteAt IS NULL")->result(); 
									?>
									<?php if(!empty($record_informasi_ppid)){ ?>
									<li>
										<a href="#">Informasi Publik</a>
									  	<ul class="dropdown">
											<?php foreach($record_informasi_ppid as $key => $value){ ?>
												<li>
													<a href="<?=site_url('informasi-ppid/'.$value->id_ppid)?>"><?=$value->judul?></a>
												</li>
											<?php } ?>
										</ul>
									</li>
									<?php } ?>
									<li>
										<a href="<?=site_url('regulasi-ppid')?>">Regulasi PPID</a>
									</li>
								</ul>
							</li>
							<li class="">
								<a target="_blank" href="<?= $rs->kepuasan_rs ?>">Kepuasan</a>
							</li>
							<li class="">
								<a href="<?=site_url('kontak')?>">Kontak</a>
							</li>
						</ul>
          </nav>
        </div>
      </div>
    </div>
  </header>
	  
  	<!-- Start main-content -->
  	<div class="main-content"> 
   
   	<?= $template ?>
		
  	<!-- Footer -->
  	<footer id="footer" class="footer bg-black-111">
	  	<div class="container pt-70 pb-40">
			<div class="row border-bottom-black">
		  		<div class="col-sm-6 col-md-3">
					<div class="widget dark" >
			  			<img class="mt-10 mb-20" alt="" src="<?=base_url('uploads/images/rs/'.$rs->logo_rs)?>">
		  				<p style="font-size: 15px !important;"><?=strip_tags(character_limiter($rs->tentang_rs, 250))?></p>
						<ul class="list-inline mt-5">
							<li class="m-0 pl-10 pr-10"> 
								<i class="fa fa-map-marker text-theme-colored mr-5"></i> 
								<a class="text-gray" href="#"><?=$this->fungsi->rs()->alamat_rs?></a> 
							</li>
							<li class="m-0 pl-10 pr-10"> 
								<i class="fa fa-phone text-theme-colored mr-5"></i> 
								<a class="text-gray" href="#"><?=$this->fungsi->rs()->telp_rs?></a> 
							</li>
							<li class="m-0 pl-10 pr-10"> 
								<i class="fa fa-envelope-o text-theme-colored mr-5"></i> 
								<a class="text-gray" href="#"><?=$this->fungsi->rs()->email_rs?></a> 
							</li>
							
						</ul>
					</div>
					<style>
						.styled-icons .fb a{
							background-color: #4867aa !important;
							color:white!important;
						}
						.styled-icons .tw a{
							background-color: #00acee !important;
							color:white!important;
						}
						.styled-icons .yt a{
							background-color: #c4302b !important;
							color:white!important;
						}
						.styled-icons .ig a{
							background-color: #3f729b !important;
							color:white!important;
						}
					</style>
					<div class="widget dark">
					  	<h5 class="widget-title mb-10">Sosial Media</h5>
					  	<ul class="styled-icons icon-dark icon-circled icon-sm">
							<li class="fb">
								<a href="<?=$rs->sosmed_fb?>">
									<i class="fa fa-facebook"></i>
								</a>
							</li>
							<li class="tw">
								<a href="<?=$this->fungsi->rs()->sosmed_tw?>">
									<i class="fa fa-twitter"></i>
								</a>
							</li>
							<!-- <li>
								<a href="<?=$this->fungsi->rs()->sosmed_fb?>">
									<i class="fa fa-skype"></i>
								</a>
							</li> -->
							<li class="yt">
								<a href="<?=$this->fungsi->rs()->sosmed_yt?>"><i class="fa fa-youtube"></i>
								</a>
							</li>
							<li class="ig">
								<a href="<?=$this->fungsi->rs()->sosmed_ig?>">
									<i class="fa fa-instagram"></i>
								</a>
							</li>
							<!-- <li>
								<a href="<?=$this->fungsi->rs()->sosmed_fb?>">
									<i class="fa fa-pinterest"></i>
								</a>
							</li> -->
					  	</ul>
					</div>
	  			</div>
			  	<div class="col-sm-6 col-md-3">
					<div class="widget dark">
				  		<h5 class="widget-title">Fasilitas Daring</h5>
			  			<ul class="list-border">
							<li>
								<a href="http://rspau.ddns.net:8080/register_hardjo/">Pendaftaran Online</a>
							</li>
							<li>
								<a href="https://wbs.rspauhardjolukito.com/">Whistleblowing System</a>
							</li>
							<li>
								<a href="<?=site_url('kontak')?>">Pengaduan Masyarakat</a>
							</li>
							<li>
								<a href="http://rspau.ddns.net:8080/perpustakaan/">Perpustakaan Online</a>
							</li>
							<li>
								<a href="http://rspau.ddns.net:8080/har_dasbor/Beranda/Bed-Manajemen/Cross/">Informasi Tempat Tidur</a>
							</li>
							<li>
								<a target="_blank" href="<?= $rs->vaksin_covid_rs ?>">Pendaftaran Vaksinasi Covid-19</a>
							</li>
						</ul>
					</div>
					<div class="widget dark">
					  	<h5 class="widget-title">Link Lainya</h5>
						<ul class="list-border">
							<li><a href="http://extremetracking.com/free?login=rspauhar">Statistik website</a></li>
							<li><a href="<?=site_url('frequently-asked-question')?>">Frequently Asked Question (FAQ)</a></li>
							<li><a href="<?=site_url('privacy-policy')?>">Privacy Policy</a></li>
							<li><a href="<?=site_url('sitemap')?>">Sitemap</a></li>
						</ul>
					</div>
				</div>
	  			<div class="col-sm-6 col-md-3">
					<div class="widget dark">
		  				<h5 class="widget-title">Berita</h5>
		  				<?php 
		  					$berita = $this->db->query("
		  						SELECT * FROM artikel WHERE type_artikel = '1' AND status_aktif_artikel = '1' AND status_rmv_artikel IS NULL ORDER BY tanggal_artikel DESC LIMIT 3
		  					")->result();
		  				?>
		  				<div class="latest-posts">
		  					<?php if(!empty($berita)){ ?>
								<?php foreach($berita as  $key => $value){ ?>
									<a href="<?=site_url('berita/detail/' . $value->id_artikel)?>">
										<article class="post media-post clearfix pb-0 mb-10">
						  					<div class="post-right">
												<h5 class="post-title mt-0 mb-5">
													<a href="<?=site_url('berita/detail/' . $value->id_artikel)?>"><?=$value->judul_artikel?></a>
												</h5>
												<p class="post-date mb-0 font-12"><?= indo_date($value->tanggal_artikel)?></p>
						  					</div>
										</article>
									</a>
								<?php } ?>
							<?php } ?>
			  			</div>
					</div>
					<div class="widget dark">
					  	<h5 class="widget-title">Serba Serbi RSPAU</h5>
						<ul class="list-border">
							<li><a href="<?=site_url('zona-integritas')?>">Zona Integritas</a></li>
							<li><a href="<?= $rs->sosmed_yt ?>">Kanal RSPAU</a></li>
							<li><a href="<?=site_url('edukasi')?>">Edukasi</a></li>
							<li><a href="<?=site_url('pengumuman')?>">Pengumuman Pelayanan</a></li>
							<li><a href="<?= site_url('tata-tertib-pengunjung-pasien') ?>">Tata Tertib Pengunjung Pasien</a></li>
							<li><a href="<?=site_url('kelengkapan-rekanan')?>">Kelengkapan Untuk Pencatatan Rekanan RSPAU</a></li>
						</ul>
					</div>
		  		</div>
		  		<div class="col-sm-6 col-md-3">
					<div class="widget dark">
			  			<h5 class="widget-title">Tarif</h5>
			  			<div class="opening-hours">
							<ul class="list-border">
								<?php for ($i=0; $i < 5; $i++) { ?>
							  	<li class="clearfix"> <span> <?= $data_tarif[$i]->NmBangsal ?> :  </span>
									<div class="value pull-right flip"> Rp. <?= number_format($data_tarif[$i]->ByTarif) ?> </div>
							  	</li>
								<?php } ?>
								<a href="<?=site_url('tarif-ruangan')?>">Selengkapnya...</a>
							</ul>
				  		</div>
					</div>

					<div class="widget dark">
			  			<h5 class="widget-title">Lokasi</h5>
			  			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.9279328676316!2d110.40956841437658!3d-7.797454979555508!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a576a0ff84005%3A0x6558001e57a73516!2sRumah%20Sakit%20Pusat%20Angkatan%20Udara%20Dr.%20S%20Hardjolukito!5e0!3m2!1sid!2sid!4v1604997090503!5m2!1sid!2sid" width="100" height="200" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0">
                            </iframe> 
					</div>
		  		</div>
			</div>
		</div>
		<!-- <div class="footer-bottom bg-black-222">
			<div class="container pt-10 pb-0">
			  	<div class="row">
					<div class="col-md-6 sm-text-center">
				  		<p class="font-13 text-black-777 m-0">Copyright &copy;2018 . All Rights Reserved</p>
					</div>
					<div class="col-md-6 text-right flip sm-text-center">
				  		<div class="widget no-border m-0">
							<ul class="styled-icons icon-dark icon-circled icon-sm">
							  	<li><a href="#"><i class="fa fa-facebook"></i></a></li>
							  	<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							  	<li><a href="#"><i class="fa fa-skype"></i></a></li>
							  	<li><a href="#"><i class="fa fa-youtube"></i></a></li>
							  	<li><a href="#"><i class="fa fa-instagram"></i></a></li>
							  	<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
							</ul>
				  		</div>
					</div>
			  	</div>
			</div>
		</div> -->
  	</footer>

  	<!-- <div class="akses_cepat">
	  	<a class="emergency_call" href="#">
	  		<i class="flaticon-medical-ambulance14"></i>
	  	</a>
  	</div> -->

  	<style type="text/css" media="screen">
  		#mySidenav a {
		  	position: fixed; /* Position them relative to the browser window */
		  	left: -110px; /* Position them outside of the screen */
		  	transition: 0.3s; /* Add transition on hover */
		  	padding: 15px; /* 15px padding */
		  	width: 180px; /* Set a specific width */
		  	text-decoration: none; /* Remove underline */
		  	font-size: 12px; /* Increase font size */
		  	color: white; /* White text color */
		  	z-index: 1000;
		  	border-radius: 0 5px 5px 0; /* Rounded corners on the top right and bottom right side */
		  	box-shadow: 0 4px 5px 0 rgba(0,0,0,.14),0 1px 10px 0 rgba(0,0,0,.12),0 2px 4px -1px rgba(0,0,0,.3);
		}



		#mySidenav a:hover {
		  	left: 0; /* On mouse-over, make the elements appear as they should */
		  	background-color:  #061939;
		}

		@media (max-width: 575px) {
		  	#mySidenav {
		    	display: none;
		  	}
		}
		
		/* The about link: 20px from the top with a green background */
		#igd {
		  	top: 35%;
		  	background-color: #063464;
		}

		#wa {
		  	top: 47%;
		  	background-color: #063464; /* Blue */
		}

		#telp {
		  	top: 59%;
		  	background-color: #063464; /* Red */
		}
  	</style>


  	
	<ul id="mySidenav" class="sidenav">
		<li>
			<a href="tel:<?= hp($this->fungsi->cc(2)->nomor) ?>" id="igd">
				<div>
					<i class="fa fa-ambulance fa-2x" target="-blank" style="float: right; margin: 8px; color: #ec0000;"></i>
				</div>
				<div>Emergency Call<br><?= $this->fungsi->cc(2)->nomor ?></div>
			</a>
		</li>
		<li>
			<a href="https://api.whatsapp.com/send?phone=<?= explode("+", hp($this->fungsi->cc(1)->nomor))[1] ?>" id="wa">
				<div>
					<i class="fa fa-phone-square fa-2x" target="-blank" style="float: right; margin: 8px; color:#07dd00;"></i>
				</div>
				<div> Daftar Online<br><?= $this->fungsi->cc(1)->nomor ?></div>
			</a>
		</li>
		<!-- <li>
			<a href="tel:+62274444702" id="telp">
				<div>
					<i class="fa fa-phone fa-2x" style="float: right; margin: 8px; color: #eadb05;"></i>
				</div>
				<div> Pusat Panggilan<br>0274 444702</div>
			</a>
		</li> -->
		<li>
			<a href="https://wbs.rspauhardjolukito.com/" target="-blank" id="telp">
				<div>
					<i class="fa fa-globe fa-2x" style="float: right; margin: 8px; color: #eadb05;"></i>
				</div>
				<div> Whistleblowing<br>System</div>
			</a>
		</li>
	</ul>
  	

  	<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
</div>
<!-- end wrapper -->

<!-- Footer Scripts -->
<!-- JS | Custom script for all pages -->
<script src="<?=base_url('assets/frontend/')?>js/custom.js"></script>
<script>
	function getJSON(url,data){
        return JSON.parse($.ajax({
            type        : 'POST',
            url         : url,
            data        : data,
            dataType    :'json',
            global      : false,
            async       : false,
            beforeSend:function(){
                $('#loading').show();
            },
            complete: function(){
                $('#loading').hide();
            },
            success:function(msg){

            },
        }).responseText);
    }
</script>

<!-- SLIDER REVOLUTION 5.0 EXTENSIONS  
	  (Load Extensions only on Local File Systems ! 
	   The following part can be removed on Server for On Demand Loading) -->
<script type="text/javascript" src="<?=base_url('assets/frontend/')?>js/revolution-slider/js/extensions/revolution.extension.actions.min.js"></script>
<script type="text/javascript" src="<?=base_url('assets/frontend/')?>js/revolution-slider/js/extensions/revolution.extension.carousel.min.js"></script>
<script type="text/javascript" src="<?=base_url('assets/frontend/')?>js/revolution-slider/js/extensions/revolution.extension.kenburn.min.js"></script>
<script type="text/javascript" src="<?=base_url('assets/frontend/')?>js/revolution-slider/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script type="text/javascript" src="<?=base_url('assets/frontend/')?>js/revolution-slider/js/extensions/revolution.extension.migration.min.js"></script>
<script type="text/javascript" src="<?=base_url('assets/frontend/')?>js/revolution-slider/js/extensions/revolution.extension.navigation.min.js"></script>
<script type="text/javascript" src="<?=base_url('assets/frontend/')?>js/revolution-slider/js/extensions/revolution.extension.parallax.min.js"></script>
<script type="text/javascript" src="<?=base_url('assets/frontend/')?>js/revolution-slider/js/extensions/revolution.extension.slideanims.min.js"></script>
<script type="text/javascript" src="<?=base_url('assets/frontend/')?>js/revolution-slider/js/extensions/revolution.extension.video.min.js"></script>

</body>

</html>