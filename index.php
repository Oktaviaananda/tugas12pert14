<?php
session_start();
$boleh_akses = array(1,2);
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
        <a href="logout.php">Logout</a>
        <h2>Pendaftaran Siswa Baru</h2>
        <h1>Digital Telent</h1>
        <h3>Menu</h3>
        <ul>
            <li><a href="add_pendaftar.php">Daftar Baru</a></li>
            <li><a href="list_pendaftar.php">Pendaftar</a></li>
        </ul>
    </main>
    
</body>
</html>
