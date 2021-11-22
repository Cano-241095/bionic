<?php
    include ("conexion.php");
    if (isset($_GET['id'])){    
        $id = $_GET['id'];
        
        $delete = "DELETE FROM aditamentos WHERE id = $id";

        if (mysqli_query($conn, $delete)){
            $_SESSION['message'] = 'Registro borrado exitosamente';
            $_SESSION['message_type'] = 'danger'; # Funcion de bootstrap
        }else{
            echo "Error al borrar registro: " . mysqli_error($conn);
        }
    }
?>

