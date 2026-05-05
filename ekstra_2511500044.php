<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Data ekstra_2511500044</h1>
            </div>
        </div>
    </div>
</div>

<?php
if (isset($_GET['action'])) {
    if ($_GET['action'] == "hapus") {
        $kd = $_GET['kd'];
        $query = mysqli_query($koneksi, "DELETE FROM ekstra2511500044 WHERE id_ekstra = '$kd' ");

        if ($query) {
            echo '
            <div class="alert alert-warning alert-dismissible">
                Berhasil Di Hapus
            </div>';
            echo '<meta http-equiv="refresh" content="1;url=index.php?page=ekstra2511500044">';
        }
    }
}
?>

<div class="content"></div>
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <a href="index.php?page=tambah_ekstra" class="btn btn-primary btn-sm">
                Tambah Ekstrakurikuler
            </a>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>id_ekstra</th>
                        <th>nama_ekstra</th>
                        <th>ket</th>
                        <th>semester</th>
                        <th>thn_ajaran</th>
                    </tr>
                </thead>

                <?php
                $no = 0;
                $query = mysqli_query($koneksi, "SELECT * FROM ekstra2511500059");
                    while ($result = mysqli_fetch_array($query) ) {
                    $no++;
                    ?>

                    <tbody>
                        <tr>
                            <td><?= $no; ?></td>
                            <td><?= $result['id_ekstra']; ?></td>
                            <td><?= $result['nama_ekstra']; ?></td>
                            <td><?= $result['ket']; ?></td>
                            <td><?= $result['semester']; ?></td>
                            <td><?= $result['thn_ajaran']; ?></td>
                            <td>
                                <a href="index.php?page=ekstra&action=hapus&kd=<?= $result['id_ekstra']; ?>" title="delete">
                                    <span class="badge badge-danger">Hapus</span>
                                </a>

                                <a href="index.php?page=edit_ekstra&kd=<?= $result['id_ekstra']; ?>" title="edit">
                                    <span class="badge badge-warning">Edit</span>
                                </a>
                            </td>
                        </tr>
                    </tbody>

                <?php } ?>
            </table>
        </div>
    </div>
</div>