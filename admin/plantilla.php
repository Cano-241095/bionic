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
                <h3> $<?php echo $row['precio'] ?></h3>
                <h4>$<span class="x">27</span></h4>
                <img src="../img/aditamentos/<?php echo $row['url'] ?>" alt="">

                <a href="updateAditamentos.php?id=<?php echo $row['id'] ?>&titulo=<?php echo $titulo ?>" class="btn btn-light">
                    <i class="bi bi-pencil-square iconoModificar"></i>
                </a>
                <a href="eliminarAditamento.php?id=<?php echo $row['id'] ?>" class="btn btn-ligth" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="bi bi-trash-fill iconoEliminar"></i>
                </a>
                <a class="mas" href="plantillaProducto.php?id=<?php echo $row['id'] ?>">
                    <p>Saber más</p>
                </a>

            </div>

        <?php } ?>
        <a class="btn-mas" href="aditamentos.php">
            <p>+</p>
        </a>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php
    include("footer.php");
    ?>
    <script>
        var list = document.querySelectorAll(".x");
        console.log(list);

        list.child.foreach(item => {
            console.log(item);
        })

        var n = Number(num).toFixed(2);
        document.querySelector(".x").innerText = n;
        console.log("prueba");
    </script>

</body>

</html>