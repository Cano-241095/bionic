<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/imagenes.css">
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
            if(isset($_GET['id'])){ 
                $id = $_GET['id'];

                $query = "SELECT * FROM imagenes WHERE id = $id";
                $result = mysqli_query($conn, $query);
                
                if(mysqli_num_rows($result) == 1){
                    $row = mysqli_fetch_array($result);
                    
                    $id = $row['id'];
                    $id_asociado = $row['id_asociado'];
                    $imagen = $row['imagen'];
        
                }
            }
            if(isset($_POST['update'])){
                $id = $_GET['id'];
                $id_Asociado = $_POST['id_asociado'];
                $imagen = $_POST['imagen'];

                $update = "UPDATE imagenes set id_asociado = '$id_asociado', imagen ='$imagen' WHERE id= $id";
                mysqli_query($conn, $update);
                $_SESSION['message'] = 'Registro actualizado exitosamente';
                $_SESSION['message_type'] = 'info'; 
                header('Location:plantillaProducto.php?id='.$id_asociado); 

            }
        ?>
    <div class="row justify-content-center">
        <div class="col-6">
            <div class="card mt-3">
                <div class="card-body">
                    <form name="form" action="updateImagenes.php?id=<?php echo $_GET['id'];?>"
                        onsubmit="return validarform()" method="POST">
                        <!-- <label for="">ID:</label> -->
                        <div class="form-group d-none">
                        <input type="number" name="id" value="<?php echo $id; ?>"
                                class="form-control" placeholder="Actualiza ID" autocomplete="off" autofocus>
                        </div>
                        <!-- <label for="">ID Asociado:</label> -->
                        <div class="form-group d-none">
                        <input type="number" name="id_asociado"
                                value="<?php echo $id_asociado; ?>" class="form-control"
                                placeholder="Actualiza ID_Asociado" autocomplete="off" required>
                        </div>
                        <label for="">Imagen:</label>
                        <div class="form-group">
                            <input type="file" name="imagen" value="<?php echo $imagen; ?>" class="form-control"
                                placeholder="Actualiza Imagen" autocomplete="off" required>
                        </div>

                        <button class="btn btn-secondary btn-block mt-3 w-100" name="update">
                            Actualizar
                        </button>
                        <a href="plantillaProducto.php?id=<?php echo $id_asociado ?>" class="btn btn-secondary mt-3 w-100">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
        </div>
        <?php
    include("footer.php");
    ?>
    </div>



    <script src="bootstrap/js/bootstrap.js.min"></script>
</body>

</html>