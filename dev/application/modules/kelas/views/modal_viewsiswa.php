<div class="row">
    <div class="col-12">
        <table id="tabel_siswa_by_kelas" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>NOMOR INDUK SISWA</th>
                    <th>NAMA SISWA</th>
                    <th>ALAMAT</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($siswa as $key => $v) { ?>
                    <tr>
                        <td><?= ++$key ?></td>
                        <td><?= $v->nis ?></td>
                        <td><?= $v->nama_siswa ?></td>
                        <td><?= $v->alamat ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>