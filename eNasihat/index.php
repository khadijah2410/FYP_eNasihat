<?php
include 'login.php';

if (!isset($_SESSION)) {
	session_start();
}
?>


<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Log Masuk</title>
        
        <link rel="icon" type="image/x-icon" href="img/logo.png">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!--Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Styles -->
        <link href="index.css" rel="stylesheet">
    </head>
    </html>

<div class="container px-4 py-5 mx-auto">
    <div class="card card0">
        <div class="d-flex flex-lg-row flex-column-reverse">
            <div class="card card1">
                <div class="row justify-content-center my-auto">
                    <div class="col-md-8 col-10 my-5">
                        <div class="row justify-content-center px-3 mb-3">
                            <img id="logo" src="img/home.png">
                        </div>
                        <h3 class="mb-5 text-center heading" style="font-family: Lucida Bright">eNasihat</h3>

                        <form action="#" method="POST">

                        <div class="form-group">
                            <label class="form-control-label text-muted">Kata Nama</label>
                            <input type="text" id="NoMatrik" name="NoMatrik" placeholder="" class="form-control">
                        </div>

                        <div class="form-group">
                            <label class="form-control-label text-muted">Kata Laluan</label>
                            <input type="password" id="password" name="password" placeholder="" class="form-control">
                        </div>

                        <div class="row justify-content-center my-3 px-3">
                            <button class="btn-block btn-color" type="submit" name="submit">Log Masuk</button>
                        </div>

                        <div class="row justify-content-center my-2">
                            <a href="#"><small class="text-muted">Lupa Kata Laluan?</small></a>
                        </div>
                    </div>
                </div>
                <div class="bottom text-center mb-5">
             <p href="" class="sm-text mx-auto mb-3">Tiada akaun?<a class="btn btn-white ml-2" id="daftar_btn" href="register.php">Daftar</a></p>
            </div>
            </div>
            <div class="card card2">
                <div class="my-auto mx-md-3 px-md-3 right" >
                <img src="img/main.png" alt="Image" class="img-fluid">
                    
                </div>
            </div>
        </div>
 </div>
</div>

