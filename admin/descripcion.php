<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/descripcion.css">
    <link rel="stylesheet" href="../css/variables.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Implants Bionic</title>
</head>
<body>
<?php
    include("header.php");
    ?>
    <div class="container-fluid">
        <?php
        include("conexion.php");
        $idAsociado = $_GET['id'];
        ?>

        <div class="row justify-content-center fondo">
            <div class="col-12 col-md-12 text-center">
                <h1>Descripción</h1>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-12 col-md-8 mt-3">
                <div class="card border border-dark">
                    <div class="card-body">
                        <form method="post" name="form" onsubmit="return validarform()" action="crearDescripcion.php">
                            <label for="" class="d-none">ID Asociado:</label>
                            <input class="form-control mt-3 d-none" type="number" name="id_asociado" placeholder="Ingresar IDAsociado" autocomplete="off" value="<?php echo $idAsociado ?>" required>
                            <label for="">Descripción:</label>
                            <input class="form-control mt-3" type="text" name="descripcion" placeholder="Ingresar Descripción" autocomplete="off" required>
                            <div class="row">
                                <div class="col-6">
                                    <input class="btn btn-secondary mt-3 w-100" type="submit" name="enviar" value="Guardar" id="seleccionArchivos" accept="image/*">
                                </div>
                                <div class="col-6">
                                    <input class="btn btn-secondary mt-3 w-100" type="reset" value=Limpiar>
                                </div>
                                <div class="col-12">
                                <a href="plantillaProducto.php?id=<?php echo $idAsociado ?>" class="btn btn-secondary mt-3 w-100">Atras</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>



            <div class="col-12 col-md-8 mt-3">
                <div class="card border border-dark cardAbajo">
                    <table>
                        <thead class="bg-dark">
                            <tr>
                                <th class="text-center text-white">Descripción</th>
                                <!-- <th class="text-center text-white">Acciones</th> -->
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            <?php
                            $query = "SELECT * FROM descripcion where id_asociado = $idAsociado";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_array($result)) {
                            ?>
                                <tr class="">
                                    <td class="text-center"><?php echo $row['descripcion'] ?></td>
                                    <!-- <td class="text-center">
                                        <a href="updateDescripcion.php?id=<?php echo $row['id'] ?>" class="btn btn-light">
                                            <i class="bi bi-pencil-square iconoModificar"></i>
                                        </a>
                                        <a href="eliminarDescripcion.php?id=<?php echo $row['id'] ?>" class="btn btn-ligth">
                                            <i class="bi bi-trash-fill iconoEliminar"></i>
                                        </a>
                                    </td> -->

                                </tr>
                            <?php } ?>

                        </tbody>
                    </table>

                </div>
            </div>
            <?php
    include("footer.php");
    ?>
        </div> 
<script src="../bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>