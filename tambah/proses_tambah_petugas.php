<?php
include('../koneksi.php');
$nama = $_POST['nama_petugas'];
$level_user = $_POST['level_user'];
$username = $_POST['username'];
$password = $_POST['password'];

$query = "INSERT INTO tb_petugas values('','$nama','$level_user','$username', '$password')";
$hasil = mysqli_query($koneksi, $query);
if (!$hasil) {
    die("Gagal memasukan data petugas" . mysqli_error($koneksi));
} else {
    echo "<script>
        alert('Data Berhasil di Tambahkan')
        document.location.href='../dashboard.php?halaman=petugas';
        </script>
        ";
}
