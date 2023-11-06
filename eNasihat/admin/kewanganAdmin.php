<?php
session_start();
include '../database.php';
$query = "SELECT p.IdPermohonan, p.NoMatrik, pj.nama, p.status, p.jenisBantuan 
          FROM permohonan p
          JOIN pelajar pj ON p.NoMatrik = pj.NoMatrik";
$result = $conn->query($query);
?>


<!doctype html>
<html lang="en">
  <head>
  	<title>Permohonan</title>
    <link rel="shortcut icon" href="../img/logo.png" type="favicon-bebrainy">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
	  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	  <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/kewanganAdmin.css">
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
        $query = "SELECT image FROM staff WHERE IdStaff = ?";
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
            echo '<script>console.log("Default image displayed.");</script>';
        }

        // Close the statement
        $stmt->close();
    ?> </div>
	  				<h3><?php  echo "{$_SESSION["name"]}"; ?></h3>
	  			</div>
	  		</div>
        <ul class="list-unstyled components mb-5">
          <li class="active"> 
            <a href="#"><span class="fa fa-file mr-3"></span>Senarai Permohonan</a>
          </li>
          <li> 
            <a href="kewanganTransaksi.php"><span class="fa fa-money mr-3"></span>Senarai Transaksi</a>
          </li>
          <li>
            <a href="../logout.php"><span class="fa fa-arrow-left mr-3 "></span>Log Keluar</a>
          </li>
        </ul>

    	</nav>

        <!-- Page Content  -->
        
<div class="container bootstrap snippets bootdey">
    <div class="row">
        <div class="col-lg-12">
            <div class="main-box no-header clearfix">
                <div class="main-box-body clearfix">
                    <div class="table-responsive">
                        <table class="table user-list">
                            <thead>
                                <tr>
                                <th><span>NoMatrik</span></th>
                                <th><span>Nama</span></th>
                                <th class="text-center"><span>Status</span></th>
                                <th><span>Jenis Bantuan</span></th>
                                <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
    <?php while ($row = $result->fetch_assoc()) { 
      $statusClass = ($row['status'] === 'tertunda') ? 'bg-blue' : (($row['status'] === 'diterima') ? 'bg-green' : '');
      ?>
      
        <tr data-id="<?php echo $row['IdPermohonan']; ?>">
            <td>
                <span class="user-subhead" id="NoMatrik"><?php echo $row['NoMatrik']; ?></span>
            </td>
            <td id="nama"><?php echo $row['nama']; ?></td>
            <td class="text-center">
            <span class="label <?php echo $statusClass; ?>"><?php echo $row['status']; ?></span>
            </td>
            <td id="jenisBantuan"><?php echo $row['jenisBantuan']; ?></td>
            <td class="table-link">
  <form action="updatePermohonan.php" method="POST">
    <input type="hidden" name="IdPermohonan" value="<?php echo $row['IdPermohonan']; ?>">
    <button type="submit" name="terima" class="text-info edit_btn">
      <span class="fa-stack">
        <i class="fa fa-square fa-stack-2x"></i>
        <i class="fa fa-check fa-stack-1x fa-inverse"></i>
      </span>
    </button>
    <a href="#" class="table-link danger">
      <span class="fa-stack">
        <i class="fa fa-square fa-stack-2x"></i>
        <i class="fa fa-trash-o fa-stack-1x fa-inverse" id="delete_btn"></i>
      </span>
    </a>
  </form>
</td>
        </tr>
    <?php } ?>
</tbody>
                        </table>
                    </div>
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
  // JavaScript code to handle sidebar collapse
  document.getElementById('sidebarCollapse').addEventListener('click', function () {
    const sidebar = document.getElementById('sidebar');
    sidebar.classList.toggle('collapsed');
  });
</script>

  </body>
</html>