<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <title></title>


</head>

<body>
    <div class="row">
        <div class="col text-center">
            <h1>Actualizar Datos</h1>
        </div>
    </div>

    <?php
            include("conexion.php");
            if(isset($_GET['id'])){ 
                $id = $_GET['id'];

                $query = "SELECT * FROM aditamentos WHERE id = $id";
                $result = mysqli_query($conn, $query);
                
                if(mysqli_num_rows($result) == 1){
                    $row = mysqli_fetch_array($result);
                    
                    $id = $row['id'];
                    $id_asociado = $row['id_asociado'];
                    $nombre_categoria = $row['nombre_categoria'];
                    $nombre_aditamento = $row['nombre_aditamento'];
                    $url = $row['url'];
                    $precio = $row['precio'];

                   
                }
            }
            if(isset($_POST['update'])){
                $id = $_POST['id'];
                $id_asociado = $_POST['id_asociado'];
                $nombre_categoria = $_POST['nombre_categoria'];
                $nombre_aditamento = $_POST['nombre_aditamento'];
                $url = $_POST['url'];
                $precio = $_POST['precio'];

                $update = "UPDATE aditamentos set id_asociado = '$id_asociado', nombre_categoria ='$nombre_categoria',  nombre_aditamento ='$nombre_aditamento',  url ='$url', precio ='$precio' WHERE id = $id";
                mysqli_query($conn, $update);
                $_SESSION['message'] = 'Registro actualizado exitosamente';
                $_SESSION['message_type'] = 'info'; 
                header('Location:aditamentos.php');
            }
        ?>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <form name="form" action="updateAditamentos.php?id=<?php echo $_GET['id'];?>"
                        onsubmit="return validarform()" method="POST">

                        <div class="form-group">
                            ID <input type="number" name="id" value="<?php echo $id; ?>" class="form-control"
                                placeholder="Actualiza ID" autocomplete="off" autofocus>
                        </div>
                        <div class="form-group">
                            ID Asociado <input type="number" name="id_asociado" value="<?php echo $id_asociado; ?>"
                                class="form-control" placeholder="Actualiza ID_asociado" autocomplete="off" autofocus>
                        </div>
                        <div class="form-group">
                            Nombre Categoria<input type="text" name="nombre_categoria"
                                value="<?php echo $nombre_categoria; ?>" class="form-control"
                                placeholder="Actualiza Nombre_Categoria" value="protesicos" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            Nombre Aditamento<input type="text" name="nombre_aditamento"
                                value="<?php echo $nombre_aditamento; ?>" class="form-control"
                                placeholder="Actualiza Nombre_Aditamento" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            URL<input type="file" name="url" value="<?php echo $url; ?>" class="form-control"
                                placeholder="Actualiza URL" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            Precio<input type="number" name="precio" value="<?php echo $precio; ?>" class="form-control"
                                placeholder="Actualiza Precio" autocomplete="off" required>
                        </div>

                        <button class="btn btn-secondary btn-block" name="update">
                            Actualizar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <script src="bootstrap/js/bootstrap.js.min"></script>
</body>

</html>