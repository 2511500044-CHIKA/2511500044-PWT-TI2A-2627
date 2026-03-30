<?php
include "config/koneksi.php";

if(isset($_POST['simpan'])){
    mysqli_query($koneksi,"INSERT INTO guru VALUES(
        '$_POST[Kd_guru]',
        '$_POST[Id_user]',
        '$_POST[Nm_guru]',
        '$_POST[Jengkel]',
        '$_POST[Pendidikan_terakhir]',
        '$_POST[Hp]',
        '$_POST[Alamat]'
    )");

    header("Location: index.php?page=guru");
    exit;
}
?>

<h2 style="font-family: Arial, sans-serif; color: #007bff;">Tambah Data Guru</h2>

<form method="POST" style="width: 500px; margin-top: 20px; font-family: Arial, sans-serif;">
    <label>Kode Guru:</label><br>
    <input type="text" name="Kd_guru" style="width: 100%; padding: 8px; margin-bottom: 10px; border-radius: 4px; border: 1px solid #ccc;"><br>

    <label>Id User:</label><br>
    <input type="text" name="Id_user" style="width: 100%; padding: 8px; margin-bottom: 10px; border-radius: 4px; border: 1px solid #ccc;"><br>

    <label>Nama Guru:</label><br>
    <input type="text" name="Nm_guru" style="width: 100%; padding: 8px; margin-bottom: 10px; border-radius: 4px; border: 1px solid #ccc;"><br>

    <label>Jenis Kelamin:</label><br>
    <input type="text" name="Jengkel" style="width: 100%; padding: 8px; margin-bottom: 10px; border-radius: 4px; border: 1px solid #ccc;"><br>

    <label>Pendidikan Terakhir:</label><br>
    <input type="text" name="Pendidikan_terakhir" style="width: 100%; padding: 8px; margin-bottom: 10px; border-radius: 4px; border: 1px solid #ccc;"><br>

    <label>Hp :</label><br>
    <input type="time" name="Hp" style="width: 100%; padding: 8px; margin-bottom: 10px; border-radius: 4px; border: 1px solid #ccc;"><br>

    <label>Alamat :</label><br>
    <input type="text" name="Alamat" style="width: 100%; padding: 8px; margin-bottom: 10px; border-radius: 4px; border: 1px solid #ccc;"><br>

    <button type="submit" name="simpan" style="padding: 10px 20px; background-color: #28a745; color: white; border: none; border-radius: 4px; cursor: pointer;">Simpan</button>
    <a href="index.php?page=guru" style="padding: 10px 20px; background-color: #dc3545; color: white; text-decoration: none; border-radius: 4px; margin-left: 10px;">Batal</a>
</form>