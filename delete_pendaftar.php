<?php
session_start();
include_once("connection.php");
$boleh_akses = array(1);
    if(!isset($_SESSION['sudahLogin'])){
        header("Location: logout.php");
    }else {
        $level_user = $_SESSION['level_user'];
        if (!in_array($level_user,$boleh_akses)) {
            header("Location: logout.php");
        }else{
            $id_pendaftar = $_GET['id'];

            //Perintah SQL untuk menghpus
            // DELETE FROM tabel_pendaftar WHERE id_pendaftar=$id_pendaftar
            mysqli_query($conn, "DELETE FROM tabel_pendaftar WHERE id_pendaftar=$id_pendaftar");
            header("Location: list_pendaftar.php");

        }
    }
?>
