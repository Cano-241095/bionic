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
    <link rel="stylesheet" href="css/vendedores.css">
    <title>Document</title>
</head>

<body>
    <?php
    include("header.php");
    include("conexion.php");


    if (isset($_POST['nombre'])) {
        $nombre = ucwords(strtolower($_POST['nombre']));
        $apellidoP = ucwords(strtolower($_POST['apellidoP']));
        $apellidoM = ucwords(strtolower($_POST['apellidoM']));
        $usuario = substr($nombre, 0, 2) . substr($apellidoP, 0, 2) . substr($apellidoM, 0, 2);  // devuelve

        $contrasenia = password_hash($_POST['contrasenia'], PASSWORD_DEFAULT);
        $insert = "INSERT INTO vendedores (id,nombre,apellidoP,apellidoM,usuario,contrasenia)
        VALUES ('','$nombre','$apellidoP','$apellidoM','$usuario','$contrasenia')";

        if (mysqli_query($conn, $insert)) {
            $_SESSION['message'] = 'Registro guardado exitosamente';
            $_SESSION['message_type'] = 'success';
            header('Location:vendedor.php');
        } else {
            echo "El registro no se pudo guardar" . mysqli_error($conn);
        }
    }
    ?>
    <div class="contenedorVendedor">
        <form action="vendedor.php" class="sombra" method="POST">
            <label for="">Nombre: </label>
            <input type="text" placeholder="Ejemplo: Carlos" name="nombre" autocomplete="off">
            <label for="">Apellido Paterno: </label>
            <input type="text" placeholder="Ejemplo: Reyes" name="apellidoP" autocomplete="off">
            <label for="">Apellido Materno: </label>
            <input type="text" placeholder="Ejemplo: Gongora" name="apellidoM" autocomplete="off">
            <label for="">Contraseña: </label>
            <input type="password" placeholder="Ejemplo: d54as4.-87" name="contrasenia" autocomplete="off">
            <button type="submit" name="crear">Guardar</button>
        </form>
        <div class="lista sombra">
            <div class="containe-fluid">
                <table class="table caption-top">
                    <caption>Vendedores</caption>
                    <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Usuario</th>
                            <th scope="col">Editar</th>
                            <th scope="col">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT * FROM vendedores ORDER BY nombre";
                        $result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                            <tr>
                                <td><?php echo $row['nombre'] . ' ' . $row['apellidoP'] . ' ' . $row['apellidoM'] ?></td>
                                <td><?php echo $row['usuario'] ?></td>
                                <td>
                                    <a href="editarVendedor.php?id=<?php echo $row['id']?>">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="eliminarVendedor.php?id=<?php echo $row['id']?>">
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

    <?php include("footer.php"); ?>
    <script src="scriptVenta.js"></script>
    <script src="../src/particles.min.js"></script>
    <script src="../src/app.js"></script>
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>