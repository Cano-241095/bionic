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
    <script src="script.js"></script>
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

    <div class="contenedor">
        <div class="busqueda sombra">
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
                            <span>Producto</span>
                            <span>Codigo</span>
                            <span>Tamaño</span>
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
                <img src="../img/logo.png" alt="">
                <div class="fecha">
                    <p>Fecha de presupuesto:</p>
                    <p><?php

                        /* Set locale to Dutch */
                        setlocale(LC_ALL, 'es_mx.UTF-8');
                        /* Output: vrijdag 22 december 1978 */
                        echo strftime("%A %d %B %Y",);
                        ?></p>
                </div>
            </div>
            <div class="productosPre">
                <div class="row sombra-bottom">
                    <div class="col-2">Codigo</div>
                    <div class="col-5">Producto</div>
                    <div class="col-2">P.Unit.</div>
                    <div class="col-1">Pzas.</div>
                    <div class="col-2">Total</div>
                </div>

                <script>
                    var total = 0
                    var sumados = {}
                </script>

                <?php
                $query = "SELECT * FROM presupuesto order by producto";
                $result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_array($result)) { ?>
                    <div class="row border-bottom">
                        <div class="col-2"><?php echo $row['codigo'] ?></div>
                        <div class="col-5"><?php echo $row['producto'] ?></div>
                        <div class="col-2"><?php echo $row['precio'] ?></div>
                        <div class="col-1" id="x"><input id="<?php echo "id" . $row['codigo'] ?>" type="number" min="0" name=""></div>
                        <div class="col-2"></div>
                    </div>
                    <script>
                        document.querySelector('#<?php echo "id" . $row['codigo'] ?>')
                            .addEventListener('keyup', e => {
                                let subtotal = Number(e.target.parentElement.previousElementSibling.innerText) * e.target.value;

                                sumados['<?php echo "id" . $row['codigo'] ?>'] = subtotal;

                                total = 0
                                Object.keys(sumados).map(elemento => {
                                    console.log({
                                        elemento: sumados[elemento]
                                    });
                                    total += Number(sumados[elemento])
                                })
                                document.querySelector('#totalFinal').innerText = total;

                                e.target.parentElement.nextElementSibling.innerText = subtotal
                            })
                            document.querySelector('#<?php echo "id" . $row['codigo'] ?>')
                            .addEventListener('keypress', e => {
                                let subtotal = Number(e.target.parentElement.previousElementSibling.innerText) * e.target.value;

                                sumados['<?php echo "id" . $row['codigo'] ?>'] = subtotal;

                                total = 0
                                Object.keys(sumados).map(elemento => {
                                    console.log({
                                        elemento: sumados[elemento]
                                    });
                                    total += Number(sumados[elemento])
                                })
                                document.querySelector('#totalFinal').innerText = total;

                                e.target.parentElement.nextElementSibling.innerText = subtotal
                            })
                    </script>
                <?php } ?>
                <div class="row border-bottom rowTotal">
                    <div class="col-2"> </div>
                    <div class="col-5"> </div>
                    <div class="col-2"> </div>
                    <div class="col-1 total"> $ </div>
                    <div class="col-2 total" id="totalFinal"></div>
                </div>
            </div>
        </div>
        <button id="btnCrearPdf">Descargar Presupuesto</button>
    </div>

    <?php
    include("footer.php");
    ?>

</body>

</html>