<?php
include "config/koneksi.php"
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
    $Kd_guru = $_POST['Kd_guru'];
    $Hari = $_POST['Hari'] ?? null;
    if (empty($Hari)) {
        echo "Hari belum dipilih!";
        exit;
    }
    $Jam_mulai = $_POST['Jam_mulai'];
    $Jam_selesai = $_POST['Jam_selesai'];

    $insert = mysqli_query($koneksi, "INSERT INTO detail_jadwal(Kd_mapel, Kd_guru, Hari, Jam_mulai, Jam_selesai)
    VALUES ('$Kd_mapel', '$Kd_guru', '$Hari', '$Jam_mulai', '$Jam_selesai')")
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
                                    <label>Kode Guru:</label>
                                    <select name="Kd_guru" class="form-control" required>
                                        <option value="">-- Pilih Guru --</option>
                                        <?php
                                        $data = mysqli_query($koneksi, "SELECT * FROM guru");
                                        while ($d = mysqli_fetch_array($data)) {
                                        ?>
                                            <option value="<?= $d['Kd_guru']; ?>">
                                                <?= $d['Kd_guru']; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Hari:</label><br>
                                    <select name="hari" style="width: 100%; padding: 8px; margin-bottom: 10px;">
                                        <option value="">-- Pilih Hari --</option>
                                        <option value="Senin">Senin</option>
                                        <option value="Selasa">Selasa</option>
                                        <option value="Rabu">Rabu</option>
                                        <option value="Kamis">Kamis</option>
                                        <option value="Jumat">Jumat</option>
                                    </select>

                                    <div class="form-group">
                                        <label>Jam Mulai:</label>
                                        <input type="time" name="Jam_mulai" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>Jam Selesai:</label>
                                        <input type="time" name="Jam_selesai" class="form-control">
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