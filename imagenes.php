<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/imagenes.css">
    <link rel="stylesheet" href="css/variables.css">
    <title>Implants Bionic</title>
</head>


<body>
    <div class="container-fluid">


        <div class="row justify-content-center fondo">
            <div class="col-12 col-md-12 text-center">
                <h1>Imagenes</h1>
            </div>
        </div>

        <div class="row">

            <div class="col-12 col-md-5 justify-content-center">

                <div class="card border-dark">
                    <div class="card-body">

                        <form method="post" name="form" action="crearImagenes.php" enctype="multipart/form-data">

                            <h2>Imagenes</h2>
                            <input class="form-control" type="number" name="id_asociado"
                                placeholder="Ingresar ID asociado" autocomplete="off" autofocus>

                            <input class="form-control" type="number" name="id" placeholder="Ingresar ID unico"
                                autocomplete="off" autofocus>
                            <input class="form-control mt-3" type="file" name="image" placeholder="Elige imagen"
                                autocomplete="off" required>

                            <input class="btn btn-outline-dark mt-3" type="submit" name="enviar2" value="Enviar"
                                id="seleccionArchivos" accept="image/*">

                            <input class="btn btn-outline-dark mt-3" type="reset" value=Limpiar>
                        </form>
                    </div>

                </div>
            </div>



            <div class="col-12 col-md-7 mt-3 justify-content-center">
                <div class="card border border-dark">

                    <table>
                        <thead class="bg-dark">
                            <tr>
                                <th class="text-center text-white">ID</th>
                                <th class="text-center text-white">ID Asociado</th>
                                <th class="text-center text-white">Imagen</th>
                                <th class="text-center text-white">Acciones</th>
                            </tr>
                        </thead>

                        <tbody class="bg-white">
                            <?php 
                                        include("conexion.php");
                                        $query = "SELECT * FROM imagenes";
                                        $result = mysqli_query($conn, $query);
                                        while($row = mysqli_fetch_array($result)){ 
                                            
                                     ?>
                            <tr class="">
                                <td class="text-center"><?php echo $row['id'] ?></td>
                                <td class="text-center"><?php echo $row['id_asociado'] ?></td>
                                <td class="text-center">
                                    <img src="img/<?php echo $row['imagen'] ?>" alt="">
                                </td>
                                <td class="text-center">

                                    <a href="eliminarImagenes.php?id=<?php echo $row['id']?>" class="btn btn-ligth">
                                        <i class="bi bi-trash-fill iconoEliminar"></i>
                                    </a>
                                </td>

                            </tr>
                            <?php } ?>

                        </tbody>
                    </table>

                </div>


            </div>

        </div>

    </div>



    <script src="bootstrap/js/bootstrap.js.min"></script>
</body>

</html>