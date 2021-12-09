<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../css/variables.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/estilosFondo.css">
    <script src="../src/html2.min.js"></script>
    <title>Document</title>

</head>

<body>
<div id="particles-js"></div>
    <?php
    include("header.php");
    include("conexion.php");
    ?>

<div class="contenedor">
    <form action="vendedor.php">
        <label for="">Nombre: </label>
        <input type="text" placeholder="Ejemplo: Carlos" name="nombre">
        <label for="">Contraseña: </label>
        <input type="text" placeholder="Ejemplo: d54as4.-87" name="contraseña">
        <button type="submit">Guardar</button>
    </form>
</div>

    <?php
    include("footer.php");
    ?>

    <script src="scriptVenta.js"></script> 
    <script src="../src/particles.min.js"></script>
    <script  src="../src/app.js"></script>
</body>

</html>