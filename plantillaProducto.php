<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/variables.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/plantillaProducto.css">
    <link rel="stylesheet" href="admin/css/carrucel.css">
    <link rel="shortcut icon" href="img/logo-png.ico">

    <title>Implants Bionic</title>
</head>

<body>

    <header></header>
    <?php
    include("header.php");
    ?>
    <?php
    include("conexion.php");

    $id = $_GET['id'];

    $query = "SELECT * FROM aditamentos where id = $id";
    $result = mysqli_query($conn, $query);
    $rowt = mysqli_fetch_array($result);
    $precio = $rowt['precio'] + 0.00;
    $idSoluciones = $rowt['id_asociado'];


    $query2 = "SELECT * FROM soluciones_protesicas where id_categoria = $idSoluciones";
    $result2 = mysqli_query($conn, $query2);
    $rowt2 = mysqli_fetch_array($result2);
    ?>

        
    
    <div class="contenedor">
        <div class="contenedorInformacion">
            <div>
                <h1><a
                        href="plantilla.php?id=<?php echo $idSoluciones?>&titulo=<?php echo $rowt2['nombre_categoria']?>"><i
                            class="bi bi-caret-left-fill"></i></a><?php echo $rowt['nombre_aditamento'] ?></h1>
                <h2>$ <?php echo floatval($precio) ?>.00</h2>
                <h6>DESCRIPCIÓN DEL PRODUCTO:</h6>
            </div>

            <div>
                <ul>
                    <?php
                    $query = "SELECT * FROM descripcion where id_asociado = $id";
                    $result = mysqli_query($conn, $query);
                    while ($row2 = mysqli_fetch_array($result)) {
                    ?>
                    <li>
                        <?php echo $row2['descripcion'] ?>

                    </li>
                    <?php } ?>

                </ul>
                <div class="contenedorImagenes visiblePequenio">
                    <?php
                    $query = "SELECT * FROM imagenes where id_asociado = $id";
                    $result = mysqli_query($conn, $query);
                    $row = mysqli_fetch_array($result)
                    ?>
                    <img src="img/<?php echo $row['imagen'] ?> " alt="">
                    <div class="imagenes">
                        <?php
                        $query = "SELECT * FROM imagenes where id_asociado = $id";
                        $result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                        <div>
                            <img src="img/<?php echo $row['imagen'] ?>" alt="">
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>

                <div class="contenedorSecundario">
                    <table>
                        <thead>
                            <tr>
                                <th><i class="bi bi-geo-alt-fill"></i></th>
                                <th>Code</th>
                                <th>Size</th>
                                <th>Inventario</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT * FROM tamanio where id_asociado = $id";
                            $result = mysqli_query($conn, $query);
                            while ($row3 = mysqli_fetch_array($result)) {
                            ?>
                            <tr>
                                <td><?php echo $row3['casilla'] ?></td>
                                <td><?php echo $row3['codigo'] ?></td>
                                <td><?php echo $row3['tamanio'] ?>mm</td>
                                <td><?php echo $row3['cantidad'] ?></td>

                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                    <div class="btnCompra noVisibleGrande">
                        <p><i class="bi bi-suit-heart"></i></p>
                        <button>Add to card</button>
                        <button>Buy</button>
                    </div>
                    <!-- <div class="btnIconos iconosGrande noVisibleGrande">
                        <i class="bi bi-share-fill"></i>
                        <i class="bi bi-facebook"></i>
                        <i class="bi bi-instagram"></i>
                        <i class="bi bi-messenger"></i>
                    </div> -->

                </div>
            </div>
        </div>

                <div class="imagenes visibleGrande">
                    <div class="">
                        <ul id="glasscase" class="gc-start">
                            <?php
                                $query = "SELECT * FROM imagenes where id_asociado = $id";
                                $result = mysqli_query($conn, $query);
                                while ($row = mysqli_fetch_array($result)) {
                            ?>
                            <li><img src="img/<?php echo $row['imagen'] ?>" alt=""></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>

            <div class="btnCompra visibleGrande">
                <p><i class="bi bi-suit-heart"></i></p>
                <button>Add to card</button>
                <button>Buy</button>
            </div>
            <div class="btnIconos iconosGrande">
                <i class="bi bi-share-fill"></i>
                <i class="bi bi-facebook"></i>
                <i class="bi bi-instagram"></i>
                <i class="bi bi-messenger"></i>
            </div>

        </div>


    </div>
    </div>

    <?php
    include("footer.php");
    ?>
    <script type="text/javascript">
    $(document).ready(function() {
        //If your <ul> has the id "glasscase"
        $('#glasscase').glassCase({
            'thumbsPosition': 'bottom',
            'widthDisplay': 560
        });
    });
    </script>
    <script src="admin/carrucel.js"></script>
</body>
</html>