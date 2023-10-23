<?php

include '../koneksi.php';

$nisn = $_POST['nisn'];
$nis = $_POST['nis'];
$siswa = $_POST['siswa'];
$kelas = $_POST['kelas'];
$angkatan = $_POST['angkatan'];
$nomortlp = $_POST['nmrtlp'];
$pass = 'tes123';

$nominal = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT nominal FROM tb_spp WHERE angkatan ='$angkatan'"));
$hasil_nominal = $nominal['nominal'];

$query_siswa = mysqli_query($koneksi, "INSERT INTO tb_siswa VALUES ('$nisn','$nis','$siswa','$kelas','$angkatan','$pass','$nomortlp','$hasil_nominal')");


$awaltempo = date($angkatan . "-07-d");

$bulanindo = [

    '01' => 'Januari',
    '02' => 'Februari',
    '03' => 'Maret',
    '04' => 'April',
    '05' => 'Mei',
    '06' => 'Juni',
    '07' => 'Juli',
    '08' => 'Agustus',
    '09' => 'September',
    '10' => 'Oktober',
    '11' => 'November',
    '12' => 'Desember',

];

for ($i = 0; $i < 36; $i++) {
    $jatuhtempo = date("Y-m-d", strtotime("+$i month", strtotime($awaltempo)));

    echo $bulan = $bulanindo[date('m', strtotime($jatuhtempo))];
    echo $tahun = date('Y', strtotime($jatuhtempo));

    $sqlinsert = "INSERT INTO tb_pembayaran_spp VALUES ('', NULL,'$nisn',NULL,'$bulan',$tahun,'$hasil_nominal')";
    //echo $sqlinsert;
    echo $query_pembayaran = mysqli_query($koneksi, $sqlinsert);
}
// if (!$query_siswa) {
//     die("Gagal menambahkan data" . mysqli_error($koneksi));
// } else {
//     echo "<script>alert('Data berhasil masuk');location.href='../dashboard.php?halaman=spp';</script>";
// }
