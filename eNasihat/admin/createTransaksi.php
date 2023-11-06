<?php
session_start();
include "../database.php";
$noMatrik = $_SESSION['NoMatrik'];
$sql = "SELECT NoMatrik, jenisBantuan FROM permohonan WHERE status = 'diterima'";
$result = $conn->query($sql);
$matrikBantuanOptions = '';
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Generate option tags for each "NoMatrik" and "jenisBantuan" value
        $matrikBantuanOptions .= "<option value='" . $row['NoMatrik'] . "'>" . $row['NoMatrik'] . " - " . $row['jenisBantuan'] . "</option>";
    }
}
?>
<!DOCTYPE html>
<head>
<title>Transaksi</title>
<link rel="shortcut icon" href="../img/logo.png" type="favicon-bebrainy">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="css/createTransaksi.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<div class="container">
  <div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-5">
      <div class="card cardbox">
        <div class="card-header"><b>Tambah Transaksi Baharu</b></div>
        <div class="card-body">
      
         
          
          <div class="form-group">
            
            <form action="crudTransaksi.php" method="POST">

            <div class="form-group">
    <label class="sr-only">No Matrik Pelajar</label>
    <select id="NoMatrik" name="NoMatrik" class="form-control" required>
        <?php echo $matrikBantuanOptions; ?>
    </select>
</div>

<div class="form-group">
    <label class="sr-only">Jenis Bantuan</label>
    <!-- Make sure the "jenisBantuan" field is readonly, so the user cannot edit it directly -->
    <input type="text" id="jenisBantuan" name="jenisBantuan" class="form-control" placeholder="Jenis Bantuan" readonly>
</div>

<script>
    // Add event listener to the "NoMatrik" dropdown
    document.getElementById('NoMatrik').addEventListener('change', function () {
        // Get the selected option
        var selectedOption = this.options[this.selectedIndex];
        
        // Extract the "NoMatrik" and "jenisBantuan" values from the selected option's text
        var optionText = selectedOption.text;
        var noMatrik = optionText.split(' - ')[0];
        var jenisBantuan = optionText.split(' - ')[1];
        
        // Fill the "NoMatrik" field with the extracted "NoMatrik" value
        document.getElementById('NoMatrik').value = noMatrik;
        
        // Fill the "jenisBantuan" field with the extracted "jenisBantuan" value
        document.getElementById('jenisBantuan').value = jenisBantuan;
    });
</script>


              

              <div class="form-group">
                <label class="sr-only">ID Staff</label>
                <input type="text" id="IdStaff" name="IdStaff" class="form-control" value="<?php echo $noMatrik; ?>" placeholder="ID Staff" readonly>
              </div>
            
              <div class="form-group">
                <label class="sr-only">Jumlah Transaksi</label>
                <input type="text" id="amaun" name="amaun" class="form-control" 
				value="" placeholder="Jumlah Transaksi (RM)">
              </div>

		
       
              <!-- Submit -->
              <div class="form-group">
                <button type="submit" id="simpan_btn" name="submit"  class="btn btn-block btn-primary">Simpan</button>
              </div>
             
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
</body>
</html>