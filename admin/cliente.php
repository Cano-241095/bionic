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
    <link rel="shortcut icon" href="img/logo-png.ico">

    <!-- <link rel="stylesheet" href="css/vendedores.css"> -->
    <title>Document</title>

</head>

<body>

    <div id="particles-js"></div>
    <?php
    include("header.php");
    $conteo = 0;
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
        $calle = $_POST['calle'];
        $colonia = $_POST['colonia'];
        $num = $_POST['num'];
        $ciudad = $_POST['ciudad'];
        $telefono = $_POST['telefono'];

        $denominacion = $_POST['denominacion'];
        $rfc = $_POST['rfc'];
        $telefonoFis = $_POST['telefonoFis'];
        $cp= $_POST['cp'];

        $persona = $_POST['persona'];
        $calleEnv = $_POST['calleEnv'];
        $coloniaEnv = $_POST['coloniaEnv'];
        $numEnv = $_POST['numEnv'];
        $ciudadEnv = $_POST['ciudadEnv'];
        $telefonoEnv = $_POST['telefonoEnv'];
        $email = $_POST['email'];
        $cpEnv = $_POST['cpEnv'];


        $idVendedor = $_POST['idVendedor'];
        $idd;
        echo '<label> esta llegando</label>';
        $insert = "INSERT INTO clientes (nombre,apellidoP,apellidoM,calle,colonia,num,
        ciudad,telefono,id,denominacion,telefonoFis,cp,persona,calleEnv,coloniaEnv,numEnv,ciudadEnv,
        telefonoEnv,email,cpEnv) VALUES
        ('$cliente', '$apellidoP', '$apellidoM', '$calle','$colonia','$num','$ciudad','$telefono',
        '$denominacion', '$rfc', '$telefonoFis','$cp', '$persona', 
        '$calleEnv', '$coloniaEnv', '$numEnv', '$ciudadEnv', '$telefonoEnv', '$email', '$cpEnv') ";

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
    <div class="contenedor">
        <!-- <h1>Clientes</h1> -->
        <div class="sombra">
            <form action="cliente.php" method="POST">
                <input class="d-none" type="text" name="idVendedor" value="<?php echo $idVendedor ?>">
                    <h3>Datos del Cliente <i class="bi bi-question-diamond-fill" title="Los datos personales son cualquier información relativa a 
                    una persona física viva identificada o identificable."></i></h3>
                <div class="cincofr">
                    <div>
                        <label for="">Nombre Cliente:</label>
                        <input type="text" placeholder="Ejemplo: Genesis" name="NomCliente" required autocomplete="none">
                    </div>
                    <div>
                        <label for="">Apellido Paterno:</label>
                        <input type="text" placeholder="Ejemplo: Cano" name="apellidoP" required autocomplete="none">
                    </div>
                    <div>
                        <label for="">Apellido Materno:</label>
                        <input type="text" placeholder="Ejemplo: Gongora" name="apellidoM" required autocomplete="none">
                    </div>
                    <div>
                        <label for="">Calle:</label>
                        <input type="text" placeholder="Manuel Altamirano" name="calle" required autocomplete="none">
                    </div>
                    <div>
                        <label for="">Colonia:</label>
                        <input type="text" placeholder="20 de Noviembre" name="colonia"  autocomplete="none">
                    </div>
                    <div>
                        <label for="">Num:</label>
                        <input type="text" placeholder="#15a" name="num" require autocomplete="none"> 
                    </div>
                    <div>
                        <label for="">Ciudad:</label>
                        <input type="text" placeholder="Iguala de la Independecia" name="ciudad" require autocomplete="none">
                    </div>
                    <div>
                        <label for="">Telefono:</label>
                        <input type="number" placeholder="7331254864" name="telefono" required autocomplete="none">
                    </div>
                    
                </div>

                <h3>Datos Fiscales <i class="bi bi-question-diamond-fill" title="Los datos fiscales en facturación son todos aquellos datos
                    identificativos que nos acreditan y nos permite facturar como profesional o empresa."></i></h3>
                <div class="cincofr">
                    <div>
                        <label for="">Razón Social:</label>
                        <input type="text" placeholder="Clinica Dental Esthetics" name="denominacion" required autocomplete="none">
                    </div>
                    <div>
                        <label for="">RFC:</label>
                        <input type="text" placeholder="GECAGOGSYH12G" name="rfc" required autocomplete="none">
                    </div>
                    <div>
                        <label for="">Telefono:</label>
                        <input type="text" placeholder="3378451" name="telefonoFis" required autocomplete="none">
                    </div>
                    <div>
                        <label for="">C.P:</label>
                        <input type="text" placeholder="40000" name="cp" required autocomplete="none">
                    </div>
                </div>

                <h3>Datos de Envio <i class="bi bi-question-diamond-fill" title="Los datos de envio son aquellos datos sobre el destino del paquete o productos.  "></i></h3>
                <div class="cincofr">
                    <div>
                        <label for="">Quien recibe:</label>
                        <input type="text" placeholder="Juan Alfonso Diaz Sandoval" name="persona" required autocomplete="none">
                    </div>
                    <div>
                        <label for="">Calle:</label>
                        <input type="text" placeholder="Juan Alvarez" name="calleEnv" required autocomplete="none">
                    </div>
                    <div>
                        <label for="">Colonia:</label>
                        <input type="text" placeholder="Tamarindos" name="coloniaEnv" required autocomplete="none">
                    </div>
                    <div>
                        <label for="">Num:</label>
                        <input type="text" placeholder="#87B" name="numEnv" required autocomplete="none">
                    </div>
                    <div>
                        <label for="">Ciudad:</label>
                        <input type="text" placeholder="Taxco" name="ciudadEnv" required autocomplete="none">
                    </div>
                    <div>
                        <label for="">Telefono:</label>
                        <input type="text" placeholder="3325418" name="telefonoEnv" required autocomplete="none">
                    </div>
                    <div>
                        <label for="">Email:</label>
                        <input type="text" placeholder="Dental_esthetics@Hotmail.Com" name="email" required autocomplete="none">
                    </div>
                    <div>
                        <label for="">CP:</label>
                        <input type="text" placeholder="40024" name="cpEnv" required>
                    </div>
                    <div>
                        <button class="volver" type="submit">Guardar</button>
                        <a href="venta.php?idVendedor=<?php echo $idVendedor ?>&idCliente=123456789" class="volver">Volver</a>
                    </div>
                </div>
            </form>
        </div>
        <div class="sombra lista">
            <?php
            $query = "SELECT * FROM clientes ORDER BY nombre";
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_array($result)) {
                $conteo = $conteo + 1;
            ?>
                <button type="button" class="btn btn-secundary" data-bs-toggle="modal" data-bs-target="#<?php echo 'm' . $conteo ?>">
                    <ul>
                        <li>
                            <label for="">Nombre:</label>
                            <i class="bi bi-person"></i>
                            <?php echo $row['nombre'] . " " . $row['apellidoP'] . " " . $row['apellidoM'] ?>
                        </li>
                        <!-- <li class="enPequeNoSeVe">
                                        <label for="">Domicilio Fiscal:</label>
                                        <?php echo $row['calle'] . " " . $row['colonia'] . " " . $row['numero'] . " " . $row['ciudad'] ?>
                                    </li> -->
                        <li>
                            <label for="">Telefono:</label>
                            <i class="bi bi-telephone"></i> <a href="tel:+ <?php echo $row['telefono'] ?>">
                                <?php echo $row['telefono'] ?></a>
                        </li>
                        <li>
                            <label for="">Email:</label>
                            <i class="bi bi-envelope"></i> <a href="mailto:<?php echo $row['email'] ?>"><?php echo $row['email'] ?></a>
                        </li>
                        <!-- <li class="enPequeNoSeVe">
                                        <label for="">RFC:</label>
                                        <i class="bi bi-person-video2"></i>  <?php echo $row['id'] ?>
                                    </li> -->
                        <!-- <li class="enPequeNoSeVe">
                                        <a href="editarCliente.php?id=<?php echo $row['id'] ?>&idVendedor=<?php echo $idVendedor ?>">Editar</a>
                                    </li>
                                    <li class="enPequeNoSeVe">
                                        <a href="eliminarCliente.php?id=<?php echo $row['id'] ?>&idVendedor=<?php echo $idVendedor ?>">Eliminar</a>
                                    </li> -->
                    </ul>
                </button>

                <!-- Modal -->
                <div class="modal fade" id="<?php echo 'm' . $conteo ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="exampleModalLabel">Datos de Facturacion</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <h5>Datos del Cliente</h5>
                                <div class="tresfr">
                                <label for="">Nombre:</label>
                                <div>
                                <i class="bi bi-person"></i>
                                <?php echo $row['nombre'] . " " . $row['apellidoP'] . " " . $row['apellidoM'] ?>
                                </div>
                                <label for="">Domicilio:</label>
                                <div>
                                <i class="bi bi-house-door"></i>
                                <?php echo $row['calle'] . " " . $row['colonia'] . " " . $row['num'] . " " . $row['ciudad'] ?>
                                </div>
                                <label for="">Telefono:</label>
                                <div>
                                <i class="bi bi-telephone"></i> <a href="tel:+ <?php echo $row['telefono'] ?>">
                                    <?php echo $row['telefono'] ?></a>
                                    </div>
                                </div>
                                
                                    <h5>Datos Fiscales:</h5>
                                    <div  class="tresfr">
                                    <label for="">Denominacion::</label>
                                    <div>
                                    <i class="bi bi-building"></i> <?php echo $row['denominacion'] ?>
                                    </div>
                                <label for="">RFC:</label>
                                <div>
                                <i class="bi bi-person-video2"></i> <?php echo $row['id'] ?>
                                </div>
                                <label for="">Telefono:</label>
                                <div>
                                <i class="bi bi-telephone"></i> <a href="tel:+ <?php echo $row['telefonoFis'] ?>">
                                    <?php echo $row['telefonoFis'] ?></a>
                                </div>
                                <label for="">Codigo_Postal:</label>
                                <div>
                                <i class="bi bi-mailbox"></i> <?php echo $row['cp'] ?>
                                </div>
                                    </div>
                                
                                <h5>Datos de Envio:</h5>
                                <div  class="tresfr">
                                <label for="">Quien recibe:</label>
                                <div>
                                <i class="bi bi-person"></i> <?php echo $row['persona'] ?>
                                </div>
                                <label for="">Domicilio:</label>
                                <div>
                                <i class="bi bi-house-door"></i>
                                <?php echo $row['calleEnv'] . " " . $row['coloniaEnv'] . " " . $row['numEnv'] . " " . $row['ciudadEnv'] ?>
                                </div>
                                <label for="">Telefono:</label>
                                <div>
                                <i class="bi bi-telephone"></i> <a href="tel:+ <?php echo $row['telefonoEnv'] ?>">
                                    <?php echo $row['telefonoEnv'] ?></a>
                                    </div>
                                <label for="">Email:</label>
                                <div>
                                <i class="bi bi-envelope"></i> <a href="mailto:<?php echo $row['email'] ?>"><?php echo $row['email'] ?></a>
                                </div>
                                <label for="">Codigo Postal:</label>
                                <div>
                                <i class="bi bi-mailbox"></i> <?php echo $row['cpEnv'] ?>
                                </div>
                                </div>
            
                            </div>
                            <div class="modal-footer">
                                <a class="volver" href="editarCliente.php?id=<?php echo $row['id'] ?>&idVendedor=<?php echo $idVendedor ?>">Editar</a>
                                <a class="volver" href="eliminarCliente.php?id=<?php echo $row['id'] ?>&idVendedor=<?php echo $idVendedor ?>">Eliminar</a>
                            </div>
                        </div>
                    </div>
                </div>

            <?php } ?>
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