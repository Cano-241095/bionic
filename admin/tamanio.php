<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/tamanio.css">
    <link rel="stylesheet" href="../css/variables.css">
    <title>Tamaño</title>
</head>
<?php 
$id_asociado= $_GET['id'];
?>

<body>
    <div class="container-fluid">
        <div class="row justify-content-center fondo">
            <div class="col-12 col-md-12 text-center">
                <h1>Tamaño</h1>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <div class="card border border-dark mt-3">
                    <div class="card-body">
                        <form method="post" name="form" onsubmit="return validarform()" action="crearTamanio.php">
                            <label class="d-none" for="">ID Asociado:</label>
                            <input class="form-control d-none" type="number" name="id_asociado" value="<?php echo $id_asociado?>" placeholder="Ingresar Asociado"
                                autocomplete="off" autofocus>
                            <label for="">Codigo:</label>
                            <input class="form-control" type="text" name="codigo" placeholder="Ingresar codigo"
                                autocomplete="off" required>
                            <label for="">Tamaño:</label>
                            <input class="form-control" type="text" name="tamanio" placeholder="Ingresar tamanio"
                                autocomplete="off" required>
                            <label for="">Cantidad:</label>
                            <input class="form-control" type="number" name="cantidad" placeholder="Ingresar cantidad"
                                autocomplete="off" required>

                            <input class="btn btn-secondary mt-3 w-100" type="submit" name="enviar" value="Guardar"
                                id="seleccionArchivos" accept="image/*">

                            <input class="btn btn-secondary mt-3 w-100" type="reset" value=Limpiar>

                                <a href="plantillaProducto.php?id=<?php echo $id_asociado ?>" class="btn btn-secondary mt-3 w-100">Atras</a>
                                
                        </form>
                    </div>
                </div>
            </div>



            <div class="col-12 col-md-8 mt-3">

                <div class="card border border-dark">

                    <table>
                        <thead class="bg-dark">
                            <tr>
                                <th class="text-center text-white">Codigo</th>
                                <th class="text-center text-white">Tamaño</th>
                                <th class="text-center text-white">cantidad</th>
                                <!-- <th class="text-center text-white">Acciones</th> -->
                            </tr>
                        </thead>

                        <tbody class="bg-white">
                            <?php 
                                    include("conexion.php");
                                    $query = "SELECT * FROM tamanio WHERE id_asociado = $id_asociado";
                                    $result = mysqli_query($conn, $query);
                                    while($row = mysqli_fetch_array($result)){                                      
                                ?>
                            <tr class="">
                                <td class="text-center"><?php echo $row['codigo'] ?></td>
                                <td class="text-center"><?php echo $row['tamanio'] ?> mm</td>
                                <td class="text-center"><?php echo $row['cantidad'] ?></td>
                                <!-- <td class='text-center'>
                                    <a href="updateTamaño.php?codigo=<?php echo $row['codigo']?>" class="btn btn-light">
                                        <i class="bi bi-pencil-square iconoModificar"></i>
                                    </a>
                                    <a href="eliminarTamaño.php?codigo=<?php echo $row['codigo']?>"
                                        class="btn btn-ligth">
                                        <i class="bi bi-trash-fill iconoEliminar"></i>
                                    </a>
                                </td> -->

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