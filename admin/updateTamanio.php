<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/tamanio.css">
    <link rel="stylesheet" href="../css/variables.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="shortcut icon" href="img/logo-png.ico">


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

        if (isset($_GET['codigo'])) {
            $codigo = $_GET['codigo'];
            $query = "SELECT * FROM tamanio WHERE codigo = '$codigo'";
            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_array($result);
                $id_asociado = $row['id_asociado'];
                $codigo = $row['codigo'];
                $tamanio = $row['tamanio'];
                $cantidad = $row['cantidad'];
                $nombre = $row['nombre'];
                $casilla = $row['casilla'];
            }
        }

        if (isset($_POST['update'])) {
            $id_asociado = $_POST['id_asociado'];
            $codigo = $row['codigo'];
            $tamanio = $_POST['tamanio'];
            $cantidad = $_POST['cantidad'];
            $nombre = $row['nombre'];
            $casilla = $_POST['casilla'];
            $update = "UPDATE tamanio set id_asociado = '$id_asociado', codigo = '$codigo',
            tamanio = '$tamanio', cantidad = '$cantidad', nombre = '$nombre',
            casilla = '$casilla'  WHERE codigo = '$codigo'";
            mysqli_query($conn, $update);
            $_SESSION['message'] = 'Registro actualizado exitosamente';
            $_SESSION['message_type'] = 'info';
            $ir = 'Location:plantillaProducto.php?id=';
            $ir .= $id_asociado;
            header($ir);
        }
        ?>
        <div class="row justify-content-center mt-3">
            <div class="col-12 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <form name="form" action="updateTamanio.php?codigo=<?php echo $_GET['codigo']; ?>" onsubmit="return validarform()" method="POST">
                            <div class="form-group">
                                <label for="" class="d-none"> ID_Asociado: </label>
                                <input type="number" name="id_asociado" value="<?php echo $id_asociado; ?>" class="form-control d-none" placeholder="Actualiza ID_asociado" autocomplete="off" autofocus>
                            </div>
                            <label for="">ubicacion:</label>
                            <div class="form-group">
                                <input type="number" name="casilla" value="<?php echo $casilla; ?>" class="form-control" placeholder="Actualiza tamanio" autocomplete="off" required>
                            </div>
                            <label for="">Tamaño:</label>
                            <div class="form-group">
                                <input type="number" name="tamanio" value="<?php echo $tamanio; ?>" class="form-control" placeholder="Actualiza tamanio" autocomplete="off" required>
                            </div>
                            <label for="">Cantidad:</label>
                            <div class="form-group">
                                <input type="number" name="cantidad" value="<?php echo $cantidad; ?>" class="form-control" placeholder="Actualiza cantidad" autocomplete="off" required>
                            </div>

                            <button class="btn btn-secondary btn-block mt-3 w-100" name="update">
                                Actualizar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> <?php
    include("footer.php");
    ?>
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>