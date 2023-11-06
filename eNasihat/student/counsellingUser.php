<?php
session_start();
include '../database.php';
?>


<!doctype html>
<html lang="en">
  <head>
  	<title>Kaunseling</title>
    <link rel="shortcut icon" href="../img/logo.png" type="favicon-bebrainy">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/counsellingUser.css">

    

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
          <li class="active"> 
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
          <li>
            <a href="#"><span class="fa fa-user mr-3"></span>Kemaskini Profil</a>
          </li>
          <li>
            <a href="../logout.php"><span class="fa fa-arrow-left mr-3 "></span>Log Keluar</a>
          </li>
        </ul>

    	</nav>

      

        <!-- Page Content  -->
        <div id="chatbotContainer">
            <!-- Add the chatbot iframe here -->
            <iframe src="../bot.php"></iframe>
        </div>
     
		</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>


  </body>
</html>