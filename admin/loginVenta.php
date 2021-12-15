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
    <link rel="stylesheet" href="../css/estilosFondo.css">
    <link rel="stylesheet" href="css/loginVendedor.css">
    <title>Implants Bionic</title>
</head>

<body>
    <div id="particles-js"></div>
    <?php
    include("header.php");
    include("conexion.php");
    ?>
    <main>
        <div class="login">
            <div class="contenedor">
                <img src="../img/logo.jpg" alt="">
                <form action="loginVenta.php" method="POST">
                    <label for="">Usuario</label>
                    <input type="text" name="usuario" placeholder="Ejemplo: Cano">
                    <label for="">Contraseña</label>
                    <input type="password" name="contrasenia" id="" placeholder="*******">
                    <button type="submit" name="checar">Iniciar Sesión</button>
                </form>
            </div>
        </div>
    </main>
    <?php
    if (isset($_POST['checar'])) {
        $usuario = $_POST['usuario'];
        $contrasenia = $_POST['contrasenia'];
        $query = "SELECT * FROM vendedores WHERE usuario = '$usuario'";
        $result = mysqli_query($conn, $query);
        if (mysqli_fetch_array($result)) {
            $query = "SELECT * FROM vendedores WHERE usuario = '$usuario'";
            $result = mysqli_query($conn, $query);
            $datos = mysqli_fetch_array($result);
            $contraseñaBD = $datos['contrasenia'];
            if (password_verify($contrasenia, $contraseñaBD)) {
                echo '<br>';
                // echo 'si esta bien';
                header('Location:venta.php?idVendedor='.$datos['id'].'&idCliente=123456789');
            } else {
                echo '<br>';
                echo ' <div class="nota" > Contraseña Incorrecta </div>';
            }
        } else {
            echo '<br>';
            echo ' <div class="nota" > Usuario Incorrecto</div>';
        }
    }
    include("footer.php"); ?>
    <script src="scriptVenta.js"></script>
    <script src="../src/particles.min.js"></script>
    <script src="../src/app.js"></script>
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>