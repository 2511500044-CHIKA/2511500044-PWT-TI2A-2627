<?php
include "config/koneksi.php";
?>
<div class="content-header">
    <div class="container-fluid">
    </div>
</div>

      <?php
      if (isset($_POST['ubah'])) {

        $p1 = $_POST['p1'];
        $pb = $_POST['pb'];
        $username = $_SESSION['username'];
        $cek =  mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM user WHERE username= '$username'"));

        if($cek){
            $update = mysqli_query($koneksi, "UPDATE user SET password='$pb' WHERE password = '$p1' AND username = '$username'");
            if($update){
                echo "berhasil";
            }else {
                echo "gagal update";
            }
        }
    }
    ?>
    <section class="content">
        <div class="container-fluid">
            <form method="POST">
                <div class="form-group">
                    <label>Password Lama</label>
                    <input type="password" name="p1" class="form-control" placeholder="Masukkan Password Lama">
                </div>
                <div class="form-group">
                    <label>Password Baru</label>
                    <input type="password" name="pb" class="form-control" placeholder="Masukkan Password Baru">
                </div>
                <button type="submit" name="ubah" class="btn btn-primary">Ubah</button>
            </form>
        </div>
    </section>
