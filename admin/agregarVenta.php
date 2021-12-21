<?php
    include ("conexion.php");
    if (isset($_GET['id'])){    
        $codigo = $_GET['id'];
        $folio = $_GET['folio'];
        $idCliente = $_GET['idCliente'];
        $idVendedor = $_GET['idVendedor'];
        
        $queryV = "SELECT * FROM venta where codigo = '$codigo' and folio = $folio";
        $resultV = mysqli_query($conn, $queryV);
        $rowV = mysqli_fetch_array($resultV);
        
        if ($rowV['codigo']) {
            echo 'ya existe';
            header('Location:venta.php?idVendedor='.$idVendedor.'&idCliente='.$idCliente); 
        }else{
            echo 'no existe';
            $query = "SELECT * FROM tamanio where codigo = '$codigo'";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_array($result);
            $nombre = $row['nombre'];
            $descripcion = '';
            $cantidad = 1;
            $id = $row['id_asociado'];
            $producto = $row['nombre'];
    
            $query = "SELECT * FROM aditamentos where id = $id";
            $result2 = mysqli_query($conn, $query);
            $row2 = mysqli_fetch_array($result2);
            $precio = $row2['precio'];
            
            $insert = "INSERT INTO venta (folio,codigo,producto,cantidad,precio)
            VALUES ('$folio','$codigo','$producto',$cantidad,$precio)";
            if (mysqli_query($conn, $insert)){
    
                //echo 'SiSePudo'.$folio.$codigo.$producto.$cantidad.$precio ;
                header('Location:venta.php?idVendedor='.$idVendedor.'&idCliente='.$idCliente); 
            }else{
                //echo 'NoSePudo'.$folio.$codigo.$producto.$cantidad.$precio ;
                header('Location:venta.php?idVendedor='.$idVendedor.'&idCliente='.$idCliente); 
            }
        }
    }
