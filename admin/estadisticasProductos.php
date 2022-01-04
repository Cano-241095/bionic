<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../css/variables.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="css/estadisticas.css">
    <link rel="shortcut icon" href="img/logo-png.ico">

</head>

<body>
    <?php
    include("header.php");
    include("conexion.php");
    $inputUno = '';
    $inputDos = '';
    $ordenar = 'cantidad';

    if (isset($_GET['ordenar'])) {
        $ordenar = $_GET['ordenar'];
    }
    if (isset($_POST['palabra'])) {
        $inputUno = $_POST['palabra'];
        $inputDos = $_POST['palabraDos'];
        $ordenar = 'cantidad';
    }
    //aqui ya se elimino :v
    ?>

    <main>
        <div class="busqueda">
            <form action="estadisticasProductos.php" method="POST">
                <div>
                    <div class="duo">
                        <label for="">Nombre</label>
                        <input type="text" value="<?php echo $inputUno ?>" name="palabra" autocomplete="off" placeholder="Ejemplo: Implante">
                    </div>
                    <div class="duo">
                        <label for="">Codigo</label>
                        <input type="text" value="<?php echo $inputDos ?>" name="palabraDos" autocomplete="off" placeholder="Ejemplo: BTS">
                    </div>
                </div>
                <button name="buscar"><i class="bi bi-search"></i> Buscar</button>
            </form>
        </div>

        <div class="productos">
            <p class="titulo">
                <span> <a href="estadisticasProductos.php?ordenar=codigo&palabra=<?php echo $inputUno ?>&palabraDos=<?php echo $inputDos ?>"> codigo </a></span>
                <span> <a href="estadisticasProductos.php?ordenar=nombre&palabra=<?php echo $inputUno ?>&palabraDos=<?php echo $inputDos ?>"> nombre</a></span>
                <span> <a href="estadisticasProductos.php?ordenar=tamanio&palabra=<?php echo $inputUno ?>&palabraDos=<?php echo $inputDos ?>"> tamaño </a></span>
                <span> <a href="estadisticasProductos.php?ordenar=cantidad&palabra=<?php echo $inputUno ?>&palabraDos=<?php echo $inputDos ?>"> stock</a></span>
            </p>
            <ul class="">
                <?php
                if (isset($_POST['palabra'])) {
                    $palabra = $_POST['palabra'];
                    $palabraDos = $_POST['palabraDos'];
                    $query = "SELECT * FROM tamanio WHERE nombre like '%$palabra%' and codigo like '%$palabraDos%' order by $ordenar";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_array($result)) {
                ?>
                        <li>
                            <button type="button" class="btn-bionic" data-bs-toggle="modal" data-bs-target="#<?php echo $row['codigo'] ?>">
                                <p title="<?php echo $row['nombre'] ?>">
                                    <span title="<?php echo $row['nombre'] ?>"><?php echo $row['codigo'] ?></span>
                                    <span><?php echo $row['nombre'] ?></span>
                                    <span class="tamaño"><?php echo $row['tamanio'] ?> mm</span>
                                    <span><?php echo $row['cantidad'] ?></span>
                                </p>
                            </button>
                            <div class="modal fade" id="<?php echo $row['codigo'] ?>" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="modal-title" id="staticBackdropLabel"><?php echo $row['nombre'] ?></h3>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <?php
                                            $idAsociado = $row['id_asociado'];
                                            $queryI = "SELECT * FROM ADITAMENTOS WHERE id = $idAsociado";
                                            $resultI = mysqli_query($conn, $queryI);
                                            $rowI = mysqli_fetch_array($resultI);
                                            ?>
                                            <div>
                                                <h5>Codigo: <?php echo $row['codigo'] ?></h5>
                                                <h5>Casilla: <?php echo $row['casilla'] ?></h5>
                                                <h5>Tamaño: <?php echo $row['tamanio'] ?> mm</h5>
                                                <h5>Stock: <?php echo $row['cantidad'] ?></h5>
                                            </div>
                                            <img class="img-fluid" src="../img/aditamentos/<?php echo $rowI['url'] ?>" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    <?php }
                } else {
                    $palabra = '';
                    $query = "SELECT * FROM tamanio order by $ordenar";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <li>
                            <button type="button" class="btn-bionic" data-bs-toggle="modal" data-bs-target="#<?php echo $row['codigo'] ?>">
                                <p title="<?php echo $row['nombre'] ?>" href="">
                                    <span title="<?php echo $row['nombre'] ?>"><?php echo $row['codigo'] ?></span>
                                    <span><?php echo $row['nombre'] ?></span>
                                    <span class="tamaño"><?php echo $row['tamanio'] ?> mm</span>
                                    <span><?php echo $row['cantidad'] ?></span>
                                </p>
                            </button>
                            <div class="modal fade" id="<?php echo $row['codigo'] ?>" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="modal-title" id="staticBackdropLabel"><?php echo $row['nombre'] ?></h3>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <?php
                                            $idAsociado = $row['id_asociado'];
                                            $queryI = "SELECT * FROM ADITAMENTOS WHERE id = $idAsociado";
                                            $resultI = mysqli_query($conn, $queryI);
                                            $rowI = mysqli_fetch_array($resultI);
                                            ?>
                                            <h5>Codigo: <?php echo $row['codigo'] ?></h5>
                                            <h5>Casilla: <?php echo $row['casilla'] ?></h5>
                                            <h5>Tamaño: <?php echo $row['tamanio'] ?> mm</h5>
                                            <h5>Stock: <?php echo $row['cantidad'] ?></h5>
                                            <img class="img-fluid" src="../img/aditamentos/<?php echo $rowI['url'] ?>" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                <?php }
                } ?>
            </ul>
        </div>
    </main>

    <?php include("footer.php"); ?>
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>