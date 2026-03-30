<?php
include "config/koneksi.php";

if(isset($_POST['simpan'])){
    mysqli_query($koneksi,"INSERT INTO detail_jadwal VALUES(
        '$_POST[Id_jadwal]',
        '$_POST[Kd_mapel]',
        '$_POST[Kd_guru]',
        '$_POST[Hari]',
        '$_POST[Jam_mulai]',
        '$_POST[Jam_selesai]'
    )");

    header("Location: index.php?page=detail_jadwal");
    exit;
}
?>

<h2 style="font-family: Arial, sans-serif; color: #007bff;">Tambah Data Detail Jadwal</h2>

<form method="POST" style="width: 500px; margin-top: 20px; font-family: Arial, sans-serif;">
    <label>Id Jadwal:</label><br>
    <input type="text" name="Id_jadwal" style="width: 100%; padding: 8px; margin-bottom: 10px; border-radius: 4px; border: 1px solid #ccc;"><br>

    <label>Kode Mapel:</label><br>
    <input type="text" name="Kd_mapel" style="width: 100%; padding: 8px; margin-bottom: 10px; border-radius: 4px; border: 1px solid #ccc;"><br>

    <label>Kode Guru:</label><br>
    <input type="text" name="Kd_guru" style="width: 100%; padding: 8px; margin-bottom: 10px; border-radius: 4px; border: 1px solid #ccc;"><br>

    <label>Hari:</label><br>
    <input type="text" name="Hari" style="width: 100%; padding: 8px; margin-bottom: 10px; border-radius: 4px; border: 1px solid #ccc;"><br>

    <label>Jam Mulai:</label><br>
    <input type="time" name="Jam_mulai" style="width: 100%; padding: 8px; margin-bottom: 10px; border-radius: 4px; border: 1px solid #ccc;"><br>

    <label>Jam Selesai :</label><br>
    <input type="time" name="Jam_selesai" style="width: 100%; padding: 8px; margin-bottom: 10px; border-radius: 4px; border: 1px solid #ccc;"><br>

    <button type="submit" name="simpan" style="padding: 10px 20px; background-color: #28a745; color: white; border: none; border-radius: 4px; cursor: pointer;">Simpan</button>
    <a href="index.php?page=detail_jadwal" style="padding: 10px 20px; background-color: #dc3545; color: white; text-decoration: none; border-radius: 4px; margin-left: 10px;">Batal</a>
</form>