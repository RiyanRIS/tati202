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

                        <!-- Nilai Alternatif -->
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <h2>Nilai Alternatif</h2>
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>NAMA SISWA</th>
                                                <?php foreach ($kriteria as $key => $v) {
                                                    echo "<th>$v->nama_kriteria ($v->kode_kriteria)</th>";
                                                } ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($nilai_by_siswa as $key => $v) { ?>
                                                <tr>
                                                    <td><?= $v->nama_siswa ?></td>
                                                    <?php
                                                    $nis = $v->nis;
                                                    foreach ($kriteria as $key => $v) {
                                                        $kode_kriteria = $v->kode_kriteria;
                                                        $data = $this->db->query("SELECT * FROM nilai n WHERE n.nis = '$nis' AND n.kode_kriteria = '$kode_kriteria'")->row();
                                                        $nilai = $data->nilai ?? 0;
                                                        echo "<td>$nilai</td>";
                                                    } ?>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>


                        <!-- Matrik Keputusan -->
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <h2>Matriks Keputusan</h2>
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>NAMA SISWA</th>
                                                <?php foreach ($kriteria as $key => $v) {
                                                    echo "<th>$v->nama_kriteria ($v->kode_kriteria)</th>";
                                                } ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($nilai_by_siswa as $key => $v) { ?>
                                                <tr>
                                                    <td><?= $v->nama_siswa ?></td>
                                                    <?php
                                                    $nis = $v->nis;
                                                    foreach ($kriteria as $key => $v) {
                                                        $kode_kriteria = $v->kode_kriteria;
                                                        $data = $this->db->query("SELECT * FROM nilai n WHERE n.nis = '$nis' AND n.kode_kriteria = '$kode_kriteria'")->row();
                                                        $nilai = $data->nilai ?? 0;
                                                        if ($kode_kriteria == 'C2') {
                                                            if ($nilai > 10) {
                                                                $nilai = 1;
                                                            } else if ($nilai >= 9) {
                                                                $nilai = 2;
                                                            } else if ($nilai >= 6) {
                                                                $nilai = 3;
                                                            } else if ($nilai >= 3) {
                                                                $nilai = 4;
                                                            } else {
                                                                $nilai = 5;
                                                            }
                                                        }

                                                        if ($kode_kriteria == 'C3') {
                                                            if ($nilai == 'Sangat Kurang') {
                                                                $nilai = 1;
                                                            } else 
                                                            
                                                            if ($nilai == 'Baik') {
                                                                $nilai = 4;
                                                            } else

                                                            if ($nilai == 'Cukup') {
                                                                $nilai = 3;
                                                            } else

                                                            if ($nilai == 'Kurang') {
                                                                $nilai = 2;
                                                            } else

                                                            if ($nilai == 'Sangat Baik') {
                                                                $nilai = 5;
                                                            } else {
                                                                $nilai = '<i>undefined</i>';
                                                            }
                                                        }
                                                        echo "<td>$nilai</td>";
                                                    } ?>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>

                        <!-- Matrik Keputusan Ternormalisasi (R) -->
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <h2>Matriks Keputusan Ternormalisasi (R)</h2>
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <!-- <th>NIS</th> -->
                                                <th>NAMA SISWA</th>
                                                <?php foreach ($kriteria as $key => $v) {
                                                    echo "<th>$v->nama_kriteria ($v->kode_kriteria)</th>";
                                                } ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($nilai_by_siswa as $key => $v) { ?>
                                                <tr>
                                                    <td><?= $v->nama_siswa ?></td>
                                                    <?php
                                                    $nis = $v->nis;
                                                    foreach ($kriteria as $key => $v) {
                                                        $kode_kriteria = $v->kode_kriteria;
                                                        $data = $this->db->query("SELECT * FROM nilai n WHERE n.nis = '$nis' AND n.kode_kriteria = '$kode_kriteria'")->row();

                                                        $nilai = $data->nilai ?? 0;

                                                        if ($kode_kriteria == 'C2') {
                                                            if ($nilai > 10) {
                                                                $nilai = 1;
                                                            } else if ($nilai >= 9) {
                                                                $nilai = 2;
                                                            } else if ($nilai >= 6) {
                                                                $nilai = 3;
                                                            } else if ($nilai >= 3) {
                                                                $nilai = 4;
                                                            } else {
                                                                $nilai = 5;
                                                            }
                                                        }

                                                        if ($kode_kriteria == 'C3') {
                                                            if ($nilai == 'Sangat Kurang') {
                                                                $nilai = 1;
                                                            } else

                                                            if ($nilai == 'Baik') {
                                                                $nilai = 4;
                                                            } else

                                                            if ($nilai == 'Cukup') {
                                                                $nilai = 3;
                                                            } else

                                                            if ($nilai == 'Kurang') {
                                                                $nilai = 2;
                                                            } else

                                                            if ($nilai == 'Sangat Baik') {
                                                                $nilai = 5;
                                                            } else {
                                                                $nilai = 0;
                                                            }
                                                        }

                                                        if ($kode_kriteria == 'C2') {
                                                            $data_tertinggi = $this->db->query("SELECT * FROM nilai n WHERE n.kode_kriteria = '$kode_kriteria' ORDER BY n.nilai DESC LIMIT 1")->row();
                                                            $tertinggi = $data_tertinggi->nilai ?? 0;

                                                            if ($tertinggi > 10) {
                                                                $tertinggi = 1;
                                                            } else if ($tertinggi >= 9) {
                                                                $tertinggi = 2;
                                                            } else if ($tertinggi >= 6) {
                                                                $tertinggi = 3;
                                                            } else if ($tertinggi >= 3) {
                                                                $tertinggi = 4;
                                                            } else {
                                                                $tertinggi = 5;
                                                            }

                                                            if ($tertinggi == 0) {
                                                                $hasil_ = '<i>undefined</i>';
                                                            } else {
                                                                $hasil = $tertinggi / $nilai;
                                                                $hasil_ = number_format($hasil, 2, ',', '.');
                                                            }
                                                        } else if ($kode_kriteria == 'C3') {
                                                            $data_tertinggi = $this->db->query("SELECT * FROM nilai n WHERE n.kode_kriteria = '$kode_kriteria' ORDER BY CASE n.nilai 
                                                            WHEN 'Sangat Baik' THEN 5
                                                            WHEN 'Sangat Kurang' THEN 1
                                                            WHEN 'Baik' THEN 4
                                                            WHEN 'Kurang' THEN 2
                                                            ELSE 3 END DESC LIMIT 1")->row();
                                                            $tertinggi = $data_tertinggi->nilai ?? 0;

                                                            if ($tertinggi > 10) {
                                                                $tertinggi = 1;
                                                            } else if ($tertinggi >= 9) {
                                                                $tertinggi = 2;
                                                            } else if ($tertinggi >= 6) {
                                                                $tertinggi = 3;
                                                            } else if ($tertinggi >= 3) {
                                                                $tertinggi = 4;
                                                            } else {
                                                                $tertinggi = 5;
                                                            }

                                                            if ($tertinggi == 0) {
                                                                $hasil_ = '<i>undefined</i>';
                                                            } else {
                                                                $hasil = $nilai / $tertinggi;
                                                                $hasil_ = number_format($hasil, 2, ',', '.');
                                                            }
                                                        } else {
                                                            $data_tertinggi = $this->db->query("SELECT * FROM nilai n WHERE n.kode_kriteria = '$kode_kriteria' ORDER BY n.nilai DESC LIMIT 1")->row();
                                                            $tertinggi = $data_tertinggi->nilai ?? 0;
                                                            if ($tertinggi == 0) {
                                                                $hasil_ = '<i>undefined</i>';
                                                            } else {
                                                                $hasil = $nilai / $tertinggi;
                                                                $hasil_ = number_format($hasil, 2, ',', '.');
                                                            }
                                                        }

                                                        echo "<td>$hasil_</td>";
                                                    } ?>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>

                        <!-- Hasil Perangkingan -->
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <h2>Hasil Perangkingan</h2>
                                    <?php
                                    $perangkingan = array();
                                    foreach ($nilai_by_siswa as $key => $v) {
                                        $nis = $v->nis;
                                        $nama_siswa = $v->nama_siswa;
                                        $nama_kelas = $v->nama_kelas;
                                        $total = 0;
                                        // foreach ($kriteria as $key => $v) {
                                        //     $kode_kriteria = $v->kode_kriteria;
                                        //     $data = $this->db->query("SELECT * FROM nilai n WHERE n.nis = '$nis' AND n.kode_kriteria = '$kode_kriteria'")->row();
                                        //     $data_tertinggi = $this->db->query("SELECT * FROM nilai n WHERE n.kode_kriteria = '$kode_kriteria' ORDER BY n.nilai DESC LIMIT 1")->row();
                                        //     $nilai = $data->nilai ?? 0;
                                        //     $tertinggi = $data_tertinggi->nilai ?? 0;
                                        //     if($tertinggi == 0){
                                        //         $hasil_ = 'undefined';
                                        //     } else {
                                        //         $hasil = $nilai / $tertinggi;
                                        //         $hasil_final = $hasil * $v->bobot / 100;
                                        //         $total += $hasil_final;
                                        //     }
                                        // }
                                        foreach ($kriteria as $key => $v) {
                                            $kode_kriteria = $v->kode_kriteria;
                                            $data = $this->db->query("SELECT * FROM nilai n WHERE n.nis = '$nis' AND n.kode_kriteria = '$kode_kriteria'")->row();

                                            $nilai = $data->nilai ?? 0;

                                            if ($kode_kriteria == 'C2') {
                                                if ($nilai > 10) {
                                                    $nilai = 1;
                                                } else if ($nilai >= 9) {
                                                    $nilai = 2;
                                                } else if ($nilai >= 6) {
                                                    $nilai = 3;
                                                } else if ($nilai >= 3) {
                                                    $nilai = 4;
                                                } else {
                                                    $nilai = 5;
                                                }
                                            }

                                            if ($kode_kriteria == 'C3') {
                                                if ($nilai == 'Sangat Kurang') {
                                                    $nilai = 1;
                                                }  else

                                                if ($nilai == 'Baik') {
                                                    $nilai = 4;
                                                } else

                                                if ($nilai == 'Cukup') {
                                                    $nilai = 3;
                                                } else

                                                if ($nilai == 'Kurang') {
                                                    $nilai = 2;
                                                } else

                                                if ($nilai == 'Sangat Baik') {
                                                    $nilai = 5;
                                                } else {
                                                    $nilai = 0;
                                                }
                                            }

                                            if ($kode_kriteria == 'C2') {
                                                $data_tertinggi = $this->db->query("SELECT * FROM nilai n WHERE n.kode_kriteria = '$kode_kriteria' ORDER BY n.nilai DESC LIMIT 1")->row();
                                                $tertinggi = $data_tertinggi->nilai ?? 0;

                                                if ($tertinggi > 10) {
                                                    $tertinggi = 1;
                                                } else if ($tertinggi >= 9) {
                                                    $tertinggi = 2;
                                                } else if ($tertinggi >= 6) {
                                                    $tertinggi = 3;
                                                } else if ($tertinggi >= 3) {
                                                    $tertinggi = 4;
                                                } else {
                                                    $tertinggi = 5;
                                                }

                                                if ($tertinggi == 0) {
                                                    $hasil_ = '<i>undefined</i>';
                                                } else {
                                                    $hasil = $tertinggi / $nilai;
                                                    $hasil_ = number_format($hasil, 2, ',', '.');
                                                }
                                            } else if ($kode_kriteria == 'C3') {
                                                $data_tertinggi = $this->db->query("SELECT * FROM nilai n WHERE n.kode_kriteria = '$kode_kriteria' ORDER BY CASE n.nilai 
                                                WHEN 'Sangat Baik' THEN 5
                                                WHEN 'Sangat Kurang' THEN 1
                                                WHEN 'Baik' THEN 4
                                                WHEN 'Kurang' THEN 2
                                                ELSE 3 END DESC LIMIT 1")->row();
                                                $tertinggi = $data_tertinggi->nilai ?? 0;

                                                if ($tertinggi > 10) {
                                                    $tertinggi = 1;
                                                } else if ($tertinggi >= 9) {
                                                    $tertinggi = 2;
                                                } else if ($tertinggi >= 6) {
                                                    $tertinggi = 3;
                                                } else if ($tertinggi >= 3) {
                                                    $tertinggi = 4;
                                                } else {
                                                    $tertinggi = 5;
                                                }

                                                if ($tertinggi == 0) {
                                                    $hasil_ = '<i>undefined</i>';
                                                } else {
                                                    $hasil = $nilai / $tertinggi;
                                                    $hasil_ = number_format($hasil, 2, ',', '.');
                                                }
                                            } else {
                                                $data_tertinggi = $this->db->query("SELECT * FROM nilai n WHERE n.kode_kriteria = '$kode_kriteria' ORDER BY n.nilai DESC LIMIT 1")->row();
                                                $tertinggi = $data_tertinggi->nilai ?? 0;
                                                if ($tertinggi == 0) {
                                                    $hasil_ = '<i>undefined</i>';
                                                } else {
                                                    $hasil = $nilai / $tertinggi;
                                                    $hasil_ = number_format($hasil, 2, ',', '.');
                                                }
                                            }

                                            $hasil_final = $hasil * $v->bobot / 100;
                                            $total += $hasil_final;
                                        }
                                        $total = number_format($total, 4, ',', '.');
                                        $perangkingan[] = array('nis' => $nis, 'nama_siswa' => $nama_siswa, 'total' => $total, 'nama_kelas' => $nama_kelas);
                                    }

                                    usort($perangkingan, function ($a, $b) {
                                        return $b['total'] <=> $a['total'];
                                    });

                                    $ranking = 1;
                                    ?>
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>NIS</th>
                                                <th>Nama Siswa</th>
                                                <th>Kelas</th>
                                                <th>Total</th>
                                                <th>Rangking</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($perangkingan as $key => $v) { ?>
                                                <tr>
                                                    <?php
                                                    $nis = $v['nis'];
                                                    $nama_siswa = $v['nama_siswa'];
                                                    $kelas = $v['nama_kelas'];
                                                    $total = $v['total'];
                                                    $insert = $this->db->query("SELECT * FROM hasil h WHERE h.nis = '$nis'")->result();
                                                    if (count($insert) >= 1) {
                                                        $kode_hasil = $insert[0]->kode_hasil;
                                                        $this->db->query("UPDATE `hasil` SET `nis`='$nis',`hasil`='$total' WHERE `kode_hasil` = '$kode_hasil'");
                                                    } else {
                                                        $this->db->query("INSERT INTO `hasil`(`nis`, `hasil`) VALUES ('$nis', '$total')");
                                                    }
                                                    ?>
                                                    <td><?= $nis ?></td>
                                                    <td><?= $nama_siswa ?></td>
                                                    <td><?= $kelas ?></td>
                                                    <td><?= $total ?></td>
                                                    <td><?= $ranking ?></td>
                                                </tr>
                                                <?php $ranking++; ?>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                    <?php if (count($perangkingan) >= 1) { ?>
                                        <hr>
                                        <br>
                                        <h4>Jadi, rekomendasi pemilihan siswa berprestasi di <?= $SConfig->_site_name ?> adalah <strong><?= $perangkingan[0]['nama_siswa'] ?></strong> dengan total nilai <strong><?= $perangkingan[0]['total'] ?></strong>.</h4>
                                    <?php } ?>
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

</body>

</html>