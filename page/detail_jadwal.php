
<?php
include "config/koneksi.php";
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
        $kd = $_GET['kd'];
        $query = mysqli_query($koneksi, "DELETE FROM detail_jadwal WHERE Id_jadwal='$kd'");
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
                    <tread>
                        <tr>
                            <th style="text-align: center;">No</th>
                            <th style="text-align: center;">Id Jadwal</th>
                            <th style="text-align: center;">Kode Mapel</th>
                            <th style="text-align: center;">Kode Guru</th>
                            <th style="text-align: center;">Hari</th>
                            <th style="text-align: center;">Jam Mulai</th>
                            <th style="text-align: center;">Jam Selesai</th>
                            <th style="text-align: center;">Aksi</th>
                        </tr>
                    </tread>
                    <?php
                    $no = 0;
                    $query = mysqli_query($koneksi, "SELECT * FROM detail_jadwal");
                    while ($result = mysqli_fetch_array($query)) {
                        $no++;
                    ?>
                        <tbody>
                            <tr style="text-align: center;">
                                <td><?= $no; ?></td>
                                <td><?= $result['Id_jadwal']; ?></td>
                                <td><?= $result['Kd_mapel']; ?></td>
                                <td><?= $result['Kd_guru']; ?></td>
                                <td><?= $result['Hari']; ?></td>
                                <td><?= $result['Jam_mulai']; ?></td>
                                <td><?= $result['Jam_selesai']; ?></td>
                                <td>
                                    <a href="index.php?page=detail_jadwal&action=hapus&kd=<?= $result['Id_jadwal']; ?>" title ="">
                                            <span class=" badge badge-danger">Hapus</span></a>
                                    <a href="index.php?page=edit_detail_jadwal&kd=<?= $result['Id_jadwal']; ?>" title="">
                                        <span class="badge badge-warning">Edit</span></a>
                                </td>
                            </tr>
                        </tbody>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>