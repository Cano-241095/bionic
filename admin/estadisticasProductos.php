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

                <label for="">Nombre</label>
                <input type="text" value="<?php echo $inputUno ?>" name="palabra" autocomplete="off" placeholder="Ejemplo: Implante">

                <label for="">Codigo</label>
                <input type="text" value="<?php echo $inputDos ?>" name="palabraDos" autocomplete="off" placeholder="Ejemplo: Implante">

                <button name="buscar"><i class="bi bi-search"></i> Buscar</button>
            </form>
        </div>

        <div class="productos">
            <p class="titulo">
                <span> <a href="estadisticasProductos.php?ordenar=codigo&palabra=<?php echo $inputUno ?>&palabraDos=<?php echo $inputDos ?>"> codigo  </a></span>
                <span> <a href="estadisticasProductos.php?ordenar=tamanio&palabra=<?php echo $inputUno ?>&palabraDos=<?php echo $inputDos ?>"> tamaño  </a></span>
                <span> <a href="estadisticasProductos.php?ordenar=cantidad&palabra=<?php echo $inputUno ?>&palabraDos=<?php echo $inputDos ?>"> cantidad</a></span>
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
                            <p title="<?php echo $row['nombre'] ?>" href="">
                                <span title="<?php echo $row['nombre'] ?>"><?php echo $row['codigo'] ?></span>
                                <span class="tamaño"><?php echo $row['tamanio'] ?> mm</span>
                                <span><?php echo $row['cantidad'] ?></span>
                            </p>
                        </li>
                    <?php }
                } else {
                    $palabra = '';
                    $query = "SELECT * FROM tamanio WHERE nombre like '%$palabra%' order by $ordenar";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <li>
                            <p title="<?php echo $row['nombre'] ?>" href="">
                                <span title="<?php echo $row['nombre'] ?>"><?php echo $row['codigo'] ?></span>
                                <span class="tamaño"><?php echo $row['tamanio'] ?> mm</span>
                                <span><?php echo $row['cantidad'] ?></span>
                            </p>
                        </li>
                <?php }
                } ?>
            </ul>
        </div>
    </main>

    <?php include("footer.php"); ?>
</body>

</html>