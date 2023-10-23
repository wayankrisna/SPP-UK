<!-- 

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
    echo "<script>alert('Anda Belum Login');location.href='./login.php'</script>";
}
include 'koneksi.php';
?>
<section class="main">
    <center>
        <h1>Tambah SPP</h1>
    </center>


    <form action="tambah/proses_tambah_spp.php" method="post">
        <div class="form-group">
            <label for="angkatan">Angkatan :</label>
            <input type="text" id="angkatan" name="angkatan" class="input">
        </div>

        <div class="form-group">
            <label for="nominal">Nominal :</label>
            <input type="text" id="nominal" name="nominal" class="input">
        </div>
        <br><br>
        <div class="btn">
            <input type="submit" value="Simpan" class="tombol simpan">
            <input type="reset" value="Batal" class="tombol reset">
        </div>

    </form>

</section>
</div>