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
    <div class="col tex-center">
        <h1>Actualizar Datos</h1>
    </div>
</div>

    <?php
            include("conexion.php");
            if(isset($_GET['id_categoria'])){ 
                $id_categoria = $_GET['id_categoria'];

                $query = "SELECT * FROM soluciones_protesicas WHERE id_categoria = $id_categoria";
                $result = mysqli_query($conn, $query);
                
                if(mysqli_num_rows($result) == 1){
                    $row = mysqli_fetch_array($result);
                    
                    $id_categoria = $row['id_categoria'];
                    $nombre_categoria = $row['nombre_categoria'];
                    $url = $row['url'];
                   
                }
            }
            if(isset($_POST['update'])){
                $id_categoria = $_GET['id_categoria'];
                $nombre_categoria = $_POST['nombre_categoria'];
                $url = $_POST['url'];

                $update = "UPDATE soluciones_protesicas set nombre_categoria = '$nombre_categoria', url ='$url' WHERE id_categoria = $id_categoria";
                mysqli_query($conn, $update);
                $_SESSION['message'] = 'Registro actualizado exitosamente';
                $_SESSION['message_type'] = 'info'; 
                header('Location:solucionesProtesicas.php');
            }
        ?>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <form name="form"
                        action="updateSolucionesProtesicas.php?id_categoria=<?php echo $_GET['id_categoria'];?>"
                        onsubmit="return validarform()" method="POST">
                        <div class="form-group">
                            ID_Categoria <input type="number" name="id_categoria" value="<?php echo $id_categoria; ?>"
                                class="form-control" placeholder="Actualiza ID_Categoria" autocomplete="off" autofocus>
                        </div>
                        <div class="form-group">
                            Nombre_Categoria<input type="text" name="nombre_categoria"
                                value="<?php echo $nombre_categoria; ?>" class="form-control"
                                placeholder="Actualiza Nombre_Categoria" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            URL<input type="file" name="url" value="<?php echo $url; ?>" class="form-control"
                                placeholder="Uptate ID" autocomplete="off" required>
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