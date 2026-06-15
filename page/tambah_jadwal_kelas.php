<?php
session_start();
include "config/koneksi.php";
?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"> Tambah Data Jadwal Kelas </h1>
            </div>
        </div>
    </div>
</div>

<?php
$allSuccess = true;
//kode otomatis
$carikode = mysqli_query($koneksi, "SELECT MAX(Id_jadwal) FROM jadwal_kelas") or die(mysqli_error($koneksi));
$datakode = mysqli_fetch_array($carikode);
if ($datakode && $datakode[0] != null) {
    $nilaikode = substr($datakode[0], 2);
    $kode = (int) $nilaikode;
    $kode = $kode + 1;
    $hasilkode = "J-" . str_pad($kode, 3, "0", STR_PAD_LEFT);
} else {
    $hasilkode = "J-001";
}

$_SESSION['KODE'] = $hasilkode;


if (isset($_POST['tambah'])) {

    $Id_jadwal   = $_POST['Id_jadwal'];
    $Nm_guru     = $_POST['Nm_guru'];
    $Thn_ajaran  = $_POST['Thn_ajaran'];
    $Semester    = $_POST['Semester'];

    $Kd_mapel   = $_POST['Kd_mapel'] ?? [];
    $Hari       = $_POST['Hari'] ?? [];
    $Jam_mulai  = $_POST['Jam_mulai'] ?? [];
    $Jam_selesai = $_POST['Jam_selesai'] ?? [];
    $Nm_kelas   = $_POST['Nm_kelas'] ?? [];

    $insertjadwal = mysqli_query($koneksi, "INSERT INTO jadwal_kelas (Id_jadwal, Nm_guru, Thn_ajaran, Semester) VALUES ('$Id_jadwal', '$Nm_guru',
    '$Thn_ajaran', '$Semester')");

    if (!$insertjadwal) {
        echo "Gagal insert ke tabel jadwal_kelas: " . mysqli_error($koneksi);
        die;
    }

    $allSuccess = true;
        for ($i = 0; $i < (is_array($Kd_mapel) ? count($Kd_mapel) : 0); $i++) {
        $insert = mysqli_query($koneksi, "INSERT INTO detail_jadwal (Id_jadwal, Kd_mapel, Hari, Jam_mulai, Jam_selesai, Nm_kelas)
            VALUES('$Id_jadwal','{$Kd_mapel[$i]}','{$Hari[$i]}','{$Jam_mulai[$i]}','{$Jam_selesai[$i]}','{$Nm_kelas[$i]}')");

        if (!$insert) {
            $allSuccess = false;
        }
    }
    if ($allSuccess) {
        echo '<div class="alert alert-info alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-info"></i> Info </h5>
        <h4>Berhasil Disimpan</h4>
        </div>';

        echo '<meta http-equiv="refresh" content="1;url=index.php?page=jadwal_kelas">';
    } else {
        echo '<div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-info"></i> Info </h5>
        <h4>Gagal menyimpan sebagian atau seluruh data detail.</h4>
        </div>';
    }
}
?>
<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="">
                    <div class="form-group">
                        <label>Id Jadwal</label>
                        <input type="text" name="Id_jadwal" value="<?= $hasilkode ?>" class="form-control" readonly>
                    </div>
                        <div class="form-group">
                                    <label>Nama Guru:</label>
                                    <select name="Nm_guru" class="form-control" required>
                                        <option value="">-- Pilih Guru --</option>
                                        <?php
                                        $data = mysqli_query($koneksi, "SELECT * FROM guru");
                                        while ($d = mysqli_fetch_array($data)) {
                                        ?>
                                            <option value="<?= $d['Nm_guru']; ?>">
                                                <?= $d['Nm_guru']; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                    <div class="form-group">
                        <label>Tahun Ajaran</label>
                        <select name="Thn_ajaran" class="form-control" required>
                            <option selected disabled>--Pilih Tahun Ajaran--</option>
                            <option>2024-2025</option>
                            <option>2025-2026</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Semester</label>
                        <select name="Semester" class="form-control" required>
                            <option selected disabled>--Pilih semester--</option>
                            <option>Ganjil</option>
                            <option>Genap</option>
                        </select>
                    </div>

                    <hr>
                    <h5>Detail Jadwal</h5>
                    <div id="detail_jadwal">
                        <div class="row mb-2">
                            <div class="col-md-3">
                                <select name="Kd_mapel[]" class="form-control">
                                    <option selected disabled>--Pilih Mapel--</option>
                                    <?php
                                        $data = mysqli_query($koneksi, "SELECT * FROM mapel");
                                        while ($d = mysqli_fetch_array($data)) {
                                        ?>
                                            <option value="<?= $d['Kd_mapel']; ?>">
                                                <?= $d['Nm_mapel']; ?>
                                            </option>
                                        <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select name="Hari[]" class="form-control" required>
                                    <option selected disabled>--Pilih Hari--</option>
                                    <option>Senin</option>
                                    <option>Selasa</option>
                                    <option>Rabu</option>
                                    <option>Kamis</option>
                                    <option>Jumat</option>
                                    <option>Sabtu</option>
                                </select>
                            <</div>
                            <div class="col-md-2">
                                <select name="Jam_mulai[]" class="form-control" required>
                                    <option selected disabled>--Pilih J.Mulai--</option>
                                    <option>08.00-10.00</option>
                                    <option>08.00-09.30</option>
                                    <option>10.30-12.00</option>
                                    <option>12.30-14.00</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <select name="Jam_selesai[]" class="form-control" required>
                                    <option selected disabled>--Pilih J.Selesai--</option>
                                    <option>10.00-12.00</option>
                                    <option>09.30-11.00</option>
                                    <option>12.00-14.00</option>
                                    <option>14.00-16.00</option>
                                </select>
                            </div>

                           <div class="col-md-2">
                                <select name="Nm_kelas[]" class="form-control">
                                    <option selected disabled>--Pilih Kelas--</option>
                                    <?php
                                        $data = mysqli_query($koneksi, "SELECT * FROM kelas");
                                        while ($d = mysqli_fetch_array($data)) {
                                        ?>
                                            <option value="<?= $d['Id_kelas']; ?>">
                                                <?= $d['Nm_kelas']; ?>
                                            </option>
                                        <?php } ?>
                                </select></div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-info" onclick="tambahBaris()">+ Tambah Mapel</button>
                    <br><br>
                    <input type="submit" class="btn btn-primary" name="tambah" value="simpan">
                </form>

                <script>
                    function tambahBaris() {
                        let container = document.getElementById('detail_jadwal');
                        let row = container.firstElementChild.cloneNode(true);
                        row.querySelectorAll('input').forEach(input => input.value = '');
                        row.querySelectorAll('select').forEach(select => select.value = '');
                        container.appendChild(row);
                    }
                </script>

            </div>
        </div>
    </div>
</div>