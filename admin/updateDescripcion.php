<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
        <div class="row">
            <div class="col text-center fondo">
                <h1>Actualizar Datos</h1>
            </div>
        </div>


        <?php
        include("conexion.php");
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $query = "SELECT * FROM descripcion WHERE id = $id";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_array($result);

                $id = $row['id'];
                $id_asociado = $row['id_asociado'];
                $descripcion = $row['descripcion'];
            }
        }
        if (isset($_POST['update'])) {
            $id = $_GET['id'];
            $id_Asociado = $_POST['id_asociado'];
            $descripcion = $_POST['descripcion'];

            $update = "UPDATE descripcion set id_asociado = '$id_asociado', descripcion ='$descripcion' WHERE id= $id";
            mysqli_query($conn, $update);
            $_SESSION['message'] = 'Registro actualizado exitosamente';
            $_SESSION['message_type'] = 'info';
            header('Location:plantillaProducto.php?id='.$id_Asociado);
        }
        ?>
        <div class="row justify-content-center mt-3">
            <div class="col-12 col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form name="form" action="updateDescripcion.php?id=<?php echo $_GET['id']; ?>" onsubmit="return validarform()" method="POST">
                            <label for="" class="d-none">ID: </label>
                            <div class="form-group">
                                <input type="number" name="id" value="<?php echo $id; ?>" class="form-control d-none" placeholder="Actualiza ID" autocomplete="off" autofocus>
                            </div>
                            <label for="" class="d-none">ID Asociado:</label>
                            <div class="form-group">
                                <input type="text" name="id_asociado" value="<?php echo $id_asociado; ?>" class="form-control d-none" placeholder="Actualiza ID_Asociado" autocomplete="off" required>
                            </div><label for=""> Descripcion:</label>
                            <div class="form-group">
                                <input type="text" name="descripcion" value="<?php echo $descripcion; ?>" class="form-control" placeholder="Actualiza Descripcion" autocomplete="off" required>
                            </div>

                            <button class="btn btn-secondary w-100 mt-3" name="update">
                                Actualizar
                            </button>
                            <a class="btn btn-secondary w-100 mt-3" href="plantillaProducto.php?id=<?php echo $id_asociado ?>">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    <?php
    include("footer.php");
    ?>
    </div>
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>