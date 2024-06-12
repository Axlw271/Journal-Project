
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../ESTILO1.css">
    <title>Partes del cuerpo 1</title>
</head>

<header>
    <div class="toggle-btn" onclick="myFunction();">
        <span></span>
        <span></span>
        <span></span>
    </div>
    <a href="../cuerpo.php" class="menu-btn">&#9664;Atrás</a>
    <div class="logo">
        <p>Actividad 1: Partes del cuerpo humano en Lengua de Señas Mexicana (LSM)</p><br>
    </div>
</header>

<body>
    <div class="home-box custom-box">
        <label for="interval"><h5>Elige cuantos segundos practicarás cada una de las señas que se muestran a continuación.</h5></label>
        <input type="number" id="interval" min="1" value="10">
        <button onclick="startSlideshow()">Comenzar</button>
    </div>
<span id="desc"></span>
    <div class="image-container">
        <video autoplay loop muted class="video" id="current-image">
    <source src="barba.mp4" type="video/mp4">
    Tu navegador no soporta el elemento de video.
</video> 

        <div class="arrow left-arrow" id="prev-arrow">&#9664; </div>
        <div class="arrow right-arrow" id="next-arrow">&#9654;</div>
    </div>

    <script>
        const images = [
            "barba.mp4",
            "barbilla.mp4",
            "bigote.mp4",
            "boca.mp4",
            "brazo.mp4",
            "cadera.mp4",
            "cara.mp4",
            "ceja.mp4",
            "codo.mp4",
            "cuello.mp4",
            "diente.mp4",
            "espalda.mp4",
            "estomago.mp4",
            "frente.mp4",
            "garganta.mp4",
            "hombro.mp4",
            "hueso.mp4",
            "labios.mp4",
            "lengua.mp4",
            "mano.mp4",
            "mejilla.mp4",
            "muneca.mp4",
            "nariz.mp4",
            "ojo.mp4",
            "oreja.mp4",
            "pecho.mp4",
            "pelo.mp4",
            "pestana.mp4",
            "pulgar.mp4",
            "uña.mp4"
        ];

        let currentImageIndex = 0;
        const currentImage = document.getElementById("current-image");
        const prevArrow = document.getElementById("prev-arrow");
        const nextArrow = document.getElementById("next-arrow");

        function showImage(index) {
            currentImageIndex = index;
            currentImage.src = images[currentImageIndex];
            document.getElementById("desc").innerHTML=images[currentImageIndex].replace(".mp4", "").charAt(0).toUpperCase() + images[currentImageIndex].replace(".mp4", "").slice(1);
        }

        function showNextImage() {
            currentImageIndex = (currentImageIndex + 1) % images.length;
            showImage(currentImageIndex);
        }

        function showPreviousImage() {
            if (currentImageIndex > 0) {
                currentImageIndex--;
                showImage(currentImageIndex);
            }
        }

        // flechas
        prevArrow.addEventListener("click", () => {
            showPreviousImage();
            clearInterval(intervalId);
            intervalId = setInterval(showNextImage, 10000);
        });

        nextArrow.addEventListener("click", () => {
            showNextImage();
            clearInterval(intervalId);
            intervalId = setInterval(showNextImage, 10000);
        });

        showImage(currentImageIndex);

        // intervalo para cambiar de imagen cada 10 segundos
        let intervalId = setInterval(showNextImage, 10000);

    </script>
</body>

</html>
