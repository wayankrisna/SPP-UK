<?php
if (!@$_SESSION['logged_user']) {
    header('Location: ../login.php');
}
include 'koneksi.php';
?>

<section class="main">
    <h1>DASBOR</h1>
    <br><br><br>
    <div class="table">
        <center>
            <?php

            if (@$_SESSION['level_user'] == 'siswa') {
            } else {
            ?>
                <table border="1" id="customers">
                    <thead>
                        <tr>
                            <th>Jumlah Siswa</th>
                            <th>Jumlah Kelas</th>
                            <th>Jumlah Petugas</th>
                            <th>Total Pembayaran</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include "koneksi.php";

                        $querySiswa = "SELECT COUNT(*) FROM tb_siswa";
                        $jumlahSiswa = mysqli_query($koneksi, $querySiswa);
                        $queryKelas = "SELECT COUNT(*) FROM tb_kelas";
                        $jumlahKelas = mysqli_query($koneksi, $queryKelas);
                        $queryPetugas = "SELECT COUNT(*) FROM tb_petugas";
                        $jumlahPetugas = mysqli_query($koneksi, $queryPetugas);
                        $queryPembayaran = "SELECT COUNT(*) FROM tb_pembayaran_spp WHERE tanggal_bayar IS NOT NULL";
                        $jumlahPembayaran = mysqli_query($koneksi, $queryPembayaran);



                        ?>
                        <tr>
                            <td><?= $jumlahSiswa->fetch_column() . ' Siswa' ?></td>
                            <td><?= $jumlahKelas->fetch_column() . ' Kelas' ?></td>
                            <td><?= $jumlahPetugas->fetch_column() . ' Petugas' ?></td>
                            <td><?= $jumlahPembayaran->fetch_column() . ' Total Pembayaran' ?></td>


                        </tr>

                    </tbody>
                </table>
            <?php
            }
            ?>
            <?php
            if ($_SESSION['level_user'] == 'admin' || $_SESSION['level_user'] == 'petugas') :
                $query = mysqli_query($koneksi, "SELECT * FROM tb_petugas WHERE id_petugas = " . $_SESSION['id_petugas']);
                $petugas = mysqli_fetch_assoc($query);
            ?>
                <p align="left">Hallo, <?= $petugas['nama_petugas'] ?> </p>
            <?php else :
                $query = mysqli_query($koneksi, "SELECT * FROM tb_siswa WHERE nisn = " . $_SESSION['nisn']);
                $siswa = mysqli_fetch_assoc($query);
            ?>
                <p align="left">Hallo, <?= $siswa['nama_siswa'] ?> </p>
            <?php endif; ?>
            <div class="wrap">
                <div class="card">
                    <img src="./images/safe.png" alt="" width="100%">
                    <div class="container">
                        <h4><b>AMAN</b></h4>
                    </div>
                </div>
                <div class="card">
                    <img src="./images/fast3.png" alt="" width="100%">
                    <div class="container">
                        <h4><b>CEPAT</b></h4>
                    </div>
                </div>
                <div class="card">
                    <img src="./images/friendly.png" alt="" width="100%">
                    <div class="container">
                        <h4><b>MUDAH DIGUNAKAN</b></h4>
                    </div>
                </div>

            </div>
        </center>

    </div>
    </div>
    </div>

</section>
</div>