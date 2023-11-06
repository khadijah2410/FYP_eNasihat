<?php
session_start();
include 'createTemujanji.php';
include '../database.php';
?>


<!doctype html>
<html lang="en">
<head>
<title>Temujanji</title>
<link rel="shortcut icon" href="../img/logo.png" type="favicon-bebrainy">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/temujanjiUser.css">


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
		<li class="active">
		<a href="#"><span class="fa fa-calendar mr-3"></span>Temujanji</a>
		</li>
		<li>
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
	<div id="booking" class="section">
	<div class="section-center">
		<div class="container">
			<div class="row">
				<div class="booking-form">

	

	<form action="#" method="POST" id="booking-form">
					
						
		<div class="form-group">
			<span class="form-label">Nama</span>
			<input class="form-control" type="name" id="Nama" name="Nama" value="<?php echo $_SESSION["name"]; ?>" readonly>
		</div>
									
		<div class="form-group">
			<span class="form-label">Nombor Tel</span>
			<input class="form-control" type="NoTel" id="NoTel" name="NoTel" placeholder="Masukkan nombor telefon" required>
		</div>

		<div class="form-group">
           <span class="form-label">Kaunselor</span>
		   <input type="hidden" id="selectedKaunselorId" name="selectedKaunselorId">
           <select class="form-control" name="Kaunselor" onchange="updateSelectedKaunselorId(this)">
            <option value="-1">-Pilih-</option>
            <option value="1">Puan Maziatul</option>
            <option value="2">Encik Rashid</option>
            <option value="3">Cik Zuhaila</option>
            <option value="4">Encik Saiful</option>
            <option value="5">Puan Rafidah</option>
           </select>
           <span class="select-arrow"></span>
       </div>
			
		<div class="row">
			<div class="col-sm-6">
					<div class="form-group">
						<span class="form-label">Tarikh</span>
						<input class="form-control" type="date" name="Tarikh" required>
					</div>
			</div>
			<div class="col-sm-6">
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<span class="form-label">Jam</span>
								<select class="form-control" name="jam">
					            <option>Pilih</option>
					            <option>9</option>
								<option>10</option>
								<option>11</option>
								<option>12</option>
						        <option>13</option>
								<option>15</option>
								<option>16</option>
								</select>
								<span class="select-arrow"></span>
							</div>
						</div>
								<div class="col-sm-6">
										<div class="form-group">
											<span class="form-label">Minit</span>
											<select class="form-control" name="minit">
					<option>Pilih</option>
												<option>05</option>
												<option>10</option>
												<option>15</option>
												<option>20</option>
												<option>25</option>
												<option>30</option>
												<option>35</option>
												<option>40</option>
												<option>45</option>
												<option>50</option>
												<option>55</option>
											</select>
											<span class="select-arrow"></span>
										</div>
									</div>
									
								</div>
							</div>
						</div>
						<div class="form-btn">
							<button class="submit-btn" type="submit" name="book_btn">Tempah Sekarang</button>
						</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</body>

<script src="js/jquery.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
<script>
    function updateSelectedKaunselorId(selectElement) {
        var selectedValue = selectElement.value;
        document.getElementById('selectedKaunselorId').value = selectedValue;
    }
</script>
</body>
</html>