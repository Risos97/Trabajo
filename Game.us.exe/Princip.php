<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

.bg-img {
  /* The image used */
  background-image: url("images/wooden.jpg");

  min-height: 380px;

  /* Center and scale the image nicely */
  background-position: absolute;
  background-repeat: no-repeat;
  background-size: cover;
  
  /* Needed to position the navbar */
  position: relative;
}

/* Position the navbar container inside the image */
.container {
  position: absolute;
  margin: 20px;
  width: auto;
}

/* The navbar */
.topnav {
  overflow: hidden;
  background-color: black;
}

/* Navbar links */
.topnav a {
  float: left;
  color: yellow;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: red;
}
</style>
</head>
<body>

<h2>Games.us.exe</h2>
<div class="bg-img">
  <div class="container">
    <div class="topnav">
      <a href="formulario.php">Registro</a>
      <a href="producto.php">Producto</a>
       <a href="alta_producto.php">A-Producto</a>
      
    </div>
  </div>
</div>

</body>