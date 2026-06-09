<?php
include "config/koneksi.php";
?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit Detail Jadwal</h1>
            </div>
        </div>
    </div>
</div>

    <?php
    $kd = $_GET['kd'];
    $edit = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM detail_jadwal WHERE Id_jadwal='$kd'"));

    if(isset($_POST['tambah'])){
        $Id_jadwal = $_POST['Id_jadwal'];
        $Kd_mapel = $_POST['Kd_mapel'];
        $Kd_guru = $_POST['Kd_guru'];
        $Hari = $_POST['Hari'];
        $Jam_mulai = $_POST['Jam_mulai'];
        $Jam_selesai = $_POST['Jam_selesai'];

        $insert = mysqli_query($koneksi, "UPDATE detail_jadwal SET Id_jadwal='$Id_jadwal', Kd_mapel='$Kd_mapel', Kd_guru='$Kd_guru', Hari='$Hari', Jam_mulai='$Jam_mulai', Jam_selesai='$Jam_selesai' WHERE Id_jadwal='$kd'");
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
                        <div class="form-group
                        ">
                            <label for="Id_jadwal">Id Jadwal:</label>
                            <input type="number" name="Id_jadwal" value="<?= $edit['Id_jadwal']; ?>" placeholder="Masukkan Id Jadwal" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="Kd_mapel">Kode Mata Pelajaran:</label>
                            <input type="text" name="Kd_mapel" id="Kd_mapel" value="<?= $edit['Kd_mapel']; ?>" placeholder="Masukkan Kode Mata Pelajaran" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="Kd_guru">Kode Guru:</label>
                            <input type="text" name="Kd_guru" id="Kd_guru" value="<?= $edit['Kd_guru']; ?>" placeholder="Masukkan Kode Guru" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="Hari">Hari:</label>
                            <input type="text" name="Hari" id="Hari" value="<?= $edit['Hari']; ?>" placeholder="Masukkan Hari" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="Jam_mulai">Jam Mulai:</label>
                            <input type="time" name="Jam_mulai" id="Jam_mulai" value="<?= $edit['Jam_mulai']; ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="Jam_selesai">Jam Selesai:</label>
                            <input type="time" name="Jam_selesai" id="Jam_selesai" value="<?= $edit['Jam_selesai']; ?>" class="form-control">
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
</section>