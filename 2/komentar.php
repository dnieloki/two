<?php
    session_start();
    if(!isset($_SESSION['userid'])){
        header("location:login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Halaman Komentar</title>
</head>
<body>

  
    
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">
      <img src="https://d1csarkz8obe9u.cloudfront.net/posterpreviews/creative-photography-camera-icon-logo-design-template-1f29c6bf9c40cc14a852c33b37d0fd9c_screen.jpg?ts=1597180845" alt="Logo" style="width:60px;" class="rounded-pill">
    </a>
    <h4 class="text-white">Galeri Foto</h4>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mynavbar">
      <ul class="navbar-nav me-auto">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <li class="nav-item">
          <a class="nav-link text-white" href="index.php">Beranda</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="album.php">Album</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="add_album.php">Tambah Album</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="foto.php">Gambar</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="add_foto.php">Upload Gambar</a>
        </li>
        <li class="nav-item">
        </li>
      </ul>
</nav>  

<div class="container-fluid p-5 bg-primary text-white text-center">
     <h1>Halaman Komentar</h1>
     <p><b><?=$_SESSION['namalengkap']?>, silahkah berkomentar</b></p> 
  </div>

    <div class="container mt-3">
    <form action="tambah_komentar.php" method="post">
        <?php
            include "koneksi.php";
            $fotoid=$_GET['fotoid'];
            $sql=mysqli_query($conn,"select * from foto where fotoid='$fotoid'");
            while($data=mysqli_fetch_array($sql)){
        ?>
        <div class="mb-3 mt-3">
        <input type="text" name="fotoid" value="<?=$data['fotoid']?>" hidden>
        <table>
            <div class="mb-3 mt-3">
                <label>Judul</label>
                <input type="text" name="judulfoto" class="form-control" value="<?=$data['judulfoto']?>">
            </div>
            <div class="mb-3 mt-3">
                <label>Deskripsi</label>
                <input type="text" name="deskripsifoto" class="form-control" value="<?=$data['deskripsifoto']?>">
            </div>
            <div class="mb-3 mt-3">
                <label>Foto</label>
                <img src="gambar/<?=$data['lokasifile']?>" width="200px">
            </div>
            <div class="mb-3 mt-3">
                <label>Komentar</label>
                <input type="text" class="form-control" name="isikomentar">
            </div>
            <tr>
                <td></td>
                <button type="submit" value="Tambah" class="btn btn-primary">Tambah</button>
            </tr>
        </table>
        <?php
            }
        ?>
    </form>

    <div class="container mt-3">
      <table class="table">
      <thead class="table-success">
         <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Komentar</th>
            <th>Tanggal</th>
        </tr> 
      <thead>  
        

        <?php
            include "koneksi.php";
            $userid=$_SESSION['userid'];
            $sql=mysqli_query($conn,"select * from komentarfoto,user where komentarfoto.userid=user.userid");
            while($data=mysqli_fetch_array($sql)){
        ?>
            <tr>
                <td><?=$data['komentarid']?></td>
                <td><?=$data['namalengkap']?></td>
                <td><?=$data['isikomentar']?></td>
                <td><?=$data['tanggalkomentar']?></td>
            </tr>
        <?php
            }
        ?>
    </table>
</body>
</html>