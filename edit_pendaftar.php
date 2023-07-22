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

        function showRadioValue($val_a, $val_b){
            $result = "";
            if ($val_a == $val_b){
                $result = "checked";
            }

            return $result;
        }

        function showSelectedCombo($val_a, $val_b){
            $result = "";
            if ($val_a == $val_b){
                $result = "selected";
            }

            return $result;
        }

        include_once("connection.php");


        $id_pendaftar = $_GET['id'];

        //Perintah SQL untuk menampilkan 1 data
        // SELECT * FROM tabel_pendaftar WHERE id_pendaftar=$id_pendaftar

        $result = mysqli_query($conn, "SELECT * FROM tabel_pendaftar WHERE id_pendaftar=$id_pendaftar");

        while($user_data = mysqli_fetch_array($result))
        {
            $nama = $user_data['nama'];
            $alamat = $user_data['alamat'];
            $gender = $user_data['gender'];
            $agama = $user_data['agama'];
            $sekolah = $user_data['sekolah'];
            $photo = $user_data['profil_picture'];
        }


        ?>

        <a class="top-link" href="index.php">Home</a>
        <a class="top-link" href="list_pendaftar.php">List Siswa</a>
        <h1>Edit Pendaftaran Siswa Baru</h1>
        <form action="proses_edit.php" method="post" enctype="multipart/form-data">
            <label class="display-block" for="nama">Nama  :</label>
            <input type="text" name="nama" id="nama" value="<?php echo $nama?>">

            <label class="display-block" for="alamat">Alamat  :</label>
            <textarea name="alamat" id="alamat" cols="30" rows="10"><?php echo $alamat?></textarea>

            <label class="display-block" for="gender">Jenis Kelamin   :</label>
            <input type="radio" name="gender" id="gennder" value="laki-laki" 
            <?php
            echo showRadioValue("laki-laki", $gender);
            ?>>
            <label>Laki - Laki</label>

            <input type="radio" name="gender" id="gennder" value="perempuan"
            <?php
            echo showRadioValue("perempuan", $gender);
            ?>>
            <label>Perempuan</label>

            <label class="display-block" for="agama">Agama    :</label>
            <select name="agama" id="agama">
                <option value="islam" <?php echo showSelectedCombo("islam", $agama); ?>>Islam</option>
                <option value="katolik" <?php echo showSelectedCombo("katolik", $agama); ?>>Katolik</option>
                <option value="kristen" <?php echo showSelectedCombo("kristen", $agama); ?>>Kristen</option>
                <option value="hindu" <?php echo showSelectedCombo("hindu", $agama); ?>>Hindu</option>
                <option value="budha" <?php echo showSelectedCombo("budha", $agama); ?>>Budha</option>
                <option value="aliran kepercayaan" <?php echo showSelectedCombo("aliran kepercayaan", $agama); ?>>Aliran Kepercayaan</option>
            </select>

            <label class="display-block" for="photo">Upload Photo</label>
            <img class="img-before" src="uploads/<?php echo $photo; ?>" alt="">
            <input type="file" name="photo" id="photo" accept="image/*"> 

            <label class="display-block" for="sekolah">Sekolah Asal   :</label>
            <input type="text" name="sekolah" id="sekolah" value="<?php echo $sekolah?>">

            <input type="hidden" name="id_pendaftar" value="<?php echo $id_pendaftar;?>">
            
            <input type="submit" value="tambah">
        </form>
    </main>
</body>
</html>