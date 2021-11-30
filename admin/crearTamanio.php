<?php
    include ("conexion.php");
    if (isset($_POST['enviar'])){
        $id_asociado = $_POST['id_asociado'];
        $codigo = $_POST['codigo'];
        $tamanio= $_POST['tamanio'];
        $cantidad= $_POST['cantidad'];

        $insert = "INSERT INTO tamanio (id_asociado,codigo,tamanio,cantidad)
        VALUES ('$id_asociado','$codigo','$tamanio','$cantidad')";
    
        if (mysqli_query($conn,$insert)){
            $_SESSION['message'] = 'Registro guardado exitosamente';
            $_SESSION['message_type'] = 'success'; 
            header('Location:plantillaProducto.php?id='.$id_asociado);
        }else{
        echo "El registro no se pudo guardar". mysqli_error($conn);
        }        
    }
?>