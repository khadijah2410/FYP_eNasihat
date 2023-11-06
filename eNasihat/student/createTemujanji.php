<?php
include_once '../database.php';

if (isset($_POST['book_btn'])) {
    // Check if the user is logged in and NoMatrik is set in the session
    if (isset($_SESSION['NoMatrik'])) {
        $NoMatrik = $_SESSION['NoMatrik'];
        
        try {
            $stmt = $connect->prepare("INSERT INTO temujanji(IdSesi, NoMatrik, Nama, NoTel, Kaunselor, Tarikh, Masa) VALUES(:bid, :NoMatrik, :Nama, :NoTel, :Kaunselor, :Tarikh, :Masa)");
  
            $stmt->bindParam(':bid', $bid, PDO::PARAM_STR);
            $stmt->bindParam(':NoMatrik', $NoMatrik, PDO::PARAM_STR);
            $stmt->bindParam(':Nama', $Nama, PDO::PARAM_STR);
            $stmt->bindParam(':NoTel', $NoTel, PDO::PARAM_STR);
            $stmt->bindParam(':Kaunselor', $Kaunselor, PDO::PARAM_STR);
            $stmt->bindParam(':Tarikh', $Tarikh, PDO::PARAM_STR);
            $stmt->bindParam(':Masa', $Masa, PDO::PARAM_STR);
            
            $bid = uniqid();
            //$NoMatrik = $_POST['NoMatrik'];
            $Nama = $_POST['Nama'];
            $NoTel = $_POST['NoTel'];
            
            // Retrieve the Kaunselor ID based on the selected Kaunselor name
            $selectedKaunselor = $_POST['selectedKaunselorId'];
        
            if ($selectedKaunselor == "1") {
                $Kaunselor = "K129345";
            } elseif ($selectedKaunselor == "2") {
                $Kaunselor = "K164321";
            } elseif ($selectedKaunselor == "3") {
                $Kaunselor = "K188366";
            } elseif ($selectedKaunselor == "4") {
                $Kaunselor = "K145789";
            } elseif ($selectedKaunselor == "5") {
                $Kaunselor = "K166321";
            } else {
                $Kaunselor = ""; // Handle the case where no Kaunselor is selected or the ID retrieval fails
            }
            
            $Tarikh = $_POST['Tarikh'];
            $jam = $_POST['jam'];
            $minit = $_POST['minit'];
            $Masa = $jam . ':' . $minit;
            
            $stmt->execute();
            echo "<script>alert('Tempahan berjaya dibuat!');document.location='temujanjiDetails.php'</script>";
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
        echo "NoMatrik tidak dijumpai di dalam sesi. Sila pastikan pengguna telah disahkan.";
    }
}
?>
