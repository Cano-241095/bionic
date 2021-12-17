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
    <link rel="stylesheet" href="../css/estilosFondo.css">
    <link rel="stylesheet" href="css/vendedores.css">
    <title>Document</title>

</head>

<body>

    <div id="particles-js"></div>
    <?php
    include("header.php");

    include("conexion.php");
    $idVendedor = 0;
    if (isset($_GET['idVendedor'])) {
        $idVendedor = $_GET['idVendedor'];
    }
    if (isset($_POST['idVendedor'])) {
        $idVendedor = $_POST['idVendedor'];
    }
    // echo $idVendedor;
    if (isset($_POST['NomCliente'])) {
        $cliente = $_POST['NomCliente'];
        $apellidoP = $_POST['apellidoP'];
        $apellidoM = $_POST['apellidoM'];
        $email = $_POST['email'];
        $idVendedor = $_POST['idVendedor'];
        $idd;
        echo '<label> esta llegando</label>';
        $insert = "INSERT INTO clientes (nombre,apellidoP,apellidoM,email) VALUES ('$cliente', '$apellidoP', '$apellidoM', '$email')";

        if (mysqli_query($conn, $insert)) {
            $_SESSION['message'] = 'Registro guardado exitosamente';
            $_SESSION['message_type'] = 'success';
            header('Location:venta.php?idVendedor=' . $idVendedor . '&idCliente=123456789');
        } else {
            echo "<label> El registro no se pudo guardar</label>";
            header('Location:cliente.php?idVendedor=' . $idVendedor);
            // echo "El registro no se pudo guardar". mysqli_error($conn);
        }
    }
    ?>

    <div class="contenedorVendedor">
            <form action="cliente.php" method="POST">
                <input class="d-none" type="text" name="idVendedor" value="<?php echo $idVendedor ?>">
                <label for="">Nombre Cliente</label>
                <input type="text" placeholder="Ejemplo: Genesis" name="NomCliente">
                <label for="">Apellido Paterno:</label>
                <input type="text" placeholder="Ejemplo: Cano" name="apellidoP">
                <label for="">Apellido Materno:</label>
                <input type="text" placeholder="Ejemplo: Gongora" name="apellidoM">
                <label for="">Email:</label>
                <input type="text" placeholder="Ejemplo: genesis@gmail." name="email">
                <button type="submit">Guardar</button>
            <a href="venta.php?idVendedor=<?php echo $idVendedor ?>&idCliente=123456789" class="volver">Volver</a>
            </form>

        <div class="lista sombra">
            <div class="containe-fluid">
                <table class="table caption-top">
                    <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Email</th>
                            <th scope="col">Editar</th>
                            <th scope="col">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT * FROM clientes ORDER BY nombre";
                        $result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                            <tr>
                                <td><?php echo $row['nombre'] . " " . $row['apellidoP'] . " " . $row['apellidoM'] ?></td>

                                <td><?php echo $row['email'] ?></td>
                                <td>
                                    <a href="editarCliente.php?idVendedor=<?php echo $idVendedor ?>&id=<?php echo $row['id'] ?>">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="eliminarCliente.php?id=<?php echo $row['id'] ?>">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php
    include("footer.php");
    ?>
    <script src="../src/jquery-3.1.1.mini.js"></script>
    <script src="scriptVenta.js"></script>
    <script src="../src/particles.min.js"></script>
    <script src="../src/app.js"></script>
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>