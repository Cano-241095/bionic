<?php
include("conexion.php");
if (isset($_GET['codigo'])) {
    $codigo = $_GET['codigo'];
    $numero = $_GET['numero'];
    $folio = $_GET['folio'];
    $idVendedor = $_GET['idVendedor'];
    $idCliente = $_GET['idCliente'];
    $cantidad = 0;
    $query = "SELECT * FROM venta WHERE codigo = '$codigo' AND folio = $folio";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);
    $cantidad = $row['cantidad'];

    echo 'consulta';

    $cantidad = $cantidad + $numero;
    if ($cantidad <= 0) {
        $delete = "DELETE FROM venta WHERE codigo = '$codigo' AND folio = $folio";
        mysqli_query($conn, $delete);
    } else {
        
    echo ' ya elimino si es menor a 0';
    $query2 = "SELECT * FROM tamanio WHERE codigo = '$codigo'";
    $result2 = mysqli_query($conn, $query2);
    $row2 = mysqli_fetch_array($result2);
    $stock = $row2['cantidad'];
    
    echo ' checo el stock';
        if ($cantidad <= $stock) {
            $update = "UPDATE venta set cantidad = $cantidad WHERE codigo = '$codigo' AND folio = $folio";
            mysqli_query($conn, $update);
        }
    }
    header('Location:venta.php?idVendedor='.$idVendedor."&idCliente=".$idCliente); 
}
?>