<!doctype html>
<html lang="en">
<head>
    <title>Maklumat Temujanji</title>
    <link rel="shortcut icon" href="../img/logo.png" type="favicon-bebrainy">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/temujanjiDetails.css">
</head>
<body>

<?php
session_start();
include '../database.php';

// Retrieve the current session user's identifier
$noMatrik = $_SESSION['NoMatrik'];

if (isset($_GET['cancel'])) {
    $IdSesi = $_GET['cancel'];

    // Prepare and execute the SQL query to delete the appointment
    $query = "DELETE FROM temujanji WHERE IdSesi = ?";
    $stmt = $conn->prepare($query);

    if (!$stmt) {
        // Error handling for query preparation
        die("Error: " . $conn->error);
    }

    $stmt->bind_param("s", $IdSesi);
    $result = $stmt->execute();

    if (!$result) {
        // Error handling for query execution
        die("Error: " . $stmt->error);
    }

    // Redirect the user to the same page to update the appointment list
    header("Location: temujanjiDetails.php");
    exit();
}

// Prepare and execute the SQL query
$query = "SELECT t.Tarikh, k.nama, t.Masa, k.email, t.Status, t.IdSesi
          FROM temujanji t
          INNER JOIN kaunselor k ON t.Kaunselor = k.IdKaunselor
          WHERE t.NoMatrik = ?";
$stmt = $conn->prepare($query);

if (!$stmt) {
    // Error handling for query preparation
    die("Error: " . $conn->error);
}

$stmt->bind_param("s", $noMatrik);
$result = $stmt->execute();

if (!$result) {
    // Error handling for query execution
    die("Error: " . $stmt->error);
}

$result = $stmt->get_result();
?>

<div class="wrapper d-flex align-items-stretch">
    <nav id="sidebar">
        <div class="custom-menu">
            <button type="button" id="sidebarCollapse" class="btn btn-primary"> 
            </button>
        </div>
        <div class="img bg-wrap text-center py-4" style="background-image: url(../img/counselling.png);">
            <div class="user-logo">
                <div class="img" id="user_img">
                    <?php
                    // Retrieve the current session user's NoMatrik
                    // $noMatrik = $_SESSION['NoMatrik'];

                    // Retrieve the image data from the 'pelajar' table
                    $query = "SELECT image FROM pelajar WHERE NoMatrik = ?";
                    $stmt = $conn->prepare($query);
                    $stmt->bind_param("s", $noMatrik);
                    $stmt->execute();
                    $stmt->store_result();

                    // Check if the user has an image
                    if ($stmt->num_rows > 0) {
                        $stmt->bind_result($imageData);
                        $stmt->fetch();

                        // Display the user's image
                        echo '<div class="img" style="background-image: url(data:image/jpeg;base64,' . base64_encode($imageData) . ')"></div>';
                    } else {
                        // User does not have an image, display a default image
                        echo '<div class="img" style="background-image: url(../img/anon.png);"></div>';
                    }

                    // Close the statement
                    $stmt->close();
                    ?>
                </div>
                <h3><?php echo "{$_SESSION["name"]}"; ?></h3>
            </div>
        </div>
        <ul class="list-unstyled components mb-5">
            <li>
                <a href="counsellingUser.php"><span class="fa fa-handshake-o mr-3"></span>Kaunseling Sistem</a>
            </li>
            <li>
                <a href="mesejUser.php"><span class="fa fa-inbox mr-3 notif"><small class="d-flex align-items-center justify-content-center">5</small></span>Mesej</a>
            </li>
            <li class="active">
                <a href="temujanjiUser.php"><span class="fa fa-calendar mr-3"></span>Temujanji</a>
            </li>
            <li>
                <a href="kewanganUser.php"><span class="fa fa-dollar mr-3"></span>Permohonan Bantuan</a>
            </li>
            <li>
                <a href="kemaskiniProfil.php"><span class="fa fa-user mr-3"></span>Kemaskini Profil</a>
            </li>
            <li>
                <a href="../logout.php"><span class="fa fa-arrow-left mr-3 "></span>Log Keluar</a>
            </li>
        </ul>
    </nav>

    <!-- Page Content  -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-white mb-5">
                    <div class="card-heading clearfix border-bottom mb-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title"><b>Maklumat Temujanji</b></h5>
                            <a href="temujanjiUser.php" class="btn btn-primary" style="background-color: #7e94a1; margin-bottom: 8px">Permohonan Baru</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <?php
                        // Check if there are any rows returned by the query
                        if (mysqli_num_rows($result) === 0) {
                            echo "<p>Tiada tempahan temujanji dilakukan</p>";
                        } else {
                            echo '<ul class="list-unstyled">';
                            // Iterate over the retrieved rows
                            while ($row = mysqli_fetch_assoc($result)) {
                                $tarikh = date('d/m/Y', strtotime($row['Tarikh']));
                                $nama = $row['nama'];
                                $masa = date("h:i A", strtotime($row['Masa']));
                                $status = $row['Status'];
                                $email = $row['email'];
                                ?>

                                <li class="position-relative booking">
                                <div class="media-body">
                        <h5 class="mb-4" name="nama"><?php echo $nama; ?><span class="badge <?php echo $status === 'Terima' ? 'badge-success' : 'badge-primary'; ?> mx-3">
                <?php echo $status; ?>
            </span></h5>
                        <div class="mb-3">
                            <span class="mr-2 d-block d-sm-inline-block mb-2 mb-sm-0"><b>Tarikh temujanji:</b></span>
                            <span class="Tarikh" name="Tarikh"><?php echo $tarikh; ?></span>
                        </div>
                        <div class="mb-3">
                            <span class="mr-2 d-block d-sm-inline-block mb-2 mb-sm-0"><b>Masa temujanji:</b></span>
                            <span class="Masa" name="Masa"><?php echo $masa; ?></span>
                        </div>
                        <div class="mb-3">
                            <span class="mr-2 d-block d-sm-inline-block mb-2 mb-sm-0"><b>Emel kaunselor:</b></span>
                            <span class="email" name="email"><?php echo $email; ?></span>
                        </div>
                    </div>
                    <div class="buttons-to-right">
                    <a href="temujanjiDetails.php?cancel=<?php echo $row['IdSesi']; ?>" class="btn-gray mr-2" type="submit"><i class="fa fa-times-circle mr-2"></i>Cancel</a>
                    </div>
                                </li>

                            <?php
                            }
                            echo '</ul>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="js/jquery.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>

</body>
</html>
