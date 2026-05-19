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
    $kd = $_GET['kd'];
    $edit = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM guru WHERE Kd_guru='$kd'"));

    if(isset($_POST['tambah'])){
        $kd_guru = $_POST['kd_guru'];
        $Nm_guru = $_POST['Nm_guru'];
        $Jenkel = $_POST['Jenkel'];
        $Pend_terakhir = $_POST['Pend_terakhir'];
        $Hp = $_POST['Hp'];
        $Alamat = $_POST['Alamat'];

        $insert = mysqli_query($koneksi, "UPDATE guru SET Kd_guru='$kd_guru', Nm_guru='$Nm_guru', Jenkel='$Jenkel', Pend_terakhir='$Pend_terakhir', Hp='$Hp', Alamat='$Alamat' WHERE Kd_guru='$kd_guru'");
        if ($insert) {
            echo '<div class="alert alert-info alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
            <h5><i class="icon fas fa-info"></i> Info</h5>
            <h4>Berhasil Di Simpan</h4></div>';
            echo '<meta http-equiv="refresh" content="1;url=index.php?page=guru">';
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
                        <div class="form-group">
                            <label for="Kd_guru">Kode Guru:</label>
                            <input type="number" name="Kd_guru" value="<?= $edit['Kd_guru']; ?>" placeholder="Masukkan Kode Guru" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="Nm_guru">Nama Guru:</label>
                            <input type="text" name="Nm_guru" id="Nm_guru" value="<?= $edit['Nm_guru']; ?>" placeholder="Masukkan Nama Guru" class="form-control">
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
                            <label for="Pend_terakhir">Pendidikan Terakhir:</label>
                            <select name="Pend_terakhir" id="Pend_terakhir" class="form-control">
                                <option value="">Pilih Pendidikan Terakhir</option>
                                <option value="SMA" <?= ($edit['Pend_terakhir'] == 'SMA') ? 'selected' : ''; ?>>SMA</option>
                                <option value="D3" <?= ($edit['Pend_terakhir'] == 'D3') ? 'selected' : ''; ?>>D3</option>
                                <option value="S1" <?= ($edit['Pend_terakhir'] == 'S1') ? 'selected' : ''; ?>>S1</option>
                                <option value="S2" <?= ($edit['Pend_terakhir'] == 'S2') ? 'selected' : ''; ?>>S2</option>
                                <option value="S3" <?= ($edit['Pend_terakhir'] == 'S3') ? 'selected' : ''; ?>>S3</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Hp">No HP:</label>
                            <input type="number" name="Hp" id="Hp" value="<?= $edit['Hp']; ?>" placeholder="Masukkan No HP" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="Alamat">Alamat:</label>
                            <input type="text" name="Alamat" id="Alamat" value="<?= $edit['Alamat']; ?>" placeholder="Masukkan Alamat" class="form-control">
                        </div>
                        <div class="card-footer">
                            <input type="submit" name="tambah" class="btn btn-primary" value="Simpan">
                            <a href="index.php?page=guru" class="btn btn-danger">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>