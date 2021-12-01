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
            <form action="presupuesto.php" method="POST">
                <h4 for="">Busqueda</h4>
                <label for="">Palabra Clave</label>
                <input type="text" value="<?php echo $inputUno ?>" name="palabra" autocomplete="off" placeholder="Ejemplo: Implante">
                <label for="">Segunda Palabra Clave</label>
                <input type="text" value="<?php echo $inputDos ?>" name="palabraDos" autocomplete="off" placeholder="Ejemplo: Implante">
                <button name="buscar"><i class="bi bi-search"></i> Buscar</button>
            </form>
            <ul>
                <?php
                if (isset($_POST['palabra'])) {
                    $palabra = $_POST['palabra'];
                    $palabraDos = $_POST['palabraDos'];
                    $query = "SELECT * FROM tamanio WHERE codigo like '%$palabra%' and tamanio like '%$palabraDos%' order by codigo";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_array($result)) {
                ?>
                        <li>
                            <a href="agregarPresupuesto.php?id=<?php echo $row['codigo'] ?>">
                                <?php echo $row['tamanio'].'-'.$row['codigo'] ?>
                            </a>
                        </li>
                    <?php }
                } else {
                    $palabra = '';
                    $query = "SELECT * FROM tamanio WHERE codigo like '%$palabra%' order by codigo";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <li><a href="agregarPresupuesto.php?id=<?php echo $row['codigo'] ?>"><?php echo $row['codigo'] ?></a></li>
                <?php }
                } ?>
            </ul>
        </div>
        <div class="presupuesto sombra">
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
        </div>
    </div>

    <?php
    include("footer.php");
    ?>
</body>

</html>