<!DOCTYPE html>
<html lang="en">
<head>
    <title>Halaman Beranda</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
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
     
      <form class="d-flex">
           <a class="btn btn-dark" href="logout.php">Log Out</a> &nbsp;&nbsp;
           <a class="btn btn-light text-dark" href="profile.php">Profil
           <img src="https://i.pinimg.com/736x/7c/7f/94/7c7f943def97d89e7939f41bd2135e4e.jpg" class="rounded-circle" width="30" height="30">
        </a> &nbsp;&nbsp;
        <a class="btn btn-dark" href=""></a>     
      </form>
    </div>
  </div>
</nav>

    <div class="container-fluid p-5 bg-primary text-white text-center">
    <h1>Halaman Beranda</h1>
    <?php
        session_start();
        if(!isset($_SESSION['userid'])){
    ?>
            <ul>
                <li><a href="register.php">Register</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
    <?php
        }else{
    ?>   
        <p>Selamat datang <b><?=$_SESSION['namalengkap']?></b></p>
        </div>
       
    <?php
        }
    ?>
    
      <div class="container mt-3">
      <table class="table">
      <thead class="table-success">
         <tr>
         <th>ID</th>
            <th width="%">Judul</th>
            <th width="%">Deskripsi</th>
            <th width="%">Foto</th>
            <th width="%">Uploader</th>
            <th width="10%">Jumlah Like</th>
            <th width="%">Aksi</th>
        </tr>
      </thead>  
        <?php
            include "koneksi.php";
            $sql=mysqli_query($conn,"select * from foto,user where foto.userid=user.userid");
            while($data=mysqli_fetch_array($sql)){
        ?>
            <tr>
                <td><?=$data['fotoid']?></td>
                <td><?=$data['judulfoto']?></td>
                <td><?=$data['deskripsifoto']?></td>
                <td>
                    <img src="gambar/<?=$data['lokasifile']?>" width="200px">
                </td>
                <td><?=$data['namalengkap']?></td>
                <td>
                    <?php
                        $fotoid=$data['fotoid'];
                        $sql2=mysqli_query($conn,"select * from likefoto where fotoid='$fotoid'");
                        echo mysqli_num_rows($sql2);
                    ?>
                </td>
                <td>
                    <a href="like.php?fotoid=<?=$data['fotoid']?>">Like</a>
                    <a href="komentar.php?fotoid=<?=$data['fotoid']?>">Komentar</a>
                </td>
            </tr>
        <?php
            }
        ?>
    </table>
    
</body>
</html>