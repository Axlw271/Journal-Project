
<!DOCTYPE html>
<html lang="en">

<style>
   body {
      background-color: #efefef;
   }
   header {
      text-align: center;
      padding: 20px;
      background-color: #3498db;
      color: white;
    }

    #puntos {
      margin-top: 0;
    }
  /* Agrega estilos según tus necesidades */
  .card {
    font-size: 50px;
    width: 100px;
    height: 250px;
    margin: 5px;
    background-color: #7dadce;
    border-radius: 3%;
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
     /* Hace que las cartas aparezcan en línea */
  }

  #tablero {
    width: 620px;
    margin: 0 auto; /* Agrega esta línea para centrar el contenedor */
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
  }
  video{
    max-width:100%;
    max-height:100%;
    border-radius: 3%;

  }
  /* Estilo para mostrar las cartas en columnas */
  @media (min-width: 600px) {
    #tablero {
      width: 80%; /* Ancho completo para pantallas más grandes */
    }
    .card {
      width: calc(40% - 10px); /* Calcula el ancho para que haya 5 cartas por fila */
      margin-right: 10px;
      margin-bottom: 10px;
    }
    @media (min-width: 1000px) {
    #tablero {
      width: 100%; /* Ancho completo para pantallas más grandes */
    }
    .card {
      width: calc(20% - 10px); /* Calcula el ancho para que haya 5 cartas por fila */
      margin-right: 10px;
      margin-bottom: 10px;
    }
  }
}
</style>

<link rel="stylesheet" href="../styles.css">
</head>

<body>
  <header >
    
  <a href="../cuerpo.php" class="menu-btn">&#9664;Atrás</a>
    <h1>Memorama comida</h1>
    
  </header>
  <div id="tablero"></div>
  

  <script>
     const images = {
    "barba": "barba.mp4",
    "barbilla": "barbilla.mp4",
    "bigote": "bigote.mp4",
    "boca": "boca.mp4",
    "brazo": "brazo.mp4",
    "cadera": "cadera.mp4",
    "cara": "cara.mp4",
    "ceja": "ceja.mp4",
    "codo": "codo.mp4",
    "cuello": "cuello.mp4",
    "diente": "diente.mp4",
    "espalda": "espalda.mp4",
    "estomago": "estomago.mp4",
    "frente": "frente.mp4",
    "garganta": "garganta.mp4",
    "hombro": "hombro.mp4",
    "hueso": "hueso.mp4",
    "labios": "labios.mp4",
    "lengua": "lengua.mp4",
    "mano": "mano.mp4",
    "mejilla": "mejilla.mp4",
    "muñeca": "muneca.mp4",
    "nariz": "nariz.mp4",
    "ojo": "ojo.mp4",
    "oreja": "oreja.mp4",
    "pecho": "pecho.mp4",
    "pelo": "pelo.mp4",
    "pestañas": "pestana.mp4",
    "pulgar": "pulgar.mp4",
    "uña": "uña.mp4",
        };
        
const keysArray = Object.keys(images);
    // Suponiendo que ya tienes los arrays palabras e imagenes
    var palabras = [];
    var imagenes = [];
    for(var i=0; i<4; i++){
        index=Math.floor(Math.random()*keysArray.length)
        palabras.push(keysArray[index])
        imagenes.push(images[keysArray[index]])
    }

    var cartas = [];
    var cartasVolteadas = [];
    /*var puntos = 0;*/

    function iniciarJuego() {
      // Combina las palabras e imágenes en un solo array de objetos
      var cartasPares = [];
      for (var i = 0; i < palabras.length; i++) {
        cartasPares.push({
          tipo: "palabra",
          valor: palabras[i]
        });
        cartasPares.push({
          tipo: "imagen",
          valor: imagenes[i]
        });
      }

      // Baraja las cartas
      for (var i = cartasPares.length - 1; i > 0; i--) {
        var j = Math.floor(Math.random() * (i + 1));
        // Intercambia los elementos
        [cartasPares[i], cartasPares[j]] = [cartasPares[j], cartasPares[i]];
      }

      // Crea las cartas en el tablero
      var tablero = document.getElementById("tablero");
      for (var i = 0; i < cartasPares.length; i++) {
        var carta = document.createElement("div");
        carta.className = "card";
        carta.dataset.tipo = cartasPares[i].tipo;
        carta.dataset.valor = cartasPares[i].valor;
        carta.innerHTML = "?"; // Puedes personalizar esto con tu propio contenido
        carta.addEventListener("click", voltearCarta);
        tablero.appendChild(carta);
      }
    }

    function voltearCarta() {
      var carta = this;

      if (cartas.length < 2 && !cartas.includes(carta)) {
        cartas.push(carta);
        if (carta.dataset.tipo === "palabra") {
          carta.innerHTML = carta.dataset.valor; // Muestra la palabra
        } else if (carta.dataset.tipo === "imagen") {
          // Muestra la imagen
          carta.innerHTML ='<video autoplay loop class="video"><source src="'+carta.dataset.valor+'" type="video/mp4">Tu navegador no soporta el elemento de video.</video>'
        }
      }

      if (cartas.length === 2) {
        setTimeout(verificarPareja, 1000);
      }
    }

    function verificarPareja() {
      var carta1 = cartas[0];
      var carta2 = cartas[1];
      if(carta1.dataset.valor.length<20)
      var primerosTresCaracteresCarta1 = carta1.dataset.valor.substring(0, 3);
      else
      var primerosTresCaracteresCarta1 = carta1.dataset.valor.substring(50, 53);
    
      if(carta2.dataset.valor.length<20)
      var primerosTresCaracteresCarta2 = carta2.dataset.valor.substring(0, 3);
      else
      var primerosTresCaracteresCarta2 = carta2.dataset.valor.substring(50, 53);
      
      console.log(primerosTresCaracteresCarta1)
      console.log(primerosTresCaracteresCarta2)
      if (carta1.dataset.tipo !== carta2.dataset.tipo && primerosTresCaracteresCarta1 === primerosTresCaracteresCarta2) {
        // Pareja encontrada
        cartasVolteadas.push(carta1, carta2);
        /*puntos++;
        document.getElementById("puntos").innerText = puntos;*/
        if (cartasVolteadas.length === palabras.length * 2) {
          alert("¡Felicidades, has ganado!");
          registro()
        }
      } else {
        // Voltea las cartas de nuevo después de un breve período de tiempo
        setTimeout(function () {
          carta1.innerHTML = "?";
          carta2.innerHTML = "?";
          carta1.style.backgroundImage = "";
          carta2.style.backgroundImage = "";
        }, 1000);
      }

      // Reinicia el array de cartas
      cartas = [];
    }
    function registro(){
            const data = new URLSearchParams("act_id=cue4 & resultado=10");
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
    // Inicia el juego al cargar la página
    window.onload = iniciarJuego;
  </script>
</body>

</html>
