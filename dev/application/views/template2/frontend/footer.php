<link href="<?=base_url('assets/backend/')?>lib/datepicker/datepicker.min.css" rel="stylesheet">
<?php 
    $jenis_layanan = $this->db->query("
        SELECT * 
        FROM jenis_pelayanan 
        WHERE stts_aktif_pelayanan = '1' 
            AND stts_remove_pelayanan = '0'
        ORDER BY tgl_create_pelayanan DESC
    ")->result();

    // print_r($jenis_layanan); die();
?>


<style type="text/css" media="screen">
    .modal .is-invalid{
        border: 1px solid red !important;
        outline: none;
    }

    .modal .invalid-feedback{
        color: red;
    }

    .modal .badge.bagde-success{
        background-color: green !important;
        color : white !important;
    }
</style>

<link href="<?=base_url()?>assets/backend/lib/datepicker/datepicker.min.css" rel="stylesheet">

<!-- Modal -->
<div class="modal fade" id="form_pendaftaran" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Pendaftaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="myForm_reload">
                <div class="modal-body">
                
                    <div class="form-group" id="notifikasi_jenis_layanan">
                        <label for="jenis_layanan">Pilih Layanan</label>
                        <select name="jenis_layanan" id="jenis_layanan" class="form-control">
                            <option value="">Pilih Layanan</option>
                            <?php foreach($jenis_layanan as $key => $value) { ?>
                                <option value="<?= $value->id_pelayanan ?>"><?= $value->nama_pelayanan ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    
                    <div class="form-group" id="notifikasi_nama_masya">
                        <label for="nama_masya">Nama Lengkap</label>
                        <input type="text" name="nama_masya" id="nama_masya" class="form-control" placeholder="Nama Lengkap">
                    </div>

                    <div class="form-group" id="notifikasi_nik">
                        <label for="nik">NIK</label>
                        <input type="number" name="nik" id="nik" class="form-control" placeholder="NIK">
                    </div>

                    <div class="form-group" id="notifikasi_tempat_lahir">
                        <label for="tempat_lahir">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" onkeyup="this.value=this.value.replace(/[^a-z]/g,'');" placeholder="Tempat Lahir">
                    </div>

                    <div class="form-group" id="notifikasi_tanggal_lahir">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="text" name="tanggal_lahir" id="tanggal_lahir" class="form-control date" placeholder="Tanggal Lahir">
                    </div>

                    <div class="form-group" id="notifikasi_jenis_kelamin">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                            <option value="L"<?=set_value('jenis_kelamin') == "L" ? "seleted" : null ?>> Laki-Laki</option>
                            <option value="P"<?=set_value('jenis_kelamin') == "L" ? "seleted" : null ?>> Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group" id="notifikasi_telephone">
                        <label for="telephone">Telephone</label>
                        <input type="number" name="telephone" id="telephone" class="form-control" placeholder="telephone">
                    </div>

                    <div class="form-group" id="notifikasi_agama">
                        <label for="agama">Agama</label>
                        <select name="agama" id="agama" class="form-control">
                            <option value="">Pilih Agama </option>
                            <option value="1"> Islam</option>
                            <option value="2"> Protestan</option>
                            <option value="3"> Katholik</option>
                            <option value="4"> Budha</option>
                            <option value="5"> Hindu</option>
                            <option value="6"> Konghucu</option>
                        </select>
                    </div>

                    <div class="form-group" id="notifikasi_pekerjaan">
                        <label for="pekerjaan">Pekerjaan</label>
                        <input type="text" name="pekerjaan" id="pekerjaan" class="form-control" placeholder="Pekerjaan">
                    </div>

                    <div class="form-group" id="notifikasi_alamat">
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" id="alamat" class="form-control" placeholder="Alamat"></textarea>
                    </div>
                
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Daftar</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="modal_check_resi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Check Resi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body">

                    <div class="form-group" id="notifikasi_check_no_resi">
                        <input type="text" name="check_no_resi" id="check_no_resi" class="form-control" placeholder="Masukkan No Resi">
                    </div>
                    <button type="button" id="cari_check_no_resi" class="btn btn-primary btn-block">
                        <i class="fa fa-seacrh"></i> Cari
                    </button>
                    
                    <div id="content_check_resi" style="margin-top: 50px;">
                        <table class="" width="50%">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th><span id="nama_resi">-</span></th>
                                </tr>
                                <tr>
                                    <th>NIK</th>
                                    <th><span id="nik_resi">-</span></th>
                                </tr>
                                <tr>
                                    <th>Jenis Layanan</th>
                                    <th><span id="jenis_layanan_resi">-</span></th>
                                </tr>
                                <tr>
                                    <th>Status Proses</th>
                                    <th><span id="status_proses_resi">-</span></th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    
                
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <!-- <button type="submit" class="btn btn-primary">Daftar</button> -->
                </div>
            </div>
        </div>
    </div>
</div>


<!-- start footer -->
    <footer class="bg-dark text-light">
        <div class="container">
            <div class="row">
                <div class="f-items default-padding">
                    <!-- Single Item -->
                    <div class="col-md-3 col-sm-6 equal-height item">
                        <div class="f-item">
                            <h4>POLSEK KECAMATAN PANYIPATAN</h4>
                            <p align="justify">
                                Kepolisisan Sektor Wilayah Kecamatan Panyipatan atau Polsek Panyipatan adalah struktur komando polri tingkat kecamatan yang bertugas untuk pemeliharaan keamanan dan ketertiban masyarakat, serta memberikan pelayanan kepada masyarakat.
                            </p>  
                        </div>
                    </div>
                    <!-- End Single Item -->
                    <!-- Single Item -->
                    <div class="col-md-3 col-sm-6 equal-height item">
                        <div class="f-item link">
                            <h4>JAM KERJA LAYANAN KEPOLISIAN TERPADU</h4>   
                            <ul>
                                <li> <span> Senin - Jumat:  </span>
                                    <div class="pull-right"> 8.00 am - 13.00 pm </div>
                                  </li>
                                  <li> <span> Sabtu - Minggu :</span>
                                    <div class="pull-right "> Libur</div>
                                  </li>               
                            </ul>
                        </div>
                    </div>
                    <!-- End Single Item -->
                    <!-- Single Item -->
                    <div class="col-md-3 col-sm-6 equal-height item">
                        <div class="f-item twitter-widget">
                            <h4>ALAMAT</h4>        
                            <div class="twitter-item">
                                <div class="twitter-content">
                                    <p>
                                       Jl. Panyipatan, Batakan, Kecamatan Panyipatan, Kabupaten Tanah Laut, Prov. Kalimantan Selatan Kode Pos 70871
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Item -->
                    <!-- Single Item -->
                    <div class="col-md-3 col-sm-6 equal-height item">
                        <div class="f-item contact">
                            <h4>HUBUNGI KAMI</h4>
                            <ul>
                                <li>
                                    <i class="fas fa-phone"></i> 
                                    <p>Telephone <span>+628.....</span></p>
                                </li>
                                <li>
                                    <i class="fas fa-envelope"></i> 
                                    <p>Email <span><a href="mailto:support@validtheme.com">support@validtheme.com</a></span></p>
                                </li>
                                <li>
                                    <i class="fas fa-map"></i> 
                                    <p>Office <span>123 6th St. Melbourne, FL 32904</span></p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- End Single Item -->
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer -->

    <!-- jQuery Frameworks
    ============================================= -->
    <script src="<?= site_url() ?>assets/frontend/js/jquery-1.12.4.min.js"></script>
    <script src="<?= site_url() ?>assets/frontend/js/bootstrap.min.js"></script>
    <script src="<?= site_url() ?>assets/frontend/js/equal-height.min.js"></script>
    <script src="<?= site_url() ?>assets/frontend/js/jquery.appear.js"></script>
    <script src="<?= site_url() ?>assets/frontend/js/jquery.easing.min.js"></script>
    <script src="<?= site_url() ?>assets/frontend/js/jquery.magnific-popup.min.js"></script>
    <script src="<?= site_url() ?>assets/frontend/js/modernizr.custom.13711.js"></script>
    <script src="<?= site_url() ?>assets/frontend/js/owl.carousel.min.js"></script>
    <script src="<?= site_url() ?>assets/frontend/js/wow.min.js"></script>
    <script src="<?= site_url() ?>assets/frontend/js/isotope.pkgd.min.js"></script>
    <script src="<?= site_url() ?>assets/frontend/js/imagesloaded.pkgd.min.js"></script>
    <script src="<?= site_url() ?>assets/frontend/js/count-to.js"></script>
    <script src="<?= site_url() ?>assets/frontend/js/YTPlayer.min.js"></script>
    <script src="<?= site_url() ?>assets/frontend/js/jquery.nice-select.min.js"></script>
    <script src="<?= site_url() ?>assets/frontend/js/bootsnav.js"></script>
    <script src="<?= site_url() ?>assets/frontend/js/main.js"></script>


    <script src="<?=base_url('assets/backend/')?>lib/moment/moment.js"></script>
    <script src="<?=base_url('assets/backend/')?>lib/datepicker/bootstrap-datepicker.min.js"></script>
    <?php $date = date('Y-m-d') ?>
    <script>
        $(document).ready(function(){
            $('.tahun').datepicker({
                format: "yyyy",
                orientation: "auto",
                startView: "years", 
                minViewMode: "years",
                autoclose: true,
            });

            $('.date').datepicker({
                autoclose: true,
                format: "d MM yyyy",
                orientation: "auto",
                showButtonPanel: true,
                changeMonth: true,
                changeMonth: true,
                changeYear: true,
                endDate: "today"
                // maxDate: "+1d",
                 // maxDate: new Date()
                // locale:{
                // }
            });
        })
    </script>

    <!-- FORM PENDAFTARAN -->
    <script>
        $('#myForm').submit(function(e){
            e.preventDefault()
            var dataToSend  = new FormData(this)
            var action = $('#myForm').attr('action')
            $.ajax({
                url      : "<?=base_url(set_url($this->uri->segment(2).'/action/')) ?>"+action,
                dataType : 'json',
                type     : 'post',
                data     : dataToSend,
                processData :false,
                contentType :false,
                cache       :false,
                beforeSend:function(){
                    $('#loading').show()
                },
                complete:function(){
                    $('#loading').hide()
                },
                success  : function(data){
                    // console.log(data)
                    // $('#pesan_notifikasi div').remove()
                    $('.invalid-feedback').remove()
                    $('.is-invalid').removeClass('is-invalid');

                    if(typeof(data.file) != "undefined" && data.file !== null){
                        if(data.file == false){
                            $.each(data.error_file, function(key, value){
                                $('#'+key).addClass('is-invalid')
                                $('#notifikasi_'+key).append(`<div class="invalid-feedback">`+value+`</div>`)
                            })
                        }else{
                            $.each(data.error_file, function(key, value){
                                $('#'+key).removeClass('is-invalid')
                                $('#notifikasi_'+key).append('')
                            })
                        }
                    }else{
                        if(data.status){
                            window.location.replace("<?=base_url(set_url(@$this->uri->segment(2))) ?>");
                        }else{
                            if(data.errors){
                                $.each(data.errors, function(key, value){
                                    $('#'+key).addClass('is-invalid')
                                    $('#notifikasi_'+key).append(`<div class="invalid-feedback">`+value+`</div>`)
                                })
                            }else{

                                if(data.status == false){
                                    $.confirm({
                                        title: 'errors',
                                        content: 'Terjadi kesalahan sistem, silahkan coba kembali',
                                        type: 'red',
                                        typeAnimated: true,
                                        buttons: {
                                            tryAgain: {
                                                text: 'Oke',
                                                btnClass: 'btn-red',
                                                action: function(){
                                                    $('#loading').hide()
                                                }
                                            },
                                            close: function () {
                                                    $('#loading').hide()
                                            }
                                        }
                                    });
                                }
                                $.each(data.errors, function(key, value){
                                    $('#'+key).removeClass('is-invalid')
                                    $('#notifikasi_'+key).append('')
                                })
                            }
                            $('html,body').animate({scrollTop: $('body').offset().top},'fast');
                        }
                    }
                }
            })
        })

        $('#myForm_reload').submit(function(e){
            e.preventDefault()

            // alert()
            var dataToSend  = new FormData(this)

            $.ajax({
                url      : "<?=base_url(set_url('pelayanan/action/tambah')) ?>",
                dataType : 'json',
                type     : 'post',
                data     : dataToSend,
                processData :false,
                contentType :false,
                cache       :false,
                beforeSend:function(){
                    // $('#loading').show()
                },
                complete:function(){
                    // $('#loading').hide()
                },
                success  : function(response){
                    // console.log(response.id_pelayanan)
                    $('.invalid-feedback').remove()
                    $('.is-invalid').removeClass('is-invalid');
                    
                    if(response.status){
                        alert('Berhasil Daftar')

                        var win = window.open("<?=site_url(set_url('pelayanan/cetak_pdf_pendaftaran/'))?>"+response.id_pelayan);
    
                        setTimeout(function () { win.close(); location.reload();}, 1000);
                        
                    }else{
                        if(response.errors){
                            $.each(response.errors, function(key, value){
                                $('#'+key).addClass('is-invalid')
                                $('.nice-select').parents('#notifikasi_'+key).find('.nice-select').addClass('is-invalid');
                                $('#notifikasi_'+key).append(`<div class="invalid-feedback">`+value+`</div>`)
                            })
                        }else{
                            $.each(data.errors, function(key, value){
                                $('#'+key).removeClass('is-invalid')
                                $('.nice-select').parents('#notifikasi_'+key).find('.nice-select').removeClass('is-invalid');
                                $('#notifikasi_'+key).append('')
                            })
                        }
                    }
                    $('html,body').animate({scrollTop: $('body').offset().top},'fast');
                }
            })
        })


        $('#cari_check_no_resi').click(function(){
            var check_no_resi = $('#check_no_resi').val()
            $.ajax({
                url      : "<?=base_url(set_url('pelayanan/check_no_resi')) ?>",
                dataType : 'json',
                type     : 'post',
                data     : {check_no_resi : check_no_resi},
                beforeSend:function(){
                    // $('#loading').show()
                },
                complete:function(){
                    // $('#loading').hide()
                },
                success  : function(response){
                    console.log(response)
                    $('.invalid-feedback').remove()
                    $('.is-invalid').removeClass('is-invalid');
                    
                    if(response.status){
                        if(response.data != null ){
                            $('#nama_resi').html(response.data.nama_lengkap)
                            $('#nik_resi').html(response.data.nik)
                            $('#jenis_layanan_resi').html(response.jenis_layanan)
                            $('#status_proses_resi').html(status_proses_layanan(response.data.status_proses))
                        } else {
                            // console.log('data is empty')
                            $('#nama_resi').html('-')
                            $('#nik_resi').html('-')
                            $('#jenis_layanan_resi').html('-')
                            $('#status_proses_resi').html('-')
                        }
                    }else{
                        if(response.errors){
                            $.each(response.errors, function(key, value){
                                $('#'+key).addClass('is-invalid')
                                $('.nice-select').parents('#notifikasi_'+key).find('.nice-select').addClass('is-invalid');
                                $('#notifikasi_'+key).append(`<div class="invalid-feedback">`+value+`</div>`)
                            })
                        }else{
                            $.each(data.errors, function(key, value){
                                $('#'+key).removeClass('is-invalid')
                                $('.nice-select').parents('#notifikasi_'+key).find('.nice-select').removeClass('is-invalid');
                                $('#notifikasi_'+key).append('')
                            })
                        }
                    }
                    $('html,body').animate({scrollTop: $('body').offset().top},'fast');
                }
            })
        })

        function status_proses_layanan(kode){
            var text = ''
            if(kode == '1'){
                text = '<span class="badge badge-danger">Surat Masuk</span>'
            }else if(kode == '2'){
                text = '<span class="badge badge-warning">Surat Di prosess</span>'
            }else if(kode == '3'){
                text = '<span class="badge badge-success">Surat Selesai</span>'
            }

            return text
        }

    </script>


</body>
</html>