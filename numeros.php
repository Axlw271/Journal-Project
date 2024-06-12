
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles.css">
    <!-- Swiper JS -->
    <script src="swiper-blunde.min.js"></script> 
    <!--swiper css-->
    <link rel="stylesheet" href="swiper-blunde.min.css">
	<title>ABC</title>
</head> 
<body>	
	<?php include "./menu2.html" ?>
    <h3>Numeros en Lengua de Señas Mexicana (LSM)</h3>
	<div class="slide-container swiper">
    <div class="slide-content">
        <div class="card-wrapper swiper-wrapper">
            <div class="card swiper-slide">
                <div class="image-content" style="background-color: #3498db;">
						<h3>Actividad 1: Practica la seña</h3>
                </div>
                <div class="card-content">
                    <h4>Visualiza imágenes con señas en LSM y practica cada una de ellas.</h4>
					<a href="numeros/1.php"><button class="button">Empezar</button></a>
                </div>
            </div>
            <div class="card swiper-slide">
                <div class="image-content" style="background-color: #3498db;">
						<h3>Actividad 2: Elige la seña</h3>
                </div>
                <div class="card-content">
                    <h4>Visualiza cuatro imágenes con señas en LSM y selecciona la correcta.</h4>
					<a href="numeros/2.php"><button class="button">Empezar</button></a>
                </div>
            </div>
            <div class="card swiper-slide">
                <div class="image-content" style="background-color: #3498db;">
						<h3>Actividad 3: Reconoce la seña</h3>
                </div>
                <div class="card-content">
                    <h4>Visualiza la imagen con una seña en LSM y escribe de cual se trata.</h4>
					<a href="numeros/3.php"><button class="button">Empezar</button></a>
                </div>
            </div><div class="card swiper-slide">
                <div class="image-content" style="background-color: #3498db;">
						<h3>Actividad 4: Memorama de señas</h3>
                </div>
                <div class="card-content">
                    <h4>Juega al memorama con señas en LSM.</h4>
					<a href="numeros/4.php"><button class="button">Empezar</button></a>
                </div>
            </div><div class="card swiper-slide">
                <div class="image-content" style="background-color: #3498db;">
						<h3>Actividad 5: Sopa de letras</h3>
                </div>
                <div class="card-content">
                    <h4>Encuentra las letras.</h4>
					<a href="numeros/5.php"><button class="button">Empezar</button></a>
                </div>
            </div><div class="card swiper-slide">
                <div class="image-content" style="background-color: #3498db;">
						<h3>Actividad 6: Sopa de señas</h3>
                </div>
                <div class="card-content">
                    <h4>Encuentra las señas.</h4>
					<a href="numeros/6.php"><button class="button">Empezar</button></a>
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