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
    <link rel="stylesheet" href="css/editarVendedor.css">
    <title>Document</title>
</head>

<body>
    <?php
    include "header.php";
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
        $email = ucwords(strtolower($_POST['email']));

        $insert = "UPDATE clientes set nombre ='$nombre', apellidoP ='$apellidoP',
        apellidoM ='$apellidoM', email ='$email' WHERE id= $id";
                if (mysqli_query($conn, $insert)) {
            $_SESSION['message'] = 'Registro Actualizado';
            $_SESSION['message_type'] = 'success';
            header('Location:cliente.php?idVe='.$idVendedor.'&idCliente=123456789');
        } else {
            echo "El registro no se pudo guardar" . mysqli_error($conn);
        }
    }
    ?>
    <form action="editarCliente.php?id=<?php echo $row['id'] ?>&idVendedor=<?php echo $idVendedor?>" method="POST">
        <input class="d-none" type="text" name="idV" value="<?php echo $row['id'] ?>">
        <label class="d-none" for="">id</label>
        <input class="d-none" type="text" name="idCliente" value="<?php echo $row['id'] ?>">
        <label for="">Nombre</label>
        <input type="text" name="nombre" value="<?php echo $row['nombre'] ?>">
        <label for="">Apellido Paterno</label>
        <input type="text" name="apellidoP" value="<?php echo $row['apellidoP'] ?>">
        <label for="">Apellido Materno</label>
        <input type="text" name="apellidoM" value="<?php echo $row['apellidoM'] ?>">
        <label for="">Email</label>
        <input type="text" name="email" value="<?php echo $row['email'] ?>">
        <button type="submit" name="actualizar">Actualizar</button>
    </form>
    <?php include "footer.php" ?>
</body>

</html>