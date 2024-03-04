<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
</head>
<body>
	<?php 
	
	if(isset($_GET['pesan'])){
		if($_GET['pesan'] == "gagal"){
			echo "Login gagal! username dan password salah!";
		}else if($_GET['pesan'] == "logout"){
			echo "Anda telah berhasil logout";
		}else if($_GET['pesan'] == "belum_login"){
			echo "Anda harus login untuk mengakses halaman user";
		}
	}
	?>
	<br/>
	<br/>
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-7">
        <div class="card rounded-3 text-black">                    
              <div class="card-body p-md-5 mx-md-4">
              
              <div class="text-center">
                  <img src="https://cdn.icon-icons.com/icons2/2348/PNG/512/gallery_icon_143014.png"
                    style="width: 185px;" alt="logo">
                  <h4 class="mt-1 mb-5 pb-1">Web Galeri Foto</h4>
              </div>

      <p>Please login to your account</p>
      <form method="post" action="login_aksi.php">
      <div class="mb-3">
            <label for="username"></label>
            <input type="text" class="form-control" placeholder="Username" name="username">
        
        <div class="mb-3">
            <label for="password"></label>
            <input type="password" class="form-control" id="password" placeholder="Password" name="password">
        </div>

      <button type="submit" class="btn btn-primary">Submit</button>
      <div>
      &nbsp;
      <div class="d-flex align-items-center justify-content-center pb-4">
      <p class="mb-0 me-2">Don't have an account?</p>
      <a href="register.php" class="btn btn-outline-danger">Create new</a>
      </div>

    </form>
   </div>			
	</form>
</body>
</html>