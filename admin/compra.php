<?php
include("conexion.php");
if (isset($_GET['folio'])) {
    $folio = $_GET['folio'];
    $idCliente = $_GET['idCliente'];
    $idVendedor = $_GET['idVendedor'];
    $iva = $_GET['iva'];

    if ($idCliente != 123456789) {
        $query = "SELECT * FROM venta where folio = $folio order by producto";
        $result = mysqli_query($conn, $query);
        $total = 0;
        setlocale(LC_ALL, 'es_mx.UTF-8');
        $fecha = strftime("%Y-%m-%d");
        while ($row = mysqli_fetch_array($result)) { //checa todos los productos en la venta

            $queryV = "SELECT * FROM venta where codigo = 'ENVIO24' and folio = $folio";
            $resultV = mysqli_query($conn, $queryV);
            $rowV = mysqli_fetch_array($resultV);

            if ($rowV['codigo']) { // SI YA INGRESARON COSTO DE ENVIO SE ACTUALIZARA LA CANTIDAD DE STOCK
                $total += $row['precio'] * $row['cantidad'];
                $codigo = $row['codigo'];
                $cantidadVendida = $row['cantidad'];

                $query2 = "SELECT * FROM tamanio where codigo = '$codigo'";
                $result2 = mysqli_query($conn, $query2);
                $row2 = mysqli_fetch_array($result2);

                if ($codigo != 'ENVIO24') {
                    $cantidadStock = $row2['cantidad'];
                    $cantidad = $cantidadStock - $cantidadVendida;
                }

                // echo 'ya existe';
                // header('Location:venta.php?idVendedor='.$idVendedor.'&idCliente='.$idCliente);
                $update = "UPDATE tamanio set cantidad = '$cantidad' WHERE codigo= '$codigo'";
                mysqli_query($conn, $update);
            }
        }
        if ($total > 0) {
            $guardarNota = "INSERT INTO nota (id,fecha,id_vendedor,total,id_cliente,iva)
            VALUES ($folio,'$fecha',$idVendedor,$total,$idCliente,$iva)";
            mysqli_query($conn, $guardarNota);
        }
    }

    header('Location:venta.php?idVendedor=' . $idVendedor . "&idCliente=123456789");
}
