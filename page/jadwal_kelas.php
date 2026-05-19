<?php
include "config/koneksi.php";
?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Data Jadwal Kelas</h1>
            </div>
        </div>
    </div>
</div>

<?php
if (isset($_GET['action'])) {
    if ($_GET['action'] == "hapus") {
        $kd = $_GET['kd'];
        $query = mysqli_query($koneksi, "DELETE FROM jadwal_Kelas WHERE Id_jadwal='$kd'");
        if ($query) {
            echo '
            <div class="alert alert-warning alert-dismissible">
                Berhasil Di Hapus</div>';
            echo '<meta http-equiv="refresh" content="1;url=index.php?page=jadwal_kelas">';
        }
    }
}
?>

<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <a href="index.php?page=tambah_jadwal_kelas" class="btn btn-primary btn-sm">Tambah Jadwal Kelas</a>
                <table class="table table-striped">
                    <tread>
                        <tr>
                            <th style="text-align: center;">No</th>
                            <th style="text-align: center;">Id Jadwal</th>
                            <th style="text-align: center;">Id Kelas</th>
                            <th style="text-align: center;">Tahun Ajaran</th>
                            <th style="text-align: center;">Semester</th>
                            <th style="text-align: center;">Aksi</th>
                        </tr>
                    </tread>
                    <?php
                    $no = 0;
                    $query = mysqli_query($koneksi, "SELECT * FROM jadwal_Kelas");
                    while ($result = mysqli_fetch_array($query)) {
                        $no++;
                    ?>
                        <tbody>
                            <tr style="text-align: center;">
                                <td><?= $no; ?></td>
                                <td><?= $result['Id_jadwal']; ?></td>
                                <td><?= $result['Id_kelas']; ?></td>
                                <td><?= $result['Thn_ajaran']; ?></td>
                                <td><?= $result['Semester']; ?></td>
                                <td>
                                    <a href="index.php?page=jadwal_kelas&action=hapus&kd=<?= $result['Id_jadwal']; ?>" title="">
                                        <span class=" badge badge-danger">Hapus</span></a>
                                    <a href="index.php?page=edit_jadwal_kelas&kd=<?= $result['Id_jadwal']; ?>" title="">
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