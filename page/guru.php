<?php
include "config/koneksi.php";
?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit Data Guru</h1>
            </div>
        </div>
    </div>
</div>

<?php
if (isset($_POST['tambah'])) {
    $Id_kelas = $_POST['Id_kelas'];
    $Thn_ajaran = $_POST['Thn_ajaran'];
    $Semester = $_POST['Semester'];

    $insert = mysqli_query($koneksi, "INSERT INTO jadwal_Kelas(Id_kelas, Thn_ajaran, Semester) VALUES ('$Id_kelas', '$Thn_ajaran', '$Semester')")
    or die (mysqli_error($koneksi));
    if ($insert) {
            echo '<div class="alert alert-info alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
            <h5><i class="icon fas fa-info"></i> Info</h5>
            <h4>Berhasil Di Simpan</h4></div>';
        echo '<meta http-equiv="refresh" content="1;url=index.php?page=jadwal_kelas">';
    } else {
        echo '<div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                <h5><i class="icon fas fa-info"></i> Info</h5>
                <h4>Gagal Di Simpan</h4>
            </div>';
    }
}
?>

<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <a href="index.php?page=tambah_guru" class="btn btn-primary btn-sm">Tambah Guru</a>
                <table class="table table-striped">
                    <tread>
                        <tr>
                            <th style="text-align: center;">No</th>
                            <th style="text-align: center;">Kode Guru</th>
                            <th style="text-align: center;">Id User</th>
                            <th style="text-align: center;">Nama Guru</th>
                            <th style="text-align: center;">Jenis Kelamin</th>
                            <th style="text-align: center;">Pendidikan Terakhir</th>
                            <th style="text-align: center;">No Hp</th>
                            <th style="text-align: center;">Alamat</th>
                            <th style="text-align: center;">Aksi</th>
                        </tr>
                    </tread>
                    <?php
                    $no = 0;
                    $query = mysqli_query($koneksi, "SELECT * FROM guru");
                    while ($result = mysqli_fetch_array($query)) {
                        $no++;
                    ?>
 <tbody>
                            <tr style="text-align: center;">
                                <td><?= $no; ?></td>
                                <td><?= $result['Kd_guru']; ?></td>
                                <td><?= $result['Id_user']; ?></td>
                                <td><?= $result['Nm_guru']; ?></td>
                                <td><?= $result['Jenkel']; ?></td>
                                <td><?= $result['Pend_terakhir']; ?></td>
                                <td><?= $result['Hp']; ?></td>
                                <td><?= $result['Alamat']; ?></td>
                                <td>
                                    <a href="index.php?page=guru&action=hapus&kd=<?= $result['Kd_guru']; ?>" title ="">
                                            <span class=" badge badge-danger">Hapus</span></a>
                                    <a href="index.php?page=edit_guru&kd=<?= $result['Kd_guru']; ?>" title="">
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