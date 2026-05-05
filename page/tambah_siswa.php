<?php
include "config/koneksi.php"
?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Tambah Data Siswa</h1>
            </div>
        </div>
    </div>
</div>

<?php
//kode otomatis
$carikode = mysqli_query($koneksi, "SELECT MAX(Nis) FROM siswa") or die(mysqli_error($koneksi));
$datakode = mysqli_fetch_array($carikode);
if ($datakode) {
    $nilaikode = substr($datakode[0], 2);
    $kode = (int) $nilaikode;
    $kode = $kode + 1;
    $hasilkode = "M-" . str_pad($kode, 3, "0", STR_PAD_LEFT);
} else {$hasilkode ="M-";}
$_SESSION['KODE'] = $hasilkode;

if(isset($_POST['tambah'])){
        $nis = $_POST['Nis'];
        $id_user = $_POST['Id_user']; 
        $nm_siswa = $_POST['Nm_siswa'];
        $jenkel = $_POST['Jenkel'];
        $hp = $_POST['Hp'];
        $id_kelas = $_POST['Id_kelas'];

        $insert = mysqli_query($koneksi, "INSERT INTO siswa VALUES ('$nis', '$id_user', '$nm_siswa', '$jenkel', '$hp', '$id_kelas')");
        $insertkelas = mysqli_query($koneksi, "INSERT INTO kelas (Id_kelas) VALUES ('$id_kelas')");
        if ($insert) {
            echo '<div class="alert alert-info alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
            <h5><i class="icon fas fa-info"></i> Info</h5>
            <h4>Berhasil Di Simpan</h4></div>';
            echo '<meta http-equiv="refresh" content="1;url=index.php?page=siswa">';
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
                            <label for="Nis">Nis:</label>
                            <input type="number" name="Nis" id="Nis" placeholder="Masukkan Nis" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="Id_user">Id User:</label>
                            <input type="text" name="Id_user" id="Id_user" placeholder="Masukkan Id User" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="Nm_siswa">Nama Siswa:</label>
                            <input type="text" name="Nm_siswa" id="Nm_siswa" placeholder="Masukkan Nama Siswa" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="Jenkel">Jenis Kelamin:</label>
                            <select name="Jenkel" id="Jenkel" class="form-control">
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Hp">No HP:</label>
                            <input type="number" name="Hp" id="Hp" placeholder="Masukkan No HP" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="Id_kelas">Id Kelas:</label>
                            <input type="text" name="Id_kelas" id="Id_kelas" placeholder="Masukkan Id Kelas" class="form-control">
                        </div>
                        <div class="card-footer">
                            <input type="submit" name="tambah" class="btn btn-primary" value="Simpan">
                            <a href="index.php?page=siswa" class="btn btn-danger">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>