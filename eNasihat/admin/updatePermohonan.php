<?php
session_start();
include '../database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['terima'])) {
    $IdPermohonan = $_POST['IdPermohonan'];

    // Update the status in the database
    $stmt = $conn->prepare("UPDATE permohonan SET status = 'diterima' WHERE IdPermohonan = ?");
    $stmt->bind_param("s", $IdPermohonan);

    if ($stmt->execute()) {
        // Status updated successfully
         header("Location: kewanganAdmin.php"); 
         exit();
    } else {
        // Failed to update status
        echo "Error updating status: " . mysqli_error($conn);
    }

    // Close the statement
    $stmt->close();
}
?>
