<?php
include "config/koneksi.php"
?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Tambah Data Kelas</h1>
            </div>
        </div>
    </div>
</div>

<?php
//kode otomatis
$carikode = mysqli_query($koneksi, "SELECT MAX(Id_kelas) FROM kelas") or die(mysqli_error($koneksi));
$datakode = mysqli_fetch_array($carikode);
if ($datakode) {
    $nilaikode = substr($datakode[0], 2);
    $kode = (int) $nilaikode;
    $kode = $kode + 1;
    $hasilkode = "K-" . str_pad($kode, 3, "0", STR_PAD_LEFT);
} else {$hasilkode ="K-";}
$_SESSION['KODE'] = $hasilkode;

if(isset($_POST['tambah'])){
        $kd_kelas = $_POST['Kd_kelas'];
        $nm_kelas = $_POST['Nm_kelas'];

        $insert = mysqli_query($koneksi, "INSERT INTO kelas VALUES ('$kd_kelas', '$nm_kelas')");
        if ($insert) {
            echo '<div class="alert alert-info alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
            <h5><i class="icon fas fa-info"></i> Info</h5>
            <h4>Berhasil Di Simpan</h4></div>';
            echo '<meta http-equiv="refresh" content="1;url=index.php?page=kelas">';
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
                            <label for="Kd_kelas">Kode Kelas:</label>
                            <input type="text" name="Kd_kelas"  placeholder="Masukkan Kode Kelas" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="Nm_kelas">Nama Kelas:</label>
                            <input type="text" name="Nm_kelas" id="Nm_kelas" placeholder="Masukkan Nama Kelas" class="form-control">
                        </div>
                        <div class="card-footer">
                            <input type="submit" name="tambah" class="btn btn-primary" value="Simpan">
                            <a href="index.php?page=kelas" class="btn btn-danger">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>