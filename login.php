<?php
include('global/config.php');
include("global/conexion.php");

// Recuperación de los datos del formulario
if (isset($_POST['submit'])) {
  $username = $_POST['email'];
  $password = $_POST['password'];
  
  // Consulta para verificar si el usuario y la contraseña coinciden
  $sql = "SELECT * FROM usuario WHERE email='$username' AND password='$password'";

  $result = $pdo->query($sql);
  
  // Comprobación del resultado de la consulta
  if ($result->rowCount() == 1) {
    // Inicio de sesión exitoso
    session_start();
    $user=$result->fetch(PDO::FETCH_ASSOC);

    $_SESSION['id']=$user["id"];
    $_SESSION['email']=$user["email"];
    $_SESSION['password'] = $password;
    $_SESSION['nombre_de_usuario'] = $user['email'];
      
    header("Location: index.php"); // Redirige a la página principal
    exit();
  } else {
    // Inicio de sesión fallido
    echo "Usuario o contraseña incorrectos";
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</head>
<body>
<!-- Section: Design Block -->
<section class="text-center text-lg-start">
  <style>
    .cascading-right {
      margin-right: -50px;
    }

    @media (max-width: 991.98px) {
      .cascading-right {
        margin-right: 0;
      }
    }
  </style>

  <!-- Jumbotron -->
  <div class="container py-4">
    <div class="row g-0 align-items-center">
      <div class="col-lg-6 mb-5 mb-lg-0">
        <div class="card cascading-right" style="
            background: hsla(0, 0%, 100%, 0.55);
            backdrop-filter: blur(30px);
            ">
          <div class="card-body p-5 shadow-5 text-center">
            <h2 class="fw-bold mb-5">Login</h2>

            <form action="libros.php" method="post">
             

              <!-- Email input -->
              <div class="form-outline mb-4">
                <input type="email" id="form3Example3" name="email" class="form-control" />
                <label class="form-label" for="form3Example3">Email </label>
              </div>

              <!-- Password input -->
              <div class="form-outline mb-4">
                <input type="password" id="form3Example4" name="password" class="form-control" />
                <label class="form-label" for="form3Example4">Password</label>
              </div>

              <!-- Checkbox -->
              <div class=" d-flex justify-content-center mb-4">
                <a href="register.php">Regístrate</a>
                
              </div>

              <!-- Submit button -->
              <button type="submit" class="btn btn-primary btn-block mb-4">
                Entrar
              </button>

              
            </form>
          </div>
        </div>
      </div>

      <div class="col-lg-6 mb-5 mb-lg-0">
        <img src="./img/toa-heftiba-ip9R11FMbV8-unsplash.jpg" class="w-100 rounded-4 shadow-4"
          alt="" />
      </div>
    </div>
  </div>
  <!-- Jumbotron -->
</section>
<!-- Section: Design Block -->
</body>
</html>