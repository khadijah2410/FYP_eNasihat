<?php
session_start();
include '../database.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the stored values from sessionStorage
    $selectedRadioButton = $_SESSION['selectedRadioButton'];
    $noMatrik = $_SESSION['noMatrik'];

    // Retrieve the form data
    $bid = uniqid();
    $namaBank = $_POST['namaBank'];
    $noAkaun = $_POST['noAkaun'];
    $tarikh = $_POST['tarikh'];
    $masa = $_POST['masa'];

    // Perform the database insertion
    $query = "INSERT INTO permohonan (IdPermohonan, NoMatrik, jenisBantuan,  noAkaun, tarikh, masa) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssiss",$bid, $noMatrik, $selectedRadioButton,  $noAkaun, $tarikh, $masa);
    $stmt->execute();

    // Close the statement
    $stmt->close();

    // Redirect to a success page or display a success message
    // header("Location: success.php");
    // exit();
}
?>
