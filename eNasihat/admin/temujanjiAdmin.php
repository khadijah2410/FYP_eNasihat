<?php
session_start();
include_once '../database.php';
include 'updateTemujanji.php';

// Retrieve data from the database
try {
$kaunselorId = $_SESSION['NoMatrik'];
$stmt = $connect->prepare("SELECT t.*, k.nama AS KaunselorNama FROM temujanji t INNER JOIN kaunselor k ON t.Kaunselor = k.IdKaunselor WHERE t.Kaunselor = ?");
$stmt->bindParam(1, $kaunselorId);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);   
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<!doctype html>
<html lang="en">
  <head>
  	<title>Tempahan</title>
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
    <link rel="stylesheet" href="css/temujanjiAdmin.css">

    <style>
        /* Add custom styles here */
        .card-container {
            overflow-x: auto;
            white-space: nowrap;
        }

        .card {
            display: inline-block;
            margin-right: 10px;
            width: 300px; /* Adjust the width as needed */
        }

  #popup {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: white;
    padding: 20px;
    z-index: 9999;
    width: 400px; /* Adjust the width as needed */
  }
</style>
</head>

<body>
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
			<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
	        </button>
            </div>
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
          <li class="active">
            <a href="#"><span class="fa fa-calendar mr-3"></span>Tempahan temujanji</a>
          </li>
          <li>
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
        <div id="content" class="p-4 p-md-5 pt-5">
        <div class="container-fluid px-1 py-5 mx-auto">
            <div class="row d-flex justify-content-center">
                <div class="card-container" onclick="openEditPopup('<?php echo $row['IdSesi']; ?>', '<?php echo $row['NoMatrik']; ?>', '<?php echo $row['Tarikh']; ?>', '<?php echo $row['Masa']; ?>')">
                    <?php foreach ($result as $row) { 
                        $noMatrik = $row['NoMatrik']; //get nomatrik

                        $countQuery = "SELECT COUNT(*) AS count FROM temujanji WHERE NoMatrik = ?";
                        $countStmt = $conn->prepare($countQuery);
                        $countStmt->bind_param("s",$noMatrik);
                        $countStmt-> execute();
                        $countResult = $countStmt->get_result();
                        $rowCount = $countResult->fetch_assoc()['count'];


                        if ($row['Status'] == 'Tertunda'){ 
                        ?>
                        <div class="card">
                            <!-- Replace the static content with database values -->
                            <div class="row d-flex justify-content-between mx-2 px-3 card-strip">
                                <div class="left d-flex flex-column">
                                    <h5 class="mb-1"><?php echo date("h:i A", strtotime($row['Masa'])) ?></h5>
                                    <p class="text-muted mb-1 sm-text"><?php echo date('d/m/Y', strtotime($row['Tarikh'])); ?></p>
                                </div>
                
                            </div>
                            <div class="row d-flex justify-content-between mx-2 px-3 card-strip">
                                <div class="left d-flex flex-column">
                                    <h5 class="mb-1"><?php echo $row['Nama']; ?></h5>
                                    <p class="text-muted mb-1 sm-text" id="count"><?php echo 'kali ke '.$rowCount?></p>
                                </div>
                                <div class="right d-flex">
                                    <div class="fa fa-comment-o"></div>
                                </div>
                            </div>
                            <div class="row justify-content-between mx-2 px-3 card-strip">
                                <div class="left d-flex">
                                <h5 class="mb-1 text-muted"><?php echo $row['KaunselorNama']; ?></h5>
                                <span class="time">1 jam</span>
                                </div>
                            </div>
                            
                            <div class="row d-flex justify-content-between mx-2 px-3">
                            <form action="#" method="POST" style="width: 100%;">
                            <input type="hidden" name="IdSesi" value="<?php echo $row['IdSesi']; ?>">
                            <div class="btn-group btn-group-toggle" style="width: 100%;margin-bottom:15px;">
                            <button class="btn btn-purple" type="submit" name="terima_btn">Terima</button>
                            </div>
                                </form>
                            </div>
                        </div>
                    <?php } 
                    }?>
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