<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/descripcion.css">
    <link rel="stylesheet" href="css/variables.css">
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

                $query = "SELECT * FROM descripcion WHERE id = $id";
                $result = mysqli_query($conn, $query);
                
                if(mysqli_num_rows($result) == 1){
                    $row = mysqli_fetch_array($result);
                    
                    $id = $row['id'];
                    $id_asociado = $row['id_asociado'];
                    $descripcion = $row['descripcion'];
                   
                }
            }
            if(isset($_POST['update'])){
                $id = $_GET['id'];
                $id_Asociado = $_POST['id_asociado'];
                $descripcion = $_POST['descripcion'];

                $update = "UPDATE descripcion set id_asociado = '$id_asociado', descripcion ='$descripcion' WHERE id= $id";
                mysqli_query($conn, $update);
                $_SESSION['message'] = 'Registro actualizado exitosamente';
                $_SESSION['message_type'] = 'info'; 
                header('Location:descripcion.php');
            }
        ?>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <form name="form" action="updateDescripcion.php?id=<?php echo $_GET['id'];?>"
                        onsubmit="return validarform()" method="POST">
                        <div class="form-group">
                            ID <input type="number" name="id" value="<?php echo $id; ?>"
                                class="form-control" placeholder="Actualiza ID" autocomplete="off" autofocus>
                        </div>
                        <div class="form-group">
                            ID Asociado<input type="text" name="nombre_categoria"
                                value="<?php echo $id_asociado; ?>" class="form-control"
                                placeholder="Actualiza Nombre_Categoria" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            Descripcion<input type="text" name="descripcion" value="<?php echo $descripcion; ?>" class="form-control"
                                placeholder="Atualiza Descripcion" autocomplete="off" required>
                        </div>

                        <button class="btn btn-success btn-block" name="update">
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