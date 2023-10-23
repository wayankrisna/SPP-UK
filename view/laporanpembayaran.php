<!-- 
<?php
include('koneksi.php');
$bulan = $_POST['bulan'];
$kelas = $_POST['nm_kelas'];
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
if (!@$_SESSION['level_user']) {
    echo "<script>alert('Anda Belum Login');location.href='../login.php'</script>";
}
include 'koneksi.php';
?>
<?php
if ($_SESSION['level_user'] == 'petugas' || $_SESSION['level_user'] == 'siswa') {
    echo "<script>alert('Anda Tidak Memiliki Akses Untuk Menu Ini');location.href='dashboard.php?halaman=utama';</script>";
}
?>
<section class="main">
    <center>
        <h1><b>LAPORAN PEMBAYARAN</b></h1>
    </center>
    <br><br>
    <button onclick="window.print()" type="submit" class="cetak print">PRINT</button>
    <form action="" method="POST" class="cari-nis">

        <input autocomplete="off" type="text" name="nm_kelas" list="kelas" class="print" placeholder="Pilih Kelas">
        <input autocomplete="off" type="text" name="bulan" list="list_bulan" class="print" placeholder="Pilih Bulan">

        <button class="button-cari print">CARI !</button> <br>

        <datalist class="print" id="kelas">
            <?php
            $query = "SELECT * FROM tb_kelas";
            $result = mysqli_query($koneksi, $query);
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <option value="<?php echo $row['kelas']; ?>"><?= $row['kelas'] ?></option>
            <?php
            }
            ?>
        </datalist>
        <datalist name="bulan" id="list_bulan" class="print">
            <option value="Januari">Januari</option>
            <option value="Februari">Februari</option>
            <option value="Maret">Maret</option>
            <option value="April">April</option>
            <option value="Mei">Mei</option>
            <option value="Juni">Juni</option>
            <option value="Juli">Juli</option>
            <option value="Agustus">Agustus</option>
            <option value="September">September</option>
            <option value="Oktober">Oktober</option>
            <option value="November">November</option>
            <option value="Desember">Desember</option>
        </datalist>
    </form>
    <br><br>
    <?php
    if ($bulan = @$_POST['bulan']) {
    ?>

        <br><br>
        <center>
            <table border="1px solid" id="customers">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>ID Petugas</th>
                        <th>Nama Siswa</th>
                        <th>Tanggal Bayar</th>
                        <th>Bulan Bayar</th>
                        <th>Tahun Bayar</th>
                        <th>Jumlah</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM tb_pembayaran_spp INNER JOIN tb_siswa USING(nisn) INNER JOIN tb_kelas on tb_siswa.id_kelas=tb_kelas.id_kelas WHERE bulan_bayar='$bulan' and kelas='$kelas' ";
                    $hasil = mysqli_query($koneksi, $query);
                    $totalbayar = 0;
                    while ($row = mysqli_fetch_assoc($hasil)) {
                    ?>
                        <tr>
                            <td><?php echo $row['id_pembayaran'] ?></td>
                            <td><?php echo $row['id_petugas'] ?></td>
                            <td><?php echo $row['nama_siswa'] ?></td>
                            <td><?php echo $row['tanggal_bayar'] ?></td>
                            <td><?php echo $row['bulan_bayar'] ?></td>
                            <td><?php echo $row['tahun_bayar'] ?></td>
                            <td><?php echo $row['jumlah_bayar'] ?></td>
                            <td>
                                <?php
                                if (@$row['tanggal_bayar']) {
                                    echo "Lunas";
                                    $totalbayar = $totalbayar + $row['jumlah_bayar'];
                                } else {
                                    echo "Belum Lunas";
                                }
                                ?>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                    <td colspan="6" style="text-align:end;"><b>Total</b></td>
                    <td colspan="2" style="text-align:center;"><?php echo $totalbayar ?></td>
                <?php
            }
                ?>
                </tbody>


            </table>
        </center>
        <?php

        ?>
</section>
</div>