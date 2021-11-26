<?php
    include ("conexion.php");
    if (isset($_POST['enviar'])){
        $id_categoria = $_POST['id_categoria'];
        $nombre_categoria = $_POST['nombre_categoria'];

        $insert = "INSERT INTO soluciones_protesicas (id_categoria,nombre_categoria)
        VALUES ('$id_categoria','$nombre_categoria')";
    
        if (mysqli_query($conn,$insert)){
            $_SESSION['message'] = 'Registro guardado exitosamente';
            $_SESSION['message_type'] = 'success'; 
            header('Location:productos.php');
        }else{
        echo "El registro no se pudo guardar". mysqli_error($conn);
        }        
    }
?>