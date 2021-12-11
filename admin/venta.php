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
    <link rel="stylesheet" href="css/venta.css">
    <script src="../src/html2.min.js"></script>
    <title>Document</title>

</head>

<body>
    <?php
    include("header.php");

    include("conexion.php");
    $inputUno = '';
    $inputDos = '';
    $ordenar = 'codigo';
    $idVendedor = 0;
    if (isset($_GET['idVendedor'])) {
        $idVendedor = $_GET['idVendedor'];
    }
    if (isset($_POST['palabra'])) {
        $inputUno = $_POST['palabra'];
        $inputDos = $_POST['palabraDos'];
        $ordenar = 'cantidad';
    }
    $query = "SELECT * FROM nota ORDER BY ID DESC LIMIT 1";
    $result = mysqli_query($conn, $query);
    $nota = mysqli_fetch_array($result);
    $folio = $nota['id'] + 1;
    
    ?>
    <div class="contenedor" id="contenedor">
        <div class="miniContenedor">
            <div class="vendedor sombra">
                <label for="">Cliente</label>
                <select class="form-select" aria-label="Default select example">
                    <option selected value="venta.php?idVendedor=<?php echo $idVendedor ?>&idCliente=123456789">Seleccionar Cliente</option>
                    <?php
                    $query = "SELECT * FROM clientes ORDER BY nombre";
                    $result = mysqli_query($conn, $query);
                    while ($clientes = mysqli_fetch_array($result)) {
                    ?>
                        <option value="venta.php?idVendedor=<?php echo $idVendedor ?>&idCliente=<?php echo $clientes['id'] ?>"> <?php echo $clientes['nombre'] ?> </option> 
                        <!-- agregue idcliente idvendedor falta usarlo al dar click en un producto  -->
                    <?php } ?>
                    <option value="cliente.php?idVendedor=<?php echo $idVendedor ?>"> Nuevo Cliente </option>
                </select>
            </div>
            <div id="busqueda" class="busqueda sombra">
                <h4 for="">Busqueda</h4>
                <form action="venta.php" method="POST">
                    <div>
                        <label for="">Nombre</label>
                        <input type="text" value="<?php echo $inputUno ?>" name="palabra" autocomplete="off" placeholder="Ejemplo: Implante">
                    </div>
                    <div class="segundoInput">
                        <label for="">Codigo</label>
                        <input type="text" value="<?php echo $inputDos ?>" name="palabraDos" autocomplete="off" placeholder="Ejemplo: Implante">
                    </div>
                    <button name="buscar"><i class="bi bi-search"></i> Buscar</button>
                    <ul class="encabezado">
                        <li>
                            <p class="titulo">
                                <span><i class="bi bi-tag"></i> Producto</span>
                                <span>codigo</span>
                                <span><i class="bi bi-bar-chart"></i></span>
                                <span>stock</span>
                            </p>
                        </li>
                    </ul>
                    <ul class="productos">
                </form>

                <div>
                    <ul class="productos">
                        <?php
                        if (isset($_POST['palabra'])) {
                            $palabra = $_POST['palabra'];
                            $palabraDos = $_POST['palabraDos'];
                            $query = "SELECT * FROM tamanio WHERE nombre like '%$palabra%' and codigo like '%$palabraDos%' order by $ordenar";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_array($result)) {
                        ?>
                                <li>
                                    <a href="agregarVenta.php?id=<?php echo $row['codigo'] ?>&folio=<?php echo $folio ?>">
                                        <span><?php echo $row['nombre'] ?></span>
                                        <span><?php echo $row['codigo'] ?></span>
                                        <span><?php echo $row['tamanio'] ?></span>
                                        <span><?php echo $row['cantidad'] ?></span>
                                    </a>
                                </li>
                            <?php }
                        } else {
                            $palabra = '';
                            $query = "SELECT * FROM tamanio WHERE nombre like '%$palabra%' order by $ordenar";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_array($result)) {
                            ?>
                                <li>
                                    <a href="agregarVenta.php?id=<?php echo $row['codigo'] ?>&folio=<?php echo $folio ?>">
                                        <span><?php echo $row['nombre'] ?></span>
                                        <span><?php echo $row['codigo'] ?></span>
                                        <span><?php echo $row['tamanio'] ?></span>
                                        <span><?php echo $row['cantidad'] ?></span>
                                    </a>
                                </li>
                        <?php }
                        } ?>
                    </ul>
                </div>
            </div>
        </div>

        <div id="imprimir" class="nota sombra">
            <div class="header">
                <a href="https://implants-bionic.com/">
                    <img src="../img/logo.png" alt="">
                </a>
                <div class="fecha">
                    <p class="folio">Folio: <?php echo $folio ?></p>
                    <p>Fecha de presupuesto:</p>
                    <p><?php
                        /* Set locale to Dutch */
                        setlocale(LC_ALL, 'es_mx.UTF-8');

                        echo strftime("%A %d %B %Y",);
                        ?></p>
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
                        $query = "SELECT * FROM venta where folio = $folio order by producto";
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
                        $query = "SELECT * FROM venta where folio = $folio order by producto";
                        $result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                            <p><?php echo $row['precio'] ?></p>
                        <?php } ?>
                    </div>
                    <div class="col-1 masmenos">
                        <div id="menos">
                            <?php
                            $query = "SELECT * FROM venta where folio = $folio order by producto";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_array($result)) {
                            ?>
                                <p><a class="gato" href="editarCantidadVenta.php?codigo=<?php echo $row['codigo'] ?>&numero=-1"><i class="bi bi-dash-circle-fill"></i></a></p>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-1">
                        <?php
                        $query = "SELECT * FROM venta where folio = $folio order by producto";
                        $result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                            <p><strong> <?php echo $row['cantidad'] ?></strong></p>
                        <?php } ?>
                    </div>
                    <div class="col-1 masmenos">
                        <div id="mas">
                            <?php
                            $query = "SELECT * FROM venta where folio = $folio order by producto";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_array($result)) {
                            ?>
                                <p><a class="gato" href="editarCantidadVenta.php?codigo=<?php echo $row['codigo'] ?>&numero=1"><i class="bi bi-plus-circle-fill"></i></a></p>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-3">
                        <?php
                        $query = "SELECT * FROM venta where folio = $folio order by producto";
                        $result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_array($result)) {
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
                        $query = "SELECT * FROM venta where folio = $folio order by producto";
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
                        $query = "SELECT * FROM venta where folio = $folio order by producto";
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
                        $query = "SELECT * FROM venta where folio = $folio order by producto";
                        $result = mysqli_query($conn, $query);
                        $total = 0;
                        while ($row = mysqli_fetch_array($result)) {
                            $total += $row['precio'] * $row['cantidad'];
                        ?>
                            <p class="negrillas"><?php echo $row['precio'] ?></p>
                        <?php } ?>
                    </div>
                    <div class="col-1 masmenos">
                        <div id="menos">
                            <?php
                            $query = "SELECT * FROM venta where folio = $folio order by producto";
                            $result = mysqli_query($conn, $query);
                            $total = 0;
                            while ($row = mysqli_fetch_array($result)) {
                                $total += $row['precio'] * $row['cantidad'];
                            ?>
                                <p>
                                    <a class="gato" href="editarCantidadVenta.php?codigo=<?php echo $row['codigo'] ?>&numero=-1"><i class="bi bi-dash-circle-fill"></i></a>
                                </p>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-1">
                        <?php
                        $query = "SELECT * FROM venta where folio = $folio order by producto";
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
                            $query = "SELECT * FROM venta where folio = $folio order by producto";
                            $result = mysqli_query($conn, $query);
                            $total = 0;
                            while ($row = mysqli_fetch_array($result)) {
                                $total += $row['precio'] * $row['cantidad'];
                            ?>
                                <p>
                                    <a class="gato" href="editarCantidadVenta.php?codigo=<?php echo $row['codigo'] ?>&numero=1"><i class="bi bi-plus-circle-fill"></i></a>
                                </p>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-1">
                        <?php
                        $query = "SELECT * FROM venta where folio = $folio order by producto";
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
        <button id="btnCrearPdfVenta" class="btnPresupuesto sombra">Descargar Presupuesto</button>
        <a id="volver" href="eliminarVenta.php" class="btnPresupuesto sombra">Regresar</a>
    </div>
    <?php
    include("footer.php");
    ?>

    <script src="../src/jquery-3.1.1.mini.js"></script>
    <script src="scriptVenta.js"></script>
</body>

</html>