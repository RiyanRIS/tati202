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
                                    <a href="<?= site_url('nilai/aksi') ?>" class="btn btn-success btn-sm">Tambah Alternatif Nilai</a>
                                    <button type="button" onclick="hapus_all('<?= site_url('nilai/hapus_all') ?>')" class="btn btn-danger btn-sm">Kosongkan Alternatif Nilai</button>
                                </div>

                                <div class="card-body">
                                    <table id="datatable" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th>KELAS</th>
                                                <th>NAMA SISWA</th>
                                                <th>NAMA KRITERIA</th>
                                                <th>NILAI</th>
                                                <th>#</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($nilai as $key => $v) {
                                            ?>
                                                <tr>
                                                    <td><?= ++$key ?></td>
                                                    <td><?= $v->nama_kelas ?></td>
                                                    <td><?= $v->nama_siswa ?></td>
                                                    <td><?= $v->nama_kriteria ?></td>
                                                    <td><?= $v->nilai ?></td>
                                                    <td>
                                                        <button type="button" onclick="hapus('<?= site_url('nilai/hapus/' . $v->kode_nilai) ?>')" class="btn btn-danger btn-sm">Hapus</button>
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

    <?= $this->load->view('template/script') ?>

    <script>
        function hapus_all(url) {
            Swal.fire({
                title: "Konfirmasi",
                text: "Apakah anda yakin menghapus semua data?",
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
                                if (data.status) {
                                    await Swal.fire("Terhapus!", data.message, "success")
                                    window.location.href = data.url
                                } else {
                                    Swal.fire("Gagal!", data.message, "error");
                                }
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