<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/aditamentos.css">
    <link rel="stylesheet" href="css/variables.css">
    <link rel="shortcut icon" href="img/logo-png.ico">

    <title>Implants Bionic</title>
</head>

<body>
    <header></header>
    <div class="container-fluid">
        <div class="row justify-content-center fondo">
            <div class="col text-center">
                <h1>Aditamentos</h1>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-12 col-md-4 mt-3">
                <d+iv class="card border border-dark">
                    <div class="card-body">
                        <form method="post" name="form" action="crearAditamentos.php" enctype="multipart/form-data">

                            <label for="">ID:</label>
                            <input class="form-control" type="number" name="id" placeholder="Ingresar ID"
                                autocomplete="off" autofocus>
                            <label for="">ID Asociado:</label>
                            <input class="form-control" type="number" name="id_asociado"
                                placeholder="Ingresar ID Asociado" autocomplete="off" required>
                            <label for="">Nombre del Aditamento:</label>
                            <input class="form-control" type="text" name="nombre_aditamento"
                                placeholder="Ingresar Nombre_aditamento" autocomplete="off" required>
                            <label for="">Imagen</label>
                            <input class="form-control" type="file" name="image" placeholder="Elige imagen"
                                autocomplete="off" required>
                            <label for="">Precio:</label>
                            <input class="form-control" type="number" name="precio" placeholder="Precio"
                                autocomplete="off" required>

                            <input class="btn btn-outline-secondary mt-3" type="submit" name="enviar" value="Enviar"
                                id="seleccionArchivos" accept="image/*">

                            <input class="btn btn-outline-secondary mt-3" type="reset" value=Limpiar>

                        </form> 
                    </div>
                </div>
            </div>



            <div class="col-12 col-md-8 mt-3">
                <div class="card border border-dark">

                    <table>
                        <thead class="bg-dark">
                            <tr>
                                <th class="text-center text-white">ID</th>
                                <th class="text-center text-white">ID Asociado</th>
                                <th class="text-center text-white">Nombre de Aditamento</th>
                                <th class="text-center text-white">imagen</th>
                                <th class="text-center text-white">Precio</th>
                                <th class="text-center text-white">Acciones</th>



                            </tr>
                        </thead>

                        <tbody class="bg-white">
                            <?php 
                                        include("conexion.php");
                                        $query = "SELECT * FROM aditamentos";
                                        $result = mysqli_query($conn, $query);
                                        while($row = mysqli_fetch_array($result)){ 
                                    
                                    ?>
                            <tr class="">
                                <td class="text-center"><?php echo $row['id'] ?></td>
                                <td class="text-center"><?php echo $row['id_asociado'] ?></td>
                                <td class="text-center"><?php echo $row['nombre_aditamento'] ?></td>
                                <td class="text-center">
                                    <img class="imgAditamento" src="img/aditamentos/<?php echo $row['url'] ?>" alt="">
                            </td>
                                <td class="text-center"><?php echo $row['precio'] ?></td>

                                <td class="text-center">
                                    <a href="updateAditamentos.php?id=<?php echo $row['id']?>" class="btn btn-light">
                                        <i class="bi bi-pencil-square iconoModificar"></i>
                                    </a>
                                    <a href="eliminarAditamento.php?id=<?php echo $row['id']?>" class="btn btn-ligth">
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







    <script src="bootstrap/js/bootstrap.bundle.js"></script>
</body>

</html>