<?php
    include ("conexion.php");
    if (isset($_POST['enviar'])){
        $id_asociado = $_POST['id_asociado'];
        $codigo = $_POST['codigo'];
        $tamaño= $_POST['tamaño'];
        $cantidad= $_POST['cantidad'];

        $insert = "INSERT INTO tamaño (id_asociado,codigo,tamaño,cantidad)
        VALUES ('$id_asociado','$codigo','$tamaño','$cantidad')";
    
        if (mysqli_query($conn,$insert)){
            $_SESSION['message'] = 'Registro guardado exitosamente';
            $_SESSION['message_type'] = 'success'; 
            header('Location:plantillaProducto.php?id='.$id_asociado);
        }else{
        echo "El registro no se pudo guardar". mysqli_error($conn);
        }        
    }
?>