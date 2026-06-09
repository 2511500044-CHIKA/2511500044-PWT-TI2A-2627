
<?php
include "config/koneksi.php";
?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Tambah Data Detail Jadwal</h1>
            </div>
        </div>
    </div>
</div>

<?php

if (isset($_POST['tambah'])) {
    $Id_jadwal = $_POST['Id_jadwal'];
    $Kd_mapel = $_POST['Kd_mapel'];
    $Kd_guru = $_POST['Kd_guru'];
    $Hari = $_POST['Hari'];
    $Jam_mulai = $_POST['Jam_mulai'];
    $Jam_selesai = $_POST['Jam_selesai'];

    $insert = mysqli_query($koneksi, "INSERT INTO detail_jadwal(Id_jadwal, Kd_mapel, Kd_guru, Hari, Jam_mulai, Jam_selesai)
    VALUES ('$Id_jadwal', '$Kd_mapel', '$Kd_guru', '$Hari', '$Jam_mulai', '$Jam_selesai')")
        or die(mysqli_error($koneksi));
    if ($insert) {
        echo '<div class="alert alert-info alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
            <h5><i class="icon fas fa-info"></i> Info</h5>
            <h4>Berhasil Di Simpan</h4></div>';
        echo '<meta http-equiv="refresh" content="1;url=index.php?page=detail_jadwal">';
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
                    </form>
                    <div class="form-group
                        ">
                        <label for="Id_jadwal">Id Jadwal:</label>
                        <input type="text" name="Id_jadwal" placeholder="Masukkan Id Jadwal" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="Kd_mapel">Kode Mapel:</label>
                        <input type="text" name="Kd_mapel" id="Kd_mapel" placeholder="Masukkan Kode Mapel" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="Kd_guru">Kode Guru:</label>
                        <select name="Kd_guru" id="Kd_guru" class="form-control">
                            <option value="">-- Pilih Guru --</option>
                            <?php
                            $data = mysqli_query($koneksi, "SELECT * FROM guru");
                            while ($d = mysqli_fetch_array($data)) {
                                echo "<option value='" . $d['Kd_guru'] . "'>" . $d['Nama_guru'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Hari">Hari:</label>
                        <input type="text" name="Hari" id="Hari" placeholder="Masukkan Hari" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="Jam_mulai">Jam Mulai:</label>
                        <input type="time" name="Jam_mulai" id="Jam_mulai" placeholder="Masukkan Jam Mulai" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="Jam_selesai">Jam Selesai:</label>
                        <input type="time" name="Jam_selesai" id="Jam_selesai" placeholder="Masukkan Jam Selesai" class="form-control">
                    </div>
                    <div class="card-footer">
                        <input type="submit" name="tambah" class="btn btn-primary" value="Simpan">
                        <a href="index.php?page=detail_jadwal" class="btn btn-danger">Batal</a>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>