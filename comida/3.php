
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../ESTILO3.css">
	<title>Comida 3</title>
</head>

<header>
	<div class="toggle-btn" onclick="myFunction();">
		<span></span>
		<span></span>
		<span></span>
	</div>
    <a href="../comida.php" class="menu-btn">&#9664;Atrás</a>
	<div class="logo">
		<p >Actividad 3 : Comida en Lengua de Señas Mexicana (LSM)</p><br>
	</div>  
</header>

<body>
	<div class="home-box custom-box">
		<h5>1. Observa la seña en la imagen.</h5>
        <h5>2. Escribe en el cuadro de texto de qué letra se trata.</h5>
        <h5>¡NO OLVIDES LOS ACENTOS!</h5>
	</div>

	<div class="container">
		<div class="image-container" id="imageContainer">
        </div>

        <div class="input-container">
		<textarea id="answerInput" placeholder="Texto"></textarea>
           	<button id="submitButton" onclick="verificarRespuesta()">Verificar</button>
	</div>
	</div>

	<div id="overlay" onclick="ocultarLeyenda()">
		<p id="overlayText"></p>
	</div>

<script>
        const images = {
                "agua": "agua.mp4",
                "alimento": "alimento.mp4",
                "arroz": "arroz.mp4",
                "azucar": "azucar.mp4",
                "cafe": "cafe.mp4",
                "caldo": "caldo.mp4",
                "carne": "carne.mp4",
                "ensalada": "ensalada.mp4",
                "galleta": "galleta.mp4",
                "hamburguesa": "hamburguesa.mp4",
                "huevo": "huevo.mp4",
                "leche": "leche.mp4",
                "sal": "sal.mp4",
                "salsa": "salsa.mp4",
                "taco": "taco.mp4",
                "torta": "torta.mp4"
        };

        const imageContainer = document.getElementById('imageContainer');
            const answerInput = document.getElementById('answerInput');
            const overlay = document.getElementById('overlay');
            const overlayText = document.getElementById('overlayText');
    
            let letrasRestantes = Object.keys(images);
            let currentImage = null;
    
            let startTime; // Variable para almacenar el tiempo de inicio
            let activityCompleted = false;
    
            function mostrarImagenAleatoria() {
                if (letrasRestantes.length === 0) {
                    if (!activityCompleted) {
                        activityCompleted = true;
                        mostrarTiempoTranscurrido();
                    }
                    return;
                }
    
                const randomIndex = Math.floor(Math.random() * letrasRestantes.length);
                const letraActual = letrasRestantes[randomIndex];
    
                letrasRestantes.splice(randomIndex, 1);
    
                currentImage = images[letraActual];
    
                const img = document.createElement('video');
                img.autoplay=true
                img.loop=true
                img.src = currentImage;
                img.alt = `Imagen ${letraActual}`;
                imageContainer.innerHTML = '';
                imageContainer.appendChild(img);
    
                answerInput.value = '';
    
                // Guardar el tiempo de inicio al mostrar una nueva imagen
                startTime = new Date().getTime();
            }
    
            function mostrarLeyenda(texto, esCorrecta) {
    const overlayText = document.getElementById('overlayText');
    const overlay = document.getElementById('overlay');
    overlayText.textContent = texto;

    // Set the text color based on correctness
    overlayText.style.color = esCorrecta ? '#26ac26' : 'rgb(207, 54, 54)';
    
    // Set the background color based on correctness
    overlay.style.backgroundColor = esCorrecta ? 'transparent' : 'rgba(0, 0, 0, 0.5)';

    overlay.style.display = 'flex';

    // Set a timeout to hide the overlay after a certain period (e.g., 1000ms)
    setTimeout(() => {
        overlay.style.display = 'none';
    }, 1000);
}
    
            function ocultarLeyenda() {
                overlay.style.display = 'none';
            }
    
            function mostrarTiempoTranscurrido() {
                const endTime = new Date().getTime();
                const elapsedTime = (endTime - startTime) / 1000; // Convertir a segundos
    
                alert(`¡Felicidades! Has completado la actividad en ${elapsedTime} segundos.`);
                registro()
                window.location.href = '../comida.php';
            }
            function registro(){
            const data = new URLSearchParams("act_id=com3 & resultado=10");
            fetch('../resultado.php', {
            method: 'POST',
            body: data
            })
            .then(function(response) {
            if(response.ok) {
                return response.text()
            } else {
                throw "Error en la llamada Ajax";
            }

            })
            .then(function(texto) {
            console.log(texto);
            })
            .catch(function(err) {
            console.log(err);
            });}
            function verificarRespuesta() {
                if (!currentImage) {
                    return;
                }
    
                const respuestaCorrecta = answerInput.value.trim().toLowerCase();
                const imagenKey = getKeyByValue(images, currentImage).toLowerCase();
    
                if (respuestaCorrecta === imagenKey) {
                    mostrarLeyenda('¡Respuesta correcta!', true);
                    mostrarImagenAleatoria();
                } else {
                    mostrarLeyenda('Respuesta incorrecta. Inténtalo de nuevo.', false);
                }
            }
    
            function getKeyByValue(object, value) {
                return Object.keys(object).find((key) => object[key] === value);
            }
    
            mostrarImagenAleatoria();
    
            answerInput.addEventListener('keydown', function (event) {
                if (event.key === 'Enter') {
                    event.preventDefault();
                    verificarRespuesta();
                }
            });
        </script>
    </body>
    </html>
    