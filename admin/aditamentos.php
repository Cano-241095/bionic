<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/aditamentos.css">
    <link rel="stylesheet" href="../css/variables.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Implants Bionic</title>
</head>

<body>
<?php
    include("header.php");
    ?>
    <?php
    include("conexion.php");
    if (isset($_GET['id_asociado'])) {
        $id_asociado = $_GET['id_asociado'];
        $titulo = $_GET['titulo'];
    }
    ?>
    <header>
        
    </header>
    <div class="container-fluid">
        <div class="row">
            <div class="col text-center fondo">
                <h1>Aditamentos</h1>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-12 col-md-7 mt-3">
                <!-- aqui hace una consulta utilizando id_asociado para ver que categoria es -->
                <?php
                $query2 = "SELECT * FROM soluciones_protesicas where id_categoria = $id_asociado";
                $result2 = mysqli_query($conn, $query2);
                while ($row2 = mysqli_fetch_array($result2)) {
                ?>
                <!-- imprime categoria -->
                <h2 class=""><?php echo $row2['nombre_categoria'] ?></h2>
                <?php } ?>
                <div class="card border border-dark">
                    <div class="card-body">
                        <form method="post" name="form" action="crearAditamentos.php" enctype="multipart/form-data">
                            <input class="d-none" type="text" name="titulo" value="<?php echo $titulo ?>">
                            <label class="d-none" for="">ID:</label>
                            <input class="form-control d-none" type="number" name="id" placeholder="Ingresar ID"
                                autocomplete="off" autofocus>
                            <label class="d-none" for="">ID Asociado:</label>
                            <input class="form-control d-none" type="number" name="id_asociado"
                                placeholder="Ingresar ID Asociado" value="<?php echo $id_asociado ?>" autocomplete="off"
                                required>
                            <label for="">Nombre del Aditamento:</label>
                            <input class="form-control" type="text" name="nombre_aditamento"
                                placeholder="Ingresar Nombre_aditamento" autocomplete="off" required>
                            <label for="">Imagen</label>
                            <input class="form-control" type="file" name="image" value="<?php echo $id_asociado?>" placeholder="Elige imagen"
                                autocomplete="off" required>
                            <label for="">Precio:</label>
                            <input class="form-control" type="number" name="precio" placeholder="Precio"
                                autocomplete="off" required>
                            <div class="row">
                                <div class="col-6">
                                    <input class="btn btn-secondary mt-3 w-100" type="submit" name="enviar"
                                        value="Guardar" id="seleccionArchivos" accept="image/*">
                                </div>
                                <div class="col-6">
                                    <input class="btn btn-secondary mt-3 w-100" type="reset" value=Limpiar>
                                </div>
                                <div class="col-12">
                                    <a class="btn btn-secondary mt-3 w-100" href="plantilla.php?id=<?php echo $id_asociado ?>&titulo=<?php $query2 = "SELECT * FROM soluciones_protesicas where id_categoria = $id_asociado";
                                    $result2 = mysqli_query($conn, $query2);
                                    $row2 = mysqli_fetch_array($result2);
                                    echo $row2['nombre_categoria'] ?>"> Atras </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>



            <div class="col-12 col-md-7 mt-3">
                <div class="card border border-dark cardAbajo">

                    <table>
                        <thead class="bg-dark">
                            <tr>
                                <th class="text-center text-white">Nombre de Aditamento</th>
                                <th class="text-center text-white">imagen</th>
                                <th class="text-center text-white">Precio</th>
                                <!-- <th class="text-center text-white">Acciones</th> -->



                            </tr>
                        </thead>

                        <tbody class="bg-white">
                            <?php
                            $query = "SELECT * FROM aditamentos where id_asociado = $id_asociado";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_array($result)) {
                            ?>
                            <tr class="">
                                <td class="text-center"><?php echo $row['nombre_aditamento'] ?></td>
                                <td class="text-center">
                                    <img class="imgAditamento" src="../img/aditamentos/<?php echo $row['url'] ?>"
                                        alt="">
                                </td>
                                <td class="text-center">$<?php echo $row['precio'] ?></td>

                                <td class="text-center">
                                    <!-- <a href="updateAditamento.php?id=<?php echo $row['id'] ?>" class="btn btn-light">
                                            <i class="bi bi-pencil-square iconoModificar"></i>
                                        </a> -->
                                    <!-- <a href="eliminarAditamento.php?id=<?php echo $row['id'] ?>" class="btn btn-ligth">
                                            <i class="bi bi-trash-fill iconoEliminar"></i>
                                        </a> -->
                                </td>

                            </tr>
                            <?php } ?>

                        </tbody>
                    </table>

                </div>


            </div>

        </div>



    </div>

    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>

    <?php
    include("footer.php");
    ?>
</body>

</html>