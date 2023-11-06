<?php
session_start();
include_once '../database.php';

// Check if the update button is clicked
if (isset($_POST['update_btn'])) {
    // Retrieve the current session user's NoMatrik
    $noMatrik = $_SESSION['NoMatrik'];

    // Retrieve the updated information from the form
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $kolej = $_POST['kolej'];
    $fakulti = $_POST['fakulti'];

    // Handle profile picture upload
    if ($_FILES['profile_picture']['error'] === UPLOAD_ERR_OK) {
        $tmpFilePath = $_FILES['profile_picture']['tmp_name'];

        // Read the contents of the uploaded file
        $imageData = file_get_contents($tmpFilePath);

        // Prepare the SQL statement with a placeholder for the image data
        $query = "UPDATE pelajar SET nama = ?, email = ?, password = ?, kolej = ?, fakulti = ?, image = ? WHERE NoMatrik = ?";
        $stmt = $conn->prepare($query);

        if ($stmt) {
            // Bind parameters to the prepared statement
            $stmt->bind_param("sssssss", $nama, $email, $password, $kolej, $fakulti, $imageData, $noMatrik);

            // Execute the SQL statement
            if ($stmt->execute()) {
                // Update successful in 'pelajar' table

                // Update the 'users' table
                $queryUsers = "UPDATE users SET name = ?, email = ?, password = ? WHERE NoMatrik = ?";
                $stmtUsers = $conn->prepare($queryUsers);

                if ($stmtUsers) {
                    // Bind parameters to the prepared statement
                    $stmtUsers->bind_param("ssss", $nama, $email, $password, $noMatrik);

                    // Execute the SQL statement for 'users' table
                    if ($stmtUsers->execute()) {
                        // Update successful in 'users' table
                        echo "<script>alert('Berjaya dikemaskini!');document.location='kemaskiniProfil.php'</script>";
                    } else {
                        // Update failed in 'users' table
                        echo "<script>alert('Gagal mengemaskini profil. Sila cuba lagi.');document.location='error.php'</script>";
                    }

                    // Close the statement for 'users' table
                    $stmtUsers->close();
                } else {
                    // Prepare statement failed for 'users' table
                    echo "<script>alert('Gagal mengemaskini profil. Sila cuba lagi.')</script>";
                }
            } else {
                // Update failed in 'pelajar' table
                echo "<script>alert('Maaf, terdapat masalah semasa memuat naik gambar.');document.location='error.php'</script>";
            }

            // Close the statement for 'pelajar' table
            $stmt->close();
        } else {
            // Prepare statement failed for 'pelajar' table
            echo "<script>alert('Maaf, terdapat masalah semasa memuat naik gambar.');document.location='kemaskiniProfil.php'</script>";
        }
    } else {
        // No profile picture uploaded or an error occurs

        // Prepare the SQL statement without the 'image' column
        $query = "UPDATE pelajar SET nama = ?, email = ?, password = ?, kolej = ?, fakulti = ? WHERE NoMatrik = ?";
        $stmt = $conn->prepare($query);

        if ($stmt) {
            // Bind parameters to the prepared statement
            $stmt->bind_param("ssssss", $nama, $email, $password, $kolej, $fakulti, $noMatrik);

            // Execute the SQL statement
            if ($stmt->execute()) {
                // Update successful in 'pelajar' table

                // Update the 'users' table
                $queryUsers = "UPDATE users SET name = ?, email = ?, password = ? WHERE NoMatrik = ?";
                $stmtUsers = $conn->prepare($queryUsers);

                if ($stmtUsers) {
                    // Bind parameters to the prepared statement
                    $stmtUsers->bind_param("ssss", $nama, $email, $password, $noMatrik);

                    // Execute the SQL statement for 'users' table
                    if ($stmtUsers->execute()) {
                        // Update successful in 'users' table
                        echo "<script>alert('Berjaya dikemaskini!');document.location='kemaskiniProfil.php'</script>";
                    } else {
                        // Update failed in 'users' table
                        echo "<script>alert('Gagal mengemaskini profil. Sila cuba lagi.');document.location='error.php'</script>";
                    }

                    // Close the statement for 'users' table
                    $stmtUsers->close();
                } else {
                    // Prepare statement failed for 'users' table
                    echo "<script>alert('Gagal mengemaskini profil. Sila cuba lagi.')</script>";
                }
            } else {
                // Update failed in 'pelajar' table
                echo "<script>alert('Gagal mengemaskini profil.');document.location='error.php'</script>";
            }

            // Close the statement for 'pelajar' table
            $stmt->close();
        } else {
            // Prepare statement failed for 'pelajar' table
            echo "<script>alert('Gagal mengemaskini profil.')</script>";
        }
    }
}
?>
