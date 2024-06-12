
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../ESTILO2.css">
	<title>Saludos y más 2</title>
</head>

<header>
	<div class="toggle-btn" onclick="myFunction();">
		<span></span>
		<span></span>
		<span></span>
	</div>
	<a href="../saludos.php" class="menu-btn">&#9664;Atrás</a>
	<div class="logo">
		<p>Actividad 2: Saludos y más en Lengua de Señas Mexicana (LSM)</p><br>
			
	</div>  
</header>

<body>
	<div class="home-box custom-box">
		<h5>1. Observa las señas y elige la que consideres correcta. </h5><h5>2. Selecciona esa opción haciendo clic en ella. </h5>
	</div> 

    <div class="image-container">
    </div>

	<div class="row">
        	<div class="container" id="words"></div>
        	<div class="container" id="pictures"></div>
    	</div>
	<div id="overlay" onclick="ocultarLeyenda()">
		<p id="overlayText"></p>
	</div>

<script>

var words = [
["Adiós"],["adios"],
["Ayudar"],["ayudar"],
["¡Buenos días!"],["buenosdias"],
["¡Buenas noches!"],["buenasnoches"],
["¿Cuál?"],["cual"],
["En"],["en"],
["Favor"],["favor"],
["Nombre"],["nombre"],
["Querer"],["querer"],
["También"],["tambien"],
["Tienda"],["tienda"],
];

var w;

	function getRandomArbitrary(min, max) {
		return Math.floor(Math.random() * (max - min) + min);
	}

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

function test(n) {
    var wd = words[n];
    var text = "";

    for (var k = 0; k < wd.length; k++) {
        text += wd[k] + " &nbsp; &nbsp; &nbsp;  ";

        if (wd[k] === wd[wd.length - 1]) {
            break;
        }
    }

    var rP1 = (n + 1 + 2 * getRandomArbitrary(1, (words.length - 1))) % words.length;
    var rP2 = (n + 1 + 2 * getRandomArbitrary(1, (words.length - 1))) % words.length;
    var rP3 = (n + 1 + 2 * getRandomArbitrary(1, (words.length - 1))) % words.length;

    if (rP2 === rP1) {
        rP2 = (n + 1 + 2 * getRandomArbitrary(1, (words.length - 1))) % words.length;
    }

    if (rP3 === rP2) {
        rP3 = (n + 1 + 2 * getRandomArbitrary(1, (words.length - 1))) % words.length;
    }

    var arr = [
    "<td class='w3-hover-blue' onclick='bad()'><video autoplay loop muted class='video' onmouseover='highlightImage(this)' onmouseout='unhighlightImage(this)'><source src= "+words[rP1][0] + ".mp4 type='video/mp4'>Tu navegador no soporta el elemento de video.</video><br><br><br><br><br><br><br><br><br><br><br><br></td>",
    "<td class='w3-hover-blue' onclick='bad()'><video autoplay loop muted class='video' onmouseover='highlightImage(this)' onmouseout='unhighlightImage(this)'><source src= "+words[rP2][0] + ".mp4 type='video/mp4'>Tu navegador no soporta el elemento de video.</video><br><br></td>",
    "<td class='w3-hover-blue' onclick='bad()'><video autoplay loop muted class='video' onmouseover='highlightImage(this)' onmouseout='unhighlightImage(this)'><source src= "+words[rP3][0] + ".mp4 type='video/mp4'>Tu navegador no soporta el elemento de video.</video></td>",
    "<td class='w3-hover-blue' onclick='good()'><video autoplay loop muted class='video' onmouseover='highlightImage(this)' onmouseout='unhighlightImage(this)'><source src= " + words[n + 1][0] + ".mp4 type='video/mp4'>Tu navegador no soporta el elemento de video.</video></td>"

];

    arr = shuffle(arr);

	var im = "<div class='image-container-wrapper'><table class='w3-table w3-centered'>";
im += "<tr><td class='w3-jumbo' colspan='2'>" + text + "</td></tr>\n";
im += "<tr>" + arr[0] + arr[1] + "</tr>\n";
im += "<tr>" + arr[2] + arr[3] + "</tr>\n";
im += "</table></div><br>\n"; // Cambiado de <hr><br> a <br>


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
    mostrarLeyenda('¡Respuesta correcta!', true);
    setTimeout(function () {
        nn += 2;
        if (words.length == nn) {
            var endTime = new Date(); // Guardar el tiempo de finalización
            var totalTime = (endTime - startTime) / 500; // Calcular el tiempo total en segundos
            alert('¡Felicidades! Has completado la actividad en ' + totalTime + ' segundos.');
            registro()
            window.location.href = '../saludos.php';
        } else {
            test(nn);
        }
    }, 1000);
}
function registro(){
            const data = new URLSearchParams("act_id=sal2 & resultado=10");
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
	function bad(n){
           mostrarLeyenda('Respuesta incorrecta. Inténtalo de nuevo.', false);
}

	var nn = 0;
	test(nn);

	function highlightImage(img) {
		img.style.border = "3px solid #85C1E9";
}

	function unhighlightImage(img) {
		img.style.border = "none";
}

</script>
</body>
</html> 