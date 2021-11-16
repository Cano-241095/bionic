<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/variables.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/plantilla.css">
</head>

<body>
    <?php
     include("header.php");
    $idAsociado = $_GET['id'];
    $titulo = $_GET['titulo'];

    ?>

    <h1> <?php echo $titulo ?> </h1>
    <main>


        <?php
        include("conexion.php");
        $query = "SELECT * FROM aditamentos where id_asociado = $idAsociado";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_array($result)) {
        ?>
        <div class="producto">
            <h2> <?php echo $row['nombre_aditamento'] ?></h2>
            <h3> $<?php echo $row['precio'] ?>.00</h3>
            <h4>$27.84</h4>
            <img src="img/aditamentos/<?php echo $row['url'] ?>" alt="">
        </div>


        <?php } ?>
        <button>
            <p>Saber más</p>
        </button>
        <button>
            <p>Saber más</p>
        </button>
        <button>
            <p>Saber más</p>
        </button>
    </main>

    <?php
    include("footer.php");
    ?>
</body>

</html>