<?php
include "config/koneksi.php";
?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Tambah Data Guru</h1>
            </div>
        </div>
    </div>
</div>

<?php

if (isset($_POST['tambah'])) {
    $Kd_guru = $_POST['Kd_guru'];
    $Nm_guru = $_POST['Nm_guru'];
    $Jenkel = $_POST['Jenkel'];
    $Pend_terakhir = $_POST['Pend_terakhir'];
    $Hp = $_POST['Hp'];
    $Alamat = $_POST['Alamat'];

    $insert = mysqli_query($koneksi, "INSERT INTO guru (Kd_guru, Nm_guru, Jenkel, Pend_terakhir, Hp, Alamat) VALUES ('$Kd_guru', '$Nm_guru', '$Jenkel', '$Pend_terakhir', '$Hp', '$Alamat')")
    or die (mysqli_error($koneksi));
    $insertusers = mysqli_query($koneksi, "INSERT INTO users (Username, Password, Role) VALUES ('$Kd_guru', '1234', 'guru')")
    or die (mysqli_error($koneksi));
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
                        <div class="form-group
                        ">
                            <label for="Kd_guru">Kode Guru:</label>
                            <input type="text" name="Kd_guru"  placeholder="Masukkan Kode Guru" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="Nm_guru">Nama Guru:</label>
                            <input type="text" name="Nm_guru" id="Nm_guru" placeholder="Masukkan Nama Guru" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="Jenkel">Jenis Kelamin:</label>
                            <select name="Jenkel" id="Jenkel" class="form-control">
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Pend_terakhir">Pendidikan Terakhir:</label>
                            <select name="Pend_terakhir" id="Pend_terakhir" class="form-control">
                                <option value="SMA">SMA</option>
                                <option value="D3">D3</option>
                                <option value="S1">S1</option>
                                <option value="S2">S2</option>
                                <option value="S3">S3</option>
                            </select>

                        </div>
                        <div class="form-group">
                            <label for="Hp">HP:</label>
                            <input type="text" name="Hp" id="Hp" placeholder="Masukkan HP" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="Alamat">Alamat:</label>
                            <input type="text" name="Alamat" id="Alamat" placeholder="Masukkan Alamat" class="form-control">
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