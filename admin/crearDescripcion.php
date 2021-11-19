<?php
    include ("conexion.php");
    if (isset($_POST['enviar'])){
        $id = $_POST['id'];
        $id_asociado = $_POST['id_asociado'];
        $descripcion= $_POST['descripcion'];

        $insert = "INSERT INTO descripcion (id,id_asociado,descripcion)
        VALUES ('$id','$id_asociado','$descripcion')";
    
        if (mysqli_query($conn,$insert)){
            $_SESSION['message'] = 'Registro guardado exitosamente';
            $_SESSION['message_type'] = 'success'; 
            header('Location:descripcion.php');
        }else{
        echo "El registro no se pudo guardar". mysqli_error($conn);
        }        
    }
?>