<!doctype html>
<html lang="en">
<head>
<title>Daftar</title>
<link rel="icon" type="image/x-icon" href="img/logo.png">

<link rel="stylesheet" href="register.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">

</head>

<body>

<form action="register_crud.php" method="POST">
<div class="container d-flex justify-content-center align-items-center">
    <div class="card">
        <div class="row">
            <div class="col-md-6">
                <div class="form">
                    <h2 style="font-family: Lucida Bright">Daftar Akaun</h2>
                    <div class="inputbox mt-3"> <span>Nama</span> <input type="text" placeholder="" name="name" id="name" class="form-control"> </div>
                    <div class="inputbox mt-3"> <span>No Matrik</span> <input type="text" placeholder="" name="NoMatrik" id="NoMatrik" class="form-control"> </div>
                    <div class="inputbox mt-3"> <span>Kata Laluan</span> <input type="password" placeholder="" name="password" id="password" class="form-control"> </div>
                    <div class="inputbox mt-3"> <span>Emel</span> <input type="text" placeholder="" name="email" id="email" class="form-control"> </div>
                   <!-- <div class="row">
                        <div class="col-md-6">
                            <div class="inputbox mt-3"> <span>Kolej</span> <input type="text" placeholder="" name="kolej" id="kolej" class="form-control"> </div>
                        </div>
                        <div class="col-md-6">
                            <div class="inputbox mt-3"> <span>Fakulti</span> <input type="text" placeholder="" name="fakulti" id="fakulti" class="form-control"> </div>
                        </div> 
                    </div> -->
                    <div class="form-check mt-2"> <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" > <label class="form-check-label" for="flexCheckChecked"> Saya bersetuju menerima terma dan syarat  <a href="" class="login">Privasi & Polisi</a> </label> </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="text-right"> <button class="btn btn-success register btn-block" name="daftar_btn" id="daftar_btn">Daftar</button> </div> <a href="../landingpage/index.php" class="login">Log Masuk</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="text-center mt-5"> <img src="img/register.png" width="400"> </div>
            </div>
        </div>
    </div>
</div>
</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>
</html>
