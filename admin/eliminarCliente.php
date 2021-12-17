<?php
    include ("conexion.php");
    if (isset($_GET['id'])){    
        $id = $_GET['id'];
        
        $delete = "DELETE FROM clientes WHERE id = '$id'";
        if (mysqli_query($conn, $delete)){
            $_SESSION['message'] = 'Registro borrado exitosamente';
            $_SESSION['message_type'] = 'danger'; 
            header('Location:cliente.php'.$row['id']); 
        }else{
            echo "Error al borrar registro: " . mysqli_error($conn);
        }
    }
?>
