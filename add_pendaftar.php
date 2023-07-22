<?php
session_start();
$boleh_akses = array(1);
    if(!isset($_SESSION['sudahLogin'])){
        header("Location: logout.php");
    }else {
        $level_user = $_SESSION['level_user'];
        if (!in_array($level_user,$boleh_akses)) {
            header("Location: logout.php");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mystyle.css">
    <title>Document</title>
</head>
<body>
    <main>
        <?php
        include_once("connection.php");
        ?>

        <a class="top-link" href="index.php">Home</a>
        <a class="top-link" href="list_pendaftar.php">List Siswa</a>

        <h1>Formulir Pendaftaran Siswa Baru</h1>
        <form action="proses_add.php" method="post" enctype="multipart/form-data">
            <label class="display-block" for="nama">Nama  :</label>
            <input type="text" name="nama" id="nama">

            <label class="display-block" for="alamat">Alamat  :</label>
            <textarea name="alamat" id="alamat" cols="30" rows="10"></textarea>

            <label class="display-block" for="gender">Jenis Kelamin   :</label>
            <input type="radio" name="gender" id="gennder" value="laki-laki">
            <label>Laki - Laki</label>
            <input type="radio" name="gender" id="gennder" value="perempuan">
            <label>Perempuan</label>

            <label class="display-block" for="agama">Agama    :</label>
            <select name="agama" id="agama">
                <option value="islam">Islam</option>
                <option value="katolik">Katolik</option>
                <option value="kristen">Kristen</option>
                <option value="hindu">Hindu</option>
                <option value="budha">Budha</option>
                <option value="aliran kepercayaan">Aliran Kepercayaan</option>
            </select>

            <label class="display-block" for="photo">Upload Photo</label>
            <input type="file" name="photo" id="photo" accept="image/*"> 

            <label class="display-block" for="sekolah">Sekolah Asal   :</label>
            <input type="text" name="sekolah" id="sekolah">

            <input type="submit" value="tambah">
        </form>
    </main>
</body>
</html>