<?php
include "config/koneksi.php";
?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit Kelas</h1>
            </div>
        </div>
    </div>
</div>

<?php
$kd = $_GET['kd'];
    $edit = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM kelas WHERE Id_kelas='$kd'"));

    if(isset($_POST['tambah'])){
        $kd_kelas = $_POST['Id_kelas'];
        $Nm_kelas = $_POST['Nm_kelas'];

        $insert = mysqli_query($koneksi, "UPDATE kelas SET Nm_kelas='$Nm_kelas' WHERE Id_kelas='$kd_kelas'");
        if ($insert) {
            echo '<div class="alert alert-info alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
            <h5><i class="icon fas fa-info"></i> Info</h5>
            <h4>Berhasil Di Simpan</h4></div>';
            echo '<meta http-equiv="refresh" content="1;url=index.php?page=kelas">';
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
                            <label for="Kd_kelas">Id Kelas:</label>
                            <input type="number" name="Id_kelas" value="<?= $edit['Id_kelas']; ?>" placeholder="Masukkan Id Kelas" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="Nm_kelas">Nama Kelas:</label>
                            <input type="text" name="Nm_kelas" id="Nm_kelas" value="<?= $edit['Nm_kelas']; ?>" placeholder="Masukkan Nama Kelas" class="form-control">
                        </div>
                        <div class="card-footer">
                            <input type="submit" name="tambah" class="btn btn-primary" value="Simpan">
                            <a href="index.php?page=kelas" class="btn btn-danger">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>