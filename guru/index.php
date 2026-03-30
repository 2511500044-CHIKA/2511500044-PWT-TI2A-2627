<?php
include "config/koneksi.php";
$data = mysqli_query($koneksi, "SELECT * FROM guru");
?>

<table border="1" cellpadding="10" cellspacing="0" style="border-collapse: collapse; width: 100%; font-family: Arial, sans-serif;">
    <thead style="background-color: #ff00bbff; color: white;">
        <tr>
            <th style="text-align: center;">Kode</th>
            <th style="text-align: center;">Id User</th>
            <th style="text-align: center;">Nama</th>
            <th style="text-align: center;">Jenis Kelamin</th>
            <th style="text-align: center;">Pendidikan Terakhir</th>
            <th style="text-align: center;">Hp</th>
            <th style="text-align: center;">Alamat</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($d = mysqli_fetch_array($data)) { ?>
            <tr style="text-align: center;">
                <td><?= htmlspecialchars($d['Kd_guru']); ?></td>
                <td><?= htmlspecialchars($d['Id_user']); ?></td>
                <td><?= htmlspecialchars($d['Nm_guru']); ?></td>
                <td><?= htmlspecialchars($d['Jenkel']); ?></td>
                <td><?= htmlspecialchars($d['Pend_terakhir']); ?></td>
                <td><?= htmlspecialchars($d['Hp']); ?></td>
                <td><?= htmlspecialchars($d['Alamat']); ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<div style="margin-bottom:20px;">
 <a href="index.php?page=tambah_guru" class="btn btn-success">Tambah</a>
</div>