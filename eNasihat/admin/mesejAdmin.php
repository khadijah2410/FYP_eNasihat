<?php
session_start();
include_once '../database.php';
// Retrieve data from the database
try {
    $stmt = $connect->prepare("SELECT * FROM temujanji");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

?>

<!doctype html>
<html lang="en">
<head>
    <title>Mesej</title>
    <link rel="shortcut icon" href="../img/logo.png" type="favicon-bebrainy">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/mesejAdmin.css">
</head>
<body>
    <div class="wrapper d-flex">
    <nav id="sidebar">
    <div class="img bg-wrap text-center py-4" style="background-image: url(../img/adminbg.png);">
          <div class="user-logo">
            <div class="img" id="user_img">
              <?php
              // Retrieve the current session user's NoMatrik
              $noMatrik = $_SESSION['NoMatrik'];

              // Retrieve the image data from the 'pelajar' table
              $query = "SELECT image FROM kaunselor WHERE IdKaunselor = ?";
              $stmt = $conn->prepare($query);
              $stmt->bind_param("s", $noMatrik);
              $stmt->execute();
              $stmt->store_result();

              // Check if the user has an image
              if ($stmt->num_rows > 0) {
                  $stmt->bind_result($imageData);
                  $stmt->fetch();

                  // Display the user's image
                  echo '<div class="img" style="background-image: url(data:image/jpeg;base64,'.base64_encode($imageData).')"></div>';
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
            <a href="temujanjiAdmin.php"><span class="fa fa-calendar mr-3"></span>Tempahan temujanji</a>
          </li>
          <li>
            <a href="senaraiTemujanjiAdmin.php"><span class="fa fa-list mr-3 "></span>Senarai Temujanji</a>
          </li>
          <li class="active">
            <a href="#"><span class="fa fa-inbox mr-3"></span>Mesej</a>
          </li>
          
          <li>
            <a href="../logout.php"><span class="fa fa-arrow-left mr-3 "></span>Log Keluar</a>
          </li>
        </ul>
      </nav>

        <!-- Page Content  -->
        <div class="container">
            <div class="row">
                <div class="chat_container">
                    <div class="job-box">
                        <div class="job-box-filter">
                        <div class="row">
                  <div class="col-md-6 col-sm-6">
                    <label>Show
                      <select name="datatable_length" class="form-control input-sm">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                      </select>
                      entries
                    </label>
                  </div>
                  <div class="col-md-6 col-sm-6">
                    <div class="filter-search-box text-right">
                      <label>Search:
                        <input type="search" class="form-control input-sm" placeholder="">
                      </label>
                    </div>
                  </div>
                </div>
                        </div>
                        <div class="inbox-message">
                            <?php
                            // Retrieve the message data from the 'mesej' table
                            try {
                                $stmt = $connect->prepare("SELECT m.perkara, m.kandungan, p.nama, p.image, p.email
                                FROM mesej m
                                INNER JOIN kaunselor k ON m.IdKaunselor = k.IdKaunselor
                                INNER JOIN pelajar p ON m.NoMatrik = p.NoMatrik
                                WHERE k.IdKaunselor = :noMatrik");
                                 $stmt->bindParam(':noMatrik', $_SESSION['NoMatrik']);
                                $stmt->execute();
                                $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            } catch (PDOException $e) {
                                echo "Error: " . $e->getMessage();
                            }
                            ?>

                            <ul>
                                <?php foreach ($messages as $message): ?>
                                    <li>
                                        <a href="#" onclick="openMessageDetails('<?php echo $message['perkara']; ?>', '<?php echo $message['kandungan']; ?>', '<?php echo $message['email']; ?>'); return false;">
                                            <div class="message-avatar">
                                                <?php if ($message['image']): ?>
                                                    <img src="data:image/jpeg;base64,<?php echo base64_encode($message['image']); ?>" alt="">
                                                <?php else: ?>
                                                    <img src="../img/anon.png" alt="">
                                                <?php endif; ?>
                                            </div>
                                            <div class="message-body">
                                                <div class="message-body-heading">
                                                    <h5><?php echo $message['perkara']; ?> <span class="unread">Unread</span></h5>
                                                </div>
                                                <p><?php echo $message['kandungan']; ?></p>
                                                <p>-<b> <?php echo $message['nama']; ?></b>-</p>
                                            </div>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
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
    <script>
        function openMessageDetails(perkara, kandungan, email) {
            window.open("mesejDetails.php?perkara=" + encodeURIComponent(perkara) + "&kandungan=" + encodeURIComponent(kandungan) + "&email=" + encodeURIComponent(email), "_blank", "width=500,height=400");
        }
    </script>
</body>
</html>
