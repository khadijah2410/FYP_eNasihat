<?php
session_start();
include '../database.php';
?>


<!doctype html>
<html lang="en">
  <head>
  	<title>Transaksi</title>
    <link rel="shortcut icon" href="../img/logo.png" type="favicon-bebrainy">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/kewanganTransaksi.css">
   
    
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
        }

        // Close the statement
        $stmt->close();
    ?> </div>
	  				<h3><?php  echo "{$_SESSION["name"]}"; ?></h3>
	  			</div>
	  		</div>
        <ul class="list-unstyled components mb-5">
          <li> 
            <a href="kewanganAdmin.php"><span class="fa fa-file mr-3"></span>Senarai Permohonan</a>
          </li>
          <li class="active"> 
            <a href="#"><span class="fa fa-money mr-3"></span>Senarai Transaksi</a>
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
            <!-- Add the "Transaksi Baru" button here -->
            <a href="createTransaksi.php" class="btn btn-primary" style="float: right; margin-left: 10px;">Transaksi Baru</a>
        </div>
    </div>
	<div class="row">
	<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                
                <th>ID Transaksi</th>
                <th>Nama Pelajar</th>
                <th>Nama Staff</th>
                <th>Amaun (RM)</th>
                <th>Jenis Bantuan</th>
                <th>Tarikh</th>
                
            </tr>
        </thead>
        <tbody>
    <?php
    // Retrieve data from the 'transaksi' table
    $query = "SELECT t.IdTransaksi, p.nama AS NamaPelajar, s.nama AS NamaStaff, t.amaun, t.jenisBantuan, DATE_FORMAT(t.tarikh, '%d-%m-%Y') AS tarikh
    FROM transaksi t
    INNER JOIN pelajar p ON t.NoMatrik = p.NoMatrik
    INNER JOIN staff s ON t.IdStaff = s.IdStaff";
    $result = $conn->query($query);

    // Check if there are any rows returned from the query
    if ($result->num_rows > 0) {
        // Loop through the results and generate table rows
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row['IdTransaksi'] . '</td>';
            echo '<td>' . $row['NamaPelajar'] . '</td>';
            echo '<td>' . $row['NamaStaff'] . '</td>';
            echo '<td>' . $row['amaun'] . '</td>';
            echo '<td>' . $row['jenisBantuan'] . '</td>';
            echo '<td>' . $row['tarikh'] . '</td>';
            echo '</tr>';
        }
    } else {
        // If no data is available, display a message or handle it accordingly
        echo '<tr><td colspan="6">Tiada data.</td></tr>';
    }

    // Close the database connection
    $conn->close();
    ?>
</tbody>
    </table>
	</div>
</div>
        
</div>

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    
    <script src="js/main.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<script>
  // JavaScript code to handle sidebar collapse
  document.getElementById('sidebarCollapse').addEventListener('click', function () {
    const sidebar = document.getElementById('sidebar');
    sidebar.classList.toggle('collapsed');
  });

  $(document).ready(function() {
    $('#example').DataTable(
        
         {     

      "aLengthMenu": [[5, 10, 25, -1], [5, 10, 25, "All"]],
        "iDisplayLength": 5,
        "info": true,
       } 
        );
} );

</script>

  </body>
</html>