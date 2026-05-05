<?php
include "config/koneksi.php"
?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Tambah Data Jadwal Kelas</h1>
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
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="card-body p-2">
                    <form method="POST" action="">
                        <div class="form-group
                        ">
                            <label for="Id_jadwal">Id Jadwal:</label>
                            <input type="text" name="Id_jadwal"  placeholder="Masukkan Id Jadwal" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="Id_kelas">Id Kelas:</label>
                            <input type="text" name="Id_kelas" id="Id_kelas" placeholder="Masukkan Id Kelas" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="Thn_ajaran">Tahun Ajaran:</label>
                            <input type="text" name="Thn_ajaran" id="Thn_ajaran" placeholder="Masukkan Tahun Ajaran" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="Semester">Semester:</label>
                            <input type="text" name="Semester" id="Semester"  placeholder="Masukkan Semester" class="form-control">
                        </div>
                        <div class="card-footer">
                            <input type="submit" name="tambah" class="btn btn-primary" value="Simpan">
                            <a href="index.php?page=jadwal_kelas" class="btn btn-danger">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>