<?php
include 'logmasuk.php';

if (!isset($_SESSION)) {
	session_start();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Halaman Utama</title>

  <!-- Favicons -->
  <link rel="icon" type="image/x-icon" href="../img/logo.png">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">



</head>

<body class="index-page" data-bs-spy="scroll" data-bs-target="#navmenu">

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="container-fluid d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1>eNasihat</h1>
        <span>.</span>
      </a>

      <!-- Nav Menu -->
      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#hero" class="active">Halaman Utama</a></li>
          <li><a href="#tentang-kami">Tentang Kami</a></li>
          <li><a href="#perkhidmatan">Perkhidmatan</a></li>
          <li><a href="#hubungi">Hubungi</a></li>
        </ul>

        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav><!-- End Nav Menu -->

      <a class="btn-getstarted" href="../bot.php">Sesi Kaunseling</a>

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- Hero Section - Home Page -->
    <section id="hero" class="hero">

      <img src="../img/homepagebg.png" alt="" data-aos="fade-in">
      <form action="#" method="POST">

      <div class="container">
        <div class="row">
          <div class="col-lg-10">
            <h2 data-aos="fade-up" data-aos-delay="100">Selamat Datang ke eNasihat</h2>
            <p data-aos="fade-up" data-aos-delay="200">Sedia untuk membantu anda sepanjang masa.</p>
          </div>
          <div class="col-lg-5">
            <form action="#" class="sign-up-form d-flex" data-aos="fade-up" data-aos-delay="300">
              <input type="text" class="form-control" name="NoMatrik" placeholder="Masukkan kata nama">
              <input type="password" class="form-control" name="password"placeholder="Masukkan kata laluan">
              <input type="submit" class="btn btn-primary" name="submit" value="Log Masuk">
              <p href="" class="sm-text mx-auto" style="font-size: 16px;">Tiada akaun?<a id="daftar_btn" style="color: white;" href="../register.php">  Daftar</a></p>
            </form>
          </div>
        </div>
      </div>

    </section><!-- End Hero Section -->

    <!-- Clients Section - Home Page -->
    <section id="tentang-kami" class="clients">

      <div class="container-fluid" data-aos="fade-up">

        <div class="row gy-4">

         <div class="col-xl-2 col-md-3 col-6 client-logo">
            <img src="" class="img-fluid" alt="">
          </div><!-- End Client Item -->

          <div class="col-xl-2 col-md-3 col-6 client-logo">
            <img src="assets/img/clients/ukm.png" class="img-fluid" alt="">
          </div><!-- End Client Item -->

          <div class="col-xl-2 col-md-3 col-6 client-logo">
            <img src="assets/img/clients/watan.png" class="img-fluid" alt="">
          </div><!-- End Client Item -->

          <div class="col-xl-2 col-md-3 col-6 client-logo">
            <img src="assets/img/clients/zakat.png" class="img-fluid" alt="">
          </div><!-- End Client Item -->

          <div class="col-xl-2 col-md-3 col-6 client-logo">
            <img src="assets/img/clients/hep.png" class="img-fluid" alt="">
          </div><!-- End Client Item -->

        </div>

      </div>

    </section><!-- End Clients Section -->

    <!-- Services Section - Home Page -->
    <section id="perkhidmatan" class="services">

      <!--  Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Perkhidmatan</h2>
        <p>Antara perkhidmatan yang ditawarkan oleh eNasihat ialah kaunseling dan kewangan.</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-6 " data-aos="fade-up" data-aos-delay="100">
            <div class="service-item d-flex">
              <div class="icon flex-shrink-0"><i class="bi bi-laptop"></i></div>
              <div>
                <h4 class="title"><a href="#" class="stretched-link">Kaunseling sistem</a></h4>
                <p class="description">Pelajar akan menyatakan masalah yang dihadapi dengan berinteraksi melalui sistem. Kemudian, sistem akan mengenal pasti masalah tersebut dan memberikan solusi yang bersesuaian</p>
              </div>
            </div>
          </div>
          <!-- End Service Item -->

          <div class="col-lg-6 " data-aos="fade-up" data-aos-delay="200">
            <div class="service-item d-flex">
              <div class="icon flex-shrink-0"><i class="bi bi-cash-coin"></i></div>
              <div>
                <h4 class="title"><a href="#" class="stretched-link">Bantuan Kewangan</a></h4>
                <p class="description">Pelajar boleh memohon bantuan kewangan daripada Pusat Zakat UKM dan akan diberi jika menepati syarat-syarat kelayakan.</p>
              </div>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-6 " data-aos="fade-up" data-aos-delay="300">
            <div class="service-item d-flex">
              <div class="icon flex-shrink-0"><i class="bi bi-people-fill"></i></div>
              <div>
                <h4 class="title"><a href="#" class="stretched-link">Temujanji bersama kaunselor</a></h4>
                <p class="description">Pelajar boleh membuat tempahan temujanji bersama kaunselor jika diperlukan di mana pelajar boleh memilih masa, tarikh serta kaunselor yang diingini.</p>
              </div>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-6 " data-aos="fade-up" data-aos-delay="400">
            <div class="service-item d-flex">
              <div class="icon flex-shrink-0"><i class="bi bi-chat-text"></i></div>
              <div>
                <h4 class="title"><a href="#" class="stretched-link">Mesej Kaunselor</a></h4>
                <p class="description">Pelajar boleh menghantar mesej kepada kaunselor jika tidak ingin berjumpa secara fizikal.</p>
              </div>
            </div>
          </div><!-- End Service Item -->

          


        </div>

      </div>

    </section><!-- End Services Section -->


    <!-- Faq Section - Home Page -->
    <section id="faq" class="faq">

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
            <div class="content px-xl-5">
              <h3><span>Soalan</span><br><strong>Lazim</strong></h3>
              <p>
                Berikut merupakan soalan yang sering ditanya oleh pengguna, jika terdapat persoalan lain boleh hubungi kami menggunakan saluran yang disediakan.
              </p>
            </div>
          </div>

          <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">

            <div class="faq-container">
              <div class="faq-item faq-active">
                <h3><span class="num">1.</span> <span>Adakah saya perlu log masuk untuk membuat sesi kaunseling bersama sistem?</span></h3>
                <div class="faq-content">
                  <p>Tidak perlu, anda boleh membuat sesi kaunseling bersama sistem tanpa perlu mengelog masuk dengan menekan butang 'Sesi Kaunseling' yang berada di atas kanan halaman.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <h3><span class="num">2.</span> <span>Bagaimana hendak membuat temujanji kaunseling bersama kaunselor?</span></h3>
                <div class="faq-content">
                  <p>Pelajar boleh membuat sesi kaunseling bersama kaunselor dengan mengelog masuk sistem dan mempunyai navigasi 'Temujanji'. Tekan butang 'Tempahan Baru' dan isikan semua maklumat bagi menempah sesi kaunseling.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <h3><span class="num">3.</span> <span>Bolehkah saya meminta lebih daripada satu jenis bantuan?</span></h3>
                <div class="faq-content">
                  <p>Ya, pelajar dibenarkan untuk memohon lebih daripada satu jenis bantuan zakat. Pun begitu, adalah tertakhluk kepada Pusat Zakat UKM sama ada untuk menerima atau menolak permohonan tersebut setelah ditapis dan dinilai.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <h3><span class="num">4.</span> <span>Bagaimanakah saya mengetahui sama ada permohonan bantuan zakat saya diluluskan ataupun tidak?</span></h3>
                <div class="faq-content">
                  <p>Pelajar boleh mengetahui sama ada permohonan zakat diluluskan ataupun tidak di halaman permohonan bantuan.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

            </div>

          </div>
        </div>

      </div>

    </section><!-- End Faq Section -->

  

    <!-- Contact Section - Home Page -->
    <section id="hubungi" class="contact">

      <!--  Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Hubungi Kami</h2>
        <p>Anda mempunyai sebarang persoalan? Hubungi kami menggunakan talian di bawah.</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-6">

            <div class="row gy-4">
              <div class="col-md-6">
                <div class="info-item" data-aos="fade" data-aos-delay="200">
                  <i class="bi bi-geo-alt"></i>
                  <h3>Alamat</h3>
                  
                  <p>Aras 7, Bangunan PUSANIKA</p>
                  <p>43600 UKM, Bangi Selangor, Malaysia</p>
                </div>
              </div><!-- End Info Item -->

              <div class="col-md-6">
                <div class="info-item" data-aos="fade" data-aos-delay="300">
                  <i class="bi bi-telephone"></i>
                  <h3>Hubungi kami</h3>
                  <p>+603 8921 4700</p>
                  <p>+603 8925 4029</p>
                  <p></p>
                </div>
              </div><!-- End Info Item -->

              <div class="col-md-6">
                <div class="info-item" data-aos="fade" data-aos-delay="400">
                  <i class="bi bi-envelope"></i>
                  <h3>Emel</h3>
                  <p>pghhep@ukm.edu.my</p>
                </div>
              </div><!-- End Info Item -->

              <div class="col-md-6">
                <div class="info-item" data-aos="fade" data-aos-delay="500">
                  <i class="bi bi-clock"></i>
                  <h3>Waktu berurusan</h3>
                  <p>Isnin - Jumaat</p>
                  <p>08:00 - 17:00</p>
                </div>
              </div><!-- End Info Item -->

            </div>

          </div>

          <div class="col-lg-6">
            <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
              <div class="row gy-4">

                <div class="col-md-6">
                  <input type="text" name="name" class="form-control" placeholder="Nama" required>
                </div>

                <div class="col-md-6 ">
                  <input type="email" class="form-control" name="email" placeholder="Emel" required>
                </div>

                <div class="col-md-12">
                  <input type="text" class="form-control" name="subject" placeholder="Perkara" required>
                </div>

                <div class="col-md-12">
                  <textarea class="form-control" name="message" rows="6" placeholder="Mesej" required></textarea>
                </div>

                <div class="col-md-12 text-center">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Mesej anda telah dihantar. Terima kasih!</div>

                  <button type="submit">Hantar</button>
                </div>

              </div>
            </form>
          </div><!-- End Contact Form -->

        </div>

      </div>

    </section><!-- End Contact Section -->

  </main>

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-5 col-md-12 footer-about">
          <a href="index.html" class="logo d-flex align-items-center">
            <span>eNasihat</span>
          </a>
          <p>Sedia untuk membantu anda sepanjang masa.</p>
          <div class="social-links d-flex mt-4">
            <a href="https://twitter.com/ukmsiswaklik"><i class="bi bi-twitter"></i></a>
            <a href="https://www.facebook.com/siswa.ukm/"><i class="bi bi-facebook"></i></a>
            <a href="https://www.instagram.com/ukmsiswaklik/"><i class="bi bi-instagram"></i></a>
            <a href="https://www.youtube.com/channel/UCfVbRDPsIkd_llA0WBmlFWQ?view_as=subscriber"><i class="bi bi-youtube"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Pautan</h4>
          <ul>
            <li><a href="#">Halaman Utama</a></li>
            <li><a href="#">Tentang Kami</a></li>
            <li><a href="#">Perkhidmatan</a></li>
            <li><a href="#">Terma & Syarat</a></li>
            <li><a href="#">Privasi polisi</a></li>
          </ul>
        </div>

        <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
          <h4>Hubungi Kami</h4>
          <p>Aras 7, Bangunan PUSANIKA</p>
          <p>43600 UKM, Bangi</p>
          <p>Malaysia</p>
          <p class="mt-4"><strong>Telefon:</strong> <span>+603 8921 4700</span></p>
          <p><strong>Emel:</strong> <span>pghhep@ukm.edu.my</span></p>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>&copy; <span>Copyright</span> <strong class="px-1">eNasihat</strong></p>
      
    </div>

  </footer><!-- End Footer -->

  <!-- Scroll Top Button -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader">
    <div></div>
    <div></div>
    <div></div>
    <div></div>
  </div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>