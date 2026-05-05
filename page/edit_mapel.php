<?php
include "config/koneksi.php"
?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">  
                <h1 class="m-0 text-dark">Tambah Data Mapel Pelajaran</h1>
            </div>
        </div>
    </div>
</div>

<?php
$kd = $_GET['kd'];
$edit = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM mapel WHERE Kd_mapel='$kd'"));

if (isset($_POST['tambah'])) {
    $kd_mapel = $_POST['kd_mapel'];
    $Nm_mapel = $_POST['Nm_mapel'];
    $Kkm = $_POST['Kkm'];

    $insert = mysqli_query($koneksi, "UPDATE mapel SET Nm_mapel='$Nm_mapel', Kkm='$Kkm' WHERE Kd_mapel='$kd_mapel'");
    if ($insert) {
        echo '<div class="alert alert-info alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
            <h5><i class="icon fas fa-info"></i> Info</h5>
            <h4>Berhasil Di Simpan</h4></div>';
        echo '<meta http-equiv="refresh" content="1;url=index.php?page=mapel">';
    } else {
        echo '<div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                <h5><i class="icon fas fa-info"></i> Info</h5>
                <h4>Gagal Di Simpan</h4>
            </div>';
    }
}

?>
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="card-body p-2">
                    <form method="POST" action="">
                        <div class="form-group
                        ">
                            <label for="Kd_mapel">Kode Mapel:</label>
                            <input type="number" name="kd_mapel" value="<?= $edit['Kd_mapel']; ?>" placeholder="Masukkan Kode Mapel" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="Nm_mapel">Nama Mapel:</label>
                            <input type="text" name="Nm_mapel" id="Nm_mapel" value="<?= $edit['Nm_mapel']; ?>" placeholder="Masukkan Nama Mapel " class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="Kkm">KKM:</label>
                            <input type="number" name="Kkm" id="Kkm" value="<?= $edit['Kkm']; ?>" placeholder="Masukkan KKM" class="form-control">
                        </div>
                        <div class="card-footer">
                            <input type="submit" name="tambah" class="btn btn-primary" value="Simpan">
                            <a href="index.php?page=mapel" class="btn btn-danger">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>