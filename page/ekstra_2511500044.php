<?php
include "config/koneksi.php"
?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Data Ekstrakurikuler</h1>
            </div>
        </div>
    </div>
</div>

<?php
if (isset($_GET['action'])) {
    if ($_GET['action'] == "hapus") {
        $Id = $_GET['Id'];
        $query = mysqli_query($koneksi, "DELETE FROM ekstra_2511500044 WHERE id_ekstra044='$Id'");
        if ($query) {
            echo '
            <div class="alert alert-warning alert-dismissible">
                Berhasil Di Hapus</div>';
            echo '<meta http-equiv="refresh" content="1;url=index.php?page=ekstra2511500044">';
        }
    }
}
?>

<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <a href="index.php?page=tambah_ekstra2511500044" class="btn btn-primary btn-sm">Tambah Extrakulikuler</a>
                <table class="table table-striped">
                    <tread>
                        <tr>
                            <th style="text-align: center;">No</th>
                            <th style="text-align: center;">Id Ektrakulikuler</th>
                            <th style="text-align: center;">Nama Ektrakulikuler</th>
                            <th style="text-align: center;">Keterangan</th>
                            <th style="text-align: center;">Semester</th>
                            <th style="text-align: center;">Tahun Ajaran</th>
                            <th style="text-align: center;">Aksi</th>
                        </tr>
                    </tread>
                    <?php
                    $no = 0;
                    $query = mysqli_query($koneksi, "SELECT * FROM ekstra_2511500044");
                    while ($result = mysqli_fetch_array($query)) {
                        $no++;
                    ?>
                        <tbody>
                            <tr style="text-align: center;">
                                <td><?= $no; ?></td>
                                <td><?= $result['id_ekstra044']; ?></td>
                                <td><?= $result['nama_ekstra044']; ?></td>
                                <td><?= $result['ket044']; ?></td>
                                <td><?= $result['semester044']; ?></td>
                                <td><?= $result['thn_ajaran044']; ?></td>
                                <td>
                                    <a href="index.php?page=ekstra2511500044&action=hapus&Id=<?= $result['id_ekstra044']; ?>" title ="">
                                            <span class=" badge badge-danger">Hapus</span></a>
                                    <a href="index.php?page=edit_ekstra2511500044&Id=<?= $result['id_ekstra044']; ?>" title="">
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