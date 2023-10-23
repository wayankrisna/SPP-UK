<?php
if (!@$_SESSION['level_user']) {
    echo "<script>alert('Anda Belum Login');location.href='./login.php'</script>";
}
include 'koneksi.php';
?>
<section class="main">
    <center>
        <h1>Tambah Siswa</h1>
    </center>
    <div class="form-tambah">

        <form action="tambah/proses_tambah_siswa.php" method="post">
            <div class="form-group">
                <label for="nisn">NISN :</label>
                <input type="text" id="nisn" name="nisn" maxlength="10" class="input">
            </div>

            <div class="form-group">
                <label for="nis">NIS :</label>
                <input type="text" id="nis" name="nis" maxlength="4" class="input">
            </div>
            <div class="form-group">
                <label for="kelas">Nama Siswa :</label>
                <input type="text" id="siswa" name="siswa" class="input">
            </div>
            <div class="form-group">
                <label for="kelas">Kelas :</label>
                <?php
                $query = 'SELECT id_kelas, kelas FROM  tb_kelas';

                $hasil = mysqli_query($koneksi, $query);

                ?>
                <select name="kelas" id="" class="input">
                    <?php while ($row = mysqli_fetch_assoc($hasil)) : ?>
                        <option value="<?php echo $row['id_kelas']; ?>">
                            <?php echo $row['kelas'] ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="angkatan">Angkatan :</label>
                <?php
                $queryspp = 'SELECT * FROM  tb_spp';

                $hasilspp = mysqli_query($koneksi, $queryspp);

                ?>
                <select name="angkatan" id="" class="input">
                    <?php while ($rowspp = mysqli_fetch_assoc($hasilspp)) : ?>
                        <option value="<?php echo $rowspp['angkatan']; ?>">
                            <?php echo $rowspp['angkatan'];
                            echo "-";
                            echo $rowspp['nominal'] ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="nomortlp">Nomor Telepon :</label>
                <input type="text" id="nmrtlp" name="nmrtlp" maxlength="12" class="input">
            </div>
            <br>
            <div class="btn">
                <input type="submit" value="Simpan" class="tombol simpan">
                <input type="reset" value="Batal" class="tombol reset">
            </div>

        </form>
</section>
</div>