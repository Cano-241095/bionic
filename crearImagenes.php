<?php
    include ("conexion.php");
    if (isset($_POST['enviar'])){
        $id = $_POST['id'];
        $id_asociado = $_POST['id_asociado'];
        $imagen= $_POST['imagen'];

        $insert = "INSERT INTO imagenes (id,id_asociado,imagen)
        VALUES ('$id','$id_asociado','$imagen')";
    
        if (mysqli_query($conn,$insert)){
            $_SESSION['message'] = 'Registro guardado exitosamente';
            $_SESSION['message_type'] = 'success'; 
            header('Location:imagenes.php');
        }else{
        echo "El registro no se pudo guardar". mysqli_error($conn);
        }        
    }
?>