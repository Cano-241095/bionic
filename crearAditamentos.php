<?php
    include ("conexion.php");
    if (isset($_POST['enviar'])){
        $id = $_POST['id'];
        $id_asociado = $_POST['id_asociado'];
        $nombre_categoria = $_POST['nombre_categoria'];
        $nombre_aditamento = $_POST['nombre_aditamento'];
        $url = $_POST['url'];
        $precio = $_POST['precio'];


        $insertar = "INSERT INTO aditamentos (id,id_asociado,nombre_categoria,nombre_aditamento,url,precio)
        VALUES ('$id','$id_asociado','$nombre_categoria','$nombre_aditamento','$url', '$precio')";
    
        if (mysqli_query($conn,$insertar)){
            $_SESSION['message'] = 'Registro guardado exitosamente';
            $_SESSION['message_type'] = 'success'; 
            header('Location:aditamentos.php');
        }else{
        echo "El registro no se pudo guardar". mysqli_error($conn);
        }        
    }
?>