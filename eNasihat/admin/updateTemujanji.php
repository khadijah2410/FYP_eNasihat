<?php

if (isset($_POST['terima_btn'])) {
    $IdSesi = $_POST['IdSesi']; // Assuming you have an 'id' column in your database table

    // Update the status in the database
    try {
        $stmt = $connect->prepare("UPDATE temujanji SET Status = 'Terima' WHERE IdSesi = :IdSesi");
        $stmt->bindParam(':IdSesi', $IdSesi);
        $stmt->execute();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

?>