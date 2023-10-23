<?php

include('../koneksi.php');

$nisn = $_GET['nisn'];

$query = "DELETE FROM tb_siswa WHERE nisn ='$nisn'";
$query_pembayaran = "DELETE FROM tb_pembayaran_spp WHERE nisn ='$nisn'";

$hasil = mysqli_query($koneksi, $query_pembayaran);
$hasil = mysqli_query($koneksi, $query);


if (!$hasil) {
    die("Gagal Menghapus Data Siswa  " . mysqli_error($koneksi));
} else {
    echo "<script>
        alert('Data Di Delete');
        document.location.href='../dashboard.php?halaman=siswa';
        </script>
        ";
}
