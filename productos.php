<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Implants Bionic</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/variables.css">
    <link rel="stylesheet" href="css/productos.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="img/logo-png.ico">

</head>

<body>
    <?php
    include("header.php");
    ?>
    <main>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-9">
                    <div class="row d-flex justify-content-evenly">
                        <div class="col-11 col-md-3 productos">
                            <h3>Soluciones</h3>
                            <h1>Protésicas</h1>
                            <ul>
                                <?php
                                include("conexion.php");
                                $query = "SELECT * FROM soluciones_protesicas";
                                $result = mysqli_query($conn, $query);
                                while ($row = mysqli_fetch_array($result)) {
                                ?>
                                    <li><a href="plantilla.php?id=<?php echo $row['id_categoria']?>&titulo=<?php echo $row['nombre_categoria']?>">
                                            <?php echo $row['nombre_categoria'] ?></a>
                                    </li>
                                <?php } ?>
                            </ul>
                            <div class="contenedorImagen">
                                <img src="img/prueba.png" alt="">
                            </div>
                        </div>
                        <div class="col-11 col-md-3 productos purpura">
                            <h3>BIONIC</h3>
                            <h1>CAD CAM</h1>
                            <ul>
                                <li><a href="">LIBRERIAS CAD CAM</a></li>
                                <li><a href="">BODY SCAN</a></li>
                                <li><a href="">PILARES CAD CAM</a></li>
                            </ul>
                            <div class="contenedorImagen">
                                <img src="img/img_3.png" alt="">
                            </div>
                        </div>
                        <div class="col-11 col-md-3 productos">
                            <h3>CENTRO DE</h3>
                            <h1>ESCANEO Y FRESADO</h1>
                            <ul>
                                <li><a href="">ESCANEO Y DISEÑO DIGITAL DE PRÓTESIS</a></li>
                                <li><a href="">ESCANEO Y DISEÑO DIGITAL DE PRÓTESIS</a></li>
                                <li><a href="">FERULAS MIOFUNCIONALES</a></li>
                                <li><a href="">PLANIFICACIÓN QUIRÚRGICA</a></li>
                                <li><a href="">GUÍAS QUIRÚRGICAS</a></li>
                                <li><a href="">CENTRO DE FRESADO</a></li>
                                <li><a href="">LABORATORIO DENTAL</a></li>
                            </ul>
                            <div class="contenedorImagen">
                                <img src="img/centro_escaneo.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php
    include("footer.php");
    ?>
</body>

</html>