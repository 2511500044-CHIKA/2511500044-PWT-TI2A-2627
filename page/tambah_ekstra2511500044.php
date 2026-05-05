<?php
include "config/koneksi.php"
?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Tambah Data Extrakulikuler</h1>
            </div>
        </div>
    </div>
</div>

<?php

if (isset($_POST['tambah'])) {
    $id_ekstra044 = $_POST['id_ekstra044'];
    $nama_ekstra044 = $_POST['nama_ekstra044'];
    $ket044 = $_POST['ket044'];
    $semester044 = $_POST['semester044'];
    $thn_ajaran044 = $_POST['thn_ajaran044'];

    $insert = mysqli_query($koneksi, "INSERT INTO ekstra_2511500044 (id_ekstra044, nama_ekstra044, ket044, semester044, thn_ajaran044) 
    VALUES ('$id_ekstra044', '$nama_ekstra044', '$ket044', '$semester044', '$thn_ajaran044')")
    or die (mysqli_error($koneksi));
    if ($insert) {
        echo '<div class="alert alert-info alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
            <h5><i class="icon fas fa-info"></i> Info</h5>
            <h4>Berhasil Di Simpan</h4></div>';
        echo '<meta http-equiv="refresh" content="1;url=index.php?page=ekstra2511500051">';
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
                            <label for="id_ekstra044">Id Extrakulikuler:</label>
                            <input type="text" name="id_ekstra044"  placeholder="Masukkan Id Extrakulikuler" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="nama_ekstra044">Nama Extrakulikuler:</label>
                            <input type="text" name="nama_ekstra044" id="nama_ekstra044" placeholder="Masukkan Nama Extrakulikuler" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="ket044">Keterangan:</label>
                            <input type="text" name="ket044" id="ket044" placeholder="Masukkan Keterangan" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="semester044">Semester:</label>
                            <input type="text" name="semester044" id="semester044" placeholder="Masukkan Semester" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="thn_ajaran044">Tahun Ajaran:</label>
                            <input type="text" name="thn_ajaran044" id="thn_ajaran044" placeholder="Masukkan Tahun Ajaran" class="form-control">
                        </div>
                        <div class="card-footer">
                            <input type="submit" name="tambah" class="btn btn-primary" value="Simpan">
                            <a href="index.php?page=ekstra2511500044" class="btn btn-danger">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>