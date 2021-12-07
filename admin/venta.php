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
    $ordenar = 'nombre';
    if (isset($_POST['palabra'])) {
        $inputUno = $_POST['palabra'];
        $inputDos = $_POST['palabraDos'];
        $ordenar = 'cantidad';
    }
    $query = "SELECT * FROM nota ORDER BY ID DESC LIMIT 1";
    $result = mysqli_query($conn, $query);
    $nota = mysqli_fetch_array($result);
    
    ?>
    <div class="contenedor" id="contenedor">
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
                <button name="buscar"><i class="bi bi-search"></i> Buscar</button><ul class="encabezado">
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
                                <a href="agregarVenta.php?id=<?php echo $row['codigo'] ?>&folio=<?php echo $nota['id']+1 ?>">
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
                                <a href="agregarVenta.php?id=<?php echo $row['codigo'] ?>&folio=<?php echo $nota['id']+1 ?>">
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

        <div id="imprimir" class="nota sombra">
            <div class="header">
                <a href="https://implants-bionic.com/">
                    <img src="../img/logo.png" alt="">
                </a>
                <div class="fecha">
                        <p class="folio">Folio: <?php echo $nota['id']+1 ?></p>
                    <p>Fecha de presupuesto:</p>
                    <p><?php
                        /* Set locale to Dutch */
                        setlocale(LC_ALL, 'es_mx.UTF-8');
                        /* Output: vrijdag 22 december 1978 */
                        echo strftime("%A %d %B %Y",);
                        ?></p>
                </div>
            </div>
            
            <!-- ingresar codigo de consulta -->
            
            <div class="espacio">
                <br>
            </div>
        </div>
    </div>
    <div class="botones">
        <button id="btnCrearPdfVenta" class="btnPresupuesto sombra">Descargar Presupuesto</button>
        <!-- <a id="volver" href="eliminarPresupuesto.php" class="btnPresupuesto sombra">Regresar</a> -->
    </div>
    <?php
    include("footer.php");
    ?>

    <script src="script.js"></script>
</body>

</html>