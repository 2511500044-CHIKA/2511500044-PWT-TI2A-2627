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
    $Id_jadwal = $_POST['id_jadwal'] ?? null;
    if (empty($Id_jadwal)) {
        echo "Jadwal belum dipilih!";
        exit;
    }

    $Kd_mapel = $_POST['Kd_mapel'] ?? null;
    if (empty($Kd_mapel)) {
        echo "Mapel belum dipilih!";
        exit;
    }
    $Nm_kelas = $_POST['Nm_kelas'];
    $Hari = $_POST['Hari'] ?? null;
    if (empty($Hari)) {
        echo "Hari belum dipilih!";
        exit;
    }
    $Jam = $_POST['Jam'];

    $insert = mysqli_query($koneksi, "INSERT INTO detail_jadwal(Kd_mapel, Nm_kelas, Hari, Jam, Jam_selesai)
    VALUES ('$Kd_mapel', '$Nm_kelas', '$Hari', '$Jam')")
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
                        <div class="form-group">
                            <label>Kode jadwal:</label>
                            <select name="id_jadwal" class="form-control" required>
                                <option value="">-- Pilih Jadwal --</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <?php
                                $data = mysqli_query($koneksi, "SELECT * FROM jadwal_kelas");
                                while ($d = mysqli_fetch_array($data)) {
                                ?>
                                    <option value="<?= $d['Id_jadwal']; ?>">
                                        <?= $d['Id_jadwal']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                            <div class="form-group">
                                <label>Kode Mapel:</label>
                                <select name="Kd_mapel" class="form-control" required>
                                    <option value="">-- Pilih Mapel --</option>
                                    <option value="Algoritma">Algoritma</option>
                                    <option value="Pemrograman Web">Pemrograman Web</option>
                                    <option value="Bahasa Inggris">Bahasa Inggris</option>

                                    <?php
                                    $data = mysqli_query($koneksi, "SELECT * FROM mapel");
                                    while ($d = mysqli_fetch_array($data)) {
                                    ?>
                                        <option value="<?= $d['Kd_mapel']; ?>">
                                            <?= $d['Nm_mapel']; ?>
                                        </option>
                                    <?php } ?>
                                </select>

                                <div class="form-group">
                                    <label>Nama Kelas:</label>
                                    <select name="Nm_kelas" class="form-control" required>
                                        <option value="">-- Pilih Kelas --</option>
                                        <option value="LAB2">LAB2</option>
                                        <option value="LAB3">LAB3</option>
                                        <option value="2.24">2.24</option>
                                        <option value="1.32">1.32</option>
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

                                <div class="form-group">
                                    <label>Hari:</label>
                                    <select name="Hari" class="form-control" required>
                                        <option value="">-- Pilih Hari --</option>
                                        <option value="Senin">Senin</option>
                                        <option value="Selasa">Selasa</option>
                                        <option value="Rabu">Rabu</option>
                                        <option value="Kamis">Kamis</option>
                                        <option value="Jumat">Jumat</option>
                                    </select>
                                </div>

                                    <div class="form-group">
                                        <label>Jam:</label>
                                        <input type="time" name="Jam" class="form-control">
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