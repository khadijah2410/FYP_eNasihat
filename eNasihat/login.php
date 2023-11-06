<?php

include_once 'database.php';

session_start();

if(isset($_POST['submit'])) {

    try {
      $NoMatrik = $_POST['NoMatrik'];
      $password = $_POST['password'];
      
    
      $stmt = mysqli_query($conn, "SELECT * from users WHERE NoMatrik = '$NoMatrik' AND password = '$password' ");
      $row = mysqli_fetch_array($stmt);

      $stmt2 = mysqli_query($conn, "SELECT * from users WHERE NoMatrik = '$NoMatrik' AND password = '$password' ");
      $count = mysqli_num_rows($stmt2);


      if($count==0){
         echo "<script>alert('Maaf, kata nama atau kata laluan anda salah.');</script>";
      }
      elseif($count==1){
        $_SESSION["NoMatrik"]=$row['NoMatrik'];
        $_SESSION["email"]=$row['email'];
        $_SESSION["name"]=$row['name'];
        $_SESSION["password"]=$row['password'];
        $_SESSION["type"]=$row['type'];

        if ($_SESSION["type"] == 0) {
          echo "<script>alert('Selamat Datang {$_SESSION['name']}! Anda berjaya log masuk!');document.location='menu.php'</script>";
        }
        else if ($_SESSION["type"] == 1){
            echo "<script>alert('Selamat Datang {$_SESSION['name']}! Anda berjaya mengelog masuk!');document.location='admin/temujanjiAdmin.php'</script>";
        }
        else{
          echo "<script>alert('Selamat Datang {$_SESSION['name']}! Anda berjaya mengelog masuk!');document.location='admin/kewanganAdmin.php'</script>";
        }
      }
      
     
    
  }
  catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
}}

?>