<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="shortcut icon" href="img/logo.png" type="favicon-bebrainy">
    <link rel="stylesheet" href="menu.css">
</head>
<body>
    <div class="hero">
        <nav>
            <h1 class="logo">eNasihat </h1>
            <ul>
                <li><a href="student/counsellingUser.php">Kaunseling</a></li>
                <li><a href="#">Kewangan</a></li>
                <li><a href="#">Tentang Kami</a></li>
                <li><a href="#">Hubungi</a></li>
            </ul>
            <img src="img/user.png" class="user-pic" onclick="toggleMenu()"  >
            <div class="sub-menu-wrap" id="subMenu">
                <div class="sub-menu">
                    <div class="user-info">
                        <img src="img/user.png">
                        <h2><?php
           // if (isset($_SESSION['name'])) {
                
            echo "{$_SESSION["name"]}";    
            //} else {
                //echo 'No user';// Handle the case where the name is not set, e.g., redirect the user to the login page
               // }

                        
                         ?></h2>
                    </div>
                    <hr>
                    <a href="#" class="sub-menu-link"><img src="img/profile.png">
                    <p>Kemaskini Profil</p> <span>></span></a>
                    <a href="#" class="sub-menu-link"><img src="img/setting.png">
                    <p>Tetapan & Privasi</p> <span> ></span></a>
                    <a href="#" class="sub-menu-link"><img src="img/help.png">
                    <p>Pertanyaan</p> <span>></span></a>
                    <a href="logout.php" class="sub-menu-link"><img src="img/logout.png">
                    <p>Log Keluar</p> <span>></span>
                </a>
                </div>
            </div>
        </nav>
       
    </div>


    <!-- footer -->

    <section class="footer">
   <div class="box-container">
      
      <div class="box">
         <h3>extra links</h3>
         <a href="#"> <i class="fas fa-angle-right"></i> about us</a>
         <a href="#"> <i class="fas fa-angle-right"></i> privacy policy</a>
         <a href="#"> <i class="fas fa-angle-right">
         </i> terms of use</a>
      </div>
      <div class="box">
         <h3>contact info</h3>
         <a href="#"> <i class="fas fa-phone"></i> 03-56212121 </a>
         <a href="#"> <i class="fas fa-phone"></i> 019-1112221 </a>
         <a href="#"> <i class="fas fa-envelope"></i> admin@servicezillion.com </a>
         <a href="https://www.google.com/maps/place/Universiti+Kebangsaan+Malaysia/@3.0116948,101.5057449,11z/data=!4m19!1m13!4m12!1m4!2m2!1d101.5119872!2d3.0900224!4e1!1m6!1m2!1s0x31cdc9f6e881cbf7:0xb06402ffc0884bd7!2sukm+location!2m2!1d101.7800233!2d2.9289226!3m4!1s0x31cdc9f6e881cbf7:0xb06402ffc0884bd7!8m2!3d2.9289226!4d101.7800233" target="_blank"> <i class="fas fa-map"></i> Bandar Baru Bangi, Selangor </a>
      </div>
      <div class="box">
         <h3>follow us</h3>
         <a href="https://www.facebook.com/computing.ftsmukm" target="_blank"> <i class="fab fa-facebook-f"></i> facebook </a>
         <a href="#"> <i class="fab fa-twitter"></i> twitter </a>
         <a href="https://www.instagram.com/fareenamf/?hl=en" target="_blank"> <i class="fab fa-instagram"></i> instagram </a>
      </div>
   </div>
   <div class="credit"> @Copyright <span><b>eNasihat</b></span> | 2023 </div>
</section>

<script>
    let subMenu = document.getElementById("subMenu");

    function toggleMenu(){
        subMenu.classList.toggle("open-menu");

    }
</script>

</body>
</html>