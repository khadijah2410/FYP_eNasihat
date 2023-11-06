<?php
include '../database.php';

// Retrieve the IdSesi parameter from the URL
$IdSesi = $_GET['IdSesi'];


// Retrieve data for the specified IdSesi and populate the inputs in the popup
try {
  // Prepare and execute the query to fetch the card data
  $stmt = $connect->prepare("SELECT Tarikh, Masa FROM temujanji WHERE IdSesi = ?");
  $stmt->bindParam(1, $IdSesi);
  $stmt->execute();

  // Fetch the card data
  $cardData = $stmt->fetch(PDO::FETCH_ASSOC);

  // Check if card data exists for the given IdSesi
  if ($cardData) {
    $tarikh = $cardData['Tarikh'];
    $masa = $cardData['Masa'];
  } else {
    // Handle case when card data is not found
    echo "Card data not found.";
    exit;
  }
} catch (PDOException $e) {
  echo "Error: " . $e->getMessage();
  exit;
}

// Check if the form is submitted
if (isset($_POST['kemaskini_btn'])) {
  $IdSesi = $_POST['IdSesi'];
  echo "IdSesi: " . $IdSesi;
  $newTarikh = $_POST['Tarikh']; // Assuming you have a form field with the name 'newTarikh'
  $newMasa = $_POST['Masa']; // Assuming you have a form field with the name 'newMasa'

  // Update the 'Tarikh' and 'Masa' attributes in the database
  try {
      $stmt = $connect->prepare("UPDATE temujanji SET Tarikh = :newTarikh, Masa = :newMasa WHERE IdSesi = :IdSesi");
      $stmt->bindParam(':newTarikh', $newTarikh);
      $stmt->bindParam(':newMasa', $newMasa);
      $stmt->bindParam(':IdSesi', $IdSesi);
      $stmt->execute();

      // Redirect to a specific page after the update
      header("Location: temujanjiAdmin.php"); // Replace "success.php" with the desired page
      exit; // Terminate the current script execution
  } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" href="css/editTemujanji.css">
</head>
<body>
  
<div id="editTemujanjiPopup">
  <div class="card"> 
    <div class="info"> 
      <span>Kemaskini maklumat</span>
    </div> 
    <div class="forms">
      <form action="" method="POST">
        <div class="inputs">
          <span>Tarikh</span>
          <input type="text" name="Tarikh" value="<?php echo $tarikh; ?>">
        </div>
        <div class="inputs">
          <span>Masa</span>
          <input type="text" name="Masa" value="<?php echo $masa; ?>">
        </div>
        <!-- Add more fields as needed -->
        <input type="submit" value="Kemaskini" name="kemaskini_btn">
      </form>
    </div>
  </div>
</div>

<script>
  console.log("JavaScript code in editTemujanji.php");
</script>
</body>
</html>
