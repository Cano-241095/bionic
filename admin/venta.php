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
<script>
    const $resultado = document.querySelector("#resultado"),
        // $fecha = document.querySelector("#fecha");

        fetch("http://data.fixer.io/api/latest?access_key=adee9e06cac6c62456863fae4df92332&base=USD&symbols=MXN")
        .then(respuesta => respuesta.json())
        .then(respuestaDecodificada => {
            const precioEuroDolarHoyEnMXN = respuestaDecodificada.rates.MXN;
            // const fechaActualizacion = respuestaDecodificada.date;
            // $fecha.textContent = fechaActualizacion;
            $resultado.textContent = precioEuroDolarHoyEnMXN;
        });
</script>

<body>
    <?php
    include("header.php");

    include("conexion.php");
    $inputUno = '';
    $inputDos = '';
    $ordenar = 'codigo';
    $idVendedor = 0;
    $clienteElegido = 'Elegir Cliente';
    $iva = .16;

    if (isset($_GET['idVendedor'])) {
        $idVendedor = $_GET['idVendedor'];
    }
    if (isset($_POST['palabra'])) {
        $inputUno = $_POST['palabra'];
        $inputDos = $_POST['palabraDos'];
        $ordenar = 'cantidad';
    }
    if (isset($_GET['idCliente'])) {
        $idCliente = $_GET['idCliente'];
        $query = "SELECT * FROM clientes WHERE id = $idCliente";
        if ($idCliente != 123456789) {
            $result = mysqli_query($conn, $query);
            $clientee = mysqli_fetch_array($result);
            $clienteElegido = $clientee['nombre'] . ' ' . $clientee['apellidoP'] . ' ' . $clientee['apellidoM'];
        }
    }
    $query = "SELECT * FROM nota ORDER BY ID DESC LIMIT 1";
    $result = mysqli_query($conn, $query);
    $nota = mysqli_fetch_array($result);
    $folio = $nota['id'] + 1;

    if (isset($_GET['envio'])) {
        $costoEnvio = $_GET['envio'];
        $codigo = $_GET['codigo'];

        $queryV = "SELECT * FROM venta where codigo = '$codigo' and folio = $folio";
        $resultV = mysqli_query($conn, $queryV);
        $rowV = mysqli_fetch_array($resultV);

        if ($rowV['codigo']) {
            // echo 'ya existe';
            header('Location:venta.php?idVendedor=' . $idVendedor . '&idCliente=' . $idCliente);
        } else {
            // echo 'no existe';
            $cantidad = 1;
            $producto = 'Envio';

            $insert = "INSERT INTO venta (folio,codigo,producto,cantidad,precio)
            VALUES ('$folio','$codigo','$producto',$cantidad,$costoEnvio)";
            if (mysqli_query($conn, $insert)) {
                //echo 'SiSePudo'.$folio.$codigo.$producto.$cantidad.$precio ;
                header('Location:venta.php?idVendedor=' . $idVendedor . '&idCliente=' . $idCliente);
            } else {
                //echo 'NoSePudo'.$folio.$codigo.$producto.$cantidad.$precio ;
                header('Location:venta.php?idVendedor=' . $idVendedor . '&idCliente=' . $idCliente);
            }
        }
    }
    $precioEuroPesos = 20;
    $precioEuroDolar = 1;
    $precioDoralPesos = $precioEuroPesos/$precioEuroDolar;

    // set API Endpoint and API key 
    // $endpoint = 'latest';
    // $access_key = 'd9d77f0248877971dadc10b7ec322716';

    // // Initialize CURL:
    // $ch = curl_init('http://data.fixer.io/api/' . $endpoint . '?access_key=' . $access_key . '');
    // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // // Store the data:
    // $json = curl_exec($ch);
    // curl_close($ch);

    // // Decode JSON response:
    // $exchangeRates = json_decode($json, true);

    // // Access the exchange rate values, e.g. GBP:
    // $precioEuroPesos = $exchangeRates['rates']['MXN'];
    // $precioEuroDolar = $exchangeRates['rates']['USD'];
    // $precioDoralPesos = $precioEuroPesos/$precioEuroDolar;
    // Access the exchange rate values, e.g. GBP:
    
    
    $precioDoralPesos = round($precioDoralPesos,2);
    ?>

    <div class="contenedor" id="contenedor">
        <div class="miniContenedor">
            <div class="vendedor sombra" id="cliente">
                <label for="">Cliente</label>
                <select class="form-select" aria-label="Default select example">
                    <option selected value="venta.php?idVendedor=<?php echo $idVendedor ?>&idCliente=123456789">Seleccionar Cliente</option>
                    <?php
                    $query = "SELECT * FROM clientes ORDER BY nombre";
                    $result = mysqli_query($conn, $query);
                    while ($clientes = mysqli_fetch_array($result)) {
                    ?>
                        <option value="venta.php?idVendedor=<?php echo $idVendedor ?>&idCliente=<?php echo $clientes['id'] ?>"> <?php echo $clientes['nombre'] . " " . $clientes['apellidoP'] . " " . $clientes['apellidoM'] ?> </option>
                        <!-- agregue idcliente idvendedor falta usarlo al dar click en un producto  -->
                    <?php } ?>
                    <option value="cliente.php?idVendedor=<?php echo $idVendedor ?>"> Nuevo Cliente </option>
                </select>
                <h3 id="nombreCliente" class=""><?php echo $clienteElegido ?> <span id="idCliente" class="d-none"><?php echo $idCliente ?></span> <span id="idVendedor" class="d-none"><?php echo $idVendedor ?></span></h3>
            </div>
            <form id="envidoI" class="sombra" action="venta.php" method="$_GET">
                <div>
                    <input value="<?php echo $idVendedor ?>" type="text" class="d-none" name="idVendedor">
                    <input value="<?php echo $idCliente ?>" type="text" class="d-none" name="idCliente">
                    <input value="ENVIO24" type="text" class="d-none" name="codigo">
                    <label for="">Costo de envio</label>
                    <input name="envio" type="number" name="" id="">
                </div>
                <button class="envio">Guardar costo de envio</button>
            </form>
            <div id="busqueda" class="busqueda sombra">
                <form action="venta.php?idVendedor=<?php echo $idVendedor ?>&idCliente=<?php echo $idCliente ?>" method="POST">
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
                            $query = "SELECT * FROM tamanio WHERE nombre like '%$palabra%' and codigo like '%$palabraDos%' and cantidad > 0 order by $ordenar";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_array($result)) {
                        ?>
                                <li>
                                    <a title="<?php echo $row['nombre'] ?>" href="agregarVenta.php?id=<?php echo $row['codigo'] ?>&folio=<?php echo $folio ?>&idVendedor=<?php echo $idVendedor ?>&idCliente=<?php echo $_GET['idCliente'] ?>">
                                        <span><?php echo $row['nombre'] ?></span>
                                        <span><?php echo $row['codigo'] ?></span>
                                        <span class="tamaño"><?php echo $row['tamanio'] ?> mm</span>
                                        <span><?php echo $row['cantidad'] ?></span>
                                    </a>
                                </li>
                            <?php }
                        } else {
                            $palabra = '';
                            $query = "SELECT * FROM tamanio WHERE nombre like '%$palabra%' and cantidad > 0 order by $ordenar";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_array($result)) {
                            ?>
                                <li>
                                    <a title="<?php echo $row['nombre'] ?>" href="agregarVenta.php?id=<?php echo $row['codigo'] ?>&folio=<?php echo $folio ?>&idVendedor=<?php echo $idVendedor ?>&idCliente=<?php echo $_GET['idCliente'] ?>">
                                        <span><?php echo $row['nombre'] ?></span>
                                        <span><?php echo $row['codigo'] ?></span>
                                        <span class="tamaño"><?php echo $row['tamanio'] ?> mm</span>
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
            <div id="marcaAgua">

            </div>
            <div class="header">
                <a href="https://implants-bionic.com/">
                    <img src="../img/logo.png" alt="">
                </a>
                <div class="fecha">
                    <p class="folio">Folio: <span id="folio"><?php echo $folio ?></span> </p>
                    <p>Fecha de venta:</p>
                    <p><?php
                        /* Set locale to Dutch */
                        setlocale(LC_ALL, 'es_mx.UTF-8');
                        echo strftime("%A %d %B %Y");
                        ?>
                    </p>dolar hoy <label id="resultado"><?php   echo $precioDoralPesos ?></label>
                </div>
            </div>

            <div class="productosPreChi">
                <div class="row sombra-bottom">
                    <div class="col-3">Codigo</div>
                    <div class="col-3">P.Unit.</div>
                    <div class="col-3">Pzas.</div>
                    <div class="col-3">$</div>
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
                            <p>$<?php echo $row['precio'] ?></p>
                        <?php } ?>
                    </div>
                    <div class="col-1 masmenos">
                        <div id="menos1">
                            <?php
                            $query = "SELECT * FROM venta where folio = $folio order by producto";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_array($result)) {
                            ?>
                                <p><a class="gato" href="editarCantidadVenta.php?codigo=<?php echo $row['codigo'] ?>&numero=-1&idVendedor=<?php echo $idVendedor ?>&idCliente=<?php echo $idCliente ?>&folio=<?php echo $folio ?>"><i class="bi bi-dash-circle-fill"></i></a></p>
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
                        <div id="mas1">
                            <?php
                            $query = "SELECT * FROM venta where folio = $folio order by producto";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_array($result)) {
                            ?>
                                <p><a class="gato" href="editarCantidadVenta.php?codigo=<?php echo $row['codigo'] ?>&numero=1&idVendedor=<?php echo $idVendedor ?>&idCliente=<?php echo $idCliente ?>&folio=<?php echo $folio ?>"><i class="bi bi-plus-circle-fill"></i></a></p>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-3">
                        <?php
                        $query = "SELECT * FROM venta where folio = $folio order by producto";
                        $result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                            <p><?php echo $row['precio'] * $row['cantidad'] ?></p>
                        <?php } ?>
                    </div>
                </div>
                <div class="row border-bottom rowTotal">
                    <div class="col-3"> </div>
                    <div class="col-3"> </div>
                    <div class="col-3 total"> Subtotal:</div>
                    <div class="col-3 total" id="totalF2"><?php echo $total ?></div>
                </div>
                <div class="row border-bottom rowTotal">
                    <div class="col-3"> </div>
                    <div class="col-3"><button id="ivaSi2">Si</button><button id="ivaNo2">No</button> </div>
                    <div class="col-3 total"> iva:</div>
                    <div class="col-3 total" id="iva2"><?php echo $total * $iva ?></div>
                </div>
                <div class="row border-bottom rowTotal">
                    <div class="col-3"> </div>
                    <div class="col-3"> </div>
                    <div class="col-3 total"> Total USD:</div>
                    <div class="col-3 total" id="totalFinal2"><?php echo $total + $total * $iva ?></div>
                </div>
                <div class="row border-bottom rowTotal">
                    <div class="col-3"> </div>
                    <div class="col-3"> </div>
                    <div class="col-3 total"> Total MXN:</div>
                    <div class="col-3 total" id="totalFinalMXN2"><?php echo round((($total + ($total * $iva)) * $precioDoralPesos),2) ?></div>
                </div>
            </div>

            <div class="productosPre">
                <div class="row sombra-bottom">
                    <div class="col-2">Codigo</div>
                    <div class="col-5">Producto</div>
                    <div class="col-1">P.Unit.</div>
                    <div class="col-2 text-center">Pzas.</div>
                    <div class="col-2 text-center">$</div>
                </div>

                <div class="row border-bottom">
                    <div class="col-2">
                        <?php
                        $query = "SELECT * FROM venta where folio = $folio order by producto";
                        $result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                            <p><?php echo $row['codigo'] ?></p>
                        <?php } ?>
                    </div>
                    <div class="col-5">
                        <?php
                        $query = "SELECT * FROM venta where folio = $folio order by producto";
                        $result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                            <p><?php echo $row['producto'] ?></p>
                        <?php } ?>
                    </div>
                    <div class="col-1 text-center">
                        <?php
                        $query = "SELECT * FROM venta where folio = $folio order by producto";
                        $result = mysqli_query($conn, $query);
                        $total = 0;
                        while ($row = mysqli_fetch_array($result)) {
                            $total += $row['precio'] * $row['cantidad'];
                        ?>
                            <p class="negrillas">$<?php echo $row['precio'] ?></p>
                        <?php } ?>
                    </div>
                    <div class="col-1 masmenos text-center">
                        <div id="menos2">
                            <?php
                            $query = "SELECT * FROM venta where folio = $folio order by producto";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_array($result)) {
                            ?>
                                <p>
                                    <a class="gato" href="editarCantidadVenta.php?codigo=<?php echo $row['codigo'] ?>&numero=-1&idVendedor=<?php echo $idVendedor ?>&idCliente=<?php echo $idCliente ?>&folio=<?php echo $folio ?>"><i class="bi bi-dash-circle-fill"></i></a>
                                </p>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-1">
                        <?php
                        $query = "SELECT * FROM venta where folio = $folio order by producto";
                        $result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                            <p>
                                <?php echo $row['cantidad'] ?>
                            </p>
                        <?php } ?>
                    </div>
                    <div class="col-1 masmenos">
                        <div id="mas2">
                            <?php
                            $query = "SELECT * FROM venta where folio = $folio order by producto";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_array($result)) {
                            ?>
                                <p>
                                    <a class="gato" href="editarCantidadVenta.php?codigo=<?php echo $row['codigo'] ?>&numero=1&idVendedor=<?php echo $idVendedor ?>&idCliente=<?php echo $idCliente ?>&folio=<?php echo $folio ?>"><i class="bi bi-plus-circle-fill"></i></a>
                                </p>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-1">
                        <?php
                        $query = "SELECT * FROM venta where folio = $folio order by producto";
                        $result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                            <p><?php echo $row['precio'] * $row['cantidad'] ?></p>
                        <?php } ?>
                    </div>
                </div>
                <div class="row border-bottom rowTotal">
                    <div class="col-2"> </div>
                    <div class="col-5"> </div>
                    <div class="col-1"> </div>
                    <div class="col-3 total"> Subtotal:</div>
                    <div class="col-1 total" id="totalF1"><?php echo $total ?></div>
                </div>
                <div class="row border-bottom rowTotal">
                    <div class="col-2"> </div>
                    <div class="col-5"> <button id="ivaSi1">Si</button><button id="ivaNo1">No</button> </div>
                    <div class="col-1"></div>
                    <div class="col-3 total"> iva:</div>
                    <div class="col-1 total" id="iva1"><?php echo $total * $iva ?></div>
                </div>
                <div class="row border-bottom rowTotal">
                    <div class="col-2"> </div>
                    <div class="col-5"> </div>
                    <div class="col-1"> </div>
                    <div class="col-3 total"> Total USD:</div>
                    <div class="col-1 total" id="totalFinal1"><?php echo $total + $total * $iva ?></div>
                </div>
                <div class="row border-bottom rowTotal">
                    <div class="col-2"> </div>
                    <div class="col-5"> </div>
                    <div class="col-1"> </div>
                    <div class="col-3 total"> Total MXN:</div>
                    <div class="col-1 total" id="totalFinalMXN1">
                        <?php echo round((($total + ($total * $iva)) * $precioDoralPesos),2) ?>
                    </div>
                </div>
            </div>

            <div class="espacio">
                <br>
            </div>
        </div>
    </div>
    <div class="botones">
        <button id="btnCrearPdfVenta" class="btnPresupuesto sombra">Finalizar Compra
        </button>
    </div>
    <?php
    include("footer.php");
    ?>

    <script src="scriptVenta.js"></script>
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../src/jquery-3.1.1.mini.js"></script>

</body>

</html>