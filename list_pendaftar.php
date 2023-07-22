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
    <title>List Siswa</title>
</head>
<body>
    <main>
        <?php
            include_once("connection.php");

            // SELECT * FROM tabel_pendaftar

            $result = mysqli_query($conn, "SELECT * FROM tabel_pendaftar");

        ?>

        <header>
        <a class="top-link" href="index.php">Home</a>
        <h1>List Pendaftar</h1>
        <p>Total = <?php echo mysqli_num_rows($result)?></p>
        <a class="top-link" href="add_pendaftar.php" >(+) Tambah Baru</a>
        </header>

        <?php
                    while($user_data = mysqli_fetch_array($result))
                    {
        ?>

        <section class="item-pendaftar">
            <img src="uploads/<?php echo $user_data['profil_picture'];?>" alt="">
            <div class="deskripsi-pendaftar">
                <h4>Nama Pendaftar :</h4>
                <h4 class="value"><?php echo $user_data['nama'];?></h4>

                <h4>Alamat :</h4>
                <h4 class="value"><?php echo $user_data['alamat'];?></h4>

                <h4>Gender :</h4>
                <h4 class="value"><?php echo $user_data['gender'];?></h4>

                <h4>Agama :</h4>
                <h4 class="value"><?php echo $user_data['agama'];?></h4>

                <h4>Asal Sekolah :</h4>
                <h4 class="value"><?php echo $user_data['sekolah'];?></h4>
            </div>
            <div class="clear-fix"></div>
        </section>

        <section class="action-link">
            <a href="edit_pendaftar.php?id=<?php echo $user_data['id_pendaftar'];?>">Edit</a>
                        |
            <a href="delete_pendaftar.php?id=<?php echo $user_data['id_pendaftar']; ?>">Delete</a>
        </section>

        <?php
                    }
        ?>
        
    </main>
</body>
</html>