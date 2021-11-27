<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/imagenes.css">
    <link rel="stylesheet" href="../css/variables.css">
    <title>Imagenes</title>
</head>


<body>
    <div class="container-fluid">
        <?php 
        $id_asociado = $_GET['id'];
        ?>

        <div class="row justify-content-center fondo">
            <div class="col-12 col-md-12 text-center">
                <h1>Imagenes</h1>
            </div>
        </div>

        <div class="row justify-content-center">

        
                <div class="card border-dark mt-3 col-12 col-md-8">
                    <div class="card-body">

                        <form method="post" name="form" action="crearImagenes.php" enctype="multipart/form-data">

                            <h2>Imagenes</h2>
                            <input class="form-control d-none" type="number" name="id_asociado"
                                value="<?php echo $id_asociado?>" placeholder="Ingresar ID asociado" autocomplete="off"
                                autofocus>

                            <input class="form-control d-none" type="number" name="id" placeholder="Ingresar ID unico"
                                autocomplete="off" autofocus>
                            <input class="form-control mt-3" type="file" name="image" placeholder="Elige imagen"
                                autocomplete="off" required>

                            <input class="btn btn-secondary mt-3 w-100" type="submit" name="enviar2" value="Guardar"
                                id="seleccionArchivos" accept="image/*">

                            <input class="btn btn-secondary mt-3 w-100" type="reset" value=Limpiar>
                            <div class="col-12">
                                <a href="plantillaProducto.php?id=<?php echo $id_asociado ?>"
                                    class="btn btn-secondary mt-3 w-100">Atras</a>
                            </div>
                        </form>
                    </div>

                </div>
            



            <div class="col-12 col-md-8 mt-3 imagen justify-content-center">
        

                <?php 
                        include("conexion.php");
                        $query = "SELECT * FROM imagenes WHERE id_asociado = $id_asociado";
                        $result = mysqli_query($conn, $query);
                        while($row = mysqli_fetch_array($result)){ 
                                            
                                    ?>

                <img class="imagen" src="../img/<?php echo $row['imagen'] ?>" alt="">



                <?php } ?>



            </div>

        </div>

    </div>



    <script src="bootstrap/js/bootstrap.js.min"></script>
</body>

</html>