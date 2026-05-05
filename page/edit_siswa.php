<?php
include "config/koneksi.php"
?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit Data Siswa</h1>
            </div>
        </div>
    </div>
</div>

<?php
 $kd = $_GET['kd'];
    $edit = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM siswa WHERE Nis='$kd'"));

    if(isset($_POST['tambah'])){
        $nis = $_POST['Nis'];
        $id_user = $_POST['Id_user'];
        $nm_siswa = $_POST['Nm_siswa'];
        $jenkel = $_POST['Jenkel'];
        $hp = $_POST['Hp'];
        $id_kelas = $_POST['Id_kelas'];

        $insert = mysqli_query($koneksi, "UPDATE siswa SET Id_user='$id_user', Nm_siswa='$nm_siswa', Jenkel='$jenkel', Hp='$hp', Id_kelas='$id_kelas' WHERE Nis='$kd'");
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
                            <input type="number" name="Nis" value="<?= $edit['Nis']; ?>" placeholder="Masukkan Nis" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="Id_user">Id User:</label>
                            <input type="text" name="Id_user" id="Id_user" value="<?= $edit['Id_user']; ?>" placeholder="Masukkan Id User" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="Nm_siswa">Nama Siswa:</label>
                            <input type="text" name="Nm_siswa" id="Nm_siswa" value="<?= $edit['Nm_siswa']; ?>" placeholder="Masukkan Nama Siswa" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="Jenkel">Jenis Kelamin:</label>
                            <select name="Jenkel" id="Jenkel" class="form-control">
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="Laki-laki" <?= ($edit['Jenkel'] == 'Laki-laki') ? 'selected' : ''; ?>>Laki-laki</option>
                                <option value="Perempuan" <?= ($edit['Jenkel'] == 'Perempuan') ? 'selected' : ''; ?>>Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Hp">No HP:</label>
                            <input type="number" name="Hp" id="Hp" value="<?= $edit['Hp']; ?>" placeholder="Masukkan No HP" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="Id_kelas">Id Kelas:</label>
                            <input type="text" name="Id_kelas" id="Id_kelas" value="<?= $edit['Id_kelas']; ?>" placeholder="Masukkan Id Kelas" class="form-control">
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
</section>