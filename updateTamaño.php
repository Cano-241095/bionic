<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/tamaño.css">
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
            if(isset($_GET['codigo'])){ 
                $codigo = $_GET['codigo'];

                $query = "SELECT * FROM tamaño WHERE codigo = '$codigo'";
                $result = mysqli_query($conn, $query);
                
                if(mysqli_num_rows($result) == 1){
                    $row = mysqli_fetch_array($result);
                    
                    $id_asociado = $row['id_asociado'];
                    $codigo = $row['codigo'];
                    $tamaño = $row['tamaño'];
                    $cantidad = $row['cantidad'];

                   
                }
            }
            if(isset($_POST['update'])){
                $id_asociado = $_GET['id_asociado'];
                $codigo = $_POST['codigo'];
                $tamaño = $_POST['tamaño'];
                $cantidad = $_POST['cantidad'];


                $update = "UPDATE  set codigo = '$codigo', tamaño = '$tamaño', cantidad = '$cantidad'  WHERE id_asociado = $id_asociado";
                mysqli_query($conn, $update);
                $_SESSION['message'] = 'Registro actualizado exitosamente';
                $_SESSION['message_type'] = 'info'; 
                header('Location:tamaño.php');
            }
        ?>
    <div class="row justify-content-center">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <form name="form" action="updateTamaño.php?codigo=<?php echo $_GET['codigo'];?>"
                        onsubmit="return validarform()" method="POST">
                        <div class="form-group">
                            <label for=""> ID_Asociado: </label>
                           <input type="number" name="id_asociado" value="<?php echo $id_asociado; ?>"
                                class="form-control" placeholder="Actualiza ID_asociado" autocomplete="off" autofocus>
                        </div>
                        <label for="">Código: </label>
                        <div class="form-group">
                          <input type="text" name="codigo"
                             value="<?php echo $codigo; ?>" class="form-control"
                                placeholder="Actualiza codigo" autocomplete="off" required>
                        </div>
                        <label for="">Tamaño:</label>
                        <div class="form-group">
                           <input type="number" name="tamaño" value="<?php echo $tamaño; ?>" class="form-control"
                                placeholder="Actualiza tamaño" autocomplete="off" required>
                        </div>
                        <label for="">Cantidad:</label>
                        <div class="form-group">
                            <input type="number" name="cantidad" value="<?php echo $cantidad; ?>" class="form-control"
                                placeholder="Actualiza cantidad" autocomplete="off" required>
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