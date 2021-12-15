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
        
        
        $insert = "UPDATE clientes set nombre ='$nombre' WHERE id= $id";
        if (mysqli_query($conn, $insert)) {
            $_SESSION['message'] = 'Registro Actualizado';
            $_SESSION['message_type'] = 'success';
            header('Location:venta.php?idVendedor='.$idVendedor.'&idCliente=123456789');
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
        <button type="submit" name="actualizar">Actualizar</button>
    </form>
    <?php include "footer.php" ?>
</body>

</html>