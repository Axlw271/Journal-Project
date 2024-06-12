
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sopa de letras</title>
  <link rel="stylesheet" href="../styles.css">
</head>
<body>
<header class="head2" >
    <a href="../saludos.php" class="menu-btn">&#9664;Atrás</a>
    <div class="logo">
        <p>Actividad 6: Saludos en Lengua de Señas Mexicana (LSM)</p><br>
    </div>
</header>
<div id="sopa"></div>
<div class="image-box"></div>
<script>
  palabras=["adios","ahora","ayudar","tardes","conmigo","cual","cada","favor","necesitar","nombre","pensar","suyo","tambien","taxi","tienda"]
  document.getElementById("sopa").innerHTML=palabras[Math.floor(Math.random()*palabras.length)]+" "+palabras[Math.floor(Math.random()*palabras.length)]+" "+palabras[Math.floor(Math.random()*palabras.length)]
</script><script>
<?php include "../ssenas.js" ?></script>