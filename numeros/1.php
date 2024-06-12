
 <!DOCTYPE html>
            <html>
            
            <head>
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" href="../ESTILO1.css">
                <title>Números 1</title>
            </head>
            
            <header>
                <div class="toggle-btn" onclick="myFunction();">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <a href="../numeros.php" class="menu-btn">&#9664;Atrás</a>
                <div class="logo">
                    <p>Actividad 1: Números del 1 al 20 en Lengua de Señas Mexicana (LSM)</p><br>
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
    <source src="1" type="video/mp4">
    Tu navegador no soporta el elemento de video.
</video>
                    <div class="arrow left-arrow" id="prev-arrow">&#9664; </div>
                    <div class="arrow right-arrow" id="next-arrow">&#9654;</div>
                </div>
            
                <script>
                    const images = [
                    "1.mp4",
            "3.mp4",
            "5.mp4",
            "7.mp4",
            "9.mp4",
            "11.mp4",
            "13.mp4",
            "15.mp4",
            "17.mp4",
            "19.mp4",
                    ];
            
                    let currentImageIndex = 0;
                    const currentImage = document.getElementById("current-image");
                    const prevArrow = document.getElementById("prev-arrow");
                    const nextArrow = document.getElementById("next-arrow");
                    const intervalInput = document.getElementById("interval");
                    let intervalValue = parseInt(intervalInput.value) * 1000; // Convert seconds to milliseconds
                    let intervalId;
            
                    function showImage(index) {
                        currentImageIndex = index;
                        currentImage.src = images[currentImageIndex];
                        document.getElementById("desc").innerHTML=images[currentImageIndex].replace(".mp4", "")
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
            
                    prevArrow.addEventListener("click", () => {
                        showPreviousImage();
                        clearInterval(intervalId);
                        intervalId = setInterval(showNextImage, intervalValue);
                    });
            
                    nextArrow.addEventListener("click", () => {
                        showNextImage();
                        clearInterval(intervalId);
                        intervalId = setInterval(showNextImage, intervalValue);
                    });
            
                    function setIntervalValue() {
                        intervalValue = parseInt(intervalInput.value) * 1000;
                        clearInterval(intervalId);
                        intervalId = setInterval(showNextImage, intervalValue);
                    }
            
                    intervalInput.addEventListener("change", setIntervalValue);
            
                    function startSlideshow() {
                        clearInterval(intervalId); // Clear any existing intervals
                        intervalId = setInterval(showNextImage, intervalValue);
                    }
            
                    showImage(currentImageIndex);
                </script>
            </body>
            
            </html>
            
            