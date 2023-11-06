<?php
session_start();
include '../database.php';
?>


<!doctype html>
<html lang="en">
  <head>
  	<title>Kemaskini Profil</title>
    <link rel="shortcut icon" href="../img/logo.png" type="favicon-bebrainy">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/kemaskiniProfil.css">

  </head>
  <body>
		
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
	        </button>
        </div>
	  		<div class="img bg-wrap text-center py-4" style="background-image: url(../img/counselling.png);">
	  			<div class="user-logo">
	  				<div class="img" id="user_img">
            <?php
        // Retrieve the current session user's NoMatrik
        $noMatrik = $_SESSION['NoMatrik'];

        // Retrieve the image data from the 'pelajar' table
        $query = "SELECT image FROM pelajar WHERE NoMatrik = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $noMatrik);
        $stmt->execute();
        $stmt->store_result();

        // Check if the user has an image
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($imageData);
            $stmt->fetch();

            // Display the user's image
            echo '<div class="img" style="background-image: url(data:image/jpeg;base64,'.base64_encode($imageData).')"></div>';
        } else {
            // User does not have an image, display a default image
            echo '<div class="img" style="background-image: url(../img/anon.png);"></div>';
        }

        // Close the statement
        $stmt->close();
    ?>
            </div>
	  				<h3><?php  echo "{$_SESSION["name"]}"; ?></h3>
	  			</div>
	  		</div>
        <ul class="list-unstyled components mb-5">
          <li> 
            <a href="counsellingUser.php"><span class="fa fa-handshake-o mr-3"></span>Kaunseling Sistem</a>
          </li>
          <li>
              <a href="mesejUser.php"><span class="fa fa-inbox mr-3 notif"><small class="d-flex align-items-center justify-content-center">5</small></span>Mesej</a>
          </li>
          <li>
            <a href="temujanjiDetails.php"><span class="fa fa-calendar mr-3"></span>Temujanji</a>
          </li>
          <li>
		        <a href="kewanganUser.php"><span class="fa fa-dollar mr-3"></span>Permohonan Bantuan</a>
		      </li>
          <li class="active">
            <a href="#"><span class="fa fa-user mr-3"></span>Kemaskini Profil</a>
          </li>
          <li>
            <a href="../logout.php"><span class="fa fa-arrow-left mr-3 "></span>Log Keluar</a>
          </li>
        </ul>

    	</nav>

      

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-3">
        
        
        <h3 class="mb-3"><b>Kemaskini Profil</b></h3>
    <!-- Account page navigation-->
    <form action="kemaskiniProfil_crud.php" method="POST" enctype="multipart/form-data">
    <hr class="mt-0 mb-4">
    <div class="row">
        <div class="col-xl-4">
            <!-- Profile picture card-->
            <div class="card mb-4 mb-xl-0">
                <div class="card-header">Gambar Profil</div>
                <div class="card-body text-center">
                    <!-- Profile picture image-->
                    <img class="img-account-profile rounded-circle mb-2" src="../img/anon.png" alt="" id="profile_image">
                    <!-- Profile picture help block-->
                    <div class="small font-italic text-muted mb-4">JPG atau PNG tidak melebihi 5 MB</div>
                    <!-- Profile picture upload button-->
                    <button class="btn btn-primary" type="button" id="img_btn">Muat Naik Gambar</button>
                    <input type="file" id="file_input" name="profile_picture" style="display: none;">
                </div>
            </div>
        </div>
        <div class="col-xl-8">

       
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header">Maklumat Akaun</div>
                <div class="card-body">
                    <form>
                        <!-- Form Group (username)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="inputUsername">Nama</label>
                            <input class="form-control" id="name" name="nama" type="text" value="<?php echo $_SESSION["name"]; ?>" readonly>
                        </div>
                        <!-- Form Row-->
                        <div class="mb-3">
                            <label class="small mb-1" for="inputEmel">Emel</label>
                            <input class="form-control" id="email" name="email" type="email" placeholder="masukkan emel">
                        </div>
                        <!-- Form Group (email address)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="inputPassword">Kata Laluan</label>
                            <input class="form-control" id="password" name="password" type="password" placeholder="masukkan kata laluan">
                        </div>
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (organization name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputKolej">Kolej</label>
                                <input class="form-control" id="kolej" name="kolej" type="text" placeholder="cth:KPZ">
                            </div>
                            <!-- Form Group (location)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputFakulti">Fakulti</label>
                                <input class="form-control" id="fakulti" name="fakulti" type="text" placeholder="Enter your location">
                            </div>
                        </div>
                        
                        <!-- Save changes button-->
                        <button class="btn btn-primary" type="submit" name="update_btn">Simpan</button>
                    </form>
                </div>
            </div>
        
        </div>
    </div>

      </div>
		</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

    <script>
      // Function to trigger file input click when the image button is clicked
      document.getElementById('img_btn').addEventListener('click', function() {
        document.getElementById('file_input').click();
      });

      // Function to handle the file selection
      document.getElementById('file_input').addEventListener('change', function() {
        var file = this.files[0];
        var reader = new FileReader();
        reader.onload = function(e) {
          document.getElementById('profile_image').src = e.target.result;
        };
        reader.readAsDataURL(file);
      });
    </script>
  </body>
</html>