<?php

include_once 'database.php';

if (isset($_POST['daftar_btn'])) {
    try {
        $stmtUsers = $connect->prepare("INSERT INTO users(name, NoMatrik, password) VALUES(:name, :NoMatrik, :password)");

        $NoMatrik = $_POST['NoMatrik'];
        $nama = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $stmtUsers->bindParam(':name', $nama, PDO::PARAM_STR);
        $stmtUsers->bindParam(':NoMatrik', $NoMatrik, PDO::PARAM_STR);
        $stmtUsers->bindParam(':password', $password, PDO::PARAM_STR);


        $stmtUsers->execute();

        if ($stmtUsers->rowCount() > 0) {
            $stmtPelajar = $connect->prepare("INSERT INTO pelajar(NoMatrik, nama, email, password) VALUES(:NoMatrik, :nama, :email, :password)");

            $stmtPelajar->bindParam(':NoMatrik', $NoMatrik, PDO::PARAM_STR);
            $stmtPelajar->bindParam(':nama', $nama, PDO::PARAM_STR);
            $stmtPelajar->bindParam(':email', $email, PDO::PARAM_STR);
            $stmtPelajar->bindParam(':password', $password, PDO::PARAM_STR);

            $stmtPelajar->execute();

            if ($stmtPelajar->rowCount() > 0) {
                echo "<script>alert('Pendaftaran berjaya!');document.location='landingpage/index.php'</script>";
            } else {
                // Handle error: Failed to insert into 'pelajar' table
                echo "<script>alert('Pendaftaran gagal!');document.location='error.php'</script>";
            }
        } else {
            // Handle error: Failed to insert into 'users' table
            echo "<script>alert('Pendaftaran gagal!');document.location='error.php'</script>";
        }

    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
