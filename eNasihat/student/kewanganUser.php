<?php
session_start();
include '../database.php';
include 'createPermohonan.php';
?>


<!doctype html>
<html lang="en">
<head>
<title>Bantuan Kewangan</title>
<meta http-equiv='X-UA-Compatible' content='IE=edge'>
<link rel="shortcut icon" href="../img/logo.png" type="favicon-bebrainy">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/kewanganUser.css">
<link rel="stylesheet" href="css/style.css">


<style>
.btn-next {
  background-color: rgb(11, 78, 179); /* Blue color */
  color: #ffffff; /* White text color */
}

.btn-prev {
  background-color:rgb(11, 78, 179); /* Yellow color */
  color: #ffffff; /* Black text color */
}
</style>

</head>
<body class="custom-body">
	
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
?></div>
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
		<li  class="active">
		<a href="#"><span class="fa fa-dollar mr-3"></span>Permohonan Bantuan</a>
		</li>
		<li>
		<a href="kemaskiniProfil.php"><span class="fa fa-user mr-3"></span>Kemaskini Profil</a>
		</li>
		<li>
		<a href="../logout.php"><span class="fa fa-arrow-left mr-3 "></span>Log Keluar</a>
		</li>
	</ul>

	</nav>

	<!-- Page Content  -->
  <div class="container"> 
  
  <form action="createPermohonan.php" class="form" id="forms" method="POST">

        <div class="progressbar">
            <div class="progress" id="progress"></div>
            <div class="progress-step progress-step-active" data-title="Jenis Bantuan"></div>
            <div class="progress-step" data-title="Maklumat Bank"></div>
            <div class="progress-step" data-title="Perakuan Pemohon"></div>
        </div>
        <!---jenis bantuan-->
        <div class="step-forms step-forms-active">
        <div class="radio-group">
    <div class="radio-option">
      <input type="radio" id="bantuan umum pelajaran" name="jenis-bantuan" value="bantuan-umum-pelajaran">
      <label for="bantuan-umum-pelajaran">Bantuan Umum Pelajaran</label>
    </div>

    <div class="radio-option">
      <input type="radio" id="bantuan musibah" name="jenis-bantuan" value="bantuan-musibah">
      <label for="bantuan-musibah">Bantuan Musibah</label>
    </div>

    <div class="radio-option">
      <input type="radio" id="bantuan perubatan" name="jenis-bantuan" value="bantuan-perubatan">
      <label for="bantuan-perubatan">Bantuan Perubatan</label>
    </div>

    <div class="radio-option">
      <input type="radio" id="bantuan mualaf" name="jenis-bantuan" value="bantuan-mualaf">
      <label for="bantuan-mualaf">Bantuan Mualaf</label>
    </div>

    <div class="radio-option">
      <input type="radio" id="bantuan mobiliti" name="jenis-bantuan" value="bantuan-mobiliti">
      <label for="bantuan-mobiliti">Bantuan Mobiliti</label>
    </div>

    <div class="radio-option">
      <input type="radio" id="bantuan insentif kecemerlangan" name="jenis-bantuan" value="bantuan-insentif-kecemerlangan">
      <label for="bantuan-insentif-kecemerlangan">Bantuan Insentif Kecemerlangan</label>
    </div>
  </div>
            
        
            <div class="">
                <a href="#" class="btn btn-next width-50 ml-auto">Seterusnya</a>
            </div>
        </div>
        <div class="step-forms">
            <div class="group-inputs">
                <label>Nama Bank</label>
                <input type="text" name="namaBank" id="namaBank" />
            </div>
            <div class="group-inputs">
                <label for="position">Nombor Akaun</label>
                <input type="text" name="noAkaun" id="noAkaun" />
            </div>
           
            <div class="btns-group">
                <a href="#" class="btn btn-prev">Kembali</a>
                <a href="#" class="btn btn-next">Seterusnya</a>
            </div>
        </div>
        <div class="step-forms">
            <div class="form-check"> 
            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" required> 
            <label class="form-check-label" for="flexCheckChecked"> Saya mengakui bahawa semua maklumat yang diberikan adalah benar dan bersetuju menerima sebarang tindakan jika didapati palsu.</label> 
            </div>

            <div class="btns-group">
                <a href="#" class="btn btn-prev">Kembali</a>
                <input type="submit" value="Hantar" id="mohonBtn" name="mohon_btn"/>
            </div>
        </div>
    </form>

    <div class="welcome" style="display: none;">
    <div class="content">
      <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
        <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" />
        <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
      </svg>
      <h5>Permohonan berjaya disimpan!</h5>
      <span>Kami akan hubungi anda dengan segera!</span>
    </div>
  </div>

</div>


</div>
    

</body>

<script src="js/jquery.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

<script>
const prevBtns = document.querySelectorAll(".btn-prev");
const nextBtns = document.querySelectorAll(".btn-next");
const progress = document.getElementById("progress");
const formSteps = document.querySelectorAll(".step-forms");
const progressSteps = document.querySelectorAll(".progress-step");

let formStepsNum = 0;

nextBtns.forEach((btn) => {
    btn.addEventListener("click", () => {
        formStepsNum++;
        updateFormSteps();
        updateProgressbar();

    });
});

prevBtns.forEach((btn) => {
    btn.addEventListener("click", () => {
        formStepsNum--;
        updateFormSteps();
        updateProgressbar();

    });
});

function updateFormSteps() {
    formSteps.forEach((formStep) => {
        formStep.classList.contains("step-forms-active") &&
            formStep.classList.remove("step-forms-active");
    });

    formSteps[formStepsNum].classList.add("step-forms-active");
}

function updateProgressbar() {
    progressSteps.forEach((progressStep, idx) => {
        if (idx < formStepsNum + 1) {
            progressStep.classList.add("progress-step-active");

        } else {
            progressStep.classList.remove("progress-step-active");

        }
    });

    progressSteps.forEach((progressStep, idx) => {
        if (idx < formStepsNum) {

            progressStep.classList.add("progress-step-check");
        } else {

            progressStep.classList.remove("progress-step-check");
        }
    });

    const progressActive = document.querySelectorAll(".progress-step-active");

    progress.style.width =
        ((progressActive.length - 1) / (progressSteps.length - 1)) * 100 + "%";
}
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</body>
</html>