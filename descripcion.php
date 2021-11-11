<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/descripcion.css">
    <link rel="stylesheet" href="css/variables.css">
    <title>Descripcion</title>
</head>


<body>
    <div class="container-fluid">


        <div class="row justify-content-center fondo">
            <div class="col-12 col-md-12 text-center">
                <h1>Descripcion</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-12 mt-3">
                <div class="card border border-dark">
                    <div class="card-body">
                        <form method="post" name="form" onsubmit="return validarform()" action="crearDescripcion.php">

                            <label for="">ID:</label>
                            <input class="form-control" type="number" name="id_categoria" placeholder="Ingresar ID"
                                autocomplete="off" autofocus>
                            <label for="">ID Asociado:</label>
                            <input class="form-control mt-3" type="number" name="id_asociado"
                                placeholder="Ingresar IDAsociado" autocomplete="off" required>
                            <label for="">Descripción:</label>
                            <input class="form-control mt-3" type="text" name="descripcion"
                                placeholder="Ingresar Descripcion" autocomplete="off" required>

                            <input class="btn btn-outline-secondary mt-3" type="submit" name="enviar" value="Enviar"
                                id="seleccionArchivos" accept="image/*">

                            <input class="btn btn-outline-secondary mt-3" type="reset" value=Limpiar>
                        </form>
                    </div>
                </div>
            </div>



            <div class="col-12 col-md-12 mt-3">
                <div class="card border border-dark">

                    <table>
                        <thead class="bg-dark">
                            <tr>
                                <th class="text-center text-white">ID</th>
                                <th class="text-center text-white">ID Asociado</th>
                                <th class="text-center text-white">Descripcion</th>
                                <th class="text-center text-white">Acciones</th>
                            </tr>
                        </thead>

                        <tbody class="bg-white">
                            <?php 
                                        include("conexion.php");
                                        $query = "SELECT * FROM descripcion";
                                        $result = mysqli_query($conn, $query);
                                        while($row = mysqli_fetch_array($result)){ 
                                           
                                     ?>
                            <tr class="">
                                <td class="text-center"><?php echo $row['id'] ?></td>
                                <td class="text-center"><?php echo $row['id_asociado'] ?></td>
                                <td class="text-center"><?php echo $row['descripcion'] ?></td>
                                <td class="text-center">
                                    <a href="updateDescripcion.php?id=<?php echo $row['id']?>" class="btn btn-light">
                                        <i class="bi bi-pencil-square iconoModificar"></i>
                                    </a>
                                    <a href="eliminarDescripcion.php?id=<?php echo $row['id']?>" class="btn btn-ligth">
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