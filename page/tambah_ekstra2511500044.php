<?php
include "config/koneksi.php"
?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Tambah Ekstrakurikuler</h1>
            </div>
        </div>
    </div>
</div>

<?php
$kd = $_GET['Id'];
    $edit = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM ekstra2511500044 WHERE id_ekstra='$kd'"));

    if(isset($_POST['tambah'])){
        $id_ekstra = $_POST['id_ekstra'];
        $nama_ekstra = $_POST['nama_ekstra'];
        $ket = $_POST['ket'];
        $semester = $_POST['semester'];
        $thn_ajaran = $_POST['thn_ajaran'];

        $insert = mysqli_query($koneksi, "UPDATE ekstra2511500044 SET id_ekstra='$id_ekstra', nama_ekstra='$nama_ekstra', ket='$ket', semester='$semester', thn_ajaran='$thn_ajaran' WHERE id_ekstra='$kd'");
        if ($insert) {
            echo '<div class="alert alert-info alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
            <h5><i class="icon fas fa-info"></i> Info</h5>
            <h4>Berhasil Di Simpan</h4></div>';
            echo '<meta http-equiv="refresh" content="1;url=index.php?page=ekstra">';
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
                            <label for="id_ekstra">Id Ekstrakurikuler:</label>
                            <input type="number" name="id_ekstra" value="<?= $edit['id_ekstra']; ?>" placeholder="Masukkan Id Ekstrakurikuler" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="nama_ekstra">Nama Ekstrakurikuler:</label>
                            <input type="text" name="nama_ekstra" id="nama_ekstra" value="<?= $edit['nama_ekstra']; ?>" placeholder="Masukkan Nama Ekstrakurikuler" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="ket">Keterangan:</label>
                            <input type="text" name="ket" id="ket" value="<?= $edit['ket']; ?>" placeholder="Masukkan Keterangan" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="semester">Semester:</label>
                            <input type="text" name="semester" id="semester" value="<?= $edit['semester']; ?>" placeholder="Masukkan Semester" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="thn_ajaran">Tahun Ajaran:</label>
                            <input type="text" name="thn_ajaran" id="thn_ajaran" value="<?= $edit['thn_ajaran']; ?>" placeholder="Masukkan Tahun Ajaran" class="form-control">
                        </div>
                        <div class="card-footer">
                            <input type="submit" name="tambah" class="btn btn-primary" value="Simpan">
                            <a href="index.php?page=ekstra" class="btn btn-danger">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

       