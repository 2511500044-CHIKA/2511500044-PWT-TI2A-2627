<?php
include "config/koneksi.php"
?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Data Users</h1>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="card">
            <table class="table table-striped">
                    <tread>
                        <tr>
                            <th style="text-align: center;">No</th>
                            <th style="text-align: center;">Kode User</th>
                            <th style="text-align: center;">Username</th>
                            <th style="text-align: center;">Password</th>
                            <th style="text-align: center;">Role</th>
                            <th style="text-align: center;">Aksi</th>
                        </tr>
                    </tread>
                    <?php
                    $no = 0;
                    $query = mysqli_query($koneksi, "SELECT * FROM users");
                    while ($result = mysqli_fetch_array($query)) {
                        $no++;
                    ?>
                        <tbody>
                            <tr style="text-align: center;">
                                <td><?= $no; ?></td>
                                <td><?= $result['Id_user']; ?></td>
                                <td><?= $result['username']; ?></td>
                                <td><?= $result['password']; ?></td>
                                <td><?= $result['role']; ?></td>
                                <td>
                                    <a href="index.php?page=users&action=hapus&kd=<?= $result['Id_user']; ?>" title ="">
                                            <span class=" badge badge-danger">Hapus</span></a>
                                    <a href="index.php?page=edit_users&kd=<?= $result['Id_user']; ?>" title="">
                                        <span class="badge badge-warning">Edit</span></a>
                                </td>
                            </tr>
                        </tbody>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>