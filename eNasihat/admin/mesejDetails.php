<?php
include '../database.php';

$perkara = $_GET['perkara'];
$kandungan = $_GET['kandungan'];
$email = $_GET['email'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Mesej</title>
    <link rel="shortcut icon" href="../img/logo.png" type="favicon-bebrainy">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/mesejDetails.css">
    
    <style>
        .container {
            margin-left: 20px;
        }
        
        .email-link {
            color: blue;
            text-decoration: underline;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container d-flex justify-content-center mt-5">
        <div class="card">
            <div class="d-flex justify-content-center pt-5">
                <h4 class="head">Mesej</h4>
            </div>
            <div class="form-group">
                <label><span class="fa fa-list-alt"></span><b> Perkara:</b></label>
                <p><?php echo $perkara; ?></p>
            </div>
            <div class="form-group">
                <label><span class="fa fa-inbox"></span><b> Kandungan:</b></label>
                <p><?php echo $kandungan; ?></p>
            </div>
            <div class="form-group">
                <label><span class="fa fa-at"></span><b> Emel Pelajar:</b></label>
                <p class="email-link" onclick="composeEmail('<?php echo $email; ?>')"><?php echo $email; ?></p>
            </div>
        </div>
    </div>

    <script>
        function composeEmail(email) {
            var emailBody = "Merujuk kepada mesej yang telah pelajar hantar.";

            // Replace the URL below with your mailbox URL
            var mailboxURL = 'https://mail.google.com/mail/?view=cm&fs=1&to=' + encodeURIComponent(email) + '&body=' + encodeURIComponent(emailBody);
            window.open(mailboxURL, '_blank');
        }
    </script>
</body>
</html>

