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
    <script src="../src/html2.min.js"></script>
</head>

<body>
    <?php
    include("header.php");
    include("conexion.php");
    $clienteElegido = 7331054723;

    if (isset($_GET['cliente'])) {
        $clienteElegido = $_GET['cliente'];
    }
    ?>
    <div class="contenedor" id="contenedor">
        <div class="miniContenedor">
            <div class="sombra" id="cliente">
                <div class="cliente">
                    <label for="">Cliente</label>
                    <select class="form-select" aria-label="Default select example">
                        <option selected value="informes.php?idCliente=7331054723">Seleccionar Cliente</option>
                        <?php
                        $query = "SELECT * FROM clientes ORDER BY nombre";
                        $result = mysqli_query($conn, $query);
                        while ($clientes = mysqli_fetch_array($result)) {
                        ?>
                            <option value="informes.php?cliente=<?php echo $clientes['id'] ?>"> <?php echo $clientes['nombre'] . " " . $clientes['apellidoP'] . " " . $clientes['apellidoM'] ?> </option>
                            <!-- agregue idcliente idvendedor falta usarlo al dar click en un producto  -->
                        <?php } ?>
                    </select>
                </div>
            </div>
        </div>

        <div id="imprimir" class="sombra">
            <p class="informe">
                        <!-- vendedor -->
                        <span>Vendedor</span>
                        <!-- vendedor -->
                        <span>Nota</span>
                        <!-- fecha -->
                        <span>Fecha</span>
                        
                        <span>Cliente</span>
                        <!-- codigo del producto -->
                        <span>Producto</span>
                        <!-- cantidad de producto -->
                        <span>Cantidad</span>
                        <!-- total -->
                        <span>Total</span>
                        </p>
            <?php
            if ($clienteElegido != 7331054723) {
                $query = "SELECT * FROM nota order by fecha";
                $result = mysqli_query($conn, $query);
                $total = 0;
                while ($row = mysqli_fetch_array($result)) {
                    // $total += $row['precio'] * $row['cantidad'];
            ?>
                    <p>
                        <span><?php echo $row['fecha'] ?></span>
                        <span><?php echo $row['total'] ?></span>
                    </p>
                <?php }
            } else {
                $query = "SELECT * FROM venta order by folio";
                $result = mysqli_query($conn, $query);
                $total = 0;
                while ($row = mysqli_fetch_array($result)) {
                    $total += $row['precio'] * $row['cantidad'];
                    $folio = $row['folio'];

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
                        <!-- vendedor -->
                        <span><?php echo $row3['nombre'] ?></span>
                        <!-- nota -->
                        <span class="centrar"><?php echo $row2['id'] ?></span>
                        <!-- fecha -->
                        <span class="centrar"><?php echo $row2['fecha'] ?></span>

                        <span><?php echo $row4['nombre'] ?></span>
                        <!-- codigo del producto -->
                        <span title="<?php echo $row['producto'] ?>"><?php echo $row['codigo'] ?></span>
                        <!-- cantidad de producto -->
                        <span class="centrar"><?php echo $row['cantidad'] ?></span>
                        <!-- total -->
                        <span class="centrar">$<?php echo $total ?></span>

                    </p>
            <?php }
            } ?>
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

    <?php
    include("footer.php");
    ?>

    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../src/jquery-3.1.1.mini.js"></script>
    <script src="scriptInforme.js"></script>

</body>

</html>