<?php
    include ("conexion.php");
    if (isset($_POST['enviar'])){
        $id_asociado = $_POST['id_asociado'];
        $codigo = $_POST['codigo'];
        $tamanio= $_POST['tamanio'];
        $cantidad= $_POST['cantidad'];
        $casilla= $_POST['casilla'];
        $nombre= $_POST['nombre'];
        $codigo = trim($codigo," \t\n\r\0\x0B"); 
        $insert = "INSERT INTO tamanio (id_asociado,codigo,tamanio,cantidad,nombre,casilla)
        VALUES ('$id_asociado','$codigo','$tamanio','$cantidad','$nombre','$casilla')";
    
        if (mysqli_query($conn,$insert)){
            $_SESSION['message'] = 'Registro guardado exitosamente';
            $_SESSION['message_type'] = 'success'; 
            header('Location:plantillaProducto.php?id='.$id_asociado);
        }else{
        echo "El registro no se pudo guardar". mysqli_error($conn);
        }        
    }
?>