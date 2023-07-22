<?php
include_once("connection.php");

if ($_POST){
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $gender = $_POST['gender'];
    $agama = $_POST['agama'];
    $sekolah = $_POST['sekolah'];
    $id_pendaftar = $_POST['id_pendaftar'];

    $file_upload = $_FILES['photo'];
    if ($file_upload['name'] != ""){

        

        //Merubah Gambar
        $photo = $file_upload['name'];

        $result = mysqli_query($conn, "UPDATE tabel_pendaftar SET nama='$nama', alamat='$alamat', gender='$gender', agama='$agama', sekolah='$sekolah', profil_picture='$photo' WHERE id_pendaftar=$id_pendaftar");

        move_uploaded_file($file_upload['tmp_name'], __DIR__ . "/uploads/" . $photo);
    } else{
        //menggunakan gambar lama
        $result = mysqli_query($conn, "UPDATE tabel_pendaftar SET nama='$nama', alamat='$alamat', gender='$gender', agama='$agama', sekolah='$sekolah' WHERE id_pendaftar=$id_pendaftar");

    }

    //perintah SQL untuk meng update data
    // UPDATE tabel_pendaftar SET nama='$nama', alamat='$alamat', gender='$gender', agama='$agama', sekolah='$sekolah' WHERE id_pendaftar=$id_pendaftar

    header("Location: list_pendaftar.php");
}
?>