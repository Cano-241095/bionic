<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/variables.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php
    include("header.php");
    ?>
    <main>

        <?php
$idAsociado = 0;
        include("conexion.php");
        if (isset($_GET['id_categoria'])) {
            $idAsociado = $_GET['id_categoria'];
        }
        $query = "SELECT * FROM aditamentos WHERE id_asociado = $idAsociado";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_array($result)) {
        ?>



        <?php } ?>




    </main>

    <?php
    include("footer.php");
    ?>

</body>

</html>