<?php
include('../koneksi.php');
$id_petugas = $_POST['id_petugas'];
$nama_petugas = $_POST['nama_petugas'];
$level_user = $_POST['level_user'];
$username = $_POST['username'];
$password = $_POST['password'];

$query = "UPDATE tb_petugas set id_petugas='$id_petugas', nama_petugas='$nama_petugas', level_user='$level_user', username='$username', password='$password' where id_petugas='$id_petugas'";

$hasil = mysqli_query($koneksi, $query);

if (!$hasil) {
    die("Gagal Update Data Petugas ! " . mysqli_error($koneksi));
} else {
    echo "<script>
        alert('Data Berhasil di Update')
        document.location.href='../dashboard.php?halaman=petugas';
        </script>
        ";
}
