<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda Libros</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</head>
<body>
<header>
  <!-- Intro settings -->
  <style>
    /* Default height for small devices */
    #intro-example {
      height: 400px;
    }

    /* Height for devices larger than 992px */
    @media (min-width: 992px) {
      #intro-example {
        height: 600px;
      }
    }
    .text-white h1, .text-white h5 {
  text-shadow: 5px 5px 5px rgba(0, 0, 0, 0.5);
}
  </style>



  <!-- Background image -->
  <div
    id="intro-example"
    class="p-4 text-center bg-image  "
    style="background-image: url('./img/libros.jpg');background-repeat: no-repeat;
    background-position: center;     height: 750px; background-size: cover;"
  >
    <div class="mask text-center " >
      <div class="d-flex justify-content-center align-items-center h-100 ">
        <div class="text-white">
          <h1 class="mb-3">El libro que quieras a tu alcance</h1>
          <h5 class="mb-4">Fíjate un objetivo, lee un libro</h5>
        
          <a
            class="btn btn-outline-dark btn-lg m-2 text-white"
            href="libros.php"
            
            role="button"
          >Elige el que te guste</a
          >
        </div>
      </div>
    </div>
  </div>
  <!-- Background image -->
</header>
    
</body>
</html>