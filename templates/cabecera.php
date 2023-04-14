<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<style>
    .navbar-text {
    margin-right: 20px; /* ajusta el espacio entre el nombre de usuario y la marca de la tienda */
    font-size: 14px; /* ajusta el tamaño de fuente del nombre de usuario */
    font-weight: bold; /* ajusta el peso de fuente del nombre de usuario */
}
</style>
</head>
<body>



<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <a class="navbar-brand">Tienda Online</a>
    <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div id="my-nav" class="collapse navbar-collapse ">
        <ul class="navbar-nav mr-auto ">
            <li class="nav-item active">
                <a class="nav-link text-light" href="index.php"> Home </a>
            </li>
            <li class="nav-item active">
                <a class="nav-link text-light" href="mostrarCarrito.php" > Carrito (<?php echo (empty($_SESSION['CARRITO']))?0:count($_SESSION['CARRITO']) ;?>) </a>
            </li>
            <li class="nav-item active ">
                <a class="nav-link text-light" href="login.php"> Inicia Session</a>
            </li>
        </ul>
    </div>
    
</nav>
<br>
<br>
<div class="container">