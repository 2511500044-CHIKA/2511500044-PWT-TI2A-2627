<?php
include "config/koneksi.php";
?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit Jadwal Kelas</h1>
            </div>
        </div>
    </div>
</div>

<?php
$kd = $_GET['kd'];
$edit = mysqli_fetch_array(
    mysqli_query($koneksi, "SELECT * FROM jadwal_kelas WHERE Id_jadwal='$kd'")
);
if (isset($_POST['tambah'])) {
    $kd_jadwal = $_POST['Id_jadwal'];
    $kd_kelas = $_POST['Id_kelas'];
    $tahun_ajaran = $_POST['Thn_ajaran'];
    $semester = $_POST['Semester'];

    $insert = mysqli_query($koneksi, "UPDATE jadwal_kelas SET Id_kelas='$kd_kelas',Thn_ajaran='$tahun_ajaran',Semester='$semester' WHERE Id_jadwal='$kd_jadwal'");
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
                            <input type="number" name="Id_jadwal" value="<?= $edit['Id_jadwal']; ?>" placeholder="Masukkan Id Jadwal" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="Id_kelas">Id Kelas:</label>
                            <input type="number" name="Id_kelas" id="Id_kelas" value="<?= $edit['Id_kelas']; ?>" placeholder="Masukkan Id Kelas" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="Thn_ajaran">Tahun Ajaran:</label>
                            <input type="text" name="Thn_ajaran" id="Thn_ajaran" value="<?= $edit['Thn_ajaran']; ?>" placeholder="Masukkan Tahun Ajaran" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="Semester">Semester:</label>
                            <input type="text" name="Semester" id="Semester" value="<?= $edit['Semester']; ?>" placeholder="Masukkan Semester" class="form-control">
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
</section>