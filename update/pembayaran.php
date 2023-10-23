<!-- 
<?php
include('koneksi.php');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header>
        Aplikasi Pembayaran SPP
    </header>
    <div class="container">

        <aside>

            <ul class="menu">
                <li>
                    <a href="viewsiswa.php">
                        <img src="./images/siswa.png" class="font-icon"> Siswa
                    </a>
                </li>
                <li><a href="viewpetugas.php">
                        <img src="./images/officer.png" class="font-icon">Petugas</a></li>
                <li><a href="viewkelas.php">
                        <img src="./images/training.png" class="font-icon">Kelas</a></li>
                <li><a href="viewspp.php">
                        <img src="./images/invoice.png" class="font-icon"> SPP</a></li>
                <li><a href="pembayaran.php">
                        <img src="./images/pay.png" class="font-icon">Pembayaran</a></li>
                <li><a href="#">
                        <img src="./images/history.png" class="font-icon">Riwayat</a></li>
                <li><a href="#">Keluar</a></li>



            </ul>
        </aside> -->
<?php
if ($_SESSION['level_user'] == 'siswa') {
    echo "<script>alert('Anda Tidak Memiliki Akses Untuk Menu Ini');location.href='dashboard.php?halaman=utama';</script>";
}
?>
<section class="main">
    <center>
        <h1>Pembayaran</h1>
    </center>
    <form action="" method="post" class="cari-nis">

        <input autocomplete="off" type="text" name="nisn" list="NISN" placeholder="Masukkan NISN Siswa">
        <button class="button-cari">CARI !</button> <br>

        <datalist id="NISN">
            <?php
            $query = "SELECT nisn FROM tb_siswa";
            $result = mysqli_query($koneksi, $query);
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <option value="<?php echo $row['nisn']; ?>"></option>
            <?php
            }
            ?>
        </datalist>
    </form>
    <br><br>
    <?php
    if ($nisn = @$_POST['nisn']) {
        $querycari = "SELECT * FROM tb_siswa INNER JOIN tb_kelas USING (id_kelas) INNER JOIN tb_spp USING (angkatan) WHERE nisn = '$nisn'";
        $resultcari = mysqli_query($koneksi, $querycari);
        $data = mysqli_fetch_assoc($resultcari);
    ?>
        <table border="0" id="customers">
            <tr>
                <td>Nis</td>
                <td><?= $data['nisn'] ?></td>
            </tr>
            <tr>
                <td>Nama Siswa</td>
                <td><?= $data['nama_siswa'] ?></td>
            </tr>
            <tr>
                <td>Kelas</td>
                <td><?= $data['kelas'] ?></td>
            </tr>
            <tr>
                <td>Nominal</td>
                <td>
                    <?php
                    echo $angkatan = $data['nominal'];
                    // $queryspp = mysqli_query($koneksi, "SELECT nominal FROM tb_spp WHERE angkatan = '$angkatan'");
                    ?>
                </td>
            </tr>
        </table>
        <br><br>
        <table border="1px solid" id="customers">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Bulan</th>
                    <th>Jatuh Tempo</th>
                    <th>Tahun Bayar</th>
                    <th>Tanggal Bayar</th>
                    <th>Jumlah Bayar</th>
                    <th>Keterangan</th>
                    <th>Bayar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $nisn = $data['nisn'];
                // var_dump($nisn);
                for ($i = 1; $i < 37;) {
                    $hasil_query = mysqli_query($koneksi, "SELECT * FROM tb_pembayaran_spp WHERE nisn='$nisn'");
                    while ($row_spp = mysqli_fetch_assoc($hasil_query)) {
                        $id = $row_spp['id_pembayaran'];
                ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= $row_spp['bulan_bayar'] ?></td>
                            <td>10 <?= $row_spp['bulan_bayar'] ?></td>
                            <td><?= $row_spp['tahun_bayar'] ?></td>
                            <?php
                            if ($row_spp['tanggal_bayar'] == null) {
                            ?>
                                <td>Kosong</td>
                            <?php
                            } else {
                            ?>
                                <td><?= $row_spp['tanggal_bayar'] ?></td>
                            <?php
                            }
                            ?>
                            <td><?= $row_spp['jumlah_bayar'] ?></td>
                            <?php
                            if ($row_spp['tanggal_bayar'] == null) {
                            ?>
                                <td>Belum Lunas</td>
                                <td><button class="kelas-byr"><a href="update/proses_update_pembayaran.php?id_pembayaran=<?= $id ?>&tahun=<?= $row_spp['tahun_bayar'] ?>">Bayar</a></button></td>
                            <?php
                            } else {
                            ?>
                                <td>Lunas</td>
                                <td>✓</td>
                            <?php
                            }
                            ?>
                    <?php
                    }
                }
                    ?>
                        </tr>
            </tbody>


        </table>
    <?php
    }
    ?>
</section>
</div>