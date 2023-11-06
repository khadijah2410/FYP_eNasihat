<?php
session_start();
include_once '../database.php';
?>

<!doctype html>
<html lang="en">
  <head>
  	<title>Senarai</title>
    <link rel="shortcut icon" href="../img/logo.png" type="favicon-bebrainy">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/senaraiTemujanjiAdmin.css">

   
  </head>
  <body>
		
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
              <div class="img bg-wrap text-center py-4" style="background-image: url(../img/adminbg.png);">
	  			<div class="user-logo">
                  <div class="img" id="user_img">
            <?php
        // Retrieve the current session user's NoMatrik
        $noMatrik = $_SESSION['NoMatrik'];

        // Retrieve the image data from the 'pelajar' table
        $query = "SELECT image FROM kaunselor WHERE IdKaunselor = ?";
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
    ?> </div>
	  				<h3><?php  echo "{$_SESSION["name"]}"; ?></h3>
	  			</div>
	  		</div>
         <ul class="list-unstyled components mb-5">
          <li>
            <a href="temujanjiAdmin.php"><span class="fa fa-calendar mr-3"></span>Tempahan temujanji</a>
          </li>
          <li class="active">
            <a href="senaraiTemujanjiAdmin.php"><span class="fa fa-list mr-3"></span>Senarai Temujanji</a>
          </li>
          <li>
            <a href="mesejAdmin.php"><span class="fa fa-inbox mr-3"></span>Mesej</a>
          </li>
          <li>
            <a href="../logout.php"><span class="fa fa-arrow-left mr-3 "></span>Log Keluar</a>
          </li>
         </ul>

    	 </nav>
         

        <!-- Page Content  -->

<div class="container">
<div class="row">
    <div class="col-md-12">
        <div class="card card-white mb-5">
        <div class="card-heading clearfix border-bottom mb-4">
    <div class="d-flex justify-content-between align-items-center">
        <h5 class="card-title"><b>Maklumat Temujanji</b></h5>
    </div>
</div>

            <!-- ... previous HTML code ... -->

<div class="card-body">
    <ul class="list-unstyled">
        <?php

       $kaunselorId = $_SESSION['NoMatrik'];
        // Retrieve data from the database
        try {
            $stmt = $connect->prepare("SELECT * FROM temujanji WHERE Kaunselor = :kaunselorId");
            $stmt->bindParam(':kaunselorId', $kaunselorId);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        // Iterate over the retrieved rows
        foreach ($result as $row) {
            $tarikh = date('d/m/Y', strtotime($row['Tarikh']));
            $nama = $row['Nama'];
            $masa = date("h:i A", strtotime($row['Masa']));
            $status = $row['Status'];

            $noMatrik = $row['NoMatrik'];
            $query = "SELECT email FROM pelajar WHERE NoMatrik = :noMatrik";
            $stmt = $connect->prepare($query);
            $stmt->bindParam(':noMatrik', $noMatrik);
            $stmt->execute();
            $pelajar = $stmt->fetch(PDO::FETCH_ASSOC);
            $emailPelajar = $pelajar['email'];    
            ?>

            <li class="position-relative booking">
                <div class="media-body">
                    <h5 class="mb-4" name="nama"><?php echo $nama; ?><span class="badge <?php echo $status === 'Terima' ? 'badge-success' : 'badge-primary'; ?> mx-3">
                        <?php echo $status; ?>
                    </span></h5>
                    <div class="mb-3">
                        <span class="mr-2 d-block d-sm-inline-block mb-2 mb-sm-0"><b>Tarikh temujanji:</b></span>
                        <span class="Tarikh" name="Tarikh"><?php echo $tarikh; ?></span>
                    </div>
                    <div class="mb-3">
                        <span class="mr-2 d-block d-sm-inline-block mb-2 mb-sm-0"><b>Masa temujanji:</b></span>
                        <span class="Masa" name="Masa"><?php echo $masa; ?></span>
                    </div>
                    <div class="mb-3">
                        <span class="mr-2 d-block d-sm-inline-block mb-2 mb-sm-0"><b>Emel pelajar:</b></span>
                        <span class="email" name="email"><?php echo $emailPelajar; ?></span>
                    </div>
                </div>
                <div class="buttons-to-right">
                <a href="" class="btn-gray mr-2" type="submit" id="btn_edit"><i class="fa fa-pencil mr-2"></i>Edit</a>
                <a href="temujanjiDetails.php?cancel=<?php echo $row['IdSesi']; ?>" class="btn-gray mr-2" type="submit"><i class="fa fa-times-circle mr-2"></i>Cancel</a>
                </div>
            </li>

        <?php
        }
        ?>
    </ul>
</div>
        </div>
    </div>
</div>
</div>
        
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

 </body>
</html>