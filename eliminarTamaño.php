<?php
    include ("conexion.php");
    if (isset($_GET['codigo'])){    
        $codigo = $_GET['codigo'];
        
        $delete = "DELETE FROM tamaño WHERE codigo = '$codigo'";

        if (mysqli_query($conn, $delete)){
            $_SESSION['message'] = 'Registro borrado exitosamente';
            $_SESSION['message_type'] = 'danger'; 
            header('Location:tamaño.php'); 
        }else{
            echo "Error al borrar registro: " . mysqli_error($conn);
        }
    }
?>
