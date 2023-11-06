<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include '../database.php';

// Check if the form was submitted
if (isset($_POST['submit'])) {
    // Retrieve the form data
    $bid = uniqid();
    $NoMatrik = $_POST['NoMatrik'];
    $IdStaff = $_POST['IdStaff'];
    $amaun = $_POST['amaun'];
    $jenisBantuan = $_POST['jenisBantuan'];
    

    $query = "INSERT INTO transaksi (IdTransaksi, NoMatrik, IdStaff, amaun, jenisBantuan ) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    if (!$stmt) {
    die("Error during query preparation: " . $conn->error);
    }
    $stmt->bind_param("sssis", $bid, $NoMatrik, $IdStaff, $amaun, $jenisBantuan);
    
    if ($stmt->execute()) {
        echo "<script>alert('Data berjaya disimpan!');document.location='kewanganTransaksi.php'</script>";
    } else {
        // Error in data insertion
        // You can handle the error here, such as showing an error message
        echo "Error in data insertion: " . $conn->error;
    }

    // Close the statement
    $stmt->close();
}
?>