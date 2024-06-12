<?php 

session_start();

if (isset($_SESSION['user'])) {

 ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lengua de señas (LSM)</title>
  <link rel="stylesheet" href="styles.css">
  <!-- Swiper JS -->
  <script src="swiper-blunde.min.js"></script> 
  <!--swiper css-->
  <link rel="stylesheet" href="swiper-blunde.min.css">
</head>
<body>
 <?php include "./menu.html" ?>
  Bienvenido <?php echo $_SESSION['user']; ?>
  <div class="slide-container swiper">
    <div class="slide-content">
        <div class="card-wrapper swiper-wrapper">
            <div class="card swiper-slide">
                <div class="image-content">
                    <span class="overlay"></span>
                    <div class="card-image">
                       <img src="img/abc1.jpg" alt="" class="card-img">
                    </div>
                </div>
                <div class="card-content">
                    <h2 class="name">ABC</h2>
                    <p class="description">Aprende Vocabulario</p>
  
                    <a href="abc.php" ><button class="button">Empezar</button></a>
                </div>
            </div>
            <div class="card swiper-slide">
                <div class="image-content">
                    <span class="overlay"></span>
  
                    <div class="card-image">
                      <img src="img/saludos.png" alt="" class="card-img">
                    </div>
                </div>
  
                <div class="card-content">
                    <h2 class="name">Saludos</h2>
                    <p class="description">Aprende Vocabulario</p>
  
                    <a href="saludos.php"><button class="button">Empezar</button></a>
                </div>
            </div>
            <div class="card swiper-slide">
                <div class="image-content">
                    <span class="overlay"></span>
  
                    <div class="card-image">
                      <img src="img/numeros.jpg" alt="" class="card-img">
                    </div>
                </div>
                <div class="card-content">
                    <h2 class="name">Números</h2>
                    <p class="description">Aprende Vocabulario</p>
  
                    <a href="numeros.php"><button class="button">Empezar</button></a>
                </div>
            </div>
            <div class="card swiper-slide">
                <div class="image-content">
                    <span class="overlay"></span>
  
                    <div class="card-image">
                      <img src="img/viaje.jpg" alt="" class="card-img">
                    </div>
                </div>
                <div class="card-content">
                    <h2 class="name">Viajes</h2>
                    <p class="description">Aprende Vocabulario</p>
  
                    <a href="viajes.php"><button class="button">Empezar</button></a>
                </div>
            </div>
            <div class="card swiper-slide">
                <div class="image-content">
                    <span class="overlay"></span>
  
                    <div class="card-image">
                      <img src="img/comida.png" alt="" class="card-img">
                    </div>
                </div>
                <div class="card-content">
                    <h2 class="name">Comida</h2>
                    <p class="description">Aprende Vocabulario</p>
  
                    <a href="comida.php"><button class="button">Empezar</button></a>
                </div>
            </div>
            <div class="card swiper-slide">
              <div class="image-content">
                  <span class="overlay"></span>
                  <div class="card-image">
                      <img src="img/partescuerpo.png" alt="" class="card-img">
                  </div>
              </div>
              <div class="card-content">
                  <h2 class="name">Partes del cuerpo</h2>
                  <p class="description">Practica El Vocabulario</p>
                  <a href="cuerpo.php"><button class="button">Empezar</button></a>
              </div>
          </div>
        </div>
    </div>
    <div class="swiper-button-next swiper-navBtn"></div>
    <div class="swiper-button-prev swiper-navBtn"></div>
    <div class="swiper-pagination"></div>
  </div>
</body>
<script src="script.js"></script>  
</html>
<?php 
}else{
     header("Location: index.html");
     exit();
}
 ?>