<?php
include "koneksi.php";

$nisn = $_GET['nisn'];

$querysiswa = "SELECT * FROM tb_siswa WHERE nisn='$nisn'";
$hasilsiswa = mysqli_query($koneksi, $querysiswa);

while ($datasiswa = mysqli_fetch_assoc($hasilsiswa)) {
?>
    <section class="main">
        <center>
            <h1>Update Siswa</h1>
        </center>
        <form action="update/proses_update_siswa.php" method="post">
            <div class="form-group">
                <label for="fname">Nisn</label>
                <div class="new-kelas"> <input type="text" class="" required id="f-form" name="nisn" maxlength="10" value="<?php echo $datasiswa['nisn'] ?>">
                </div>
            </div>
            <br>
            <div class="form-group">
                <label for="lname">Nis</label>
                <div class="new-kelas">
                    <input type="text" required id="lform" name="nis" maxlength="4" value="<?php echo $datasiswa['nis'] ?>">
                </div>
            </div>
            <br>
            <div class="form-group">
                <label for="lname">Nama Siswa</label>
                <div class="new-kelas">
                    <input type="text" class="" required id="lform" name="siswa" value="<?php echo $datasiswa['nama_siswa'] ?>">
                </div>
            </div>
            <br>
            <div class="form-group">
                <label for="lname">Kelas</label>
                <?php
                $idkelas = $datasiswa['id_kelas'];
                $query = "SELECT id_kelas, kelas FROM  tb_kelas";
                $hasilkelas = mysqli_query($koneksi, $query);
                // var_dump($hasil);
                ?>
                <select class="input" name="kelas" id="">
                    <?php while ($rowkelas = mysqli_fetch_assoc($hasilkelas)) : ?>
                        <option <?php if ($rowkelas['id_kelas'] == $idkelas) {
                                    echo "selected";
                                } ?> value="<?php echo $rowkelas['id_kelas']; ?>">
                            <?php echo $rowkelas['kelas'] ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>
            <br>
            <div class="form-group">
                <label for="lname">Angkatan</label>
                <?php
                $nominal = $datasiswa['nominal'];
                $queryspp = 'SELECT * FROM  tb_spp';
                $hasilspp = mysqli_query($koneksi, $queryspp);
                // var_dump($hasil);
                ?>
                <select class="input" name="angkatan" id="">
                    <?php
                    while ($rowspp = mysqli_fetch_assoc($hasilspp)) : ?>
                        <option <?php if ($rowspp['nominal'] == $nominal) {
                                    echo "selected";
                                } ?> value="<?php echo $rowspp['angkatan']; ?>">
                            <?php echo $rowspp['angkatan'];
                            echo "-";
                            echo $rowspp['nominal'] ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>
            <br>
            <div class="form-group">
                <label for="lname">Nomor Telepon</label>
                <div class="new-kelas">
                    <input type="text" id="lform" name="nmrtlp" maxlength="15" value="<?php echo $datasiswa['nomor_telepon'] ?>">
                </div>
            </div>
            <br>
            <div class="btn">
                <input type="submit" value="Simpan" class="tombol simpan">
                <input type="reset" value="Batal" class="tombol reset">
            </div>
        </form>
        </div>

    <?php
}
    ?>