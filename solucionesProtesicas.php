<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/soluciones.css">
    <link rel="stylesheet" href="css/variables.css">
    <link rel="shortcut icon" href="img/logo-png.ico">

    <title>Implants Bionic</title>
</head>


<body>
    <div class="container-fluid">

        <div class="row justify-content-center fondo">
            <div class="col-12 col-md-12 text-center">
                <h1>Soluciones Protésicas</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-4 mt-3">
                <div class="card border border-dark">
                    <div class="card-body">
                        <form method="post" name="form" onsubmit="return validarform()" action="crearSoluciones.php">

                            <label for="">ID Categoria:</label>
                            <input class="form-control" type="number" name="id_categoria" placeholder="Ingresar ID"
                                autocomplete="off" autofocus>
                            <label for="">Nombre Categoria:</label>
                            <input class="form-control mt-3" type="text" name="nombre_categoria"
                                placeholder="Ingresar nombre" autocomplete="off" required>
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
                                <th class="text-center text-white">ID_Categoria</th>
                                <th class="text-center text-white">Nombre_Categoria</th>
                                <th class="text-center text-white">Acciones</th>
                            </tr>
                        </thead>

                        <tbody class="bg-white">
                            <?php 
                                        include("conexion.php");
                                        $query = "SELECT * FROM soluciones_protesicas";
                                        $result = mysqli_query($conn, $query);
                                        while($row = mysqli_fetch_array($result)){ 
                                    ?>
                            <tr class="">
                                <td class="text-center"><?php echo $row['id_categoria'] ?></td>
                                <td class="text-center"><?php echo $row['nombre_categoria'] ?></td>
                                <td class="text-center">
                                    <a href="updateSolucionesProtesicas.php?id_categoria=<?php echo $row['id_categoria']?>"
                                        class="btn btn-light">
                                        <i class="bi bi-pencil-square iconoModificar"></i>
                                    </a>
                                    <a href="eliminarSolucionesProtesicas.php?id_categoria=<?php echo $row['id_categoria']?>"
                                        class="btn btn-ligth">
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