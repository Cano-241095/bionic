<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../css/variables.css">
    <link rel="stylesheet" href="css/plantillaProducto.css">
    <link rel="stylesheet" href="../css/style.css">
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
    $row = mysqli_fetch_array($result);
    $precio = $row['precio'] + 0.00;
    ?>
    <div class="contenedor">
        <div class="contenedorInformacion">

            <div>
                <h1 class="colorTitulo"><?php echo $row['nombre_aditamento'] ?> </h1>
                <h2>$ <?php echo floatval($precio) ?></h2>
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
                        <a href="updateDescripcion.php?id=<?php echo $row2['id'] ?>" class="btn btn-light">
                            <i class="bi bi-pencil-square iconoModificar"></i>
                        </a>
                        <a href="eliminarDescripcion.php?id=<?php echo $row2['id'] ?>" class="btn btn-ligth">
                            <i class="bi bi-trash-fill iconoEliminar"></i>
                        </a>
                    </li>
                    <?php } ?>
                    <a class="btn-descripcion" href="descripcion.php?id=<?php echo $id?>">
                        +
                    </a>
                </ul>

                <div class="contenedorImagenes visiblePequeño">

                    <?php
                    $query = "SELECT * FROM imagenes where id_asociado = $id";
                    $result = mysqli_query($conn, $query);
                    $row = mysqli_fetch_array($result)
                    ?>

                    <img src="../img/<?php echo $row['imagen'] ?> " alt="">
                    <div class="imagenes">
                        <?php
                        $query = "SELECT * FROM imagenes where id_asociado = $id";
                        $result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                        <div>
                            <img src="../img/<?php echo $row['imagen'] ?>" alt="">
                            <a href="updateImagenes.php?id=<?php echo $row['id'] ?>" class="btn btn-ligth">
                                <i class="bi bi-pencil-square iconoModificar"></i>
                            </a>
                            <a href="eliminarImagenes.php?id=<?php echo $row['id'] ?>" class="btn btn-ligth">
                                <i class="bi bi-trash-fill iconoEliminar"></i>
                            </a>
                        </div>
                        <?php
                        }
                        ?>
                        <a class="btn-imagenes2" href="imagenes.php?id=<?php echo $id ?>" >+</a>
                    </div>
                </div>
                <div class="contenedorSecundario">
                    <table>
                        <thead>
                            <tr>
                                <th>Code</th>
                                <th>Size</th>
                                <th>Cantidad</th>
                                <th>act</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT * FROM tamaño where id_asociado = $id";
                            $result = mysqli_query($conn, $query);
                            while ($row3 = mysqli_fetch_array($result)) {
                            ?>
                            <tr>
                                <td><?php echo $row3['codigo'] ?></td>
                                <td><?php echo $row3['tamaño'] ?>mm</td>
                                <td>
                                    <input type="number" name="" id="">
                                </td>
                                <td>
                                    <a href="updateTamaño.php?codigo=<?php echo $row3['codigo']?>"
                                        class="btn btn-light">
                                        <i class="bi bi-pencil-square iconoModificar"></i>
                                    </a>
                                    <a href="eliminarTamaño.php?codigo=<?php echo $row3['codigo']?>"
                                        class="btn btn-light">
                                        <i class="bi bi-trash-fill iconoEliminar"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <a class="btn-tabla" href="tamaño.php?id=<?php echo $id ?>">+</a>

                    <div class="btnCompra">
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
        <div class="contenedorImagenes visibleGrande">
            <?php
            $query = "SELECT * FROM imagenes where id_asociado = $id";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_array($result)
            ?>

            <img src="../img/<?php echo $row['imagen'] ?> " alt="">
            <div class="imagenes">
                <?php
                $query = "SELECT * FROM imagenes where id_asociado = $id";
                $result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_array($result)) {
                ?>
                <div>
                    <img src="../img/<?php echo $row['imagen'] ?>" alt="">
                    <a href="updateImagenes.php?id=<?php echo $row['id'] ?>" class="btn btn-ligth">
                        <i class="bi bi-pencil-square iconoModificar"></i>
                    </a>
                    <a href="eliminarImagenes.php?id=<?php echo $row['id'] ?>" class="btn btn-ligth">
                        <i class="bi bi-trash-fill iconoEliminar"></i>
                    </a>
                </div>
                <?php } ?>               
                <a class="btn-imagenes" href="imagenes.php?id=<?php echo $id ?>" >+</a>

            </div>

        </div>
    </div>
    </div>
    <?php
    include("footer.php");
    ?>
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>