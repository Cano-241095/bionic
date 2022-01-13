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
    <link rel="stylesheet" href="css/presupuesto.css">
    <link rel="shortcut icon" href="img/logo-png.ico">

    <script src="../src/html2.min.js"></script>
    <title>Document</title>

</head>

<body>
    <?php
    include("header.php");

    include("conexion.php");
    $inputUno = '';
    $inputDos = '';
    if (isset($_POST['palabra'])) {
        $inputUno = $_POST['palabra'];
        $inputDos = $_POST['palabraDos'];
    }
    ?>

    <div class="contenedor" id="contenedor">
        <div id="busqueda" class="busqueda sombra">
            <h4 for="">Busqueda</h4>
            <form action="presupuesto.php" method="POST">
                <div>
                    <label for="">Nombre</label>
                    <input type="text" value="<?php echo $inputUno ?>" name="palabra" autocomplete="off" placeholder="Ejemplo: Implante">
                </div>
                <div class="segundoInput">
                    <label for="">Codigo</label>
                    <input type="text" value="<?php echo $inputDos ?>" name="palabraDos" autocomplete="off" placeholder="Ejemplo: Implante">
                </div>
                <button name="buscar"><i class="bi bi-search"></i> Buscar</button>
            </form>

            <div>
                <ul class="encabezado">
                    <li>
                        <p class="titulo">
                            <span><i class="bi bi-tag"></i> Producto</span>
                            <span><i class="bi bi-qr-code"></i></span>
                            <span><i class="bi bi-bar-chart"></i></span>
                            <span><i class="bi bi-box-seam"></i></span>
                        </p>
                    </li>
                </ul>
                <ul class="productos">
                    <?php
                    if (isset($_POST['palabra'])) {
                        $palabra = $_POST['palabra'];
                        $palabraDos = $_POST['palabraDos'];
                        $query = "SELECT * FROM tamanio WHERE nombre like '%$palabra%' and codigo like '%$palabraDos%' order by nombre";
                        $result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_array($result)) {
                    ?>
                            <li>
                                <a href="agregarPresupuesto.php?id=<?php echo $row['codigo'] ?>">
                                    <span><?php echo $row['nombre'] ?></span>
                                    <span><?php echo $row['codigo'] ?></span>
                                    <span><?php echo $row['tamanio'] ?></span>
                                </a>
                            </li>
                        <?php }
                    } else {
                        $palabra = '';
                        $query = "SELECT * FROM tamanio WHERE nombre like '%$palabra%' order by nombre";
                        $result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                            <li>
                                <a href="agregarPresupuesto.php?id=<?php echo $row['codigo'] ?>">
                                    <span><?php echo $row['nombre'] ?></span>
                                    <span><?php echo $row['codigo'] ?></span>
                                    <span><?php echo $row['tamanio'] ?></span>
                                </a>
                            </li>
                    <?php }
                    } ?>
                </ul>
            </div>
        </div>

        <div id="imprimir" class="presupuesto sombra">
            <div class="header">
                <a href="https://implants-bionic.com/">
                    <img src="../img/logo.png" alt="">
                </a>
                <div class="fecha">
                    <p>Fecha de presupuesto:</p>
                    <p id="fechaa">
                    </p>
                </div>
            </div>
            <div class="productosPreChi">
                <div class="row sombra-bottom">
                    <div class="col-3">Codigo</div>
                    <div class="col-3">P.Unit.</div>
                    <div class="col-3">Pzas.</div>
                    <div class="col-3">Total</div>
                </div>

                <div class="row border-bottom">
                    <div class="col-3">
                        <?php
                        $query = "SELECT * FROM presupuesto order by producto";
                        $result = mysqli_query($conn, $query);
                        $total = 0;
                        while ($row = mysqli_fetch_array($result)) {
                            $total += $row['precio'] * $row['cantidad'];
                        ?>
                            <p><?php echo $row['codigo'] ?></p>
                        <?php } ?>
                    </div>
                    <div class="col-3">
                        <?php
                        $query = "SELECT * FROM presupuesto order by producto";
                        $result = mysqli_query($conn, $query);
                        $total = 0;
                        while ($row = mysqli_fetch_array($result)) {
                            $total += $row['precio'] * $row['cantidad'];
                        ?>
                            <p><?php echo $row['precio'] ?></p>
                        <?php } ?>
                    </div>
                    <div class="col-1 masmenos">
                        <div id="menos">
                            <?php
                            $query = "SELECT * FROM presupuesto order by producto";
                            $result = mysqli_query($conn, $query);
                            $total = 0;
                            while ($row = mysqli_fetch_array($result)) {
                                $total += $row['precio'] * $row['cantidad'];
                            ?>
                                <p>
                                    <a class="gato" href="editarCantidadPresupuesto.php?codigo=<?php echo $row['codigo'] ?>&numero=-1"><i class="bi bi-dash-circle-fill"></i></a>
                                </p>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-1">
                        <?php
                        $query = "SELECT * FROM presupuesto order by producto";
                        $result = mysqli_query($conn, $query);
                        $total = 0;
                        while ($row = mysqli_fetch_array($result)) {
                            $total += $row['precio'] * $row['cantidad'];
                        ?>
                            <p>
                                <?php echo $row['cantidad'] ?>
                            </p>
                        <?php } ?>
                    </div>
                    <div class="col-1 masmenos">
                        <div id="mas">
                            <?php
                            $query = "SELECT * FROM presupuesto order by producto";
                            $result = mysqli_query($conn, $query);
                            $total = 0;
                            while ($row = mysqli_fetch_array($result)) {
                                $total += $row['precio'] * $row['cantidad'];
                            ?>
                                <p>
                                    <a class="gato" href="editarCantidadPresupuesto.php?codigo=<?php echo $row['codigo'] ?>&numero=1"><i class="bi bi-plus-circle-fill"></i></a>
                                </p>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-3">
                        <?php
                        $query = "SELECT * FROM presupuesto order by producto";
                        $result = mysqli_query($conn, $query);
                        $total = 0;
                        while ($row = mysqli_fetch_array($result)) {
                            $total += $row['precio'] * $row['cantidad'];
                        ?>
                            <p>$<?php echo $row['precio'] * $row['cantidad'] ?></p>
                        <?php } ?>
                    </div>
                </div>
                <div class="row border-bottom rowTotal">
                    <div class="col-3"> </div>
                    <div class="col-3"> </div>
                    <div class="col-3 total"> Total:</div>
                    <div class="col-3 total" id="totalFinal">$<?php echo $total ?></div>
                </div>
            </div>
            <div class="productosPre">
                <div class="row sombra-bottom">
                    <div class="col-2">Codigo</div>
                    <div class="col-5">Producto</div>
                    <div class="col-1">P.Unit.</div>
                    <div class="col-3">Pzas.</div>
                    <div class="col-1">Total</div>
                </div>

                <div class="row border-bottom">
                    <div class="col-2">
                        <?php
                        $query = "SELECT * FROM presupuesto order by producto";
                        $result = mysqli_query($conn, $query);
                        $total = 0;
                        while ($row = mysqli_fetch_array($result)) {
                            $total += $row['precio'] * $row['cantidad'];
                        ?>
                            <p><?php echo $row['codigo'] ?></p>
                        <?php } ?>
                    </div>
                    <div class="col-5">
                        <?php
                        $query = "SELECT * FROM presupuesto order by producto";
                        $result = mysqli_query($conn, $query);
                        $total = 0;
                        while ($row = mysqli_fetch_array($result)) {
                            $total += $row['precio'] * $row['cantidad'];
                        ?>
                            <p><?php echo $row['producto'] ?></p>
                        <?php } ?>
                    </div>
                    <div class="col-1">
                        <?php
                        $query = "SELECT * FROM presupuesto order by producto";
                        $result = mysqli_query($conn, $query);
                        $total = 0;
                        while ($row = mysqli_fetch_array($result)) {
                            $total += $row['precio'] * $row['cantidad'];
                        ?>
                            <p><?php echo $row['precio'] ?></p>
                        <?php } ?>
                    </div>
                    <div class="col-1 masmenos">
                        <div id="menos">
                            <?php
                            $query = "SELECT * FROM presupuesto order by producto";
                            $result = mysqli_query($conn, $query);
                            $total = 0;
                            while ($row = mysqli_fetch_array($result)) {
                                $total += $row['precio'] * $row['cantidad'];
                            ?>
                                <p>
                                    <a class="gato" href="editarCantidadPresupuesto.php?codigo=<?php echo $row['codigo'] ?>&numero=-1"><i class="bi bi-dash-circle-fill"></i></a>
                                </p>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-1">
                        <?php
                        $query = "SELECT * FROM presupuesto order by producto";
                        $result = mysqli_query($conn, $query);
                        $total = 0;
                        while ($row = mysqli_fetch_array($result)) {
                            $total += $row['precio'] * $row['cantidad'];
                        ?>
                            <p>
                                <?php echo $row['cantidad'] ?>
                            </p>
                        <?php } ?>
                    </div>
                    <div class="col-1 masmenos">
                        <div id="mas">
                            <?php
                            $query = "SELECT * FROM presupuesto order by producto";
                            $result = mysqli_query($conn, $query);
                            $total = 0;
                            while ($row = mysqli_fetch_array($result)) {
                                $total += $row['precio'] * $row['cantidad'];
                            ?>
                                <p>
                                    <a class="gato" href="editarCantidadPresupuesto.php?codigo=<?php echo $row['codigo'] ?>&numero=1"><i class="bi bi-plus-circle-fill"></i></a>
                                </p>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-1">
                        <?php
                        $query = "SELECT * FROM presupuesto order by producto";
                        $result = mysqli_query($conn, $query);
                        $total = 0;
                        while ($row = mysqli_fetch_array($result)) {
                            $total += $row['precio'] * $row['cantidad'];
                        ?>
                            <p>$<?php echo $row['precio'] * $row['cantidad'] ?></p>
                        <?php } ?>
                    </div>
                </div>
                <div class="row border-bottom rowTotal">
                    <div class="col-2"> </div>
                    <div class="col-5"> </div>
                    <div class="col-1"> </div>
                    <div class="col-3 total"> Total:</div>
                    <div class="col-1 total" id="totalFinal">$<?php echo $total ?></div>
                </div>
            </div>
            <div class="espacio">
                <br>
            </div>
        </div>
    </div>
    <div class="botones">
        <button id="btnCrearPdf" class="btnPresupuesto sombra">Descargar Presupuesto</button>
        <a id="volver" href="eliminarPresupuesto.php" class="btnPresupuesto sombra">Regresar</a>
    </div>
    <?php
    include("footer.php");
    ?>

    <script>
        const tiempoTranscurrido = Date.now();
        const hoy = new Date(tempoTranscurrido);
        console.log(hoy.toLocaleDateString());
        document.querySelector('#fechaa').innerHTML = hoy.toLocaleDateString();
    </script>
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
</body>

</html>