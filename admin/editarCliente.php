<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../css/variables.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="css/cliente.css">
    <title>Document</title>
</head>

<body>
    <?php
    include "header.php";
    ?>
    <?php
    include("conexion.php");
    $id = $_GET['id'];
    $idVendedor = $_GET['idVendedor'];
    $query = "SELECT * FROM clientes WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);

    if (isset($_POST['actualizar'])) {
        $id = $_POST['idCliente'];
        $nombre = ucwords(strtolower($_POST['nombre']));
        $apellidoP = ucwords(strtolower($_POST['apellidoP']));
        $apellidoM = ucwords(strtolower($_POST['apellidoM']));
        $calle = ucwords(strtolower($_POST['calle']));
        $colonia = ucwords(strtolower($_POST['colonia']));
        $num = ucwords(strtolower($_POST['num']));
        $ciudad = ucwords(strtolower($_POST['ciudad']));
        $telefono = ucwords(strtolower($_POST['telefono']));
        $email = ucwords(strtolower($_POST['email']));
        $rfc = ucwords(strtolower($_POST['rfc']));


        $insert = "UPDATE clientes set nombre ='$nombre', apellidoP ='$apellidoP',
        apellidoM ='$apellidoM',calle = '$calle', colonia = '$colonia', numero = '$num',ciudad = '$ciudad', telefono = '$telefono', email ='$email' WHERE id= $rfc";
                if (mysqli_query($conn, $insert)) {
            $_SESSION['message'] = 'Registro Actualizado';
            $_SESSION['message_type'] = 'success';
            header('Location:cliente.php?idVe='.$idVendedor.'&idCliente=123456789');
        } else {
            echo "El registro no se pudo guardar" . mysqli_error($conn);
        }
    }
    ?>
    <div class="contenedor">

        <div class="actualizar">
            <form action="editarCliente.php?id=<?php echo $row['id'] ?>&idVendedor=<?php echo $idVendedor?>"
                method="POST">
                <input class="d-none" type="text" name="idV" value="<?php echo $row['id'] ?>">
                <label class="d-none" for="">id</label>
                <input class="d-none" type="text" name="idCliente" value="<?php echo $row['id'] ?>">
                <div>
                    <label for="">Nombre:</label>
                    <input type="text" name="nombre" value="<?php echo $row['nombre'] ?>" require>
                </div>
                <div>
                    <label for="">Apellido Paterno:</label>
                    <input type="text" name="apellidoP" value="<?php echo $row['apellidoP'] ?>" required>
                </div>
                <div>
                    <label for="">Apellido Materno:</label>
                    <input type="text" name="apellidoM" value="<?php echo $row['apellidoM'] ?>" required>
                </div>
                <div>
                    <label for="">Calle:</label>
                    <input type="calle" name="calle" value="<?php echo $row['calle'] ?>" required>
                </div>
                <div>
                    <label for="">Colonia:</label>
                    <input type="text" name="colonia" value="<?php echo $row['colonia'] ?>" required>
                </div>
                <div>
                    <label for="">Numero:</label>
                    <input type="text" name="num" value="<?php echo $row['numero'] ?>" required>
                </div>
                <div>
                    <label for="">Ciudad:</label>
                    <input type="text" name="ciudad" value="<?php echo $row['ciudad'] ?>" required>
                </div>
                <div>
                    <label for="">Telefono:</label>
                    <input type="number" name="telefono" value="<?php echo $row['telefono'] ?>" required>
                </div>
                <div>
                    <label for="">Email:</label>
                    <input type="email" name="email" value="<?php echo $row['email'] ?>" required>
                </div>
                <div>
                    <label for="">RFC</label>
                    <input type="rfc" name="rfc" value="<?php echo $row['id'] ?>" required>
                </div>
                <div>
                    <label for="">Denominacion:</label>
                    <input type="text" name="denominacion" value="<?php echo $row['denominacion'] ?>" required>
                </div>
                <div>
                    <label for="">Codigo_Postal:</label>
                    <input type="text" name="cp" value="<?php echo $row['cp'] ?>" required>
                </div>

                <button class="btn-actualizar btn btn-secondary" type="submit" name="actualizar">Actualizar</button>
            </form>
            
        </div>

    </div>
    <?php
    include("footer.php");
    ?>
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>