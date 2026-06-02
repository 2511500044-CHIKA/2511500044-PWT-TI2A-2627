<?php
include "config/koneksi.php"
?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Data Detail Jadwal</h1>
            </div>
        </div>
    </div>
</div>

<?php

if (isset($_GET['action'])) {
    if ($_GET['action'] == "hapus") {
        $Id = $_GET['Id'];
        $query = mysqli_query($koneksi, "DELETE FROM detail_jadwal WHERE Id_jadwal='$Id'");
        if ($query) {
            echo '
            <div class="alert alert-warning alert-dismissible">
                Berhasil Di Hapus</div>';
            echo '<meta http-equiv="refresh" content="1;url=index.php?page=detail_jadwal">';
        }
    }
}
?>

<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <a href="index.php?page=tambah_detail_jadwal" class="btn btn-primary btn-sm">Tambah Detail Jadwal</a>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th style="text-align: center;">No</th>
                            <th style="text-align: center;">Id Jadwal</th>
                            <th style="text-align: center;">Kode Mapel</th>
                            <th style="text-align: center;">Nama Kelas</th>
                            <th style="text-align: center;">Hari</th>
                            <th style="text-align: center;">Jam</th>
                            <th style="text-align: center;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 0;
                        $query = mysqli_query($koneksi, "SELECT dj.*, m.Kd_mapel, jk.Id_jadwal FROM detail_jadwal dj
                        JOIN jadwal_kelas jk ON dj.Id_jadwal = jk.Id_jadwal
                        JOIN mapel m ON dj.Kd_mapel = m.Kd_mapel");
                        while ($result = mysqli_fetch_array($query)) {
                            $no++;
                        ?>
                            <tr style="text-align: center;">
                                <td><?= $no; ?></td>
                                <td><?= $result['Id_jadwal']; ?></td>
                                <td><?= $result['Kd_mapel']; ?></td>
                                <td><?= $result['Nm_kelas']; ?></td>
                                <td><?= $result['Hari']; ?></td>
                                <td><?= $result['Jam']; ?></td>
                                <td>
                                    <a href="index.php?page=detail_jadwal&action=hapus&Id=<?= $result['Id_jadwal']; ?>" title="">
                                        <span class=" badge badge-danger">Hapus</span></a>
                                    <a href="index.php?page=edit_detail_jadwal&Id=<?= $result['Id_jadwal']; ?>" title="">
                                        <span class="badge badge-warning">Edit</span></a>
                                </td>
                            </tr>
                    <?php } ?>
                </tbody>
                </table>
            </div>
        </div>
    </div>
</div>