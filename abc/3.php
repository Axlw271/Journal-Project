

                <!DOCTYPE html>
<html lang="es">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../ESTILO3.css">
    <title>ABC 3</title>
    <link rel="icon" href="/~mapeje/lsm/image/abc.jpg" type="image/x-icon">
</head>

<body>
    <header>
        <div class="toggle-btn" onclick="myFunction();">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <a href="../abc.php" class="menu-btn">&#9664;Atrás</a>
        <div class="logo">
            <p>Actividad 3: Abecedario en Lengua de Señas Mexicana (LSM)</p><br>
        </div>
    </header>

    <div class="home-box custom-box">
        <h5>1. Observa la seña en la imagen.</h5><h5>2. Escribe en el cuadro de texto de qué seña se trata.</h5><h5>¡NO OLVIDES LOS ACENTOS!</h5>
    </div>

    <div class="container">
        <div class="image-container" id="imageContainer"></div>

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

            "a": "a.mp4",
                "b": "b.mp4",
                "c": "c.mp4",
                "ch": "ch.mp4",
                "d": "d.mp4",
                "e": "e.mp4",
                "f": "f.mp4",
                "g": "g.mp4",
                "h": "h.mp4",
                "i": "i.mp4",
                "j": "j.mp4",
                "k": "k.mp4",
                "l": "l.mp4",
                "ll": "ll.mp4",
                "m": "m.mp4",
                "n": "n.mp4",
                "ñ": "ñ.mp4",
                "o": "o.mp4",
                "p": "p.mp4",
                "q": "q.mp4",
                "r": "r.mp4",
                "rr": "rr.mp4",
                "s": "s.mp4",
                "t": "t.mp4",
                "u": "u.mp4",
                "v": "v.mp4",
                "w": "w.mp4",
                "x": "x.mp4",
                "y": "y.mp4",
                "z": "z.mp4"
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
                window.location.href = '../home.php';
            }
            function registro(){
            const data = new URLSearchParams("act_id=abc3 & resultado=10");
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
    