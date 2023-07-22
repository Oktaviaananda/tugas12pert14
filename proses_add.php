<?php
include_once("connection.php");

if($_POST){

    $file_upload = $_FILES['photo'];

    if ($file_upload['name'] != ""){
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $gender = $_POST['gender'];
        $agama = $_POST['agama'];
        $sekolah = $_POST['sekolah'];
        $photo = $file_upload['name'];
    
        //Perintah SQL 
        $result = mysqli_query($conn, "INSERT INTO tabel_pendaftar(nama, alamat, gender, agama, sekolah, profil_picture) VALUES('$nama', '$alamat', '$gender', '$agama', '$sekolah', '$photo')");
    
        //built in function php
        move_uploaded_file($file_upload['tmp_name'], __DIR__ . "/uploads" . $photo);

        header("Location: list_pendaftar.php");
    } else{
        echo "Pendaftaran gagal";
    }
}