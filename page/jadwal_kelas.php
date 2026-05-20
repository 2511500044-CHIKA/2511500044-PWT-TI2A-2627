<?php
include "config/koneksi.php";
?>

<?php
if (isset($_GET['hapus'])) {
    $Id_jadwal = $_GET['hapus'];

    // Hapus detail jadwal dulu
    mysqli_query($koneksi, "DELETE FROM detail_jadwal WHERE Id_jadwal = '$Id_jadwal'");

    // Lalu hapus jadwal
    $hapus = mysqli_query($koneksi, "DELETE FROM jadwal_kelas WHERE Id_jadwal = '$Id_jadwal'");

    if ($hapus) {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>Berhasil!</strong> Data jadwal telah dihapus.
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
        </button>
        </div>";
    } else {
        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
        <strong>Gagal!</strong> Tidak dapat menghapus data.
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
        </button>
        </div>";
    }
}
?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Data Jadwal Kelas</h1>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <a href="index.php?page=tambah_jadwal_kelas" class="btn btn-primary btn-sm">
                        Tambah Jadwal
                    </a>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Id Jadwal</th>
                                <th>Guru</th>
                                <th>Tahun Ajaran</th>
                                <th>Semester</th>
                                <th>Detail Jadwal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = mysqli_query($koneksi, "SELECT * FROM jadwal_kelas JOIN guru ON jadwal_kelas.Nm_guru = guru.Nm_guru");

                            while ($row = mysqli_fetch_assoc($query)) {
                                echo "<tr>
                                <td>{$row['Id_jadwal']}</td>
                                <td>{$row['Nm_guru']}</td>
                                <td>{$row['Thn_ajaran']}</td>
                                <td>{$row['Semester']}</td>
                                <td>
                                <ul>";

                                $det = mysqli_query($koneksi, "SELECT d.*, m.Nm_mapel FROM detail_jadwal d JOIN mapel m ON d.kd_mapel = m.kd_mapel WHERE Id_jadwal = '{$row['Id_jadwal']}'");

                                while ($d = mysqli_fetch_assoc($det)) {
                                    echo "<li>{$d['Nm_mapel']} - {$d['Hari']} - {$d['Jam']} - {$d['Nm_kelas']}</li>";
                                }

                                echo "</ul>
                                            </td><td><a href='index.php?page=jadwal_kelas&hapus={$row['Id_jadwal']}'
                                            onclick=\"return confirm('Yakin ingin menghapus data ini?')\"
                                            class='btn btn-danger btn-sm'>Hapus</a>
                                            </td>
                                            </tr>";
                            }
                            ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>