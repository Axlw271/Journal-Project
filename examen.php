
<!DOCTYPE html>
<html lang="es">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="ESTILO2.css">
    <title>LSM</title>
</head>

<body>
    <header>
        <div class="toggle-bt" onclick="myFunction();">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <div class="logo">
            <p>Examen de Lengua de Señas Mexicana</p><br>
        </div>
    </header>
    <div class="home-box custom-box">
        <h5>1. Observa las señas y elige la que consideres correcta. </h5>
        <h5>2. Selecciona esa opción haciendo clic en ella. </h5>
    </div>

    <div class="image-container"></div>

    <div class="row">
        <div class="container" id="words"></div>
        <div class="container" id="pictures"></div>
    </div>

    <div id="overlay" onclick="ocultarLeyenda()">
        <p id="overlayText"></p>
    </div>

    <script>
        var words = [
            ["A"], ["abc/a"],
            ["B"], ["abc/b"],
            ["C"], ["abc/c"],
            ["Ch"], ["abc/ch"],
            ["D"], ["abc/d"],
            ["E"], ["abc/e"],
            ["F"], ["abc/f"],
            ["G"], ["abc/g"],
            ["H"], ["abc/h"],
            ["I"], ["abc/i"],
            ["J"], ["abc/j"],
            ["K"], ["abc/k"],
            ["L"], ["abc/l"],
            ["Ll"], ["abc/ll"],
            ["M"], ["abc/m"],
            ["N"], ["abc/n"],
            ["Ñ"], ["abc/ñ"],
            ["O"], ["abc/o"],
            ["P"], ["abc/p"],
            ["Q"], ["abc/q"],
            ["R"], ["abc/r"],
            ["Rr"], ["abc/rr"],
            ["S"], ["abc/s"],
            ["T"], ["abc/t"],
            ["U"], ["abc/u"],
            ["V"], ["abc/v"],
            ["W"], ["abc/w"],
            ["X"], ["abc/x"],
            ["Y"], ["abc/y"],
            ["Z"], ["abc/z"],
            ["Agua"],["acomida/gua"],
            ["Alimento"],["comida/alimento"],
            ["Arroz"],["comida/arroz"],
            ["Azúcar"],["comida/azucar"],
            ["Café"],["comida/cafe"],
            ["Caldo"],["comida/caldo"],
            ["Carne"],["comida/carne"],
            ["Ensalada"],["comida/ensalada"],
            ["Galleta"],["comida/galleta"],
            ["Hamburguesa"],["comida/hamburguesa"],
            ["Huevo"],["comida/huevo"],
            ["Leche"],["comida/leche"],
            ["Sal"],["comida/sal"],
            ["Salsa"],["comida/salsa"],
            ["Taco"],["comida/taco"],
            ["Té"],["comida/te"],
            ["Torta"],["comida/torta"],
["Barba"],["cuerpo/barba"],
["Barbilla"],["cuerpo/barbilla"],
["Bigote"],["cuerpo/bigote"],
["Boca"],["cuerpo/boca"],
["Brazo"],["cuerpo/brazo"],
["Cadera"],["cuerpo/cadera"],
["Cara"],["cuerpo/cara"],
["Ceja"],["cuerpo/ceja"],
["Codo"],["cuerpo/codo"],
["Cuello"],["cuerpo/cuello"],
["Diente"],["cuerpo/diente"],
["Espalda"],["cuerpo/espalda"],
["Estomago"],["cuerpo/estomago"],
["Frente"],["cuerpo/frente"],
["Garganta"],["cuerpo/garganta"],
["Hombro"],["cuerpo/hombro"],
["Hueso"],["cuerpo/hueso"],
["Labios"],["cuerpo/labios"],
["Lengua"],["cuerpo/lengua"],
["Mano"],["cuerpo/mano"],
["Mejilla"],["cuerpo/mejilla"],
["Muñeca"],["cuerpo/muneca"],
["Nariz"],["cuerpo/nariz"],
["Ojo"],["cuerpo/ojo"],
["Oreja"],["cuerpo/oreja"],
["Pecho"],["cuerpo/pecho"],
["Pelo"],["cuerpo/pelo"],
["Pestañas"],["cuerpo/pestana"],
["Pulgar"],["cuerpo/pulgar"],
["Uña"],["cuerpo/uña"],
    ["1"],["numeros/1"],
    ["3"],["numeros/3"],
    ["5"],["numeros/5"],
    ["7"],["numeros/7"],
    ["9"],["numeros/9"],
    ["11"],["numeros/11"],
    ["13"],["numeros/13"],
    ["15"],["numeros/15"],
    ["17"],["numeros/17"],
    ["19"],["numeros/19"],
["Adiós"],["saludos/adios"],
["Ayudar"],["saludos/ayudar"],
["¡Buenos días!"],["saludos/buenosdias"],
["¡Buenas noches!"],["saludos/buenasnoches"],
["¿Cuál?"],["saludos/cual"],
["En"],["saludos/en"],
["Favor"],["saludos/favor"],
["Nombre"],["saludos/nombre"],
["Querer"],["saludos/querer"],
["También"],["saludos/tambien"],
["Tienda"],["saludos/tienda"],
["Aguascalientes"],["viajes/aguascalientes"],
["Baja California Sur"],["viajes/bajacaliforniasur"],
["Chiapas"],["viajes/chiapas"],
["Coahuila"],["viajes/coahuila"],
["Durango"],["viajes/durango"],
["Guerrero"],["viajes/guerrero"],
["Jalisco"],["viajes/jalisco"],
["México"],["viajes/mexico"],
["Morelos"],["viajes/morelos"],
["Nuevo León"],["viajes/nuevoleon"],
["Puebla"],["viajes/puebla"],
["Quintana Roo"],["viajes/quintanaroo"],
["Sinaloa"],["viajes/sinaloa"],
["Sonora"],["viajes/sonora"],
["Tabasco"],["viajes/tabasco"],
["Tamaulipas"],["viajes/tamaulipas"],
["Tlaxcala"],["viajes/tlaxcala"],
["Yucatán"],["viajes/yucatan"],
        ];

        var nn = 0; // Índice de la palabra actual
        buenas=0
        // obtener numeros aleatorio
        function getRandomArbitrary(min, max) {
            return Math.floor(Math.random() * (max - min) + min);
        }

        // mezclar elementos
        function shuffle(a) {
            var j, x, i;
            for (i = a.length - 1; i > 0; i--) {
                j = Math.floor(Math.random() * (i + 1));
                x = a[i];
                a[i] = a[j];
                a[j] = x;
            }
            return a;
        }

        // mostrar pregunta y opciones
        function test(n) {
            
            index=Math.floor(Math.random()*words.length/2)*2
            var wd = words[index];
            var text = wd[0]
            console.log(wd)
            
            console.log(wd[0])
            // obtener índices aleatorios para opciones
            var rP1 = (n + 1 + 2 * getRandomArbitrary(1, (words.length - 1))) % words.length;
            var rP2 = (n + 1 + 2 * getRandomArbitrary(1, (words.length - 1))) % words.length;
            var rP3 = (n + 1 + 2 * getRandomArbitrary(1, (words.length - 1))) % words.length;

            // ver si son diferentes entre sí y de la correcta
            if (rP2 === rP1) {
                rP2 = (n + 1 + 2 * getRandomArbitrary(1, (words.length - 1))) % words.length;
            }

            if (rP3 === rP2) {
                rP3 = (n + 1 + 2 * getRandomArbitrary(1, (words.length - 1))) % words.length;
            }

            // tabla de opciones
            var arr = [
		"<td class='w3-hover-blue' onclick='bad()'><video autoplay loop muted class='video' onmouseover='highlightImage(this)' onmouseout='unhighlightImage(this)'><source src= "+words[rP1][0] + ".mp4 type='video/mp4'>Tu navegador no soporta el elemento de video.</video><br><br><br><br><br><br><br><br><br><br><br><br></td>",
    "<td class='w3-hover-blue' onclick='bad()'><video autoplay loop muted class='video' onmouseover='highlightImage(this)' onmouseout='unhighlightImage(this)'><source src= "+words[rP2][0] + ".mp4 type='video/mp4'>Tu navegador no soporta el elemento de video.</video><br><br></td>",
    "<td class='w3-hover-blue' onclick='bad()'><video autoplay loop muted class='video' onmouseover='highlightImage(this)' onmouseout='unhighlightImage(this)'><source src= "+words[rP3][0] + ".mp4 type='video/mp4'>Tu navegador no soporta el elemento de video.</video></td>",
    "<td class='w3-hover-blue' onclick='good()'><video autoplay loop muted class='video' onmouseover='highlightImage(this)' onmouseout='unhighlightImage(this)'><source src= " + words[index + 1][0] + ".mp4 type='video/mp4'>Tu navegador no soporta el elemento de video.</video></td>"
 ];

            // mezclar opciones
            arr = shuffle(arr);

            // construir html para pregunta y opciones
            var im = "<div class='image-container-wrapper'><table class='w3-table w3-centered'>";
            im += "<tr><td class='w3-jumbo' colspan='2'>" + text + "</td></tr>\n";
            im += "<tr>" + arr[0] + arr[1] + "</tr>\n";
            im += "<tr>" + arr[2] + arr[3] + "</tr>\n";
            im += "</table></div><br>\n";

            // insertar html generado en el contenedor
            document.getElementById("pictures").innerHTML = im + "<hr><br>\n";
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
            const overlay = document.getElementById('overlay');
            overlay.style.display = 'none';
        }

        var startTime = new Date(); // Guardar el tiempo de inicio

        function good() {
            buenas+=1
            mostrarLeyenda('¡Respuesta correcta!', true);
            setTimeout(function () {
                nn += 2;
                if (20 == nn) {
                    var endTime = new Date(); // Guardar el tiempo de finalización
                    var totalTime = (endTime - startTime) / 500; // Calcular el tiempo total en segundos
                    alert('¡Felicidades! Has completado la actividad en ' + totalTime + ' segundos. Tu puntaje es '+buenas);
                    
                    registro()
                    window.location.href = 'home.php';
                } else {
                    test(nn);
                }
            }, 1000);
        }

        function bad() {
            mostrarLeyenda('Respuesta incorrecta.', false);
            setTimeout(function () {
                nn += 2;
                if (20 == nn) {
                    var endTime = new Date(); // Guardar el tiempo de finalización
                    var totalTime = (endTime - startTime) / 500; // Calcular el tiempo total en segundos
                    alert('¡Felicidades! Has completado la actividad en ' + totalTime + ' segundos. Tu puntaje es '+ buenas);
                    registro()
                    
                    window.location.href = 'home.php';
                } else {
                    test(nn);
                }
            }, 1000);
        }
        function registro(){
            const data = new URLSearchParams("act_id=ex & resultado=" +buenas);
            fetch('resultado.php', {
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
        // mostrar la primera pregunta
        test(nn);

        // resalta imagen al pasar el mouse
        function highlightImage(img) {
            img.style.border = "3px solid #85C1E9";
        }

        // quita resaltado al quitar mouse
        function unhighlightImage(img) {
            img.style.border = "none";
        }
    </script>
</body>

</html>
