<?php
include "config/koneksi.php";
$data = mysqli_query($koneksi, "SELECT * FROM detail_jadwal");
?>

<table border="1" cellpadding="10" cellspacing="0" style="border-collapse: collapse; width: 100%; font-family: Arial, sans-serif;">
    <thead style="background-color: #ff00bbff; color: white;">
        <tr>
            <th style="text-align: center;">Id Jadwal</th>
            <th style="text-align: center;">Kd mapel</th>
            <th style="text-align: center;">Kd guru</th>
            <th style="text-align: center;">Hari</th>
            <th style="text-align: center;">Jam mulai</th>
            <th style="text-align: center;">Jam selesai</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($d = mysqli_fetch_array($data)) { ?>
            <tr style="text-align: center;">
                <td><?= htmlspecialchars($d['Id_jadwal']); ?></td>
                <td><?= htmlspecialchars($d['Kd_mapel']); ?></td>
                <td><?= htmlspecialchars($d['Kd_guru']); ?></td>
                <td><?= htmlspecialchars($d['Hari']); ?></td>
                <td><?= htmlspecialchars($d['Jam_mulai']); ?></td>
                <td><?= htmlspecialchars($d['Jam_selesai']); ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<div style="margin-bottom:20px;">
 <a href="index.php?page=tambah_detail_jadwal" class="btn btn-success">Tambah</a>
</div>