<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/soluciones.css">
    <link rel="stylesheet" href="css/variables.css">
    <title></title>


</head>

<body>
    <div class="row">
        <div class="col text-center fondo">
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
                   
                }
            }
            if(isset($_POST['update'])){
                $id_categoria = $_GET['id_categoria'];
                $nombre_categoria = $_POST['nombre_categoria'];

                $update = "UPDATE soluciones_protesicas set nombre_categoria = '$nombre_categoria' WHERE id_categoria = $id_categoria";
                mysqli_query($conn, $update);
                $_SESSION['message'] = 'Registro actualizado exitosamente';
                $_SESSION['message_+type'] = 'info'; 
                header('Location:solucionesProtesicas.php');
            }
        ?>
    <div class="row justify-content-center">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <form name="form" action="updateSolucionesProtesicas.php?id_categoria=<?php echo $_GET['id_categoria'];?>"
                        onsubmit="return validarform()" method="POST">
                        <label for="">ID Categoria:</label>
                        <div class="form-group">
                            <input type="number" name="id_categoria" value="<?php echo $id_categoria; ?>"
                                class="form-control" placeholder="Actualiza ID_Categoria" autocomplete="off" autofocus>
                        </div>
                        <label for="">Nombre Categoria:</label>
                        <div class="form-group">
                            <input type="text" name="nombre_categoria" value="<?php echo $nombre_categoria; ?>"
                                class="form-control" placeholder="Actualiza Nombre_Categoria" autocomplete="off"
                                required>
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