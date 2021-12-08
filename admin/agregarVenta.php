<?php
    include ("conexion.php");
    if (isset($_GET['id'])){    
        $codigo = $_GET['id'];
        $folio = $_GET['folio'];
        
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
            header('Location:venta.php'); 
        }else{
            //echo 'NoSePudo'.$folio.$codigo.$producto.$cantidad.$precio ;
            header('Location:venta.php'); 
        }
    }
?>
