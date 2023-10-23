<?php

include "../koneksi.php";

$angkatan = $_GET['angkatan'];

$query = "DELETE FROM tb_spp WHERE angkatan ='$angkatan'";

$hasil = mysqli_query($koneksi, $query);

if (!$hasil) {
    die("Gagal Menghapus Data SPP ! " . mysqli_error($koneksi));
} else {
    echo "<script>
        alert('Data Berhasil Di delete')
        document.location.href='../dashboard.php?halaman=spp';
        </script>
        ";
}
