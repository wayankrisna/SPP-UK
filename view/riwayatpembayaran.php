<!-- 
<?php
if (!@$_SESSION['logged_user']) {
    header('Location: ../login.php');
}
include 'koneksi.php';
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
<section class="main">
    <center>
        <h1><b>RIWAYAT PEMBAYARAN</b></h1>
    </center>
    <br><br>

    <form action="" method="POST" class="cari-nis">

        <input autocomplete="off" class="print" type="text" name="nisn" list="NISN" placeholder="Masukkan NISN Siswa">
        <button class="button-cari print">CARI !</button> <br>


        <datalist id="NISN">
            <?php
            // $nisn = $_SESSION['nisn'];
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
    error_reporting(0);

    if (@$_SESSION['level_user'] != 'siswa') {
    ?>
        <button onclick="window.print()" type="submit" class="cetak print">PRINT</button>
        <br>
    <?php
    }
    ?>
    <?php
    $where = "";
    if (@$_SESSION['level_user'] == 'siswa') {
        $nisn = $_SESSION['nisn'];
        $where = " AND nisn='" . $nisn . "'";
    } else {
        $nisn = $_POST['nisn'];
        //var_dump($nisn);
        if ($nisn != '') {
            $where = " AND nisn='" . $nisn . "'";
        }
        // $nisn = $_POST['nisn'];
    }
    if (@$query) {
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
                    </tr>
                </thead>
        </center>
        <tbody>
            <?php
            // $query = "SELECT * FROM tb_pembayaran_spp INNER JOIN tb_siswa USING(nisn) WHERE nisn='$nisn' and tanggal_bayar IS NOT NULL";
            $query = "SELECT * FROM tb_pembayaran_spp INNER JOIN tb_siswa USING(nisn) WHERE 1 " . $where . " and tanggal_bayar IS NOT NULL ORDER BY tanggal_bayar DESC";

            $hasil = mysqli_query($koneksi, $query);
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
                </tr>
            <?php
            }
        } else {
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
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT * FROM tb_pembayaran_spp INNER JOIN tb_siswa USING(nisn) WHERE tanggal_bayar IS NOT NULL ORDER BY tanggal_bayar DESC";
                        $hasil = mysqli_query($koneksi, $query);
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
                            </tr>
                    <?php
                        }
                    }
                    ?>
                    </tbody>


                </table>
            </center>
</section>
</div>