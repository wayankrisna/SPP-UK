<?php
if (!@$_SESSION['level_user']) {
    echo "<script>alert('Anda Belum Login');location.href='./login.php'</script>";
}
include 'koneksi.php';
?>
<section class="main">
    <center>
        <h1>Tambah Kelas</h1>
    </center>


    <form action="tambah/proses_tambah_kelas.php" method="post">

        <div class="form-group">
            <label for="angkatan">Kelas :</label>
            <div class="new-kelas"> <input type="text" id="kelas" name="kelas" class="kelas">
            </div>
        </div>

        <div class="form-group">
            <label for="nominal">Jurusan :</label>
            <div class="new-kelas"> <input type="text" id="jurusan" name="jurusan" class="jurusan">
            </div>
        </div>
        <br><br>
        <div class="btn">
            <input type="submit" value="Simpan" class="tombol simpan">
            <input type="reset" value="Batal" class="tombol reset">
        </div>
    </form>

</section>
</div>