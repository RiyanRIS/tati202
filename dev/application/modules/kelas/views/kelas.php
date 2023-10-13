<!DOCTYPE html>

<html lang="en">
<?php
global $SConfig;
?>
<?= $this->load->view('template/head') ?>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <?= $this->load->view('template/nav') ?>
        <div class="content-wrapper">
            <?= $this->load->view('template/content_header') ?>

            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <a href="<?= site_url('kelas/aksi') ?>" class="btn btn-success btn-sm">Tambah Kelas</a>
                                </div>

                                <div class="card-body">
                                    <table id="datatable" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th>KODE KELAS</th>
                                                <th>NAMA KELAS</th>
                                                <th>JUMLAH</th>
                                                <th>SISWA</th>
                                                <th>#</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($kelas as $key => $v) {
                                                $total = $this->kelas_model->getTotalSiswa($v->kode_kelas);
                                                ?>
                                                <tr>
                                                    <td><?= ++$key ?></td>
                                                    <td><?= $v->kode_kelas ?></td>
                                                    <td><?= $v->nama_kelas ?></td>
                                                    <td><?= $total ?> siswa</td>
                                                    <td><button type="button" onclick="view_siswa('<?= $v->kode_kelas ?>')" class="btn btn-default btn-sm">Lihat Siswa</button></td>
                                                    <td>
                                                        <a href="<?= site_url('kelas/aksi/' . $v->kode_kelas) ?>" class="btn btn-info btn-sm">Ubah</a>
                                                        <button type="button" onclick="hapus('<?=site_url('kelas/hapus/' . $v->kode_kelas)?>')" class="btn btn-danger btn-sm">Hapus</button>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

            </div>

        </div>
        <?= $this->load->view('template/footer') ?>
    </div>

    <div class="modal fade" id="view_siswa_modal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="view_siswa_modal_title">Siswa Kelas </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="view_siswa_modal_content">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <?= $this->load->view('template/script') ?>

    <script>
         function view_siswa(kode_kelas) {
            $.ajax({
                url: '<?= site_url('kelas/api/') ?>ambil_siswa/' + kode_kelas, // Ganti dengan URL yang sesuai untuk mengambil data siswa
                type: 'GET',
                dataType: 'json',
                error: function() {
                    toastr.error("Terjadi Kesalahan Pada Server!", "Error");
                },
                success: function(data) {
                    $('#view_siswa_modal_content').html(data.html);
                    $('#view_siswa_modal_title').html(data.title);
                    $('#view_siswa_modal').modal('show'); // Menampilkan modal
                    $('#tabel_siswa_by_kelas').DataTable()
                }
            });
        }

    </script>

</body>

</html>