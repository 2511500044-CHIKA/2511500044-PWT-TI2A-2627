<?php
include "config/koneksi.php";
$data = mysqli_query($koneksi, "SELECT * FROM siswa");
?>

<table border="1" cellpadding="10" cellspacing="0" style="border-collapse: collapse; width: 100%; font-family: Arial, sans-serif;">
    <thead style="background-color: #ff00bbff; color: white;">
        <tr>
            <th style="text-align: center;">Nis</th>
            <th style="text-align: center;">Id User</th>
            <th style="text-align: center;">Nama Siswa</th>
            <th style="text-align: center;">Jenis Kelamin</th>
            <th style="text-align: center;">Hp</th>
            <th style="text-align: center;">Id Kelas</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($d = mysqli_fetch_array($data)) { ?>
            <tr style="text-align: center;">
                <td><?= htmlspecialchars($d['Nis']); ?></td>
                <td><?= htmlspecialchars($d['Id_user']); ?></td>
                <td><?= htmlspecialchars($d['Nm_siswa']); ?></td>
                <td><?= htmlspecialchars($d['Jenkel']); ?></td>
                <td><?= htmlspecialchars($d['Hp']); ?></td>
                <td><?= htmlspecialchars($d['Id_kelas']); ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<div style="margin-bottom:20px;">
 <a href="index.php?page=tambah_siswa" class="btn btn-success">Tambah</a>
</div>