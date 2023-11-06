<?php
include_once '../database.php';

if (isset($_POST['send_btn'])) {
    // Check if the user is logged in and NoMatrik is set in the session
    if (isset($_SESSION['NoMatrik'])) {
        $NoMatrik = $_SESSION['NoMatrik'];
        
        try {
            $stmt = $connect->prepare("INSERT INTO mesej(IdMesej, NoMatrik, IdKaunselor, perkara, kandungan) VALUES(:bid, :NoMatrik, :IdKaunselor, :perkara, :kandungan)");
  
            $bid = uniqid();
            $selectedKaunselor = $_POST['selectedKaunselorId'];
            $perkara = $_POST['perkara'];
            $kandungan = $_POST['kandungan'];
            
            if ($selectedKaunselor == "1") {
                $IdKaunselor = "K129345";
            } elseif ($selectedKaunselor == "2") {
                $IdKaunselor = "K164321";
            } elseif ($selectedKaunselor == "3") {
                $IdKaunselor = "K188366";
            } elseif ($selectedKaunselor == "4") {
                $IdKaunselor = "K145789";
            } elseif ($selectedKaunselor == "5") {
                $IdKaunselor = "K166321";
            } else {
                $IdKaunselor = ""; // Handle the case where no Kaunselor is selected or the ID retrieval fails
            }

            $stmt->bindParam(':bid', $bid, PDO::PARAM_STR);
            $stmt->bindParam(':NoMatrik', $NoMatrik, PDO::PARAM_STR);
            $stmt->bindParam(':IdKaunselor', $IdKaunselor, PDO::PARAM_STR);
            $stmt->bindParam(':perkara', $perkara, PDO::PARAM_STR);
            $stmt->bindParam(':kandungan', $kandungan, PDO::PARAM_STR);
            
            $stmt->execute();
            echo "<script>alert('Mesej berjaya dihantar!');document.location='mesejUser.php'</script>";
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
        echo "NoMatrik tidak dijumpai di dalam sesi. Sila pastikan pengguna telah disahkan.";
    }
}
?>
