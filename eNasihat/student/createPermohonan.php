<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include '../database.php';

// Check if the form was submitted
if (isset($_POST['mohon_btn'])) {
    // Retrieve the form data
    $bid = uniqid();
    $jenisBantuan = $_POST['jenis-bantuan'];
    $namaBank = $_POST['namaBank'];
    $noAkaun = $_POST['noAkaun'];
    $noMatrik = $_SESSION['NoMatrik']; // Assuming this is the user's ID

    // Insert data into 'permohonan' table
    $query = "INSERT INTO permohonan (IdPermohonan, NoMatrik, noAkaun, namaBank, jenisBantuan ) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    if (!$stmt) {
    die("Error during query preparation: " . $conn->error);
    }
    $stmt->bind_param("ssiss", $bid, $noMatrik, $noAkaun, $namaBank, $jenisBantuan);
    
    if ($stmt->execute()) {
        // Data inserted successfully
        // You can perform any necessary action after successful insertion here
        // For example, redirect the user to a success page or display a success message
        echo "<script>alert('Permohonan berjaya dibuat!');document.location='kewanganUser.php'</script>";
    } else {
        // Error in data insertion
        // You can handle the error here, such as showing an error message
        echo "Error in data insertion: " . $conn->error;
    }

    // Close the statement
    $stmt->close();
}
?>
