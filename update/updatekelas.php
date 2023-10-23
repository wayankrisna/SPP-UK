<!-- <?php
        include('koneksi.php');
        $id_kelas = $_GET['id_kelas'];
        $query = "SELECT * From tb_kelas WHERE id_kelas='$id_kelas'";
        $hasil = mysqli_query($koneksi, $query);
        while ($data = mysqli_fetch_assoc($hasil)) {
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
<section class="main">
    <center>
        <h1>Update Kelas</h1>
    </center>


    <form action="update/proses_update_kelas.php" method="post">
        <div class="form-group">
            <input type="hidden" id="kelas" name="id_kelas" class="kelas" value="<?php echo $data['id_kelas']; ?>">
        </div>

        <div class="form-group">
            <label for="nama">Kelas :</label>
            <div class="new-kelas">
                <input type="text" id="kelas" name="kelas" class="kelas-new" value="<?php echo $data['kelas']; ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="nama">Jurusan :</label>
            <div class="new-kelas">
                <input type="text" id="jurusan" name="jurusan" class="jurusan" value="<?php echo $data['jurusan']; ?>">
            </div>
        </div>
        <br>
        <div class="btn">
            <input type="submit" value="Simpan" class="tombol simpan">
            <input type="reset" value="Batal" class="tombol reset">
        </div>
    </form>

</section>
</div>
<?php
        }
?>