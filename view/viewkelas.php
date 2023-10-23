<!-- <!DOCTYPE html>
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
    <h1><b>DATA KELAS</b></h1>
    <br><br><br>
    <button class="kelas-tambah"><a href="dashboard.php?halaman=kelas-tambah"> TAMBAH</a></button>

    <div class="table">
        <center>
            <table border="1" id="customers">
                <thead>
                    <tr>
                        <th>ID KELAS</th>
                        <th>KELAS</th>
                        <th>JURUSAN</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include "koneksi.php";
                    $querykelas = 'SELECT * FROM tb_kelas';
                    $hasilkelas = mysqli_query($koneksi, $querykelas);
                    while ($rowkelas = mysqli_fetch_assoc($hasilkelas)) {
                    ?>
                        <tr>
                            <td><?php echo $rowkelas['id_kelas'] ?></td>
                            <td><?php echo $rowkelas['kelas'] ?></td>
                            <td><?php echo $rowkelas['jurusan'] ?></td>
                            <td class="button-aksi">
                                <button class="kelas-up">
                                    <a href="dashboard.php?halaman=kelas-update&id_kelas=<?php echo $rowkelas['id_kelas'] ?>">EDIT</a>
                                </button>
                                <button class="kelas-del" onclick="return confirm('Yakin Ingin Menghapus Data Ini?')"><a href="delete/deletekelas.php?id_kelas=<?php echo $rowkelas['id_kelas'] ?>">HAPUS</a></button>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </center>

    </div>


</section>
</div>