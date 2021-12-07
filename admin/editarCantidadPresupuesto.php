<?php
include("conexion.php");
if (isset($_GET['codigo'])) {
    $codigo = $_GET['codigo'];
    $numero = $_GET['numero'];
    $cantidad = 0;
    $query = "SELECT * FROM presupuesto WHERE codigo = '$codigo'";
    $result = mysqli_query($conn, $query);

    $row = mysqli_fetch_array($result);
    $cantidad = $row['cantidad'];

    $cantidad = $cantidad + $numero;
    if ($cantidad <= 0) {
        $delete = "DELETE FROM presupuesto WHERE codigo = '$codigo'";
        mysqli_query($conn, $delete);
    } else {

        $update = "UPDATE presupuesto set cantidad = $cantidad WHERE codigo = '$codigo'";
        mysqli_query($conn, $update);
    }
    header('Location:presupuesto.php'); 
}
