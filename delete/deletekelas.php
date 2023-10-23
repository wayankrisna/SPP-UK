<?php

include('../koneksi.php');

$id_kelas = $_GET['id_kelas'];

$query = "DELETE FROM tb_kelas WHERE id_kelas ='$id_kelas'";

$hasil = mysqli_query($koneksi, $query);

if (!$hasil) {
    die("Gagal Menghapus Data Kelas ! " . mysqli_error($koneksi));
} else {
    echo "<script>
        alert('Data Berhasil Di delete')
        document.location.href='../dashboard.php?halaman=kelas';
        </script>
        ";
}
