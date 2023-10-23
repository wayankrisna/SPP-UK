<?php
include('../koneksi.php');
$jurusan = $_POST['jurusan'];
$kelas = $_POST['kelas'];

$query = "INSERT INTO tb_kelas values('','$kelas','$jurusan')";
$hasil = mysqli_query($koneksi, $query);
if (!$hasil) {
    die("Gagal memasukan data kelas" . mysqli_error($koneksi));
} else {
    echo "<script>
        alert('Data Berhasil di Tambahkan')
        document.location.href='../dashboard.php?halaman=kelas';
        </script>
        ";
}
