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
    <link rel="stylesheet" href="css/informe.css">
    <link rel="shortcut icon" href="img/logo-png.ico">

    <script src="../src/html2.min.js"></script>
</head>

<body>
    <?php
    include("header.php");
    include("conexion.php");
    $clienteElegido = 7331054723;
    $nota = 7331054723;

    if (isset($_POST['idCliente'])) {
        $clienteElegido = $_POST['idCliente'];
    }
    if (isset($_POST['nota'])) {
        $nota = $_POST['nota'];
    }
    $mes = '';
    $semana = '';
    if (isset($_GET['mes'])) {
        $mes = $_GET['mes'];
        $queryFecha = "SELECT * FROM nota WHERE fecha like '%$mes%' order by id DESC";
    }
    if (isset($_GET['semana'])) {
        $semana = $_GET['semana'];
        $queryFecha = "SELECT * FROM nota WHERE WEEK(fecha) = WEEK('$semana')";
    }
    echo $queryFecha;
    ?>
    <div class="container-fluid">

        <div class="contenedor" id="contenedor">
            <div class="miniContenedor">
                <div class="sombra" id="cliente">
                    <div class="cliente">
                        <form class="" action="informes.php" method="post">
                            <select name="idCliente" class="form-select" aria-label="Default select example">
                                <option selected value="7331054723">Seleccionar Cliente</option>
                                <?php
                                    $query = "SELECT * FROM clientes ORDER BY nombre";
                                    $result = mysqli_query($conn, $query);
                                    while ($clientes = mysqli_fetch_array($result)) {
                                    ?>
                                <option value="<?php echo $clientes['id'] ?>">
                                    <?php echo $clientes['nombre'] . " " . $clientes['apellidoP'] . " " . $clientes['apellidoM'] ?>
                                </option>
                                <!-- agregue idcliente idvendedor falta usarlo al dar click en un producto  -->
                                <?php } ?>
                            </select>
                            <button class="" type="submit">Buscar</button>
                        </form>
                        <form action="informes.php" class="mt-2" method="get">
                            <input class="form-control" type="month" min="2022-01" name="mes" id="mes">
                            <button type="submit">ok</button>
                        </form>
                        <form action="informes.php" class="mt-2" method="get">
                            <input class="form-control" type="date" name="semana" id="semana">
                            <button type="submit">ok</button>
                        </form>
                    </div>
                </div>
            </div>
            <div id="imprimir" class="sombra">
                <p class="informe titulos">
                    <!-- vendedor -->
                    <span class="pequeño text-center">Nota</span>
                    <!-- vendedor -->
                    <span>Vendedor</span>
                    <!-- fecha -->
                    <span class="text-center d-noneP">Fecha</span>

                    <span class="d-noneP">Cliente</span>
                    <!-- codigo del producto -->
                    <span class="">Producto</span>
                    <!-- cantidad de producto -->
                    <span class="pequeño">Cant.</span>
                    <!-- total -->
                    <span class="pequeño text-center">Total</span>
                </p>
                <div class="scroll">
                    <?php
                    if ($clienteElegido != 7331054723) {
                        $query = "SELECT * FROM nota WHERE id_cliente = $clienteElegido order by id DESC";
                        $result = mysqli_query($conn, $query);
                        $total = 0;
                        while ($row = mysqli_fetch_array($result)) {
                            // $total += $row['precio'] * $row['cantidad'];
                            $idVendedor = $row['id_vendedor'];
                            $idCliente = $row['id_cliente'];

                            $query3 = "SELECT * FROM vendedores WHERE id = $idVendedor";
                            $result3 = mysqli_query($conn, $query3);
                            $row3 = mysqli_fetch_array($result3);

                            $query4 = "SELECT * FROM clientes WHERE id = $idCliente";
                            $result4 = mysqli_query($conn, $query4);
                            $row4 = mysqli_fetch_array($result4);

                            $nota = $row['id'];

                            $query5 = "SELECT * FROM venta WHERE folio = $nota";
                            $result5 = mysqli_query($conn, $query5);
                            while ($row5 = mysqli_fetch_array($result5)) {
                                $total = $row5['precio'] * $row5['cantidad'];
                                // $query3 = "SELECT * FROM vendedores WHERE id = $idVendedor";
                                // $result3 = mysqli_query($conn, $query3);
                                // $row3 = mysqli_fetch_array($result3);
                                // $query4 = "SELECT * FROM clientes WHERE id = $idCliente";
                                // $result4 = mysqli_query($conn, $query4);
                                // $row4 = mysqli_fetch_array($result4);
                    ?>
                    <p class="informe">
                        <!-- nota -->
                        <span class="centrar pequeño"><?php echo $row['id'] ?></span>
                        <!-- vendedor -->
                        <span><?php echo $row3['nombre'] ?></span>
                        <!-- fecha -->
                        <span class="centrar d-noneP"><?php echo $row['fecha'] ?></span>

                        <span class="d-noneP"><?php echo $row4['nombre'] ?></span>
                        <!-- codigo del producto -->
                        <span class="" title="<?php echo $row5['producto'] ?>"><?php echo $row5['codigo'] ?></span>
                        <!-- cantidad de producto -->
                        <span class="centrar pequeño"><?php echo $row5['cantidad'] ?></span>
                        <!-- total -->
                        <span class="centrar pequeño">$<?php echo $total ?></span>
                    </p>
                    <?php }
                        }
                    } else {
                        if ($mes != '') {
                            $resultFecha = mysqli_query($conn, $queryFecha);
                            $total = 0;
                            while ($row = mysqli_fetch_array($resultFecha)) {
                                // $total += $row['precio'] * $row['cantidad'];
                                $idVendedor = $row['id_vendedor'];
                                $idCliente = $row['id_cliente'];
    
                                $query3 = "SELECT * FROM vendedores WHERE id = $idVendedor";
                                $result3 = mysqli_query($conn, $query3);
                                $row3 = mysqli_fetch_array($result3);
    
                                $query4 = "SELECT * FROM clientes WHERE id = $idCliente";
                                $result4 = mysqli_query($conn, $query4);
                                $row4 = mysqli_fetch_array($result4);
    
                                $nota = $row['id'];
    
                                $query5 = "SELECT * FROM venta WHERE folio = $nota";
                                $result5 = mysqli_query($conn, $query5);
                                while ($row5 = mysqli_fetch_array($result5)) {
                                    $total = $row5['precio'] * $row5['cantidad'];
                                    // $query3 = "SELECT * FROM vendedores WHERE id = $idVendedor";
                                    // $result3 = mysqli_query($conn, $query3);
                                    // $row3 = mysqli_fetch_array($result3);
                                    // $query4 = "SELECT * FROM clientes WHERE id = $idCliente";
                                    // $result4 = mysqli_query($conn, $query4);
                                    // $row4 = mysqli_fetch_array($result4);
                        ?>
                        <p class="informe">
                            <!-- nota -->
                            <span class="centrar pequeño"><?php echo $row['id'] ?></span>
                            <!-- vendedor -->
                            <span><?php echo $row3['nombre'] ?></span>
                            <!-- fecha -->
                            <span class="centrar d-noneP"><?php echo $row['fecha'] ?></span>
    
                            <span class="d-noneP"><?php echo $row4['nombre'] ?></span>
                            <!-- codigo del producto -->
                            <span class="" title="<?php echo $row5['producto'] ?>"><?php echo $row5['codigo'] ?></span>
                            <!-- cantidad de producto -->
                            <span class="centrar pequeño"><?php echo $row5['cantidad'] ?></span>
                            <!-- total -->
                            <span class="centrar pequeño">$<?php echo $total ?></span>
                        </p>
                        <?php }
                     }}else{
                        // echo 'default';
                        $queryGeneral = "SELECT * FROM venta order by folio DESC";
                        $resultGeneral = mysqli_query($conn, $queryGeneral);
                        while ($rowGeneral = mysqli_fetch_array($resultGeneral)) {
                            $total = 0;
                            $total += $rowGeneral['precio'] * $rowGeneral['cantidad'];
                            $folio = $rowGeneral['folio'];

                            $query2 = "SELECT * FROM nota WHERE id = $folio";
                            $result2 = mysqli_query($conn, $query2);
                            $row2 = mysqli_fetch_array($result2);

                            $idVendedor = $row2['id_vendedor'];
                            $idCliente = $row2['id_cliente'];

                            $query3 = "SELECT * FROM vendedores WHERE id = $idVendedor";
                            $result3 = mysqli_query($conn, $query3);
                            $row3 = mysqli_fetch_array($result3);

                            $query4 = "SELECT * FROM clientes WHERE id = $idCliente";
                            $result4 = mysqli_query($conn, $query4);
                            $row4 = mysqli_fetch_array($result4);
                        ?>

                    <p class="informe">
                        <!-- nota -->
                        <span class="centrar pequeño"><?php echo $row2['id'] ?></span>
                        <!-- vendedor -->
                        <span><?php echo $row3['nombre'] ?></span>
                        <!-- fecha -->
                        <span class="centrar d-noneP"><?php echo $row2['fecha'] ?></span>

                        <span class="d-noneP"><?php echo $row4['nombre'] ?></span>
                        <!-- codigo del producto -->
                        <span class=""
                            title="<?php echo $rowGeneral['producto'] ?>"><?php echo $rowGeneral['codigo'] ?></span>
                        <!-- cantidad de producto -->
                        <span class="centrar pequeño"><?php echo $rowGeneral['cantidad'] ?></span>
                        <!-- total -->
                        <span class="centrar pequeño">$<?php echo $total ?></span>
                    </p>
                    <?php
                    }}
                    } ?>
                </div>
                <div class="espacio">
                    <br>
                </div>
            </div>
        </div>
        <div class="botones">
            <!-- falta cambiar el folio para poder usar otra nota -->
            <!-- <button id="btnCrearPdfVenta" class="btnPresupuesto sombra">Finalizar Compra
        </button> -->
            <!-- <a href="consulta.php" class="btnPresupuesto sombra">Regresar</a> -->
        </div>
    </div>
    <?php
    include("footer.php");
    ?>

    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../src/jquery-3.1.1.mini.js"></script>
    <script src="scriptInforme.js"></script>

</body>

</html>