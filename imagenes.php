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
    <title>Imagenes</title>
</head>


<body>
    <div class="container-fluid">


        <div class="row justify-content-center fondo">
            <div class="col-12 col-md-12 text-center">
                <h1>Imagenes</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-4 mt-3">
                <div class="card border border-dark">
                    <div class="card-body">
                        <form method="post" name="form" onsubmit="return validarform()" action="crearImagenes.php">

                            <label for="">ID:</label>
                            <input class="form-control" type="number" name="id" placeholder="Ingresar ID"
                                autocomplete="off" autofocus>
                            <label for="">ID Asociado:</label>
                            <input class="form-control" type="number" name="id_asociado"
                                placeholder="Ingresar ID_Asociado" autocomplete="off" required>
                            <label for="">imagen:</label>
                            <input class="form-control" type="file" name="imagen"
                                placeholder="Selecciona Imagen" autocomplete="off" required>

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
                                <td class="text-center"><?php echo $row['imagen'] ?></td>
                                <td class="text-center">
                                    <a href="updateImagenes.php?id=<?php echo $row['id']?>" class="btn btn-light">
                                        <i class="bi bi-pencil-square iconoModificar"></i>
                                    </a>
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
    

            <script src="bootstrap/js/bootstrap.js.min"></script>
</body>

</html>