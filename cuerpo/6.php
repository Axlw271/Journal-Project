
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
    <a href="../cuerpo.php" class="menu-btn">&#9664;Atrás</a>
    <div class="logo">
        <p>Actividad 6: Cuerpo en Lengua de Señas Mexicana (LSM)</p><br>
    </div>
</header>
<div id="sopa"></div>
<div class="image-box"></div>
<script>
  palabras=["barba","barbilla","bigote","boca","brazo","cadera","cara","ceja","codo","cuello","diente","espalda","estomago","frente","garganta","hombro","hueso","labio","lengua","mano","mejilla","muñenca","nariz","ojo","oreja","pecho","pelo","pestañas","pulgar","uña"]
  document.getElementById("sopa").innerHTML=palabras[Math.floor(Math.random()*palabras.length)]+" "+palabras[Math.floor(Math.random()*palabras.length)]+" "+palabras[Math.floor(Math.random()*palabras.length)]
</script><script>
<?php include "../ssenas.js" ?></script>