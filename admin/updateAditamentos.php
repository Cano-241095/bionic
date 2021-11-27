<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../css/aditamentos.css">
    <link rel="stylesheet" href="../css/variables.css">
    <title></title>


</head>

<body>
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
            $titulo = $_GET['titulo'];
            $query = "SELECT * FROM aditamentos WHERE id = $id";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_array($result);

                $id = $row['id'];
                $id_asociado = $row['id_asociado'];
                $nombre_aditamento = $row['nombre_aditamento'];
                $url = $row['url'];
                $precio = $row['precio'];
                $imagen = $url;
            }
        }
        if (isset($_POST['update'])) {
            $titulo2 = $_POST['titulo'];
            $id_asociado = $_POST['id_asociado'];
            $nombre_aditamento = $_POST['nombre_aditamento'];
            $url = $_FILES['image']['name'];
            if ($url == null) {
                $url = $imagen;
            } else {
                $url = $_FILES['image']['name'];
            }
            $precio = $_POST['precio'];
            $update = "UPDATE aditamentos set id_asociado = '$id_asociado',  
                nombre_aditamento ='$nombre_aditamento',  url ='$url', 
                precio ='$precio' WHERE id = $id";
            mysqli_query($conn, $update);
            $_SESSION['message'] = 'Registro actualizado exitosamente';
            $_SESSION['message_type'] = 'info';
            $ir = 'Location:plantilla.php?id=';
            $ir .= $id_asociado;
            $ir .= "&titulo=";
            $ir .= $titulo2;
            header($ir);
            $url = $_FILES["image"]["name"];
            $target_dir = "../img/aditamentos/";
            $target_file = $target_dir . basename($_FILES["image"]["name"]);


            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            if (isset($_POST["enviar"])) {
                $check = getimagesize($_FILES["image"]["tmp_name"]);
                if ($check !== false) {
                    echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    echo "File is not an image.";
                    $uploadOk = 0;
                }
            }

            // Check if file already exists
            if (file_exists($target_file)) {
                echo "Sorry, file already exists.";
                $uploadOk = 0;
            }

            // Check file size
            if ($_FILES["image"]["size"] > 1000000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }

            // Allow certain file formats
            if (
                $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif"
            ) {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }

            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
                // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                    echo "The file " . htmlspecialchars(basename($_FILES["image"]["name"])) . " has been uploaded.";
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
        }
        ?>
        <div class="row justify-content-center mt-3">
            <div class="col-12 col-md-8 ">
                <div class="card">
                    <div class="card-body">
                        <form name="form"
                            action="updateAditamentos.php?id=<?php echo $_GET['id']; ?>&titulo=<?php echo $_GET['titulo']; ?>"
                            onsubmit="return " method="POST" enctype="multipart/form-data">
                            <!-- <input type="text" value="<?php echo $titulo; ?>">     -->
                            <!-- <label for=""></label> -->
                            <!-- <div class="form-group">
                            ID: <input type="number" name="id" value="<?php echo $id; ?>" class="form-control"
                                placeholder="Actualiza ID" autocomplete="off" autofocus>
                        </div> -->
                            <!-- <label for=""> ID Asociado:</label> -->
                            <div class="form-group d-none">
                                <input type="number" name="id_asociado" value="<?php echo $id_asociado; ?>"
                                    class="form-control" placeholder="Actualiza ID_asociado" autocomplete="off"
                                    autofocus>
                                <input type="text" name="titulo" value="<?php echo $titulo; ?>" class="form-control"
                                    placeholder="" autocomplete="off" autofocus>
                            </div>
                            <label for=""> Nombre Aditamento:</label>
                            <div class="form-group">
                                <input type="text" name="nombre_aditamento" value="<?php echo $nombre_aditamento; ?>"
                                    class="form-control" placeholder="Actualiza Nombre_Aditamento" autocomplete="off"
                                    required>
                            </div>
                            <label for=""> Imagen:</label>
                            <div class="form-group">
                                <input type="file" name="image" value="<?php echo $url; ?>" class="form-control"
                                    placeholder="Actualiza URL" autocomplete="off">
                            </div>
                            <label for=""> Precio:</label>
                            <div class="form-group">
                                <input type="number" name="precio" value="<?php echo $precio; ?>" class="form-control"
                                    placeholder="Actualiza Precio" autocomplete="off" required>
                            </div>
                            <div class="row">

                                <div class="col-12 col-md-6">
                                    <a href="plantilla.php?id=<?php echo $id_asociado ?>&titulo=<?php $query2 = "SELECT * FROM soluciones_protesicas where id_categoria = $id_asociado";
                                        $result2 = mysqli_query($conn, $query2);
                                        $row2 = mysqli_fetch_array($result2);
                                        echo $row2['nombre_categoria'] ?>"
                                        class="btn btn-secondary btn-block mt-3 w-100">Cancelar</a>
                                </div>
                                <div class="col-12 col-md-6">
                                    <button class="btn btn-secondary btn-block mt-3 w-100" name="update">
                                        Actualizar
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <script src="bootstrap/js/bootstrap.js.min"></script>
</body>

</html>