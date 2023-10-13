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
                                    <a href="<?= site_url('siswa/aksi') ?>" class="btn btn-success btn-sm">Tambah Siswa</a>
                                </div>

                                <div class="card-body">
                                    <table id="datatable" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th>NOMOR INDUK SISWA</th>
                                                <th>NAMA SISWA</th>
                                                <th>KELAS</th>
                                                <th>ALAMAT</th>
                                                <th>FOTO</th>
                                                <th>#</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($siswa as $key => $v) { ?>
                                                <tr>
                                                    <td><?= ++$key ?></td>
                                                    <td><?= $v->nis ?></td>
                                                    <td><?= $v->nama_siswa ?></td>
                                                    <td><?= $v->nama_kelas ?></td>
                                                    <td><?= $v->alamat ?></td>
                                                    <td><button type="button" onclick="detail_siswa('<?= $v->nis ?>')" class="btn btn-default btn-sm">tampilkan</button></td>
                                                    <td>
                                                        <a href="<?= site_url('siswa/aksi/' . $v->nis) ?>" class="btn btn-info btn-sm">Ubah</a>
                                                        <button type="button" onclick="hapus('<?= site_url('siswa/hapus/' . $v->nis) ?>')" class="btn btn-danger btn-sm">Hapus</button>
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

    <div class="modal fade" id="detail_siswa_modal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Detail Siswa</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="detail_siswa_modal_content">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <?= $this->load->view('template/script') ?>

    <script>
        function detail_siswa(nis) {
            $.ajax({
                url: '<?= site_url('siswa/api/') ?>ambil/' + nis, // Ganti dengan URL yang sesuai untuk mengambil data siswa
                type: 'GET',
                dataType: 'json',
                error: function() {
                    toastr.error("Terjadi Kesalahan Pada Server!", "Error");
                },
                success: function(data) {
                    $('#detail_siswa_modal_content').html(data.html);
                    $('#detail_siswa_modal').modal('show'); // Menampilkan modal
                }
            });
        }

        function hapus_foto(url) {
            Swal.fire({
                title: "Konfirmasi",
                text: "Apakah anda yakin menghapus foto ini?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Ya, Hapus",
                cancelButtonText: "Batal"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: url,
                        dataType: 'json',
                        type: 'get',
                        error: function() {
                            Swal.fire("Gagal!", "Terjadi kesalahan dari sisi server.", "error");
                        },
                        success: async function(data) {
                            if (data.status) {
                                await Swal.fire("Terhapus!", data.message, "success")
                                window.location.href = data.url
                            } else {
                                Swal.fire("Gagal!", data.message, "error");
                            }
                        }
                    });
                }
            });
        }
    </script>

</body>

</html>