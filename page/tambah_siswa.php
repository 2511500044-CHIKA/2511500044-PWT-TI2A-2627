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
$carikode = mysqli_query($koneksi, "SELECT MAX(Id_user) FROM siswa") or die(mysqli_error($koneksi));
$datakode = mysqli_fetch_array($carikode);
if ($datakode && $datakode[0] != null) {
    $nilaikode = substr($datakode[0], 2);
    $kode = (int) $nilaikode;
    $kode = $kode + 1;
    $hasilkode = "H-" . str_pad($kode, 3, "0", STR_PAD_LEFT);
} else {$hasilkode ="H-001";}
$_SESSION['KODE'] = $hasilkode;

if(isset($_POST['tambah'])){
        $Nis = $_POST['Nis'];
        $Id_user = $_POST['Id_user']; 
        $Nm_siswa = $_POST['Nm_siswa'];
        $Jenkel = $_POST['Jenkel'];
        $Hp = $_POST['Hp'];
        $Id_kelas = $_POST['Id_kelas'];
        $Nm_kelas = $_POST['Nm_kelas'];

        $insert = mysqli_query($koneksi, "INSERT INTO siswa VALUES ('$Nis', '$Id_user', '$Nm_siswa', '$Jenkel', '$Hp', '$Id_kelas')");
        $insertusers = mysqli_query($koneksi, "INSERT INTO users (Username, Password, Role) VALUES ('$Nis', '1234', 'siswa')")
    or die (mysqli_error($koneksi));
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
                            <input type="text" name="Nis" id="Nis" placeholder="Masukkan Nis" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="Id_user">Id User:</label>
                            <input type="text" name="Id_user" value="<?= $_SESSION['KODE'] ?>" class="form-control" readonly>
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
                            <input type="text" name="Hp" id="Hp" placeholder="Masukkan No HP" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="Id_kelas">Id Kelas:</label>
                            <select name="Id_kelas" class="form-control" required>
                                <option value="">-- Pilih Kelas --</option>
                                <?php
                                $data = mysqli_query($koneksi, "SELECT * FROM kelas");
                                while ($d = mysqli_fetch_array($data)) {
                                ?>
                                            <option value="<?= $d['Id_kelas']; ?>">
                                                <?= $d['Id_kelas']; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                        </div>
                        <div class="form-group">
                            <label for="Nm_kelas">Nama Kelas:</label>
                            <select name="Nm_kelas" class="form-control" required>
                                <option value="">-- Pilih Kelas --</option>
                                <?php
                                $data = mysqli_query($koneksi, "SELECT * FROM kelas");
                                while ($d = mysqli_fetch_array($data)) {
                                ?>
                                            <option value="<?= $d['Nm_kelas']; ?>">
                                                <?= $d['Nm_kelas']; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
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